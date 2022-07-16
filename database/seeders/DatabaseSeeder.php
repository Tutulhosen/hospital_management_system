<?php

namespace Database\Seeders;


use App\Models\Role;
use App\Models\AdminUser;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        

        /**
         * set a default role
         */

        Role::create([
            'name'          =>'Admin',
            'slug'          =>Str::slug('admin'),
            'permission'    =>json_encode([]),
        ]);



         /**
          * super admin data
          */
        AdminUser::create([
            'role_id'               =>1,
            'name'                  =>'Super Admin',
            'email'                 =>'super@admin.com',
            'cell'                  =>'01937793487',
            'username'              =>'Seper',
            'password'              =>Hash::make('123456789'),
            'photo'                 =>'avatar.png'
        ]);
    }
}
