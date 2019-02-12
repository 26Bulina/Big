<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;
use App\Models\repository;
use App\Models\departament;
use App\Models\notif;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function count($x)
    {
        $x = DB::table($x)->count();
    }

    public function index()
    {
        $notification1 = notif::where ('modif_app',1)->get();
        $notification2 = notif::where ('happy_team',1)->get();
        $notification3 = notif::where ('work_team',1)->get();
        $repositories = repository::with('tasks')->get();
        $departamentes = departament::with('tasks')->get();
        $tasks = task::latest()
                        ->where('pers_assign',Auth::user()->id)
                        ->paginate(15)
                        ;
        return view('home',compact('departamentes','notification1','notification2','notification3','repositories','tasks'));
        // return view('home');
    }

     public function departament($id)
    {
        $departamentes = departament::with('tasks')->get();
        $tasks = task::latest()
                        ->where('departament_id',$id)
                        ->paginate(3)
                        ;
        return view('home',compact('departamentes','tasks'));
        // return view('home');
    }


     public function repository($id)
    {
        $repositories = repository::with('tasks')->get();
        $tasks = task::latest()
                        ->where('repository_id',$id)
                        ->paginate(3)
                        ;

        return view('home',compact('repositories','tasks'));
        // return view('home');
    }

    public function app()
    {

        // $departamentes = departament::all();
        // dd($departamentes);
        // return view('layouts/app',compact('departamentes'));
        return view('layouts/app');
    }



}
