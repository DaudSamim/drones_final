@extends('layout.app')

@section('content')
@if(Session::has('success'))
      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
  @endif  

  @if(Session::has('alert'))
      <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('alert') }}</p>
  @endif  

  @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
 @endif
<div class="row justify-content-center">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h6 class="card-title">Contact Us Queries</h6>


                <div class="table-responsive">
                    <table id="product_table" class="table table-bordered table-striped">
                        <thead>
                            <tr>

                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Created At</th>


                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($queries))
                            @foreach($queries as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->subject}}</td>
                                <td>{{substr($row->message, 0, 14) . '...'}}
                                    <button class="btn-sm btn-secondary" data-toggle="modal"
                                        data-target="{{'#myModal'.$row->id}}">View More</button>
                                </td>
                                <td>{{$row->created_at}}</td>

                            </tr>

                            <div id="{{'myModal'.$row->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            
                                        </div>
                                        <div class="modal-body">
                                            <p> {{$row->message}}
                                            </p>
                                            <br>
                                            <hr>
                                            <form id="btn-submit" method="post" action="/send_reply"
                                                enctype='multipart/form-data'>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Reply</label>
                                                    <textarea class="form-control"required  type="text"
                                                        name="reply"></textarea>
                                                </div>
                                                <input type="hidden" name="_token" value={{csrf_token()}}>
                                                <input type="hidden" name="id" value="{{$row->id}}">


                                                <input type="submit" name="action_button"  class="btn btn-primary btn-block" value="Send" />                                            

                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
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
