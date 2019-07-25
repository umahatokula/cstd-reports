<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Unit
 * @package App\Models
 * @version February 25, 2019, 12:04 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionUser
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string name
 * @property integer division_id
 * @property integer hou
 */
class Unit extends Model
{
    use SoftDeletes;

    public $table = 'units';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'division_id',
        'hou'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'division_id' => 'integer',
        'hou' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'division_id' => 'required',
        'hou' => 'required',
    ];

    public function division()
    {
        return $this->belongsTo('App\Models\Division');
    }

    public function headOfUnit()
    {
        return $this->belongsTo('\App\Models\Staff', 'hou', 'id');
    }


}
