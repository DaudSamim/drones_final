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
@include('header_for_single_page')
<div class=" overlay" style="background-image: url(images/contact.jpg);height:50%!important" data-aos="fade" >
   <div class="container" style="height: 380px">
      <!-- <iframe width="100%" height="auto" src="https://www.youtube.com/embed/ZBZxQV6JDFI?autoplay=1&muted=1&loop=1&controls=0&rel=0&hd=1&playlist=ZBZxQV6JDFI&showinfo=0&fs=0" title="YouTube video player" frameborder="0"></iframe> -->
      <div class="row align-items-center justify-content-center text-center">
         <div class="col-md-12">
            <div class="row justify-content-center mb-4">
               <div class="col-md-8 text-center  form-search-wrap" style="margin-top: 15%" >
                  <h1 style="color: white; font-weight: 800" class="" data-aos="fade-up">Categories</h1>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="row mb-5 " >
   <div class="col-md-12 pt-3  border-primary text-center">
      <h2 class="font-weight-light text-primary pb-0 ">Our Categories</h2>
   </div>
</div>
<div class="row p-5" style="padding-top:0px!important">
@php
        $categories = DB::table('categories')->get();
@endphp
    @foreach($categories as $category)
   <div class="col-md-6 col-lg-3 mb-4 mb-lg-0" style="margin-bottom: 2% !important">
      <a href="{{'/category_'.$category->title}}" class="h4"><img style="height:180px !important;" src="images/{{$category->image}}" alt="Image" class="img-fluid " data-pagespeed-url-hash="3677916794" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
      <h3> {{$category->title}}</h3></a>
      
   </div>
   @endforeach
   
</div>
</div>
</div> 
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