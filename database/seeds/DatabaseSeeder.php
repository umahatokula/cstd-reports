<?php

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
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StaffTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(DivisionsTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(GradeLevelsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
