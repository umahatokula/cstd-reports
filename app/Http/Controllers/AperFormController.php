<?php

namespace App\Http\Controllers;

use App\AperForm;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Division;
use App\Models\Unit;
use App\Models\Staff;
use App\Models\GradeLevel;
use App\APERQualification;
use App\APERAppraiseeTarget;
use App\APERDivisionTarget;
use App\APERDuty;
use App\APERTraining;
use App\APEREvaluation;
use App\APERTrainingNeed;
use App\Setting;
use Carbon\Carbon;
use Flash;

class AperFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['apper_settings'] = Setting::where('setting_type', 'apper')->first();
        $query = AperForm::query();

        if (request()->has('year')) {
            $query = $query->where(['year' => request('year')])->get();
        }

        $user = \Auth::user();

        // director
        if ($user->hasRole('director')) {
          $data['forms'] = $query->get();

          return view('aper.index', $data);
        }

        // counter signing officer
        if ($user->hasRole('head_of_dept')) {
        //   $result = $query->where('department_id', $user->staff->unit->division->department->id);
          $data['forms'] = $query->get();

          return view('aper.index', $data);
        }

        // reporting officer
        if ($user->hasRole('head_of_dept')) {
          $result = $query->where('department_id', $user->staff->unit->division->id);
          $data['forms'] = $result->get();

          return view('aper.index', $data);
        }

        // staff
        if ($user->hasRole('staff')) {
          $result = $query->where('staff_id', $user->staff->id);
          $data['forms'] = $result->get();

          return view('aper.index', $data);
        }

    }

    /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
    public function create()
    {
        $apper_settings = Setting::where('setting_type', 'apper')->first();

        if (!Carbon::today()->between(Carbon::parse($apper_settings->open), Carbon::parse($apper_settings->close))) {
            Flash::error('APER form is not open at this time. Kindly contact Admin.');

            return redirect('aper-forms');
        }

        // dd( \Auth::user());
        $departments = Department::all();
        $divisions = Division::all();
        $units = Unit::all();
        $staffs = Staff::all();
        $gradeLevels = GradeLevel::all();
        $report = AperForm::with('qualifications', 'divisionTargets', 'appraiseeTargets', 'duties', 'trainings')->where(['staff_id' => \Auth::user()->staff->id, 'year' => Date('Y')])->first();
        // dd($report);

        if (request()->expectsJson()) {
            return ['departments' => $departments, 'divisions' => $divisions, 'units' => $units, 'staffs' => $staffs, 'gradeLevels' => $gradeLevels, 'report' => $report];
        }

        $data['departments'] = $departments;
        $data['divisions'] = $divisions;
        $data['units'] = $units;
        $data['staffs'] = $staffs;
        $data['gradeLevels'] = $gradeLevels;

        return view('aper.create', $data);
    }

    /**
         * Store Persnola records.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
    public function storePersonal(Request $request)
    {
        // dd($request->all());

        // set form validation rules
        $rules = [
            'from' => 'required|after_or_equal:'.Carbon::today()->startOfYear(),
            'to'    => 'required|before_or_equal:'.Carbon::today()->endOfYear(),
            'department_id'    => 'required',
            'division_id'    => 'required',
            'unit_id'    => 'required',
            'section_id'    => 'required',
            'dob'    => 'required',
            'date_of_first_appointment'    => 'required',
            'post_first_appointed'    => 'required',
            'date_of_confirmation'    => 'required',
            'present_substantive_post'    => 'required',
            'date_appointed_to_substantive_post'    => 'required',
            'grade_level_id'    => 'required',
            'salary_per_annum'    => 'required|numeric',
            'date_of_next_increment'    => 'required',
            'date_of_acting_appointment'    => 'required',
        ];

        $messages = [
            'from.required' => 'Enter report period',
            'to.required' => 'Enter report period',
            'department_id.required' => 'Select a department',
            'division_id.required' => 'Select a division',
            'unit_id.required' => 'Select a unit',
            'section_id.required' => 'Select a section',
            'dob.required' => 'Enter Date of Birth',
            'date_of_first_appointment.required' => 'Enter date of first appointment',
            'post_first_appointed.required' => 'Enter post to which first Appointed',
            'date_of_confirmation.required' => 'Enter Date of Confirmation',
            'present_substantive_post.required' => 'Enter Present Substantive Appointment',
            'date_appointed_to_substantive_post.required' => 'Enter date Appointed to Substantive Post',
            'grade_level_id.required' => 'Select Grade Level',
            'salary_per_annum.required' => 'Enter Salary Per Annum',
            'salary_per_annum.numeric' => 'Salary must be numeric',
            'date_of_next_increment.required' => 'Enter date of Next Increment',
            'date_of_acting_appointment.required' => 'Enter date of Acting Appoinment',
        ];

        $this->validate($request, $rules, $messages);

        // dd($request->id);

        $report = AperForm::updateOrCreate(
            ['staff_id' => $request->staff_id, 'year' => $request->year],
            [
                'current_form_page' => $request->current_form_page,
                'staff_id' => $request->staff_id,
                'from' => $request->from,
                'to' => $request->to,
                'year' => $request->year,
                'department_id' => $request->department_id,
                'division_id' => $request->division_id,
                'unit_id' => $request->unit_id,
                'section_id' => $request->section_id,
                'dob' => $request->dob,
                'date_of_first_appointment' => $request->date_of_first_appointment,
                'post_first_appointed' => $request->post_first_appointed,
                'date_of_confirmation' => $request->date_of_confirmation,
                'present_substantive_post' => $request->present_substantive_post,
                'date_appointed_to_substantive_post' => $request->date_appointed_to_substantive_post,
                'grade_level_id' => $request->grade_level_id,
                'salary_per_annum' => $request->salary_per_annum,
                'date_of_next_increment' => $request->date_of_next_increment,
                'date_of_acting_appointment' => $request->date_of_acting_appointment,
                'hospital_leave_from' => $request->hospital_leave_from,
                'hospital_leave_to' => $request->hospital_leave_to,
                'hospital_leave_days' => $request->hospital_leave_days,
                'abroad_treatment_leave_from' => $request->abroad_treatment_leave_from,
                'abroad_treatment_leave_to' => $request->abroad_treatment_leave_to,
                'abroad_leave_days' => $request->abroad_leave_days,
                'sick_leave_from' => $request->sick_leave_from,
                'sick_leave_to' => $request->sick_leave_to,
                'sick_leave_days' => $request->sick_leave_days,
                'maternity_leave_from' => $request->maternity_leave_from,
                'maternity_leave_to' => $request->maternity_leave_to,
                'maternity_leave_days' => $request->maternity_leave_days,
                'annual_leave_from' => $request->annual_leave_from,
                'annual_leave_to' => $request->annual_leave_to,
                'annual_leave_days' => $request->annual_leave_days,
                'casual_leave_from' => $request->casual_leave_from,
                'casual_leave_to' => $request->casual_leave_to,
                'casual_leave_days' => $request->casual_leave_days,
            ]
        );

        // Qualifications
        $result = APERQualification::where('aper_form_id', $report->id);
        if ($result) {
            $result->delete();
        }
        foreach ($request->qualifications as $qualification) {
            $q = new APERQualification;
            $q->aper_form_id = $report->id;
            $q->qualification_held = $qualification['qualification_held'];
            $q->year_obtained = $qualification['year_obtained'];
            $q->save();
        }

        return response()->json('Persnoal Information saved successfully.', 200);
    }



    /**
         * Store Persnola records.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
    public function storeTargets(Request $request)
    {
        // dd($request->all());

        // set form validation rules
        $rules = [
            'project_cost'    => 'required|numeric',
            'project_completion_time'    => 'required',
            'quantity_conformity'    => 'required',
            'completed_standard'    => 'required',
        ];

        $messages = [
            'project_cost.required' => 'Enter project estimated cost',
            'project_cost.numeric' => 'Project cost must be numeric',
            'project_completion_time.required' => 'Enter agreed project time',
            'quantity_conformity.required' => 'This field is required',
            'completed_standard.required' => 'This field is required',
        ];

        $this->validate($request, $rules, $messages);

        $report = AperForm::updateOrCreate(
            ['id' => $request->id],
            [
                'current_form_page' => $request->current_form_page,
                'staff_id' => $request->staff_id,
                'project_cost' => $request->project_cost,
                'project_completion_time' => $request->project_completion_time,
                'completed_standard' => $request->completed_standard,
                'quantity_conformity' => $request->quantity_conformity,
            ]
        );

        // division targets
        $result = APERDivisionTarget::where('aper_form_id', $report->id);
        if ($result) {
            $result->delete();
        }
        foreach ($request->divisionTargets as $divisionTarget) {
            $dtarget = new APERDivisionTarget;
            $dtarget->aper_form_id = $report->id;
            $dtarget->target = $divisionTarget['target'];
            $dtarget->save();
        }

        // appraisee targets
        $result = APERAppraiseeTarget::where('aper_form_id', $report->id);
        if ($result) {
            $result->delete();
        }
        foreach ($request->appraiseeTargets as $appraiseeTarget) {
            $atarget = new APERAppraiseeTarget;
            $atarget->aper_form_id = $report->id;
            $atarget->target = $appraiseeTarget['target'];
            $atarget->save();
        }

        return response()->json('Targets saved successfully.', 200);
    }


    /**
         * Store Persnola records.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
    public function storeJobs(Request $request)
    {
        // dd($request->all());

        // set form validation rules
        $rules = [
            'joint_discussion_with_supervisor'    => 'required',
            'properly_equiped'    => 'required',
            'dificulty_encountered'    => 'required',
            'methods_to_rectify'    => 'required',
            'periodic_reviews'    => 'required',
            'did_performance_measure_up'    => 'required',
            'shortcoming_solution_admonition'    => 'required',
            'final_evaluation'    => 'required',
            'ad_hoc_duties'    => 'required',
            'ad_hoc_performance'    => 'required',
            'schedule_from'    => 'required',
            'schedule_to'    => 'required',
            'served_under_reporting_officer'    => 'required',
            'served_under_reporting_officer_from'    => 'required',
            'served_under_reporting_officer_to'    => 'required',
            'served_under_countersigning_officer'    => 'required',
            'served_under_countersigning_officer_from'    => 'required',
            'served_under_countersigning_officer_to'    => 'required',
            'served_under_hod'    => 'required',
            'served_under_hod_from'    => 'required',
            'served_under_hod_to'    => 'required',
        ];

        $messages = [
            'joint_discussion_with_supervisor.required' => 'Enter project estimated cost',
            'properly_equiped.required' => 'Enter agreed project time',
            'dificulty_encountered.required' => 'This field is required',
            'methods_to_rectify.required' => 'This field is required',
            'periodic_reviews.required' => 'This field is required',
            'did_performance_measure_up.required' => 'This field is required',
            'shortcoming_solution_admonition.required' => 'This field is required',
            'final_evaluation.required' => 'This field is required',
            'ad_hoc_duties.required' => 'This field is required',
            'ad_hoc_performance.required' => 'This field is required',
            'schedule_from.required' => 'This field is required',
            'schedule_to.required' => 'This field is required',
            'served_under_reporting_officer.required' => 'This field is required',
            'served_under_reporting_officer_from.required' => 'This field is required',
            'served_under_reporting_officer_to.required' => 'This field is required',
            'served_under_countersigning_officer.required' => 'This field is required',
            'served_under_countersigning_officer_from.required' => 'This field is required',
            'served_under_countersigning_officer_to.required' => 'This field is required',
            'served_under_hod.required' => 'This field is required',
            'served_under_hod_from.required' => 'This field is required',
            'served_under_hod_to.required' => 'This field is required',
        ];

        $this->validate($request, $rules, $messages);

        $report = AperForm::updateOrCreate(
            ['id' => $request->id],
            [
                'current_form_page' => $request->current_form_page,
                'staff_id' => $request->staff_id,
                'joint_discussion_with_supervisor' => $request->joint_discussion_with_supervisor,
                'properly_equiped' => $request->properly_equiped,
                'dificulty_encountered' => $request->dificulty_encountered,
                'methods_to_rectify' => $request->methods_to_rectify,
                'periodic_reviews' => $request->periodic_reviews,
                'did_performance_measure_up' => $request->did_performance_measure_up,
                'shortcoming_solution_admonition' => $request->shortcoming_solution_admonition,
                'final_evaluation' => $request->final_evaluation,
                'ad_hoc_duties' => $request->ad_hoc_duties,
                'ad_hoc_performance' => $request->ad_hoc_performance,
                'schedule_from' => $request->schedule_from,
                'schedule_to' => $request->schedule_to,
                'served_under_reporting_officer' => $request->served_under_reporting_officer,
                'served_under_reporting_officer_from' => $request->served_under_reporting_officer_from,
                'served_under_reporting_officer_to' => $request->served_under_reporting_officer_to,
                'served_under_countersigning_officer' => $request->served_under_countersigning_officer,
                'served_under_countersigning_officer_from' => $request->served_under_countersigning_officer_from,
                'served_under_countersigning_officer_to' => $request->served_under_countersigning_officer_to,
                'served_under_hod' => $request->served_under_hod,
                'served_under_hod_from' => $request->served_under_hod_from,
                'served_under_hod_to' => $request->served_under_hod_to,
            ]
        );

        // division targets
        $result = APERDuty::where('aper_form_id', $report->id);
        if ($result) {
            $result->delete();
        }
        foreach ($request->duties as $duty) {
            $d = new APERDuty;
            $d->aper_form_id = $report->id;
            $d->duty = $duty['duty'];
            $d->save();
        }

        return response()->json('Jobs saved successfully.', 200);
    }


    /**
         * Store Persnola records.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
    public function storeTrainings(Request $request)
    {
        // dd($request->all());

        // set form validation rules
        $rules = [
            'trainings.*.training' => 'required|string',
            'trainings.*.location' => 'required|string',
            'trainings.*.from' => 'required',
            'trainings.*.to' => 'required',
            'training_enhanced_productivity' => 'required',
            'satisfactory_tasks' => 'required',
            'causes_success_failure' => 'required',
            'more_training' => 'required',
            'most_effective_use' => 'required',
            'abilities_better_used' => 'required',
            'had_job_satisfaction' => 'required',
            'other_comments' => 'required',
        ];

        $messages = [
            'training_enhanced_productivity.required' => 'Enter project estimated cost',
            'satisfactory_tasks.required' => 'Enter agreed project time',
            'causes_success_failure.required' => 'This field is required',
            'more_training.required' => 'This field is required',
            'most_effective_use.required' => 'This field is required',
            'abilities_better_used.required' => 'This field is required',
            'had_job_satisfaction.required' => 'This field is required',
            'other_comments.required' => 'This field is required',
        ];

        $this->validate($request, $rules, $messages);

        $report = AperForm::updateOrCreate(
            ['id' => $request->id],
            [
                'current_form_page' => $request->current_form_page,
                'staff_id' => $request->staff_id,
                'training_enhanced_productivity' => $request->training_enhanced_productivity,
                'satisfactory_tasks' => $request->satisfactory_tasks,
                'causes_success_failure' => $request->causes_success_failure,
                'more_training' => $request->more_training,
                'most_effective_use' => $request->most_effective_use,
                'abilities_better_used' => $request->abilities_better_used,
                'had_job_satisfaction' => $request->had_job_satisfaction,
                'other_comments' => $request->other_comments,
                'is_submitted' => $request->is_submitted,
            ]
        );

        // division targets
        $result = APERTraining::where('aper_form_id', $report->id);
        if ($result) {
            $result->delete();
        }
        foreach ($request->trainings as $training) {
            $t = new APERTraining;
            $t->aper_form_id = $report->id;
            $t->training = $training['training'];
            $t->location = $training['location'];
            $t->from = $training['from'];
            $t->to = $training['to'];
            $t->save();
        }

        // return response()->json('Trainings saved successfully.', 200);
        return ['report' => $report];
    }


    /**
         * Display the specified resource.
         *
         * @param  \App\AperForm  $aperForm
         * @return \Illuminate\Http\Response
         */
    public function preview($aperFormId)
    {
        $report = AperForm::with('staff', 'staff.unit.division.department', 'staff.unit.division', 'staff.unit', 'staff.gradeLevel', 'qualifications', 'divisionTargets', 'appraiseeTargets', 'duties', 'trainings', 'servingUnderReportingOfficer', 'servingUnderCountersigningOfficer', 'servingUnderHOD')->where(['id' => $aperFormId])->first();

        if (request()->expectsJson()) {
            return ['report' =>  $report];
        }

        return view( 'aper.preview')->with('report_id', $report->id);


    }

    /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\AperForm  $aperForm
         * @return \Illuminate\Http\Response
         */
    public function edit($aperFormId)
    {
        // dd (\Auth::user ());

        $departments = Department::all();
        $divisions = Division::all();
        $units = Unit::all();
        $staffs = Staff::all();
        $gradeLevels = GradeLevel::all();
        $report = AperForm::find($aperFormId);
        // dd($report );

        if (request()->expectsJson()) {
            return ['departments' => $departments, 'divisions' => $divisions, 'units' => $units, 'staffs' => $staffs, 'gradeLevels' => $gradeLevels, 'report' => $report];
        }

        $data['departments'] = $departments;
        $data['divisions'] = $divisions;
        $data['units'] = $units;
        $data['staffs'] = $staffs;
        $data['gradeLevels'] = $gradeLevels;

        return view('aper.edit', $data);
    }




    /**
         * Display the specified resource to be evaluated.
         *
         * @param  \App\AperForm  $aperForm
         * @return \Illuminate\Http\Response
         */
    public function evaluate($aperFormId)
    {

        $evaluation = APEREvaluation::with('aperForm', 'trainingNeeds')->where(['aper_form_id' => $aperFormId])->first();

        // dd($evaluation);

        if (request()->expectsJson()) {
            return ['evaluation' =>  $evaluation, 'aper_form_id' => $aperFormId];
        }

        return view('aper.evaluate')->with('report_id', $aperFormId);


    }



    /**
         * Store Persnola records.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
    public function storeEvaluate(Request $request)
    {
        // dd($request->all());

        $evaluation = APEREvaluation::updateOrCreate(
            ['aper_form_id' => $request->aper_form_id],
            [
                'aper_form_id' => $request->aper_form_id,
                'agree_on_targets' => $request->agree_on_targets,
                'agree_on_duties' => $request->agree_on_duties,
                'understands_job' => $request->understands_job,
                'applied_knowledge' => $request->applied_knowledge,
                'accomplish_in_timeframe' => $request->accomplish_in_timeframe,
                'relevant_judgement' => $request->relevant_judgement,
                'work_speed' => $request->work_speed,
                'expression_on_paper' => $request->expression_on_paper,
                'oral_expression' => $request->oral_expression,
                'relations_with_staff' => $request->relations_with_staff,
                'relations_with_public' => $request->relations_with_public,
                'management_of_staff' => $request->management_of_staff,
                'quality_of_work' => $request->quality_of_work,
                'productivity' => $request->productivity,
                'effective_use_of_figures' => $request->effective_use_of_figures,
                'intiative' => $request->intiative,
                'human_relations_grade_justification' => $request->human_relations_grade_justification,
                'dependability' => $request->dependability,
                'loyalty' => $request->loyalty,
                'honesty' => $request->honesty,
                'reliability' => $request->reliability,
                'responsibility' => $request->responsibility,
                'appearance' => $request->appearance,
                'character_traits_grade_justification' => $request->character_traits_grade_justification,
                'punctuality' => $request->punctuality,
                'attendance' => $request->attendance,
                'determination' => $request->determination,
                'resource_utilization' => $request->resource_utilization,
                'work_habit_grade_justification' => $request->work_habit_grade_justification,
                'sanctions' => $request->sanctions,
                'reward' => $request->reward,
                'define_agreed' => $request->define_agreed,
                'avoid_late_assessment' => $request->avoid_late_assessment,
                'show_good_examples' => $request->show_good_examples,
                'suggestion_for_changes' => $request->suggestion_for_changes,
                'overall_assessment' => $request->overall_assessment,
                'general_remarks' => $request->general_remarks,
                'different_job' => $request->different_job,
                'transfer_job' => $request->transfer_job,
                'reason_for_different_transfer_job' => $request->reason_for_different_transfer_job,
                'promotability' => $request->promotability,
            ]
        );

        // dd($request->aper_form_id);

        if ($request->is_evaluated) {
            $aperForm = AperForm::find($request->aper_form_id);
            $aperForm->is_evaluated = 1;
            $aperForm->save();
        }        

        // division targets
        $result = APERTrainingNeed::where('aper_evaluation_id', $evaluation->id);
        if ($result) {
            $result->delete();
        }
        foreach ($request->training_needs as $training) {
            $t = new APERTrainingNeed;
            $t->aper_evaluation_id = $evaluation->id;
            $t->training_need = $training['training_need'];
            $t->save();
        }

        return response()->json('Evaluation saved successfully.', 200);
    }


    /**
         * Remove the specified resource from storage.
         *
         * @param  \App\AperForm  $aperForm
         * @return \Illuminate\Http\Response
         */
    public function delete($aperFormId)
    {
        $report = AperForm::find($aperFormId);

        if ($report) {
            $report->delete();
        }

        return redirect('aper-forms');
    }


    /**
         *
         * @param  \App\AperForm  $aperForm
         * @return \Illuminate\Http\Response
         */
    public function accept($aperFormId)
    {
        $evaluation = AperEvaluation::where('aper_form_id', $aperFormId)->first();

        if (!$evaluation) {
            if (request()->expectsJson()) {
                return response([
                    'data' => 'Record not found'
                ], 200);
            }
        }

        $data['evaluation'] = $evaluation;
        $data['aper_form_id'] = $aperFormId;

        return view('aper.accept', $data);
    }


    /**
         *
         * @param  \App\AperForm  $aperForm
         * @return \Illuminate\Http\Response
         */
    public function acceptAperEvaluation(Request $request, $aperFormId) {

        // set form validation rules
        $rules = [
            'is_accepted' => 'required',
            'delaration_comments' => 'required',
        ];

        $messages = [
            'is_accepted.required' => 'This field is required.',
            'delaration_comments.required' => 'This field is required.',
        ];

        $this->validate($request, $rules, $messages);

        $evaluation = AperForm::where('id', $aperFormId)->first();

        if (!$evaluation) {
            if (request()->expectsJson()) {
                return response([
                    'data' => 'Record not found'
                ], 200);
            }
        }

        $evaluation->is_accepted = 1;
        $evaluation->is_finalized = 1;
        $evaluation->delaration_comments = $request->delaration_comments;
        $evaluation->save();

        return response([
                    'evaluation' => $evaluation
                ], 200);
    }
    

    /**
     * Generate reports for APER forms
     */
    public function reports() {
        
        if(request('staff_id')) {
            $staffIds[] = request('staff_id');
        } else {
            $staffIds = Staff::pluck('id');
        }

        if(request('year')) {
            $year = request('year');
        } else {
            $year = date('Y');
        }
        
        $performance = new AperForm;
        $data['aperPerformance'] = $performance->calPerformance($staffIds, $year);

        return view('aper.reports', $data);
    }
    

    /**
     * Generate reports for APER forms
     */
    public function print() {
        
        if(request('staff_id')) {
            $staffIds[] = request('staff_id');
        } else {
            $staffIds = Staff::pluck('id');
        }

        if(request('year')) {
            $year = request('year');
        } else {
            $year = date('Y');
        }
        
        $performance = new AperForm;
        $data['aperPerformance'] = $performance->calPerformance($staffIds, $year);

        $pdf = \PDF::loadView('pdf.aperreports', $data);
        return $pdf->download('aper_reports.pdf');
    }

}
