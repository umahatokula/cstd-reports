<?php

use Illuminate\Database\Seeder;

class GradeLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\GradeLevel::truncate();

        $gradeLevel = new App\Models\GradeLevel;
        $gradeLevel->name     = 'Scientific Officer I';
        $gradeLevel->rank    = 7;
        $gradeLevel->save();

        $gradeLevel = new App\Models\GradeLevel;
        $gradeLevel->name     = 'Scientific Officer II';
        $gradeLevel->rank    = 8;
        $gradeLevel->save();

        $gradeLevel = new App\Models\GradeLevel;
        $gradeLevel->name     = 'Senior Scientific Officer';
        $gradeLevel->rank    = 9;
        $gradeLevel->save();

        $gradeLevel = new App\Models\GradeLevel;
        $gradeLevel->name     = 'Principal';
        $gradeLevel->rank    = 11;
        $gradeLevel->save();
    }
}
