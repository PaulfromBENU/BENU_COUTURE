<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreationCategory extends Model
{
    use HasFactory;

    // Choice of the database
    protected $connection = 'mysql';

    public function creations()
    {
        return $this->hasMany('App\Models\Creation');
    }
}
