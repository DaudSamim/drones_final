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
                    <h6 class="card-title">Edit Profile</h6>

                    <form id="btn-submit" method="post" action="/update_profile" enctype='multipart/form-data'>
                    <input class="form-check-input" type="hidden" name="id" value="{{auth()->user()->id}}">

                                    
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input style="width: 100% !important;;" type="email" class="form-control addName {{ $errors->has('name') ? 'is-invalid' : '' }}"  name="email" aria-describedby="emailHelp" placeholder="Email" >
                                    </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Profile Picture</label>
                                            <input style="width: 100% !important;;" type="file" class="form-control addName {{ $errors->has('image') ? 'is-invalid' : '' }}"  name="image"  aria-describedby="emailHelp" placeholder="image" >
                                        </div>
                                        <h5 class="pb-3 font-weight-semibold">Bank Account Details</h3>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Account Holder</label>
                                            <input style="width: 100% !important;;" type="text" class="form-control addName {{ $errors->has('download_limit') ? 'is-invalid' : '' }}"  name="account_holder"  aria-describedby="emailHelp" placeholder="Account Holder">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Account Number</label>
                                            <input style="width: 100% !important;;" type="number" class="form-control addName {{ $errors->has('download_limit') ? 'is-invalid' : '' }}"  name="account_number"  aria-describedby="emailHelp" placeholder="Account Number">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Bank Name</label>
                                            <input style="width: 100% !important;;" type="text" class="form-control addName {{ $errors->has('download_limit') ? 'is-invalid' : '' }}"  name="bank_name"  aria-describedby="emailHelp" placeholder="Bank Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Account Phone Number</label>
                                            <input style="width: 100% !important;;" type="number" class="form-control addName {{ $errors->has('download_limit') ? 'is-invalid' : '' }}"  name="phone_number"  aria-describedby="emailHelp" placeholder="Phone Number">
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

