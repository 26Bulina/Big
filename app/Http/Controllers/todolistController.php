<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatetodolistRequest;
use App\Http\Requests\UpdatetodolistRequest;
use App\Repositories\todolistRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use App\Models\todoLists;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

use App\User;
use App\Models;
use App\Models\repository;
use App\Models\status;
use App\Models\priority;
use App\Models\task;
use App\Models\comment;
use App\Models\departament;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class todolistController extends AppBaseController
{
    /** @var  todo_listRepository */
    private $todoListRepository;

    public function __construct(todolistRepository $todoListRepo)
    {
        $this->todoListRepository = $todoListRepo;
    }

    /**
     * Display a listing of the todo_list.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->todoListRepository->pushCriteria(new RequestCriteria($request));
        $todoLists = $this->todoListRepository->all();

        return view('todolists.index')
            ->with('todoLists', $todoLists);
    }

    /**
     * Show the form for creating a new todo_list.
     *
     * @return Response
     */
    public function create()
    {
        return view('todolists.create');
    }

    /**
     * Store a newly created todo_list in storage.
     *
     * @param Createtodo_listRequest $request
     *
     * @return Response
     */
    public function store(CreatetodolistRequest $request)
    {
        // $input = $request->all();
        // $todoList = $this->todoListRepository->create($input);


        $todoList = new todoList;
        $todoList->pers_create = Auth::user()->id;
        $todoList->note_name = Input::get("note_name");
        $todoList->done = Input::get("done");
        $todoList->save();
        Flash::success('Todo List saved successfully.');

        return redirect(route('todoLists.index'));
    }

    /**
     * Display the specified todo_list.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $todoList = $this->todoListRepository->findWithoutFail($id);

        if (empty($todoList)) {
            Flash::error('Todo List not found');

            return redirect(route('todoLists.index'));
        }

        return view('todolists.show')->with('todoList', $todoList);
    }

    /**
     * Show the form for editing the specified todo_list.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $todoList = $this->todoListRepository->findWithoutFail($id);

        if (empty($todoList)) {
            Flash::error('Todo List not found');

            return redirect(route('todoLists.index'));
        }

        return view('todolists.edit')->with('todoList', $todoList);
    }

    /**
     * Update the specified todo_list in storage.
     *
     * @param  int              $id
     * @param Updatetodo_listRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetodolistRequest $request)
    {
        $todoList = $this->todoListRepository->findWithoutFail($id);

        if (empty($todoList)) {
            Flash::error('Todo List not found');

            return redirect(route('todoLists.index'));
        }

        $todoList = $this->todoListRepository->update($request->all(), $id);

        Flash::success('Todo List updated successfully.');

        return redirect(route('todoLists.index'));
    }

    /**
     * Remove the specified todo_list from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $todoList = $this->todoListRepository->findWithoutFail($id);

        if (empty($todoList)) {
            Flash::error('Todo List not found');

            return redirect(route('todoLists.index'));
        }

        $this->todoListRepository->delete($id);

        Flash::success('Todo List deleted successfully.');

        return redirect(route('todoLists.index'));
    }
}
