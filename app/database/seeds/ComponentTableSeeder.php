<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class ComponentTableSeeder extends Seeder
{
    /**
     * Run the database seeding.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $defaultComponents = [
            [
                "name"        => "API",
                "description" => "Used by third-parties to connect to us",
                "status"      => 1,
                "user_id"     => 1,
            ], [
                "name"        => "Payments",
                "description" => "Backed by Stripe",
                "status"      => 1,
                "user_id"     => 1
            ], [
                "name"    => "Website",
                "status"  => 1,
                "user_id" => 1
            ],
        ];

        Component::truncate();

        foreach ($defaultComponents as $component) {
            Component::create($component);
        }
    }
}
