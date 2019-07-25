<?php

use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Unit::truncate();

        $unit = new App\Models\Unit;
        $unit->name     = 'Imaging';
        $unit->division_id    = 1;
        $unit->hou    = 6;
        $unit->save();

        $unit = new App\Models\Unit;
        $unit->name     = 'Scientific & Experimental';
        $unit->division_id    = 1;
        $unit->hou    = 5;
        $unit->save();
    }
}
