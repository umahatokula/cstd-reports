<?php

use Illuminate\Database\Seeder;

class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Division::truncate();

        $division = new App\Models\Division;
        $division->name     = 'Payload';
        $division->department_id    = 1;
        $division->hod    = 3;
        $division->save();

        $division = new App\Models\Division;
        $division->name     = 'Satellite Bus';
        $division->department_id    = 1;
        $division->hod    = 4;
        $division->save();

    }
}
