<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creation extends Model
{
    use HasFactory;

    // Choice of the database
    protected $connection = 'mysql';

    public function creation_group()
    {
        return $this->belongsTo('App\Models\CreationGroup');
    }

    public function creation_category()
    {
        return $this->belongsTo('App\Models\CreationCategory');
    }

    public function partner()
    {
        return $this->belongsTo('App\Models\Partner');
    }

    // public function creation_accessories()
    // {
    //     return $this->hasMany('App\Models\CreationAccessory');
    // }

    public function articles()
    {
        return $this->hasMany('App\Models\Article');
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class);
    }

    // public function available_articles()
    // {
    //     // Check if articles are present for this creation, and if stock remains in any of the shops
    //     $available_articles = collect([]);
    //     foreach($this->articles() as $article) {
            
    //     }
    //     return $available_articles;
    // }
}
