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
    @push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endpush
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
                    
                    
                  
                    <li class="profile-nav onhover-dropdown">
                        <div class="media profile-media"><img class="b-r-10" src="{{asset('../assets/images/dashboard/logopzzmale.jpg')}}" alt="">
                            
                            <div class="media-body d-xxl-block d-none box-col-none">
                                <div class="d-flex align-items-center gap-2"> <span>{{Auth::user()->name}}</span><i class="middle fa fa-angle-down"> </i></div>
                                <p class="mb-0 font-roboto">Ustawienia</p>
                            </div>
                        </div>
                        <ul class="profile-dropdown onhover-show-div">
                            @if(Auth::user()->coach_id != null)
                            <li><a href="{{route('coaches.edit', ['id' => Auth::user()->coach->id])}}"><i data-feather="user"></i><span>Profil</span></a></li>
                            @endif  
                            <li><a class="btn btn-pill btn-outline-primary btn-sm" href="{{ __('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit()">Wyloguj</a>
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
{           
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
                        @if(auth()->user()->coach_id != null)
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
                                
                                <li><a href="{{route('schools.coach', ['id' => Auth::user()->coach_id]) }}">Twoje szkoły</a></li>
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
                    <li class="sidebar-list"> <i class="fa fa-thumb-tack"> </i><a class="sidebar-link sidebar-title" href="#">
                        <svg class="stroke-icon">
                            <use href="{{asset('../assets/svg/icon-sprite.svg#stroke-charts')}}"></use>
                        </svg>
                        <svg class="fill-icon">
                            <use href="{{asset('../assets/svg/icon-sprite.svg#fill-faq')}}"></use>
                        </svg><span>Kalendarz</span></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{route('editions.index')}}">Edycje</a></li>
                        <li><a href="{{route('stages.index')}}">Etapy</a></li>
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
    @stack('scripts')
    @stack('styles')
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

