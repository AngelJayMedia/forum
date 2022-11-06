<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Reply;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyPolicy
{
    use HandlesAuthorization;

    const CREATE = 'create'; 
    const UPDATE =  'update';
    const DELETE =  'delete'; 

    public function create(User $user): bool {
        return $user->hasVerifiedEmail();
    }

    public function update(User $user, Reply $reply): bool {
        return $reply->isAuthoredBy($user) || $user->isModerator() || $user->isAdmin();
    }

    public function delete(User $user, Reply $reply): bool {
        return $reply->isAuthoredBy($user) || $user->isModerator() || $user->isAdmin();
    }
}
