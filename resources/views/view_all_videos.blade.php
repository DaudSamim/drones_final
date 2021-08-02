@include('header')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
    integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
    integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    .owl-prev,
    .owl-next {
        width: 15px;
        height: 100px;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        display: block !important;
        border: 0px solid black;
        font-size: 400% !important;
        background-color: lightgray;
    }

    .owl-prev {
        left: 0px;
    }

    .owl-next {
        right: 0px;
    }

    .owl-prev i,
    .owl-next i {
        transform: scale(2, 5);
        color: #ffffff;
        font-size: 400% !important;
    }

</style>
<div class="mayosis-wrapper">
    @include('header_for_single_page')
    <div class="mayosis-container" style="background:#ffffff">
        <div data-elementor-type="wp-post" data-elementor-id="24" class="elementor elementor-24"
            data-elementor-settings="[]">
            <div class="elementor-inner">
                <div class="elementor-section-wrap">
                    <section
                        class="elementor-section elementor-top-section elementor-element elementor-element-16adda4 custom-bg-color elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="16adda4" data-element_type="section">
                        <div class="elementor-background-video-container">
                            <div data-video="69yA-F7yOiQ" class="header__video js-background-video">
                                <div class="header__background">
                                    <div id="yt-player"></div>
                                </div>
                            </div>
                            <div class="header__video-overlay js-video-overlay"
                                style="background-image: url('https://img.youtube.com/vi/69yA-F7yOiQ/maxresdefault.jpg');">
                            </div>
                        </div>
                        <div class="elementor-background-overlay"></div>
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1c44438"
                                    data-id="1c44438" data-element_type="column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-7da0020 elementor-widget elementor-widget-mayosis-theme-hero"
                                                data-id="7da0020" data-element_type="widget"
                                                data-widget_type="mayosis-theme-hero.default">
                                                <div class="elementor-widget-container">
                                                    <!-- Element Code start -->
                                                    <div class="col-md-12  col-xs-12 col-sm-12 mayosis_theme_hero_box">
                                                        <h1 class="hero-title">THE BEST AERIAL VIDEOS SHARED BY
                                                            TALLENTED CREATORS
                                                            <span class="mhero_counter_main">
                                                            </span>
                                                        </h1>
                                                        <div class="hero-description"></div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="elementor-element elementor-element-32e332b elementor-widget elementor-widget-mayosis-search"
                                                data-id="32e332b" data-element_type="widget"
                                                data-widget_type="mayosis-search.default">
                                                <div class="elementor-widget-container">
                                                    <!-- Element Code start -->
                                                    <div class="product-search-form style1">
                                                        <form method="post" action="/search">
                                                            @csrf
                                                            <div class="search-fields">
                                                                <input name="keyword" value="" type="text"
                                                                    placeholder="Search Now">
                                                                <span class="search-btn"><input value=""
                                                                        type="button"></span>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                    <section data-particle_enable="false" data-particle-mobile-disabled="false"
                        class="elementor-section elementor-top-section elementor-element elementor-element-85b239a elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="85b239a" data-element_type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row">
                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-899d6e0"
                                    data-id="899d6e0" data-element_type="column">
                                    <div class="elementor-column-wrap elementor-element-populated">
                                        <div class="elementor-widget-wrap">
                                            <div class="elementor-element elementor-element-0dc32e0 elementor-widget elementor-widget-heading"
                                                data-id="0dc32e0" data-element_type="widget"
                                                data-widget_type="heading.default">
                                                <div class="elementor-widget-container">
                                                    <h1 class="elementor-heading-title elementor-size-default">OUR
                                                        CATEGORIES
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </section>
                     <section data-particle_enable="false" data-particle-mobile-disabled="false"
                        class="elementor-section elementor-top-section elementor-element elementor-element-dcd2318 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                        data-id="dcd2318" data-element_type="section"
                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                        <div class="elementor-container elementor-column-gap-default">
                            <div class="elementor-row ">
                                @if(isset($categories))
                                <div class="owl-carousel owl-theme">
                                    @foreach($categories as $category)
                                    <div class="item" style="width:500%!important">
                                        <div class="elementor-column elementor-col-16 elementor-top-column elementor-element elementor-element-a2025a3 "
                                            data-id="a2025a3" data-element_type="column">
                                            <div class="elementor-column-wrap elementor-element-populated ">
                                                <div class="elementor-widget-wrap ">
                                                    <div class="elementor-element elementor-element-3e50a25 elementor-widget elementor-widget-image "
                                                        data-id="3e50a25" data-element_type="widget"
                                                        data-widget_type="image.default">
                                                        <div class="elementor-widget-container ">
                                                            <div class="elementor-image">
                                                                <a href="{{'/category_'.$category->title}}">
                                                                    <img style="max-width: 100%;height: 150px"
                                                                        src="{{'images/'.$category->image}}"
                                                                        class="attachment-large size-large" alt=""
                                                                        loading="lazy" /> </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="elementor-element elementor-element-50b210f elementor-widget elementor-widget-heading"
                                                        data-id="50b210f" data-element_type="widget"
                                                        data-widget_type="heading.default">
                                                        <div class="elementor-widget-container">
                                                            <h1 class="elementor-heading-title elementor-size-default">
                                                                <a
                                                                    href="{{'/category_'.$category->title}}">{{$category->title}}</a>
                                                            </h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        </div>
                     </section>
                <section data-particle_enable="false" data-particle-mobile-disabled="false"
                    class="elementor-section elementor-top-section elementor-element elementor-element-e26d8b3 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="e26d8b3" data-element_type="section"
                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-561d15f"
                                data-id="561d15f" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-30aa770 elementor-widget elementor-widget-heading"
                                            data-id="30aa770" data-element_type="widget"
                                            data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h1 class="elementor-heading-title elementor-size-default">All Videos
                                                </h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section data-particle_enable="false" data-particle-mobile-disabled="false"
                    class="elementor-section elementor-top-section elementor-element elementor-element-79047b9 elementor-section-full_width elementor-section-height-default elementor-section-height-default"
                    data-id="79047b9" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-c274fd0"
                                data-id="c274fd0" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-029c0ce elementor-widget elementor-widget-mayosis-edd-recent"
                                            data-id="029c0ce" data-element_type="widget"
                                            data-widget_type="mayosis-edd-recent.default">
                                            <div class="elementor-widget-container">
                                                <div class="edd_fetured_ark">
                                                    <div class="ms--title--container">
                                                        <div class="title--box--full" style="margin-bottom:20px;">
                                                            <div class="title--promo--box">
                                                                <h3 class="section-title"> </h3>
                                                            </div>
                                                            <div class="title--button--box">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row fix    ">
@if((count($videos) > 0))                                                        @foreach($videos as $video)
                                                        <div class="col-lg-4" style="max-height: 300px !important">
                                                            <a href="{{'/product_'.$video->id}}">
                                                                <video class="zxc"
                                                                    poster="{{'/storage/'.$video->poster}}"
                                                                    style="width: 100%; height: 80%; object-fit: fill"
                                                                    preload="none">
                                                                    <source src="{{'storage/'.$video->file}}">
                                                                    Your browser does not support this file
                                                                </video>
                                                                <div class="product-meta">
                                                                    <div class="product-tag">
                                                                        <a href="#"
                                                                            class="mayosis-play--button-video icon-play"
                                                                            data-lity="">
                                                                        </a>
                                                                        <h4 class="product-title">
                                                                            {{$video->title}}</h4>
                                                                    </div>
                                                                    <div class="count-download">
                                                                        <div class="product-price promo_price">
                                                                            @php
                                                                            $price = null;
                                                                            $vid=DB::table('videos')->where('id',
                                                                            $video->id)->pluck('resolution')->first();
                                                                            if($vid=='HD'){
                                                                            $price = DB::table('videos')->where('id',
                                                                            $video->id)->pluck('hd')->first();

                                                                            }
                                                                            if($vid=='FHD'){
                                                                            $price = DB::table('videos')->where('id',
                                                                            $video->id)->pluck('fhd')->first();
                                                                            }
                                                                            if($vid=='4K'){
                                                                            $price = DB::table('videos')->where('id',
                                                                            $video->id)->pluck('fourK')->first();
                                                                            }
                                                                            if($vid=='6K'){
                                                                            $price = DB::table('videos')->where('id',
                                                                            $video->id)->pluck('sixK')->first();
                                                                            }
                                                                            if($vid=='8K'){
                                                                            $price = DB::table('videos')->where('id',
                                                                            $video->id)->pluck('eightK')->first();
                                                                            }
                                                                            @endphp

                                                                            <span class="edd_price"
                                                                                id="edd_price_11718">${{$price}}</span>

                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"></div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        @endforeach
                                                        @else 
                                                        <h3 style="color:black"class="text-center">No Videos Available</h3>
                                                        @endif
                                                    </div>
                                                    <div class="mayo-page-product">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                </section>
                @if(Session::has('subscribe'))
                <script>
                    alert('You have successfully Subscribed');

                </script>
                @endif
                
                
                
                <section data-particle_enable="false" data-particle-mobile-disabled="false"
                    class="elementor-section elementor-top-section elementor-element elementor-element-aeff6c0 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                    data-id="aeff6c0" data-element_type="section">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">
                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-bc4d91c"
                                data-id="bc4d91c" data-element_type="column">
                                <div class="elementor-column-wrap elementor-element-populated">
                                    <div class="elementor-widget-wrap">
                                        <div class="elementor-element elementor-element-95d64bb elementor-widget elementor-widget-mayosis-search-terms"
                                            data-id="95d64bb" data-element_type="widget"
                                            data-widget_type="mayosis-search-terms.default">
                                            <div class="elementor-widget-container">
                                                <div class="search--term--div ">
                                                    <h2 class="section-title">Search With Tags </h2>
                                                    <div class="search-term-style-five tag_widget_single">
                                                        <ul>
                                                            <li>
                                                                @foreach($keywords as $row)
                                                                @php
                                                                $row = json_decode($row);
                                                                $arr = explode(",", $row);
                                                                $row = $arr[0];
                                                                @endphp
                                                                <a href="/search_{{$row}}" rel="nofollow">{{$row}}</a>
                                                                @endforeach
                                                            </li>
                                                        </ul>
                                                    </div>
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
    </div>
</div>

@include('footer')

</div>
</div>
<a id="back-to-top" href="#" class="back-to-top" role="button"><i class="zil zi-chevron-up"></i></a>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    // YouTube Player API for header BG video

    // Insert the <script> tag targeting the iframe API
    const tag = document.createElement('script');
    tag.src = "https://www.youtube.com/iframe_api";
    const firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // Get the video ID passed to the data-video attribute
    const bgVideoID = document.querySelector('.js-background-video').getAttribute('data-video');

    // Set the player options
    const playerOptions = {
        // Autoplay + mute has to be activated (value = 1) if you want to autoplay it everywhere
        // Chrome/Safari/Mobile
        autoplay: 1,
        mute: 1,
        autohide: 1,
        modestbranding: 1,
        rel: 0,
        showinfo: 0,
        controls: 0,
        disablekb: 1,
        enablejsapi: 1,
        iv_load_policy: 3,
        // For looping video you have to have loop to 1
        // And playlist value equal to your currently playing video
        loop: 1,
        playlist: bgVideoID,

    }

    // Get the video overlay, to mask it when the video is loaded
    const videoOverlay = document.querySelector('.js-video-overlay');

    // This function creates an <iframe> (and YouTube player)
    // after the API code downloads.
    let ytPlayer;

    function onYouTubeIframeAPIReady() {
        ytPlayer = new YT.Player('yt-player', {
            width: '1280',
            height: '720',
            videoId: bgVideoID,
            playerVars: playerOptions,
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    // The API will call this function when the video player is ready.
    function onPlayerReady(event) {
        event.target.playVideo();

        // Get the duration of the currently playing video
        const videoDuration = event.target.getDuration();

        // When the video is playing, compare the total duration
        // To the current passed time if it's below 2 and above 0,
        // Return to the first frame (0) of the video
        // This is needed to avoid the buffering at the end of the video
        // Which displays a black screen + the YouTube loader
        setInterval(function () {
            const videoCurrentTime = event.target.getCurrentTime();
            const timeDifference = videoDuration - videoCurrentTime;

            if (2 > timeDifference > 0) {
                event.target.seekTo(0);
            }
        }, 1000);
    }

    // When the player is ready and when the video starts playing
    // The state changes to PLAYING and we can remove our overlay
    // This is needed to mask the preloading
    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING) {
            videoOverlay.classList.add('header__video-overlay--fadeOut');
        }
    }

</script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        effect: "flip",
        grabCursor: true,
        pagination: {
            el: ".swiper-pagination",
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });


    $(".zxc").on("mouseover", function (event) {
        this.play();


    }).on('mouseout', function (event) {
        this.pause();
        this.currentTime = 0;

    });

</script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,

        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5

            }
        }
    })

</script>
</body>
<!-- End Main Layout -->
<!-- Mirrored from africandronestock.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 16 May 2021 18:12:28 GMT -->

</html>
<!-- Page generated by LiteSpeed Cache 3.6.4 on 2021-05-16 15:20:29 -->
<!--
   Performance optimized by W3 Total Cache. Learn more: https://www.boldgrid.com/w3-total-cache/


   Served from: africandronestock.com @ 2021-05-16 15:20:29 by W3 Total Cache
   -->
