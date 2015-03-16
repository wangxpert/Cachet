<?php

use CachetHQ\Cachet\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $users = [
            [
                "username" => "test",
                "password" => "test123",
                "email"    => "test@test.com",
                "level"    => 1,
                "api_key"  => "9yMHsdioQosnyVK4iCVR",
            ],
        ];

        User::truncate();

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
