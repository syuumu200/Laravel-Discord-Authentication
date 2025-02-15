<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'username',
        'discriminator',
        'email',
        'avatar',
        'verified',
        'locale',
        'mfa_enabled',
        'refresh_token'
    ];

    /**
     * Indicates if the model's ID is auto-incrementing.
     * 
     * @var boolean
     */
    public $incrementing = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'refresh_token',
        'remember_token'
    ];

    protected $appends = [
        'string_id'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'discriminator' => 'integer',
        'string_id' => 'string',
        'verified' => 'boolean',
        'mfa_enabled' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected function stringId(): Attribute
    {
        return Attribute::make(
            get: fn () => (string) $this->id,
        );
    }
}
