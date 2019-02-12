<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use DB;
use App\Http\Requests\CreatecommentRequest;
use App\Http\Requests\UpdatecommentRequest;
use App\Repositories\commentRepository;
use App\Repositories\taskRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\task;
use App\Models\watcher;
use App\Models\comment;
class commentController extends AppBaseController
{
    /** @var  commentRepository */
    private $commentRepository;

    public function __construct(commentRepository $commentRepo)
    {
        $this->commentRepository = $commentRepo;
    }

    /**
     * Display a listing of the comment.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->commentRepository->pushCriteria(new RequestCriteria($request));
        $comments = $this->commentRepository->all();

        return view('comments.index')
            ->with('comments', $comments);
    }

    /**
     * Show the form for creating a new comment.
     *
     * @return Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created comment in storage.
     *
     * @param CreatecommentRequest $request
     *
     * @return Response
     */
    // public function store(CreatecommentRequest $request)
    // {
    //     $input = $request->all();

    //     $comment = $this->commentRepository->create($input);

    //     Flash::success('Comment saved successfully.');

    //     return redirect(route('comments.index'));
    // }

    public function store(Task $task)
    {
        // dd($task);
        $task->addComment(request('body'));
        $users = User::pluck('name','id');

        $us_dep_task = DB::table('users as u')
            ->select(DB::raw('u.id uid'))
            ->join('employees as e', 'e.id', '=', 'u.employee_id')
            ->join('jobs as j', 'j.id', '=', 'e.job')
            ->join('departaments as d', 'd.id', '=', 'j.departament_id')
            ->join('tasks as t', 'd.id', '=', 't.departament_id')
            ->where('t.id',$task->id)
            ->get();
        $x=[];
        foreach($us_dep_task as $u){
            $x[]=$u->uid;
        }
        $users = User::pluck('name','id');
        // $tsk = $this->taskRepository->findWithoutFail($id);
        // dd($x);
        $watchers = watcher::with('user')->with('task')
                    ->where('task_id',$task->id)
                    // ->whereNotIn('user_id',[$tsk->pers_create])
                    ->whereNotIn('user_id',$x)
                    ->get();
        return view('tasks.show',compact('task','watchers','users'));

    }

    /**
     * Display the specified comment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $comment = $this->commentRepository->findWithoutFail($id);

        if (empty($comment)) {
            Flash::error('Comment not found');

            return redirect(route('comments.index'));
        }

        return view('comments.show')->with('comment', $comment);
    }

    /**
     * Show the form for editing the specified comment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $comment = $this->commentRepository->findWithoutFail($id);

        if (empty($comment)) {
            Flash::error('Comment not found');

            return redirect(route('comments.index'));
        }

        return view('comments.edit')->with('comment', $comment);
    }

    /**
     * Update the specified comment in storage.
     *
     * @param  int              $id
     * @param UpdatecommentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecommentRequest $request)
    {
        $comment = $this->commentRepository->findWithoutFail($id);

        if (empty($comment)) {
            Flash::error('Comment not found');

            return redirect(route('comments.index'));
        }

        $comment = $this->commentRepository->update($request->all(), $id);

        Flash::success('Comment updated successfully.');

        return redirect(route('comments.index'));
    }

    /**
     * Remove the specified comment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $comment = $this->commentRepository->findWithoutFail($id);

        if (empty($comment)) {
            Flash::error('Comment not found');

            return redirect(route('comments.index'));
        }

        $this->commentRepository->delete($id);

        Flash::success('Comment deleted successfully.');

        return redirect(route('comments.index'));
    }
}
