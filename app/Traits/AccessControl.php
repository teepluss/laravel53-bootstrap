<?php

namespace App\Traits;

trait AccessControl
{
    private $superadmin = "superadmin";

    public function getRoles()
    {
        return $this->roles;
    }

    public function getKeyRoles()
    {
        return $this->getRoles()->keyBy('slug');
    }

    public function getPermissions()
    {
        return $this->permissions;
    }

    public function getRolePermissions()
    {
        $combinePermissions = collect([]);
        $this->roles->each(function($role) use (&$combinePermissions) {
            $rolePermissions = $role->permissions;
            $combinePermissions = $combinePermissions->merge($rolePermissions);
        });

        return $combinePermissions;
    }

    public function getMergedPermissions()
    {
        $personalPermissions = $this->getPermissions();
        $rolePermissions = $this->getRolePermissions();

        return $rolePermissions->merge($personalPermissions);
    }

    public function hasRole($role)
    {
        return $this->getKeyRoles()->has($role);
    }

    public function hasAnyRole(array $roles)
    {
        if (! empty($roles)) foreach ($roles as $role) {
            if ($this->hasRole($role)) {
                return true;
            }
        }
        return false;
    }

    public function hasAllRole(array $roles)
    {
        if (! empty($roles)) foreach ($roles as $role) {
            if (! $this->hasRole($role)) {
                return false;
            }
        }
        return true;
    }

    public function hasPermission($requestPermit)
    {
        return (boolean) $this->getMergedPermissions()->get($requestPermit);
    }

    public function hasAnyPermission(array $permissions)
    {
        if (! empty($permissions)) foreach ($permissions as $permit) {
            if ($this->hasPermission($permit)) {
                return true;
            }
        }
        return false;
    }

    public function hasAllPermission(array $permissions)
    {
        if (! empty($permissions)) foreach ($permissions as $permit) {
            if (! $this->hasPermission($permit)) {
                return false;
            }
        }
        return true;
    }

    public function isSuperadmin()
    {
        return (boolean) $this->hasPermission($this->superadmin);
    }
}