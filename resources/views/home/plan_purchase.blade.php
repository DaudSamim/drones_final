@extends('layout.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <h6 class="card-title">Plan Purchases</h6>
                  @if(Session::has('message'))
                     <p class="alert alert-info text-center">{{ Session::get('message') }}</p>
                @endif

                    <div class="table-responsive">
                        <table id="product_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>

                                <th>ID</th>
                                <th>User ID</th>
                                <th>Plan ID</th>
                                <th>Plan Price</th>
                                <th>Created At</th>

                            </tr>
                            </thead>
                            <tbody>
                                    @foreach($purchases as $purchase)
                                        <tr>
                                            <td>{{$purchase->id}}</td>
                                            <td>{{$purchase->user_id}}</td>
                                            <td>{{$purchase->plan_id}}</td>
                                            <td>{{$purchase->plan_price}}</td>
                                            <td>{{$purchase->created_at}}</td>
                                        </tr>

                                      
                                    @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
@endsection



