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
                    <h6 class="card-title">Edit Blog</h6>

                    <form id="btn-submit" method="post" action="/edit_blog" enctype='multipart/form-data'>
                    <input class="form-check-input" type="hidden" name="id" value="{{$blog->id}}">

                                   
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input style="width: 100% !important;;" type="text" class="form-control addName {{ $errors->has('title') ? 'is-invalid' : '' }}"  name="title"  aria-describedby="emailHelp" placeholder="Title" value="{{$blog->title}}">
                                    </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Data</label>
                                            <textarea style="width: 100% !important;;" type="text" class="form-control addName {{ $errors->has('data') ? 'is-invalid' : '' }}"  name="data"  aria-describedby="emailHelp" placeholder="Data" value="{{$blog->data}}"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Image</label>
                                            <input style="width: 100% !important;;" type="file" class="form-control addName {{ $errors->has('image') ? 'is-invalid' : '' }}"  name="image"  aria-describedby="emailHelp" placeholder="Image" value="{{$blog->image}}">
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

