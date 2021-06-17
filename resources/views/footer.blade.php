 @php
     $footer_categories = DB::table('categories')->orderby('id','desc')->limit(10)->get();
 @endphp

 <footer class="main-footer container-fluid">
            <div class="container-fluid">
                <div class="">
                    <!-- Begin Footer Section-->
                    <div class="footer-widget ">
                        <div class="footer-sidebar widget_digital_about">
                            <div class="row">
                                <!-- <div class="col-lg-1" style="width:10.333333% !important"></div> -->
                                <div class="col-lg-2" style="width: 20% !important;margin-left: 2%">
                                    <h4 class="footer-widget-title">The Company</h4>
                                    <ul>
                                        <li>About Us</li>
                                        <li>Contact Us</li>
                                        <li>Privacy Policy</li>
                                        <li>Refunf Policy</li>
                                        <li>Terms & Conditions</li>
                                    </ul>
                                <div class="clearfix"></div>
                                </div>    
                            

                                <div class="col-lg-2" style="width: 20% !important">
                                    <h4 class="footer-widget-title">Categories</h4>
                                    <ul>
                                        @foreach($footer_categories as $row)
                                            <a href="{{'/category_'.$row->title}}"><li onclick="alert()">{{$row->title}}</li></a>
                                        @endforeach
                                        
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>    
                            
                                <div class="col-lg-2" style="width: 20% !important">
                                    <h4 class="footer-widget-title">Account</h4>
                                    <div class="clearfix"></div>
                                    <ul>
                                        <li>Customer Dashboard</li>
                                        <li>Contributor Dashboard</li>
                                        <li>Sell your footage</li>
                                        
                                    </ul>
                                </div>    
                            
                                <div class="col-lg-2">
                                    <h4 class="footer-widget-title">Site</h4>
                                    <ul>
                                        <li>Home</li>
                                        <li>Blog</li>
                                        <li>FAQ's</li>
                                        
                                    </ul>
                                  
                                    <div class="clearfix"></div>
                                </div>    
                            
                                <div class="col-lg-2" style="width: 20% !important">
                                    <h4 class="footer-widget-title">We are very social</h4>
                                    <ul>
                                        <li><i class="fab fa-facebook-f"></i> Facebook</li>
                                        <li><i class="fab fa-youtube"></i> Youtube</li>
                                        <li><i class="fab fa-instagram"></i> Intsagram</li>
                                        <li><i class="fab fa-twitter"></i> Twitter</li>
                                        
                                    </ul>
                                    <img src="{{asset('images/logo.png')}}">
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