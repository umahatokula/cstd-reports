<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::truncate();

        $monthly_report = new App\Setting;
        $monthly_report->setting_type     = 'monthly_report';
        $monthly_report->save();

        $apper = new App\Setting;
        $apper->setting_type     = 'apper';
        $apper->save();
    }
}
