<?php

namespace App\Http\Controllers;
use App\Models\notif;
use Illuminate\Support\Facades\Input;

use Auth;
use App\Http\Requests\CreatenotifRequest;
use App\Http\Requests\UpdatenotifRequest;
use App\Repositories\notifRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\User;
use App\models\notifs;

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
        // $u = user::find(1)->notifs;
        // dd($u);
        $notification1 = notif::where ('modif_app',1)->get();
        $notification2 = notif::where ('happy_team',1)->get();
        $notification3 = notif::where ('work_team',1)->get();

        $this->notifRepository->pushCriteria(new RequestCriteria($request));
        $notifs = $this->notifRepository->all();

        return view('notifs.index',
            compact('notifs','notification1','notification2','notification3'));
    }

    /**
     * Show the form for creating a new notif.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::pluck('name','id');
        $notification1 = notif::where ('modif_app',1)->get();
        $notification2 = notif::where ('happy_team',1)->get();
        $notification3 = notif::where ('work_team',1)->get();
        return view('notifs.create',
                compact('users','notification1','notification2','notification3'));
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
        // $input = $request->all();

        // $notif = $this->notifRepository->create($input);
        $notif = new notif;
        $notif->title = Input::get("title");
        $notif->body = Input::get("body");
        $notif->user_id = Auth::user()->id;
        $notif->modif_app = Input::get("modif_app");
        $notif->happy_team = Input::get("happy_team");
        $notif->work_team = Input::get("work_team");
        $notif->save();
        Flash::success('Notificare salvata cu succes.');

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
