<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
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
        'slug', 'name', 'description',
    ];

    /**
     * Role has many users.
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user');
    }
}
