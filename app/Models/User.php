<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;

use App\Notifications\BenuResetPasswordNotification;

use App\Models\ContactMessage;

use Laravel\Cashier\Billable;

use Illuminate\Support\Facades\Mail;

use App\Mail\NewPasswordLink;

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
        'favorite_language',
        'last_conditions_agreed',
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

    // Newsletter status details
    // 'newsletter' value:
    // 0 => No subscription, user not in MailChimp list
    // 1 => Subscription requested
    // 2 => Subscribed, user in MailChimp list
    // 3 => Cancellation requested

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
        if ($this->first_name) {
            return $this->first_name;
        }
        return "";
    }

    /**
   * Get the user's full name.
   *
   * @return string
   */ 
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function canAccessFilament(): bool
    {
        $authorized_roles = [
            'admin',
            'assistant',
            'vendor',
            'newsletter-manager',
            'photo-upload',
            'translator',
            'workshop',
        ];
        return in_array($this->role, $authorized_roles);
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
        if(App::environment('stage')) {
            return $this->belongsToMany('App\Models\Article', 'benu_common_stage.couture_article_user');
        }
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

    public function badges() 
    {
        return $this->belongsToMany(Badge::class)->withTimestamps();
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        // For customized password reset e-mail, bypass framework process
        $email = $this->getEmailForPasswordReset();
        $route = url(route('password.reset-'.session('locale'), [
            'locale' => session('locale'),
            'token' => $token,
            'email' => $email,
        ], false));

        Mail::mailer('smtp_admin')->to($email)->send(new NewPasswordLink($route));

        return true;

        // $this->notify(new BenuResetPasswordNotification($token));
    }

    public function usesSalesInterface()
    {
        $sales_roles = [
            'admin',
            'assistant',
            'vendor',
            'shop',
        ];
        return in_array($this->role, $sales_roles);
    }

    public function canCheckNews()
    {
        $news_roles = [
            'admin',
            'assistant',
            'vendor',
        ];
        return in_array($this->role, $news_roles);
    }

    public function isBenuStaff()
    {
        $benu_roles = [
            'admin',
            'assistant',
            'vendor',
            'shop',
            'newsletter-manager',
            'photo-upload',
            'translator',
            'workshop',
        ];
        return in_array($this->role, $benu_roles);
    }
}
