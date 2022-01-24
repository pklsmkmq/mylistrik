<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin MyListrik</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('assets_ds/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('assets_ds/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ url('assets_ds/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ url('assets_ds/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ url('assets_ds/css/app.css') }}">
    <link rel="shortcut icon" href="{{ url('assets_ds/images/favicon.svg" type="image/x-icon') }}">
    <link rel="stylesheet" href="{{ url('assets_ds/vendors/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets_ds/css/bootstrap-select.min.css') }}">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{ (auth()->user()->roles[0]->name == "admin") ? route('dashboard') : route('dashboardUser') }}"><h1>Dashboard MyListrik</h1></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item {{ (request()->segment(2) == '' || request()->segment(2) == 'dashboard') ? 'active' : '' }}">
                            <a href="{{ (auth()->user()->roles[0]->name == "admin") ? route('dashboard') : route('dashboardUser') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        @if (auth()->user()->roles[0]->name == "admin")
                            <li class="sidebar-item {{ (request()->segment(2) == 'pelanggan') ? 'active' : '' }}">
                                <a href="{{ route('pelanggan') }}" class='sidebar-link'>
                                    <i class="bi bi-people-fill"></i>
                                    <span>Pelanggan</span>
                                </a>
                            </li>
                        @else
                            <li class="sidebar-item {{ (request()->segment(2) == 'profil') ? 'active' : '' }}">
                                <a href="{{ route('profil') }}" class='sidebar-link'>
                                    <i class="bi bi-people-fill"></i>
                                    <span>Profil</span>
                                </a>
                            </li>
                        @endif

                        @if (auth()->user()->roles[0]->name == "admin")
                            <li class="sidebar-item {{ (request()->segment(2) == 'tarif') ? 'active' : '' }}">
                                <a href="{{ route('tarif') }}" class='sidebar-link'>
                                    <i class="bi bi-tags-fill"></i>
                                    <span>Tarif</span>
                                </a>
                            </li>
                        @else
                            <li class="sidebar-item {{ (request()->segment(2) == 'cekTagihan') ? 'active' : '' }}">
                                <a href="{{ route('cekTagihan') }}" class='sidebar-link'>
                                    <i class="bi bi-tags-fill"></i>
                                    <span>Cek Tagihan</span>
                                </a>
                            </li>
                        @endif

                        <li class="sidebar-item {{ (request()->segment(2) == 'pembayaran') ? 'active' : '' }}">
                            @if (auth()->user()->roles[0]->name == "admin")
                                <a href="{{ route('pembayaran') }}" class='sidebar-link'>
                            @else
                                <a href="{{ route('riwayatPembayaran') }}" class='sidebar-link'>
                            @endif    
                                <i class="bi bi-credit-card-2-front-fill"></i>
                                <span>Pembayaran</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('logout') }}" class="sidebar-link">
                                <i class="bi bi-box-arrow-in-left"></i>
                                <span>Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            @yield('content')
        </div>
    </div>
    <script src="{{ url('assets_ds/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ url('assets_ds/js/bootstrap.min.js') }}"></script>
    {{-- <script src="{{ url('assets_ds/js/bs4.js') }}"></script> --}}
    <script src="{{ url('assets_ds/js/popper.min.js') }}"></script>
    <script src="{{ url('assets_ds/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    {{-- <script src="{{ url('assets_ds/js/bootstrap.bundle.min.js') }}"></script> --}}

    <script src="{{ url('assets_ds/vendors/apexcharts/apexcharts.js') }}"></script>
    {{-- <script src="{{ url('assets_ds/js/pages/dashboard.js') }}"></script> --}}
    <script src="{{ url('assets_ds/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('assets_ds/js/bootstrap-select.js') }}"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script src="{{ url('assets_ds/js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            var dataX;
            $.get("{{ env('DATA_URL') }}", function(data, status){
                dataX = data;
                console.log(data);
                var optionsProfileVisit = {
                    annotations: {
                        position: 'back'
                    },
                    dataLabels: {
                        enabled:false
                    },
                    chart: {
                        type: 'bar',
                        height: 300
                    },
                    fill: {
                        opacity:1
                    },
                    plotOptions: {
                    },
                    series: [{
                        name: 'laporan santri',
                        data: dataX
                    }],
                    colors: '#435ebe',
                    xaxis: {
                        categories: ["Jun","Jul", "Aug","Sep","Oct"],
                    },
                }
                let optionsVisitorsProfile  = {
                    series: [70, 30],
                    labels: ['Male', 'Female'],
                    colors: ['#435ebe','#55c6e8'],
                    chart: {
                        type: 'donut',
                        width: '100%',
                        height:'350px'
                    },
                    legend: {
                        position: 'bottom'
                    },
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '30%'
                            }
                        }
                    }
                }
                
                var optionsEurope = {
                    series: [{
                        name: 'series1',
                        data: [310, 800, 600, 430, 540, 340, 605, 805,430, 540, 340, 605]
                    }],
                    chart: {
                        height: 80,
                        type: 'area',
                        toolbar: {
                            show:false,
                        },
                    },
                    colors: ['#5350e9'],
                    stroke: {
                        width: 2,
                    },
                    grid: {
                        show:false,
                    },
                    dataLabels: {
                        enabled: false
                    },
                    xaxis: {
                        type: 'datetime',
                        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z","2018-09-19T07:30:00.000Z","2018-09-19T08:30:00.000Z","2018-09-19T09:30:00.000Z","2018-09-19T10:30:00.000Z","2018-09-19T11:30:00.000Z"],
                        axisBorder: {
                            show:false
                        },
                        axisTicks: {
                            show:false
                        },
                        labels: {
                            show:false,
                        }
                    },
                    show:false,
                    yaxis: {
                        labels: {
                            show:false,
                        },
                    },
                    tooltip: {
                        x: {
                            format: 'dd/MM/yy HH:mm'
                        },
                    },
                };
                
                let optionsAmerica = {
                    ...optionsEurope,
                    colors: ['#008b75'],
                }
                let optionsIndonesia = {
                    ...optionsEurope,
                    colors: ['#dc3545'],
                }
                
                
                
                var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
                var chartVisitorsProfile = new ApexCharts(document.getElementById('chart-visitors-profile'), optionsVisitorsProfile)
                var chartEurope = new ApexCharts(document.querySelector("#chart-europe"), optionsEurope);
                var chartAmerica = new ApexCharts(document.querySelector("#chart-america"), optionsAmerica);
                var chartIndonesia = new ApexCharts(document.querySelector("#chart-indonesia"), optionsIndonesia);
                
                chartIndonesia.render();
                chartAmerica.render();
                chartEurope.render();
                chartProfileVisit.render();
                chartVisitorsProfile.render();
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            
            function formatDate(date) {
                var d = new Date(date),
                    month = '' + (d.getMonth() + 1),
                    day = '' + d.getDate(),
                    year = d.getFullYear();

                if (month.length < 2) 
                    month = '0' + month;
                if (day.length < 2) 
                    day = '0' + day;

                return [year, month, day].join('-');
            }

            $("#bla").change(function() {
                var today = new Date();
                // console.log($("#bla").val());
                // console.log(formatDate(today));

                if ($("#bla").val() == formatDate(today)) {
                    $("#blok-kegiatan").css("display","block");
                    $("#kegiatan").val("on");
                } else {
                    $("#blok-kegiatan").css("display","none");
                    $("#kegiatan").val("off");
                }
            })
        });
    </script>
</body>

</html>