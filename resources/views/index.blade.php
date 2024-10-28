@extends('layouts.template')
@section('content')

        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6">
                            <h4> Witaj{{Auth::user()->name}} </h4>
@if(!Auth::user()->is_admin)
    @if(Auth::user()->coach_id == null)
        Profil trenera nie został uzupełniony - przejdź tutaj = <a href="{{route('coaches.create')}}"> o tutaj</a>
    @endif
  
    @if(!\App\Models\Coach::where('id', Auth::user()->coach_id)->get()->isEmpty())
        @if(\App\Models\Coach::where('id', Auth::user()->coach_id)->get()[0]->schools->isEmpty())
            Nie uzupełniono danych szkoły - przejdź tutaj = <a href="{{route('schools.create')}}"> o tutaj</a>
        @else
        gra
        @endif
    @endif
    @endif
    @dump($chartData, $inactiveCoaches, $totalAthletes)

                        </div>
                        <div class="col-6">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">
                                        <svg class="stroke-icon">
                                            <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                        </svg></a></li>
                                <li class="breadcrumb-item">Dashboard</li>
                                <li class="breadcrumb-item active">Default</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
            <div class="container-fluid">
                <div class="row size-column">
                    <div class="col-xl-8 col-md-12 box-col-12">
                        <div class="card">
                            <div class="card-header sales-chart card-no-border">
                                <h4>Revenue Growth  </h4>
                                <div class="sales-chart-dropdown">
                                    <ul class="balance-data">
                                        <li> <span class="circle bg-warning"> </span><span class="ms-1 f-w-400">Marketing Sale </span></li>
                                        <li>  <span class="circle bg-primary"> </span><span class="ms-1 f-w-400">Online Sale</span></li>
                                    </ul>
                                    <div class="sales-chart-dropdown-select">
                                        <div class="card-header-right-icon online-store">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle dropdown-toggle-store" id="dropdownMenuButtonToggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">This Year</button>
                                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButtonToggle"><span class="dropdown-item">Last Month</span><span class="dropdown-item">Last Week</span><span class="dropdown-item">Today   </span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-xxl-8 col-xl-12">
                                        <div class="revenuegrowth">
                                            <div class="revenuegrowth-chart" id="revenuegrowth"></div>
                                        </div>
                                    </div>
                                    <div class="col-xxl-4 col-xl-4 d-xxl-block d-none ">
                                        <div class="revenuegrowth-details">
                                            <div class="growth-details"><span class="f-light f-12  text-uppercase">Total Sales</span>
                                                <h4 class="f-w-500 mb-2">$56.265.08 </h4>
                                                <div class="d-flex justify-content-center align-items-center gap-2 mb-4">
                                                    <p class="mb-0 f-w-500 f-12">Compared to  </p><span class="f-light f-12 f-w-500 ">(+40.15% than)</span>
                                                    <p class="mb-0 f-w-500 f-12">last year </p>
                                                </div>
                                            </div>
                                            <div class="growth-details"><span class="f-light f-12  text-uppercase">Total Purchase </span>
                                                <h4 class="f-w-500 mb-2">$42,256.26  </h4>
                                                <div class="d-flex justify-content-center align-items-center gap-2 mb-4">
                                                    <p class="mb-0 f-w-500 f-12">Compared to </p><span class="txt-secondary f-12 f-w-500">(-20.25% than) </span>
                                                    <p class="mb-0 f-w-500 f-12">last year  </p>
                                                </div>
                                            </div>
                                            <div class="growth-details"> <span class="f-light f-12  text-uppercase">Total Returns</span>
                                                <h4 class="f-w-500 mb-2">$5,215.62  </h4>
                                                <div class="d-flex justify-content-center align-items-center gap-2">
                                                    <p class="mb-0 f-w-500 f-12">Compared to </p><span class=" f-w-500 f-light f-12">(+18.15% than)  </span>
                                                    <p class="mb-0 f-w-500 f-12">last year </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 box-col-none">
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <div class="card boost-up-card overflow-hidden">
                                    <div class="p-4">
                                        <div class="boostup-name row">
                                            <h6 class="text-white f-28 f-w-700 mb-2 z-1 ">Boost up your sale</h6>
                                            <p class="text-white f-14 f-w-500 col-9 line-clamp">
                                                by upgrading your account you can increase your sale by 30% more.</p>
                                        </div>
                                        <div class="img-boostup"><img class="img-boostup-img-1" src="../assets/images/dashboard-3/boostup1.png" alt="boostup"><img class="img-boostup-img-2" src="../assets/images/dashboard-3/boostup2.png" alt="boostup"></div>
                                        <div class="btn-showcase text-start"> <a href="pricing.html">
                                                <button class="btn btn-pill btn-outline-light-2x b-r-8" type="button">Upgrade Now</button></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6">
                                <div class="card">
                                    <div class="card-header card-no-border total-revenue pb-0">
                                        <h4>Deliveries</h4>
                                        <div class="icon-menu-header">
                                            <svg>
                                                <use href="../assets/svg/icon-sprite.svg#more-horizontal"></use>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="table-responsive custom-scrollbar deliveries-percentage">
                                            <table class="percentage-data w-100">
                                                <thead>
                                                <tr>
                                                    <th class="f-light f-12 f-w-500" scope="col">Particular</th>
                                                    <th class="f-light f-12 f-w-500" scope="col">Percentage</th>
                                                    <th class="f-light f-12 f-w-500 text-end" scope="col">Total Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td class="f-w-400 f-10"> <a class="line-clamp" href="cart.html">On Time Delivery</a></td>
                                                    <td>
                                                        <div class="progress-value d-flex gap-2 align-items-center">
                                                            <div class="progress">
                                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 75%  " aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div><span>80%</span>
                                                        </div>
                                                    </td>
                                                    <td class="f-w-500 f-10 text-end">$45,452.23</td>
                                                </tr>
                                                <tr>
                                                    <td class="f-w-400 f-10"> <a class="line-clamp" href="cart.html">Delayed Delivery</a></td>
                                                    <td>
                                                        <div class="progress-value d-flex gap-2 align-items-center">
                                                            <div class="progress">
                                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div><span>15% </span>
                                                        </div>
                                                    </td>
                                                    <td class="f-w-500 f-10 text-end">$15,256.23</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-md-6 box-col-6">
                        <div class="card height-equal">
                            <div class="card-header card-no-border total-revenue">
                                <h4>Top Product </h4><a href="product.html">View All  </a>
                            </div>
                            <div class="card-body pt-0">
                                <div class="top-product-card">
                                    <ul>
                                        <li class="d-flex top-product gap-2">
                                            <div><img class="img-fluid product-img" src="../assets/images/dashboard-3/product/1.png" alt="product"/></div>
                                            <div class="w-100 d-flex justify-content-between align-items-center">
                                                <div class="product-details">
                                                    <div><span class="badge rounded-pill badge-light text-dark">SKU90400</span></div><a class="f-10 f-w-500  line-clamp" href="product.html">Huawai Smart Watch</a><span class="f-10 f-w-500 txt-primary">$39.02</span>
                                                </div>
                                                <div class="product-items">
                                                    <div class="common-space gap-1"><span class="f-10 f-w-500 f-light">QTY :</span><span class="f-10 f-w-500">12</span></div>
                                                    <div class="common-space gap-1"><span class="f-10 f-w-500 f-light">Revenue : </span><span class="f-10 f-w-500  ">$51</span></div>
                                                    <div class="common-space gap-1"><span class="f-10 f-w-500 f-light">Profit :</span><span class="f-10 f-w-500 ">$15</span></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex top-product gap-2">
                                            <div><img class="img-fluid product-img" src="../assets/images/dashboard-3/product/2.png" alt="product"/></div>
                                            <div class="w-100 d-flex justify-content-between align-items-center">
                                                <div class="product-details">
                                                    <div><span class="badge rounded-pill badge-light text-dark">SKU78589</span></div><a class="f-10 f-w-500  line-clamp" href="product.html">Noise - Wireless Headphone</a><span class="f-10 f-w-500 txt-primary">$45.26</span>
                                                </div>
                                                <div class="product-items">
                                                    <div class="common-space gap-1"><span class="f-10 f-w-500 f-light">QTY :</span><span class="f-10 f-w-500">19</span></div>
                                                    <div class="common-space gap-1"><span class="f-10 f-w-500 f-light">Revenue : </span><span class="f-10 f-w-500  ">$8</span></div>
                                                    <div class="common-space gap-1"><span class="f-10 f-w-500 f-light">Profit :</span><span class="f-10 f-w-500 "> $9</span></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex top-product gap-2">
                                            <div><img class="img-fluid product-img" src="../assets/images/dashboard-3/product/3.png" alt="product"/></div>
                                            <div class="w-100 d-flex justify-content-between align-items-center">
                                                <div class="product-details">
                                                    <div><span class="badge rounded-pill badge-light text-dark">SKU78599</span></div><a class="f-10 f-w-500  line-clamp" href="product.html">Men &amp; Women Footwear</a><span class="f-10 f-w-500 txt-primary">$45.62</span>
                                                </div>
                                                <div class="product-items">
                                                    <div class="common-space gap-1"><span class="f-10 f-w-500 f-light">QTY : </span><span class="f-10 f-w-500">9</span></div>
                                                    <div class="common-space gap-1"><span class="f-10 f-w-500 f-light">Revenue :</span><span class="f-10 f-w-500  "> $15</span></div>
                                                    <div class="common-space gap-1"><span class="f-10 f-w-500 f-light">Profit : </span><span class="f-10 f-w-500 ">$18</span></div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="d-flex top-product gap-2">
                                            <div><img class="img-fluid product-img" src="../assets/images/dashboard-3/product/4.png" alt="product"/></div>
                                            <div class="w-100 d-flex justify-content-between align-items-center">
                                                <div class="product-details">
                                                    <div><span class="badge rounded-pill badge-light text-dark">SKU78596</span></div><a class="f-10 f-w-500  line-clamp" href="product.html">Anime White Half Sleev T-shirt</a><span class="f-10 f-w-500 txt-primary">$589.26</span>
                                                </div>
                                                <div class="product-items">
                                                    <div class="common-space gap-1"><span class="f-10 f-w-500 f-light">QTY :</span><span class="f-10 f-w-500">9</span></div>
                                                    <div class="common-space gap-1"><span class="f-10 f-w-500 f-light">Revenue : </span><span class="f-10 f-w-500  ">$7</span></div>
                                                    <div class="common-space gap-1"><span class="f-10 f-w-500 f-light">Profit :</span><span class="f-10 f-w-500 ">$42</span></div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-sm-6 box-col-6">
                        <div class="card height-equal">
                            <div class="card-header card-no-border total-revenue">
                                <h4>Nowi trenerzy </h4><a href="{{route('coaches.inactives')}}">Zobacz wszystkich</a>
                            </div>
                            <div class="card-body pt-0">
                                <div class="new-user">
                                    <ul>
                                    @if($inactiveCoaches->isEmpty())
                                        <li>
                                            <div class="space-common d-flex user-name">
                                                <div class="common-space w-100">
                                                    <div>
                                                        <h6 class="f-w-500 f-14">Brak</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @else
                                        @foreach ($inactiveCoaches as $coach)
                                            <li>
                                                <div class="space-common d-flex user-name"><img class="img-40 rounded-circle img-fluid me-2" src="../assets/images/user/22.png" alt="user"/>
                                                    <div class="common-space w-100">
                                                        <div>
                                                            <h6> <a class="f-w-500 f-14 " href="user-profile.html">{{$coach->name}} {{$coach->last_name}}</a></h6>
                                                            <span class="f-light f-w-500 f-12">{{$coach->licence}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-sm-6 box-col-6">
                        <div class="card height-equal">
                            <div class="card-header card-no-border total-revenue pb-0">
                                <h4>Team Activity </h4><a href="product.html">View All </a>
                            </div>
                            <div class="card-body pt-0">
                                <div class="activity-table table-responsive custom-scrollbar">
                                    <table class="order-table overflow-hidden project-table w-100 activity-log">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="team-activity">
                                                    <div class="activity-data d-flex align-items-center gap-3">
                                                        <div class="common-space gap-2 ">
                                                            <div class="user-activity me-3"><img class="rounded-circle p-1 img-fluid me-3 img-50" src="../assets/images/user/50.png" alt="user"><a class="f-10 f-w-500 username" href="edit-profile.html">Floyd Miles</a></div>
                                                            <div class="activity-time"><span class="f-light f-w-500 f-10">5 min ago</span></div>
                                                        </div>
                                                        <div class="subtitle">
                                                            <p class="f-w-400 f-10">Floyd has moved to the warehouse.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="team-activity">
                                                    <div class="activity-data d-flex align-items-center gap-3">
                                                        <div class="common-space gap-2 ">
                                                            <div class="user-activity me-3"><img class="rounded-circle p-1 img-fluid me-3 img-50" src="../assets/images/user/51.png" alt="user"><a class="f-10 f-w-500 username" href="edit-profile.html">Ralph Edwards</a></div>
                                                            <div class="activity-time"><span class="f-light f-w-500 f-10">6 min ago</span></div>
                                                        </div>
                                                        <div class="subtitle">
                                                            <p class="f-w-400 f-10">Ralph has solved Mr.williams project.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="team-activity">
                                                    <div class="activity-data d-flex align-items-center gap-3">
                                                        <div class="common-space gap-2 ">
                                                            <div class="user-activity me-3"><img class="rounded-circle p-1 img-fluid me-3 img-50" src="../assets/images/user/33.png" alt="user"><a class="f-10 f-w-500 username" href="edit-profile.html">Esther Howard</a></div>
                                                            <div class="activity-time"><span class="f-light f-w-500 f-10">10 min ago</span></div>
                                                        </div>
                                                        <div class="subtitle">
                                                            <p class="f-w-400 f-10">Esther has changed his to active, now.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="team-activity">
                                                    <div class="activity-data d-flex align-items-center gap-3">
                                                        <div class="common-space gap-2 ">
                                                            <div class="user-activity me-3"><img class="rounded-circle p-1 img-fluid me-3 img-50" src="../assets/images/user/52.png" alt="user"><a class="f-10 f-w-500 username" href="edit-profile.html">Jacob Jones</a></div>
                                                            <div class="activity-time"><span class="f-light f-w-500 f-10">11 min ago</span></div>
                                                        </div>
                                                        <div class="subtitle">
                                                            <p class="f-w-400 f-10">Jacob has make changes in sold it.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="team-activity">
                                                    <div class="activity-data d-flex align-items-center gap-3">
                                                        <div class="common-space gap-2 ">
                                                            <div class="user-activity me-3"><img class="rounded-circle p-1 img-fluid me-3 img-50" src="../assets/images/user/53.png" alt="user"><a class="f-10 f-w-500 username" href="edit-profile.html">Theresa Webb</a></div>
                                                            <div class="activity-time"><span class="f-light f-w-500 f-10">12 min ago</span></div>
                                                        </div>
                                                        <div class="subtitle">
                                                            <p class="f-w-400 f-10">Theresa has complete old task and  new one.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="team-activity">
                                                    <div class="activity-data d-flex align-items-center gap-3">
                                                        <div class="common-space gap-2 ">
                                                            <div class="user-activity me-3"><img class="rounded-circle p-1 img-fluid me-3 img-50" src="../assets/images/user/54.png" alt="user"><a class="f-10 f-w-500 username" href="edit-profile.html">Annette Black</a></div>
                                                            <div class="activity-time"><span class="f-light f-w-500 f-10">12 min ago</span></div>
                                                        </div>
                                                        <div class="subtitle">
                                                            <p class="f-w-400 f-10">Annette has send all the stock to department.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-4 col-xl-6 box-col-6">
                        <div class="card">
                            <div class="card-header card-no-border total-revenue pb-0">
                                <h4>User Visits by Day </h4>
                                <div class="sales-chart-dropdown">
                                    <ul class="balance-data">
                                        <li> <span class="circle bg-primary"></span><span class="f-light ms-1">Chrome </span></li>
                                        <li><span class="circle bg-primary-1"> </span><span class="f-light ms-1">Firefox </span></li>
                                        <li> <span class="circle bg-primary-2"> </span><span class="f-light ms-1">Safari</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body pt-0 pb-0">
                                <div class="user-visitsCharts">
                                    <div id="visitsCharts"> </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="common-space">
                                    <div><a class="f-w-600 f-14 " href="index.html">Most Visited Day</a><span class="f-light f-w-500 f-14 d-block">Total 59.6k visits on Sunday </span></div>
                                    <div class="visited-dropdown">
                                        <svg class="mb-0">
                                            <use href="../assets/svg/icon-sprite.svg#arrow-down"></use>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-5 col-xl-6 box-col-6">
                        <div class="card">
                            <div class="card-header card-no-border total-revenue">
                                <h4>Latest Transaction</h4><a href="product.html">View All</a>
                            </div>
                            <div class="card-body pt-0">
                                <div class="table-order table-responsive custom-scrollbar">
                                    <table class=" w-100 tranaction-table">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <div class="product-name"><a class=" f-14 f-w-500" href="product.html">Darrell Steward</a></div>
                                            </td>
                                            <td class="f-14 f-w-500">16 Nov, 2024</td>
                                            <td class="f-14 f-w-500">$456.23</td>
                                            <td>
                                                <div class="txt-primary"><span class="f-w-500 f-13">Complete</span></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="product-name"><a class=" f-14 f-w-500" href="product.html">Floyd Miles</a></div>
                                            </td>
                                            <td class="f-14 f-w-500">22 Jan, 2024</td>
                                            <td class="f-14 f-w-500">$550.73</td>
                                            <td>
                                                <div class="txt-secondary"><span class="f-w-500 f-13">Failed</span></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="product-name"><a class=" f-14 f-w-500" href="product.html">Ralph Edwards</a></div>
                                            </td>
                                            <td class="f-14 f-w-500">31 Dec, 2024</td>
                                            <td class="f-14 f-w-500">$785.26</td>
                                            <td>
                                                <div class="txt-primary"><span class="f-w-500 f-13">Complete</span></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="product-name"><a class=" f-14 f-w-500" href="product.html">Jerome Bell</a></div>
                                            </td>
                                            <td class="f-14 f-w-500">16 Nov, 2024</td>
                                            <td class="f-14 f-w-500">$458.14</td>
                                            <td>
                                                <div class="txt-secondary"><span class="f-w-500 f-13">Failed</span></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="product-name"><a class=" f-14 f-w-500" href="product.html">Theresa Webb</a></div>
                                            </td>
                                            <td class="f-14 f-w-500">16 Feb, 2024</td>
                                            <td class="f-14 f-w-500">$263.24</td>
                                            <td>
                                                <div class="txt-primary"><span class="f-w-500 f-13">Complete</span></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="product-name"><a class=" f-14 f-w-500" href="product.html">Courtney Henry</a></div>
                                            </td>
                                            <td class="f-14 f-w-500">01 Nov, 2024</td>
                                            <td class="f-14 f-w-500">$785.14</td>
                                            <td>
                                                <div class="txt-primary"><span class="f-w-500 f-13">Complete</span></div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-6 box-col-6">
                        <div class="card">
                            <div class="card-header card-no-border total-revenue">
                                <h4>Best Selling Product   </h4>
                            </div>
                            <div class="card-body pt-0">
                                <div class="selling-product">
                                    <div class="apache-cotainer" id="echart-polar"> </div>
                                    <div class="sales-chart-dropdown">
                                        <ul class="balance-data">
                                            <li> <span class="circle bg-primary"></span><span class="f-light ms-1">Digital</span></li>
                                            <li><span class="circle bg-warning"></span><span class="f-light ms-1">Clothes</span></li>
                                            <li> <span class="circle bg-secondary"></span><span class="f-light ms-1">Electric</span></li>
                                            <li> <span class="circle bg-light"> </span><span class="f-light ms-1">Footwear</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Treningi w województwach</h4>
                                <div id="wojewodztwa-chart" style="width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Szkoły w województwach</h4>
                                <div id="szkoly-chart" style="width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Podział zawodników według płci</h4>
                                    <div id="athletes-chart" style="width: 100%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">Liczba treningów w miesiącach</div>
                                <div class="card-body">
                                    <canvas id="practicesByMonthChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->

    </div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof Chart === 'undefined') {
            console.error('Chart.js nie jest załadowany. Upewnij się, że biblioteka jest prawidłowo dołączona.');
            return;
        }

        var chartData = @json($chartData);
        var totalAthletes = @json($totalAthletes);
        
        // Funkcja do tworzenia wykresu
        function createChart(elementId, data, title, yAxisTitle, tooltipSuffix) {
            var sortedData = Object.entries(data)
                .sort((a, b) => b[1] - a[1])
                .slice(0, 16);

            var categories = sortedData.map(item => item[0]);
            var series = sortedData.map(item => item[1]);

            var options = {
                chart: {
                    type: 'bar',
                    height: 350,
                    width: '100%'
                },
                series: [{
                    name: yAxisTitle,
                    data: series
                }],
                colors: ['#006666'],
                xaxis: {
                    categories: categories,
                    labels: {
                        rotate: -45,
                        rotateAlways: true,
                        trim: false,
                        style: {
                            fontSize: '12px'
                        }
                    }
                },
                yaxis: {
                    title: {
                        text: yAxisTitle
                    }
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        dataLabels: {
                            position: 'top',
                        },
                    }
                },
                dataLabels: {
                    enabled: true,
                    formatter: function (val) {
                        return val;
                    },
                    offsetY: -20,
                    style: {
                        fontSize: '12px',
                        colors: ["#006666"]
                    }
                },
                title: {
                    text: title,
                    align: 'center'
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val + " " + tooltipSuffix;
                        }
                    }
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: '100%'
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#" + elementId), options);
            chart.render();

            window.addEventListener('resize', function() {
                chart.updateOptions({
                    chart: {
                        width: '100%'
                    }
                });
            });
        }

        // Tworzenie wykresu dla treningów
        createChart(
            'wojewodztwa-chart', 
            chartData.practicesByVoivodeship, 
            'Treningi w województwach', 
            'Liczba treningów', 
            'treningów'
        );

        // Tworzenie wykresu dla szkół
        createChart(
            'szkoly-chart', 
            chartData.schoolsByVoivodeship, 
            'Szkoły w województwach', 
            'Liczba szkół', 
            'szkół'
        );

        // Nowy kod dla wykresu podziału zawodników według płci
        var athletesByGender = chartData.athletesByGender;
        
        var maleCount = parseInt(athletesByGender['M'] || 0);
        var femaleCount = parseInt(athletesByGender['K'] || 0);
        

        var series = [maleCount, femaleCount].filter(count => count > 0);
        var labels = ['Mężczyźni', 'Kobiety'].filter((_, index) => series[index] > 0);

        if (series.length <= 1) {
            var options = {
                series: series,
                chart: {
                    type: 'pie',
                    height: 400,
                   
                },
                labels: labels,
                colors: ['#0000FF', '#FF69B4'],
                title: {
                    text: 'Podział zawodników według płci (Łącznie: ' + totalAthletes + ')',
                    align: 'center'
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val + " zawodników";
                        }
                    }
                },
                legend: {
                    show: true,
                    position: 'bottom'
                },
                dataLabels: {
                    enabled: true,
                    formatter: function (val, opts) {
                        var label = opts.w.globals.labels[opts.seriesIndex];
                        var count = opts.w.globals.series[opts.seriesIndex];
                        var percentage = Math.round(val);
                        return label + ": " + count + " (" + percentage + "%)";
                    }
                }
            };
        } else {
            var options = {
                series: series,
                chart: {
                    type: 'polarArea',
                    height: 400,
                   
                },
                labels: labels,
                fill: {
                    opacity: 0.8
                },
                stroke: {
                    width: 1,
                    colors: undefined
                },
                yaxis: {
                    show: false
                },
                plotOptions: {
                    polarArea: {
                        rings: {
                            strokeWidth: 0
                        },
                        spokes: {
                            strokeWidth: 0
                        },
                    }
                },
                colors: ['#0000FF', '#FF69B4'],
                title: {
                    text: 'Podział zawodników według płci (Łącznie: ' + totalAthletes + ')',
                    align: 'center'
                },
                tooltip: {
                    y: {
                        formatter: function (val) {
                            return val + " zawodników";
                        }
                    }
                },
                legend: {
                    show: true,
                    position: 'bottom'
                },
                dataLabels: {
                    enabled: true,
                    formatter: function (val, opts) {
                        var label = opts.w.globals.labels[opts.seriesIndex];
                        var count = opts.w.globals.series[opts.seriesIndex];
                        var percentage = Math.round(val);
                        return label + ": " + count + " (" + percentage + "%)";
                    }
                }
            };
        }

        var athletesChart = new ApexCharts(document.querySelector("#athletes-chart"), options);
        athletesChart.render();

        window.addEventListener('resize', function() {
            athletesChart.updateOptions({
                chart: {
                    width: '50%'
                }
            });
        });

        // Nowy kod dla wykresu treningów w miesiącach
        var practicesByMonth = chartData.practicesByMonth;
        var practicesData = [];
        
        for (var i = 1; i <= 12; i++) {
            practicesData.push(parseInt(practicesByMonth[i] || 0));
        }

        var practicesByMonthCtx = document.getElementById('practicesByMonthChart');
        if (practicesByMonthCtx) {
            var practicesByMonthChart = new Chart(practicesByMonthCtx.getContext('2d'), {
                type: 'line',
                data: {
                    labels: ['Sty', 'Lut', 'Mar', 'Kwi', 'Maj', 'Cze', 'Lip', 'Sie', 'Wrz', 'Paź', 'Lis', 'Gru'],
                    datasets: [{
                        label: 'Liczba treningów',
                        data: practicesData,
                        borderColor: '#006666',
                        backgroundColor: 'rgba(0, 102, 102, 0.1)',
                        borderWidth: 2,
                        fill: false,
                        stepped: true
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        } else {
            console.error('Element o id "practicesByMonthChart" nie został znaleziony.');
        }

        // Dla wykresu podziału zawodników według płci
        var options = {
            // ... (pozostałe opcje bez zmian)
            chart: {
                type: 'polarArea', // lub 'pie', w zależności od warunku
                height: 300, // Zmniejszamy wysokość, aby lepiej pasowała do karty
                width: '100%'
            },
            // ... (pozostałe opcje bez zmian)
        };

        var athletesChart = new ApexCharts(document.querySelector("#athletes-chart"), options);
        athletesChart.render();

        // Dla wykresu treningów w miesiącach
        var practicesByMonthCtx = document.getElementById('practicesByMonthChart');
        if (practicesByMonthCtx) {
            var practicesByMonthChart = new Chart(practicesByMonthCtx, {
                // ... (pozostałe opcje bez zmian)
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Dodajemy tę opcję
                    // ... (pozostałe opcje bez zmian)
                }
            });
        } else {
            console.error('Element o id "practicesByMonthChart" nie został znaleziony.');
        }

        // Funkcja do dostosowania rozmiaru wykresów przy zmianie rozmiaru okna
        function resizeCharts() {
            if (athletesChart) {
                athletesChart.updateOptions({
                    chart: {
                        width: '100%'
                    }
                });
            }
            if (practicesByMonthChart) {
                practicesByMonthChart.resize();
            }
        }

        // Nasłuchiwanie na zmianę rozmiaru okna
        window.addEventListener('resize', resizeCharts);
    });
</script>
@endpush




