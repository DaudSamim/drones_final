@extends('layout.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    .form-check-input {
    position: absolute;
    margin-top: 0.3rem;
    margin-left: 0 !important; 
}.check_class{
    display: flex;
    margin: 2%;
}.input_class{
    margin-left: 2%;
}
</style>
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
                    <button type="button" class="card-title btn btn-primary btn-sm float-right text-white" data-toggle="modal" data-target="#new_video">
                        Add New Plan
                    </button>
                    <h6 class="card-title">Plans</h6>

                     <div class="table-responsive">
                        <table id="product_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>price</th>
                                <th>Download Limit</th>
                                <th>Maximum Quality</th>
                                
                                <!-- <th>File</th> -->
                                <th>Actions</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                               
                                        @foreach($plans as $plan)
                                        <tr>
                                            <td>{{$plan->title}}</td>
                                            <td>{{$plan->price}}</td>
                                            <td>{{$plan->download_limit}}</td>
                                            <td>{{$plan->maximum_quality}}</td>
                                            <td>
                                            <a href="{{'/add_plan/'.$plan->id}}"><button class="btn btn-warning">Edit</button></a>
                                            <a href="{{'/delete_plan/'.$plan->id}}"><button class="btn btn-danger">Delete</button></a>
                                            
                                            </td>
                                            <td>{{$plan->created_at}}</td>

                                            

                                        </tr>
                                        @endforeach



                                                    <!-- Modal -->
        
                                                    <!-- Modal -->
        

        

                                   

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

                 <!-- Modal -->
               
                    <div id="new_video" class="modal fade" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Plan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="m-body">
                                    <span id="form_result"></span>
                                    <form id="btn-submit" method="post" action="/add_plan" enctype='multipart/form-data'>
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Popular choice?</label>
                                            <select class="form-select" aria-label="Default select example"id=""  name="popular">
                                              <option selected  value="No">No</option>
                                              <option value ="Yes"> Yes </option>      
                                            </select>                                   
                                    </div>
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input style="width: 100% !important;;" type="text" class="form-control addName {{ $errors->has('name') ? 'is-invalid' : '' }}"  name="name"  aria-describedby="emailHelp" placeholder="Title">
                                    </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Price</label>
                                            <input style="width: 100% !important;;" type="number" class="form-control addName {{ $errors->has('price') ? 'is-invalid' : '' }}"  name="price"  aria-describedby="emailHelp" placeholder="Price">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Download Limit</label>
                                            <input style="width: 100% !important;;" type="number" class="form-control addName {{ $errors->has('download_limit') ? 'is-invalid' : '' }}"  name="download_limit"  aria-describedby="emailHelp" placeholder="Download Limit">
                                        </div>
                     
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Maximum Quality</label>
                                            <select class="form-select" aria-label="Default select example"id=""  name="maximum_quality">
                                              @foreach($qualities as $quality)
                                              <option value="{{$quality->title}}" >{{$quality->title}}</option>
                                              @endforeach
                                            </select>   
                                        </div>
                                       

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Features </label><br>
                                            <small  style="color: red">Enter comma (,) seperated Features. </small>
                                            <textarea name="features" class="form-control" placeholder="Enter comma seperated keywords" rows="4"></textarea>
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
                    


<script>
    $('.extra').click(function() {
      $('.extra_box').toggle("slide");
    });

    function getFileData(myFile){
       var file = myFile.files[0];  
       var filename = file.name;
       filename = filename.replace(/\.[^/.]+$/, "");
       $(".addName").val(filename);
    }
</script>
<script>
function property(str) {
  var element = document.getElementById("mydiv");
  var choice =document.getElementById(str).value;
  
  if(choice == 'Yes'){
  element.classList.remove("d-lg-none");
}
if(choice == 'No'){
  element.classList.add("d-lg-none");
}
}
  

</script>

@endsection

