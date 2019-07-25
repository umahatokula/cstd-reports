<?php

namespace App\Http\Controllers;

use App\MonthlyPerformanceEvaluation;
use Illuminate\Http\Request;
use App\MPEAbsentDays;
use App\MPEAppraiseeTarget;
use App\MPEDivisionTarget;
use App\MPETargetAchieved;
use App\MPETargetUnachieved;
use App\Setting;
use App\Models\Staff;
use Carbon\Carbon;
use Flash;

class MonthlyPerformanceEvaluationController extends Controller
{

    function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        // dd(auth()->user()->role->slug);

        // director  
        if (auth()->user()->hasRole('director')) {
        
            $data['reports'] = MonthlyPerformanceEvaluation::all();

        } elseif (auth()->user()->hasRole('headofdept')) { // counter signing officer

            $data['reports'] = MonthlyPerformanceEvaluation::where('department_id', auth()->user()->staff->unit->division->department->id)->get();

        } elseif (auth()->user()->hasRole('headofdiv')) { // unit head

            $data['reports'] = MonthlyPerformanceEvaluation::where('division_id', auth()->user()->staff->unit->division->id)->get();

        }elseif (auth()->user()->hasRole('unithead')) { // unit head

            $data['reports'] = MonthlyPerformanceEvaluation::where('unit_id', auth()->user()->staff->unit->id)->get();

        } elseif (auth()->user()->hasRole('admin')) { // admin

            $data['reports'] = MonthlyPerformanceEvaluation::where('appraisee', auth()->user()->staff->id)->get();

        } elseif (auth()->user()->hasRole('staff')) { // staff

            $data['reports'] = MonthlyPerformanceEvaluation::where('appraisee', auth()->user()->staff->id)->get();

        }


        $data['monthly_report_settings'] = Setting::where('setting_type', 'monthly_report')->first();

        $data['reportsMenu'] = 1;

        return view('reports.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mr_settings = Setting::where('setting_type', 'monthly_report')->first();

        if (!Carbon::today()->between(Carbon::parse($mr_settings->open), Carbon::parse($mr_settings->close))) {
            Flash::error('Monthly Report form is not open at this time. Kindly contact Admin.');

            return redirect('reports');
        }

        $data['reports'] = MonthlyPerformanceEvaluation::all();

        $data['reportsMenu'] = 1;
        return view('reports.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->absentDays[0]['annual_permission']);

        // set form validation rules
        $rules = [
            'from' => 'required',
            'to'    => 'required',
            'appraisee_id'    => 'required',
            'absentDays'    => 'required',
            'officer_comment'    => 'required',
            'appraiseeTargets'    => 'required',
            'divisionTargets.*.target' => 'required|string',
            'appraiseeTargets.*.target' => 'required|string',
        ];

        $messages = [
            'appraisee_id.required' => 'An apprasiee must be selected',
            'absentDays.required' => 'This section must be filled',
            'officer_comment.required' => 'Enter a comment',
            'appraiseeTargets.required' => 'Enter Appraisee\' target',
            'divisionTargets.required' => 'Enter division\' targets',
        ];

        $this->validate($request, $rules, $messages);

        $appraisee = Staff::find($request->appraisee_id);
        $appraisee = $appraisee->load('gradeLevel', 'unit.division.department');
        // dd($appraisee);

        $report = new MonthlyPerformanceEvaluation;
        $report->appraisee = $request->appraisee_id;
        $report->from = $request->from;
        $report->to = $request->to;
        $report->full_name = $appraisee->full_name;
        $report->title = $request->title;
        $report->grade_level_id = $appraisee->gradeLevel->id;
        $report->department_id = $appraisee->unit->division->department->id;
        $report->division_id = $appraisee->unit->division->id;
        $report->unit_id = $appraisee->unit->id;
        $report->comment = $request->officer_comment;
        $report->punctuality = $request->punctuality;
        $report->rating = $request->rating;
        $report->availability = $request->availability;
        $report->general_conduct = $request->general_conduct;
        $report->interpersonal_intellectual = $request->interpersonal_intellectual;
        $report->recommendation = $request->recommendation;
        $report->general_remark = $request->general_remark;
        $report->reporting_officer = $request->reporting_offcer_id;
        $report->save();


        $absentDay = new MPEAbsentDays;
        $absentDay->monthly_performance_evaluation_id = $report->id;
        $absentDay->reason = 'Annual Leave';
        $absentDay->permission = $request->absentDays[0]['annual_permission'];
        $absentDay->no_of_days = $request->absentDays[0]['annual_days'];
        $absentDay->save();

        $absentDay = new MPEAbsentDays;
        $absentDay->monthly_performance_evaluation_id = $report->id;
        $absentDay->reason = 'Sick Leave';
        $absentDay->permission = $request->absentDays[1]['sick_permission'];
        $absentDay->no_of_days = $request->absentDays[1]['sick_days'];
        $absentDay->save();

        $absentDay = new MPEAbsentDays;
        $absentDay->monthly_performance_evaluation_id = $report->id;
        $absentDay->reason = 'Compassionate Leave';
        $absentDay->permission = $request->absentDays[2]['compassionate_permission'];
        $absentDay->no_of_days = $request->absentDays[2]['compassionate_days'];
        $absentDay->save();

        $absentDay = new MPEAbsentDays;
        $absentDay->monthly_performance_evaluation_id = $report->id;
        $absentDay->reason = 'Casual Leave';
        $absentDay->permission = $request->absentDays[3]['casual_permission'];
        $absentDay->no_of_days = $request->absentDays[3]['casual_days'];
        $absentDay->save();

        $absentDay = new MPEAbsentDays;
        $absentDay->monthly_performance_evaluation_id = $report->id;
        $absentDay->reason = 'Study Leave';
        $absentDay->permission = $request->absentDays[4]['study_permission'];
        $absentDay->no_of_days = $request->absentDays[4]['study_days'];
        $absentDay->save();

        $absentDay = new MPEAbsentDays;
        $absentDay->monthly_performance_evaluation_id = $report->id;
        $absentDay->reason = 'Official Assignment';
        $absentDay->permission = $request->absentDays[5]['official_permission'];
        $absentDay->no_of_days = $request->absentDays[5]['official_days'];
        $absentDay->save();

        $absentDay = new MPEAbsentDays;
        $absentDay->monthly_performance_evaluation_id = $report->id;
        $absentDay->reason = 'Matermity Leave';
        $absentDay->permission = $request->absentDays[6]['maternity_permission'];
        $absentDay->no_of_days = $request->absentDays[6]['maternity_days'];
        $absentDay->save();

        $absentDay = new MPEAbsentDays;
        $absentDay->monthly_performance_evaluation_id = $report->id;
        $absentDay->reason = 'Examination Leave';
        $absentDay->permission = $request->absentDays[7]['exam_permission'];
        $absentDay->no_of_days = $request->absentDays[7]['exam_days'];
        $absentDay->save();

        // Appraisee Targets
        foreach ($request->appraiseeTargets as $appraiseeTarget) {
            $target = new MPEAppraiseeTarget;
            $target->monthly_performance_evaluation_id = $report->id;
            $target->target = $appraiseeTarget['target'];
            $target->save();
        }

        // Division Targets
        foreach ($request->divisionTargets as $divisionTarget) {
            $target = new MPEDivisionTarget;
            $target->monthly_performance_evaluation_id = $report->id;
            $target->target = $divisionTarget['target'];
            $target->save();
        }

        // Targets Achieved
        foreach ($request->achievedTargets as $achievedTarget) {
            $target = new MPETargetAchieved;
            $target->monthly_performance_evaluation_id = $report->id;
            $target->achieved = $achievedTarget['target'];
            $target->save();
        }

        // Targets Achieved
        foreach ($request->unachievedTargets as $unachievedTarget) {
            $target = new MPETargetUnachieved;
            $target->monthly_performance_evaluation_id = $report->id;
            $target->unachieved = $unachievedTarget['target'];
            $target->save();
        }

        return $report;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MonthlyPerformanceEvaluation  $monthlyPerformanceEvaluation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = MonthlyPerformanceEvaluation::find($id);

        if ($report) {

            if (request()->expectsJson()) {
                return $report->load('appraiseeRecord', 'reportingOfficer', 'department', 'division', 'unit', 'gradeLevel', 'absentDays', 'appraiseeTargets', 'divisionTargets', 'targetsAchieved', 'targetsUnachieved');
            }

            $data['report'] = $report->load('appraiseeRecord', 'reportingOfficer', 'department', 'division', 'unit', 'gradeLevel', 'absentDays', 'appraiseeTargets', 'divisionTargets', 'targetsAchieved', 'targetsUnachieved');
        }

        $data['reportsMenu'] = 1;

        return view('reports.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MonthlyPerformanceEvaluation  $monthlyPerformanceEvaluation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['report'] = MonthlyPerformanceEvaluation::find($id);

        $data['reportsMenu'] = 1;

        return view('reports.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MonthlyPerformanceEvaluation  $monthlyPerformanceEvaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());

        // set form validation rules
        $rules = [
            'from' => 'required',
            'to'    => 'required',
            'appraisee_id'    => 'required',
            'absentDays'    => 'required',
            'officer_comment'    => 'required',
            'appraiseeTargets'    => 'required',
            'divisionTargets.*.target' => 'required|string',
            'appraiseeTargets.*.target' => 'required|string',
        ];

        $messages = [
            'appraisee_id.required' => 'An apprasiee must be selected',
            'absentDays.required' => 'This section must be filled',
            'officer_comment.required' => 'Enter a comment',
            'appraiseeTargets.required' => 'Enter Appraisee\' target',
            'divisionTargets.required' => 'Enter division\' targets',
        ];

        $this->validate($request, $rules, $messages);

        $appraisee = Staff::find($request->appraisee_id);
        $appraisee = $appraisee->load('gradeLevel', 'unit.division.department');
        // dd($appraisee);

        $report = MonthlyPerformanceEvaluation::find($id);
        $report->appraisee = $request->appraisee_id;
        $report->from = $request->from;
        $report->to = $request->to;
        $report->full_name = $appraisee->full_name;
        $report->title = $request->title;
        $report->grade_level_id = $appraisee->gradeLevel->id;
        $report->department_id = $appraisee->unit->division->department->id;
        $report->division_id = $appraisee->unit->division->id;
        $report->unit_id = $appraisee->unit->id;
        $report->comment = $request->officer_comment;
        $report->punctuality = $request->punctuality;
        $report->rating = $request->rating;
        $report->availability = $request->availability;
        $report->general_conduct = $request->general_conduct;
        $report->interpersonal_intellectual = $request->interpersonal_intellectual;
        $report->recommendation = $request->recommendation;
        $report->general_remark = $request->general_remark;
        $report->reporting_officer = $request->reporting_offcer_id;
        $report->save();

        // delete existing absent days
        $report->absentDays()->delete();
        $absentDay = new MPEAbsentDays;
        $absentDay->monthly_performance_evaluation_id = $report->id;
        $absentDay->reason = 'Annual Leave';
        $absentDay->permission = $request->absentDays[0]['annual_permission'];
        $absentDay->no_of_days = $request->absentDays[0]['annual_days'];
        $absentDay->save();

        $absentDay = new MPEAbsentDays;
        $absentDay->monthly_performance_evaluation_id = $report->id;
        $absentDay->reason = 'Sick Leave';
        $absentDay->permission = $request->absentDays[1]['sick_permission'];
        $absentDay->no_of_days = $request->absentDays[1]['sick_days'];
        $absentDay->save();

        $absentDay = new MPEAbsentDays;
        $absentDay->monthly_performance_evaluation_id = $report->id;
        $absentDay->reason = 'Compassionate Leave';
        $absentDay->permission = $request->absentDays[2]['compassionate_permission'];
        $absentDay->no_of_days = $request->absentDays[2]['compassionate_days'];
        $absentDay->save();

        $absentDay = new MPEAbsentDays;
        $absentDay->monthly_performance_evaluation_id = $report->id;
        $absentDay->reason = 'Casual Leave';
        $absentDay->permission = $request->absentDays[3]['casual_permission'];
        $absentDay->no_of_days = $request->absentDays[3]['casual_days'];
        $absentDay->save();

        $absentDay = new MPEAbsentDays;
        $absentDay->monthly_performance_evaluation_id = $report->id;
        $absentDay->reason = 'Study Leave';
        $absentDay->permission = $request->absentDays[4]['study_permission'];
        $absentDay->no_of_days = $request->absentDays[4]['study_days'];
        $absentDay->save();

        $absentDay = new MPEAbsentDays;
        $absentDay->monthly_performance_evaluation_id = $report->id;
        $absentDay->reason = 'Official Assignment';
        $absentDay->permission = $request->absentDays[5]['official_permission'];
        $absentDay->no_of_days = $request->absentDays[5]['official_days'];
        $absentDay->save();

        $absentDay = new MPEAbsentDays;
        $absentDay->monthly_performance_evaluation_id = $report->id;
        $absentDay->reason = 'Matermity Leave';
        $absentDay->permission = $request->absentDays[6]['maternity_permission'];
        $absentDay->no_of_days = $request->absentDays[6]['maternity_days'];
        $absentDay->save();

        $absentDay = new MPEAbsentDays;
        $absentDay->monthly_performance_evaluation_id = $report->id;
        $absentDay->reason = 'Examination Leave';
        $absentDay->permission = $request->absentDays[7]['exam_permission'];
        $absentDay->no_of_days = $request->absentDays[7]['exam_days'];
        $absentDay->save();



        // delete existing appraisee Targets
        $report->appraiseeTargets()->delete();

        // Appraisee Targets
        foreach ($request->appraiseeTargets as $appraiseeTarget) {
            $target = new MPEAppraiseeTarget;
            $target->monthly_performance_evaluation_id = $report->id;
            $target->target = $appraiseeTarget['target'];
            $target->save();
        }




        // delete existing division Targets
        $report->divisionTargets()->delete();

        // Division Targets
        foreach ($request->divisionTargets as $divisionTarget) {
            $target = new MPEDivisionTarget;
            $target->monthly_performance_evaluation_id = $report->id;
            $target->target = $divisionTarget['target'];
            $target->save();
        }


        // delete existing achieved Targets
        $report->targetsAchieved()->delete();

        // Targets Achieved
        foreach ($request->achievedTargets as $achievedTarget) {
            $target = new MPETargetAchieved;
            $target->monthly_performance_evaluation_id = $report->id;
            $target->achieved = $achievedTarget['achieved'];
            $target->save();
        }


        // delete existing unachieved Targets
        $report->targetsUnachieved()->delete();

        // Targets Achieved
        foreach ($request->unachievedTargets as $unachievedTarget) {
            $target = new MPETargetUnachieved;
            $target->monthly_performance_evaluation_id = $report->id;
            $target->unachieved = $unachievedTarget['unachieved'];
            $target->save();
        }

        return $report;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MonthlyPerformanceEvaluation  $monthlyPerformanceEvaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MonthlyPerformanceEvaluation  $monthlyPerformanceEvaluation
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $report = MonthlyPerformanceEvaluation::find($id);
        if ($report) {
            $report->delete();
        }
        return redirect('reports');
    }

    public function evaluate(Request $request, $id) {
        $report = MonthlyPerformanceEvaluation::find($id);

        if (request()->expectsJson()) {
            return $report->load('appraiseeRecord', 'reportingOfficer', 'department', 'division', 'unit', 'gradeLevel', 'absentDays', 'appraiseeTargets', 'divisionTargets', 'targetsAchieved', 'targetsUnachieved');
        }

        $data['report'] = $report->load('appraiseeRecord', 'reportingOfficer', 'department', 'division', 'unit', 'gradeLevel', 'absentDays', 'appraiseeTargets', 'divisionTargets', 'targetsAchieved', 'targetsUnachieved');

        $data['reportsMenu'] = 1;
        return view('reports.evaluate', $data);
    }



    public function storeEvaluation(Request $request, $id) {
        // dd($request->all());

        if (!auth()->user()->hasRole('unithead')) {

            if (request()->expectsJson()) {
                return response([
                    'message' => 'Only unit heads can evaluate monthly reports'
                ], 403);
            }

            Flash::error('Only unit heads can evaluate monthly reports');

            return redirect()->back();
        }

        // set form validation rules
        $rules = [
            'punctuality'    => 'required',
            'availability'    => 'required',
            'general_conduct'    => 'required',
            'interpersonal_intellectual'    => 'required',
            'recommendation'    => 'required',
            'general_remark'    => 'required',
        ];

        $messages = [
            'appraisee_id.required' => 'An apprasiee must be selected',
            'punctuality.required' => 'Rate the Appraisee\'s punctuality',
            'availability.required' => 'Rate the Appraisee\'s availability',
            'general_conduct.required' => 'Rate the Appraisee\'s general conduct',
            'interpersonal_intellectual.required' => 'Comment on the Appraisee\'s interpersonal & intellectual skills',
            'recommendation.required' => 'Enter a recommendation for the Appraisee',
            'general_remark.required' => 'Enter a general remark for the Appraisee',
        ];

        $this->validate($request, $rules, $messages);

        $appraisee = Staff::find($request->appraisee_id);
        $appraisee = $appraisee->load('gradeLevel', 'unit.division.department');
        // dd($appraisee);

        $report = MonthlyPerformanceEvaluation::find($id);
        $report->appraisee = $request->appraisee_id;
        $report->punctuality = $request->punctuality;
        $report->rating = $request->rating;
        $report->availability = $request->availability;
        $report->general_conduct = $request->general_conduct;
        $report->interpersonal_intellectual = $request->interpersonal_intellectual;
        $report->recommendation = $request->recommendation;
        $report->general_remark = $request->general_remark;
        $report->reporting_officer = $request->reporting_offcer_id;
        $report->evaluating_officer = \Auth::user()->staff->id;
        $report->is_evaluated = 0;
        $report->save();

        return $report;
    }

    /**
     * Conutersign report by division head
     *
     * @param  \App\MonthlyPerformanceEvaluation  $monthlyPerformanceEvaluation
     * @return \Illuminate\Http\Response
     */
    public function counterSign(Request $request, $id)
    {

        if (!auth()->user()->hasRole('headofdiv')) {

            if (request()->expectsJson()) {
                return response([
                    'message' => 'Only heads of division can countersign monthly reports'
                ], 403);
            }

            Flash::error('Only heads of division can countersign monthly reports');

            return redirect()->back();
        }


        $report = MonthlyPerformanceEvaluation::find($id);
        $countersigningOfficerId = \Auth::user()->staff->id;
        if ($report) {
            $report->is_counter_signed = 1;
            $report->countersigning_officer = $countersigningOfficerId;
            $report->save();
        }
        return redirect('reports');
    }
}
