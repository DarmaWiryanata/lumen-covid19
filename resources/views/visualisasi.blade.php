@extends('master')

@section('title')
    Visualisasi
@endsection

@section('content')
    <!-- Page Content-->
<div class="page-content">
    <div class="row">
        {{-- <div class="col-lg-9"></div> --}}
        <div class="col-sm-3">
            <div class="chart-container">
                <canvas id="myChart-1" width="100" height="100">
                    <p align="center">Your browser does not support the canvas element.</p>
                </canvas>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="chart-container">
                <canvas id="myChart-2" width="100" height="100">
                    <p align="center">Your browser does not support the canvas element.</p>
                </canvas>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="chart-container">
                <canvas id="myChart-3" width="100" height="100">
                    <p align="center">Your browser does not support the canvas element.</p>
                </canvas>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="chart-container">
                <canvas id="myChart-4" width="100" height="100">
                    <p align="center">Your browser does not support the canvas element.</p>
                </canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        var ctx1 = document.getElementById('myChart-1').getContext('2d');
        var chart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ["SD", "SMP", "SMA", "S1"],
                datasets: [{
                    label: 'Pengetahuan Cukup',
                    data: [25, 55, 50, 70],
                    backgroundColor: 'rgba(54, 162, 235, 0.6)'
                }, {
                    label: 'Pengetahuan Kurang',
                    data: [34, 12, 86, 29],
                    backgroundColor: 'rgba(255, 99, 132, 0.6)'
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Berdasarkan Pendidikan Terakhir'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    xAxes: [{
                        stacked: true
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });

        var ctx2 = document.getElementById('myChart-2').getContext('2d');
        var chart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ["Laki-laki", "Perempuan"],
                datasets: [{
                    label: 'Pengetahuan Cukup',
                    data: [50, 150],
                    backgroundColor: 'rgba(54, 162, 235, 0.6)'
                }, {
                    label: 'Pengetahuan Kurang',
                    data: [250, 100],
                    backgroundColor: 'rgba(255, 99, 132, 0.6)'
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Berdasarkan Jenis Kelamin'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    xAxes: [{
                        stacked: true
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });
        
        var ctx3 = document.getElementById('myChart-3').getContext('2d');
        var chart3 = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: ["12-20", "21-50", "50-75"],
                datasets: [{
                    label: 'Pengetahuan Cukup',
                    data: [50, 120, 30],
                    backgroundColor: 'rgba(54, 162, 235, 0.6)'
                }, {
                    label: 'Pengetahuan Kurang',
                    data: [200, 100, 50],
                    backgroundColor: 'rgba(255, 99, 132, 0.6)'
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Berdasarkan Umur'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    xAxes: [{
                        stacked: true
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });
        
        var ctx4 = document.getElementById('myChart-4').getContext('2d');
        var chart4 = new Chart(ctx4, {
            type: 'bar',
            data: {
                labels: ["Pelajar/Mahasiswa", "Tidak/belum bekerja", "Lain-lain"],
                datasets: [{
                    label: 'Pengetahuan Cukup',
                    data: [50, 120, 30],
                    backgroundColor: 'rgba(54, 162, 235, 0.6)'
                }, {
                    label: 'Pengetahuan Kurang',
                    data: [200, 100, 50],
                    backgroundColor: 'rgba(255, 99, 132, 0.6)'
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Berdasarkan Pekerjaan'
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    xAxes: [{
                        stacked: true
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }
        });
    </script>
@endsection