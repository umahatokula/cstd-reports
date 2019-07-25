<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Staff
 * @package App\Models
 * @version February 23, 2019, 9:29 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection permissionUser
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property string pf
 * @property string fname
 * @property string lname
 * @property string full_name
 * @property string email
 * @property string username
 * @property string phone
 * @property boolean should_login
 */
class Staff extends Model
{
    use SoftDeletes;

    public $table = 'staff';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'pf',
        'fname',
        'lname',
        'full_name',
        'email',
        'username',
        'phone',
        'should_login'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pf' => 'string',
        'fname' => 'string',
        'lname' => 'string',
        'full_name' => 'string',
        'email' => 'string',
        'username' => 'string',
        'phone' => 'string',
        'should_login' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pf' => 'required',
        'fname' => 'required',
        'lname' => 'required',
        // 'phone' => 'required',
        'username' => 'required',
        'unit_id' => 'required',
        'grade_level_id' => 'required',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $messages = [
        'pf.required' => 'The PF Number is required',
        'fname.required' => 'The first name is required',
        'lname.required' => 'The last name is required',
        'username.required' => 'The username is required',
        'phone.required' => 'The phone number is required',
        'unit_id.required' => 'The Staff Unit is required',
        'grade_level_id.required' => 'The Staff Grade Level is required',
    ];


    public function getPfAttribute($value)
    {
        return 'CSTD/PF/' . $value;
    }
    /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function setPfAttribute($value)
    {
        $this->attributes['pf'] = str_replace('CSTD/PF/', '', $value);
    }

    public function unit()
    {
        return $this->belongsTo('App\Models\Unit');
    }

    public function gradeLevel()
    {
        return $this->belongsTo('App\Models\GradeLevel');
    }

    public function user()
    {
        return $this->hasOne('App\User');
    }
}
