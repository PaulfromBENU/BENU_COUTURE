<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    // Choice of the database
    protected $connection = 'mysql';

    protected $guarded = ['id'];

    public function articles()
    {
        return $this->belongsToMany(Article::class)->withTimestamps();
    }
}
