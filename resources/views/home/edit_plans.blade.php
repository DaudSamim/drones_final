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
                    <h6 class="card-title">Edit Plan</h6>

                    <form id="btn-submit" method="post" action="/edit_plan" enctype='multipart/form-data'>
                    <input class="form-check-input" type="hidden" name="id" value="{{$plan->id}}">

                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Popular choice?</label>
                                            <select class="form-select" aria-label="Default select example"id=""  name="popular" >
                                               
                                          
                                                <option @if ($plan->popular=="No")
                                                selected
                                            @endif value="No">No</option>
                                                                                      
                                               <option @if ($plan->popular=="Yes")
                                                selected
                                            @endif value="Yes">Yes</option>      
                                            </select>                                   
                                    </div>
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input style="width: 100% !important;;" type="text" class="form-control addName {{ $errors->has('name') ? 'is-invalid' : '' }}"  name="name"  aria-describedby="emailHelp" placeholder="Title" value="{{$plan->title}}">
                                    </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Price</label>
                                            <input style="width: 100% !important;;" type="number" class="form-control addName {{ $errors->has('price') ? 'is-invalid' : '' }}"  name="price"  aria-describedby="emailHelp" placeholder="Price" value="{{$plan->price}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Download Limit</label>
                                            <input style="width: 100% !important;;" type="number" class="form-control addName {{ $errors->has('download_limit') ? 'is-invalid' : '' }}"  name="download_limit"  aria-describedby="emailHelp" placeholder="Download Limit" value="{{$plan->download_limit}}">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Maximum Quality</label>
                                            <select class="form-select" aria-label="Default select example"id=""  name="maximum_quality">
                                              @foreach($qualities as $quality)
                                              <option @if ($plan->maximum_quality == $quality->title) selected
                                              @endif 
                                              >{{$quality->title}}</option>
                                              @endforeach
                                            </select>   
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Features </label><br>
                                            <small  style="color: red">Enter comma (,) seperated Features. </small>
                                            <textarea name="features" class="form-control" placeholder="Enter comma seperated keywords" rows="4"> {{json_decode($plan->features)}}</textarea>
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

