<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatewatcherRequest;
use App\Http\Requests\UpdatewatcherRequest;
use App\Repositories\watcherRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Auth;
use App\User;
use App\Models\watcher;
use App\Models\task;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
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

    public function store(Task $task)
    {
// dd($task);
        // $task = $this->taskRepository->findWithoutFail($id);
        $task->addWatcher(request('user_id'));
        
        Flash::success('Watcher saved successfully.');     
        // return view('tasks.show',compact('task'));
        return redirect()->route('tasks.show', ['id' => $task->id]);
    }

//     public function store(CreatewatcherRequest $request)
//     {
//         // dd($request);
//         $watcher = new watcher;
//         $watcher->user_id = Input::get("user_id");
//         $watcher->task_id = Input::get("task_id"); 

//         $watcher->save();
//         $t = $watcher->task_id;
//         if (empty($watcher)) {
//             Flash::error('watcher not found');
//             return redirect(route('watchers.index'));
//         }
//         Flash::success('Watcher saved successfully.');

// // return Redirect::back()->with('message','Operation Successful !');
//      // return redirect(route('tasks.show',compact('t')));


//         return redirect()->route('tasks.show', ['id' => $t]);
//     }

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
       
        $t = $watcher->task_id;

        if (empty($watcher)) {
            Flash::error('watcher not found');

            return redirect(route('watchers.index'));
        }

        $this->watcherRepository->delete($id);

        Flash::success('watcher deleted successfully.');

        return redirect(route('tasks.show',compact('t')));

    }
}
