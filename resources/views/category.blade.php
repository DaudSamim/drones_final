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
<link rel="stylesheet" href="css/style_category.css">
  <title>Drone Stock Clips</title>
<!-- Mirrored from africandronestock.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 May 2021 18:11:48 GMT -->
<!-- Added by HTTrack -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css"
    integrity="sha384-REHJTs1r2ErKBuJB0fCK99gCYsVjwxHrSU0N7I1zl9vZbggVJXRMsv/sLlOAGb4M" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
@include('header_for_single_page')
<div class=" overlay" style="background-image: url('images/{{$main_category->image}}') !important;height:50%!important" data-aos="fade" >
   <div class="container" style="height: 380px">
      <!-- <iframe width="100%" height="auto" src="https://www.youtube.com/embed/ZBZxQV6JDFI?autoplay=1&muted=1&loop=1&controls=0&rel=0&hd=1&playlist=ZBZxQV6JDFI&showinfo=0&fs=0" title="YouTube video player" frameborder="0"></iframe> -->
      <div class="row align-items-center justify-content-center text-center">
         <div class="col-md-12">
            <div class="row justify-content-center mb-4">
               <div class="d-lg-block d-none col-md-8 text-center  form-search-wrap" style="margin-top: 15%" >
                  <h1 style="color: white; font-weight: 800" class="" data-aos="fade-up">{{$main_category->title}}</h1>
               </div>
               <div class="d-lg-none d-block  text-center ">
                  <h1 style="color: white; font-weight: 800; padding-right: 7% !important;; padding-top: 50% !important;" class="pt-5" data-aos="fade-up">{{$main_category->title}}</h1>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="row p-5" style="padding-top:0px!important; background-image: linear-gradient(180deg, #FBD691E8 0%, #f2295b 100%); ">
<section data-particle_enable="false" data-particle-mobile-disabled="false"
                            class="elementor-section py-0 elementor-top-section elementor-element elementor-element-62b7113 elementor-hidden-phone elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                            data-id="62b7113" data-element_type="section">
                            <div style="" class="elementor-container elementor-column-gap-default">
                            
                                <div class="elementor-row">

                                    <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-c2c6e85"
                                        data-id="c2c6e85" data-element_type="column"
                                        data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}">
                                        <div class="elementor-column-wrap elementor-element-populated">
                                            <div class="elementor-widget-wrap">
                                                <div class="elementor-element elementor-element-feb5492 elementor-align-center elementor-mobile-align-center elementor-widget elementor-widget-button"
                                                    data-id="feb5492" data-element_type="widget"
                                                    data-widget_type="button.default">
                                                    <div class="elementor-widget-container pt-lg-4">
                                                        <div class="elementor-button-wrapper">
                                                            <a href="{{'category_'.$previous_category->title}}"
                                                                class="elementor-button-link elementor-button elementor-size-lg"
                                                                role="button">
                                                                <span class="elementor-button-content-wrapper">
                                                                    <span style="font-size:23px" class="elementor-button-text">{{$previous_category->title}}</span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-231fe70"
                                        data-id="231fe70" data-element_type="column"
                                        data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}">
                                        <div class="elementor-column-wrap elementor-element-populated">
                                            <div class="elementor-widget-wrap pt-lg-4">
                                                <div class="elementor-element elementor-element-3648ac7 elementor-widget elementor-widget-mayosis-search"
                                                    data-id="3648ac7" data-element_type="widget"
                                                    data-widget_type="mayosis-search.default">
                                                    <div class="elementor-widget-container">

                                                        <!-- Element Code start -->
                                                        <div class="product-search-form style1">
                                                            <form method="POST" action="/search">
                                                            @csrf

                                                                

                                                                <div class="search-fields">
                                                                    <input name="keyword" value="" type="text"
                                                                        placeholder="Search Now">
                                                                    <input type="hidden" name="post_type"
                                                                        value="download">
                                                                    <span class="search-btn"><input value=""
                                                                            type="submit"></span>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-e07d740"
                                        data-id="e07d740" data-element_type="column"
                                        data-settings="{&quot;background_background&quot;:&quot;gradient&quot;}">
                                        <div class="elementor-column-wrap elementor-element-populated">
                                            <div class="elementor-widget-wrap">
                                                <div class="elementor-element elementor-element-c7eb6bb elementor-align-center elementor-mobile-align-center elementor-widget elementor-widget-button"
                                                    data-id="c7eb6bb" data-element_type="widget"
                                                    data-widget_type="button.default">
                                                    <div class="elementor-widget-container pt-lg-4">
                                                        <div class="elementor-button-wrapper">
                                                            <a href="{{'category_'.$next_category->title}}"
                                                                class="elementor-button-link elementor-button elementor-size-lg"
                                                                role="button">
                                                                <span class="elementor-button-content-wrapper">
                                                                    <span style="font-size:23px" class="elementor-button-text">{{$next_category->title}}</span>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

</div>
<section data-particle_enable="false" data-particle-mobile-disabled="false"
                            class="elementor-section elementor-top-section elementor-element elementor-element-af0d4a3 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                            data-id="af0d4a3" data-element_type="section">
                            <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-row">

                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-49b342a"
                                        data-id="49b342a" data-element_type="column">
                                        <div class="elementor-column-wrap elementor-element-populated">
                                            <div class="elementor-widget-wrap">
                                                <div class="elementor-element elementor-element-ba349ab elementor-widget elementor-widget-mayosis-edd-recent"
                                                    data-id="ba349ab" data-element_type="widget"
                                                    data-widget_type="mayosis-edd-recent.default">
                                                    <div class="elementor-widget-container">


                                                        <div class="edd_fetured_ark">
                                                            <div class="ms--title--container">
                                                                <div class="title--box--full"
                                                                    style="margin-bottom:20px;">
                                                                    <div class="title--promo--box">
                                                                        <h3 class="section-title"> </h3>
                                                                    </div>

                                                                    <div class="title--button--box">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row fix    ">


                                                         @if(isset($videos))
                                                         @if(count($videos) > 0)
                @foreach($videos as $video)
                 <div class="col-lg-4" style="max-height: 300px !important">
                    <a href="{{'/product_'.$video->id}}">
                       <video poster="{{'/storage/'.$video->poster}}"  width="100%" style="height: 80%; object-fit: fill" class="zxc" preload="none" muted>
                          <source src="{{'storage/'.$video->file}}">
                          Your browser does not support this file
                       </video>
                        <div class="product-meta">

                        <div class="product-tag">

                            <a href="#" class="mayosis-play--button-video icon-play" data-lity="">
                            </a>

                            <h4 class="product-title">
                                   {{$video->title}}</h4>





                        </div>

                        <div class="count-download">

                            <div class="product-price promo_price">
                                   @php
                                          $price = null;
                                             $vid=DB::table('videos')->where('id', $video->id)->pluck('resolution')->first();
                                             if($vid=='HD'){
                                                $price = DB::table('videos')->where('id', $video->id)->pluck('hd')->first();
                                                
                                             }
                                             if($vid=='FHD'){
                                                $price = DB::table('videos')->where('id', $video->id)->pluck('fhd')->first();
                                             }
                                             if($vid=='4K'){
                                                $price = DB::table('videos')->where('id', $video->id)->pluck('fourK')->first();
                                             }
                                             if($vid=='6K'){
                                                $price = DB::table('videos')->where('id', $video->id)->pluck('sixK')->first();
                                             }
                                             if($vid=='8K'){
                                                $price = DB::table('videos')->where('id', $video->id)->pluck('eightK')->first();
                                             }
                                       @endphp
                                <span class="edd_price" id="edd_price_11718">${{$price}}</span>
                            </div>

                        </div>

                        <div class="clearfix"></div>


                    </div>
                    </a>
                 </div>
                 @endforeach
                 @else
                    <p>No Videos available in this category</p>
                 @endif
                 @endif


                                                            </div>

                                                           <!--  <div class="mayo-page-product">


                                                                <div class="nav-links" style="">
                                                                    <div class="common-paginav text-center">
                                                                        <div class="pagination">
                                                                            <span class="page-numbers current">1</span>
                                                                            <a class="page-numbers"
                                                                                href="#cityscape-aerials/page/2/">2</a>
                                                                            <a class="page-numbers"
                                                                                href="#cityscape-aerials/page/3/">3</a>
                                                                            <span class="page-numbers dots">…</span>
                                                                            <a class="page-numbers"
                                                                                href="#cityscape-aerials/page/9/">9</a>
                                                                            <a class="next page-numbers"
                                                                                href="#cityscape-aerials/page/2/">Next</a>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div> -->


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

</div>
</div> 
<a id="back-to-top" href="#" class="back-to-top" role="button" data-original-title="" title=""
        style="display: none;"><i class="zil zi-chevron-up"></i></a>
<script data-pagespeed-no-defer>//<![CDATA[
         (function(){for(var g="function"==typeof Object.defineProperties?Object.defineProperty:function(b,c,a){if(a.get||a.set)throw new TypeError("ES3 does not support getters and setters.");b!=Array.prototype&&b!=Object.prototype&&(b[c]=a.value)},h="undefined"!=typeof window&&window===this?this:"undefined"!=typeof global&&null!=global?global:this,k=["String","prototype","repeat"],l=0;l<k.length-1;l++){var m=k[l];m in h||(h[m]={});h=h[m]}
         var n=k[k.length-1],p=h[n],q=p?p:function(b){var c;if(null==this)throw new TypeError("The 'this' value for String.prototype.repeat must not be null or undefined");c=this+"";if(0>b||1342177279<b)throw new RangeError("Invalid count value");b|=0;for(var a="";b;)if(b&1&&(a+=c),b>>>=1)c+=c;return a};q!=p&&null!=q&&g(h,n,{configurable:!0,writable:!0,value:q});var t=this;
         function u(b,c){var a=b.split("."),d=t;a[0]in d||!d.execScript||d.execScript("var "+a[0]);for(var e;a.length&&(e=a.shift());)a.length||void 0===c?d[e]?d=d[e]:d=d[e]={}:d[e]=c};function v(b){var c=b.length;if(0<c){for(var a=Array(c),d=0;d<c;d++)a[d]=b[d];return a}return[]};function w(b){var c=window;if(c.addEventListener)c.addEventListener("load",b,!1);else if(c.attachEvent)c.attachEvent("onload",b);else{var a=c.onload;c.onload=function(){b.call(this);a&&a.call(this)}}};var x;function y(b,c,a,d,e){this.h=b;this.j=c;this.l=a;this.f=e;this.g={height:window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight,width:window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth};this.i=d;this.b={};this.a=[];this.c={}}
         function z(b,c){var a,d,e=c.getAttribute("data-pagespeed-url-hash");if(a=e&&!(e in b.c))if(0>=c.offsetWidth&&0>=c.offsetHeight)a=!1;else{d=c.getBoundingClientRect();var f=document.body;a=d.top+("pageYOffset"in window?window.pageYOffset:(document.documentElement||f.parentNode||f).scrollTop);d=d.left+("pageXOffset"in window?window.pageXOffset:(document.documentElement||f.parentNode||f).scrollLeft);f=a.toString()+","+d;b.b.hasOwnProperty(f)?a=!1:(b.b[f]=!0,a=a<=b.g.height&&d<=b.g.width)}a&&(b.a.push(e),
         b.c[e]=!0)}y.prototype.checkImageForCriticality=function(b){b.getBoundingClientRect&&z(this,b)};u("pagespeed.CriticalImages.checkImageForCriticality",function(b){x.checkImageForCriticality(b)});u("pagespeed.CriticalImages.checkCriticalImages",function(){A(x)});
         function A(b){b.b={};for(var c=["IMG","INPUT"],a=[],d=0;d<c.length;++d)a=a.concat(v(document.getElementsByTagName(c[d])));if(a.length&&a[0].getBoundingClientRect){for(d=0;c=a[d];++d)z(b,c);a="oh="+b.l;b.f&&(a+="&n="+b.f);if(c=!!b.a.length)for(a+="&ci="+encodeURIComponent(b.a[0]),d=1;d<b.a.length;++d){var e=","+encodeURIComponent(b.a[d]);131072>=a.length+e.length&&(a+=e)}b.i&&(e="&rd="+encodeURIComponent(JSON.stringify(B())),131072>=a.length+e.length&&(a+=e),c=!0);C=a;if(c){d=b.h;b=b.j;var f;if(window.XMLHttpRequest)f=
         new XMLHttpRequest;else if(window.ActiveXObject)try{f=new ActiveXObject("Msxml2.XMLHTTP")}catch(r){try{f=new ActiveXObject("Microsoft.XMLHTTP")}catch(D){}}f&&(f.open("POST",d+(-1==d.indexOf("?")?"?":"&")+"url="+encodeURIComponent(b)),f.setRequestHeader("Content-Type","application/x-www-form-urlencoded"),f.send(a))}}}
         function B(){var b={},c;c=document.getElementsByTagName("IMG");if(!c.length)return{};var a=c[0];if(!("naturalWidth"in a&&"naturalHeight"in a))return{};for(var d=0;a=c[d];++d){var e=a.getAttribute("data-pagespeed-url-hash");e&&(!(e in b)&&0<a.width&&0<a.height&&0<a.naturalWidth&&0<a.naturalHeight||e in b&&a.width>=b[e].o&&a.height>=b[e].m)&&(b[e]={rw:a.width,rh:a.height,ow:a.naturalWidth,oh:a.naturalHeight})}return b}var C="";u("pagespeed.CriticalImages.getBeaconData",function(){return C});
         u("pagespeed.CriticalImages.Run",function(b,c,a,d,e,f){var r=new y(b,c,a,e,f);x=r;d&&w(function(){window.setTimeout(function(){A(r)},0)})});})();
         
         pagespeed.CriticalImages.Run('/mod_pagespeed_beacon','https://preview.colorlib.com/theme/classyads/about.html','-ilGEe-FWC',true,false,'Nz18AuPAsfQ');
         //]]>
      </script>

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


<!-- --------------------------------------------------------------- -->

