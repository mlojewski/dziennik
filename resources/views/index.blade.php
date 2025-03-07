@extends('layouts.template')
@section('content')

        <div class="page-body">
            <div class="container-fluid">
                <div class="page-title">
                    <div class="row">
                        <div class="col-6">
                        
@if(!Auth::user()->is_admin)
    @if(Auth::user()->coach_id == null)
        Profil trenera nie został uzupełniony - przejdź tutaj = <a href="{{route('coaches.create')}}"> o tutaj</a>
    @endif
  
    @if(!\App\Models\Coach::where('id', Auth::user()->coach_id)->get()->isEmpty())
        @if(\App\Models\Coach::where('id', Auth::user()->coach_id)->get()[0]->schools->isEmpty())
            Nie uzupełniono danych szkoły - przejdź tutaj = <a href="{{route('schools.create')}}"> o tutaj</a>
        @else
        Wszystkie dane uzupełnione, dziękujemy
        @endif
    @endif
    @endif
    
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Container-fluid starts-->
            @if(Auth::user()->is_admin)
            <div class="container-fluid">
                <div class="row size-column">
                    <div class="col-xl-8 col-md-12 box-col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Szkoły w województwach</h4>
                                <div id="szkoly-chart" style="width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6 box-col-none">
                        <div class="row">
                            <div class="col-md-12 col-sm-6">
                                <div class="card boost-up-card overflow-hidden">
                                    <div class="p-4">
                                        <div class="boostup-name row">
                                            <h6 class="text-white f-28 f-w-700 mb-2 z-1 ">Raporty ogólne</h6>
                                            <p class="text-white f-14 f-w-500 col-9 line-clamp">
                                              Przejdź do zakładki raporty w menu po lewej stronie</p>
                                        </div>
                                        <div class="img-boostup"><img class="img-boostup-img-1" src="../assets/images/dashboard-3/boostup1.png" alt="boostup"><img class="img-boostup-img-2" src="../assets/images/dashboard-3/boostup2.png" alt="boostup"></div>
                                        <div class="btn-showcase text-start"> <a href="{{route('schools.index')}}">
                                                <button class="btn btn-pill btn-outline-light-2x b-r-8" type="button">lub kliknij tutaj</button></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-6">
                                <div class="card height-equal">
                                    <div class="card-header card-no-border total-revenue">
                                        <h4>Nowi trenerzy </h4><a href="{{route('coaches.inactives')}}">Przejdź do akceptacji</a>
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
                                                                    <h6> {{$coach->name}} {{$coach->last_name}}</h6>
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
                                
                                <div class="card-body">
                                    <h4 class="card-title mb-4">Liczba treningów w miesiącach</h4> 
                                    <div id="practicesByMonthChart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            @include('dashboard.coach')
            @endif
            <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->

    </div>
@endsection

@push('scripts')
@if(Auth::user()->is_admin)
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
                    },
                    labels: {
                        formatter: function (val) {
                            return Math.floor(val);
                        }
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
            'Szkoły w województach', 
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

        // Przygotuj dane dla wykresu miesięcznego
        var practicesByMonth = chartData.practicesByMonth;
        var practicesData = [];
        for (var i = 1; i <= 12; i++) {
            practicesData.push(parseInt(practicesByMonth[i] || 0));
        }

        // Konfiguracja wykresu area
        var practicesOptions = {
            chart: {
                type: 'area',
                height: 350,
                toolbar: {
                    show: true,
                    tools: {
                        download: true,
                        selection: false,
                        zoom: false,
                        zoomin: false,
                        zoomout: false,
                        pan: false,
                        reset: false
                    }
                }
            },
            series: [{
                name: 'Liczba treningów',
                data: practicesData
            }],
            xaxis: {
                categories: ['Sty', 'Lut', 'Mar', 'Kwi', 'Maj', 'Cze', 'Lip', 'Sie', 'Wrz', 'Paź', 'Lis', 'Gru'],
                labels: {
                    style: {
                        colors: '#666'
                    }
                }
            },
            yaxis: {
                labels: {
                    formatter: function(val) {
                        return Math.floor(val);
                    }
                },
                title: {
                    text: 'Liczba treningów'
                }
            },
            dataLabels: {
                enabled: true,
                formatter: function(val) {
                    return Math.floor(val);
                }
            },
            stroke: {
                curve: 'smooth',
                width: 2
            },
            colors: ['#006666'],
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.2,
                    stops: [0, 90, 100]
                }
            },
            title: {
                text: 'Liczba treningów w miesiącach',
                align: 'center'
            },
            grid: {
                borderColor: '#e7e7e7',
                row: {
                    colors: ['#f3f3f3', 'transparent'],
                    opacity: 0.5
                }
            },
            markers: {
                size: 4
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return Math.floor(val) + ' treningów';
                    }
                }
            }
        };

        // Renderuj wykres
        var practicesChart = new ApexCharts(
            document.querySelector("#practicesByMonthChart"), 
            practicesOptions
        );
        practicesChart.render();

        // Dodaj obsługę zmiany rozmiaru
        window.addEventListener('resize', function() {
            practicesChart.updateOptions({
                chart: {
                    width: '100%'
                }
            });
        });

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
@endif
@endpush




