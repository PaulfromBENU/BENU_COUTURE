<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

use App\Models\Creation;
use App\Models\Keyword;

class CreationKeywords extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.creation-keywords';

    protected static ?string $title = 'Create, update or delete keywords for Creations';
 
    protected static ?string $navigationLabel = 'Creations Keywords';
     
    protected static ?string $slug = 'creations-keywords';

    protected static ?string $navigationGroup = 'Creations & Variations';

    protected static ?int $navigationSort = 2;

    protected static function shouldRegisterNavigation(): bool
    {
        $authorized_roles = [
            'admin',
            'translator',
            'workshop',
        ];
        return in_array(auth()->user()->role, $authorized_roles);
    }

    public $all_creations;
    public $creation_name;
    public $selected_creation;
    public $existing_keywords;
    public $keywords;
    public $new_keywords;
    public $new_keywords_count;
    public $deleted_keywords;
    public $example_photo;

    public function mount()
    {
        $this->all_creations = Creation::orderBy('name', 'asc')->get();
        $this->creation_name = 'none-0';
        $this->initializeFields();
    }

    public function initializeFields()
    {
        $this->selected_creation = null;
        $this->keywords = [];
        $this->new_keywords = [
            '1' => [
                'lu' => '',
                'fr' => '',
                'en' => '',
                'de' => ''
            ]
        ];
        $this->new_keywords_count = 1;
        $this->deleted_keywords = [];
        $this->example_photo = "";
    }

    public function updatedCreationName()
    {
        $this->initializeFields();
        if (Creation::where('name', $this->creation_name)->count() > 0) {
            $this->selected_creation = Creation::where('name', $this->creation_name)->first();
            $this->existing_keywords = $this->selected_creation->keywords;
            foreach ($this->existing_keywords as $keyword) {
                $this->keywords[$keyword->id]['lu'] = $keyword->keyword_lu;
                $this->keywords[$keyword->id]['fr'] = $keyword->keyword_fr;
                $this->keywords[$keyword->id]['en'] = $keyword->keyword_en;
                $this->keywords[$keyword->id]['de'] = $keyword->keyword_de;
            }
            if ($this->selected_creation->articles()->count() > 0 && $this->selected_creation->articles()->first()->photos()->count() > 0) {
                $this->example_photo = $this->selected_creation->articles()->first()->photos()->first()->file_name;
            }
        } else {
            $this->creation_name = 'none-0';
            $this->initializeFields();
        }
    }

    public function deleteKeyword($keyword_id)
    {
        if ($this->selected_creation->keywords()->find($keyword_id)) {
            array_push($this->deleted_keywords, $keyword_id); 
        }
    }

    public function addKeyword()
    {
        $this->new_keywords_count += 1;
    }

    public function updateKeywords()
    {
        foreach ($this->keywords as $id => $keywords_array) {
            if (in_array($id, $this->deleted_keywords)) {
                $this->selected_creation->keywords()->detach($id);
            } elseif($this->selected_creation->keywords()->find($id)) {
                $keyword_to_update = $this->selected_creation->keywords()->find($id);
                $keyword_to_update->keyword_lu = $keywords_array['lu'];
                $keyword_to_update->keyword_fr = $keywords_array['fr'];
                $keyword_to_update->keyword_de = $keywords_array['de'];
                $keyword_to_update->keyword_en = $keywords_array['en'];
                $keyword_to_update->save();
            }
        }

        $missing_words = 0;
        foreach ($this->new_keywords as $new_keyword_array) {
            if ($new_keyword_array['fr'] !== "" 
                || $new_keyword_array['lu'] !== "" 
                || $new_keyword_array['de'] !== "" 
                || $new_keyword_array['en'] !== "") {

                $new_keyword = new Keyword();
                $new_keyword->keyword_fr = $new_keyword_array['fr'];

                $new_keyword->keyword_de = $new_keyword_array['de'];

                $new_keyword->keyword_lu = $new_keyword_array['lu'];

                $new_keyword->keyword_en = $new_keyword_array['en'];

                if ($new_keyword->save()) {
                    $this->selected_creation->keywords()->attach($new_keyword->id);
                }
            } else {
                $missing_words = 1;
            }
        }

        // if ($missing_words) {
        //     $this->notify('success', 'Existing keywords were updated successfully :)');
        //     $this->notify('danger', 'Keywords translations are missing. Please fill all four languages.');
        // } else {
            $this->notify('success', 'Keywords updated successfully :)');
            $this->creation_name = 'none-0';
            $this->initializeFields();
        // }
    }
}
