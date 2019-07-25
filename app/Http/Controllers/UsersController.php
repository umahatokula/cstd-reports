<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Staff;
use App\Role;
use App\User;
use DB;
use Flash;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
    	$this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['usersMenu'] = 1;
    	$data['title'] = 'Manage Users';
    	$data['manage_users'] = 1;
    	$data['staffs'] = Staff::pluck('full_name', 'id');
    	$data['roles'] = Role::pluck('name', 'id');
    	$data['users'] = User::where('email', '!=', 'dev@ovalsofttechnologies.com')->get();
    	$data['permissions'] = [];
    	return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['usersMenu'] = 1;
    	$data['title'] = 'Manage Users';
    	$data['manage_users'] = 1;
    	$data['staffs'] = Staff::pluck('full_name', 'id');
    	$data['roles'] = Role::pluck('name', 'id');
    	$data['users'] = User::where('email', '!=', 'dev@ovalsofttechnologies.com')->get();
    	$data['permissions'] = [];
    	return view('users.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

    	$rules = [
    	'password' => 'required',
    	'role_id' => 'required',
    	];

    	$messages = [
    	'role_id.required' => 'Select a role',
    	];

    	$validator = \Validator::make($request->all(), $rules, $messages);

    	if($validator->fails()){

            Flash::error('Something went wrong. User was not added.');
    		return \Redirect::back()->withInput()->withErrors($validator);

    	}

        //get the staff details
    	$staff = Staff::find($request->staff_id);
    	$existing_user = User::where('staff_id',$request->staff_id)->first();

        //create new user
    	try{
            if ($existing_user) {
                $user = $existing_user;
            } else {
                $user = new User;
            }

    		$user->email 		= $staff->email;
    		$user->password     = \Hash::make($request->password);
    		$user->name   		= $staff->full_name;
    		$user->username     = $staff->username;
    		$user->staff_id   	= $staff->id;
    		$user->save();

            // assign role
            $role = config('roles.models.role')::where('id', '=', $request->role_id)->first();
            $user->attachRole($role);


    	} catch (\Illuminate\Database\QueryException $e){

            Flash::error('There was an error: '.$e->errorInfo[2]);
    		return \Redirect::back()->withInput()->withErrors($e->errorInfo[2]);

        }
        Flash::success('User saved successfully.');

    	return redirect('users');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = 'User details';
        $data['manage_users'] = 1;
        $data['user'] = User::find($id);

        return view('users.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
    	$data['title'] = 'Edit Users';
    	$data['manage_users'] = 1;
    	$data['user'] = User::find($id);
    	$data['members'] = Staff::pluck('full_name', 'id');
    	$data['roles'] = Role::pluck('name', 'id');

    	return view('users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());

    	$rules = [
    	'password' => 'required',
    	'role_id' => 'required',
    	];

    	$messages = [
    	'role_id.required' => 'Select a role',
    	];

    	$validator = \Validator::make($request->all(), $rules, $messages);

    	if($validator->fails()){

            Flash::error('Something went wrong. User was not edited.');
    		return \Redirect::back()->withInput()->withErrors($validator);

    	}

        //get the staff details
    	$staff = Staff::find($request->staff_id);
    	$existing_user = User::where('staff_id',$request->staff_id)->first();

        //create new user
    	try{
            if ($existing_user) {
                $user = $existing_user;
            } else {
                $user = new User;
            }

    		$user->email 		= $staff->email;
    		$user->password     = \Hash::make($request->password);
    		$user->name   		= $staff->full_name;
    		$user->username     = $staff->username;
    		$user->staff_id   	= $staff->id;
            $user->save();
            
            // delete existing role(s)
            \DB::table('role_user')->where('user_id', $user->id)->delete();

            // assign role
            $role = config('roles.models.role')::where('id', '=', $request->role_id)->first();
            $user->attachRole($role);


    	} catch (\Illuminate\Database\QueryException $e){

            Flash::error('There was an error: '.$e->errorInfo[2]);
    		return \Redirect::back()->withInput()->withErrors($e->errorInfo[2]);

        }
        Flash::success('User edited successfully.');

    	return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	dd($id);
    	$user = User::destroy($id);
    	return redirect('users');
    }


        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function delete($id)
        {
        	$user = User::destroy($id);

        	session()->flash('successMessage', 'User was deleted.');
        	return redirect('users');
        }


            /**
     * Activate Resource
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
            public function activate($id)
            {
            	$user = User::find($id);
            	$user->status_id = 1;
            	$user->save();

            	return redirect('users');
            }


            /**
     * Deactivate Resource
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
            public function deactivate($id)
            {
            	$user = User::find($id);
            	$user->status_id = 2;
            	$user->save();

            	return redirect('users');
            }


        /**
         * show form to change password
         * @param  Request $request [description]
         * @return [type]           [description]
         */
        public function changePassword() {
        	return view('settings.users.changePassword');
        }


        /**
         * store changed password
         * @param  Request $request [description]
         * @return [type]           [description]
         */
        public function storeChangedPassword(Request $request) {
            // dd($request->all());
            //password update.
        	$now_password       = $request->now_password;
        	$password           = $request->password;
        	$passwordconf       = $request->password_confirmation;
        	$id                 = $request->id;

        	$rules = array(
        		'now_password'          => 'required',
        		'password'              => 'required|min:5|confirmed|different:now_password',
        		'password_confirmation' => 'required_with:password|min:5'
        		);

        	$messages = array(
        		'now_password.required' => 'Your current password is required',
        		'password.required' => 'Your new password is required',
        		'password.confirmed' => 'New password and confirmationn must match',
        		'password.different' => 'You new password must be different from current password',
        		'password.min' => 'New passwordmust be at least 5 characters' );


        	$validator = \Validator::make($request->only('now_password', 'password', 'password_confirmation'), $rules, $messages);

        	if ($validator->fails()) {

        		return redirect()->back()->withErrors($validator);

        	} elseif (\Hash::check($now_password, \Auth::user()->password)) {

        		$user = User::find($id);
        		$user->password = \Hash::make($password);
        		$user->save();
        		return redirect()->back()->with('success', true)->with('successMessage','Password changed successfully.');

        	} else  {

        		return redirect()->back()->with('errorMessage','Old password is incorrect');

        	}

        	return view('settings.users.changePassword');
        }
    }
