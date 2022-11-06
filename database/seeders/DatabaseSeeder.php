<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\NotificationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(ThreadsTableSeeder::class);
        $this->call(NotificationSeeder::class);
    }
}
