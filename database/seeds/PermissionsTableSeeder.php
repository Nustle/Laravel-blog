<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'create'
        ]);

        Permission::create([
            'name' => 'update'
        ]);

        Permission::create([
            'name' => 'delete'
        ]);
    }
}
