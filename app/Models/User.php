<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $fillable = ['name', 'email', 'phone', 'password', 'role'];

    public function packages()
    {
        return $this->hasMany(Package::class, 'courier_id');
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    // public function packages() {
    //     return $this->hasMany(Package::class, 'courier_id');
    // }
    
}
