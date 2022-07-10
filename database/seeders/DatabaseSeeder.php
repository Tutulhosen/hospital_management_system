<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        AdminUser::create([
            'role_id'               =>1,
            'name'               =>'Super Admin',
            'email'               =>'super@admin.com',
            'cell'               =>'01937793487',
            'username'               =>'Seper',
            'password'               =>Hash::make('123456789'),
            'photo'                   =>'avator.png'
        ]);
    }
}
