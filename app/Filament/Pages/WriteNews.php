<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Livewire\WithFileUploads;

use Intervention\Image\Facades\Image;

use App\Models\NewsArticle;

class WriteNews extends Page
{
    use WithFileUploads;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static string $view = 'filament.pages.write-news';

    protected static ?string $title = 'Write a new article';
 
    protected static ?string $navigationLabel = 'Write News';
     
    protected static ?string $slug = 'write-news';

    protected static ?string $navigationGroup = 'News';

    protected static ?int $navigationSort = 1;

    public $show_general_info = 0;
    public $show_article_content = 0;
    public $show_pending_articles = 0;
    public $show_online_articles = 0;
    public $number_of_elements = 0;
    public $article_id = 0;

    public $pending_articles;

    public $article_title_fr = "";
    public $article_title_de = "";
    public $article_title_lu = "";
    public $article_title_en = "";

    public $article_slug_fr = "";
    public $article_slug_de = "";
    public $article_slug_lu = "";
    public $article_slug_en = "";

    public $article_tag_1_fr = "";
    public $article_tag_1_de = "";
    public $article_tag_1_lu = "";
    public $article_tag_1_en = "";

    public $article_tag_2_fr = "";
    public $article_tag_2_de = "";
    public $article_tag_2_lu = "";
    public $article_tag_2_en = "";

    public $article_tag_3_fr = "";
    public $article_tag_3_de = "";
    public $article_tag_3_lu = "";
    public $article_tag_3_en = "";

    public $article_summary_fr = "";
    public $article_summary_de = "";
    public $article_summary_lu = "";
    public $article_summary_en = "";

    public $article_seo_title_fr = "";
    public $article_seo_title_de = "";
    public $article_seo_title_lu = "";
    public $article_seo_title_en = "";

    public $article_seo_desc_fr = "";
    public $article_seo_desc_de = "";
    public $article_seo_desc_lu = "";
    public $article_seo_desc_en = "";

    public $main_photo;

    public function mount()
    {
        $this->refreshData();
    }

    public function refreshData()
    {
        $this->pending_articles = NewsArticle::where('is_ready', '0')->get();
    }

    public function fillArticleData($article_id)
    {
        // Update all fields upon selection of a specific article for update
        $this->article_id = $article_id;
        $news = NewsArticle::find($article_id);
        $this->article_title_fr = $news->title_fr;
        $this->article_title_de = $news->title_de;
        $this->article_title_lu = $news->title_lu;
        $this->article_title_en = $news->title_en;

        $this->article_slug_fr = $news->slug_fr;
        $this->article_slug_de = $news->slug_de;
        $this->article_slug_lu = $news->slug_lu;
        $this->article_slug_en = $news->slug_en;

        $this->article_tag_1_fr = $news->tag_1_fr;
        $this->article_tag_1_de = $news->tag_1_de;
        $this->article_tag_1_lu = $news->tag_1_lu;
        $this->article_tag_1_en = $news->tag_1_en;

        $this->article_tag_2_fr = $news->tag_2_fr;
        $this->article_tag_2_de = $news->tag_2_de;
        $this->article_tag_2_lu = $news->tag_2_lu;
        $this->article_tag_2_en = $news->tag_2_en;

        // $this->article_tag_3_fr = $news->tag_3_fr;
        // $this->article_tag_3_de = $news->tag_3_de;
        // $this->article_tag_3_lu = $news->tag_3_lu;
        // $this->article_tag_3_en = $news->tag_3_en;

        $this->article_summary_fr = $news->summary_fr;
        $this->article_summary_de = $news->summary_de;
        $this->article_summary_lu = $news->summary_lu;
        $this->article_summary_en = $news->summary_en;

        $this->article_seo_title_fr = $news->seo_title_fr;
        $this->article_seo_title_de = $news->seo_title_de;
        $this->article_seo_title_lu = $news->seo_title_lu;
        $this->article_seo_title_en = $news->seo_title_en;

        $this->article_seo_desc_fr = $news->seo_desc_fr;
        $this->article_seo_desc_de = $news->seo_desc_de;
        $this->article_seo_desc_lu = $news->seo_desc_lu;
        $this->article_seo_desc_en = $news->seo_desc_en;

        $this->main_photo = $news->main_photo;

        $this->refreshData();
        $this->show_general_info = 1;
    }

    public function sendOnline($article_id)
    {
        $news = NewsArticle::find($article_id);
        $news->is_ready = 1;
        if ($news->save()) {
            $this->refreshData();
        }
    }

    public function updatedMainPhoto()
    {
        $this->validate([
            'main_photo' => 'image|max:6144', // 6MB Max
        ]);
    }

    public function toggleGeneralInfo($value)
    {
        if (in_array($value, [0, 1])) {
            $this->show_general_info = $value;
        }
    }

    public function toggleArticleContent($value)
    {
        if (in_array($value, [0, 1])) {
            $this->show_article_content = $value;
        }
    }

    public function togglePendingArticles($value)
    {
        if (in_array($value, [0, 1])) {
            $this->show_pending_articles = $value;
        }
    }

    public function toggleOnlineArticles($value)
    {
        if (in_array($value, [0, 1])) {
            $this->show_online_articles = $value;
        }
    }

    public function createNewArticle()
    {
        if ($this->article_id == 0) {
            $news = new NewsArticle();
        } else {
            $news = NewsArticle::find($this->article_id);
        }

        // General data creation or update
        $news->title_fr = $this->article_title_fr;
        $news->title_de = $this->article_title_de;
        $news->title_lu = $this->article_title_lu;
        $news->title_en = $this->article_title_en;

        $news->slug_fr = $this->article_slug_fr;
        $news->slug_de = $this->article_slug_de;
        $news->slug_lu = $this->article_slug_lu;
        $news->slug_en = $this->article_slug_en;

        $news->tag_1_fr = $this->article_tag_1_fr;
        $news->tag_1_de = $this->article_tag_1_de;
        $news->tag_1_lu = $this->article_tag_1_lu;
        $news->tag_1_en = $this->article_tag_1_en;

        $news->tag_2_fr = $this->article_tag_2_fr;
        $news->tag_2_de = $this->article_tag_2_de;
        $news->tag_2_lu = $this->article_tag_2_lu;
        $news->tag_2_en = $this->article_tag_2_en;

        // $news->tag_3_fr = $this->article_tag_3_fr;
        // $news->tag_3_de = $this->article_tag_3_de;
        // $news->tag_3_lu = $this->article_tag_3_lu;
        // $news->tag_3_en = $this->article_tag_3_en;

        $news->summary_fr = $this->article_summary_fr;
        $news->summary_de = $this->article_summary_de;
        $news->summary_lu = $this->article_summary_lu;
        $news->summary_en = $this->article_summary_en;

        $news->seo_title_fr = $this->article_seo_title_fr;
        $news->seo_title_de = $this->article_seo_title_de;
        $news->seo_title_lu = $this->article_seo_title_lu;
        $news->seo_title_en = $this->article_seo_title_en;

        $news->seo_desc_fr = $this->article_seo_desc_fr;
        $news->seo_desc_de = $this->article_seo_desc_de;
        $news->seo_desc_lu = $this->article_seo_desc_lu;
        $news->seo_desc_en = $this->article_seo_desc_en;

        // Main photo handling
        if(is_file($this->main_photo)) {
            $img = Image::make($this->main_photo);
            $file_name = 'news-main-picture-'.$this->article_slug_en.'.'.$this->main_photo->getClientOriginalExtension();
            if ($img->width() < $img->height()) {
                $img->rotate(90);
            }
            $img->resize(1000, 850, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            if($img->save(public_path('images/pictures/news/'.$file_name))) {
                $news->main_photo = $file_name;
            }
        }

        if ($news->save()) {
            $this->resetExcept('pending_articles');
            $this->notify('success', 'The news was successfully created :)');
        }
    }
}
