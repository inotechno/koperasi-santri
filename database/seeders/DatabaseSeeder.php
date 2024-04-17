<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

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
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ProductCategorySeeder::class);
        $this->call(ProductSubCategorySeeder::class);
        $this->call(StoreSeeder::class);
        $this->call(RajaOngkirSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(UserAddressSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(BankListSeeder::class);
        $this->call(VoucherTypeSeeder::class);
        $this->call(VoucherSeeder::class);
    }
}
