<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreaterepositoryRequest;
use App\Http\Requests\UpdaterepositoryRequest;
use App\Repositories\repositoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\departament;

class repositoryController extends AppBaseController
{
    /** @var  repositoryRepository */
    private $repositoryRepository;

    public function __construct(repositoryRepository $repositoryRepo)
    {
        $this->repositoryRepository = $repositoryRepo;
    }


    // public function showmeniu()
    // {
    //     $repositories['repositories'] = App\Models\repository::all();

    //     return view('menu', compact( $repositories));
    // }
    /**
     * Display a listing of the repository.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->repositoryRepository->pushCriteria(new RequestCriteria($request));
        $repositories = $this->repositoryRepository->all();

        return view('repositories.index')
            ->with('repositories', $repositories);
    }

    /**
     * Show the form for creating a new repository.
     *
     * @return Response
     */
    public function create()
    {
        $departamentes = departament::pluck('name','id');
        return view('repositories.create',compact('departamentes'));
    }

    /**
     * Store a newly created repository in storage.
     *
     * @param CreaterepositoryRequest $request
     *
     * @return Response
     */
    public function store(CreaterepositoryRequest $request)
    {
        $input = $request->all();

        $repository = $this->repositoryRepository->create($input);

        Flash::success('Repository saved successfully.');

        return redirect(route('repositories.index'));
    }

    /**
     * Display the specified repository.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $repository = $this->repositoryRepository->findWithoutFail($id);
// dd($repository);
        if (empty($repository)) {
            Flash::error('Repository not found');

            return redirect(route('repositories.index'));
        }

        return view('repositories.show',compact('repository'));
    }

    /**
     * Show the form for editing the specified repository.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $repository = $this->repositoryRepository->findWithoutFail($id);
        $departamentes = departament::pluck('name','id');
        

        if (empty($repository)) {
            Flash::error('Repository not found');

            return redirect(route('repositories.index'));
        }

        return view('repositories.edit',compact('departamentes','repository'));
    }

    /**
     * Update the specified repository in storage.
     *
     * @param  int              $id
     * @param UpdaterepositoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdaterepositoryRequest $request)
    {
        $repository = $this->repositoryRepository->findWithoutFail($id);

        if (empty($repository)) {
            Flash::error('Repository not found');

            return redirect(route('repositories.index'));
        }

        $repository = $this->repositoryRepository->update($request->all(), $id);

        Flash::success('Repository updated successfully.');

        return redirect(route('repositories.index'));
    }

    /**
     * Remove the specified repository from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $repository = $this->repositoryRepository->findWithoutFail($id);

        if (empty($repository)) {
            Flash::error('Repository not found');

            return redirect(route('repositories.index'));
        }

        $this->repositoryRepository->delete($id);

        Flash::success('Repository deleted successfully.');

        return redirect(route('repositories.index'));
    }
}
