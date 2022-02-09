<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    // Choice of the database
    protected $connection = 'mysql';

    public function articles()
    {
        return $this->belongsToMany(Article::class)->withPivot('stock')->withTimestamps();
    }
}
