<?php

namespace App\Traits;

trait AccessControl
{
    /**
     * Preserve for "superadmin" slug.
     *
     * @var string
     */
    private $superadmin = "superadmin";

    /**
     * Get user roles.
     *
     * @return collection
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Get user role key by slug.
     *
     * @return collection
     */
    public function getKeyRoles()
    {
        return $this->getRoles()->keyBy('slug');
    }

    /**
     * Get user permissions.
     *
     * @return collection
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Get role permissions.
     *
     * @return collection
     */
    public function getRolePermissions()
    {
        $combinePermissions = collect([]);
        $this->roles->each(function($role) use (&$combinePermissions) {
            $rolePermissions = $role->permissions;
            $combinePermissions = $combinePermissions->merge($rolePermissions);
        });

        return $combinePermissions;
    }

    /**
     * Get merge permissions for user and roles.
     *
     * @return collection
     */
    public function getMergedPermissions()
    {
        $personalPermissions = $this->getPermissions();
        $rolePermissions = $this->getRolePermissions();

        return $rolePermissions->merge($personalPermissions);
    }

    /**
     * Check the user role.
     *
     * @param  string  $role
     * @return boolean
     */
    public function hasRole($role)
    {
        return $this->getKeyRoles()->has($role);
    }

    /**
     * Check the user role case OR.
     *
     * @param  array   $roles
     * @return boolean
     */
    public function hasAnyRole(array $roles)
    {
        if (! empty($roles)) foreach ($roles as $role) {
            if ($this->hasRole($role)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Check the user role case AND.
     *
     * @param  array   $roles
     * @return boolean
     */
    public function hasAllRole(array $roles)
    {
        if (! empty($roles)) foreach ($roles as $role) {
            if (! $this->hasRole($role)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Check the user permit.
     *
     * @param  string  $requestPermit
     * @return boolean
     */
    public function hasPermission($requestPermit)
    {
        return (boolean) $this->getMergedPermissions()->get($requestPermit);
    }

    /**
     * Check the user permit case OR.
     *
     * @param  array   $permissions
     * @return boolean
     */
    public function hasAnyPermission(array $permissions)
    {
        if (! empty($permissions)) foreach ($permissions as $permit) {
            if ($this->hasPermission($permit)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Check the user permit case AND.
     *
     * @param  array   $permissions
     * @return boolean
     */
    public function hasAllPermission(array $permissions)
    {
        if (! empty($permissions)) foreach ($permissions as $permit) {
            if (! $this->hasPermission($permit)) {
                return false;
            }
        }
        return true;
    }

    /**
     * Check superadmin permit.
     *
     * @return boolean
     */
    public function isSuperadmin()
    {
        return (boolean) $this->hasPermission($this->superadmin);
    }
}