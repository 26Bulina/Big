@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="card">
    <div class="card-header">
           @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="alert alert-info" role="alert">
            <p> Bine ai venit, {{ Auth::user()->name }} !</p>
        </div>
    </div>


    <div class="card-body">



{{-- <form action="">
    <div class="form-group">
        <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
    </div>
</form>
 --}}


{{-- 

<form method="POST" action="{{ route('summernoteeditor.post') }}">
   {{ csrf_field() }}
<div class="col-xs-12 col-sm-12 col-md-12">
   <div class="col-xs-12 col-sm-12 col-md-12">
<center><h1>What would you see in Laravel 5.7 ? </h1>
<h4>Just share your idea.</h4>
</center>
      <div class="form-group">
 <label for="usr">Title of Feature:</label>
 <input type="text" class="form-control" name="feature">
</div>
       <div class="form-group">
           <strong>Details:</strong>
           <textarea class="form-control summernote" name="detail"></textarea>
       </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
       <button type="submit" class="btn btn-primary">Submit</button>
   </div>
</form> --}}


{{-- 
<script type="text/javascript">
   $(document).ready(function() {
    $('.summernote').summernote({
          height: 500,
     });
  });
</script> --}}












@foreach($notification as $n)
@if( $n->created_at > now()->subDays(7)       )
<div class="row">
      <div class="col-xs-9 offset-2"> <h5>{{ $n->title }}</hr>  </h5> </div>
      
      </div>
      <div class="row">
        <div class="col-lg-10 offset-1">{{ $n->body }} </div> 
        <div class="col-lg-1"> </div> 
     </div>
      <hr>
@endif
@endforeach
    </div>
</div>
</div>
</div>
@endsection