<?php 

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\MorphMany;


interface SubscriptionAble
{
    public function subscriptions();

    public function subscriptionsRelation(): MorphMany;

    public function hasSubscriber(User $user): bool;
}