<?php

namespace App\Repositories;

use App\Models\Staff;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StaffRepository
 * @package App\Repositories
 * @version February 23, 2019, 9:29 am UTC
 *
 * @method Staff findWithoutFail($id, $columns = ['*'])
 * @method Staff find($id, $columns = ['*'])
 * @method Staff first($columns = ['*'])
*/
class StaffRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pf',
        'fname',
        'lname',
        'full_name',
        'email',
        'username',
        'phone',
        'unit_id',
        'grade_level_id',
        'should_login'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Staff::class;
    }
}
