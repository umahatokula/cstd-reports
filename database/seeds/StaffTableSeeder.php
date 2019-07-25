<?php

use Illuminate\Database\Seeder;
use App\User;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $staff = factory(App\Staff::class, 300)->create();
    	// DB::table('staff')->truncate();

    	$faker = Faker\Factory::create();

    	$limit = 30;

    	for ($i = 1; $i < $limit; $i++) {

            $staff               = new App\Models\Staff;
            $staff->pf           = $i + 1;
            $staff->fname        =$faker->firstName;
            $staff->lname        = $faker->lastName;
            $staff->full_name    = $staff->fname.' '.$staff->lname;
            $staff->email        = $faker->unique()->safeEmail;
            $staff->username     = strtolower($staff->fname).'.'.strtolower($staff->lname);
            $staff->phone        = $faker->e164PhoneNumber;
            $staff->should_login = $faker->boolean($chanceOfGettingTrue = 98);
            $staff->unit_id      = 1;
            $staff->grade_level_id        = 1;
            $staff->save();


            $faker = Faker\Factory::create();

            $user = User::create([
        				'name'     => $staff->fname.' '. $staff->lname,
        				'email'    => $staff->email,
        				'username' => strtolower($staff->fname).'.'.strtolower($staff->lname),
        				'password' => bcrypt('123456'),
                        'staff_id' => $staff->id,
	    		       ]);

            // assign role
            $staffRole = config('roles.models.role')::where('slug', '=', 'staff')->first();
            $user->attachRole($staffRole);
    	}
    }
}
