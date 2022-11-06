<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootEloquentMorphsRelations();
    }

    public function bootEloquentMorphsRelations()
    {
        Relation::morphMap([
            Thread::TABLE => Thread::class,
            Reply::TABLE => Reply::class,
            User::TABLE => User::class,
        ]);
    }
}
