<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Division
 * @package App\Models
 * @version February 23, 2019, 10:11 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionUser
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string name
 * @property integer department_id
 * @property integer hod
 */
class Division extends Model
{
    use SoftDeletes;

    public $table = 'divisions';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'department_id',
        'hod'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'department_id' => 'integer',
        'hod' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'department_id' => 'required',
        'hod' => 'required',
    ];

    public function department()
    {
        return $this->belongsTo('\App\Models\Department');
    }

    public function headOfDivision() {
        return $this->belongsTo('\App\Models\Staff', 'hod', 'id');
    }


}
