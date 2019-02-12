@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Notificari</h1>
         @if (Auth::user()->admin <> 0)
              <div class="row">
                <h1 class="col-sm-5 col-md-offset-10">
                   <a class="btn btn-primary pull-right" style="margin-top: 0px;margin-bottom: 5px" href="{!! route('notifs.create') !!}">Add new</a>
                </h1>
                </div>
              @endif
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')


@if(count($notification1))
<div class="card  col-md-12">
  <div class="card-header"> Update-uri </div>
  <div class="card-body">
    @foreach($notification1 as $notif)
    <div class="row">
      <div class="col-xs-12"> <h5>{{ $notif->title }}</hr>  </h5> </div>
      <div class="col-xs-2">
            @if (Auth::user()->admin == 2)
            <td>
              {!! Form::open(['route' => ['notifs.destroy', $notif->id], 'method' => 'delete']) !!}
              <div class='btn-group'>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'data-toggle' => 'tooltip','title' => 'sterge',
                         'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
              </div>
              {!! Form::close() !!}

            </td>
            @endif
      </div>
      </div>
      <div class="row"> {{ $notif->body }} </div>
      <hr>
      @endforeach
  </div>
  @endif

</div>
@if(count($notification2))
<div class="card  col-md-12">
  <div class="card-header"> Happy Team </div>
  <div class="card-body">
    @foreach($notification2 as $notif)
    <div class="row">
      <div class="col-xs-12"> <h5>{{ $notif->title }}</hr>  </h5> </div>
      <div class="col-xs-2">
            @if (Auth::user()->admin <> 0)
            <td>
              {!! Form::open(['route' => ['notifs.destroy', $notif->id], 'method' => 'delete']) !!}
              <div class='btn-group'>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'data-toggle' => 'tooltip', 'title' => 'sterge','class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
              </div>
              {!! Form::close() !!}
            </td>
            @endif
      </div>
      </div>
      <div class="row"> {{ $notif->body }} </div>
      <hr>
      @endforeach
  </div>
  @endif

</div>
@if(count($notification3))
<div class="card  col-md-12">
  <div class="card-header"> Update-uri </div>
  <div class="card-body">
    @foreach($notification3 as $notif)
    <div class="row">
      <div class="col-xs-12"> <h5>{{ $notif->title }}</hr>  </h5> </div>
      <div class="col-xs-2">
            @if (Auth::user()->admin <> 0)
            <td>
              {!! Form::open(['route' => ['notifs.destroy', $notif->id], 'method' => 'delete']) !!}
              <div class='btn-group'>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'data-toggle' => 'tooltip','title' => 'sterge','class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
              </div>
              {!! Form::close() !!}
            </td>
            @endif
      </div>
      </div>
      <div class="row"> {{ $notif->body }} </div>
      <hr>
      @endforeach
  </div>
  @endif


  </div>



    </div>
  </div>
</div>
 












        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    {{-- @include('notifs.table') --}}
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

