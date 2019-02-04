<?php
 
namespace App\Http\Controllers;

use App\Http\Requests\CreateEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Repositories\EmployeeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use DB;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Employee;
use App\Models\Job;
use Auth;
use App\User;
use App\Models\zileco;
use App\Models\periodco;
use App\Models\Task;
class EmployeeController extends AppBaseController
{
    /** @var  EmployeeRepository */
    private $employeeRepository;


    public function __construct(EmployeeRepository $employeeRepo)
    {
        $this->employeeRepository = $employeeRepo;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
        protected function validator(array $data)
    {
        return Validator::make($data, [
            'cnp' => 'required|number|max:10|min:10',
            'personal_email' => 'string|email|max:255|unique',
        ]);
    }

    /**
     * User profile
     *
     */
        public function profile(Request $request)
    {
         $this->employeeRepository->pushCriteria(new RequestCriteria($request));
        $employees = $this->employeeRepository->all();
        $users =  Auth::user();
        $eid = Auth::user()->employee_id;
        $uid = Auth::user()->id;
        // $profil = DB::table('employees')->where('id', $eid)->get();
         $profil = Employee::with('job')->where('id', $eid)->get();
        // $concediu = DB::table('periodcos')->where('user_id', $uid)->get();
        $concediu = periodco::with('tipco')->where('user_id', $uid)->get();
        // $zileco = DB::table('zilecos')->where('user_id', $uid)->get();
        $zileco = zileco::with('tipconcediu')->where('user_id', $uid)->get();


        $ramase = DB::select( DB::raw(
            'select pp.u, pp.tc, pp.nrz, 
                    z.user_id, z.tipconcediu_id, z.nr_zile ,
                    z.nr_zile-pp.nrz ramase
                    from (  select p.user_id u, p.tipconcediu_id tc,
                                 sum(p.nrzile) nrz
                            from periodcos p
                            group by p.user_id,p.tipconcediu_id 
                         ) pp
                    inner join zilecos z on z.user_id=pp.u 
                                         and z.tipconcediu_id=pp.tc'
                    ));

        return view('profile', compact('employees','users','profil','concediu','ramase','zileco','eid'));
    }




    /**
     * Display a listing of the Employee.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->employeeRepository->pushCriteria(new RequestCriteria($request));
        $employees = $this->employeeRepository->all();
// dd($employees);
        return view('employees.index')
            ->with('employees', $employees);
    }

    /**
     * Show the form for creating a new Employee.
     *
     * @return Response
     */
    public function create()
    {
        $jobs = Job::pluck('name','id');
        $employees = Employee::pluck('last_name','id');
        return view('employees.create',compact('employees','jobs'));
    }

    /**
     * Store a newly created Employee in storage.
     *
     * @param CreateEmployeeRequest $request
     *
     * @return Response
     */
    public function store(CreateEmployeeRequest $request)
    {
        $input = $request->all();

        $employee = $this->employeeRepository->create($input);

        Flash::success('Employee saved successfully.');

        return redirect(route('employees.index'));
    }

    /**
     * Display the specified Employee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $employee = $this->employeeRepository->findWithoutFail($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        return view('employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified Employee.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $jobs = Job::pluck('name','id');
        $employees = Employee::pluck('last_name','id');
        $employee = $this->employeeRepository->findWithoutFail($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }
        return view('employees.edit',compact('employee','employees','jobs'));
    }

    /**
     * Update the specified Employee in storage.
     *
     * @param  int              $id
     * @param UpdateEmployeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEmployeeRequest $request)
    {
        $employee = $this->employeeRepository->findWithoutFail($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        $employee = $this->employeeRepository->update($request->all(), $id);

        Flash::success('Employee updated successfully.');

        return redirect(route('employees.index'));
    }

    /**
     * Remove the specified Employee from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $employee = $this->employeeRepository->findWithoutFail($id);

        if (empty($employee)) {
            Flash::error('Employee not found');

            return redirect(route('employees.index'));
        }

        $this->employeeRepository->delete($id);

        Flash::success('Employee deleted successfully.');

        return redirect(route('employees.index'));
    }
}
