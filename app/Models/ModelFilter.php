<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelFilter extends Model
{
    use HasFactory;

    // Choice of the database
    protected $connection = 'mysql';

    protected $fillable = ['session_id'];
}
