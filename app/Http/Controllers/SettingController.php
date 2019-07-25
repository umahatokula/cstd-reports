<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

use Flash;
use Carbon\Carbon;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['settingsMenu']  = 1;
        $data['settings'] = Setting::all();

        return view('settings.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMonthlyReport(Request $request)
    {
        // dd($request->all());

        // set form validation rules
        $rules = [
            'mr_open' => 'required:' . Carbon::today(),
            'mr_close'    => 'required:' . Carbon::today(),
        ];

        $messages = [
            'mr_open.required' => 'Select a date the Monthly Report Form Opens to Staff',
            'mr_close.required' => 'Select a date the Monthly Report Form Closes to Staff',
            // 'open.after_or_equal' => 'You cannot select a date in the past',
            // 'close.after_or_equal' => 'You cannot select a date in the past',
        ];

        $this->validate($request, $rules, $messages);

        $mr = Setting::where('setting_type', 'monthly_report')->first();
        $mr->open = $request->mr_open;
        $mr->close = $request->mr_close;
        $mr->save();

        Flash::success('Dates saved successfully.');

        return redirect('settings');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeAPPER(Request $request)
    {
        // dd($request->all());

        // set form validation rules
        $rules = [
            'apper_open' => 'required:' . Carbon::today(),
            'apper_close'    => 'required:' . Carbon::today(),
        ];

        $messages = [
            'apper_open.required' => 'Select a date the APPER Form Opens to Staff',
            'apper_close.required' => 'Select a date the APPER Form Closes to Staff',
            'apper_open.after_or_equal' => 'You cannot select a date in the past',
            'apper_close.after_or_equal' => 'You cannot select a date in the past',
        ];

        $this->validate($request, $rules, $messages);

        $mr = Setting::where('setting_type', 'apper')->first();
        $mr->open = $request->apper_open;
        $mr->close = $request->apper_close;
        $mr->save();

        Flash::success('Dates saved successfully.');

        return redirect('settings');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
