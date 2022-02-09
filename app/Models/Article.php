<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;

class Article extends Model
{
    use HasFactory;

    // Choice of the database
    protected $connection = 'mysql';

    public function creation()
    {
        return $this->belongsTo('App\Models\Creation');
    }

    public function color()
    {
        return $this->belongsTo('App\Models\Color');
    }

    public function size()
    {
        return $this->belongsTo('App\Models\Size');
    }

    public function shops()
    {
        return $this->belongsToMany(Shop::class)->withPivot('stock')->withTimestamps();
    }

    public function photos()
    {
        return $this->belongsToMany(Photo::class)->withTimestamps();
    }
}
