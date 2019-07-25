<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Repositories\UnitRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Division;
use App\Models\Staff;

class UnitController extends AppBaseController
{
    /** @var  UnitRepository */
    private $unitRepository;

    public function __construct(UnitRepository $unitRepo)
    {
        $this->unitRepository = $unitRepo;
    }

    /**
     * Display a listing of the Unit.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->unitRepository->pushCriteria(new RequestCriteria($request));
        $units = $this->unitRepository->all();

        $data['unitsMenu'] = 1;
        $data['units'] = $units;

        return view('units.index', $data);
    }

    /**
     * Show the form for creating a new Unit.
     *
     * @return Response
     */
    public function create()
    {
        $data['divisions'] = Division::pluck('name', 'id');
        $data['staffs'] = Staff::pluck('full_name', 'id');

        $data['unitsMenu'] = 1;

        return view('units.create', $data);
    }

    /**
     * Store a newly created Unit in storage.
     *
     * @param CreateUnitRequest $request
     *
     * @return Response
     */
    public function store(CreateUnitRequest $request)
    {
        $input = $request->all();

        $unit = $this->unitRepository->create($input);

        Flash::success('Unit saved successfully.');

        return redirect(route('units.index'));
    }

    /**
     * Display the specified Unit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $unit = $this->unitRepository->findWithoutFail($id);

        if (empty($unit)) {
            Flash::error('Unit not found');

            return redirect(route('units.index'));
        }

        $data['unitsMenu'] = 1;
        $data['unit'] = $unit;

        return view('units.show', $data);
    }

    /**
     * Show the form for editing the specified Unit.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $unit = $this->unitRepository->findWithoutFail($id);

        if (empty($unit)) {
            Flash::error('Unit not found');

            return redirect(route('units.index'));
        }

        $data[ 'unit'] = $unit;
        $data['divisions'] = Division::pluck('name', 'id');
        $data['staffs'] = Staff::pluck('full_name', 'id');

        $data['unitsMenu'] = 1;

        return view('units.edit', $data);
    }

    /**
     * Update the specified Unit in storage.
     *
     * @param  int              $id
     * @param UpdateUnitRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUnitRequest $request)
    {
        $unit = $this->unitRepository->findWithoutFail($id);

        if (empty($unit)) {
            Flash::error('Unit not found');

            return redirect(route('units.index'));
        }

        $unit = $this->unitRepository->update($request->all(), $id);

        Flash::success('Unit updated successfully.');

        return redirect(route('units.index'));
    }

    /**
     * Remove the specified Unit from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $unit = $this->unitRepository->findWithoutFail($id);

        if (empty($unit)) {
            Flash::error('Unit not found');

            return redirect(route('units.index'));
        }

        $this->unitRepository->delete($id);

        Flash::success('Unit deleted successfully.');

        return redirect(route('units.index'));
    }
}
