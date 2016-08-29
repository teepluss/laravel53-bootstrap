<?php

use Illuminate\Database\Seeder;

class MockDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mock all user with the same "password".
        $password = "password";
        factory(App\User::class, 50)->create()->each(function($u) {

            $assignAsRole = App\Role::inRandomOrder()->first();
            $u->roles()->attach($assignAsRole);

            // Each user having amount of posts.
            $amountOfPost = range(1, 10);
            factory(App\Post::class, $amountOfPost)->make()->each(function($post) use ($u) {
                $u->posts()->save($post);
            });
        });
    }
}
