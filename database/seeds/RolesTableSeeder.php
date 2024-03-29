<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'user'
        ]);

        Role::create([
            'name' => 'admin'
        ]);

        Role::create([
            'name' => 'creator'
        ]);

    }
}
