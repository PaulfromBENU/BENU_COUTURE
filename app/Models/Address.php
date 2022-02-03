<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    // Choice of the database
    protected $connection = 'mysql_common';

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
