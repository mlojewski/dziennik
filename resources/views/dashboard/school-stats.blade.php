@extends('layouts.template')
@section('content')


<div class="page-body">
    <div class = 'page-title'>
        <h4>Raport dla szkoły {{ $school->name }}</h4>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row size-column">
            
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Podział zawodników w szkole według płci</h4>
                            <div id="athletes-chart" style="width: 100%;"></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Frekwencja na treningach</h4>
                            <div id="attendance-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">Liczba treningów w miesiącach</div>
                        <div class="card-body">
                            <canvas id="practicesByMonthChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Statystyki</h4>
                            <div > Średnia liczba uczestników treningów: {{$stats['participation']['average_participants']}}</div>
                            <div > Średnia procentowa frekwencja w treningach: {{$stats['participation']['participation_percentage']}}</div>
                        </div>
                    </div>
                </div>
            </div>
          
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Suma uczestników z podziałem na płeć</h4>
                        <div id="practices-gender-chart"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('school.practices.export', $school->id) }}" 
                               class="btn btn-primary">
                                Pobierz zestawienie treningów
                            </a>
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
    if (typeof Chart === 'undefined' || typeof ApexCharts === 'undefined') {
        console.error('Chart.js lub ApexCharts nie są załadowane. Upewnij się, że biblioteki są prawidłowo dołączone.');
        return;
    }

    var stats = @json($stats);

    // Wykres podziału zawodników według płci
    var athletesByGender = {
        series: [stats.athletes_count.male, stats.athletes_count.female],
        labels: ['Mężczyźni', 'Kobiety']
    };

    var athletesChartOptions = {
        series: athletesByGender.series,
        chart: {
            type: 'donut',
            height: 350
        },
        labels: athletesByGender.labels,
        colors: ['#0000FF', '#FF69B4'],
        title: {
            text: 'Podział zawodników według płci (Łącznie: ' + stats.athletes_count.total + ')',
            align: 'center'
        },
        tooltip: {
            y: {
                formatter: function (val, opts) {
                    return opts.w.globals.labels[opts.seriesIndex] + " - " + val + " zawodników (" + (val / stats.athletes_count.total * 100).toFixed(2) + "%)";
                }
            }
        },
        dataLabels: {
            formatter: function (val, opts) {
                return opts.w.globals.labels[opts.seriesIndex] + " - " + val.toFixed(2) + "%";
            }
        },
        legend: {
            position: 'bottom'
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    width: 200
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    };

    var athletesChart = new ApexCharts(document.querySelector("#athletes-chart"), athletesChartOptions);
    athletesChart.render();

    // Wykres liczby treningów w miesiącach
    var practicesData = stats.practices_count.monthly;
    var totalPractices = stats.practices_count.total;
    var labels = ['Sty', 'Lut', 'Mar', 'Kwi', 'Maj', 'Cze', 'Lip', 'Sie', 'Wrz', 'Paź', 'Lis', 'Gru'];

    var practicesByMonthCtx = document.getElementById('practicesByMonthChart');
    if (practicesByMonthCtx) {
        var practicesByMonthChart = new Chart(practicesByMonthCtx.getContext('2d'), {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Liczba treningów',
                    data: practicesData,
                    borderColor: '#006666',
                    backgroundColor: 'rgba(0, 102, 102, 0.1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
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
                    },
                    title: {
                        display: true,
                        text: 'Liczba treningów w miesiącach'
                    }
                }
            }
        });

        // Aktualizacja nagłówka karty z łączną sumą treningów
        var cardHeader = document.querySelector('.card-header');
        if (cardHeader) {
            cardHeader.textContent = `Liczba treningów w miesicach (Łącznie: ${totalPractices})`;
        }
    } else {
        console.error('Element o id "practicesByMonthChart" nie został znaleziony.');
    }

    // Wykres rozkładu płci na treningach
    var practicesGenderData = stats.practices_gender_distribution;

    var genderDistributionOptions = {
        series: [{
            name: 'Mężczyźni',
            data: practicesGenderData.map(practice => practice.male)
        }, {
            name: 'Kobiety',
            data: practicesGenderData.map(practice => practice.female)
        }],
        chart: {
            type: 'bar',
            height: 350,
            stacked: true,
            toolbar: {
                show: true
            },
            annotations: {
                texts: practicesGenderData.map((practice, index) => ({
                    x: index,
                    y: practice.male + practice.female,
                    text: 'Łącznie: ' + (practice.male + practice.female),
                    textAnchor: 'middle',
                    offsetY: -5,
                    borderColor: '#666',
                    fontSize: '11px',
                    foreColor: '#333'
                }))
            }
        },
        colors: ['#0000FF', '#FF69B4'],
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
            },
        },
        dataLabels: {
            enabled: true,
            formatter: function(val) {
                return Math.round(val) || '';
            }
        },
        xaxis: {
            type: 'category',
            categories: practicesGenderData.map(practice => {
                let date = new Date(practice.date);
                let formattedDate = date.toLocaleDateString('pl-PL', { 
                    day: '2-digit', 
                    month: '2-digit',
                    year: 'numeric'
                });
                return `${formattedDate}\n(${practice.male + practice.female} uczestników)`;
            }),
            labels: {
                rotate: -45,
                rotateAlways: true,
                trim: false // Zapobiega przycinaniu etykiet
            }
        },
        yaxis: {
            title: {
                text: 'Liczba uczestników'
            },
            labels: {
                formatter: function(val) {
                    return Math.round(val);
                }
            }
        },
        legend: {
            position: 'bottom'
        },
        title: {
            text: 'Rozkład płci na treningach',
            align: 'center'
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return Math.round(val) + " zawodników";
                }
            }
        },
        fill: {
            opacity: 1
        }
    };

    var genderDistributionChart = new ApexCharts(
        document.querySelector("#practices-gender-chart"), 
        genderDistributionOptions
    );
    genderDistributionChart.render();

    // Wykres frekwencji
    var attendanceOptions = {
        series: [
            stats.participation.participation_percentage,
            stats.participation.male_attendance_percentage,
            stats.participation.female_attendance_percentage
        ],
        chart: {
            height: 350,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                offsetY: 0,
                startAngle: 0,
                endAngle: 360,
                hollow: {
                    margin: 5,
                    size: '30%',
                    background: 'transparent',
                },
                dataLabels: {
                    name: {
                        fontSize: '16px',
                        offsetY: 20
                    },
                    value: {
                        fontSize: '14px',
                        color: '#666',
                        formatter: function(val) {
                            return val.toFixed(2) + '%';
                        },
                        offsetY: -10
                    },
                    total: {
                        show: false
                    }
                },
                track: {
                    background: '#f2f2f2',
                    strokeWidth: '97%',
                    margin: 5
                }
            }
        },
        colors: ['#006666', '#0000FF', '#FF69B4'],
        labels: ['Ogólna', 'Mężczyźni', 'Kobiety'],
        legend: {
            show: true,
            position: 'bottom',
            offsetY: 0,
            formatter: function(seriesName, opts) {
                return seriesName + ": " + opts.w.globals.series[opts.seriesIndex].toFixed(2) + '%';
            }
        }
    };

    var attendanceChart = new ApexCharts(document.querySelector("#attendance-chart"), attendanceOptions);
    attendanceChart.render();

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
        if (genderDistributionChart) {
            genderDistributionChart.updateOptions({
                chart: {
                    width: '100%'
                }
            });
        }
        if (attendanceChart) {
            attendanceChart.updateOptions({
                chart: {
                    width: '100%'
                }
            });
        }
    }

    // Nasłuchiwanie na zmianę rozmiaru okna
    window.addEventListener('resize', resizeCharts);
});
</script>
@endpush





