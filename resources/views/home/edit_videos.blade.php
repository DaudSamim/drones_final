@extends('layout.app')

@section('content')
<style>
.form-check-input {
    position: absolute;
    margin-top: 0.3rem;
    margin-left: 0;
}
</style>
    <div class="row justify-content-center">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                @if(Session::has('success'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
@endif  

@if(Session::has('alert'))
    <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('alert') }}</p>
@endif  
                    <h6 class="card-title">Edit Video</h6>

                    <form id="btn-submit" method="post" action="/edit_video" enctype='multipart/form-data'>
                                        <div class="form-group">
                                        <input class="form-check-input" type="hidden" name="id" value="{{$video->id}}">

                                            <label for="exampleInputEmail1">Video Title</label>
                                            <input style="width: 100% !important;;" type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" id="name" name="title"  aria-describedby="emailHelp" value="{{$video->title}}">

                                            @if ($errors->has('title'))
                                                <span class="text-danger">
                                            <small class="font-weight-bold">{{ $errors->first('title') }}</small>
                                        </span>
                                            @endif
                                        </div>


                                         <div class="form-group">
                                            <label for="exampleInputEmail1">Model Released</label>
                                            
                                            <select class="form-select"  aria-label="Default select example" name="model_released">
                                              <option @if($video->model_released == 'No') selected @endif>No</option>
                                              <option @if($video->model_released == 'Yes') selected @endif > Yes </option>      
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Property Released</label>
                                            
                                            <select class="form-select" aria-label="Default select example" name="property_released">
                                              <option @if($video->property_released == 'No') selected @endif>No</option>
                                              <option @if($video->property_released == 'Yes') selected @endif> Yes </option>      
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Location</label>
                                            <input style="width: 100% !important;;" type="text" class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}"  name="location"  aria-describedby="emailHelp" value="{{$video->location}}">                                          
                                        </div>

                                        <div>
                                        <label for="exampleInputEmail1">Drone Model</label>
                                            <input style="width: 100% !important;;" type="text" class="form-control addName {{ $errors->has('device_model') ? 'is-invalid' : '' }}"  name="device_model"  aria-describedby="emailHelp" placeholder="Drone Model" value="{{$video->device_model}}">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Video Description</label>
                                            <textarea name="description" class="form-control" rows="3" required>{{$video->description}}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="text-danger">
                                            <small class="font-weight-bold">{{ $errors->first('description') }}</small>
                                        </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Video Category</label>
                                            @php
                                            $categories = DB::Table('categories')->get();
                                            $selected_category = DB::Table('categories')->where('id',$video->category_id)->first();
                                            @endphp
                                            
                                            <select class="form-select" aria-label="Default select example" name="category_id">
                                              <option value="{{$selected_category->id??null}}" selected>{{$selected_category->title??null}}</option>
                                                @if(isset($categories))
                                                @foreach($categories as $row)
                                              <option value="{{$row->id}}">{{$row->title}}</option>
                                              @endforeach
                                              @endif
                                              
                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Video Keywords</label><br>
                                             <small  style="color: red">Enter comma (,) seperated words. Max 30 words</small>
                                            <textarea name="keywords" class="form-control" rows="3" required>{{json_decode($video->keywords)}}</textarea>
                                            
                                        </div>


                                        <div class="modal-footer">
                                            <input type="submit" name="action_button"  class="btn btn-primary btn-block" value="Update" />
                                            
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

