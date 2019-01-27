@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">


{{-- // select t.pers_assign,count(t.id) x
        // from tasks t
        // group by t.pers_assign
        // order by count(t.id) asc --}}



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


       <table class="table table-responsive" id="comments-table">
            @foreach ($task->comments as $comment)
             <hr> <h5>user: {{ $comment->user_id }}</hr>  </h5>
                            {{ $comment->body }}
            @endforeach
       </table>                         

 <hr>









<div class="container">
    <div class="card">
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