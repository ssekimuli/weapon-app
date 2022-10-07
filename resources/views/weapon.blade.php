@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <h4>WEAPON FORM</h4>
                          <div class="col-md-6 justify-content-center">
                            <form method="post" action="/addWeapon" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              <div class="form-group mt-3">
                                <label for="exampleInputEmail1">Weapon type</label>
                                <input type="text" class="form-control" name="weapon_type" aria-describedby="emailHelp" placeholder="Enter weapon type">
                              </div>
                              <div class="form-group mt-3">
                                <label for="exampleInputPassword1">serial number</label>
                                <input type="number" class="form-control" name="serial_number" placeholder="serial number">
                              </div>
                              <div class="form-group mt-3">
                                <label for="exampleInputPassword1">Number of rounds</label>
                                <input type="number" class="form-control" name="number_of_rounds" placeholder="Number of rounds">
                              </div>
                              <div class="form-group mt-3">
                                <label for="exampleInputPassword1">Quantity</label>
                                <input type="number" class="form-control" name="quantity" placeholder="quantity">
                              </div class="my-3">
                              <button type="submit" class="btn btn-primary mt-5">Add weapon</button>
                            </form>
                          </div>
                        
                       </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
