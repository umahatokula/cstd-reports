<?php

use App\User;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

	    /**
	     * Add Users
	     *
	     */
	    if (User::where('email', '=', 'director@cstd.gov.ng')->first() === null) {

				$staff               = new Staff;
				$staff->fname        = 'Spencer';
				$staff->lname        = 'Onuh';
				$staff->full_name    = $staff->fname.' '.$staff->lname;
				$staff->pf           = 001;
				$staff->phone        = '08033483110';
				$staff->email        = 'director@cstd.gov.ng';
				$staff->username     = strtolower($staff->fname).'.'.strtolower($staff->lname);
				$staff->unit_id     = 1;
				$staff->grade_level_id     = 1;
				$staff->should_login = 1;
				$staff->save();

	    	$user = User::create([
				'name'     => $staff->fname.' '. $staff->lname,
				'email'    => $staff->email,
				'username' => strtolower($staff->fname).'.'.strtolower($staff->lname),
				'password' => bcrypt('12345678'),
				'staff_id' => $staff->id,
	    		]);

          // assign role
          $directorRole = config('roles.models.role')::where('slug', '=', 'director')->first();
          $user->attachRole($directorRole);

	    }

	}
}
