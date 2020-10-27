<?php

use App\Manager;
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
        // $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(ManagerSeeder::class);
        // $this->call(CompanySeeder::class);

    }
}
