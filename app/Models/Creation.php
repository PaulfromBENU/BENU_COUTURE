<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creation extends Model
{
    use HasFactory;

    // Choice of the database
    protected $connection = 'mysql';

    protected $guarded = ['id'];

    public function creation_groups()
    {
        return $this->belongsToMany('App\Models\CreationGroup');
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
}
