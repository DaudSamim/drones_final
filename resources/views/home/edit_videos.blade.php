@extends('layout.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">{{$video->title}}</h6>

                      <form id="btn-submit" method="post" action="/view_videos" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Video Title</label>
                            <input style="width: 100% !important;;" type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="name" name="title"  aria-describedby="emailHelp" placeholder="Video Title">

                            @if ($errors->has('title'))
                                <span class="text-danger">
                            <small class="font-weight-bold">{{ $errors->first('title') }}</small>
                        </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Video File</label>
                            <input class="form-control" accept="video/*" type="file" name="video">

                            @if ($errors->has('video'))
                                <span class="text-danger">
                            <small class="font-weight-bold">{{ $errors->first('video') }}</small>
                        </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Video Category</label>
                            
                            <select class="form-select" aria-label="Default select example" name="category_id">
                              <option selected>Categories</option>
                                @if(isset($categories))
                                @foreach($categories as $row)
                              <option value="{{$row->id}}">{{$row->title}}</option>
                              @endforeach
                              @endif
                              
                            </select>

                            @if ($errors->has('video'))
                                <span class="text-danger">
                            <small class="font-weight-bold">{{ $errors->first('video') }}</small>
                        </span>
                            @endif
                        </div>


                        <div class="modal-footer">
                            <input type="submit" name="action_button"  class="btn btn-primary btn-block" value="Add" />
                            
                            <span
                                className="close cursor-pointer"
                                data-dismiss="modal"
                                aria-label="Close"
                                id="myModalClose">
                            </span>
                        
                            <input type="hidden" name="_token" value={{csrf_token()}}>

                        </div>


                    </form>


                </div>
            </div>
        </div>
    </div>
@endsection

