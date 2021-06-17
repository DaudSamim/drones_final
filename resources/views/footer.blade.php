 @php
     $footer_categories = DB::table('categories')->orderby('id','desc')->limit(10)->get();
 @endphp

 <footer class=" container-fluid" style=" background: linear-gradient(190deg, #1e0051, #3b009e); padding-top: 120px; padding-right: 0px;  padding-bottom: 40px; padding-left: 0px;">
            <div class="container-fluid">
                <div class="">
                    <!-- Begin Footer Section-->
                    <div class="footer-widget ">
                        <div class="footer-sidebar ">
                            <div class="row">
                                <!-- <div class="col-lg-1" style="width:10.333333% !important"></div> -->
                                <div class="col-lg-2" style="width: 20% !important;margin-left: 3%">
                                  <h4 class="footer-widget-title">The Company</h4>
                                    <ul>
                                        <a href="/about_us"><li>About Us</li></a>
                                        <a href="/contact_us"><li>Contact Us</li></a>
                                        <a href="/privacy_policy"><li>Privacy Policy</li></a>
                                        <a href="refund_policy"><li>Refund Policy</li></a>
                                        <a href="/terms_and_conditions"><li>Terms & Conditions</li></a>
                                    </ul>
                                <div class="clearfix"></div>
                                </div>    
                            

                                <div class="col-lg-2" style="width: 20% !important">
                                    <h4 class="footer-widget-title">Categories</h4>
                                    <ul>
                                        @foreach($footer_categories as $row)
                                            <a href="{{'/category_'.$row->title}}"><li>{{$row->title}}</li></a>
                                        @endforeach
                                        
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>    
                            
                                <div class="col-lg-2" style="width: 20% !important">
                                    <h4 class="footer-widget-title">Account</h4>
                                    <div class="clearfix"></div>
                                    <ul>
                                        <a href="/customer"><li>Customer Dashboard</li></a>
                                        <a href="/contributor"><li>Contributor Dashboard</li></a>
                                        <a href="/sell_footage"><li>Sell your footage</li></a>
                                        
                                    </ul>
                                </div>    
                            
                                <div class="col-lg-2">
                                    <h4 class="footer-widget-title">Site</h4>
                                    <ul>
                                        <a href="/"><li>Home</li></a>
                                        <a href="#"><li>Blog</li></a>
                                        <a href="faqs"><li>FAQ's</li></a>
                                        
                                    </ul>
                                  
                                    <div class="clearfix"></div>
                                </div>    
                            
                                <div class="col-lg-2" style="width: 20% !important">
                                    <h4 class="footer-widget-title">We are very social</h4>
                                    <ul>
                                        <a href="#"><li><i class="fab fa-facebook-f"></i> Facebook</li></a>
                                        <a href="#"><li><i class="fab fa-youtube"></i> Youtube</li></a>
                                        <a href="#"><li><i class="fab fa-instagram"></i> Instagram</li></a>
                                        <a href="#"><li><i class="fab fa-twitter"></i> Twitter</li></a>
                                        
                                    </ul>
                                    <a href="/"><img src="{{asset('images/logo.png')}}"></a>
                                    <div class="clearfix"></div>
                                </div>    
                            
                                <!-- <div class="col-lg-1" style="width:10.333333% !important"></div> -->
                            
                            </div>
                        </div>
                        







                </div>
                <div class="additional-footer">
                    <div class="additional-footer-widget">
                    </div>
                    <div class="additional-footer-widget">
                    </div>

                    <div class="additional-footer-widget">
                    </div>
                </div>
            </div>
        
        </footer>



        <div class="copyright-footer container-fluid">
            <div class="container">

                <div class="row">
                    <div class="copyright-columned">
                        <span class="copyright-text col-md-12 col-xs-12">
                            <span style="margin-right: 2%"> <i class="fas fa-envelope-open" style="margin-right: 1%"></i>info@dronestockclips.com</span>
                           <span> <i class="fas fa-phone-alt"></i> +92 3044519969 </span>
                       
                      
                    </div>
                </div>

            </div>
        </div>
        <!-- End Footer Section-->

        <script>
            $("a").mousedown(function(ev) {
              ev.preventDefault();
              console.log($(this).attr("href"));
              console.log("Click triggered");
            });
        </script>