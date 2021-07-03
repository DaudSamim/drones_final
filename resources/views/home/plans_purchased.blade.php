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

                                <th>Order ID</th>
                                <th>Plan Name</th>
                                <th>Plan Price</th>
                                <th>Download Limit</th>
                                <th>Purchased At</th>

                            </tr>
                            
                            </thead>
                            <tbody>
                            @foreach($plans as $plan)
                            @php 
                            $plan_name = DB::table('plans')->where('id',$plan->plan_id)->first();
                            @endphp
                            <tr>
                            <td>{{$plan->id}}</td>
                            <td>{{$plan_name->title}}</td>
                            <td>${{$plan_name->price}}</td>
                            <td>{{$plan_name->download_limit}}</td>
                            <td>{{$plan_name->created_at}}</td>

                            
                            
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



