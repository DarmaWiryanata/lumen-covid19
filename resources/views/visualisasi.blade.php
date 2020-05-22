@extends('master')

@section('title')
    Visualisasi
@endsection

@section('content')
    <!-- Page Content-->
<div class="page-content">
    <div class="row">
        <div class="col-lg-9"></div>
        <div class="col-lg-3">
            <div class="chart-container">
                <canvas id="myChart" width="100" height="100">
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
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',
    
            // The data for our dataset
            data: {
                labels: ["China", "India", "United States", "Indonesia", "Brazil", "Pakistan", "Nigeria", "Bangladesh", "Russia", "Japan"],
                datasets: [{
                    label: 'Population',
                    data: [1379302771, 1281935911, 326625791, 260580739, 207353391, 204924861, 190632261, 157826578, 142257519, 126451398],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)'
                    ]
                }]
            },
    
            // Configuration options go here
            options: {
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        boxWidth: 80,
                    }
                },
                tooltips: {
                    cornerRadius: 0,
                    caretSize: 0,
                    xPadding: 16,
                    yPadding: 10,
                    titleFontStyle: 'normal',
                    titleMarginBottom: 15,
                    mode: 'nearest'
                }
            }
        });
    </script>
@endsection