@extends('layouts.app')
@section('content')




      {{-- <div class="row justify-content-center"> --}}
<div class="row">
        <span class="mask bg-gradient-default opacity-5"></span>
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-5">{!! Auth::user()->name !!}</h1>
            <p class="mt-0 mb-5" style="color: #2F344BB8;">Te rugam sa verifici datele tale personale si sa le actualizezi de fiecare data cand este cazul!</p>
            
          </div>
        </div>
      </div>


    <div class="col-12 col-md-9">
        <div class="card">
            <div class=" card-header row">
                <div class="col-md-6"> Concediu   </div>
                <div >
                    <h1 class="pull-right">
                    <a href="{!! route('periodcos.create') !!}" 
                    class="btn btn-info">Adauga Concediu</a>
                    </h1>
                </div>
            </div>
          <div class="card-body">
            <div id="accordion">
              <div class="card">
                <div class="card-header" id="item1">
                  <h5 class="mb-0"> 
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" >  Sumar concediu</button>
                  </h5>
                </div>
                <div id="collapseOne" class="collapse"  data-parent="#accordion"><div class="card-body"> 

                    <table class="table table-respon
                    sive" id="periodcos-table">
                        <thead> 
                            <tr>
                            <th>Tip Concediu</th>
                            <th>Zile cuvenite</th>
                            <th>Zile ramase</th>
                        </thead>
                        <tbody>
                        @foreach( $zileco as $zi )
                                    <tr>
                                        <th>{!! $zi->tipconcediu->name or ' '!!}</th>
                                        <td>{!! $zi->nr_zile!!}</td>
                                        @foreach( $ramase as $r )
                                        @if($zi->tipconcediu_id==$r->tipconcediu_id)
                                                <td>{!! $r->ramase!!}</td>
                                        @endif
                                        @endforeach
                                    </tr>
                        @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="item2">
                  <h5 class="mb-0">
                  <button class="btn btn-link " data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="item2"> Perioada concediu
                  </button>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"><div class="card-body">


                        <table class="table table-responsive" id="periodcos-table">
                            <thead> 
                                <tr>
                                <th>Nr. </th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Tip concediu</th>
                                <th>Nr zile</th>
                              {{--   <th colspan="3">Action</th> --}}
                                </tr>
                            </thead>
                            <?php $key=0; ?>
                            <tbody>
                            @foreach( $concediu as $key => $co)
                                <tr>
                                    <td>{{ $key+1}}</td>
                                    <td>{!! $co->start_date->todatestring() !!}</td>
                                    <td>{!! $co->end_date->todatestring() !!}</td>
                                    <td>{!! $co->tipco['name'] !!}</td>
                                    <td>{!! $co->nrzile!!}</td>
                                    <td>
                                        @if( $co->start_date > now())

              {!! Form::open(['route' => ['periodcos.destroy', $co->id], 'method' => 'delete']) !!}

                   <a href="{!! route('periodcos.edit', [$co->id]) !!}" 
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
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>




                 </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>


@foreach ( $profil as $p)
{{-- {{dd($profil)}} --}}
    <div class="col-4 col-md-3">

    <!-- Page content -->    
      <div class="row">
        {{-- <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0"> --}}
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
              </div>
            </div>

            <div class="card-body pt-0 pt-md-4" style="background-image: linear-gradient(#8BAABBB8, #FFFFFFFF ) ">

              <div class="text-center">
                <h3>
                  {!! $p->first_name!!} {!! $p->last_name!!}
                  <span class="font-weight-light"></span>
                </h3>
                <div class="h5 mt-4"> 
                  <i class="ni business_briefcase-24 mr-2"></i>
                  {{$fct[0]->name}}
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>
                </div>
                <hr class="my-4" />
                <p>{{$users->email}}</p>
              </div>
            </div>
          {{-- </div> --}}
        </div>
      </div>
    </div>

<div class="container-fluid mt--7">
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Informatii personale</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="{!! route('employees.edit', [$p->eid]) !!}" class="btn btn-info">Actualizeaza datele </a>
                </div>
              </div>
            </div>
            <div class="card-body" style="background-image: linear-gradient(#8BAABBB8, #FFFFFFFF ) ">
              <form>
                <div class="pl-lg-4" >
                      
          
<div class="container-fluid" >

    <div class="row">
        <div col-md-3 ><h4>Nume</h4></div>
        <div col-md-5><h4>{!! $p->first_name !!} {!! $p->last_name !!} </h2></div>
    </div><hr class="my-1" />
    <div class="row">
        <div col-md-3 ><h4>CNP</h4></div>
        <div col-md-5><h2>{!! $p->cnp !!} </h2></div>
    </div><hr class="my-1" />
    <div class="row">
        <div col-md-3 ><h4>Adresa</h4></div>
        <div col-md-5><h2>{!! $p->address  or ' ' !!} </h2></div>
    </div><hr class="my-1" />
    <div class="row">
        <div col-md-3 ><h4>Telefon personal</h4></div>
        <div col-md-5><h2>{!! $p->personal_phone  or ' '!!}  </h2></div>
    </div><hr class="my-1" />
    <div class="row">
        <div col-md-3 ><h4>E-mail personal</h4></div>
        <div col-md-5><h2>{!! $p->personal_email  or ' '!!}  </h2></div>
    </div><hr class="my-1" />
    <div class="row">
        <div col-md-3 ><h4>Prima zi de lucru</h4></div>
        <div col-md-5><h2>{!! $p->start_date  or ' '!!}  </h2></div>
    </div><hr class="my-1" />
    <div class="row">
        <div col-md-3 ><h4>Ultima zi de lucru</h4></div>
        <div col-md-5><h2>{!! $p->end_date or ' '!!}   </h2></div>
    </div><hr class="my-1" />
    <div class="row">
        <div col-md-3 ><h4>Norma (ore)</h4></div>
        <div col-md-5><h2>{!! $p->hours_norm  or ' '!!} </h2></div>
    </div>
  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


    @endforeach
</div>
@endsection