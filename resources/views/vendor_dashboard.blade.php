@include('header')
<style>
   .popular-category1 {
   background: #30e3ca;
   display: block;
   text-align: center;
   padding: 30px 10px;
   border-radius: 7px;
   top: 0;
   position: relative;
   -webkit-transition: .3s all ease-in-out;
   -o-transition: .3s all ease-in-out;
   transition: .3s all ease-in-out;
   color: white!important }
   .popular-category1 .icon {
   display: block;
   -webkit-transition: .1s all ease;
   -o-transition: .1s all ease;
   transition: .1s all ease;
   margin-bottom: 10px; }
   .popular-category1 .icon > span {
   line-height: 0;
   font-size: 45px; }
   .popular-category1 .caption {
   color: #fff;
   -webkit-transition: .1s all ease;
   -o-transition: .1s all ease;
   transition: .1s all ease;
   text-transform: none;
   letter-spacing: normal;
   font-size: 18px;
   font-weight: normal; }
   .popular-category1 .number {
   padding: 2px 20px;
   border-radius: 30px;
   display: inline-block;
   background: #e9ecef;
   color: #000;
   font-size: 14px;
   -webkit-transition: .1s all ease;
   -o-transition: .1s all ease;
   transition: .1s all ease; }
   .popular-category1:hover {
   background: #fff;
   font-color:#30e3ca;
   -webkit-box-shadow: 0 5px 30px -5px rgba(48, 227, 202, 0.5);
   box-shadow: 0 5px 30px -5px rgba(48, 227, 202, 0.5);
   top: -10px; }
   .popular-category1:hover .caption {
   color: #30e3ca; }
   .popular-category1:hover .icon {
   color: #fff; }
   .popular-category1:hover .number {
   background: #1bc5ad;
   color: #fff; }
</style>
<div class="site-wrap">
   @include('header_for_single_page')
   <div class=" overlay" style="background-image: url(images/jeeni.jpg);height:50%!important" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container" style="height: 380px">
         <!-- <iframe width="100%" height="auto" src="https://www.youtube.com/embed/ZBZxQV6JDFI?autoplay=1&muted=1&loop=1&controls=0&rel=0&hd=1&playlist=ZBZxQV6JDFI&showinfo=0&fs=0" title="YouTube video player" frameborder="0"></iframe> -->
         <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-12">
               <div class="row justify-content-center mb-4">
                  <div class="col-md-8 text-center  form-search-wrap" style="margin-top: 15%" >
                     <h1 style="color: black; font-weight: 800" class="" data-aos="fade-up">Contributor Dashboard </h1>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="site-section bg-light ">
      <div class="container">
      @if(Session::has('info'))
      <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('info') }}</p>
      @endif
      @if ($errors->any())
      @foreach ($errors->all() as $error)
      <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ $error }}</p>
      @endforeach
      @endif
         <div class="row justify-content-center">
            <div class="col-md-6 mb-0" data-aos="fade">
               <form action="#" class="p-5 bg-white">
                  <h3 class="mb-5 text-center">Log In</h3>
                  <div class="row form-group">
                     <div class="col-md-12">
                        <label class="text-black" for="email">Email</label>
                        <input type="email" id="email" placeholder="Email/Username" class="form-control">
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col-md-12">
                        <label class="text-black" for="subject">Password</label>
                        <input type="password" id="subject" placeholder="Password" class="form-control">
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col-md-12">
                        <input type="submit" value="Log In" class="btn btn-primary py-2 px-4 text-white">
                     </div>
                  </div>
               </form>
            </div>
            <div class="col-md-6 mb-0" data-aos="fade">
               <form action="/register_vendor" method="post" class="p-5 bg-white">
                  <h3 class="mb-5 text-center">Registration</h3>
                  <div class="row form-group">
                     <div class="col-md-12 mb-2">
                        <label class="text-black" for="email">First Name</label>
                        <input type="text" id="text" placeholder="First Name"name="first_name" class="form-control">
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col-md-12 mb-2">
                        <label class="text-black" for="subject">Last Name</label>
                        <input type="text" id="subject" placeholder="Last Name"name="last_name" class="form-control">
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col-md-12 mb-2">
                        <label class="text-black" for="subject">User Email</label>
                        <input type="email" id="subject" placeholder="User Email"name="email" class="form-control">
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col-md-12 mb-2">
                        <label class="text-black" for="subject">Username</label>
                        <input type="text" id="subject" placeholder="Username"name="username" class="form-control">
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col-md-12 mb-2">
                        <label class="text-black" for="subject">Password</label>
                        <input type="password" id="subject" placeholder="Password"name="password" class="form-control">
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col-md-12 mb-2">
                        <label class="text-black" for="subject">Display Name</label>
                        <input type="text" id="subject" placeholder="Display Name"name="display_name" class="form-control">
                     </div>
                  </div>
                  <div class="row form-group">
                     <div class="col-md-12">
                        <input type="submit" value="Register" class="btn btn-primary py-2 px-4 text-white">
                        <input type="hidden" name="_token" value={{csrf_token()}}>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   @include('footer')
</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/rangeslider.min.js"></script>
<script src="js/main.js"></script>
</body>
<script>
   $(document).ready(function() {
   $(".myvideos").on("mouseover", function(event) {
   this.play();
   
   }).on('mouseout', function(event) {
   this.pause();
   this.currentTime = 0;
   
   });
   })
   
   var vid = document.getElementsByTagName("video");
   [].forEach.call(vid, function (item) {
   item.addEventListener('mouseover', hoverVideo, false);
   item.addEventListener('mouseout', hideVideo, false);
   });
   
   function hoverVideo(e)
   {
   this.play();
   }
   function hideVideo(e)
   {
   this.pause();
   }
</script>
</html>