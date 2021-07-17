@extends('layout.app')

@section('content')
@if(Session::has('success'))
      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
  @endif  

  @if(Session::has('alert'))
      <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('alert') }}</p>
  @endif  
    <div class="row justify-content-center">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <h6 class="card-title"></h6>
                  @if(Session::has('message'))
                     <p class="alert alert-info text-center">{{ Session::get('message') }}</p>
                @endif

                    <div class="table-responsive">
                        <table id="product_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>

                                <th>id</th>
                                <th>Product id</th>
                                <th>Buyer Username</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Profit</th>
                                <th>Quality</th>
                                <th>Actions</th>
                                <th>Created At</th>

                            </tr>
                            </thead>
                            <tbody>
                                @if(isset($allOrders))
                                    @foreach($allOrders as $row)
                                        @php
                                            $product = DB::table('videos')->where('id',$row->product_id)->first();
                                            $name = DB::table('users')->where('id',$row->user_id)->first();
                                        @endphp
                                       
                                        <tr>
                                            
                                            <td>{{$row->id}}</td>
                                            <td>{{$row->product_id}}</td>
                                            @if(isset($name))
                                            <td>{{$name->username}}</td>
                                            @else
                                            <td></td>
                                            @endif
                                            <td>{{$row->title}}</td>
                                            <td>{{$row->price}}</td>
                                            <td>{{$row->profit}}</td>
                                            <td>{{$row->quality}}</td>
                                            <td><a href="{{'/product_'.$row->product_id}}"><button class="btn btn-success">View</button></a>
                                                <a href="{{'/download_product_'.$row->product_id}}"><button class="btn btn-primary">Download</button></a>
                                                @if(isset($product) && $product->property_released == 'Yes' )
                                                <a href="{{'/download/'.$product->pdf_file}}"><button class="btn btn-primary">Property Release</button></a>
                                                @endif
                                                @if(isset($product) && $product->model_released == 'Yes' )
                                                <a href="{{'/download/'.$product->pdf_file2}}"><button class="btn btn-primary">Model Release</button></a>
                                                @endif
                                            </td>
                                                <td>{{$row->created_at}}</td>
                                        </tr>

                                      
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

  
@endsection



