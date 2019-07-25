<?php

use App\User;
use Illuminate\Database\Seeder;
use jeremykenedy\LaravelRoles\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Add Roles
         *
         */
        if (Role::where('slug', '=', 'director')->first() === null) {
            $adminRole = Role::create([
                'name'        => 'Director',
                'slug'        => 'director',
                'description' => 'Director Role',
                'level'       => 20,
            ]);
        }

        if (Role::where('slug', '=', 'head_of_dept')->first() === null) {
            $userRole = Role::create([
                'name'        => 'Head of Department',
                'slug'        => 'head_of_dept',
                'description' => 'Head of Department Role',
                'level'       => 16,
            ]);
        }

        if (Role::where('slug', '=', 'head_of_div')->first() === null) {
            $userRole = Role::create([
                'name'        => 'Head of Division',
                'slug'        => 'head_of_div',
                'description' => 'Head of Division Role',
                'level'       => 14,
            ]);
        }

        if (Role::where('slug', '=', 'unit_head')->first() === null) {
            $userRole = Role::create([
                'name'        => 'Unit Head',
                'slug'        => 'unit_head',
                'description' => 'Unit Head Role',
                'level'       => 12,
            ]);
        }

        if (Role::where('slug', '=', 'admin')->first() === null) {
            $userRole = Role::create([
                'name'        => 'Admin',
                'slug'        => 'admin',
                'description' => 'Admin Role',
                'level'       => 10,
            ]);
        }

        if (Role::where('slug', '=', 'staff')->first() === null) {
            $userRole = Role::create([
                'name'        => 'Staff',
                'slug'        => 'staff',
                'description' => 'Staff Role',
                'level'       => 6,
            ]);
        }

        if (Role::where('slug', '=', 'corper')->first() === null) {
            $userRole = Role::create([
                'name'        => 'Corper',
                'slug'        => 'corper',
                'description' => 'Corper Role',
                'level'       => 1,
            ]);
        }

        if (Role::where('slug', '=', 'it_student')->first() === null) {
            $userRole = Role::create([
                'name'        => 'IT Student',
                'slug'        => 'it_student',
                'description' => 'IT Student Role',
                'level'       => 1,
            ]);
        }

    }
}
