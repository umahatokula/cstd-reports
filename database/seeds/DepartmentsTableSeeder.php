<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Department::truncate();

        $department = new App\Models\Department;
        $department->name     = 'Satellite Systems';
        $department->hod    = 1;
        $department->save();

        $department = new App\Models\Department;
        $department->name     = 'Mechanical & Manufacturing';
        $department->hod    = 2;
        $department->save();
    }
}
