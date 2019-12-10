<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'is_admin' => true,
            'email' => 'Hustle.adik69@yandex.ru',
            'password' => bcrypt('876543210'),
            'phone' => '+7 (999) 912-61-18'
        ]);

        User::create([
            'name' => 'Dima',
            'email' => 'Dimakorol@gmail.com',
            'password' => bcrypt('dima_mbappe'),
            'phone' => '+7 (977) 914-32-06'
        ]);

        User::create([
            'name' => 'Deni',
            'email' => 'Deniyan@gmail.com',
            'password' => bcrypt('deni12345'),
            'phone' => '+7 (985) 144-15-61'
        ]);
    }
}
