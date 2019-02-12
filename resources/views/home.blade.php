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

@foreach($notification as $n)
@if( $n->created_at < now())
<li> {{$n->id}} </li>
@endif
@endforeach
    </div>
</div>
</div>
</div>
@endsection