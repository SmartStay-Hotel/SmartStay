@extends('admin.layout')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Statistics</li>
@endsection
@section('css')
    <style>
    </style>
@endsection
@section('content')
    <div class="card" style= "box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;" id="linechartparent">
    <h2 id="statisticsTitle"><i class="fas fa-calendar-alt" style="padding: 5px;"></i>Statistics</h2>
        <div class="flex-grid">
        <div id="wrapper" style= " position: relative; height: 40vh; width: 50%; flex: 1;">
            <canvas id="myChart"></canvas>
        </div>

        <div id="wrapper" style= " position: relative; height: 40vh; width: 50%; flex: 1;">
            <canvas id="myChart2"></canvas>
        </div>
        </div>

        <div class="flex-grid">
            <div id="wrapper" style= " position: relative; height: 40vh; width: 50%; flex: 1;">
                <canvas id="myChart3"></canvas>
            </div>

            <div id="wrapper" style= " position: relative; height: 40vh; width: 50%; flex: 1;">
                <canvas id="myChart4"></canvas>
            </div>
        </div>

    </div>

    <input type="button" value="add" class="btn btn-success" onclick="addData()">
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

    <script>
        //FIRST CHART
        var canvas = document.getElementById('myChart');
        var data = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "Orders",
                    backgroundColor: "rgba(75,192,192,0.2)",
                    borderColor: "rgba(75,192,192)",
                    borderWidth:1,
                    data: [6, 15, 0, 20, 12, 16, 10],
                }
            ]
        };

        function addData(){
            myLineChart.data.datasets[0].data[5] = myLineChart.data.datasets[0].data[5] + 5;
            myLineChart.update();
        }

        var option = {
            showLines: true
        };
        var myLineChart = Chart.Bar(canvas,{
            data:data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        barPercentage: 0.4,

                        }],

                    yAxes: [{
                        ticks: {
                            stepSize: 1
                        }
                    }]
                }
            }

        });

    </script>

    <script>

        // SECOND CHART
        var canvas = document.getElementById('myChart2');
        var data = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "Orders",
                    borderColor: "#FFA54C",
                    borderWidth:2,
                    data: [6, 15, 0, 20, 12, 16, 10],
                    fill: false,
                }
            ]
        };


        var myLineChart = Chart.Line(canvas,{
            data:data,
            options: {
                title: {
                    display: true,
                    text: 'Custom Chart Title',
                },
                legend: {
                    display: false,
                },
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        barPercentage: 0.4,

                    }],

                    yAxes: [{
                        ticks: {
                            stepSize: 1
                        }
                    }]
                }
            }

        });

    </script>

    <script>

        // THIRD CHART
        var canvas = document.getElementById('myChart3');
        var data = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "Orders",
                    borderColor: "#9F6FFF",
                    borderWidth:2,
                    data: [6, 15, 0, 20, 12, 16, 10],
                    steppedLine: true,
                    fill: false,
                }
            ]
        };


        var myLineChart = Chart.Line(canvas,{
            data:data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        barPercentage: 0.4,

                    }],

                    yAxes: [{
                        ticks: {
                            stepSize: 1
                        }
                    }]
                }
            }

        });

    </script>

    <script>

        // FOUTH CHART
        var data = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "Orders",
                    backgroundColor: "rgba(153, 204, 0, 0.2)",
                    borderColor: "rgba(153, 204, 0)",
                    borderWidth:1,
                    data: [6, 15, 0, 20, 12, 16, 10],
                }
            ]
        };

        var ctx = document.getElementById("myChart4").getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'horizontalBar',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        barPercentage: 0.4,

                    }],

                    yAxes: [{
                        ticks: {
                            stepSize: 1
                        }
                    }]
                }
            }

        });

    </script>
@endsection