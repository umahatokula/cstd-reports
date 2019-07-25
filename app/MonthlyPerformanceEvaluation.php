<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MonthlyPerformanceEvaluation extends Model
{
    protected $dates = ['from', 'to'];

    public function appraiseeRecord()
    {
        return $this->belongsTo('\App\Models\Staff', 'appraisee', 'id');
    }

    public function reportingOfficer()
    {
        return $this->belongsTo('\App\Models\Staff', 'reporting_officer', 'id');
    }

    public function counterSigningOfficer()
    {
        return $this->belongsTo('\App\Models\Staff', 'countersigning_officer', 'id');
    }

    public function department()
    {
        return $this->belongsTo('\App\Models\Department');
    }

    public function division()
    {
        return $this->belongsTo('\App\Models\Division');
    }

    public function unit()
    {
        return $this->belongsTo('\App\Models\Unit');
    }

    public function gradeLevel()
    {
        return $this->belongsTo('\App\Models\GradeLevel');
    }

    public function absentDays()
    {
        return $this->hasMany('\App\MPEAbsentDays');
    }

    public function appraiseeTargets()
    {
        return $this->hasMany('\App\MPEAppraiseeTarget');
    }

    public function divisionTargets()
    {
        return $this->hasMany('\App\MPEDivisionTarget');
    }

    public function targetsAchieved()
    {
        return $this->hasMany('\App\MPETargetAchieved');
    }

    public function targetsUnachieved()
    {
        return $this->hasMany('\App\MPETargetUnachieved');
    }
}
