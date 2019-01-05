@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">
                <h2> <a href="{!! route('tasks.index') !!}" >
                    <span class="fa fa-caret-square-left" aria-hidden="true"></span></a>
                    Task / Mesaje   {!! $task->id !!} </h2>
            </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row" style="padding-left: 20px">
                            <div class="form-group">
                                {!! Form::label('subject', 'Subject:') !!}
                                <div class="well well-lg" style="padding: 20px">
                                    <p>{!! $task->subject !!}</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row" style="padding-left: 20px">
                            <div class="form-group">
                                {!! Form::label('body', 'Body:') !!}
                                <div class="card" style="padding: 30px">
                                    <p>{!! $task->body !!}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-left: 20px">
                            <div class="card">
                                
                                <div class="row" style="padding-left: 20px">
                                    
                                    @include('tasks.show_fields')
                                </div>
                                
                            </div>
                        </div>
                        <ul class="nav nav-pills">
                            <li role="presentation">
                                <a href="{!! route('comments.create') !!}" > add comment
                                    <span class="fa fa-caret-square-left" aria-hidden="true"></span>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="{!! route('comments.index') !!}" > show comments
                                    <span class="fa fa-caret-square-left" aria-hidden="true"></span>
                                </a>
                            </li>
                        </ul>
                        <hr>
                        <table class="table table-responsive" id="comments-table">
                            <thead>
                                <th>
                                <tr>timp</tr>
                            <tr>comm</tr>
                        <tr>user Id</tr>
                    </th>
                </thead>
                <tbody>
                    @foreach ($task->comments as $comment)
                    <th>
                    <tr> {{$comment->created_at->diffForHumans()}}: &nbsp; </tr>
                <tr>{{ $comment->body }}</tr>
            <tr>{{ $comment->user_id }}</tr>
        </th>
        @endforeach
    </tbody>
</table>
<hr>
<div class="container">
    <div class="card">
        <div class="card-block">
            <form method="POST" action="/tasks/{{ $task->id }}/comments ">
                {{csrf_field()}}
                <div class="form-group">
                    <textarea class="form-control" name="body" rows="6" placeholder="you comm here.." required autofocus>
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
</div>
</div>
@endsection