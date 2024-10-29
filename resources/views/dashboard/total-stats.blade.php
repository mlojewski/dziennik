@extends('layouts.template')
@section('content')


<div class="page-body">
    <div class = 'page-title'>
        <h4>Raport projektu</h4>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row size-column">
            
    @dump($basicCounts)
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Podział uczestników programu według płci</h4>
                            <div id="athletes-chart" style="width: 100%;"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Statystyki</h4>
                            <div > Średnia liczba uczestników treningów: {{$basicCounts['participation']['average_participants']}} w tym:
                                <ul>
                                    <li>Kobiet: {{$basicCounts['participation']['average_female_participants']}}</li>
                                    <li>Mężczyzn: {{$basicCounts['participation']['average_male_participants']}}</li>
                                </ul>
                            </div>
                            <div > Średnia ważona frekwencja w treningach: {{$basicCounts['participation']['participation_percentage']}}
                                <ul>
                                    <li>Średnia arytmetyczna frekwencja kobiet: {{$basicCounts['participation']['female_attendance_percentage']}}</li>
                                    <li>Średnia arytmetyczna frekwencja mężczyzn: {{$basicCounts['participation']['male_attendance_percentage']}}</li>
                                </ul>
                            </div>
                            <div > Łącznie szkół w programie: {{$basicCounts['counts']['total_schools']}}</div>
                            <div > Łącznie zawodników w programie: {{$basicCounts['counts']['total_athletes']}}</div>
                            <div > Łącznie treningów w programie: {{$basicCounts['counts']['total_practices']}}</div>
                            <div > Łącznie trenerów w programie: {{$basicCounts['counts']['total_coaches']}}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Liczba treningów w miesiącach</div>
                        <div class="card-body">
                            <div id="practicesByMonthChart"></div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Liczba treningów w województwach</div>
                        <div class="card-body">
                            <div id="practicesByVoivodeshipChart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Liczba szkół w województwach</div>
                        <div class="card-body">
                            <div id="schoolsByVoivodeshipChart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        {{-- <div class="card-body">
                            <a href="{{ route('school.practices.export', $school->id) }}" 
                               class="btn btn-primary">
                                Pobierz zestawienie treningów
                            </a>
                        </div> --}}
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
    // Sprawdź, czy ApexCharts jest dostępny
    if (typeof ApexCharts === 'undefined') {
        console.error('ApexCharts nie jest załadowany!');
        return;
    }

    // Dane dla wykresu donut
    var athletesByGenderData = {
        "K": 8,
        "M": 10
    };

    var totalAthletes = Object.values(athletesByGenderData).reduce((a, b) => a + b, 0);

    var donutOptions = {
        series: Object.values(athletesByGenderData),
        chart: {
            type: 'donut',
            height: 350
        },
        labels: Object.keys(athletesByGenderData),
        title: {
            text: `Uczestników łącznie: ${totalAthletes}`,
            align: 'center'
        },
        dataLabels: {
            enabled: true,
            formatter: function (val, opts) {
                const percentage = (val).toFixed(2).replace('.', ','); // Oblicz procent i zamień kropkę na przecinek
                const genderLabel = opts.w.globals.labels[opts.seriesIndex] === "K" ? "Kobiet: " : "Mężczyzn: ";
                return `${genderLabel}${percentage}%`; // Zwróć etykietę z procentem
            }
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return `${val} uczestników`;
                }
            }
        },
        colors: ['#FF69B4', '#0000FF'], // Kolory dla K i M 
    };

    var athletesChart = new ApexCharts(document.querySelector("#athletes-chart"), donutOptions);
    athletesChart.render().then(() => {
        console.log('Wykres donut został wyrenderowany');
    }).catch(error => {
        console.error('Błąd podczas renderowania wykresu donut:', error);
    });

    // Dodaj wykres area
    var practicesByMonthData = @json($basicCounts['practices_by_month']);

    // Przyporządkuj numery miesięcy do nazw miesięcy po polsku
    var monthNames = [
        "Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec",
        "Lipiec", "Sierpień", "Wrzesień", "Październik", "Listopad", "Grudzień"
    ];

    var totalPracticesByMonth = Object.values(practicesByMonthData);

    var areaOptions = {
        series: [{
            name: 'Liczba treningów',
            data: totalPracticesByMonth
        }],
        chart: {
            type: 'area', // Zmiana typu wykresu na area
            height: 350,
            zoom: {
                enabled: false
            }
        },
        stroke: {
            curve: 'smooth', // Ustawienie na smooth
            width: 2,
            colors: ['#006666'] // Kolor linii
        },
        xaxis: {
            categories: monthNames, // Użyj nazw miesięcy jako etykiet
            title: {
                text: '' // Usunięcie napisu "Miesiące"
            }
        },
        yaxis: {
            title: {
                text: 'Liczba treningów'
            },
            labels: {
                formatter: function (val) {
                    return Math.floor(val); // Upewnij się, że etykiety są liczbami całkowitymi
                }
            }
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return `${val} treningów`;
                }
            }
        }
    };

    var practicesByMonthChart = new ApexCharts(document.querySelector("#practicesByMonthChart"), areaOptions);
    practicesByMonthChart.render().then(() => {
        console.log('Wykres area został wyrenderowany');
    }).catch(error => {
        console.error('Błąd podczas renderowania wykresu area:', error);
    });

    // Dodaj wykres kolumnowy dla województw
    var practicesByVoivodeshipData = @json($basicCounts['practices_by_voivodeship']);

    // Lista wszystkich województw
    var allVoivodeships = [
        "dolnośląskie", "kujawsko-pomorskie", "lubuskie", "mazowieckie", 
        "opolskie", "podkarpackie", "podlaskie", "pomorskie", 
        "śląskie", "warmińsko-mazurskie", "wielkopolskie", "zachodniopomorskie",
        "łódzkie", "mazursko-warmińskie", "lubuskie", "małopolskie", "świętokrzyskie"
    ];

    // Przygotowanie danych do wykresu
    var totalPracticesByVoivodeship = allVoivodeships.map(function(voivodeship) {
        return practicesByVoivodeshipData[voivodeship] || 0; // Ustaw wartość na 0, jeśli brak danych
    });

    var columnOptions = {
        series: [{
            name: 'Liczba treningów',
            data: totalPracticesByVoivodeship
        }],
        chart: {
            type: 'bar', // Ustawienie typu wykresu na kolumnowy
            height: 350,
            zoom: {
                enabled: false
            }
        },
        colors: ['#006666'], // Kolor kolumn
        dataLabels: {
            enabled: true // Włączenie etykiet danych
        },
        xaxis: {
            categories: allVoivodeships, // Użyj nazw województw jako etykiet
            title: {
                text: '' // Usunięcie napisu "Województwa"
            }
        },
        yaxis: {
            title: {
                text: 'Liczba treningów'
            },
            labels: {
                formatter: function (val) {
                    return Math.floor(val); // Upewnij się, że etykiety są liczbami całkowitymi
                }
            }
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return `${val} treningów`;
                }
            }
        }
    };

    var practicesByVoivodeshipChart = new ApexCharts(document.querySelector("#practicesByVoivodeshipChart"), columnOptions);
    practicesByVoivodeshipChart.render().then(() => {
        console.log('Wykres kolumnowy dla województw został wyrenderowany');
    }).catch(error => {
        console.error('Błąd podczas renderowania wykresu kolumnowego dla województw:', error);
    });

    // Dodaj wykres kolumnowy dla szkół w województwach
    var schoolsByVoivodeshipData = @json($basicCounts['schools_by_voivodeship']);

    // Lista wszystkich województw
    var allVoivodeships = [
        "dolnośląskie", "kujawsko-pomorskie", "lubuskie", "mazowieckie", 
        "opolskie", "podkarpackie", "podlaskie", "pomorskie", 
        "śląskie", "warmińsko-mazurskie", "wielkopolskie", "zachodniopomorskie",
        "łódzkie", "mazursko-warmińskie", "lubuskie", "małopolskie", "świętokrzyskie"
    ];

    // Przygotowanie danych do wykresu
    var totalSchoolsByVoivodeship = allVoivodeships.map(function(voivodeship) {
        return schoolsByVoivodeshipData[voivodeship] || 0; // Ustaw wartość na 0, jeśli brak danych
    });

    var columnOptions = {
        series: [{
            name: 'Liczba szkół',
            data: totalSchoolsByVoivodeship
        }],
        chart: {
            type: 'bar', // Ustawienie typu wykresu na kolumnowy
            height: 350,
            zoom: {
                enabled: false
            }
        },
        colors: ['#006666'], // Kolor kolumn
        dataLabels: {
            enabled: true // Włączenie etykiet danych
        },
        xaxis: {
            categories: allVoivodeships, // Użyj nazw województw jako etykiet
            title: {
                text: '' // Usunięcie napisu "Województwa"
            }
        },
        yaxis: {
            title: {
                text: 'Liczba szkół'
            },
            labels: {
                formatter: function (val) {
                    return Math.floor(val); // Upewnij się, że etykiety są liczbami całkowitymi
                }
            }
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return `${val} szkół`;
                }
            }
        }
    };

    var schoolsByVoivodeshipChart = new ApexCharts(document.querySelector("#schoolsByVoivodeshipChart"), columnOptions);
    schoolsByVoivodeshipChart.render().then(() => {
        console.log('Wykres kolumnowy dla szkół w województwach został wyrenderowany');
    }).catch(error => {
        console.error('Błąd podczas renderowania wykresu kolumnowego dla szkół w województwach:', error);
    });
});
</script>
@endpush








