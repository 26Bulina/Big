@extends('layouts.app')
@section('content')




      {{-- <div class="row justify-content-center"> --}}
<div class="row">
        <span class="mask bg-gradient-default opacity-5"></span>
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">{!! Auth::user()->name !!}</h1>
            <p class="text-white mt-0 mb-5">Te rugam sa verifici datele tale personale si sa le actualizezi de fiecare data cand este cazul!</p>
            
          </div>
        </div>
      </div>


    <div class="col-12 col-md-8">
        <div class="card">
            <div class=" card-header row">
                <div class="col-md-6"> Concediu   </div>
                <div >
                    <h1 class="pull-right">
                    <a href="{!! route('periodcos.create') !!}" class="btn btn-info">Adauga Concediu</a>
                    </h1>
                </div>
            </div>
          <div class="card-body">
            <div id="accordion">
              <div class="card">
                <div class="card-header" id="item1">
                  <h5 class="mb-0"> 
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">  Sumar concediu</button>
                  </h5>
                </div>
                <div id="collapseOne" class="collapse show" aria-labelledby="item1" data-parent="#accordion"><div class="card-body"> 

                    <table class="table table-responsive" id="periodcos-table">
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
                                <th colspan="3">Action</th>
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
                                        <div class='btn-group'>
                                            <a href="{!! route('periodcos.edit', [$co->id]) !!}" class='btn btn-success btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                                            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                        </div>
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
    <div class="col-6 col-md-4">

    <!-- Page content -->    
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="../assets/img/theme/team-4-800x800.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>

            <div class="card-body pt-0 pt-md-4">

              <div class="text-center">
                <h3>
                  nume prenume<span class="font-weight-light">, 27</span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>adresa
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>functie
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>data inceput sfarsit 
                </div>
                <hr class="my-4" />
                <p>vdfvf</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<div class="container-fluid mt--7">
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Concedii</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary">Add</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="lucky.jesse">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name"> First name</label> 
                        <input type="text" id="input-first-name" class="form-control form-control-alternative"  value="{!! $p->first_name!!}"> 
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Last name</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="Jesse">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">City</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative" value="New York">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Country</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative"  value="United States">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Postal code</label>
                        <input type="number" id="input-postal-code" class="form-control form-control-alternative" >
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <textarea rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">A beautiful description.</textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>












































<div class="container-fluid">

    <div class="row">
        <div col-md-3 ><h4>Nume</h4></div>
        <div col-md-5><h5>{!! $p->first_name !!} {!! $p->last_name !!} </h5></div>
    </div>
    <div class="row">
        <div col-md-3 ><h4>CNP</h4></div>
        <div col-md-5><h5>{!! $p->cnp !!} </h5></div>
    </div>
    <div class="row">
        <div col-md-3 ><h4>Adresa</h4></div>
        <div col-md-5><h5>{!! $p->address  or ' ' !!} </h5></div>
    </div>
    <div class="row">
        <div col-md-3 ><h4>Telefon personal</h4></div>
        <div col-md-5><h5>{!! $p->personal_phone  or ' '!!}  </h5></div>
    </div>
    <div class="row">
        <div col-md-3 ><h4>E-mail personal</h4></div>
        <div col-md-5><h5>{!! $p->personal_email  or ' '!!}  </h5></div>
    </div>
    <div class="row">
        <div col-md-3 ><h4>Functie</h4></div>
        <div col-md-5><h5>{!! $p->job !!}  </h5></div>
    </div>
    <div class="row">
        <div col-md-3 ><h4>Prima zi de lucru</h4></div>
        <div col-md-5><h5>{!! $p->start_date  or ' '!!}  </h5></div>
    </div>
    <div class="row">
        <div col-md-3 ><h4>Ultima zi de lucru</h4></div>
        <div col-md-5><h5>{!! $p->end_date or ' '!!}   </h5></div>
    </div>
    <div class="row">
        <div col-md-3 ><h4>Norma (ore)</h4></div>
        <div col-md-5><h5>{!! $p->hours_norm  or ' '!!} </h5></div>
    </div>

    @endforeach
</div>
@endsection