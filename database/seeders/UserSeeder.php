<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seller = User::create([
            'name' => 'AFStore',
            'username' => 'afstore',
            'email' => 'afstore@mindotek.com',
            'image' => null,
            'password' => bcrypt('password'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);

        $seller->assignRole('seller');

        $customer = User::create([
            'name' => 'Customer',
            'username' => 'customer',
            'email' => 'customer@mindotek.com',
            'image' => null,
            'password' => bcrypt('password'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);

        $customer->assignRole('customer');

        $customer = User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@mindotek.com',
            'image' => null,
            'password' => bcrypt('password'),
            'email_verified_at' => date('Y-m-d H:i:s')
        ]);

        $customer->assignRole('admin');

        $seller = User::create([
            'name' => 'budi',
            'username' => 'BangSeller1',
            'email' => 'angga08adityar@gmail.com',
            'password' => bcrypt('password')
        ]);

        $seller->assignRole('seller');
    }
}
