<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Repositories\StaffRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Unit;
use App\Models\GradeLevel;
use App\Models\Staff;
use App\User;
use DB;

class StaffController extends AppBaseController
{
    /** @var  StaffRepository */
    private $staffRepository;

    public function __construct(StaffRepository $staffRepo)
    {
        $this->staffRepository = $staffRepo;
    }

    /**
     * Display a listing of the Staff.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->staffRepository->pushCriteria(new RequestCriteria($request));
        $staff = $this->staffRepository->all();

        if ($request->expectsJson()) {
            return $staff->load('gradeLevel', 'unit.division.department');
        }

        $data['staffMenu'] = 1;
        $data['staff'] = $staff;

        return view('staff.index', $data);
    }

    /**
     * Show the form for creating a new Staff.
     *
     * @return Response
     */
    public function create()
    {
        $data['units'] = Unit::pluck('name', 'id');
        $data['gradeLevels'] = GradeLevel::pluck('name', 'id');

        $data['staffMenu'] = 1;

        return view('staff.create', $data);
    }

    /**
     * Store a newly created Staff in storage.
     *
     * @param CreateStaffRequest $request
     *
     * @return Response
     */
    public function store(CreateStaffRequest $request)
    {
        $input = $request->all();

        $staff = new Staff;
        $staff->pf = $input['pf'];
        $staff->fname = $input['fname'];
        $staff->lname = $input['lname'];
        $staff->full_name = $input['fname'] . ' ' . $input['lname'];
        $staff->phone = $input['phone'];
        $staff->email = $input['email'];
        $staff->unit_id = $input['unit_id'];
        $staff->grade_level_id = $input['grade_level_id'];
        $staff->should_login = 1;
        $staff->save();

        $user = new User;
        $user->name   = $staff->full_name;
        $user->email  = $staff->email;
        $user->username = strtolower($staff->fname).'.'.strtolower($staff->lname);
        $user->password = bcrypt('123456');
        $user->staff_id = $staff->id;
        $user->role_id = 5;
        $user->save();

        Flash::success('Staff saved successfully.');

        return redirect(route('staff.index'));
    }

    /**
     * Display the specified Staff.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $staff = $this->staffRepository->findWithoutFail($id);

        if (empty($staff)) {
            Flash::error('Staff not found');

            return redirect(route('staff.index'));
        }

        if (request()->expectsJson()) {
            return response([
                'staff' => $staff
            ], 200);
        }

        $data['staffMenu'] = 1;
        $data['staff'] = $staff;

        return view('staff.show', $data);
    }

    /**
     * Show the form for editing the specified Staff.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $staff = $this->staffRepository->findWithoutFail($id);

        if (empty($staff)) {
            Flash::error('Staff not found');

            return redirect(route('staff.index'));
        }
        $data['staff'] = $staff;
        $data['units'] = Unit::pluck('name', 'id');
        $data['gradeLevels'] = GradeLevel::pluck('name', 'id');

        $data['staffMenu'] = 1;

        return view('staff.edit', $data);
    }

    /**
     * Update the specified Staff in storage.
     *
     * @param  int              $id
     * @param UpdateStaffRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStaffRequest $request)
    {
        // dd($request->all());
        
        $staff = $this->staffRepository->findWithoutFail($id);

        if (empty($staff)) {
            Flash::error('Staff not found');

            return redirect(route('staff.index'));
        }
        $input = $request->all();

        $staff->pf = $input['pf'];
        $staff->fname = $input['fname'];
        $staff->lname = $input['lname'];
        $staff->full_name = $input['fname'] . ' ' . $input['lname'];
        $staff->phone = $input['phone'];
        $staff->email = $input['email'];
        $staff->unit_id = $input['unit_id'];
        $staff->grade_level_id = $input['grade_level_id'];
        $staff->should_login = 1;
        $staff->save();

        $user = User::where('staff_id', $staff->id)->first();
        $user->name   = $staff->full_name;
        $user->email  = $staff->email;
        $user->username = strtolower($staff->fname).'.'.strtolower($staff->lname);
        $user->staff_id = $staff->id;
        $user->save();

        Flash::success('Staff updated successfully.');

        return redirect(route('staff.index'));
    }

    /**
     * Remove the specified Staff from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $staff = $this->staffRepository->findWithoutFail($id);

        if (empty($staff)) {
            Flash::error('Staff not found');

            return redirect(route('staff.index'));
        }

        $this->staffRepository->delete($id);

        Flash::success('Staff deleted successfully.');

        return redirect(route('staff.index'));
    }


    public function getReset($staff_id) {
        $data['staff'] = Staff::find($staff_id);

        return view('staff.resetpassword', $data);
    }


        /**
         * store changed password
         * @param  Request $request [description]
         * @return [type]           [description]
         */
        public function storeChangedPassword(Request $request) {
            // dd($request->all());

            //password update.
        	$password           = $request->password;
        	$passwordconf       = $request->password_confirmation;
        	$id                 = $request->staff_id;

        	$rules = array(
        		'password'              => 'required|min:5|confirmed',
        		'password_confirmation' => 'required_with:password|min:5'
        		);

        	$messages = array(
        		'password.required' => 'Your new password is required',
        		'password.confirmed' => 'New password and confirmationn must match',
        		'password.min' => 'New passwordmust be at least 5 characters' );


        	$validator = \Validator::make($request->only('password', 'password_confirmation'), $rules, $messages);

        	if ($validator->fails()) {

        		return redirect()->back()->withErrors($validator);

        	}

        		$user = User::find($id);
        		$user->password = \Hash::make($password);
                $user->save();

                Flash::success('Password reset successfully.');

        	return redirect('staff');
        }
}
