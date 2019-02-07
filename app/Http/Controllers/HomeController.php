<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\task;
use App\Models\repository;
use App\Models\departament;

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
        $departamentes = departament::with('tasks')->get();
        $tasks = task::latest()
                        ->paginate(3)
                        ;
        return view('home',compact('departamentes','tasks'));
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


    public function app()
    {

        // $departamentes = departament::all();
        // dd($departamentes);
        // return view('layouts/app',compact('departamentes'));
        return view('layouts/app');
    }



}
