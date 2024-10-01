<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

     
    public function run(): void
    {
        //

        $usersData = [
            // [
            //     'first_name' => 'Vinod',
            //     'last_name' => 'Joshi',
            //     'email' => 'vinod@fleetsathi.com',
            //     'password' => bcrypt('fleetsathi@1234'),
            // ],
            [
                'first_name' => 'Yash',
                'last_name' => 'Prajapati',
                'email' => 'yash@fleetsathi.com',
                'password' => bcrypt('fleetsathi@1234'),
                'contact_number' => '8401641101',
                'role'=> "admin"
            ],
            [
                'first_name' => 'Kaushal',
                'last_name' => 'Rathod',
                'email' => 'kaushal@fleetsathi.com',
                'password' => bcrypt('fleetsathi@1234'),
                'contact_number' => '8401641101',
                'role'=> "user"
            ],
        ];

        foreach ($usersData as $userData) {
            $user = User::create($userData);
            // $user->assignRole('admin');      
        }
    }
}
