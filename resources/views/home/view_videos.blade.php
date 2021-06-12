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
                        Add New Video
                    </button>
                    <h6 class="card-title">Videos</h6>

                     <div class="table-responsive">
                        <table id="product_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>

                                <th>Title</th>
                                <th>Thumbnail</th>
                                <!-- <th>File</th> -->
                                <th>Price</th>
                                <th>Category</th>
                                <th>Status</th>
                                @if(auth()->user()->role == 1)<th>Update</th> @endif
                                <th>Actions</th>
                                <th>Created At</th>
                                

                            </tr>
                            </thead>
                            <tbody>
                                @if(isset($videos))
                                    @foreach($videos as $row)

                                    @php
                                        $category = DB::Table('categories')->where('id',$row->category_id)->first();

                                    @endphp
                                        
                                        <tr>
                                            <td>{{$row->title}}</td>
                                            <td><img src="{{'/storage/'.$row->poster}}"></td>
                                            <!-- <td>{{$row->file}}</td> -->
                                            <td>${{$row->price}}</td>
                                            <td>@if(isset($category)){{$category->title}}@endif</td>
                                            <td>@if($row->status == 0) Pending @elseif($row->status == 1) Active @else  <button class="btn btn-danger" data-toggle="modal" data-target="{{'#reject_message'.$row->id}}">Reject Message</button> @endif</td>
                                           @if(auth()->user()->role == 1) <td> 
                                                @if(auth()->user()->role == 2) 
                                                    @if($row->status == 0) Pending @elseif($row->status == 2) Rejected @else Approved @endif 
                                                    @else 
                                                         @if($row->status == 0)  <button class="btn btn-warning" data-toggle="modal" data-target="{{'#reject'.$row->id}}">Reject</button>  <a href="{{'/approve_video/'.$row->id}}"><button class="btn btn-success">Approve</button></a> @elseif($row->status == 2) <button class="btn btn-danger" >Rejected </button>  @else   <button class="btn btn-warning" data-toggle="modal" data-target="{{'#reject'.$row->id}}">Reject</button>
                                                     @endif 
                                                @endif 
                                            </td>
                                            @endif
                                            <td>
                                              @if(auth()->user()->role == 1)
                                               <a href="{{'/product_'.$row->id}}"><button class="btn btn-success">View</button></a>
                                               @endif
                                                <button class="btn btn-warning" data-toggle="modal" data-target="{{'#price'.$row->id}}">Prices</button> 
                                                <a href="{{'/download_product_'.$row->id}}"><button class="btn btn-primary">Download</button></a>
                                                <a href="{{'/view_videos/'.$row->id}}"><button class="btn btn-warning">Edit</button></a>
                                                <a href="{{'/delete_video/'.$row->id}}"><button class="btn btn-danger">Delete</button></a>
                                            </td>
                                            <td>{{$row->created_at}}</td>

                                        </tr>



                                                    <!-- Modal -->
        <div class="modal fade" id="{{'reject'.$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reject Video</h5>
               
              </div>
              <div class="modal-body">
                <form method="post" action="/reject_video">
                    @csrf
                    <input type="hidden" value="{{$row->id}}" name="id">
                    <p>Rejection Message</p>
                    <select class="form-control" name="message">
                          <option>This Video Contains Recognizable People And Requires a Model Release</option>
                          <option>This Video Contains Recognizable Property And Requires Intellectual Property Release</option>
                          <option> Keywords: irrelevant or wrong keywords were used, keywords should best describe the content in the video</option>
                          <option>Exposure / lighting: Clip is Underexposed, overexposed,inconsistently exposed or was shot in unfavourable conditions.</option>
                          <option>Similar Content: This content is too similar to another clip that has already been submitted or published.</option>
                          <option>Noise / Artifacts: Content contains noise, film grain, compression artifacts, pixelation, and/or posterization that detracts from the main subject.</option>
                          <option> Camera Shakes: unintentioal camera shake, motion blur, or technical limitations of the equipment used (e.g. autofocus searching, camera sensor quality, etc).</option>
                    </select>

                    <p class="extra" style="margin-top: 4%; cursor: pointer">Other Reasons? Click Here</p>
                    <div>
                        <input class="extra_box form-control" style="display: none" type="text" placeholder="Write Here" name="extra_message">
                    </div>
                
              </div>
              <div class="modal-footer">
                
                <button type="submit" class="btn btn-primary">Reject</button>
              </div>
              </form>
            </div>
          </div>
        </div>

                                                    <!-- Modal -->
        <div class="modal fade" id="{{'reject_message'.$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Reject Message</h5>
               
              </div>
              <div class="modal-body">
               
                    <input type="hidden" value="{{$row->id}}" name="id">
                    <h5>Message:</h5>
                    <p>{{$row->rejection_message}}</p> 
                
              </div>
              <div class="modal-footer">
                
               
              </div>
              </form>
            </div>
          </div>
        </div>

        <div class="modal fade" id="{{'price'.$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$row->title}}</h5>
               
              </div>
              <div class="modal-body">
                    
                    <form action="update_video_price" method="post">
                      @csrf
                      <input type="hidden" name="id" value="{{$row->id}}">
                    @if($row->resolution == '8k')
                      <p>8K UHD Resolution Price</p>
                      <input class="form-control" type="number" name="eightK" value="{{$row->eightK}}">
                    @endif
                    @if($row->resolution == '8k' || $row->resolution == '6k')
                      <p>6K UHD Resolution Price</p>
                      <input class="form-control" type="number" name="sixK" value="{{$row->sixK}}">

                    @endif
                    @if($row->resolution == '8k' || $row->resolution == '6k' || $row->resolution == '4k')
                        <p>4K UHD Resolution Price</p>
                      <input class="form-control" type="number" name="fourK" value="{{$row->fourK}}">
                    @endif
                    @if($row->resolution == '8k' || $row->resolution == '6k' || $row->resolution == '4k' || $row->resolution == 'FHD')
                        <p>FULL HD Resolution Price</p>
                      <input class="form-control" type="number" name="fhd" value="{{$row->fhd}}">
                    @endif
                    @if($row->resolution == '8k' || $row->resolution == '6k' || $row->resolution == '4k' || $row->resolution == 'FHD' || $row->resolution == 'HD')
                        <p>HD WEB Resolution Price</p>
                      <input class="form-control" type="number" name="hd" value="{{$row->hd}}">
                    @endif 
                      <br>
                      <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                
              </div>
              <div class="modal-footer">
                
               
              </div>
              </form>
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

                 <!-- Modal -->
                    <div id="new_video" class="modal fade" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Video</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="m-body">
                                    <span id="form_result"></span>
                                    <form id="btn-submit" method="post" action="/view_videos" enctype='multipart/form-data'>

                                       <div class="form-group">
                                            <label for="exampleInputEmail1">Video File</label>
                                            <input class="form-control" accept="video/*" type="file" name="video" onchange="getFileData(this);">

                                            @if ($errors->has('video'))
                                                <span class="text-danger">
                                            <small class="font-weight-bold">{{ $errors->first('video') }}</small>
                                        </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Video Title</label>
                                            <input style="width: 100% !important;;" type="text" class="form-control addName {{ $errors->has('title') ? 'is-invalid' : '' }}" id="name" name="title"  aria-describedby="emailHelp" placeholder="Video Title">

                                            @if ($errors->has('title'))
                                                <span class="text-danger">
                                            <small class="font-weight-bold">{{ $errors->first('title') }}</small>
                                        </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Model Released</label>
                                            
                                            <select class="form-select" aria-label="Default select example" name="model_released">
                                              <option selected>No</option>
                                              <option> Yes </option>      
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Property Released</label>
                                            
                                            <select class="form-select" aria-label="Default select example"id="pro" onchange ="property('pro');" name="property_released">
                                              <option selected  value="No">No</option>
                                              <option value ="Yes"> Yes </option>      
                                            </select>
                                        </div>

                                        <div class="form-group d-lg-none" id="mydiv" >
                                          <label for="exampleInputEmail1">Property released file</label>
                                          <input style="width: 100% !important;;" type="file" class="form-control addName {{ $errors->has('pdf_file') ? 'is-invalid' : '' }}"  name="pdf_file"  aria-describedby="emailHelp" placeholder="pdf">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Location</label>
                                            <input style="width: 100% !important;;" type="text" class="form-control addName {{ $errors->has('location') ? 'is-invalid' : '' }}"  name="location"  aria-describedby="emailHelp" placeholder="Location">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Device Model</label>
                                            <input style="width: 100% !important;;" type="text" class="form-control addName {{ $errors->has('device_model') ? 'is-invalid' : '' }}"  name="device_model"  aria-describedby="emailHelp" placeholder="Device Model">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Video Description</label>
                                            <textarea name="description" class="form-control" rows="3" required></textarea>
                                            @if ($errors->has('description'))
                                                <span class="text-danger">
                                            <small class="font-weight-bold">{{ $errors->first('description') }}</small>
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

                                            @if ($errors->has('category_id'))
                                                <span class="text-danger">
                                            <small class="font-weight-bold">{{ $errors->first('category_id') }}</small>
                                        </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Video Keywords </label><br>
                                            <small  style="color: red">Enter comma (,) seperated words. Max 30 words</small>
                                            <textarea name="keywords" class="form-control" placeholder="Enter comma seperated keywords" rows="4"></textarea>
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

