<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    const ADMIN = 'admin';
    
    public function admin(User $user): bool 
    {
        return $user->isAdmin();
    }
}
