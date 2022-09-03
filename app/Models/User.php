<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use Symfony\Component\Intl\Countries;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'gender_id',
        'country_code',
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
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // * Scopes

    public function scopeMonthly(Builder $query)
    {
        $query->where('created_at', '>=', now()->startOf('month'));
    }


    // * Relationships

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }


    // * Accessors

    public function getResourceUrlAttribute()
    {
        return route('users.show', $this->getKey());
    }

    public function getIdentifierAttribute()
    {
        return "#{$this->getKey()} {$this->name}";
    }

    public function getNameAttribute()
    {
        return "$this->first_name $this->last_name";
    }

    public function getCountryAttribute()
    {
        return Countries::getName($this->country_code);
    }
}
