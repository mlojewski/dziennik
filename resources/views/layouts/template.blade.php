<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Riho admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Riho admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('../assets/images/favicon.png" type="image/x-icon')}}">
    <link rel="shortcut icon" href="{{asset('../assets/images/favicon.png')}}" type="image/x-icon">
    <title>Mały Atleta</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/font-awesome.css')}}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/vendors/icofont.css')}}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/vendors/themify.css')}}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/vendors/flag-icon.css')}}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/vendors/feather-icon.css')}}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/vendors/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/vendors/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/vendors/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/vendors/echart.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/vendors/date-picker.css')}}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/vendors/bootstrap.css')}}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/style.css')}}">
    <link id="color" rel="stylesheet" href="{{asset('../assets/css/color-1.css" media="screen')}}">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('../assets/css/responsive.css"')}}">
</head>
<body>
<!-- loader starts-->
<div class="loader-wrapper">
    <div class="loader">
        <div class="loader4"></div>
    </div>
</div>
<!-- loader ends-->
<!-- tap on top starts-->
<div class="tap-top"><i data-feather="chevrons-up"></i></div>
<!-- tap on tap ends-->
<!-- page-wrapper Start-->
<div class="page-wrapper compact-wrapper" id="pageWrapper">
    <!-- Page Header Start-->
    <div class="page-header">
        <div class="header-wrapper row m-0">
            <form class="form-inline search-full col" action="#" method="get">
                <div class="form-group w-100">
                    <div class="Typeahead Typeahead--twitterUsers">
                        <div class="u-posRelative">
                            <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Riho .." name="q" title="" autofocus>
                            <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading... </span></div><i class="close-search" data-feather="x"></i>
                        </div>
                        <div class="Typeahead-menu"> </div>
                    </div>
                </div>
            </form>
            <div class="header-logo-wrapper col-auto p-0">
                <div class="logo-wrapper"> <a href="index.html"><img class="img-fluid for-light" src="{{asset('../assets/images/logo/logo_dark.png')}}" alt="logo-light"><img class="img-fluid for-dark" src="{{asset('../assets/images/logo/logo.png')}}" alt="logo-dark"></a></div>
                <div class="toggle-sidebar"> <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
            </div>
            <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
                <div> <a class="toggle-sidebar" href="#"> <i class="iconly-Category icli"> </i></a>
                    <div class="d-flex align-items-center gap-2 ">
                        <h4 class="f-w-600">Welcome {{Auth::user()->name}}</h4><img class="mt-0" src="{{asset('../assets/images/hand.gif')}}" alt="hand-gif">
                    </div>
                </div>
                <div class="welcome-content d-xl-block d-none"><span class="text-truncate col-12">Witaj w panelu programu Mały Atleta </span></div>
            </div>
            <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
                <ul class="nav-menus">
                    <li class="d-md-block d-none">
                        <div class="form search-form mb-0">
                            <div class="input-group"><span class="input-icon">
                      <svg>
                        <use href="{{asset('../assets/svg/icon-sprite.svg#search-header')}}"></use>
                      </svg>
                      <input class="w-100" type="search" placeholder="Search"></span></div>
                        </div>
                    </li>
                    <li class="d-md-none d-block">
                        <div class="form search-form mb-0">
                            <div class="input-group"> <span class="input-show">
                      <svg id="searchIcon">
                        <use href="{{asset('../assets/svg/icon-sprite.svg#search-header')}}"></use>
                      </svg>
                      <div id="searchInput">
                        <input type="search" placeholder="Search">
                      </div></span></div>
                        </div>
                    </li>
                    <li class="onhover-dropdown">
                        <svg>
                            <use href="{{asset('../assets/svg/icon-sprite.svg#star')}}"></use>
                        </svg>
                        <div class="onhover-show-div bookmark-flip">
                            <div class="flip-card">
                                <div class="flip-card-inner">
                                    <div class="front">
                                        <h6 class="f-18 mb-0 dropdown-title">Bookmark</h6>
                                        <ul class="bookmark-dropdown">
                                            <li>
                                                <div class="row">
                                                    <div class="col-4 text-center">
                                                        <div class="bookmark-content">
                                                            <div class="bookmark-icon"><i data-feather="file-text"></i></div><span>Forms</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <div class="bookmark-content">
                                                            <div class="bookmark-icon"><i data-feather="user"></i></div><span>Profile</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <div class="bookmark-content">
                                                            <div class="bookmark-icon"><i data-feather="server"></i></div><span>Tables</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="text-center"><a class="flip-btn f-w-700" id="flip-btn" href="javascript:void(0)">Add New Bookmark</a></li>
                                        </ul>
                                    </div>
                                    <div class="back">
                                        <ul>
                                            <li>
                                                <div class="bookmark-dropdown flip-back-content">
                                                    <input type="text" placeholder="search...">
                                                </div>
                                            </li>
                                            <li><a class="f-w-700 d-block flip-back" id="flip-back" href="javascript:void(0)">Back</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="mode"><i class="moon" data-feather="moon"> </i></div>
                    </li>
                    <li class="onhover-dropdown notification-down">
                        <div class="notification-box">
                            <svg>
                                <use href="{{asset('../assets/svg/icon-sprite.svg#notification-header')}}"></use>
                            </svg><span class="badge rounded-pill badge-secondary">4 </span>
                        </div>
                        <div class="onhover-show-div notification-dropdown">
                            <div class="card mb-0">
                                <div class="card-header">
                                    <div class="common-space">
                                        <h4 class="text-start f-w-600">Notitications</h4>
                                        <div><span>4 New</span></div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="notitications-bar">
                                        <ul class="nav nav-pills nav-primary p-0" id="pills-tab" role="tablist">
                                            <li class="nav-item p-0"> <a class="nav-link active" id="pills-aboutus-tab" data-bs-toggle="pill" href="#pills-aboutus" role="tab" aria-controls="pills-aboutus" aria-selected="true">All(3)</a></li>
                                            <li class="nav-item p-0"> <a class="nav-link" id="pills-blog-tab" data-bs-toggle="pill" href="#pills-blog" role="tab" aria-controls="pills-blog" aria-selected="false">
                                                    Messages</a></li>
                                            <li class="nav-item p-0"> <a class="nav-link" id="pills-contactus-tab" data-bs-toggle="pill" href="#pills-contactus" role="tab" aria-controls="pills-contactus" aria-selected="false">
                                                    Cart  </a></li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <div class="tab-pane fade show active" id="pills-aboutus" role="tabpanel" aria-labelledby="pills-aboutus-tab">
                                                <div class="user-message">
                                                    <div class="cart-dropdown notification-all">
                                                        <ul>
                                                            <li class="pr-0 pl-0 pb-3 pt-3">
                                                                <div class="media"><img class="img-fluid b-r-5 me-3 img-60" src="{{asset('../assets/images/other-images/receiver-img.jpg')}}" alt="">
                                                                    <div class="media-body"><a class="f-light f-w-500" href="{{asset('../template/product.html')}}">Men Blue T-Shirt</a>
                                                                        <div class="qty-box">
                                                                            <div class="input-group"> <span class="input-group-prepend">
                                              <button class="btn quantity-left-minus" type="button" data-type="minus" data-field="">- </button></span>
                                                                                <input class="form-control input-number" type="text" name="quantity" value="1"><span class="input-group-prepend">
                                              <button class="btn quantity-right-plus" type="button" data-type="plus" data-field="">+</button></span>
                                                                            </div>
                                                                        </div>
                                                                        <h6 class="font-primary">$695.00</h6>
                                                                    </div>
                                                                    <div class="close-circle"><a class="bg-danger" href="#"><i data-feather="x"></i></a></div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <ul>
                                                        <li>
                                                            <div class="user-alerts"><img class="user-image rounded-circle img-fluid me-2" src="{{asset('../assets/images/dashboard/user/5.jpg')}}" alt="user"/>
                                                                <div class="user-name">
                                                                    <div>
                                                                        <h6><a class="f-w-500 f-14" href="{{asset('../template/user-profile.html')}}">Floyd Miles</a></h6><span class="f-light f-w-500 f-12">Sir, Can i remove part in des...</span>
                                                                    </div>
                                                                    <div>
                                                                        <svg>
                                                                            <use href="{{asset('../assets/svg/icon-sprite.svg#more-vertical')}}"></use>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="user-alerts"><img class="user-image rounded-circle img-fluid me-2" src="{{asset('../assets/images/dashboard/user/6.jpg')}}" alt="user"/>
                                                                <div class="user-name">
                                                                    <div>
                                                                        <h6><a class="f-w-500 f-14" href="{{asset('../template/user-profile.html')}}">Dianne Russell</a></h6><span class="f-light f-w-500 f-12">So, what is my next work ?</span>
                                                                    </div>
                                                                    <div>
                                                                        <svg>
                                                                            <use href="{{asset('../assets/svg/icon-sprite.svg#more-vertical')}}"></use>
                                                                        </svg>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-blog" role="tabpanel" aria-labelledby="pills-blog-tab">
                                                <div class="notification-card">
                                                    <ul>
                                                        <li class="notification d-flex w-100 justify-content-between align-items-center">
                                                            <div class="d-flex w-100 notification-data justify-content-center align-items-center gap-2">
                                                                <div class="user-alerts flex-shrink-0"><img class="rounded-circle img-fluid img-40" src="{{asset('../assets/images/dashboard/user/3.jpg')}}" alt="user"/></div>
                                                                <div class="flex-grow-1">
                                                                    <div class="common-space user-id w-100">
                                                                        <div class="common-space w-100"> <a class="f-w-500 f-12" href="{{asset('../template/private-chat.html')}}">Robert D. Hambly</a></div>
                                                                    </div>
                                                                    <div><span class="f-w-500 f-light f-12">Hello Miss...😊</span></div>
                                                                </div><span class="f-light f-w-500 f-12">44 sec</span>
                                                            </div>
                                                        </li>
                                                        <li class="notification d-flex w-100 justify-content-between align-items-center">
                                                            <div class="d-flex w-100 notification-data justify-content-center align-items-center gap-2">
                                                                <div class="user-alerts flex-shrink-0"><img class="rounded-circle img-fluid img-40" src="{{asset('../assets/images/dashboard/user/7.jpg')}}" alt="user"/></div>
                                                                <div class="flex-grow-1">
                                                                    <div class="common-space user-id w-100">
                                                                        <div class="common-space w-100"> <a class="f-w-500 f-12" href="{{asset('../template/private-chat.html')}}">Courtney C. Strang</a></div>
                                                                    </div>
                                                                    <div><span class="f-w-500 f-light f-12">Wishing You a Happy Birthday Dear.. 🥳🎊</span></div>
                                                                </div><span class="f-light f-w-500 f-12">52 min</span>
                                                            </div>
                                                        </li>
                                                        <li class="notification d-flex w-100 justify-content-between align-items-center">
                                                            <div class="d-flex w-100 notification-data justify-content-center align-items-center gap-2">
                                                                <div class="user-alerts flex-shrink-0"><img class="rounded-circle img-fluid img-40" src="../assets/images/dashboard/user/5.jpg" alt="user"/></div>
                                                                <div class="flex-grow-1">
                                                                    <div class="common-space user-id w-100">
                                                                        <div class="common-space w-100"> <a class="f-w-500 f-12" href="../template/private-chat.html">Raye T. Sipes</a></div>
                                                                    </div>
                                                                    <div><span class="f-w-500 f-light f-12">Hello Dear!! This Theme Is Very beautiful</span></div>
                                                                </div><span class="f-light f-w-500 f-12">48 min</span>
                                                            </div>
                                                        </li>
                                                        <li class="notification d-flex w-100 justify-content-between align-items-center">
                                                            <div class="d-flex w-100 notification-data justify-content-center align-items-center gap-2">
                                                                <div class="user-alerts flex-shrink-0"><img class="rounded-circle img-fluid img-40" src="../assets/images/dashboard/user/6.jpg" alt="user"/></div>
                                                                <div class="flex-grow-1">
                                                                    <div class="common-space user-id w-100">
                                                                        <div class="common-space w-100"> <a class="f-w-500 f-12" href="../template/private-chat.html">Henry S. Miller</a></div>
                                                                    </div>
                                                                    <div><span class="f-w-500 f-light f-12">You’re older today than yesterday, happy birthday!</span></div>
                                                                </div><span class="f-light f-w-500 f-12">3 min</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-contactus" role="tabpanel" aria-labelledby="pills-contactus-tab">
                                                <div class="cart-dropdown mt-4">
                                                    <ul>
                                                        <li class="pr-0 pl-0 pb-3">
                                                            <div class="media"><img class="img-fluid b-r-5 me-3 img-60" src="../assets/images/other-images/cart-img.jpg" alt="">
                                                                <div class="media-body"><a class="f-light f-w-500" href="../template/product.html">Furniture Chair for Home</a>
                                                                    <div class="qty-box">
                                                                        <div class="input-group"> <span class="input-group-prepend">
                                            <button class="btn quantity-left-minus" type="button" data-type="minus" data-field="">-</button></span>
                                                                            <input class="form-control input-number" type="text" name="quantity" value="1"><span class="input-group-prepend">
                                            <button class="btn quantity-right-plus" type="button" data-type="plus" data-field="">+</button></span>
                                                                        </div>
                                                                    </div>
                                                                    <h6 class="font-primary">$500</h6>
                                                                </div>
                                                                <div class="close-circle"><a class="bg-danger" href="#"><i data-feather="x"></i></a></div>
                                                            </div>
                                                        </li>
                                                        <li class="pr-0 pl-0 pb-3 pt-3">
                                                            <div class="media"><img class="img-fluid b-r-5 me-3 img-60" src="../assets/images/other-images/receiver-img.jpg" alt="">
                                                                <div class="media-body"><a class="f-light f-w-500" href="../template/product.html">Men Cotton Blend Blue T-Shirt</a>
                                                                    <div class="qty-box">
                                                                        <div class="input-group"> <span class="input-group-prepend">
                                            <button class="btn quantity-left-minus" type="button" data-type="minus" data-field="">- </button></span>
                                                                            <input class="form-control input-number" type="text" name="quantity" value="1"><span class="input-group-prepend">
                                            <button class="btn quantity-right-plus" type="button" data-type="plus" data-field="">+</button></span>
                                                                        </div>
                                                                    </div>
                                                                    <h6 class="font-primary">$695.00</h6>
                                                                </div>
                                                                <div class="close-circle"><a class="bg-danger" href="#"><i data-feather="x"></i></a></div>
                                                            </div>
                                                        </li>
                                                        <li class="mb-3 total"><a href="../template/checkout.html">
                                                                <h6 class="mb-0">
                                                                    Order Total :<span class="f-right">$1195.00  </span></h6></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card-footer pb-0 pr-0 pl-0">
                                                <div class="text-center"> <a class="f-w-700" href="private-chat.html">
                                                        <button class="btn btn-primary" type="button" title="btn btn-primary">Check all</button></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="profile-nav onhover-dropdown">
                        <div class="media profile-media"><img class="b-r-10" src="{{asset('../assets/images/dashboard/profile.png')}}" alt="">
                            <div class="media-body d-xxl-block d-none box-col-none">
                                <div class="d-flex align-items-center gap-2"> <span>Alex Mora </span><i class="middle fa fa-angle-down"> </i></div>
                                <p class="mb-0 font-roboto">Admin</p>
                            </div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div">
                            <li><a href="user-profile.html"><i data-feather="user"></i><span>My Profile</span></a></li>
                            <li><a href="letter-box.html"><i data-feather="mail"></i><span>Inbox</span></a></li>
                            <li> <a href="edit-profile.html"> <i data-feather="settings"></i><span>Settings</span></a></li>
                            <li><a class="btn btn-pill btn-outline-primary btn-sm" href="{{ __('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit()">Log Out</a>
                                <form id="logout-form" action="{{route('logout')}}" method="post">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <script class="result-template" type="text/x-handlebars-template">
                <div class="ProfileCard u-cf">
                    <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
                    <div class="ProfileCard-details">
                        <div class="ProfileCard-realName">LL</div>
                    </div>
                </div>
            </script>
            <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
        </div>
    </div>
    <!-- Page Header Ends                              -->

    <!-- Page Body Start-->
    <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper" data-layout="stroke-svg">
            <div class="logo-wrapper"><a href="index.html"><img class="img-fluid" src="{{asset('../assets/images/logo/logo.png')}}" alt=""></a>
                <div class="back-btn"><i class="fa fa-angle-left"> </i></div>
                <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="{{asset('../assets/images/logo/logo-icon.png')}}" alt=""></a></div>
            <nav class="sidebar-main">
                <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                <div id="sidebar-menu">
                    <ul class="sidebar-links" id="simple-bar">
                        <li class="back-btn"><a href="index.html"><img class="img-fluid" src="{{asset('../assets/images/logo/logo-icon.png')}}" alt=""></a>
                            <div class="mobile-back text-end"> <span>Back </span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                        </li>
{{--                        <li class="pin-title sidebar-main-title">--}}
{{--                            <div>--}}
{{--                                <h6>Pinned</h6>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-main-title">--}}
{{--                            <div>--}}
{{--                                <h6 class="lan-1">General</h6>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"> </i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-home')}}"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#fill-home')}}"></use>--}}
{{--                                </svg><span class="lan-3">Dashboard          </span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li><a href="index.html">Default</a></li>--}}
{{--                                <li><a href="dashboard-02.html">Ecommerce</a></li>--}}
{{--                                <li><a href="dashboard-03.html">Project</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-widget')}}"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#fill-widget')}}"></use>--}}
{{--                                </svg><span class="lan-6">Widgets</span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li><a href="general-widget.html">General</a></li>--}}
{{--                                <li><a href="chart-widget.html">Chart</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-layout')}}"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#fill-layout')}}"></use>--}}
{{--                                </svg><span class="lan-7">Page layout</span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li><a href="box-layout.html">Boxed</a></li>--}}
{{--                                <li><a href="layout-rtl.html">RTL</a></li>--}}
{{--                                <li><a href="layout-dark.html">Dark Layout</a></li>--}}
{{--                                <li> <a href="hide-on-scroll.html">Hide Nav Scroll</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-main-title">--}}
{{--                            <div>--}}
{{--                                <h6 class="lan-8">Applications</h6>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-project')}}"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#fill-project')}}"></use>--}}
{{--                                </svg><span>Project           </span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li><a href="projects.html">Project List</a></li>--}}
{{--                                <li><a href="projectcreate.html">Create new</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="file-manager.html">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-file')}}"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#fill-file')}}"></use>--}}
{{--                                </svg><span>File manager</span></a></li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="kanban.html">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-board')}}"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#fill-board')}}"></use>--}}
{{--                                </svg><span>kanban Board</span></a></li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-ecommerce')}}"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#fill-ecommerce')}}"></use>--}}
{{--                                </svg><span>Ecommerce</span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li> <a href="add-products.html">Add Products</a></li>--}}
{{--                                <li><a href="product.html">Product</a></li>--}}
{{--                                <li><a href="category.html">Category page</a></li>--}}
{{--                                <li><a href="product-page.html">Product page</a></li>--}}
{{--                                <li><a href="list-products.html">Product list</a></li>--}}
{{--                                <li><a href="payment-details.html">Payment Details</a></li>--}}
{{--                                <li><a href="order-history.html">Order History</a></li>--}}
{{--                                <li><a class="submenu-title" href="#">Invoices<span class="sub-arrow"><i class="fa fa-angle-right"></i></span></a>--}}
{{--                                    <ul class="nav-sub-childmenu submenu-content">--}}
{{--                                        <li><a href="invoice-1.html">Invoice-1</a></li>--}}
{{--                                        <li><a href="invoice-2.html">Invoice-2</a></li>--}}
{{--                                        <li><a href="invoice-3.html">Invoice-3</a></li>--}}
{{--                                        <li><a href="invoice-4.html">Invoice-4</a></li>--}}
{{--                                        <li><a href="invoice-5.html">Invoice-5</a></li>--}}
{{--                                        <li><a href="invoice-template.html">Invoice-6</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li><a href="cart.html">Cart</a></li>--}}
{{--                                <li><a href="list-wish.html">Wishlist</a></li>--}}
{{--                                <li><a href="checkout.html">Checkout</a></li>--}}
{{--                                <li><a href="pricing.html">Pricing      </a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="letter-box.html">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-email')}}"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#fill-email')}}"></use>--}}
{{--                                </svg><span>Letter Box   </span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li><a href="email-application.html">Email App</a></li>--}}
{{--                                <li><a href="email-compose.html">Email Compose</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-chat')}}"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#fill-chat')}}"></use>--}}
{{--                                </svg><span>Chat</span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li><a href="private-chat.html">Private Chat</a></li>--}}
{{--                                <li> <a href="group-chat.html">Group Chat</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"> <i class="fa fa-thumb-tack"> </i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-user')}}"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#fill-user')}}"></use>--}}
{{--                                </svg><span>Users</span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li><a href="user-profile.html">Users Profile</a></li>--}}
{{--                                <li><a href="edit-profile.html">Users Edit</a></li>--}}
{{--                                <li><a href="user-cards.html">Users Cards</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="bookmark.html">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-bookmark')}}"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#fill-bookmark')}}"> </use>--}}
{{--                                </svg><span>Bookmarks</span></a></li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="contacts.html">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-contact')}}"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#fill-contact')}}"> </use>--}}
{{--                                </svg><span>Contacts</span></a></li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="task.html">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-task')}}"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#fill-task')}}"> </use>--}}
{{--                                </svg><span>Tasks</span></a></li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="calendar-basic.html">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-calendar')}}"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#fill-calender')}}"></use>--}}
{{--                                </svg><span>Calendar</span></a></li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="social-app.html">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-social')}}"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="{{asset('../assets/svg/icon-sprite.svg#fill-social')}}"> </use>--}}
{{--                                </svg><span>Social App</span></a></li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="to-do.html">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-to-do"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-to-do"> </use>--}}
{{--                                </svg><span>To-Do</span></a></li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="search.html">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-search"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-search"> </use>--}}
{{--                                </svg><span>Search Result</span></a></li>--}}
{{--                        <li class="sidebar-main-title">--}}
{{--                            <div>--}}
{{--                                <h6>Forms & Table</h6>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-form"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-form"> </use>--}}
{{--                                </svg><span>Forms</span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li> <a class="submenu-title" href="#">Form Controls <span class="sub-arrow"> <i class="fa fa-angle-right"></i></span></a>--}}
{{--                                    <ul class="nav-sub-childmenu submenu-content">--}}
{{--                                        <li><a href="form-validation.html">Form Validation</a></li>--}}
{{--                                        <li><a href="base-input.html">Base Inputs</a></li>--}}
{{--                                        <li><a href="radio-checkbox-control.html">Checkbox & Radio</a></li>--}}
{{--                                        <li><a href="input-group.html">Input Groups</a></li>--}}
{{--                                        <li> <a href="input-mask.html">Input Mask</a></li>--}}
{{--                                        <li><a href="megaoptions.html">Mega Options</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li><a class="submenu-title" href="#">--}}
{{--                                        Form Widgets<span class="sub-arrow"><i class="fa fa-angle-right"></i></span></a>--}}
{{--                                    <ul class="nav-sub-childmenu submenu-content">--}}
{{--                                        <li><a href="datepicker.html">Datepicker</a></li>--}}
{{--                                        <li><a href="touchspin.html">Touchspin</a></li>--}}
{{--                                        <li><a href="select2.html">Select2</a></li>--}}
{{--                                        <li><a href="switch.html">Switch</a></li>--}}
{{--                                        <li><a href="typeahead.html">Typeahead</a></li>--}}
{{--                                        <li><a href="clipboard.html">Clipboard</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li><a class="submenu-title" href="#">Form layout<span class="sub-arrow"><i class="fa fa-angle-right"></i></span></a>--}}
{{--                                    <ul class="nav-sub-childmenu submenu-content">--}}
{{--                                        <li><a href="form-wizard.html">Form Wizard 1</a></li>--}}
{{--                                        <li><a href="form-wizard-two.html">Form Wizard 2</a></li>--}}
{{--                                        <li><a href="two-factor.html">Two Factor</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-table"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-table"></use>--}}
{{--                                </svg><span>Tables</span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li><a class="submenu-title" href="#">Bootstrap Tables<span class="sub-arrow"><i class="fa fa-angle-right"></i></span></a>--}}
{{--                                    <ul class="nav-sub-childmenu submenu-content">--}}
{{--                                        <li><a href="bootstrap-basic-table.html">Basic Tables</a></li>--}}
{{--                                        <li><a href="table-components.html">Table components</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li><a class="submenu-title" href="#">Data Tables<span class="sub-arrow"><i class="fa fa-angle-right"></i></span></a>--}}
{{--                                    <ul class="nav-sub-childmenu submenu-content">--}}
{{--                                        <li><a href="datatable-basic-init.html">Basic Init</a></li>--}}
{{--                                        <li> <a href="datatable-advance.html">Advance Init </a></li>--}}
{{--                                        <li> <a href="datatable-API.html">API </a></li>--}}
{{--                                        <li><a href="datatable-data-source.html">Data Sources</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li><a href="datatable-ext-autofill.html">Ex. Data Tables</a></li>--}}
{{--                                <li><a href="jsgrid-table.html">Js Grid Table        </a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-main-title">--}}
{{--                            <div>--}}
{{--                                <h6>Components</h6>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-ui-kits"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-ui-kits"></use>--}}
{{--                                </svg><span>Ui Kits</span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li><a href="typography.html">Typography</a></li>--}}
{{--                                <li><a href="avatars.html">Avatars</a></li>--}}
{{--                                <li><a href="helper-classes.html">helper classes</a></li>--}}
{{--                                <li><a href="grid.html">Grid</a></li>--}}
{{--                                <li><a href="tag-pills.html">Tag & pills</a></li>--}}
{{--                                <li><a href="progress-bar.html">Progress</a></li>--}}
{{--                                <li><a href="modal.html">Modal</a></li>--}}
{{--                                <li><a href="alert.html">Alert</a></li>--}}
{{--                                <li><a href="popover.html">Popover</a></li>--}}
{{--                                <li><a href="tooltip.html">Tooltip</a></li>--}}
{{--                                <li><a href="dropdown.html">Dropdown</a></li>--}}
{{--                                <li><a href="according.html">Accordion</a></li>--}}
{{--                                <li><a href="tab-bootstrap.html">Tabs</a></li>--}}
{{--                                <li><a href="list.html">Lists</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-bonus-kit"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-bonus-kit"></use>--}}
{{--                                </svg><span>Bonus Ui</span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li><a href="scrollable.html">Scrollable</a></li>--}}
{{--                                <li><a href="tree.html">Tree view</a></li>--}}
{{--                                <li><a href="toasts.html">Toasts</a></li>--}}
{{--                                <li><a href="rating.html">Rating</a></li>--}}
{{--                                <li><a href="dropzone.html">dropzone</a></li>--}}
{{--                                <li><a href="tour.html">Tour</a></li>--}}
{{--                                <li><a href="sweet-alert2.html">SweetAlert2</a></li>--}}
{{--                                <li><a href="modal-animated.html">Animated Modal</a></li>--}}
{{--                                <li><a href="owl-carousel.html">Owl Carousel</a></li>--}}
{{--                                <li><a href="ribbons.html">Ribbons</a></li>--}}
{{--                                <li><a href="pagination.html">Pagination</a></li>--}}
{{--                                <li><a href="breadcrumb.html">Breadcrumb</a></li>--}}
{{--                                <li><a href="range-slider.html">Range Slider</a></li>--}}
{{--                                <li><a href="image-cropper.html">Image cropper</a></li>--}}
{{--                                <li><a href="basic-card.html">Basic Card</a></li>--}}
{{--                                <li><a href="creative-card.html">Creative Card</a></li>--}}
{{--                                <li><a href="dragable-card.html">Draggable Card</a></li>--}}
{{--                                <li><a href="timeline-v-1.html">Timeline </a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-animation"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-animation"></use>--}}
{{--                                </svg><span>Animation</span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li><a href="animate.html">Animate</a></li>--}}
{{--                                <li><a href="scroll-reval.html">Scroll Reveal</a></li>--}}
{{--                                <li><a href="AOS.html">AOS animation</a></li>--}}
{{--                                <li><a href="tilt.html">Tilt Animation</a></li>--}}
{{--                                <li><a href="wow.html">Wow Animation</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-icons"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-icons"></use>--}}
{{--                                </svg><span>Icons</span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li><a href="flag-icon.html">Flag icon</a></li>--}}
{{--                                <li><a href="font-awesome.html">Fontawesome Icon</a></li>--}}
{{--                                <li><a href="ico-icon.html">Ico Icon</a></li>--}}
{{--                                <li><a href="themify-icon.html">Themify Icon</a></li>--}}
{{--                                <li><a href="feather-icon.html">Feather icon</a></li>--}}
{{--                                <li><a href="whether-icon.html">Whether Icon</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-button"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-botton"></use>--}}
{{--                                </svg><span>Buttons</span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li><a href="buttons.html">Default Style</a></li>--}}
{{--                                <li><a href="buttons-flat.html">Flat Style</a></li>--}}
{{--                                <li><a href="buttons-edge.html">Edge Style</a></li>--}}
{{--                                <li><a href="raised-button.html">Raised Style</a></li>--}}
{{--                                <li><a href="button-group.html">Button Group</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-charts"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-charts"></use>--}}
{{--                                </svg><span>Charts</span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li><a href="echarts.html">Echarts</a></li>--}}
{{--                                <li><a href="chart-apex.html">Apex Chart</a></li>--}}
{{--                                <li><a href="chart-google.html">Google Chart</a></li>--}}
{{--                                <li><a href="chart-sparkline.html">Sparkline chart</a></li>--}}
{{--                                <li><a href="chart-flot.html">Flot Chart</a></li>--}}
{{--                                <li><a href="chart-knob.html">Knob Chart</a></li>--}}
{{--                                <li><a href="chart-morris.html">Morris Chart</a></li>--}}
{{--                                <li><a href="chartjs.html">Chatjs Chart</a></li>--}}
{{--                                <li><a href="chartist.html">Chartist Chart</a></li>--}}
{{--                                <li><a href="chart-peity.html">Peity Chart</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-main-title">--}}
{{--                            <div>--}}
{{--                                <h6>Pages</h6>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="landing-page.html">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-landing-page"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-landing-page"></use>--}}
{{--                                </svg><span>Landing page</span></a></li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="sample-page.html">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-sample-page"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-sample-page"></use>--}}
{{--                                </svg><span>Sample page</span></a></li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="internationalization.html">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-internationalization"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-internationalization"></use>--}}
{{--                                </svg><span>Internationalization</span></a></li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="../starter-kit/index.html" target="_blank">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-starter-kit"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-starter-kit"></use>--}}
{{--                                </svg><span>Starter kit</span></a></li>--}}
{{--                        <li class="mega-menu sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-others"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-others"></use>--}}
{{--                                </svg><span>Others</span></a>--}}
{{--                            <div class="mega-menu-container menu-content">--}}
{{--                                <div class="container-fluid">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col mega-box">--}}
{{--                                            <div class="link-section">--}}
{{--                                                <div class="submenu-title">--}}
{{--                                                    <h5>Error Page</h5>--}}
{{--                                                </div>--}}
{{--                                                <ul class="submenu-content opensubmegamenu">--}}
{{--                                                    <li><a href="error-400.html">Error 400</a></li>--}}
{{--                                                    <li><a href="error-401.html">Error 401</a></li>--}}
{{--                                                    <li><a href="error-403.html">Error 403</a></li>--}}
{{--                                                    <li><a href="error-404.html">Error 404</a></li>--}}
{{--                                                    <li><a href="error-500.html">Error 500</a></li>--}}
{{--                                                    <li><a href="error-503.html">Error 503</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col mega-box">--}}
{{--                                            <div class="link-section">--}}
{{--                                                <div class="submenu-title">--}}
{{--                                                    <h5> Authentication</h5>--}}
{{--                                                </div>--}}
{{--                                                <ul class="submenu-content opensubmegamenu">--}}
{{--                                                    <li><a href="login.html" target="_blank">Login Simple</a></li>--}}
{{--                                                    <li><a href="login_one.html" target="_blank">Login bg image</a></li>--}}
{{--                                                    <li><a href="login_two.html" target="_blank">Login image two                      </a></li>--}}
{{--                                                    <li><a href="login-bs-validation.html" target="_blank">Login validation</a></li>--}}
{{--                                                    <li><a href="login-bs-tt-validation.html" target="_blank">Login tooltip</a></li>--}}
{{--                                                    <li><a href="login-sa-validation.html" target="_blank">Login sweetalert</a></li>--}}
{{--                                                    <li><a href="sign-up.html" target="_blank">Register Simple</a></li>--}}
{{--                                                    <li><a href="sign-up-one.html" target="_blank">Register Bg-Image</a></li>--}}
{{--                                                    <li><a href="sign-up-two.html" target="_blank">Register two-image </a></li>--}}
{{--                                                    <li><a href="sign-up-wizard.html" target="_blank">Register wizard</a></li>--}}
{{--                                                    <li><a href="unlock.html">Unlock User</a></li>--}}
{{--                                                    <li><a href="forget-password.html">Forget Password</a></li>--}}
{{--                                                    <li><a href="reset-password.html">Reset Password</a></li>--}}
{{--                                                    <li><a href="maintenance.html">Maintenance</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col mega-box">--}}
{{--                                            <div class="link-section">--}}
{{--                                                <div class="submenu-title">--}}
{{--                                                    <h5>Coming Soon</h5>--}}
{{--                                                </div>--}}
{{--                                                <ul class="submenu-content opensubmegamenu">--}}
{{--                                                    <li><a href="comingsoon.html">Coming Simple</a></li>--}}
{{--                                                    <li><a href="comingsoon-bg-video.html">Coming with Bg video</a></li>--}}
{{--                                                    <li><a href="comingsoon-bg-img.html">Coming with Bg Image</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col mega-box">--}}
{{--                                            <div class="link-section">--}}
{{--                                                <div class="submenu-title">--}}
{{--                                                    <h5>Email templates</h5>--}}
{{--                                                </div>--}}
{{--                                                <ul class="submenu-content opensubmegamenu">--}}
{{--                                                    <li><a href="basic-template.html">Basic Email</a></li>--}}
{{--                                                    <li><a href="email-header.html">Basic With Header</a></li>--}}
{{--                                                    <li><a href="template-email.html">Ecomerce Tem...</a></li>--}}
{{--                                                    <li><a href="template-email-2.html">Email Template 2</a></li>--}}
{{--                                                    <li><a href="ecommerce-templates.html">Ecommerce Email</a></li>--}}
{{--                                                    <li><a href="email-order-success.html">Order Success</a></li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-main-title">--}}
{{--                            <div>--}}
{{--                                <h6>Miscellaneous</h6>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-gallery"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-gallery"></use>--}}
{{--                                </svg><span>Gallery</span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li><a href="gallery.html">Gallery Grid</a></li>--}}
{{--                                <li><a href="gallery-with-description.html">Gallery Grid Desc</a></li>--}}
{{--                                <li><a href="gallery-masonry.html">Masonry Gallery</a></li>--}}
{{--                                <li><a href="masonry-gallery-with-disc.html">Masonry with Desc</a></li>--}}
{{--                                <li><a href="gallery-hover.html">Hover Effects</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-blog"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-blog"></use>--}}
{{--                                </svg><span>Blog</span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li><a href="blog.html">Blog Details</a></li>--}}
{{--                                <li><a href="blog-single.html">Blog Single</a></li>--}}
{{--                                <li><a href="add-post.html">Add Post</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="faq.html">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-faq"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-faq"></use>--}}
{{--                                </svg><span>FAQ</span></a></li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-job-search"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-job-search"></use>--}}
{{--                                </svg><span>Job Search</span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li><a href="job-cards-view.html">Cards view</a></li>--}}
{{--                                <li><a href="job-list-view.html">List View</a></li>--}}
{{--                                <li><a href="job-details.html">Job Details</a></li>--}}
{{--                                <li><a href="job-apply.html">Apply</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-learning"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-learning"></use>--}}
{{--                                </svg><span>Learning</span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li><a href="learning-list-view.html">Learning List</a></li>--}}
{{--                                <li><a href="learning-detailed.html">Detailed Course</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-maps"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-maps"></use>--}}
{{--                                </svg><span>Maps</span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li><a href="map-js.html">Maps JS</a></li>--}}
{{--                                <li><a href="vector-map.html">Vector Maps</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title" href="#">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-editors"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-editors"></use>--}}
{{--                                </svg><span>Editors</span></a>--}}
{{--                            <ul class="sidebar-submenu">--}}
{{--                                <li><a href="quilleditor.html">Quill editor</a></li>--}}
{{--                                <li><a href="ace-code-editor.html">ACE code editor  </a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="sidebar-list"> <i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="knowledgebase.html">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-knowledgebase"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-knowledgebase"></use>--}}
{{--                                </svg><span>Knowledgebase</span></a></li>--}}
{{--                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="support-ticket.html">--}}
{{--                                <svg class="stroke-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#stroke-support-tickets"></use>--}}
{{--                                </svg>--}}
{{--                                <svg class="fill-icon">--}}
{{--                                    <use href="../assets/svg/icon-sprite.svg#fill-support-tickets"></use>--}}
{{--                                </svg><span>Support Ticket</span></a></li>--}}
                        @if(auth()->user()->is_admin == 0)


                        <li class="sidebar-main-title">
                            <div>
                                <h6>Panel Trenera</h6>
                            </div>
                        </li>

                        <li class="sidebar-list"><i class="fa fa-thumb-tack"> </i><a class="sidebar-link sidebar-title link-nav" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-home')}}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{asset('../assets/svg/icon-sprite.svg#fill-home')}}"></use>
                                </svg><span>Strona główna</span></a>
                        </li>
                        <li class="sidebar-list"> <i class="fa fa-thumb-tack"> </i><a class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-user')}}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{asset('../assets/svg/icon-sprite.svg#fill-user')}}"></use>
                                </svg><span>Zarządzanie uczniami</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{route('athletes.index')}}">Lista uczniów</a></li>
                                <li><a href="{{route('athletes.create')}}">Dodaj ucznia</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list"> <i class="fa fa-thumb-tack"> </i><a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-user')}}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{asset('../assets/svg/icon-sprite.svg#fill-school')}}"></use>
                            </svg><span>Zarządzanie szkołami</span></a>
                            <ul class="sidebar-submenu">
                                
                                <li><a href="{{route('schools.coach', Auth::user()->coach_id) }}">Twoje szkoły</a></li>
                                <li><a href="{{route('schools.create')}}">Dodaj szkołę</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list"> <i class="fa fa-thumb-tack"> </i><a class="sidebar-link sidebar-title" href="#">
                                <svg class="stroke-icon">
                                    <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-charts')}}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{asset('../assets/svg/icon-sprite.svg#fill-charts')}}"></use>
                                </svg><span>Zarządzanie treningami</span></a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{route('practices.index')}}">Lista treningów</a></li>
                                <li><a href="{{route('practices.create')}}">Dodaj trening</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="support-ticket.html">
                                <svg class="stroke-icon">
                                    <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-chat')}}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{asset('../assets/svg/icon-sprite.svg#fill-chat')}}"></use>
                                </svg><span>Wiadomości</span></a></li>
                        @endif
                        @if(auth()->user()->is_admin == 1)
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Panel Admina</h6>
                        </div>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"> </i><a class="sidebar-link sidebar-title link-nav" href="#">
                            <svg class="stroke-icon">
                                <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-home')}}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{asset('../assets/svg/icon-sprite.svg#fill-home')}}"></use>
                            </svg><span>Strona główna</span></a>
                    </li>
                    <li class="sidebar-list"> <i class="fa fa-thumb-tack"> </i><a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-user')}}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{asset('../assets/svg/icon-sprite.svg#fill-user')}}"></use>
                            </svg><span>Zarządzanie Trenerami</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="{{route('coaches.index')}}">Lista aktywnych trenerów</a></li>
                            <li><a href="{{route('coaches.inactives')}}">Aktywuj trenera</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"> <i class="fa fa-thumb-tack"> </i><a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-charts')}}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{asset('../assets/svg/icon-sprite.svg#fill-charts')}}"></use>
                            </svg><span>Raporty</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="user-profile.html">Raporty per szkoła</a></li>
                            <li><a href="edit-profile.html">Raporty ogólne</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="support-ticket.html">
                            <svg class="stroke-icon">
                                <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-chat')}}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{asset('../assets/svg/icon-sprite.svg#fill-chat')}}"></use>
                            </svg><span>Wiadomości</span></a>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="{{route('hours.index')}}">
                            <svg class="stroke-icon">
                                <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-faq')}}"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="{{asset('../assets/svg/icon-sprite.svg#fill-faq')}}"></use>
                            </svg><span>Stawka godzinowa</span></a>
                    </li>
                        <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title link-nav" href="{{route('editions.index')}}">
                                <svg class="stroke-icon">
                                    <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-faq')}}"></use>
                                </svg>
                                <svg class="fill-icon">
                                    <use href="{{asset('../assets/svg/icon-sprite.svg#fill-faq')}}"></use>
                                </svg><span>Edycje</span></a>
                        </li>
                        @endif

                    </ul>
                    <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                </div>
            </nav>
        </div>
        <!-- Page Sidebar Ends-->

        @yield('content')

    </div>


        <!-- footer start-->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 footer-copyright text-center">
                        <p class="mb-0"> Oprogramowanie wytworzone przez Centralę Handlu Zagranicznego VALEZA </br> Wszelkie prawa zastrzeżone </p>
                    </div>
                </div>
            </div>
        </footer>
    </div>

<!-- latest jquery-->
<script src="{{asset('../assets/js/jquery.min.js')}}"></script>
<!-- Bootstrap js-->
<script src="{{asset('../assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>
<!-- feather icon js-->
<script src="{{asset('../assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('../assets/js/icons/feather-icon/feather-icon.js')}}"></script>
<!-- scrollbar js-->
<script src="{{asset('../assets/js/scrollbar/simplebar.js')}}"></script>
<script src="{{asset('../assets/js/scrollbar/custom.js')}}"></script>
<!-- Sidebar jquery-->
<script src="{{asset('../assets/js/config.js')}}"></script>
<!-- Plugins JS start-->
<script src="{{asset('../assets/js/sidebar-menu.js')}}"></script>
<script src="{{asset('../assets/js/sidebar-pin.js')}}"></script>
<script src="{{asset('../assets/js/slick/slick.min.js')}}"></script>
<script src="{{asset('../assets/js/slick/slick.js')}}"></script>
<script src="{{asset('../assets/js/header-slick.js')}}"></script>
<script src="{{asset('../assets/js/chart/apex-chart/apex-chart.js')}}"></script>
<script src="{{asset('../assets/js/chart/apex-chart/stock-prices.js')}}"></script>
<script src="{{asset('../assets/js/chart/apex-chart/moment.min.js')}}"></script>
<script src="{{asset('../assets/js/chart/echart/esl.js')}}"></script>
<script src="{{asset('../assets/js/chart/echart/config.js')}}"></script>
<script src="{{asset('../assets/js/chart/echart/pie-chart/facePrint.js')}}"></script>
<script src="{{asset('../assets/js/chart/echart/pie-chart/testHelper.js')}}"></script>
<script src="{{asset('../assets/js/chart/echart/pie-chart/custom-transition-texture.js')}}"></script>
<script src="{{asset('../assets/js/chart/echart/data/symbols.js')}}"></script>
<!-- calendar js-->
<script src="{{asset('../assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('../assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('../assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
<script src="{{asset('../assets/js/dashboard/dashboard_3.js')}}"></script>
<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{asset('../assets/js/script.js')}}"></script>
{{--<script src="{{asset('../assets/js/theme-customizer/customizer.js')}}"></script>--}}
</body>
</html>
