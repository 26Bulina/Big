<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetaskRequest;
use App\Http\Requests\UpdatetaskRequest;
use App\Repositories\taskRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\User;
use App\Models\repository;
use App\Models\status;
use App\Models\priority;
use Illuminate\Support\Facades\Storage;

class taskController extends AppBaseController
{
    /** @var  taskRepository */
    private $taskRepository;

    public function __construct(taskRepository $taskRepo)
    {
        $this->taskRepository = $taskRepo;
    }

    /**
     * Display a listing of the task.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->taskRepository->pushCriteria(new RequestCriteria($request));
        $tasks = $this->taskRepository->all();

        return view('tasks.index')
            ->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new task.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::pluck('name','id');
        $repositories = Repository::pluck('name','id');
        $priorities = Priority::pluck('name','id');
        $statuses = Status::pluck('name','id');
        return view('tasks.create',compact('statuses','priorities','repositories','users'));
    }

    /**
     * Store a newly created task in storage.
     *
     * @param CreatetaskRequest $request
     *
     * @return Response
     */
    public function store(CreatetaskRequest $request)
    {
        $input = $request->all();

        $task = $this->taskRepository->create($input);

        Flash::success('Task saved successfully.');

        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified task.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $task = $this->taskRepository->findWithoutFail($id);

        if (empty($task)) {
            Flash::error('Task not found');

            return redirect(route('tasks.index'));
        }

        return view('tasks.show')->with('task', $task);
    }

    /**
     * Show the form for editing the specified task.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $users = User::pluck('name','id');
        $repositories = Repository::pluck('name','id');
        $priorities = Priority::pluck('name','id');
        $statuses = Status::pluck('name','id');
        $task = $this->taskRepository->findWithoutFail($id);

        if (empty($task)) {
            Flash::error('Task not found');

            return redirect(route('tasks.index'));
        }

        return view('tasks.edit',compact('task','statuses','priorities','repositories','users'));
    }

    /**
     * Update the specified task in storage.
     *
     * @param  int              $id
     * @param UpdatetaskRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetaskRequest $request)
    {
        $task = $this->taskRepository->findWithoutFail($id);

        if (empty($task)) {
            Flash::error('Task not found');

            return redirect(route('tasks.index'));
        }

        $task = $this->taskRepository->update($request->all(), $id);

        Flash::success('Task updated successfully.');

        return redirect(route('tasks.index'));
    }

    /**
     * Remove the specified task from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $task = $this->taskRepository->findWithoutFail($id);

        if (empty($task)) {
            Flash::error('Task not found');

            return redirect(route('tasks.index'));
        }

        $this->taskRepository->delete($id);

        Flash::success('Task deleted successfully.');

        return redirect(route('tasks.index'));
    }
}
