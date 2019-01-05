<?php

namespace App\Http\Controllers;
use Auth;

use App\Http\Requests\CreateRememberRequest;
use App\Http\Requests\UpdateRememberRequest;
use App\Repositories\RememberRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\User;

class RememberController extends AppBaseController
{
    /** @var  RememberRepository */
    private $rememberRepository;

    public function __construct(RememberRepository $rememberRepo)
    {
        $this->rememberRepository = $rememberRepo;
    }

    /**
     * Display a listing of the Remember.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $loggegInUserId = Auth::id();
        $this->rememberRepository->pushCriteria(new RequestCriteria($request));
        $remembers = $this->rememberRepository->all()->where('user_id', $loggegInUserId);

        return view('remembers.index')
            ->with('remembers', $remembers);
    }


    /**
     * Show the form for creating a new Remember.
     *
     * @return Response
     */
    public function create()
    {
        $users = User::pluck('name','id');
        return view('remembers.create',compact('users'));
    }

    /**
     * Store a newly created Remember in storage.
     *
     * @param CreateRememberRequest $request
     *
     * @return Response
     */
    public function store(CreateRememberRequest $request)
    {
        $input = $request->all();

        $remember = $this->rememberRepository->create($input);

        Flash::success('Remember saved successfully.');

        return redirect(route('remembers.index'));
    }

    /**
     * Display the specified Remember.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $remember = $this->rememberRepository->findWithoutFail($id);

        if (empty($remember)) {
            Flash::error('Remember not found');

            return redirect(route('remembers.index'));
        }

        return view('remembers.show')->with('remember', $remember);
    }

    /**
     * Show the form for editing the specified Remember.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $remember = $this->rememberRepository->findWithoutFail($id);

        if (empty($remember)) {
            Flash::error('Remember not found');

            return redirect(route('remembers.index'));
        }

        return view('remembers.edit')->with('remember', $remember);
    }

    /**
     * Update the specified Remember in storage.
     *
     * @param  int              $id
     * @param UpdateRememberRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRememberRequest $request)
    {
        $remember = $this->rememberRepository->findWithoutFail($id);

        if (empty($remember)) {
            Flash::error('Remember not found');

            return redirect(route('remembers.index'));
        }

        $remember = $this->rememberRepository->update($request->all(), $id);

        Flash::success('Remember updated successfully.');

        return redirect(route('remembers.index'));
    }

    /**
     * Remove the specified Remember from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $remember = $this->rememberRepository->findWithoutFail($id);

        if (empty($remember)) {
            Flash::error('Remember not found');

            return redirect(route('remembers.index'));
        }

        $this->rememberRepository->delete($id);

        Flash::success('Remember deleted successfully.');

        return redirect(route('remembers.index'));
    }
}
