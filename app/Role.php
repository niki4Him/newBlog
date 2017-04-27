<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [

    	'name', 'slug', 'permissions',

    ];

    protected $casts = [
    	'permissions' => 'array',
    ];

    public function users()
    {
    	return $this->belongsToMany(User::class, 'role_users');
    }

    public function hasAccess(array $permissions) : bool
    {
    	foreach ($permissions as $permission) {
    		if ($this->hasPermission($permission)) 
    			return true;
    	}

    		return false;

    }

    public function hasPermission(string $permission) : bool
    {
    	return $this->permissions[$permission] ?? false;
    }



    public function inRole(string $roleSlug)
    {
        return $this->roles()->where('slug', $roleSlug)->count() == 1;
    }
}
