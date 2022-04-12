<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;

use App\Models\ContactMessage;

use Laravel\Cashier\Billable;

class User extends Authenticatable implements HasName, FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Billable;

    // Choice of the database
    protected $connection = 'mysql_common';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role',
        'gender',
        'company',
        'phone',
        'first_name',
        'last_name',
        'email',
        'password',
        'is_over_18',
        'legal_ok',
        'newsletter',
        'origin',
        'client_number',
        'general_comment',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    // For Filament
    public function getFilamentName(): string
    {
        return $this->first_name;
    }

    /**
   * Get the user's full name.
   *
   * @return string
   */ 
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function canAccessFilament(): bool
    {
        return ($this->role == 'admin' || $this->role == 'vendor' || $this->role == 'editor');
    }

    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }

    public function kulturpasses()
    {
        return $this->hasMany('App\Models\Kulturpass');
    }

    public function wishlistArticles()
    {
        return $this->belongsToMany('App\Models\Article', 'benu_common.couture_article_user');
    }

    public function contactMessages()
    {
        return ContactMessage::where('email', $this->email);
    }

    public function openContactMessages()
    {
        return ContactMessage::where('email', $this->email)->where('closed', '0');
    }

    public function vouchers()
    {
        return $this->hasMany(Voucher::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
