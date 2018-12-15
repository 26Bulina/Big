<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatewatcherRequest;
use App\Http\Requests\UpdatewatcherRequest;
use App\Repositories\watcherRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class watcherController extends AppBaseController
{
    /** @var  watcherRepository */
    private $watcherRepository;

    public function __construct(watcherRepository $watcherRepo)
    {
        $this->watcherRepository = $watcherRepo;
    }

    /**
     * Display a listing of the watcher.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->watcherRepository->pushCriteria(new RequestCriteria($request));
        $watchers = $this->watcherRepository->all();

        return view('watchers.index')
            ->with('watchers', $watchers);
    }

    /**
     * Show the form for creating a new watcher.
     *
     * @return Response
     */
    public function create()
    {
        return view('watchers.create');
    }

    /**
     * Store a newly created watcher in storage.
     *
     * @param CreatewatcherRequest $request
     *
     * @return Response
     */
    public function store(CreatewatcherRequest $request)
    {
        $input = $request->all();

        $watcher = $this->watcherRepository->create($input);

        Flash::success('Watcher saved successfully.');

        return redirect(route('watchers.index'));
    }

    /**
     * Display the specified watcher.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $watcher = $this->watcherRepository->findWithoutFail($id);

        if (empty($watcher)) {
            Flash::error('Watcher not found');

            return redirect(route('watchers.index'));
        }

        return view('watchers.show')->with('watcher', $watcher);
    }

    /**
     * Show the form for editing the specified watcher.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $watcher = $this->watcherRepository->findWithoutFail($id);

        if (empty($watcher)) {
            Flash::error('Watcher not found');

            return redirect(route('watchers.index'));
        }

        return view('watchers.edit')->with('watcher', $watcher);
    }

    /**
     * Update the specified watcher in storage.
     *
     * @param  int              $id
     * @param UpdatewatcherRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatewatcherRequest $request)
    {
        $watcher = $this->watcherRepository->findWithoutFail($id);

        if (empty($watcher)) {
            Flash::error('Watcher not found');

            return redirect(route('watchers.index'));
        }

        $watcher = $this->watcherRepository->update($request->all(), $id);

        Flash::success('Watcher updated successfully.');

        return redirect(route('watchers.index'));
    }

    /**
     * Remove the specified watcher from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $watcher = $this->watcherRepository->findWithoutFail($id);

        if (empty($watcher)) {
            Flash::error('Watcher not found');

            return redirect(route('watchers.index'));
        }

        $this->watcherRepository->delete($id);

        Flash::success('Watcher deleted successfully.');

        return redirect(route('watchers.index'));
    }
}
