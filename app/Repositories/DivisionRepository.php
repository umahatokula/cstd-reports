<?php

namespace App\Repositories;

use App\Models\Division;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DivisionRepository
 * @package App\Repositories
 * @version February 23, 2019, 10:11 am UTC
 *
 * @method Division findWithoutFail($id, $columns = ['*'])
 * @method Division find($id, $columns = ['*'])
 * @method Division first($columns = ['*'])
*/
class DivisionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'department_id',
        'hod'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Division::class;
    }
}
