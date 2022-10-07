@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                          <div class="col-md-8">
                            @if (\Session::has('warning'))
                            <div class="alert alert-dnager">
                                <ul>
                                    <li class="text-danger">{!! \Session::get('warning') !!}</li>
                                </ul>
                            </div>
                        @endif
                            <div class="table-responsive">
                                <table class="table">
                                <caption>List of weapon</caption>
                                <thead>
                                  <tr>
                                    <th scope="col">weapon_type</th>
                                    <th scope="col">serial_number</th>
                                    <th scope="col">number_of_rounds</th>
                                    <th scope="col">quantity</th>
                                    <th scope="col">Command</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach ($list_weapon as $item)
                                  <tr>
                                    <td>{{$item->weapon_type}}</td>
                                    <td>{{$item->serial_number}}</td>
                                    <td>{{$item->number_of_rounds}}</td>
                                    <td>{{$item->quantity}}</td>
                                    <td><!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$item->id}}">
                                          order
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">{{$item->weapon_type}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <form method="post" action="/cart_Weapon" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                              <div class="modal-body">
                                                <input type="number" name="weapon_id" hidden value="{{$item->id}}">
                                                <input type="text" name="weapon_type" hidden value="{{$item->weapon_type}}">
                                                    <div class="form-group mt-3">
                                                        <label for="exampleInputEmail1">Qauntity</label>
                                                        <input type="text" class="form-control" name="quantity" aria-describedby="emailHelp" placeholder="Enter weapon type">
                                                      </div>
                                                    <div class="form-group mt-3">
                                                        <label for="exampleInputEmail1">Duty location</label>
                                                        <input type="text" class="form-control" name="duty_location" aria-describedby="emailHelp" placeholder="Enter weapon type">
                                                      </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                          </div>
                                        </div>
                                        </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                              </div>
                          </div>
                          <div class="col-md-4">
                            <div class="row flex-wrap">
                              <h6 class="float-left">MY CART</h6><a href="/orderWeapon" class="float-right btn btn-primary btn-sm">Order</a>
                            </div>
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">weapon_type</th>
                                    <th scope="col">duty_location</th>
                                    <th scope="col">quantity</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($my_order as $order)
                                  <tr>
                                    <td>{{$order->weapon_type}}</td>
                                    <td>{{$order->duty_location}}</td>
                                    <td>{{$order->quantity}}</td>
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
@endsection
