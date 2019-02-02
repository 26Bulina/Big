<?php
namespace App\Http\Controllers;
use DB;
use Flash;
use Response;
use Auth;
// use App\Charts\SampleChart;
// use ConsoleTVs\Charts\Charts;
// use ConsoleTVs\Charts\Facades\Charts;
// use Charts;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Http\Requests\CreatetaskRequest;
use App\Http\Requests\UpdatetaskRequest;
use App\Repositories\taskRepository;
use App\Http\Controllers\AppBaseController;
use App\User;
use App\Models;
use App\Models\repository;
use App\Models\status;
use App\Models\priority;
use App\Models\task;
use App\Models\comment;
use App\Models\departament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class taskController extends AppBaseController
{
    /** @var  taskRepository */
    private $taskRepository;

    public function __construct(taskRepository $taskRepo)
    {
        $this->taskRepository = $taskRepo;
    }

    // public function gogo ()
    // // (Request $request)
    // { 

    //     $t = DB::select(DB::raw('select * from tasks'));
    //     // $chart = new SampleChart;
    //     $c = Charts::create($t, 'bar','highcharts')
    //                     -> title('bete task-uri')
    //                     ->elementLabel("Product Details")
    //                     ->dimensions(1000,500)
    //                     ->responsive(false)
    //                     ->groupByMonth(date('Y'), true);

    //     // dd($chart);
    //        $erik = Charts::create('pie','highcharts')
    //                     -> setTitle('Placintuta')
    //                     -> setElementLabel("Product Details")
    //                     ->setLabels(['p1','p2','p3'])
    //                     ->setValues(['10','45','45'])
    //                     ->dimensions(1000,500)
    //                     ->responsive(true);         

    //         $pie_chart = Charts::create('pie','highcharts')
    //                     -> title('Placintuta')
    //                     ->labels(['p1','p2','p3'])
    //                     ->values(['10','45','45'])
    //                     ->dimensions(1000,500)
    //                     ->responsive(true);
    //         // return view('tasks', compact('pie_chart'));
    //         return view('tasks', compact('erik'));
    //         // return view ('tasks.index', ['erik' => $erik]);
    // }








    /**
     * Display a listing of the task.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {   

        $s = $request->input('s');
        $tasks = Task::first()
                ->search ($s)
                ->paginate(10)
                ;
        // $this->taskRepository->pushCriteria(new RequestCriteria($request));
        // $tasks = $this->taskRepository
        //               ->all();
        // return view('tasks.index')->with('tasks', task::paginate(10));
        return view('tasks.index',compact('tasks','s', task::paginate(10)
         ));
    }

    /**
     * Show the form for creating a new task.
     *
     * @return Response
     */
    public function create()
    {


        $pers_per_dep = DB::select(DB::raw('select u.id user, d.id dep
                                    from users u
                                    inner join employees e on e.id=u.employee_id
                                    inner join jobs j on j.id =e.job
                                    inner join departaments d on d.id=j.departament_id
                                    '));

        $users = User::pluck('name','id');
        // $repositories = Repository::pluck('name','id');
                                    // all
        $repositories = DB::table('tasks as t')
                        ->select(DB::raw( 'CONCAT(d.name,": ",r.name) as name,r.id id'))
                                    ->join('departaments as d', 'd.id', '=', 't.departament_id')
                                    ->join('repositories as r', 'r.id', '=', 't.repository_id')
                                    ->orderBy('d.id')
                                    ->pluck('name', 'id');
        $priorities = Priority::pluck('name','id');
        $statuses = Status::pluck('name','id');
        $departaments = Departament::pluck('name','id');

        // $pers_co = DB::table('periodcos as co')
        //              ->select(DB::raw( 'co.user_id user'))
        //              ->join('users as u', 'u.id', '=', 'co.user_id')
        //              ->join('tasks as t', 'u.id', '=', 't.pers_assign')
        //              ->where('co.start_date', '<=', date('Y-m-d'))
        //              ->where('co.end_date', '>=', date('Y-m-d'))
        //              // ->whereBetween('current_date',['co.start_date','co.end_date'])
        //              ->get();

        //              $x = [];
        //              foreach ( $pers_co as $p)
        //              {
        //                 $x[]=$p->user;
        //              }

           // dd ($x);        
        // $nr_task = DB::table('tasks as t')
        //              ->select(DB::raw( 't.pers_assign ,t.departament_id t_dep, count(t.id) as nr_tsk'))
        //              ->join('users as u', 'u.id', '=', 't.pers_assign')
        //              ->join('employees as e', 'e.id', '=', 'u.employee_id')
        //              ->join('jobs as j', 'j.id', '=', 'e.job')
        //              ->join('departaments as d', 'd.id', '=', 'j.departament_id')
        //              ->whereNotIn('t.pers_assign',
        //                 // $pers_co[0]['user']
        //                 $x
        //             )
        //              ->where('t.departament_id','=',4)
        //              ->groupBy('pers_assign')
        //              ->groupBy('t_dep')
        //              ->orderBy('nr_tsk', 'asc')
        //              // ->take(1) 
        //              ->get();
        

        return view('tasks.create',compact('statuses','priorities','repositories','departaments','users','nr_task','pers_per_dep','pers_co'));
    }

    /**
     * Store a newly created task in storage.
     *
     * @param CreatetaskRequest $request
     *
     * @return Response
     */
    public function store( CreatetaskRequest $request)
    {
// initial 
        // $input = $request->all();
        // $task = $this->taskRepository->create($input);

        $task = new task;
        $task->subject = Input::get("subject");
        $task->body = Input::get("body");
        
        $task->pers_create = Auth::user()->id;
        $task->status_id = 1;
        $task->priority_id = 2;
        $task->repository_id = Input::get("repository_id");
        $task->departament_id = Input::get("departament_id");
        $task->created_at = Input::get("created_at");





        $pers_co = DB::table('periodcos as co')
                     ->select(DB::raw( 'co.user_id user'))
                     ->join('users as u', 'u.id', '=', 'co.user_id')
                     ->join('tasks as t', 'u.id', '=', 't.pers_assign')
                     ->where('co.start_date', '<=', date('Y-m-d'))
                     ->where('co.end_date', '>=', date('Y-m-d'))
                     // ->whereBetween('current_date',['co.start_date','co.end_date'])
                     ->get();

                     $x = [];
                     foreach ( $pers_co as $p)
                     {
                        $x[]=$p->user;
                     }

           // dd ($x);        
        $nr_task = DB::table('tasks as t')
                     ->select(DB::raw( 't.pers_assign ,t.departament_id t_dep, count(t.id) as nr_tsk'))
                     ->join('users as u', 'u.id', '=', 't.pers_assign')
                     ->join('employees as e', 'e.id', '=', 'u.employee_id')
                     ->join('jobs as j', 'j.id', '=', 'e.job')
                     ->join('departaments as d', 'd.id', '=', 'j.departament_id')
                     ->whereNotIn('t.pers_assign',$x)
                     ->where('t.departament_id','=',$request->get('departament_id'))
                     // -> where(t.status_id,<>,3) -> where(t.status_id,<>,4)
                     ->groupBy('pers_assign')
                     ->groupBy('t_dep')
                     ->orderBy('nr_tsk', 'asc')
                     // ->take(1) 
                     ->get();               

        $task->pers_assign =  $nr_task[0]->pers_assign;

        $task->fisier = Input::get("fisier");
        
        $task->updated_at = Input::get("updated_at");
        $task->deleted_at = Input::get("deleted_at");
        $task->save();


        Flash::success('Task saved successfully.');

        return redirect(route('tasks.index',compact('nr_task','pers_co')));
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
        // $comments = Comment::all();
        // return view('tasks.show')->with('task', $task);
        return view('tasks.show')
        ->with('task', $task);
        // ->with('nrx_task', $nr_task);
    }

    /**
     * Show the form for editing the specified task.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, Request $request)
    {


        $users = DB::table('users as u')
                 ->select(DB::raw( 'CONCAT(d.name,": ",u.name) as name,u.id id'))
                                    ->join('employees as e', 'e.id', '=', 'u.employee_id')
                                     ->join('jobs as j', 'j.id', '=', 'e.job')
                                     ->join('departaments as d', 'd.id', '=', 'j.departament_id')
                                     ->orderBy('d.id')
                                    ->pluck('name', 'id'); 
        // $users = User::pluck('name','id');
        // $repositories = Repository::pluck('name','id');
        $repositories = DB::table('tasks as t')
                        ->select(DB::raw( 'CONCAT(d.name,": ",r.name) as name,r.id id'))
                                    ->join('departaments as d', 'd.id', '=', 't.departament_id')
                                    ->join('repositories as r', 'r.id', '=', 't.repository_id')
                                    ->orderBy('d.id')
                                    ->pluck('name', 'id');
        $priorities = Priority::pluck('name','id');
        $statuses = Status::pluck('name','id');
        $departaments = Departament::pluck('name','id');
        $task = $this->taskRepository->findWithoutFail($id);
        if (empty($task)) {
            Flash::error('Task not found');

            return redirect(route('tasks.index'));
        }

        return view('tasks.edit',
               compact('task','statuses','priorities','departaments','repositories','users'));
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


    public function comment(Request $request, $task_id)
    {

              // $task = $this->taskRepository->findWithoutFail($id);
              $this->validate($request, [
                'body'=>'required'
                ]);
              $comment = new comment;
              $comment->user_id = Auth::user()->id;  //ia id-ul celui inrgistrat?????
              $comment->task_id = $task_id;
              $comment->body = $request->input('body');
              $comment->save();
              // return redirect(route('tasks.show'))->
              return view('tasks.show')->with('response', 'comm salvat!');
    }


}
