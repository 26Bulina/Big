<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateseenRequest;
use App\Http\Requests\UpdateseenRequest;
use App\Repositories\seenRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class seenController extends AppBaseController
{
    /** @var  seenRepository */
    private $seenRepository;

    public function __construct(seenRepository $seenRepo)
    {
        $this->seenRepository = $seenRepo;
    }

    /**
     * Display a listing of the seen.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->seenRepository->pushCriteria(new RequestCriteria($request));
        $seens = $this->seenRepository->all();

        return view('seens.index')
            ->with('seens', $seens);
    }

    /**
     * Show the form for creating a new seen.
     *
     * @return Response
     */
    public function create()
    {
        return view('seens.create');
    }

    /**
     * Store a newly created seen in storage.
     *
     * @param CreateseenRequest $request
     *
     * @return Response
     */
    public function store(CreateseenRequest $request)
    {
        $input = $request->all();

        $seen = $this->seenRepository->create($input);

        Flash::success('Seen saved successfully.');

        return redirect(route('seens.index'));
    }

    /**
     * Display the specified seen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $seen = $this->seenRepository->findWithoutFail($id);

        if (empty($seen)) {
            Flash::error('Seen not found');

            return redirect(route('seens.index'));
        }

        return view('seens.show')->with('seen', $seen);
    }

    /**
     * Show the form for editing the specified seen.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $seen = $this->seenRepository->findWithoutFail($id);

        if (empty($seen)) {
            Flash::error('Seen not found');

            return redirect(route('seens.index'));
        }

        return view('seens.edit')->with('seen', $seen);
    }

    /**
     * Update the specified seen in storage.
     *
     * @param  int              $id
     * @param UpdateseenRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateseenRequest $request)
    {
        $seen = $this->seenRepository->findWithoutFail($id);

        if (empty($seen)) {
            Flash::error('Seen not found');

            return redirect(route('seens.index'));
        }

        $seen = $this->seenRepository->update($request->all(), $id);

        Flash::success('Seen updated successfully.');

        return redirect(route('seens.index'));
    }

    /**
     * Remove the specified seen from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $seen = $this->seenRepository->findWithoutFail($id);

        if (empty($seen)) {
            Flash::error('Seen not found');

            return redirect(route('seens.index'));
        }

        $this->seenRepository->delete($id);

        Flash::success('Seen deleted successfully.');

        return redirect(route('seens.index'));
    }
}
