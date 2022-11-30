<?php

namespace App\Http\Livewire\News;

use Livewire\Component;

use App\Models\NewsArticle;

class AllNews extends Component
{
    protected $listeners = ['tagFilterUpdate' => 'updateNews'];

    public $all_news;
    public $max_number = 12;
    public $news_count;

    public function mount()
    {
        $this->news_count = NewsArticle::query()
                            ->where('is_ready', '1')
                            ->count();
    }

    public function updateNews($tag)
    {
        // Tag in English used for filtering
        if ($tag !== 'none') {
            $this->all_news = NewsArticle::query()
                            ->where('tag_1_'.session('locale'), $tag)
                            ->orWhere('tag_2_'.session('locale'), $tag)
                            ->orWhere('tag_3_'.session('locale'), $tag)
                            ->where('is_ready', '1')
                            ->orderBy('updated_at', 'desc')
                            ->limit($this->max_number, 0)
                            ->get();
            $this->news_count = NewsArticle::query()
                            ->where('tag_1_'.session('locale'), $tag)
                            ->orWhere('tag_2_'.session('locale'), $tag)
                            ->orWhere('tag_3_'.session('locale'), $tag)
                            ->where('is_ready', '1')
                            ->count();
        } else {
            $this->all_news = NewsArticle::query()
                            ->where('is_ready', '1')
                            ->orderBy('updated_at', 'desc')
                            ->limit($this->max_number, 0)
                            ->get();
            $this->news_count = NewsArticle::query()
                            ->where('is_ready', '1')
                            ->count();
        }
    }

    public function showMore()
    {
        if ($this->max_number < $this->news_count) {
            $this->max_number += 6;
        }
    }

    public function render()
    {
        return view('livewire.news.all-news');
    }
}
