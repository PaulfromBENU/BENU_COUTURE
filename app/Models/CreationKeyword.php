<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreationKeyword extends Model
{
    use HasFactory;

    // Choice of the database
    protected $connection = 'mysql';

    protected $table = 'creation_keyword';
}
