<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\AperForm;
use App\MonthlyPerformanceEvaluation;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['dashboardMenu'] = 1;

        $data['months'] = [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        ];

        $years = [];
        $y = (date('Y') - 4);
        for ($i=$y; $i < date('Y'); $i++) {
            $years[] = $i;
        }
        $data['years'] = $years;

        $user = \Auth::user();

        // director
        if ($user->hasRole('director')) {
          $data['aperForms'] = AperForm::all();
          $data['pendingAperForms'] = $this->pendingAperForms();
          $data['aperFormsEvaluationInProgress'] = $this->aperFormsEvaluationInProgress();
          $data['aperFormsEvaluationFinalized'] = $this->aperFormsEvaluationFinalized();

          $data['reports'] = $this->allMonthlyReports();
          $data['counterSigned'] = $this->monthlyReportsCountersigned();

          return view('dashboard', $data);
        }

        // counter signing officer
        if ($user->hasRole('head_of_dept')) {
          $data['aperForms'] = AperForm::all();
          $data['pendingAperForms'] = $this->pendingAperForms();
          $data['aperFormsEvaluationInProgress'] = $this->aperFormsEvaluationInProgress();
          $data['aperFormsEvaluationFinalized'] = $this->aperFormsEvaluationFinalized();

          $reports = $this->allMonthlyReports();

          $data['reports'] = $reports->filter(function ($value, $key) {
                return $value->department_id == auth()->user()->staff->unit->division->department->id;
            });

          return view('dashboard', $data);
        }

        // reporting officer
        if ($user->hasRole('head_of_div')) {
          $data['aperForms'] = AperForm::all();
          $data['pendingAperForms'] = $this->pendingAperForms();
          $data['aperFormsEvaluationInProgress'] = $this->aperFormsEvaluationInProgress();
          $data['aperFormsEvaluationFinalized'] = $this->aperFormsEvaluationFinalized();

          $reports = $this->allMonthlyReports();

          $data['reports'] = $reports->filter(function ($value, $key) {
                return $value->staff_id == auth()->user()->staff->id;
            });

          return view('dashboard', $data);
        }

        // staff
        if ($user->hasRole('staff')) {

          return redirect('reports');
        }

    }

    /**
     * APerforms that have been submitted but not evaluated or in evaluation
     */
    function pendingAperForms() {
        $query = AperForm::query();

        if (request()->has('year')) {
            $query = $query->where(['year' => request('year')]);
        }

        $query = $query->where('is_submitted', '=', 1)->where('is_evaluated', '=', 0)->get();

        return $query;

    }


    function aperFormsEvaluationInProgress() {
        $query = AperForm::query();

        if (request()->has('year')) {
            $query = $query->where(['year' => request('year')]);
        }

        $query = $query->where('is_evaluated', 1)->get();

        return $query;

    }

    function aperFormsEvaluationFinalized() {
        $query = AperForm::query();

        if (request()->has('year')) {
            $query = $query->where(['year' => request('year')]);
        }

        $query = $query->where('is_finalized', 1)->get();

        return $query;

    }

    // all monthly reports
    function allMonthlyReports() {
        $query = MonthlyPerformanceEvaluation::query();

        if (request()->has('year')) {
            $query = $query->where(['year' => request('year')]);
        }

        $query = $query->get();

        return $query;

    }

    // counter signed monthyl report
    function monthlyReportsCountersigned() {
        $query = MonthlyPerformanceEvaluation::query();

        if (request()->has('year')) {
            $query = $query->where(['year' => request('year')]);
        }

        $query = $query->where(['is_counter_signed' => 1])->get();

        return $query;

    }

}
