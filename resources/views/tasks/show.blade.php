@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="card col-md-10">
            <div class="card-header">
                <h2> <a href="{!! route('tasks.index') !!}" >
                    <span class="fa fa-caret-square-left" aria-hidden="true"></span></a>
                    Task / Mesaje   {!! $task->id !!} </h2>
            </div>
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
    <div class="container">
       <table class="table table-responsive" id="comments-table">
        
        @foreach ($task->comments as $comment)
         <hr> <h5>{{ $comment->user['name'] }}</hr>  </h5>
         <div class="row">
        <div class="col-lg-8">{{ $comment->body }} </div>
        
            {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                <a href="{!! route('comments.show', [$comment->id]) !!}" class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                <a href="{!! route('comments.edit', [$comment->id]) !!}" class='btn btn-info btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
            {!! Form::close() !!}
        </div>
        @endforeach
            
       </table>                         
        <hr>
    </div>



<div class="container">
    <div class="card-block">
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
        CKEDITOR.replace('body');

    </script>