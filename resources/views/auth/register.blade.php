@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        {{-- @csrf --}}
                        {{csrf_field() }}
                        {{-- {{ csrfField() }} --}}

                        <!-- User_name Field -->
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('User_name') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- admin Field -->
                        <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{!! Form::label('admin', 'admin:') !!}</label>
                        <div class="col-md-6">
                            <label class="checkbox-inline">
                            {{-- {!! Form::hidden('admin', false) !!} --}}
                                {!! Form::checkbox('admin', '0', false) !!}
                            </label>
  
                        </div>
                        </div>


                        <!-- employee_id Field -->
                        <?php
                        $employees = App\Models\Employee::select(
                                    DB::raw("CONCAT(first_name,' ',last_name) AS name"),'id')
                                    ->orWhere('end_date', null)
                                    ->orWhere('end_date', '>', 'timestamp')
                                    ->pluck('name', 'id');  
                                                  
                        ?>
                        <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{!! Form::label('employee_id', 'employee_id :')  !!}</label>
                        <div class="col-md-6">
                            {!! Form::select('employee_id',  $employees, null ,[ 'placeholder' => 'cauta-ti numele...','class' => 'form-control'])!!} 
                            <i style="color: #7B89A1FF;"> (Daca numele tau nu se regaseste in lista, ia legatura cu departamentul HR)</i>

                            @if ($errors->has('employee_id'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('employee_id') }}</strong>
                                    </span>
                            @endif    
                        </div>
                        </div>
                        <!-- E-Mail Address Field -->
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <!-- Register Field -->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection