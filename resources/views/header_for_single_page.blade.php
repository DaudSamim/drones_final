@php
  $categories_search = DB::table('categories')->limit(10)->get();
@endphp

@php
  $cart_count = 0;
  $total_cart_price = 0;
    if(auth()->check()){
        $cart_data = DB::Table('carts')->where('user_id',auth()->user()->id)->orderBy('id','desc')->get(); 
        $cart_count = count($cart_data);
        $total_cart_price =  DB::Table('carts')->where('user_id',auth()->user()->id)->get()->pluck('price')->sum(); 
    }
@endphp
<style>
    .cart-div{
        display: flex!important;
    /*align-items: center;*/
    justify-content: space-between;
    color: #fff;
    margin-top: 15px;
    }
    .name{
        /*width: 80%;*/
    }
    .name .vedio-name{
          color: #fff;
    display: block;
    font-size: 14px;
    font-weight: 500;
}

    ul li a:hover {
        color: #fff;
        background: #939393;
    }
    ul li ul.dropdown {
        min-width: 15%; /* Set width of the dropdown */
        background: blue;
        display: none;
        position: absolute;
        z-index: 999;
    }
    ul li:hover ul.dropdown {
        display: block; /* Display the dropdown */
    }
    ul li ul.dropdown li {
        display: block;
    }

 .vedio-price{
    color: #fff;
    display: block;
    text-align: center;
    font-size: 16px;
    font-weight: 600;
}
.bx{
    font-size: 20px !important;
    cursor: pointer;
}
</style>
<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<link rel="icon" type="image/png" href="images/logo.png"/>
 
<header id="main-header" class="main-header header-stacked">
<div class="header-top">
                <div class="container">


                    <div class="to-flex-row  th-flex-flex-middle">
                        <div class="to-flex-col th-col-left hidden-sm hidden-xs flexleft">


                            <ul class="top-social-icon">
                                <li><a href="https://www.facebook.com/African-Drone-Stock-352177435860332"
                                        target="_blank"><i class="zil zi-facebook"></i></a></li>


                                <li><a href="https://www.instagram.com/africandronestock/" target="_blank"><i
                                            class="zil zi-instagram"></i></a></li>


                                <li><a href="https://www.youtube.com/channel/UC3zgqtlhtZY6vEuOlCSNQmQ"
                                        target="_blank"><i class="zil zi-youtube"></i></a></li>



                            </ul>
                        </div>

                        <div class="to-flex-col th-col-center hidden-sm hidden-xs flexcenter">

                            <ul class="code-blocks">
                                <li  class="html custom html_topbar_left">DRONE STOCK CLIPS</li>
                            </ul>
                        </div><!-- center -->

                        <div class="to-flex-col th-col-right hidden-sm hidden-xs flexright">

                            <ul id="account-button" class="mayosis-option-menu hidden-xs hidden-sm">

                                @if(!auth()->check())
                                <li class="menu-item">

                                    <!-- <a href="/login" class=""><i class="zil zi-user"></i> Login</a> -->
                                </li>

                                @else


                                 <li class="menu-item">

                                    <!-- <a href="/view-stats" class=""><i class="zil zi-user"></i> Dashboard</a> -->
                                </li>

                                <li class="menu-item">

                                    <!-- <a href="/logout" class=""><i class="zil zi-user"></i> Logout</a> -->
                                </li>


                                @endif

                            </ul>

                            <div id="account-mob" class="mayosis-option-menu hidden-md hidden-lg">

                                <div id="mayosis-sidemenu">

                                    <ul>
                                        @if(!auth()->check())
                                        <li class="menu-item">
                                            <a href="/login"><i class="zil zi-user"></i>
                                                Login</a>
                                        </li>
                                         @else

                                          <li class="menu-item">
                                                        <a href="/view-stats"><i class="zil zi-user"></i>
                                                            Dashboard</a>
                                                    </li>

                                           <li class="menu-item">
                                                        <a href="/logout"><i class="zil zi-user"></i>
                                                            Logout</a>
                                                    </li>
                                            @endif
                                    </ul>
                                </div>

                            </div>
                        </div><!-- .to-flex-col right -->


                        <div class="to-flex-col hidden-md hidden-lg flex-grow flexright">
                        </div>

                    </div><!-- .to-flex-row -->



                </div>
            </div><!-- .header-top -->

            <div class="header-top" style="background-color: transparent; padding-top: 1%">
                <div class="container-fluid">


                    <div class="to-flex-row  th-flex-flex-middle">
                        <div class="to-flex-col th-col-left hidden-sm hidden-xs flexleft" style="    display: -webkit-box; margin-top: -30px">

                             <div class="site-logo sticky-enabled">

                                <a href="/" class="logo_box">

                                    <img src="images/logo.png"
                                        class="img-responsive main-logo hidden-xs hidden-sm" alt=""
                                        style="width:150px; margin-top: -20%">

                                    <img src="images/logo.png"
                                        class="img-responsive main-logo hidden-md hidden-lg" alt=""
                                        style="width:130px;">
                                    <img src="images/logo.png"
                                        class="img-responsive sticky-logo" alt="" style="width:220px;">

                                </a>

                            </div>
                            <!-- <ul class="code-blocks" style="margin-left: 2%">
                                <li> <a href="/categories" style="color:white" >Categories</a></li>
                            </ul> -->
                            <ul class="code-blocks" style="margin-left: 2%">
                               <span><a href="/">
                               <li>
                                    <span href="/blogs" style="color:#CA2633" class=" font-weight-bold html custom html_topbar_left">HO</span>
                                    <span href="/blogs" style="color:white; margin: -10% !important;" class=" font-weight-bold html custom html_topbar_left">ME</span>
                            </li>
                            </a>
                               </span> 
                            </ul>
                            <ul>
        
        <li>
     
        <span>
            <a href="categories">
          <span style="color:#CA2633 ;margin-left: 4% !important;" class="font-weight-bold html custom html_topbar_left pl-2" href="/categories">CATEG</span>
          <span style="color:white;margin: -6% !important;" class="font-weight-bold html custom html_topbar_left" href="/categories">ORIES</span>
          </a>
        </span>
       
            <ul class="dropdown" style="line-height: 40px !important;">
                @php
                    $categories=DB::table('categories')->limit(6)->get();
                @endphp
                    @foreach($categories as $category)
                    <li><a class="" style="color:white; padding-left:10px!important;" href="{{'/category_'.$category->title}}">   {{$category->title}}</a></li>
                    @endforeach
            </ul>
        </li>
        
    </ul>
   
                            
                            <ul class="code-blocks" style="margin-left: 2%">
                                <span>
                                    <a href="/sell_footage">
                                <li> 
                                    <span href="/sell_footage" style="color:#CA2633" class=" font-weight-bold html custom html_topbar_left"> SELL</span>
                                    <span href="/sell_footage" style="color:white; " class=" font-weight-bold html custom html_topbar_left"> FOOTAGE </span>
                                </li>
                                </a>
                            
                                </span>  
                               
                            </ul>
                            <ul class="code-blocks" style="margin-left: 2%">
                            <span>  
                                <a href="/free-stock"> 
                                <li>
                                     <span href="/about_us" style="color:#CA2633"  class=" font-weight-bold html custom html_topbar_left">FREE</span>
                                     <span href="/about_us" style="color:white"  class=" font-weight-bold html custom html_topbar_left">STOCK</span>
                                </li>
                                </a>
                            </span>
                            </ul>
                          
                            
                        </div>

                   
                        <div class="to-flex-col th-col-right hidden-sm hidden-xs flexright">

                            <span>  <i class="fab fa-whatsapp"></i><a href="https://api.whatsapp.com/send?phone=+447826644710&amp;text=Hello"  style="color: white;"> +447826644710 </a> </span>

                            <ul id="account-button" class="mayosis-option-menu hidden-xs hidden-sm">

                                @if(!auth()->check())
                                <li class="menu-item">

                                    <a href="/login" class="font-weight-bold"> <i class="zil zi-user"></i> LOGIN</a>
                                </li>

                                @else
                                


                                 <li class="menu-item">

                                    <a href="/view-stats" style="color:#FF0000" class="font-weight-bold"> <i style="color:#FF0000" class="zil zi-user"></i> DASHBOARD</a> 
                                </li>

                                <li class="menu-item">

                                    <a href="/logout" class="font-weight-bold"><i class="zil zi-user"></i> LOGOUT</a> 
                                </li>


                                @endif

                            </ul>

                            <div id="account-mob" class="mayosis-option-menu hidden-md hidden-lg">

                                <div id="mayosis-sidemenu">

                                    <ul>
                                        @if(!auth()->check())
                                        <li class="menu-item">
                                            <a href="/login"><i class="zil zi-user"></i>
                                                Login</a>
                                        </li>
                                         @else

                                          <li class="menu-item">
                                                        <a href="/view-stats"><i class="zil zi-user"></i>
                                                            Dashboard</a>
                                                    </li>

                                           <li class="menu-item">
                                                        <a href="/logout"><i class="zil zi-user"></i>
                                                            Logout</a>
                                                    </li>
                                            @endif
                                    </ul>
                                </div>

                            </div>

                             <ul id="cart-menu" class="mayosis-option-menu hidden-sm hidden-xs">

                                <li class="dropdown cart_widget cart-style-one"><a href="#" data-toggle="dropdown"
                                        class="cart-button"><i class="zil fa fa-shopping-cart"></i> <span
                                            class="items edd-cart-quantity">{{$cart_count}}</span></a>
                                    <ul role="menu" class="dropdown-menu mini_cart">
                                        <li class="widget" style="width: 100%">
                                            <div class="widget widget_edd_cart_widget">
                                                <p class="edd-cart-number-of-items" >Number of
                                                    items in cart: <span class="edd-cart-quantity">0</span></p>
                                                <ul class="edd-cart">

                                                    @if(isset($cart_data))
                                                        <h3 style="color: white">Cart List</h3>
                                                        @foreach($cart_data as $row)
                                                            @php
                                                                $row_product = DB::table('videos')->where('id',$row->product_id)->first();
                                                            @endphp
                                                             <li class="cart_item empty" style="width: 100%">
                                                               <!--  <span class="edd_empty_cart">{{$row_product->title}}  {{$row->quality}}  {{$row->price}}</span> -->
                                                                <div class="cart-div">
                                                                    <div class="name">
                                                                        <span class="vedio-name">{{$row_product->title}}</span>
                                                                        
                                                                    </div>
                                                                    <div>
                                                                         <span class="vedio-price"></span>
                                                                         <span>
                                                                    </div>
                                                                    <div class="price">
                                                                       
                                                                         <a href="{{'/remove_cart_item/'.$row->id}}">${{$row->price}} <i class="fa fa-trash" style="color: red" aria-hidden="true"></i></a>
                                                                         
                                                                    </div>
                                                                </div>
                                                             </li><br>
                                                        @endforeach
                                                         
                                                             @if($cart_count < 1)
                                                             <li class="cart_item edd-cart-meta edd_total " >
                                                                <p style="font-size: 12px;color: white">No Videos Added</p></li>
                                                            @else
                                                            <li class="cart_item edd-cart-meta edd_total" >
                                                                Total: <span class="cart-total">${{$total_cart_price}}</span></li>
                                                            <li class="cart_item edd_checkout"><a
                                                                    href="/checkout">Checkout</a>
                                                            </li>
                                                            @endif
                                                        @else
                                                         <li class="cart_item empty"><span class="edd_empty_cart">Your cart
                                                            is empty.</span></li>
                                                    @endif
                                                   
                                                   

                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </li>


                            </ul>
                        </div><!-- .to-flex-col right -->


                        <div class="to-flex-col hidden-md hidden-lg flex-grow flexright">
                        </div>

                    </div><!-- .to-flex-row -->



                </div>
            </div><!-- .header-top -->

        

        </header>

