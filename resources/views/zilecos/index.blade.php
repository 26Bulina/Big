@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Zile concediu</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('zilecos.create') !!}">Add New</a>
        
         <div class="col-md-4" style="margin-top: 10px;margin-bottom: -10px">
            <form action="{{ route('zilecos.index') }}" method="get" class="form-inline">
                <div class="form-group">
                    <input type="text" class="form-control" name="s" placeholder="keyword" value="{{ isset($s) ? $s : '' }}">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" > search </button>
                </div>
            </form>
        </div>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('zilecos.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

