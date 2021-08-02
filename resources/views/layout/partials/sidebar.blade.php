<nav class="sidebar">

    <div class="sidebar-header">

        <a href="/" class="sidebar-brand">

            Drone Stock

        </a>

        <div class="sidebar-toggler not-active">

            <span></span>

            <span></span>

            <span></span>

        </div>

    </div>

@php

    $total_amount = DB::table('vendors')->where('user_id',auth()->user()->id)->first();

   $check_replies = DB::table('users')->where('id',auth()->user()->id)->first();

    $replies = DB::table('contact_queries')->where('email',$check_replies->email)->where('status',1)->get();

    $count = count($replies);

@endphp

    @if(($count) > 0)

        @php

            $notifications = $count

        @endphp

    @else

        @php

            $notifications = 0

        @endphp

    @endif

    

    

    



    @if(auth()->user()->role == 2)

    <div class="container text-center">

        <label class="form-check-label" for="flexCheckChecked">

            @if(isset($total_amount))

            Wallet : ${{$total_amount->amount}}

            @else

            Wallet : $0

            @endif

        </label>

    </div>

    @endif

                                               

    <div class="sidebar-body">

        <ul class="nav">



                    <ul class="nav sub-menu">

                   

                        

                   

                    @if( auth()->user()->role == 2 )

                        <li class="nav-item">

                            <a href="{{ url('view-videos') }}"

                               class="nav-link ">Videos </a>

                        </li>

                        <li class="nav-item">

                            <a href="{{ url('/show_orders') }}"

                               class="nav-link ">Orders </a>

                        </li>

                        <li class="nav-item">

                            <a href="/page_replies"

                               class="nav-link ">Admin Replies @if(($notifications) > 0) <span class=" ml-1 badge bg-danger">{{$notifications}}</span> 

                               @else

                               <span class=" ml-1 badge bg-secondary">0</span> 

                            @endif</a>

                        </li>
                        <li class="nav-item">

                            <a href="/edit_profile"

                                class="nav-link ">Edit Profile</a>

                        </li>

                        

                    @endif

                    @if(auth()->user()->role == 3)

                     <li class="nav-item">

                            <a href="/view-purchases"

                               class="nav-link  ">Purchases </a>

                        </li>

                        <li class="nav-item">

                            <a href="/page_replies"

                               class="nav-link ">Admin Replies @if(($notifications) > 0) <span class=" ml-1 badge bg-danger">{{$notifications}}</span> 

                               @else

                               <span class=" ml-1 badge bg-secondary">0</span> 

                            @endif</a>

                        </li>



                         

                    @endif

                    @if( auth()->user()->role == 1 )

                    <li class="nav-item">

                            <a href="{{ url('view-stats') }}"

                               class="nav-link  ">Statistics</a>

                        </li>

                        <li class="nav-item">

                            <a href="{{ url('view-all-videos') }}"

                               class="nav-link ">Videos </a>

                        </li>

                    

                    

                        <li class="nav-item">

                            <a href="{{ url('view-category') }}"

                               class="nav-link ">Categories </a>

                        </li>



                        <li class="nav-item">

                            <a href="{{ url('view-qualities') }}"

                               class="nav-link ">Qualities </a>

                        </li>



                        

                    

                    

                        <li class="nav-item">

                            <a href="/view-plans"

                               class="nav-link  ">Plans </a>

                        </li>



                        



                        <li class="nav-item">

                            <a href="/view-coupons"

                               class="nav-link  ">Coupons </a>

                        </li>

                    

                    

                        <li class="nav-item">

                            <a href="{{ url('view-user-stats') }}"

                               class="nav-link  ">Users </a>

                        </li>

                    

                    

                        <li class="nav-item">

                            <a href="{{ url('view-vendors') }}"

                               class="nav-link ">Contributors </a>

                        </li>



                        <li class="nav-item">

                            <a href="{{ url('view-blogs') }}"

                               class="nav-link ">Blogs </a>

                        </li>



                         <li class="nav-item">

                            <a href="/view-purchases"

                               class="nav-link  ">Purchases </a>

                        </li>

                    

                    

                        <li class="nav-item">

                            <a href="{{ url('view_contact_us') }}"

                               class="nav-link  ">Contact Queries </a>

                        </li>

                    

                    

                        <li class="nav-item">

                            <a href="{{ url('view_subscriptions') }}"

                               class="nav-link  ">Subscriptions </a>

                        </li>

                    @endif

                        

                        <li class="nav-item">

                            <a href="/purchased-plans"

                               class="nav-link  ">Plans Purchased </a>

                        </li>

                   

                        <li class="nav-item">

                            <a href="{{ url('change-password') }}"

                              class="nav-link"  >Change Password</a>

                        </li>

                    

                    </ul>



        </ul>

    </div>

</nav>

