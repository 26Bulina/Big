@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Notifs</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('notifs.create') !!}">Add New</a>
        </h1>
    </section>

        {{         $not = DB::table('notifs')
                        ->select('users.email')
                        ->join('users','users.id','=','notifs.pers_create')
                        ->where('users.name','Alina')
                        ->limit(2)
                        ->orderBy('notifs.title','desc')
                        ->get()
        }}

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('notifs.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>

    {{-- <a href="{!! route('notifs.test') !!}" class='btn btn-success btn-xs'><i class="glyphicon glyphicon-edit"></i></a> --}}
@endsection

