<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Choice of the database
    protected $connection = 'mysql_common';

    public function address()
    {
        return $this->hasOne(Address::class, 'address_id');
    }

    public function invoice_address()
    {
        return $this->hasOne(Address::class, 'invoice_address_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function couture_articles()
    {
        return $this->hasManyThrough(Article::class, Cart::class);
    }
}
