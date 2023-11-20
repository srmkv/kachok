@extends('auth.layouts.user_type.auth')
@section('page')
    Мой прогресс
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
            <div class="">
                <div class="card-body p-3">
                    <!--line1-->
                    <div class="row row-flex">

                        @isset($afterPhoto)
                            <div class="col-xs-12 col-sm-3">
                                <div class="numbers">
                                    @isset($afterPhoto)
                                        <img class="imgprogress" height="463px" src="{{ asset('photo/' . $afterPhoto->photo) }}"
                                            role="button" data-bs-toggle="modal" data-bs-target="#modalImageAfter">
                                    @endisset
                                </div>
                            </div>
                        @else
                            <div class="col-xs-12 col-sm-3">
                                <div class="dropbox" role="button" data-bs-toggle="modal" data-bs-target="#modalImageAfter">
                                </div>
                            </div>
                            @endif

                            @isset($beforePhoto)
                                <div class="col-xs-12 col-sm-3">
                                    <div class="numbers">
                                        <img class="imgprogress" height="463px" src="{{ asset('photo/' . $beforePhoto->photo) }}"
                                            role="button" data-bs-toggle="modal" data-bs-target="#modalImageBefore">
                                    </div>
                                </div>
                            @else
                                <div class="col-xs-12 col-sm-3">
                                    <div class="dropbox" role="button" data-bs-toggle="modal" data-bs-target="#modalImageBefore">
                                    </div>
                                </div>
                                @endif

                                @isset($singlePhoto)
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="numbers">
                                            <img class="imgprogress" height="463px" src="{{ asset('photo/' . $singlePhoto->photo) }}"
                                                role="button" data-bs-toggle="modal" data-bs-target="#modalImage">
                                        </div>
                                    </div>
                                @else
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="dropbox" role="button" data-bs-toggle="modal" data-bs-target="#modalImage">
                                        </div>
                                    </div>
                                    @endif

                                    <!--<div class="col-xs-12 col-sm-3">
                                        <div class="tarif_card card text-center">
                                            <p class="tarif-card-txt"><span class="tarif-head">{{ auth()->user()->traffic }}</span></p>
                                            <p class="tarif-price-txt"><span class="tarif-price">40 ₽</span> / день</p>
                                            <p class="tarif-card-content">Тоже что и Standard+ + план питания (без выбора рациона)</p>
                                            <p class="tarif-card-content">Действует до:</p>
                                            <p class="tarif-card-date">27 февраля, 2023</p>
                                            <button class="tarif-card-btn">Продлить</button>
                                        </div>
                                    </div>
                                    -->
                                </div>
                                <!--line2-->
                                <div class="row row-flex">
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="numbers">
                                            @isset($afterPhoto)
                                                <p class="txt-foto text-sm mb-0 text-capitalize">
                                                    {{ date('d.m.Y H:m:s', strtotime($afterPhoto->created_at)) }}</p>
                                            @endisset

                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="numbers">
                                            @isset($beforePhoto)
                                                <p class="txt-foto text-sm mb-0 text-capitalize">
                                                    {{ date('d.m.Y H:m:s', strtotime($beforePhoto->created_at)) }}</p>
                                            @endisset
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="numbers">
                                            @isset($singlePhoto)
                                                <p class="txt-foto text-sm mb-0 text-capitalize">
                                                    {{ date('d.m.Y H:m:s', strtotime($singlePhoto->created_at)) }}</p>
                                            @endisset
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3">
                                        <div class="numbers">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card z-index-2">
                            <div class="card-header pb-0">
                                <div class="d-flex flex-row justify-content-between">
                                    <div>
                                        <p class="mb-0 head-txt">Вес</p>
                                    </div>
                                    <div>
                                        <a href="#" class="graf-btn btn-sm mb-0" type="button" data-bs-toggle="modal"
                                            data-bs-target="#modalWeight">+&nbsp;Добавить</a>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body p-3">
                                <div class="chart">
                                    <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="card z-index-2">
                            <div class="card-header pb-0">
                                <div class="d-flex flex-row justify-content-between">
                                    <div>
                                        <p class="mb-0 head-txt">Обхват талии</p>
                                    </div>
                                    <div>
                                        <button class="graf-btn btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#modalWaist"><i
                                                class="fas fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;Добавить</button>
                                    </div>

                                </div>
                            </div>
                            <div class="card-body p-3">
                                <div class="chart">
                                    <canvas id="chart-line-tal" class="chart-canvas" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-lg-0 mb-4">

                        @isset($statistic)
                            <div class="card z-index-2">
                                <div class="card-header pb-0">
                                    <div class="d-flex flex-row justify-content-between">
                                        <div>
                                            <p class="mb-0 head-txt">{{ $statistic->name }}</p>
                                        </div>
                                        <div>
                                            <button class="graf-btn btn-sm mb-0" data-bs-toggle="modal"
                                                data-bs-target="#modalStatistic"><i class="fas fa-plus"
                                                    aria-hidden="true"></i>&nbsp;&nbsp;Добавить</button>
                                        </div>
                                        <div>
                                            <button class="graf-btn btn-sm mb-0" onclick="removeStat()"><i class="fas fa-trash"
                                                    aria-hidden="true"></i>&nbsp;&nbsp;Удалить</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-3">
                                    <div class="chart">
                                        <canvas id="chart-line-statistic" class="chart-canvas" height="300"></canvas>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="dropbox" data-bs-toggle="modal" data-bs-target="#modaltarget">

                            </div>
                            @endif


                        </div>
                    </div>
                @endsection
                @push('dashboard')
                    <script>

                        function removeStat() {
                            fetch('/user/statistics/destroy', {
                                method: 'DELETE',
                                headers: {
                                    "X-CSRF-Token": "{!! csrf_token() !!}"
                                }
                            })
                            .then(res => res.text())
                            .then(res => {
                                window.location.reload()
                            })
                        }

                        window.onload = chart1()

                        function chart1() {


                            var ctx2 = document.getElementById("chart-line").getContext("2d");

                            var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

                            gradientStroke1.addColorStop(1, 'rgba(173,207,110,0.2)');
                            gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
                            gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

                            var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

                            gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
                            gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
                            gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

                            new Chart(ctx2, {
                                type: "line",
                                data: {
                                    labels: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Авг", "Сен", "Окт",
                                        "Ноя", "Дек"
                                    ],
                                    datasets: [{
                                            label: "Вес",

                                            tension: 0.4,
                                            pointRadius: 0,
                                            borderColor: "#B0CE66",
                                            borderWidth: 3,
                                            backgroundColor: gradientStroke1,
                                            fill: true,
                                            data: [
                                                @isset($weights)
                                                    {{ $weights }}
                                                @endisset
                                            ],
                                            maxBarThickness: 6

                                        },
                                        {
                                            label: "Вес ТОП-1",
                                            tension: 0.4,
                                            hidden: true,
                                            pointRadius: 0,
                                            borderColor: "#6D6443",
                                            borderWidth: 3,
                                            backgroundColor: gradientStroke2,
                                            fill: true,
                                            data: [80, 78, 78, 85, 88, 75, 76, 76, 78],
                                            maxBarThickness: 6
                                        },
                                        {
                                            label: "Вес ТОП-3",
                                            tension: 0.4,
                                            hidden: true,
                                            pointRadius: 0,
                                            borderColor: "#8E66CE",
                                            borderWidth: 3,
                                            backgroundColor: gradientStroke2,
                                            fill: true,
                                            data: [70, 70, 70, 75, 78, 75, 76, 77, 78],
                                            maxBarThickness: 6
                                        },
                                        {
                                            label: "Вес ТОП-5",
                                            tension: 0.4,
                                            hidden: true,
                                            pointRadius: 0,
                                            borderColor: "#CE6666",
                                            borderWidth: 3,
                                            backgroundColor: gradientStroke2,
                                            fill: true,
                                            data: [60, 60, 60, 65, 70, 65, 76, 77, 78],
                                            maxBarThickness: 6
                                        }
                                    ],
                                },

                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            cursor: "pointer",

                                            itemclick: function(e, legendItem, legend) {
                                                const index = legendItem.datasetIndex;
                                                const ci = legend.chart;
                                                if (ci.isDatasetVisible(index)) {
                                                    ci.hide(index);
                                                    legendItem.hidden = true;
                                                } else {
                                                    ci.show(index);
                                                    legendItem.hidden = false;
                                                }
                                            }
                                        }
                                    },
                                    interaction: {
                                        intersect: false,
                                        mode: 'index',
                                    },
                                    scales: {
                                        y: {
                                            grid: {
                                                drawBorder: false,
                                                display: true,
                                                drawOnChartArea: true,
                                                drawTicks: false,
                                                borderDash: [5, 5]
                                            },
                                            ticks: {
                                                display: true,
                                                padding: 10,
                                                min: 75,
                                                color: '#b2b9bf',
                                                font: {
                                                    size: 11,
                                                    family: "Open Sans",
                                                    style: 'normal',
                                                    lineHeight: 2
                                                },
                                            }
                                        },
                                        x: {
                                            grid: {
                                                drawBorder: false,
                                                display: false,
                                                drawOnChartArea: false,
                                                drawTicks: false,
                                                borderDash: [5, 5]
                                            },
                                            ticks: {
                                                display: true,
                                                color: '#b2b9bf',
                                                padding: 20,
                                                font: {
                                                    size: 11,
                                                    family: "Open Sans",
                                                    style: 'normal',
                                                    lineHeight: 2
                                                },
                                            }
                                        },
                                    },
                                },
                            });

                        }
                    </script>
                    <!--chart taliya-->
                    <script>
                        window.onload = chart2();

                        function chart2() {


                            var ctx3 = document.getElementById("chart-line-tal").getContext("2d");

                            var gradientStroke1 = ctx3.createLinearGradient(0, 230, 0, 50);

                            gradientStroke1.addColorStop(1, 'rgba(173,207,110,0.2)');
                            gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
                            gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

                            var gradientStroke2 = ctx3.createLinearGradient(0, 230, 0, 50);

                            gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
                            gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
                            gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

                            new Chart(ctx3, {
                                type: "line",
                                data: {
                                    labels: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Авг", "Сен", "Окт",
                                        "Ноя", "Дек"
                                    ],
                                    datasets: [{
                                            label: "Талия",

                                            tension: 0.4,
                                            borderWidth: 0,
                                            pointRadius: 0,
                                            borderColor: "#B0CE66",
                                            borderWidth: 3,
                                            backgroundColor: gradientStroke1,
                                            fill: true,
                                            data: [
                                                @isset($waists)
                                                    {{ $waists }}
                                                @endisset
                                            ],
                                            maxBarThickness: 6

                                        },
                                        {
                                            label: "Талия ТОП-1",
                                            tension: 0.4,
                                            hidden: true,
                                            borderWidth: 0,
                                            pointRadius: 0,
                                            borderColor: "#6D6443",
                                            borderWidth: 3,
                                            backgroundColor: gradientStroke2,
                                            fill: true,
                                            data: [80, 78, 78, 85, 88, 75, 76, 76, 78],
                                            maxBarThickness: 6
                                        },
                                        {
                                            label: "Талия ТОП-3",
                                            tension: 0.4,
                                            hidden: true,
                                            borderWidth: 0,
                                            pointRadius: 0,
                                            borderColor: "#8E66CE",
                                            borderWidth: 3,
                                            backgroundColor: gradientStroke2,
                                            fill: true,
                                            data: [70, 70, 70, 75, 78, 75, 76, 77, 78],
                                            maxBarThickness: 6
                                        },
                                        {
                                            label: "Талия ТОП-5",
                                            tension: 0.4,
                                            hidden: true,
                                            borderWidth: 0,
                                            pointRadius: 0,
                                            borderColor: "#CE6666",
                                            borderWidth: 3,
                                            backgroundColor: gradientStroke2,
                                            fill: true,
                                            data: [60, 60, 60, 65, 70, 65, 76, 77, 78],
                                            maxBarThickness: 6
                                        }
                                    ],
                                },

                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            cursor: "pointer",

                                            itemclick: function(e, legendItem, legend) {
                                                const index = legendItem.datasetIndex;
                                                const ci = legend.chart;
                                                if (ci.isDatasetVisible(index)) {
                                                    ci.hide(index);
                                                    legendItem.hidden = true;
                                                } else {
                                                    ci.show(index);
                                                    legendItem.hidden = false;
                                                }
                                            }
                                        }
                                    },
                                    interaction: {
                                        intersect: false,
                                        mode: 'index',
                                    },
                                    scales: {
                                        y: {
                                            grid: {
                                                drawBorder: false,
                                                display: true,
                                                drawOnChartArea: true,
                                                drawTicks: false,
                                                borderDash: [5, 5]
                                            },
                                            ticks: {
                                                display: true,
                                                padding: 10,
                                                min: 75,
                                                color: '#b2b9bf',
                                                font: {
                                                    size: 11,
                                                    family: "Open Sans",
                                                    style: 'normal',
                                                    lineHeight: 2
                                                },
                                            }
                                        },
                                        x: {
                                            grid: {
                                                drawBorder: false,
                                                display: false,
                                                drawOnChartArea: false,
                                                drawTicks: false,
                                                borderDash: [5, 5]
                                            },
                                            ticks: {
                                                display: true,
                                                color: '#b2b9bf',
                                                padding: 20,
                                                font: {
                                                    size: 11,
                                                    family: "Open Sans",
                                                    style: 'normal',
                                                    lineHeight: 2
                                                },
                                            }
                                        },
                                    },
                                },
                            });

                        }
                    </script>

                    <!--chart statictic-->
                    <script>
                        window.onload = chart2();

                        function chart2() {


                            var ctx3 = document.getElementById("chart-line-statistic").getContext("2d");

                            var gradientStroke1 = ctx3.createLinearGradient(0, 230, 0, 50);

                            gradientStroke1.addColorStop(1, 'rgba(173,207,110,0.2)');
                            gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
                            gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

                            var gradientStroke2 = ctx3.createLinearGradient(0, 230, 0, 50);

                            gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
                            gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
                            gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

                            new Chart(ctx3, {
                                type: "line",
                                data: {
                                    labels: ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Авг", "Сен", "Окт",
                                        "Ноя", "Дек"
                                    ],
                                    datasets: [{
                                            label: @isset($statistic)
                                                "{{ $statistic->variable }}"
                                            @endisset ,

                                            tension: 0.4,
                                            borderWidth: 0,
                                            pointRadius: 0,
                                            borderColor: "#B0CE66",
                                            borderWidth: 3,
                                            backgroundColor: gradientStroke1,
                                            fill: true,
                                            data: [
                                                @isset($statisticValues)
                                                    {{ $statisticValues }}
                                                @endisset
                                            ],
                                            maxBarThickness: 6

                                        },
                                        {
                                            label: "Талия ТОП-1",
                                            tension: 0.4,
                                            hidden: true,
                                            borderWidth: 0,
                                            pointRadius: 0,
                                            borderColor: "#6D6443",
                                            borderWidth: 3,
                                            backgroundColor: gradientStroke2,
                                            fill: true,
                                            data: [80, 78, 78, 85, 88, 75, 76, 76, 78],
                                            maxBarThickness: 6
                                        },
                                        {
                                            label: "Талия ТОП-3",
                                            tension: 0.4,
                                            hidden: true,
                                            borderWidth: 0,
                                            pointRadius: 0,
                                            borderColor: "#8E66CE",
                                            borderWidth: 3,
                                            backgroundColor: gradientStroke2,
                                            fill: true,
                                            data: [70, 70, 70, 75, 78, 75, 76, 77, 78],
                                            maxBarThickness: 6
                                        },
                                        {
                                            label: "Талия ТОП-5",
                                            tension: 0.4,
                                            hidden: true,
                                            borderWidth: 0,
                                            pointRadius: 0,
                                            borderColor: "#CE6666",
                                            borderWidth: 3,
                                            backgroundColor: gradientStroke2,
                                            fill: true,
                                            data: [60, 60, 60, 65, 70, 65, 76, 77, 78],
                                            maxBarThickness: 6
                                        }
                                    ],
                                },

                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            cursor: "pointer",

                                            itemclick: function(e, legendItem, legend) {
                                                const index = legendItem.datasetIndex;
                                                const ci = legend.chart;
                                                if (ci.isDatasetVisible(index)) {
                                                    ci.hide(index);
                                                    legendItem.hidden = true;
                                                } else {
                                                    ci.show(index);
                                                    legendItem.hidden = false;
                                                }
                                            }
                                        }
                                    },
                                    interaction: {
                                        intersect: false,
                                        mode: 'index',
                                    },
                                    scales: {
                                        y: {
                                            grid: {
                                                drawBorder: false,
                                                display: true,
                                                drawOnChartArea: true,
                                                drawTicks: false,
                                                borderDash: [5, 5]
                                            },
                                            ticks: {
                                                display: true,
                                                padding: 10,
                                                min: 75,
                                                color: '#b2b9bf',
                                                font: {
                                                    size: 11,
                                                    family: "Open Sans",
                                                    style: 'normal',
                                                    lineHeight: 2
                                                },
                                            }
                                        },
                                        x: {
                                            grid: {
                                                drawBorder: false,
                                                display: false,
                                                drawOnChartArea: false,
                                                drawTicks: false,
                                                borderDash: [5, 5]
                                            },
                                            ticks: {
                                                display: true,
                                                color: '#b2b9bf',
                                                padding: 20,
                                                font: {
                                                    size: 11,
                                                    family: "Open Sans",
                                                    style: 'normal',
                                                    lineHeight: 2
                                                },
                                            }
                                        },
                                    },
                                },
                            });

                        }
                    </script>
                @endpush
