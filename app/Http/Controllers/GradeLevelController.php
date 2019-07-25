<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGradeLevelRequest;
use App\Http\Requests\UpdateGradeLevelRequest;
use App\Repositories\GradeLevelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class GradeLevelController extends AppBaseController
{
    /** @var  GradeLevelRepository */
    private $gradeLevelRepository;

    public function __construct(GradeLevelRepository $gradeLevelRepo)
    {
        $this->gradeLevelRepository = $gradeLevelRepo;
    }

    /**
     * Display a listing of the GradeLevel.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->gradeLevelRepository->pushCriteria(new RequestCriteria($request));
        $gradeLevels = $this->gradeLevelRepository->all();

        $data['gradeLevelsMenu'] = 1;
        $data['gradeLevels'] = $gradeLevels;

        return view('grade_levels.index', $data);
    }

    /**
     * Show the form for creating a new GradeLevel.
     *
     * @return Response
     */
    public function create()
    {
        $data['gradeLevelsMenu'] = 1;

        return view('grade_levels.create', $data);
    }

    /**
     * Store a newly created GradeLevel in storage.
     *
     * @param CreateGradeLevelRequest $request
     *
     * @return Response
     */
    public function store(CreateGradeLevelRequest $request)
    {
        $input = $request->all();

        $gradeLevel = $this->gradeLevelRepository->create($input);

        Flash::success('Grade Level saved successfully.');

        return redirect(route('gradeLevels.index'));
    }

    /**
     * Display the specified GradeLevel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $gradeLevel = $this->gradeLevelRepository->findWithoutFail($id);

        if (empty($gradeLevel)) {
            Flash::error('Grade Level not found');

            return redirect(route('gradeLevels.index'));
        }

        $data['gradeLevelsMenu'] = 1;
        $data['gradeLevel'] = $gradeLevel;

        return view('grade_levels.show', $data);
    }

    /**
     * Show the form for editing the specified GradeLevel.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $gradeLevel = $this->gradeLevelRepository->findWithoutFail($id);

        if (empty($gradeLevel)) {
            Flash::error('Grade Level not found');

            return redirect(route('gradeLevels.index'));
        }

        $data['gradeLevelsMenu'] = 1;
        $data['gradeLevel'] = $gradeLevel;

        return view('grade_levels.edit', $data);
    }

    /**
     * Update the specified GradeLevel in storage.
     *
     * @param  int              $id
     * @param UpdateGradeLevelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGradeLevelRequest $request)
    {
        $gradeLevel = $this->gradeLevelRepository->findWithoutFail($id);

        if (empty($gradeLevel)) {
            Flash::error('Grade Level not found');

            return redirect(route('gradeLevels.index'));
        }

        $gradeLevel = $this->gradeLevelRepository->update($request->all(), $id);

        Flash::success('Grade Level updated successfully.');

        return redirect(route('gradeLevels.index'));
    }

    /**
     * Remove the specified GradeLevel from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $gradeLevel = $this->gradeLevelRepository->findWithoutFail($id);

        if (empty($gradeLevel)) {
            Flash::error('Grade Level not found');

            return redirect(route('gradeLevels.index'));
        }

        $this->gradeLevelRepository->delete($id);

        Flash::success('Grade Level deleted successfully.');

        return redirect(route('gradeLevels.index'));
    }
}
