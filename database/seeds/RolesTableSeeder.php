<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Role::create([
            'name' => 'Administrator',
            'slug' => 'administartor',
            'description' => 'Power user who having the key that opens all doors.',
            'permissions' => [
                'superadmin' => 1
            ]
        ]);

        App\Role::create([
            'name' => 'Moderator',
            'slug' => 'moderator',
            'description' => 'People who show power over the weakling.',
            'permissions' => [
                'post-viewable'   => 1,
                'post-writable'   => 1,
                'post-deletable'  => 1,
                'post-approvable' => 1,
            ]
        ]);

        App\Role::create([
            'name' => 'Contributor',
            'slug' => 'contributor',
            'description' => 'Person that contributes something, in particular.',
            'permissions' => [
                'post-viewable' => 1,
                'post-writable' => 1,
            ]
        ]);

        App\Role::create([
            'name' => 'User',
            'slug' => 'user',
            'description' => 'Monkey in space.',
            'permissions' => [
                'post-view'   => 1,
                'post-create' => 1,
                'post-update' => 1,
                'post-delete' => 1
            ]
        ]);
    }
}
