<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create main user
        User::create([
            'name' => 'Mironshoh',
            'email' => 'admin@admin.com',
            'password' => 'password',
            'is_developer' => '1',
        ]);

      
    }
}
