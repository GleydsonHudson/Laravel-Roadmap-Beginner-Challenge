<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create([
            'name'  => 'Admin',
            'email' => 'admin@admin.com',
        ]);

        $editor = User::factory()->create([
            'name'  => 'Editor',
            'email' => 'editor@editor.com',
        ]);

        $admin->roles()->sync(1);
        $editor->roles()->sync(2);
    }
}
