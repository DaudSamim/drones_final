
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
                        Add New Coupons
                    </button>
                    <h6 class="card-title">Coupons</h6>

                     <div class="table-responsive">
                        <table id="product_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>

                                <th>Title</th>
                                <th>Discount</th>
                                <!-- <th>File</th> -->
                                
                                <th>Description</th>
                                <th>Code</th>
                                <th>Expiry Date</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                               @foreach($coupons as $coupon)
                                        <tr>
                                            <td>{{$coupon->title}}</td>
                                            <td>{{$coupon->discount}}</td>
                                            <td>{{$coupon->description}}</td>
                                            <td>{{$coupon->code}}</td>
                                            <td>{{$coupon->expire_date}}</td>
                                            

                                            

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
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Coupon</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                
                                <div class="modal-body" id="m-body">
                                    <span id="form_result"></span>
                                    <form id="btn-submit" method="post" action="/view-coupons" enctype='multipart/form-data'>
                                    
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input style="width: 100% !important;;" type="text" class="form-control addName {{ $errors->has('title') ? 'is-invalid' : '' }}"  name="title"  aria-describedby="emailHelp" placeholder="Title">
                                    </div>

                                        <div class="form-group">
                                        <input class="form-check-input" type="hidden" name="today_date" value="">

                                            <label for="exampleInputEmail1">Discount</label>
                                            <input style="width: 100% !important;;" type="number" class="form-control addName {{ $errors->has('discount') ? 'is-invalid' : '' }}"  name="discount"  aria-describedby="emailHelp" placeholder="Discount">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Expiry Date</label>
                                            <input style="width: 100% !important;;" type="date" class="form-control addName {{ $errors->has('date') ? 'is-invalid' : '' }}"  name="date"  aria-describedby="emailHelp" placeholder="date">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Description </label><br>
                                            <textarea name="description" class="form-control" placeholder="description" rows="4"></textarea>
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
