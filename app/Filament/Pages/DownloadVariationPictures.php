<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\File;

use App\Models\Article;
use App\Models\Creation;

use ZipArchive;

// use File;

class DownloadVariationPictures extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-download';

    protected static string $view = 'filament.pages.download-variation-pictures';

    protected static ?string $title = 'Download variations pictures';
 
    protected static ?string $navigationLabel = 'Photos Download';
     
    protected static ?string $slug = 'download-photos';

    protected static ?string $navigationGroup = 'Creations & Variations';

    protected static ?int $navigationSort = 7;

    public $all_creations;
    public $computed_variations;
    public $selected_variation;
    public $photos;
    public $creation_id;
    public $variation_id;

    public function mount()
    {
        $this->loadStaticData();
        $this->computed_variations = collect([]);
        $this->photos = [];
        $this->selected_variation = null;
        $this->creation_id = 0;
        $this->variation_id = 0;

        // Clean directory to avoid useless storage of data
        File::cleanDirectory(public_path('images/pictures_downloads'));
    }

    public function loadStaticData()
    {
        $this->all_creations = Creation::all()->sortBy('name');
    }

    public function adaptVariations($creation_id)
    {
        $this->loadStaticData();
        if ($creation_id == '0') {
            $this->computed_variations = collect([]);
            $this->photos = [];
            $this->selected_variation = null;
            $this->variation_id = 0;
        } elseif (Creation::find($creation_id)) {
            $this->computed_variations = Creation::find($creation_id)->articles;
        }
    }

    public function loadVariationPictures()
    {
        if (Article::find($this->variation_id)) {
            $this->selected_variation = Article::find($this->variation_id);

            foreach ($this->selected_variation->photos()->get() as $photo) {
                array_push($this->photos, $photo->file_name);
            }
        } else {
            $this->selected_variation = null;
            $this->photos = [];
        }
    }

    public function downloadPictures()
    {
        $zip = new \ZipArchive();
        $file_name = str_replace(' ', '-', $this->selected_variation->name).'.zip';

        if ($zip->open(public_path('images/pictures_downloads/'.$file_name), \ZipArchive::CREATE) | \ZipArchive::OVERWRITE) {
            foreach ($this->photos as $photo) {
                $zip->addFile(public_path('images/pictures/articles/'.$photo), explode("/", $photo)[2]);
            }
            $zip->close();
        }

        return response()->download(public_path('images/pictures_downloads/'.$file_name));
    }
}
