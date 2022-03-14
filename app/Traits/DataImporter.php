<?php

namespace App\Traits;

//use Illuminate\Support\Facades\Storage;

use App\Models\Article;
use App\Models\ArticlePhoto;
use App\Models\ArticleShop;
use App\Models\Color;
use App\Models\Creation;
use App\Models\CreationCategory;
use App\Models\CreationGroup;
use App\Models\Photo;
use App\Models\Shop;
use App\Models\Size;
use App\Models\Translation;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use Intervention\Image\Facades\Image;

trait DataImporter {
    public function importCreationsFromLou()
    {
        echo "<br/><br/><strong>----------------  Importing data from Lou's file...</strong><br/>";

        if (env('APP_ENV') != 'production') {
            // WARNING: will empty the table!! To be used with caution.
            Creation::truncate();
            echo "<strong>--- All data deleted from Creations table in database ---</strong><br/>";
        }

        $new_creations = json_decode(file_get_contents(asset('json_imports/creations_lou.json')), true);
        $creations_success = [];
        $creations_failed = [];
        $creations_already_present = [];
        $missing_categories = [];

        foreach ($new_creations as $creation) {
            echo "<br/>";
            $new_creation = new Creation();
            //$category_id = 0;
            $error_detected = 0;

            if (!isset($creation['rental_enabled'])) {
                $creation['rental_enabled'] = 0;
            }

            if (!isset($creation['partner_id'])) {
                $creation['partner_id'] = "";
            }

            if (Creation::where('name', $creation['name'])->count() == 0) {
                $new_creation->creation_category_id = null;
                if(is_string($creation['name']) && strlen($creation['name']) > 1) {
                    $creation['name'] = strtoupper($creation['name']);
                    $new_creation->name = $creation['name'];
                } else {
                    echo "<span style='color:red;'>!!! ".$creation['name'].": name is not correct...</span><br/>";
                    $error_detected = 1;
                }

                if (strpos(strtolower($creation['desc_loubna']), 'accessoire') !== false) {
                    $new_creation->is_accessory = '1';
                }

                if (floatval($creation['price']) != 0) {
                    $new_creation->price = floatval($creation['price']);
                } else {
                    $error_detected = 1;
                    echo "<span style='color:red;'>!!! ".$creation['name'].": price". $creation['price'] ." is not correct... Creation not imported to database.</span><br/>";
                    //echo "<span style='color:red;'>".$creation['name']."</span><br/>";
                    array_push($creations_failed, $creation['name']);
                }
                if (intval($creation['Weight [g]']) != 0) {
                    $new_creation->weight = floatval($creation['Weight [g]']);
                }
                $new_creation->description_lu = $creation['description_lu'];
                $new_creation->description_fr = $creation['description_fr'];
                $new_creation->description_de = $creation['description_de'];
                $new_creation->description_en = $creation['description_en'];
                if($creation['origin_link_en'] == "/") {
                    $new_creation->origin_link_en = "";
                } else {
                    $new_creation->origin_link_en = $creation['origin_link_en'];
                }
                if($creation['origin_link_fr'] == "/") {
                    $new_creation->origin_link_fr = "";
                } else {
                    $new_creation->origin_link_fr = $creation['origin_link_fr'];
                }
                if($creation['origin_link_de'] == "/") {
                    $new_creation->origin_link_de = "";
                } else {
                    $new_creation->origin_link_de = $creation['origin_link_de'];
                }
                if($creation['origin_link_lu'] == "/") {
                    $new_creation->origin_link_lu = "";
                } else {
                    $new_creation->origin_link_lu = $creation['origin_link_lu'];
                }
                $new_creation->rental_enabled = $creation['rental_enabled'];
                if ($creation['partner_id'] == "") {
                    $new_creation->partner_id = null;
                } else if(is_int($creation['partner_id'])) {
                    $new_creation->partner_id = $creation['partner_id'];
                }
                
                if ($error_detected == 0 && $new_creation->save()) {
                    echo "<span style='color:green;'>".$creation['name']." successfully added to the database :)</span><br/>";
                    array_push($creations_success, $creation['name']);
                } else {
                    if (!in_array($creation['name'], $creations_failed)) {
                        array_push($creations_failed, $creation['name']);
                        echo "<span style='color:red;'>*** ".$creation['name']." could not added to the database :(</span><br/>";
                    }
                }
            } else {
                array_push($creations_already_present, $creation['name']);
                echo "<span style='color:orange;'>ooo ".$creation['name']." was already present in the database.</span><br/>";
            }
        }
    }


    public function importCreationsFromSabine()
    {
        $new_creations = json_decode(file_get_contents(asset('json_imports/creations_sabine.json')), true);

        echo "<br/><br/><strong>----------------  Importing data from Sabine's file...</strong><br/>";

        foreach ($new_creations as $creation) {
            echo "<br/>";

            $creation['New BENU Name'] = strtoupper($creation['New BENU Name']);
            if (Creation::where('name', $creation['New BENU Name'])->count() > 0) {
                $creation_to_update = Creation::where('name', $creation['New BENU Name'])->first();

                // Assignment of categories - only if not already completed
                if ($creation_to_update->creation_category_id == null) {
                    switch ($creation['Category']) {
                        case 'Home':
                            $creation_to_update->creation_category_id = CreationCategory::where('filter_key', 'home')->first()->id;
                            break;

                        case 'Blouse & Chemise':
                            $creation_to_update->creation_category_id = CreationCategory::where('filter_key', 'blouses-shirts')->first()->id;
                            break;

                        case 'Blouson & Veste':
                            $creation_to_update->creation_category_id = CreationCategory::where('filter_key', 'jackets-vests')->first()->id;
                            break;

                        case 'Bonnet':
                            $creation_to_update->creation_category_id = CreationCategory::where('filter_key', 'bonnets')->first()->id;
                            break;

                        case 'Accessoire':
                            $creation_to_update->creation_category_id = CreationCategory::where('filter_key', 'others')->first()->id;
                            break;

                        case 'Pull':
                            $creation_to_update->creation_category_id = CreationCategory::where('filter_key', 'sweaters')->first()->id;
                            break;

                        case 'Top':
                            $creation_to_update->creation_category_id = CreationCategory::where('filter_key', 'tops')->first()->id;
                            break;

                        case 'Echarpe & Gant':
                            $creation_to_update->creation_category_id = CreationCategory::where('filter_key', 'scarfs-gloves')->first()->id;
                            break;

                        case 'Sous-vêtement':
                            $creation_to_update->creation_category_id = CreationCategory::where('filter_key', 'underwear')->first()->id;
                            break;

                        case 'Robe':
                            $creation_to_update->creation_category_id = CreationCategory::where('filter_key', 'dresses')->first()->id;
                            break;

                        case 'Gilet':
                            $creation_to_update->creation_category_id = CreationCategory::where('filter_key', 'cardigans')->first()->id;
                            break;

                        case 'Pantalon':
                            $creation_to_update->creation_category_id = CreationCategory::where('filter_key', 'trousers')->first()->id;
                            break;

                        case 'Jeu':
                            $creation_to_update->creation_category_id = CreationCategory::where('filter_key', 'games')->first()->id;
                            break;

                        case 'Jupe':
                            $creation_to_update->creation_category_id = CreationCategory::where('filter_key', 'skirts')->first()->id;
                            break;

                        case 'Sac & Trousse':
                            $creation_to_update->creation_category_id = CreationCategory::where('filter_key', 'bags-cases')->first()->id;
                            break;

                        case 'T-shirt':
                            $creation_to_update->creation_category_id = CreationCategory::where('filter_key', 'tee-shirts')->first()->id;
                            break;
                        
                        default:
                            echo "<span style='color:red;'>!!! ".$creation['Category']." is missing. Creation ".$creation['New BENU Name']." was not updated.</span><br/>";
                            break;
                    }
                }

                //Assignment of types
                if ($creation['Unisex'] == 'VRAI' && !($creation_to_update->creation_groups->contains(CreationGroup::where('filter_key', 'unisex')->first()->id))) {
                    $creation_to_update->creation_groups()->attach(CreationGroup::where('filter_key', 'unisex')->first()->id);
                }

                if ($creation['Ladies'] == 'VRAI' && !($creation_to_update->creation_groups->contains(CreationGroup::where('filter_key', 'ladies')->first()->id))) {
                    $creation_to_update->creation_groups()->attach(CreationGroup::where('filter_key', 'ladies')->first()->id);
                }

                if ($creation['Men'] == 'VRAI' && !($creation_to_update->creation_groups->contains(CreationGroup::where('filter_key', 'gentlemen')->first()->id))) {
                    $creation_to_update->creation_groups()->attach(CreationGroup::where('filter_key', 'gentlemen')->first()->id);
                }

                if ($creation['Kids'] == 'VRAI' && !($creation_to_update->creation_groups->contains(CreationGroup::where('filter_key', 'kids')->first()->id))) {
                    $creation_to_update->creation_groups()->attach(CreationGroup::where('filter_key', 'kids')->first()->id);
                }

                if ($creation['Accessories'] == 'VRAI' && !($creation_to_update->creation_groups->contains(CreationGroup::where('filter_key', 'accessories')->first()->id))) {
                    $creation_to_update->creation_groups()->attach(CreationGroup::where('filter_key', 'accessories')->first()->id);
                }

                if ($creation['Home'] == 'VRAI' && !($creation_to_update->creation_groups->contains(CreationGroup::where('filter_key', 'home')->first()->id))) {
                    $creation_to_update->creation_groups()->attach(CreationGroup::where('filter_key', 'home')->first()->id);
                }


                if($creation_to_update->save()) {
                    echo "<span style='color:green;'>".$creation['New BENU Name']." was updated in the database.</span><br/>";
                } else {
                    echo "<span style='color:red;'>*** An error occured when updating ".$creation['New BENU Name']." in the database. Update aborted.</span><br/>";
                }
            } else {
                echo "<span style='color:red;'>*** ".$creation['New BENU Name']." was not found in the database.</span><br/>";
            }
        }

        // Display all creations with no category
        foreach (Creation::where('creation_category_id', null)->get() as $creation_with_no_category) {
            echo "<span style='color:orange;'>xxx ".$creation_with_no_category->name." does not have a category.</span><br/>";
            //echo "<span style='color:orange;'>o ".$creation_with_no_category->name."</span><br/>";
        }

        // For copy in Numbers
        // $articles_array = [];
        // foreach (Article::all() as $article) {
        //     array_push($articles_array, ['name' => $article->name, 'creation' => $article->creation->name, 'color' => $article->color->name, 'size' => $article->size->value]);
        // }
        // $articles_json = json_encode($articles_array, true);
        // echo $articles_json;
    }


    public function createModelsFolders()
    {
        $folders_created = [];
        $folders_not_created = [];

        
            $new_creations = json_decode(file_get_contents(asset('json_imports/creations_2.json')), true);

            foreach ($new_creations as $creation) {
                if ($creation['name'] != "" && $creation['google_drive_link'] != "") {
                    $path = public_path('images/pictures/articles/to_be_processed/'.strtoupper($creation['name']));

                    if(!File::isDirectory($path)){
                        File::makeDirectory($path);//, 0755, true, true
                        array_push($folders_created, strtoupper($creation['name']));
                    }
                } else {
                    array_push($folders_not_created, strtoupper($creation['name']));
                }
            }

            dd('Dossiers créés :', $folders_created, "Dossiers non créés :", $folders_not_created);
    }

    public function createArticlesFromPictures()
    {
        echo "<strong>------------  Creating articles from pictures...</strong><br/>";

        if (env('APP_ENV') != 'production') {
            // WARNING: will empty the table!! To be used with caution.
            Article::truncate();
            Photo::truncate();
            echo "<strong>--- All data deleted from Articles table in database ---</strong><br/>";
        }

        $pic_count = 0;
        $success_number = 0;
        $failure_number = 0;
        $missing_sizes_number = 0;
        $missing_colors = [];
        $missing_sizes = [];

        foreach (Creation::where('creation_category_id', '<>', null)->get() as $creation) {

            $article_counter = 1;
            $article_pic_count = 0;

            if (File::exists(public_path('images/pictures/articles/to_be_processed/'.strtoupper($creation->name)))) {
                // Check if folder with model name exists
                $all_pictures = File::allFiles(public_path('images/pictures/articles/to_be_processed/'.strtoupper($creation->name)));
                foreach ($all_pictures as $picture) {
                    $picture_info = explode(" ", $picture->getFilename());
                    if ($creation->is_accessory == '0') {
                        if(count($picture_info) == 10) {
                            $color_index = 2;
                            $size_index = 9;
                        } else {
                            $color_index = 1;
                            $size_index = 8;
                        }
                    } else {
                        if(count($picture_info) == 9) {
                            $color_index = 2;
                            $size_index = 8;
                        } else {
                            $color_index = 2;
                            $size_index = 100;
                        }
                    }

                    if(count($picture_info) >= 8 && count($picture_info) <= 10) {
                        $picture_colors = $picture_info[$color_index];
                        $picture_main_color = explode("_", $picture_colors)[0];
                        if (isset(explode("_", $picture_colors)[1])) {
                            $picture_secondary_color = explode("_", $picture_colors)[1];
                        } else {
                            $picture_secondary_color = null;
                        }
                        if (isset(explode("_", $picture_colors)[2])) {
                            $picture_third_color = explode("_", $picture_colors)[2];
                        } else {
                            $picture_third_color = null;
                        }
                        // Convert color to one of the existing colors based on Excel file equivalence
                        if (in_array($picture_main_color, ['beige', 'wool', 'caramel'])) {
                            $picture_main_color  = 'beige';
                        } elseif (in_array($picture_main_color, ['black', 'back', 'dark'])) {
                            $picture_main_color  = 'black';
                        } elseif (in_array($picture_main_color, ['babyblue', 'blue', 'cyan', 'darkblue', 'fadedblue',  'lightblue', 'marineblue', 'navy', 'skyblue', 'stoneblue', 'turquoise', 'blueish'])) {
                            $picture_main_color  = 'blue';
                        } elseif (in_array($picture_main_color, ['bronze', 'Brown', 'brown', 'brownish', 'darkbrown', 'maroon', 'marron', 'chestnut'])) {
                            $picture_main_color  = 'brown';
                        } elseif (in_array($picture_main_color, ['denim', 'jeans', 'jean'])) {
                            $picture_main_color  = 'denim';
                        } elseif (in_array($picture_main_color, ['darkgreen', 'green', 'greenish', 'khaki', 'militarygreen', 'mint', 'neongreen', 'olive', 'lightgreen', 'kaki'])) {
                            $picture_main_color  = 'green';
                        } elseif (in_array($picture_main_color, ['darkgrey', 'grey', 'greyish', 'jeangrey', 'lightgrey'])) {
                            $picture_main_color  = 'grey';
                        } elseif (in_array($picture_main_color, ['floral', 'flowers', 'Mosaique', 'colorful', 'various', 'multicolor'])) {
                            $picture_main_color  = 'multicolor';
                        } elseif (in_array($picture_main_color, ['pink', 'rose', 'baby_rose', 'salmon', 'lightrose'])) {
                            $picture_main_color  = 'pink';
                        } elseif (in_array($picture_main_color, ['deep_mauve', 'eggplant', 'lightpurple', 'mauve', 'purple', 'lavender'])) {
                            $picture_main_color  = 'purple';
                        } elseif (in_array($picture_main_color, ['bordeau', 'bordeaux', 'burgundy', 'darkred', 'red', 'firered'])) {
                            $picture_main_color  = 'red';
                        } elseif (in_array($picture_main_color, ['cream', 'creamwhite', 'white', 'whtie', 'creamy'])) {
                            $picture_main_color  = 'white';
                        } elseif (in_array($picture_main_color, ['golden', 'lightyellow', 'mustard', 'neonyellow', 'yellow'])) {
                            $picture_main_color  = 'yellow';
                        }

                        if (count($picture_info) >= 9 && isset($picture_info[$size_index])) {
                            $picture_size = explode(".", $picture_info[$size_index])[0];
                        } elseif(count($picture_info) == 8 && $creation->is_accessory == '1') {
                            $picture_size = "All";
                        } else {
                            $picture_size = 'invalid';
                        }
                        
                        if ($picture_size  == '2XL') {
                            $picture_size = 'XXL';
                        }
                        if ($picture_size  == 'XL(1)') {
                            $picture_size = 'XL';
                        }

                        if (strpos(strtolower($picture->getPath()), 'sold') !== false && $picture_size == '0') {
                            $picture_size = 'M';
                        }
                        
                        if (Color::where('name', $picture_main_color)->count() > 0 && Size::where('value', $picture_size)->count() > 0) {
                            $color_id  = Color::where('name', $picture_main_color)->first()->id;
                            $size_id = Size::where('value', $picture_size)->first()->id;

                            if (Article::where('creation_id', $creation->id)
                                         ->where('color_id', $color_id)
                                         ->where('secondary_color', $picture_secondary_color)
                                         ->where('third_color', $picture_third_color)
                                         ->where('size_id', $size_id)
                                         ->count() == 0) {

                                $article_pic_count = 0;

                                $new_article = new Article();
                                $new_article->name = ucfirst(strtolower($creation->name)).'-'.str_pad($article_counter, 3, '0', STR_PAD_LEFT);
                                $new_article->type  = "article";
                                $new_article->creation_id = $creation->id;
                                // if ($creation->is_accessory == '0') {
                                    $new_article->size_id = $size_id;
                                // }
                                $new_article->color_id = $color_id;
                                $new_article->secondary_color = $picture_secondary_color;
                                $new_article->third_color = $picture_third_color;
                                $new_article->singularity_lu = "";
                                $new_article->singularity_fr = "";
                                $new_article->singularity_en = "";
                                $new_article->singularity_de = "article.singularity-".strtolower($creation->name)."-".$new_article->name;
                                $new_article->translation_key = "article.singularity-".strtolower($creation->name)."-".$new_article->name;
                                $new_article->creation_date = $picture_info[6];
                                if ($new_article->save()) {
                                    $article_counter ++;
                                    echo "<span style='color: green; padding-top: 5px;'>New article ".$new_article->name." created for model ".strtoupper($creation->name).", with color ".$picture_main_color.", secondary color ". $picture_secondary_color ." and size ".$picture_size.", from file ".$picture->getFilename()."</span><br/>";
                                }
                            }

                            if(Article::where('creation_id', $creation->id)
                                         ->where('color_id', $color_id)
                                         ->where('secondary_color', $picture_secondary_color)
                                         ->where('third_color', $picture_third_color)
                                         ->where('size_id', $size_id)
                                         ->count() == 1) {

                                $new_article = Article::where('creation_id', $creation->id)
                                         ->where('color_id', $color_id)
                                         ->where('secondary_color', $picture_secondary_color)
                                         ->where('third_color', $picture_third_color)
                                         ->where('size_id', $size_id)
                                         ->first();

                                $article_pic_count ++;

                                $new_photo = new Photo();
                                $new_photo->file_name = 'processed/'.$creation->name.'/'.$new_article->name.'-'.rand(100, 999).''.$article_pic_count.'.png';
                                $new_photo->use_for_model = 1;
                                $new_photo->title = $creation->name." by BENU COUTURE - Article ".$article_counter;
                                $new_photo->author = "BENU Village Esch Asbl";

                                $img = Image::make($picture);
                                if ($img->width() > $img->height()) {
                                    $img->rotate(-90);
                                }
                                $img->resize(560, 747, function ($constraint) {
                                    $constraint->aspectRatio();
                                    $constraint->upsize();
                                });

                                // create a new Image instance for inserting a watermark
                                $watermark = Image::make(public_path('images/pictures/logo_benu_couture_watermark.png'));
                                $watermark->resize(56, 75, function ($constraint) {
                                    $constraint->aspectRatio();
                                    $constraint->upsize();
                                });
                                $img->insert($watermark, 'bottom-right', 20, 20);

                                $save_path = public_path('images/pictures/articles/processed/'.$creation->name);

                                if(!File::isDirectory($save_path)){
                                    File::makeDirectory($save_path);//, 0755, true, true
                                }

                                if ($new_photo->save() && $img->save(public_path('images/pictures/articles/'.$new_photo->file_name))) {

                                    $success_number ++;
                                    echo "<span style='color: green; padding-left: 10px;'>New picture added for article ".$new_article->name." of model ".strtoupper($creation->name).", from file ".$picture->getFilename()."</span><br/>";

                                    //$new_article->photos()->detach();
                                    $new_article->photos()->attach($new_photo->id);

                                    // Determine if article is sold or in stock. Only handles Benu Esch shop.
                                    //$new_article->shops()->detach();
                                    if (!($new_article->shops()->contains(Shop::where('filter_key', 'benu-esch')->first()->id))) {
                                        if (strpos(strtolower($picture->getPath()), 'sold') !== false) {
                                            $new_article->shops()->attach(1, ['stock' => '0']);
                                        } else {
                                            $new_article->shops()->attach(1, ['stock' => '1']);
                                        }
                                    }
                                }
                            }
                        } else {
                            $failure_number ++;
                        }

                        // if (Color::where('name', $picture_main_color)->count() == 0) {
                        //     if (!in_array($picture_main_color, $missing_colors)) {
                        //         array_push($missing_colors, $picture_main_color);
                        //         echo "Couleur manquante : ".$picture_main_color."<br/>";
                        //     }
                        // }

                        if (Size::where('value', $picture_size)->count() == 0) {
                            if ($picture_size == '0') {
                                echo "Missing size for file ".$picture->getFilename()."<br/>";
                                $missing_sizes_number ++;
                            }
                            // if (!in_array($picture_size, $missing_sizes) && $picture_size != '0') {
                            //     array_push($missing_sizes, $picture_size);
                            //     echo "Missing size: ".$picture_size."<br/>";
                            // }
                        }
                    } else {
                        echo "<span style='color: red;'>*** Wrong file name format for picture ".$picture->getFilename()." of creation ".strtoupper($creation->name)."</span><br/>";
                        // echo "<span style='color: red;'>".$picture->getFilename()." of creation ".strtoupper($creation->name)."</span><br/>";
                        $failure_number ++;
                    }
                    // echo "<br/>".$picture->getFilename()."<br/>";
                    // echo $picture->getPath()."<br/>";
                    $pic_count ++;
                }
            }
        }
        $success_rate = round(($success_number / $pic_count) * 100);
        echo "Nombre de photos non vendues avec la taille 0 : ".$missing_sizes_number."<br/>";
        echo "Taux de réussite : ".$success_rate."%";
    }

    public function importTranslations()
    {
        $raw_translations = json_decode(file_get_contents(asset('json_imports/translations.json')), true);

        echo "<br/><br/><strong>----------------  Importing translations from Sophie's file...</strong><br/>";

        foreach ($raw_translations as $translation) {
            $page = strtolower(explode(".", $translation['key'])[0]);
            $key = strtolower(explode(".", $translation['key'])[1]);

            if (Translation::where('page', $page)->where('key', $key)->count() > 0) {
                // Case translation key is found in the database
                $updated_translation = Translation::where('page', $page)->where('key', $key)->first();
                if (strpos($translation['fr'], '> lien') !== false || strpos($translation['fr'], '> link') !== false) {
                    echo "Lien à mettre à jour dans le code pour ".$translation['key'].'<br/>';
                } 

                // Import only if translation exists
                if ($translation['fr'] != "") {
                    $updated_translation->fr = $translation['fr'];
                } else {
                    echo "<span style='color: red;'> >>> Translation missing for ".$page.'.'.$key." in language FR</span><br/>";
                }
                if ($translation['en'] != "") {
                    $updated_translation->en = $translation['en'];
                } else {
                    echo "<span style='color: red;'> >>> Translation missing for ".$page.'.'.$key." in language EN</span><br/>";
                }
                if ($translation['de'] != "") {
                    $updated_translation->de = $translation['de'];
                } else {
                    echo "<span style='color: red;'> >>> Translation missing for ".$page.'.'.$key." in language DE</span><br/>";
                }
                if ($translation['lu'] != "") {
                    $updated_translation->lu = $translation['lu'];
                } else {
                    echo "<span style='color: red;'> >>> Translation missing for ".$page.'.'.$key." in language LU</span><br/>";
                }
                
                $updated_translation->translation_key = $translation['key'];
                if ($updated_translation->save()) {
                    echo "<span style='color: green; padding-left: 10px;'>Translation key found in database for ".$page.'.'.$key."</span><br/>";
                }
            } else {
                // Handle translations persisted in database
                // Includes colors, types, categories, shops description
                if ($page == 'colors') {
                    $new_color = Color::firstOrNew(['name' => $key]);
                    $new_color->name = $key;

                    $new_color_translation = Translation::firstOrNew(['page' => 'colors', 'key' => $key]);
                    $new_color_translation->fr = $translation['fr'];
                    $new_color_translation->en = $translation['en'];
                    $new_color_translation->de = $translation['de'];
                    $new_color_translation->lu = $translation['lu'];
                    $new_color_translation->translation_key = $page.'.'.$key;

                    if($new_color->save()  && $new_color_translation->save()) {
                        echo "<span style='color: green; padding-left: 10px;'>Color ".$key." added and translated in the database</span><br/>";
                    }
                } elseif ($page == 'type') {
                    $new_type = CreationGroup::firstOrNew(['filter_key' => $key]);
                    $new_type->name_fr = $translation['fr'];
                    $new_type->name_en = $translation['en'];
                    $new_type->name_de = $translation['de'];
                    $new_type->name_lu = $translation['lu'];
                    $new_type->translation_key = $page.'.'.$key;
                    if ($new_type->save()) {
                        echo "<span style='color: green; padding-left: 10px;'>Type ".$key." translated in the database</span><br/>";
                    }
                } elseif ($page == 'category') {
                    $new_category = CreationCategory::firstOrNew(['filter_key' => $key]);
                    $new_category->name_fr = $translation['fr'];
                    $new_category->name_en = $translation['en'];
                    $new_category->name_de = $translation['de'];
                    $new_category->name_lu = $translation['lu'];
                    $new_category->translation_key = $page.'.'.$key;
                    if ($new_category->save()) {
                        echo "<span style='color: green; padding-left: 10px;'>Category ".$key." translated in the database</span><br/>";
                    }
                } elseif ($page == 'shops' && $key == 'description-benu-village') {
                    $new_shop = Shop::where('filter_key', 'benu-esch')->first();
                    $new_shop->description_de = $translation['de'];
                    $new_shop->description_fr = $translation['fr'];
                    $new_shop->description_lu = $translation['lu'];
                    $new_shop->description_en = $translation['en'];
                    if ($new_shop->save()) {
                        echo "<span style='color: green; padding-left: 10px;'>Shop description for BENU Village translated in the database</span><br/>";
                    }
                } elseif ($page == 'services' && strpos($key, 'faq-group') !== false) {
                    $new_faq_info = new Translation();
                    $new_faq_info->page = $page;
                    $new_faq_info->key = $key;
                    $new_faq_info->fr = $translation['fr'];
                    $new_faq_info->en = $translation['en'];
                    $new_faq_info->lu = $translation['lu'];
                    $new_faq_info->de = $translation['de'];
                    $new_faq_info->translation_key = $page.'.'.$key;
                    if ($new_faq_info->save()) {
                        echo "<span style='color: green; padding-left: 10px;'>New element ".$key." added in FAQ</span><br/>";
                    }
                } else {
                    // Case not found at all
                    echo "<span style='color: red;'>*** Not found in Translation database: ".$page.'.'.$key."</span><br/>";
                }
            }
        }

    }
}