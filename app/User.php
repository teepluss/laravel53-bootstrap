<?php

namespace App;

use App\Traits\AccessControl;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, AccessControl;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'permissions' => 'array'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * User has many roles.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    /**
     * User has many posts.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
