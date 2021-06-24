<!-- ========== Left Sidebar Start ========== -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.css"
      rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.css"
      rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/css/materialdesignicons.min.css.map"
      rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/fonts/materialdesignicons-webfont.eot"
      rel="stylesheet">
<link href="" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/fonts/materialdesignicons-webfont.ttf"
      rel="stylesheet">
<link
    href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.9.55/fonts/materialdesignicons-webfont.woff2"
    rel="stylesheet">
<link href="" rel="stylesheet">
<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                @php
                    $userData = Auth::guard()->user();
                @endphp
                <img src="{{ ($userData['profile_pic'])?asset($userData['profile_pic']):URL::asset('public/images/users/avatar-2.png') }}" alt=""
                     class="avatar-md mx-auto rounded-circle">
            </div>

            <div class="mt-3">
                <a href="#" class="text-dark font-weight-medium font-size-16">{{$userData['username']}}</a>
                <p class="text-body mt-1 mb-0 font-size-13 text-capitalize">{{$userData['user_type']}}</p>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ url('/') }}" class="waves-effect">
                        <i class="mdi mdi-airplay"></i><span class="badge badge-pill badge-info float-right">2</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-check" style="height:auto;width:20px"></i>
                        <span>User Access </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('ip-addresslist.index') }}">IP Address List </a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <span class="iconify" data-icon="mdi:cctv"  style="height:auto;width:20px"data-inline="false"></span>
                        <span>Role Managemnt </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('roles.index') }}">Role  </a></li>
                        <li><a href="{{ route('permission.index') }}">Permission management </a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-user"></i>
                        <span>User Managemnt </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('userlist.index') }}">User List (CMS) </a></li>
                        <li><a href="{{ route('userlist.appuser') }}">User List (APP) </a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('advertisement.index') }}" class="has-arrow waves-effect">
                        <span class="iconify" data-icon="mdi:file-video-outline" style="height:auto;width:20px" data-inline="false"></span>
                        <span>Advirtisement</span>
                    </a>

                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <span class="iconify" data-icon="mdi:newspaper-variant" style="height:auto;width:20px" data-inline="false"></span>
                        <span>Article </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('article-category.index') }}">Categroy </a></li>
                        <li><a href="{{ route('article.create') }} "> Create Article </a></li>
                        <li><a href="{{ route('article.pending') }} "> Pending Article </a></li>
                        <li><a href="{{ route('article.index') }} ">Published Article</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <span class="iconify" data-icon="mdi:youtube" data-inline="false" style="height:auto;width:20px"></span>
                        <span>Video </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('video-category.index') }}">Categroy </a></li>
                        <li><a href="{{ route('videos.create') }} "> Create Video </a></li>
                        <li><a href="{{ route('videos.pending') }} "> Pending Video </a></li>
                        <li><a href="{{ route('videos.index') }} ">Published Video</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <span class="iconify" data-icon="mdi:reload" data-inline="false" style="width:23px;height:auto"></span>
                        <span>Coupon </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('coupon-category.index') }}">Categroy </a></li>
                        <li><a href="{{ route('coupon.index') }} ">Coupon</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <span class="iconify" data-icon="mdi:reload" data-inline="false" style="width:23px;height:auto"></span>
                        <span>Event </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('event.index') }}">Eevnt </a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <span class="iconify" data-icon="mdi:script-text-key" style="width:23px;height:auto"  data-inline="false"></span>
                        <span>Quiz </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('quiz-type.index') }} ">Quiz Category </a></li>
                        <li><a href="{{ route('quiz.index') }} ">Quiz </a></li>
                        <li><a href="{{ route('quiz-question.index') }} ">Question </a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <span class="iconify" data-icon="mdi:script-text-key" style="width:23px;height:auto"  data-inline="false"></span>
                        <span>Point Setting </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('point.index')}}">Point Setting </a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-settings-outline align-middle mr-1"></i>
                        <span>Setting </span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('occupation.index') }}">Salary list(App)</a></li>
                        <li><a href="#">Industry list(App) </a></li>
                        <li><a href="#"> Occuapation list(App) </a></li>
                        <li><a href="#">Language</a></li>
                        <li><a href="{{ route('about-us') }}">About us </a></li>
                        <li><a href=" {{ route('contact-us') }} ">Contact Us </a></li>
                        <li><a href=" {{ route('contact-us') }} ">Contact Us User Enquery </a></li>
                        <li><a href="# ">Feedback </a></li>
                    </ul>

                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-box"></i>
                        <span>Notification  </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('push-notifications.index') }}">push Notification  </a></li>
                        <li><a href="#">Email Notification</a></li>
                        <li><a href="#">Email Notification</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <span class="iconify" data-icon="mdi:tab" style="width:20px;height:auto" data-inline="false"></span>
                        <span>Report </span>
                    </a>

                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('activity-history') }} ">Activity Login Report </a></li>
                        <li><a href="{{ route('userlist.appuser') }}">Email Notification histry</a></li>
                        <li><a href="{{ route('userlist.appuser') }}">Push Notificion Histry</a></li>
                    </ul>

                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
