@extends('layout.app')

@section('content')
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>                   
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css" integrity="sha256-n3YISYddrZmGqrUgvpa3xzwZwcvvyaZco0PdOyUKA18=" crossorigin="anonymous" />
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>

</head>
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
                        Add New Blog
                    </button>
                    
                    <h6 class="card-title">Blogs</h6>

                     <div class="table-responsive">
                        <table id="product_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Data</th>
                                <th>Image</th>
                                
                                
                                <!-- <th>File</th> -->
                                <th>Actions</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($blogs as $blog)
                                       
                                        <tr>
                                            <td>{{$blog->title}}</td>
                                            <td>{!!$blog->data!!}</td>
                                            <td>{{$blog->image}}</td>
                                
                                            <td>
                                            <a href="{{'/post_blog/'.$blog->id}}"><button class="btn btn-warning">Edit</button></a>
                                            <a href="{{'/delete_blog/'.$blog->id}}"><button class="btn btn-danger">Delete</button></a>
                                            
                                            </td>
                                            <td>{{$blog->created_at}}</td>

                                            

                                        </tr>
                                        @endforeach()
                                       



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
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Blog</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="m-body">
                                    <span id="form_result"></span>
                                    <form id="btn-submit" method="post" action="/post_blog" enctype='multipart/form-data'>
                                    
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input style="width: 100% !important;;" type="text" class="form-control addName {{ $errors->has('title') ? 'is-invalid' : '' }}"  name="title"  aria-describedby="emailHelp" placeholder="Title">
                                    </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Data</label>
                                            <textarea id="editor" style="width: 100% !important;;" rows="5" type="text" class=" form-control addName {{ $errors->has('data') ? 'is-invalid' : '' }}"  name="data"  aria-describedby="emailHelp" placeholder="Data"></textarea>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Image</label>
                                            <input style="width: 100% !important;;" type="file" class="form-control addName {{ $errors->has('image') ? 'is-invalid' : '' }} summernote"  name="image"  aria-describedby="emailHelp" placeholder="Download Limit">
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
<script>
        $(document).ready(function() {
          $('.summernote').summernote();
        });
</script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection

