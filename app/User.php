<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function isSuperAdmin()
    {
        return $this->role == Role::where('name', 'super_admin')->first();
    }

    public function isAdmin()
    {
        return $this->role == Role::where('name', 'admin')->first();
    }

    public function isUser()
    {
        return $this->role == Role::where('name', 'user')->first();
    }

    public function isManager()
    {
        return $this->role == Role::where('name', 'manager')->first();
    }
}
