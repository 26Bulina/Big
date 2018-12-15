<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateempRequest;
use App\Http\Requests\UpdateempRequest;
use App\Repositories\empRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Notification;

class empController extends AppBaseController
{
    /** @var  empRepository */
    private $empRepository;

    public function __construct(empRepository $empRepo)
    {
        $this->empRepository = $empRepo;
    }

    /**
     * Display a listing of the emp.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->empRepository->pushCriteria(new RequestCriteria($request));
        $emps = $this->empRepository->all();

        return view('emps.index')
            ->with('emps', $emps);
    }

    /**
     * Show the form for creating a new emp.
     *
     * @return Response
     */
    public function create()
    {
        $notifications = Notification::pluck('title','id');
        return view('emps.create',compact('notifications'));
    }

    /**
     * Store a newly created emp in storage.
     *
     * @param CreateempRequest $request
     *
     * @return Response
     */
    public function store(CreateempRequest $request)
    {
        $input = $request->all();

        $emp = $this->empRepository->create($input);

        Flash::success('Emp saved successfully.');

        return redirect(route('emps.index'));
    }

    /**
     * Display the specified emp.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $emp = $this->empRepository->findWithoutFail($id);

        if (empty($emp)) {
            Flash::error('Emp not found');

            return redirect(route('emps.index'));
        }

        return view('emps.show')->with('emp', $emp);
    }

    /**
     * Show the form for editing the specified emp.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $emp = $this->empRepository->findWithoutFail($id);

        if (empty($emp)) {
            Flash::error('Emp not found');

            return redirect(route('emps.index'));
        }

        return view('emps.edit')->with('emp', $emp);
    }

    /**
     * Update the specified emp in storage.
     *
     * @param  int              $id
     * @param UpdateempRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateempRequest $request)
    {
        $emp = $this->empRepository->findWithoutFail($id);

        if (empty($emp)) {
            Flash::error('Emp not found');

            return redirect(route('emps.index'));
        }

        $emp = $this->empRepository->update($request->all(), $id);

        Flash::success('Emp updated successfully.');

        return redirect(route('emps.index'));
    }

    /**
     * Remove the specified emp from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $emp = $this->empRepository->findWithoutFail($id);

        if (empty($emp)) {
            Flash::error('Emp not found');

            return redirect(route('emps.index'));
        }

        $this->empRepository->delete($id);

        Flash::success('Emp deleted successfully.');

        return redirect(route('emps.index'));
    }
}
