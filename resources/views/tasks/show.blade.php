@extends('layouts.app')
@section('content')
<div class="container">

 {{-- informatii despre taks    --}}
    <div class="row justify-content-center">
        <div class=" col-md-12" style="vertical-align: baseline">
            <div class="card-header row">
            <div class="col-lg-2">
                {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                
                <a href="{!! route('tasks.edit', [$task->id]) !!}"
                    data-toggle="tooltip"  title="modifica"
                    style = "padding: 0.9rem"
                    class='btn btn-warning btn-lg' >
                <i class="glyphicon glyphicon-edit"></i></a>
                
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>',
                ['type' => 'submit',
                'data-toggle' => 'tooltip',
                'title' => 'sterge',
                'style' => 'padding: 0.9rem',
                'class' => 'btn btn-danger btn-lg',
                'onclick' => "return confirm('Esti sigur ca vrei sa stergi?')"]) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-lg-10">
                <h2> <a href="{!! route('tasks.index') !!}" >
                <span class="fa fa-caret-square-left" aria-hidden="true"></span></a>
                Task  {!! $task->id !!} </h2> 
            </div>
            <div class="col-lg-3 offset-lg-2">
               <p class="blockquote-footer" > {!! $task->created_at !!} </p>
            </div>
            </div>
        </div>
        <div class="card col-md-7">
            <div class="card-body">
                <div class="container">
                    <div class="row " style="padding-left: 10px">
                        <div class="form-group">
                            {!! Form::label('subject', 'Subject:') !!}
                            <div class="well well-lg " style="padding: 10px">
                                <p>{!! $task->subject !!}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row" style="padding-left: 10px">
                        <div class="form-group">
                            {!! Form::label('body', 'Body:') !!}
                            <div class="" style="padding: 10px">
                                <p>{!! $task->body !!}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    {{--    <div class="row" style="padding-left: 20px">
                        <div class="card">
                            <div class="row" style="padding-left: 20px">
                                @include('tasks.show_fields')
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="card col-md-5">
             {!! $task->priority->name!!}, {!! $task->status->name or ' '!!}, 
             {!! $task->repository->name!!},{!! $task->departament->name!!},
             create de:{!! $task->p_create->name!!}, asignat: {!! $task->p_assign->name!!}
             <hr>
        <table class="table table-responsive" id="tasks-table">
        @foreach($watchers as $watcher)
        <tr>
            <th style="padding: 0.1rem"> {!! $watcher->user->name!!} {!! $watcher->task->pers_assign!!}</th>
            <th style="padding: 0.1rem">
                {!! Form::open(['route' => ['watchers.destroy', $watcher->id], 'method' => 'delete']) !!}
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>',
                ['type' => 'submit',
                'data-toggle' => 'tooltip',
                'title' => 'sterge',
                'style' => 'padding: 0.6rem',
                'class' => 'btn btn-danger btn-sm',
                'onclick' => "return confirm('Esti sigur ca vrei sa stergi?')"]) !!}
                {!! Form::close() !!}
            </th>
        </tr>
        @endforeach
        </table>
       {{--  <h1 class="pull-right">
           <a class="btn btn-info btn-lg" 
              data-toggle="tooltip"  title="adauga watcher"
              href="{!! route('watchers.create') !!}">
           </a>
        </h1> --}}
<div class="box box-primary">

    <div class="box-body">
        <div class="row">
        {!! Form::open(array('action' => array('watcherController@store', $task->id ))) !!}
        {{-- {!! Form::open(['action' = "/tasks/{{ $task->id }}"]) !!} --}}
        {{-- {!! Form::open(['action="/tasks/{{ $task->id }}']) !!} --}}
{{-- {{ dd($task->id)}} --}}

            <div class="form-group col-sm-12">
                {!! Form::label('user_id', 'Adauga watcher:') !!}
                {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-sm-12">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            </div>
        {!! Form::close() !!}
 {{-- {{ dd($users)}} --}}

        <hr>
 {{--        <form method="POST" action="/tasks/{{ $task->id }} ">
                    {{csrf_field()}}
                    <div class="form-group">
                         {!! Form::select('user_id', $users, null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info"> add watch</button>
                    </div>
        </form> --}}


        </div>
    </div>
</div>


        </div>
    </div>





{{-- comentariile --}}
    <div class="row justify-content-center">
        <div class="container" style="background-image: linear-gradient( #FFFFFFFF,#8BAABBB8)">
            <table class="table table-responsive" id="comments-table">
                <hr>
                @foreach ($task->comments as $comment)
                <div class="row">
                    <div class="col-md-8"> <h5>{{ $comment->user['name'] }} </h5></div>
                    <div class="col-md-4"> <h6 class="blockquote-footer">{{ $comment->created_at }} </h6></div>
                </div>
                <div class="row">
                    <div class="col-lg-8">{{ $comment->body }} </div>
                </div>
                
                @endforeach
            </table> 
        </div>
    </div>
{{-- adauga comm --}}
    <div class="row justify-content-center">
        <div class="container">
            <div class="card-block">
                <hr>
                <form method="POST" action="/tasks/{{ $task->id }}/comments ">
                    {{csrf_field()}}
                    <div class="form-group">
                        <textarea class="form-control" id="body" name="body" rows="6" placeholder="write here ..." required autofocus>
                        </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"> add comm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>
</div>
</div>
@endsection
{{--
<script src="{{ asset ('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script>
CKEDITOR.replace( 'body' );
</script> --}}
<script src="{{ asset ('/vendor/ckeditor/ckeditor.js')}}"></script>
<script src="{{ asset ('/vendor/ckeditor/adapters/jquery.js')}}"></script>
{{-- <script src="{{ asset ('/vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script> --}}
{{-- <script src="{{ asset ('/vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script> --}}
<script>
// $('body').ckeditor();
// $('.textarea').ckeditor(); // if class is prefered.
CKEDITOR.config.height = 400;
CKEDITOR.config.width = 'auto';
CKEDITOR.replace('user_id');
// CKEDITOR.replace('body');
</script>