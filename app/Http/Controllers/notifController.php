<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatenotifRequest;
use App\Http\Requests\UpdatenotifRequest;
use App\Repositories\notifRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\User;

class notifController extends AppBaseController
{
    /** @var  notifRepository */
    private $notifRepository;

    public function __construct(notifRepository $notifRepo)
    {
        $this->notifRepository = $notifRepo;
    }

    /**
     * Display a listing of the notif.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->notifRepository->pushCriteria(new RequestCriteria($request));
        $notifs = $this->notifRepository->all();

        return view('notifs.index')
            ->with('notifs', $notifs);
    }

    /**
     * Show the form for creating a new notif.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::pluck('name','id');
        return view('notifs.create',compact('users'));
    }

    /**
     * Store a newly created notif in storage.
     *
     * @param CreatenotifRequest $request
     *
     * @return Response
     */
    public function store(CreatenotifRequest $request)
    {
        $input = $request->all();

        $notif = $this->notifRepository->create($input);

        Flash::success('Notif saved successfully.');

        return redirect(route('notifs.index'));
    }

    /**
     * Display the specified notif.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $notif = $this->notifRepository->findWithoutFail($id);

        if (empty($notif)) {
            Flash::error('Notif not found');

            return redirect(route('notifs.index'));
        }

        return view('notifs.show')->with('notif', $notif);
    }

    /**
     * Show the form for editing the specified notif.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $users = User::pluck('name','id');
        $notif = $this->notifRepository->findWithoutFail($id);

        if (empty($notif)) {
            Flash::error('Notif not found');

            return redirect(route('notifs.index'));
        }

        return view('notifs.edit',compact('notif','users'));
    }

    /**
     * Update the specified notif in storage.
     *
     * @param  int              $id
     * @param UpdatenotifRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatenotifRequest $request)
    {
        $notif = $this->notifRepository->findWithoutFail($id);

        if (empty($notif)) {
            Flash::error('Notif not found');

            return redirect(route('notifs.index'));
        }

        $notif = $this->notifRepository->update($request->all(), $id);

        Flash::success('Notif updated successfully.');

        return redirect(route('notifs.index'));
    }

    /**
     * Remove the specified notif from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $notif = $this->notifRepository->findWithoutFail($id);

        if (empty($notif)) {
            Flash::error('Notif not found');

            return redirect(route('notifs.index'));
        }

        $this->notifRepository->delete($id);

        Flash::success('Notif deleted successfully.');

        return redirect(route('notifs.index'));
    }
}
