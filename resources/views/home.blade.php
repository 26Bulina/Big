@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="alert alert-success" role="alert">
                            <p> Bine ai venit
                ckhdskj cbds chbvshdhvsdnvndskvhsd dvjchsjvfhvkfuvks dvhgfdgfdgsfdsjffdjfjsdgfshdfjdsfjdsjfdsjfdsfjgsdfjg
                                , {{ Auth::user()->name }} !</p>  

                        </div>

        






                </div>
            </div>
    </div>
</div>
@endsection
