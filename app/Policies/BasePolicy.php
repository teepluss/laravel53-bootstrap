<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

abstract class BasePolicy
{
    /**
     * Get ability naming.
     *
     * @param  string $ability
     * @return string
     */
    abstract protected function getContentAbility($ability);

    /**
     * Before any permission checking.
     *
     * @param  App\User  $user
     * @param  string    $ability
     * @return boolean
     */
    public function before(User $user, $ability)
    {
        // If the user is super admin, so they can go anywhere.
        if ($user->isSuperadmin()) {
            return true;
        }

        // If the user having a permit, so they need to go second door.
        $contentAbilty = $this->getContentAbility($ability);
        if ($user->hasPermission($contentAbilty)) {
            return null;
        }

        return false;
    }

    public function viewable(User $user)
    {
        return true;
    }

    public function writable(User $user)
    {
        return true;
    }

    public function deletable(User $user)
    {
        return true;
    }

    public function approvable(User $user)
    {
        return true;
    }
}
