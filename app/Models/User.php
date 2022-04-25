<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'lastname',
        'email_verified_at',
        'company_id',
        'location',
        'phone_number',
        'is_system_admin',
        'is_customer',
        'is_farmer'
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

    protected $with = ['company'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_system_admin'   => 'boolean',
        'is_farmer'         => 'boolean',
        'is_customer'       => 'boolean'
    ];

    public function findForPassport($username)
    {
        return self::where('username', $username)->first(); // change column name whatever you use in credentials
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

}
