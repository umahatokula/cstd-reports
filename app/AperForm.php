<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Staff;
use App\AperEvaluation;

class AperForm extends Model
{
    protected $guarded = ['id'];

    public function staff()
    {
        return $this->belongsTo('\App\Models\Staff', 'staff_id', 'id');
    }

    public function qualifications()
    {
        return $this->hasMany('\App\APERQualification');
    }

    public function divisionTargets()
    {
        return $this->hasMany('\App\APERDivisionTarget');
    }

    public function appraiseeTargets()
    {
        return $this->hasMany('\App\APERAppraiseeTarget');
    }

    public function duties()
    {
        return $this->hasMany('\App\APERDuty');
    }

    public function trainings()
    {
        return $this->hasMany('\App\APERTraining');
    }

    public function evaluation()
    {
        return $this->hasOne( '\App\APEREvaluation');
    }

    public function servingUnderReportingOfficer()
    {
        return $this->belongsTo('\App\Models\Staff', 'served_under_reporting_officer', 'id');
    }

    public function servingUnderCountersigningOfficer()
    {
        return $this->belongsTo('\App\Models\Staff', 'served_under_countersigning_officer', 'id');
    }

    public function servingUnderHOD()
    {
        return $this->belongsTo('\App\Models\Staff', 'served_under_hod', 'id');
    }

    /**
     * Calculate staff APER form evaluation
     */
    public function calPerformance($staffIds, $year) {

        $result = [];

        foreach($staffIds as $staffId) {

            $staff = Staff::find($staffId);
            $aperForm = AperForm::where('staff_id', $staffId)->where('year', $year)->first();

            if($aperForm) {

                $aperEvaluation = $aperForm->evaluation;

                if($aperEvaluation) {
                    $totalWeight = $aperEvaluation->understands_job +
                    $aperEvaluation->applied_knowledge +
                    $aperEvaluation->accomplish_in_timeframe +
                    $aperEvaluation->relevant_judgement +
                    $aperEvaluation->work_speed +
                    $aperEvaluation->expression_on_paper +
                    $aperEvaluation->oral_expression +
                    $aperEvaluation->relations_with_staff +
                    $aperEvaluation->relations_with_public +
                    $aperEvaluation->management_of_staff +
                    $aperEvaluation->quality_of_work +
                    $aperEvaluation->productivity +
                    $aperEvaluation->effective_use_of_figures +
                    $aperEvaluation->intiative +
                    $aperEvaluation->dependability +
                    $aperEvaluation->loyalty +
                    $aperEvaluation->honesty +
                    $aperEvaluation->reliability +
                    $aperEvaluation->responsibility +
                    $aperEvaluation->appearance +
                    $aperEvaluation->punctuality +
                    $aperEvaluation->attendance +
                    $aperEvaluation->determination +
                    $aperEvaluation->resource_utilization +
                    $aperEvaluation->define_agreed +
                    $aperEvaluation->avoid_late_assessment +
                    $aperEvaluation->show_good_examples +
                    $aperEvaluation->suggestion_for_changes;
                }

                $finalScore = ($totalWeight/180) * 20;

                $result[] = [$staff, $finalScore];
            }
        }

        return $result;
    }


    /**
     * Cal weight for a grade
     */
    public function weightGradings($grade) {

        switch ($grade) {
            case "A":
                $weight = 6;
                break;
            case "B":
                $weight = 5;
                break;
            case "C":
                $weight = 4;
                break;
            case "D":
                $weight = 3;
                break;                
            case "E":
                $weight = 2;
                break;                               
            case "F":
                $weight =1 ;
                break;
            
            return $weight;
        }

    }
}
