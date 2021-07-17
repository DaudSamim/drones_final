@extends('layout.app')

@section('content')
<link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet" />
<link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />



<div class="row justify-content-center">
    @if(isset($count_videos))
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card ">
            <div class="card-body text-center">
                <br>
                <a href="/view-all-videos" style="color: black">
                    <h2><i class="fas fa-play"></i></h2>
                    <br><br>

                    <h3>Videos</h3>
                    <br>
                    <h4>{{$count_videos}}</h4>
                </a>
            </div>
        </div>
    </div>
    @endif
    @if(isset($count_categories))
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card ">
            <div class="card-body text-center">
                <br>
                <a href="/view-category" style="color: black">
                    <h2><i class="fas fa-photo-video"></i></h2>
                    <br><br>
                    <h3>Categories</h3>
                    <br>
                    <h4>{{$count_categories}}</h4>
                </a>
            </div>
        </div>
    </div>
    @endif
    @if(isset($count_purchases))
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card ">
            <div class="card-body text-center">
                <br>
                <a href="/view-purchases" style="color: black">
                    <h2>
                        <i class="fas fa-shopping-cart"></i>
                    </h2>
                    <br><br>
                    <h3>Purchases</h3>
                    <br>
                    <h4>{{$count_purchases}}</h4>
                </a>
            </div>
        </div>
    </div>
    @endif
    @if(isset($count_plans))
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card ">
            <div class="card-body text-center">
                <br>
                <a href="/view-plans" style="color: black">
                    <h2><i class="far fa-flag"></i> </h2> <br>
                    <br>
                    <h3>Plans</h3>
                    <br>
                    <h4>{{$count_plans}}</h4>
                </a>
            </div>
        </div>
    </div>
    @endif
</div>
<div class="row ">
    @if(isset($count_users))
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card ">
            <div class="card-body text-center">
                <br>
                <a href="/view-user-stats" style="color: black">
                    <h2><i class="fas fa-users"></i> </h2> <br>
                    <br>
                    <h3>Users</h3>
                    <br>
                    <h4>{{$count_users}}</h4>
                </a>
            </div>
        </div>
    </div>
    @endif
    @if(isset($count_vendors))
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card ">
            <div class="card-body text-center">
                <br>
                <a href="/view-vendors" style="color: black">
                    <h2><i class="fas fa-users"></i> </h2> <br>
                    <br>
                    <h3>Contributors</h3>
                    <br>
                    <h4>{{$count_vendors}}</h4>
                </a>
            </div>
        </div>
    </div>
    @endif

    @if(isset($count_subs))
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card ">
            <div class="card-body text-center">
                <br>
                <a href="/view_subscriptions" style="color: black">
                    <h2><i class="fas fa-comment-medical"></i> </h2> <br>
                    <br>
                    <h3>Subscriptions</h3>
                    <br>
                    <h4>{{$count_subs}}</h4>
                </a>
            </div>
        </div>
    </div>
    @endif
</div>




@endsection

@section('scripts')


@endsection
