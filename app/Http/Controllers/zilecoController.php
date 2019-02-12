<?php

namespace App\Http\Controllers;
use Auth;

use App\Http\Requests\CreatezilecoRequest;
use App\Http\Requests\UpdatezilecoRequest;
use App\Repositories\zilecoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\zileco;
use App\User;
use App\Models\tipconcediu;

class zilecoController extends AppBaseController
{
    /** @var  zilecoRepository */
    private $zilecoRepository;

    public function __construct(zilecoRepository $zilecoRepo)
    {
        $this->zilecoRepository = $zilecoRepo;
    }

    /**
     * Display a listing of the zileco.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // $this->zilecoRepository->pushCriteria(new RequestCriteria($request));
        // $zilecos = $this->zilecoRepository->all();
        $s = $request->input('s');
        $zilecos = zileco::latest()
                 ->search ($s)
                 ->paginate(15);
        

        return view('zilecos.index',compact('s','zilecos'));
    }

    /**
     * Show the form for creating a new zileco.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::pluck('name','id');
        $tipconcedius = tipconcediu::pluck('name','id');
        return view('zilecos.create',compact('users','tipconcedius'));
       
    }

    /**
     * Store a newly created zileco in storage.
     *
     * @param CreatezilecoRequest $request
     *
     * @return Response
     */
    public function store(CreatezilecoRequest $request)
    {
        $input = $request->all();

        $zileco = $this->zilecoRepository->create($input);

        Flash::success('Zileco saved successfully.');

        return redirect(route('zilecos.index'));
    }

    /**
     * Display the specified zileco.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $zileco = $this->zilecoRepository->findWithoutFail($id);

        if (empty($zileco)) {
            Flash::error('Zileco not found');

            return redirect(route('zilecos.index'));
        }

        return view('zilecos.show')->with('zileco', $zileco);
    }

    /**
     * Show the form for editing the specified zileco.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $users = User::pluck('name','id');
        $tipconcedius = tipconcediu::pluck('name','id');
        
        $zileco = $this->zilecoRepository->findWithoutFail($id);

        if (empty($zileco)) {
            Flash::error('Zileco not found');

            return redirect(route('zilecos.index'));
        }

        return view('zilecos.edit',compact('zileco','users','tipconcedius'));
    }

    /**
     * Update the specified zileco in storage.
     *
     * @param  int              $id
     * @param UpdatezilecoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatezilecoRequest $request)
    {
        $zileco = $this->zilecoRepository->findWithoutFail($id);

        if (empty($zileco)) {
            Flash::error('Zileco not found');

            return redirect(route('zilecos.index'));
        }

        $zileco = $this->zilecoRepository->update($request->all(), $id);

        Flash::success('Zileco updated successfully.');

        return redirect(route('zilecos.index'));
    }

    /**
     * Remove the specified zileco from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $zileco = $this->zilecoRepository->findWithoutFail($id);

        if (empty($zileco)) {
            Flash::error('Zileco not found');

            return redirect(route('zilecos.index'));
        }

        $this->zilecoRepository->delete($id);

        Flash::success('Zileco deleted successfully.');

        return redirect(route('zilecos.index'));
    }
}
