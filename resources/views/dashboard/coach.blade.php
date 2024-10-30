<div class="container-fluid">
    <div class="row size-column">
        @foreach($results as $result)
            <div class="col-xl-6 col-md-6 box-col-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-6">{{ $result['szkoła'] }}</h4>
                        <div class="mt-4">
                            <p class="text-muted mb-6">
                                Dla szkoły {{ $result['szkoła'] }} zrealizowano {{ $result['liczba_treningów'] }} 
                                z możliwych {{ $result['limit'] }} treningów.
                            </p>
                            <p class="text-muted mb-6">
                                W szkole {{ $result['szkoła'] }} trenuje {{ $result['liczba_uczniow'] }} zawodników.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-xl-4 col-md-6 box-col-none">
            <div class="row">
                <div class="col-md-12 col-sm-6">
                    <div class="card boost-up-card overflow-hidden">
                        <div class="p-4">
                            <div class="boostup-name row">
                                <h6 class="text-white f-28 f-w-700 mb-2 z-1 ">Zarządzanie treningami</h6>
                                <p class="text-white f-14 f-w-500 col-9 line-clamp">
                                  Przejdź do zakładki w menu po lewej stronie</p>
                            </div>
                            <div class="img-boostup"><img class="img-boostup-img-1" src="../assets/images/dashboard-3/boostup1.png" alt="boostup"><img class="img-boostup-img-2" src="../assets/images/dashboard-3/boostup2.png" alt="boostup"></div>
                            <div class="btn-showcase text-start"> <a href="{{route('practices.index')}}">
                                    <button class="btn btn-pill btn-outline-light-2x b-r-8" type="button">lub kliknij tutaj</button></a></div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

