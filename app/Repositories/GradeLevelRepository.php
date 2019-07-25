<?php

namespace App\Repositories;

use App\Models\GradeLevel;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class GradeLevelRepository
 * @package App\Repositories
 * @version February 25, 2019, 12:22 pm UTC
 *
 * @method GradeLevel findWithoutFail($id, $columns = ['*'])
 * @method GradeLevel find($id, $columns = ['*'])
 * @method GradeLevel first($columns = ['*'])
*/
class GradeLevelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'rank'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return GradeLevel::class;
    }
}
