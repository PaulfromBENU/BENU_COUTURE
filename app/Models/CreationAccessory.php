<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreationAccessory extends Model
{
    use HasFactory;

    // Choice of the database
    protected $connection = 'mysql';

    // public function creation()
    // {
    //     return $this->belongsTo('App\Models\Creation');
    // }
}
