<?php 

namespace App\Traits;

use App\Models\User;
use App\Models\Subscription;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasSubscriptions
{
    public function subscriptions() {
        return $this->subscriptionRelation;
    }

    public function subscriptionsRelation(): MorphMany {
        return $this->morphMany(
            Subscription::class,
            'subscriptionsRelation', 
            'subscriptionable_type',
            'subscriptionable_id',
        );
    }

    public function hasSubscriber(User $user): bool {
        return $this->subscriptionsRelation()
        ->where('user_id', $user->id())
        ->exists();
    }
}