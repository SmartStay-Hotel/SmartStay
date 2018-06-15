@extends('admin.layout')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Statistics</li>
@endsection
@section('css')
    <style>
    </style>
@endsection
@section('content')
    <div class="card"
         style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;"
         id="linechartparent">
        <h2 id="statisticsTitle"><i class="fas fa-calendar-alt" style="padding: 5px;"></i>Statistics</h2>
        <div class="flex-grid">
            <div id="wrapper" style=" position: relative; height: 40vh; width: 50%; flex: 1;">
                <canvas id="lastCheckin"></canvas>
            </div>

            <div id="wrapper" style=" position: relative; height: 40vh; width: 50%; flex: 1;">
                <canvas id="lastcheckout"></canvas>
            </div>
        </div>

        <div class="flex-grid">
            <div id="wrapper" style=" position: relative; height: 40vh; width: 50%; flex: 1;">
                <canvas id="lastOrders"></canvas>
            </div>

            <div id="wrapper" style=" position: relative; height: 40vh; width: 50%; flex: 1;">
                <canvas id="lastOrdersBuyers"></canvas>
            </div>
        </div>

    </div>

    <input type="button" value="add" class="btn btn-success" onclick="addData()">
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

    <script>
        $(document).ready(function () {
            $.get('dataStatistics', function (statistics) {
                var dayOfWeek = [];
                var dataPerDay = [];

                /*---Grafica Last Checkin---*/
                $.each(statistics.lastCheckin, function (key, value) {
                    dayOfWeek.push(key);
                    dataPerDay.push(value);
                });
                var canvasCheckin = $('#lastCheckin');
                var data = {
                    labels: dayOfWeek,
                    datasets: [
                        {
                            label: "Total Checkin",
                            backgroundColor: "rgba(75,192,192,0.2)",
                            borderColor: "rgba(75,192,192)",
                            borderWidth: 1,
                            data: dataPerDay,
                        }
                    ]
                };

                Chart.Bar(canvasCheckin, {
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

                /*---Grafica Last Checkout---*/
                dayOfWeek = [];
                dataPerDay = [];
                $.each(statistics.lastCheckout, function (key, value) {
                    dayOfWeek.push(key);
                    dataPerDay.push(value);
                });
                var canvasCheckout = $('#lastcheckout');
                var data = {
                    labels: dayOfWeek,
                    datasets: [
                        {
                            label: "Total Checkout",
                            backgroundColor: "rgba(75,192,192,0.2)",
                            borderColor: "rgba(75,192,192)",
                            borderWidth: 1,
                            data: dataPerDay,
                        }
                    ]
                };

                Chart.Bar(canvasCheckout, {
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

                /*---Grafica Last Checkin---*/
                dayOfWeek = [];
                dataPerDay = [];
                $.each(statistics.lastOrders, function (key, value) {
                    dayOfWeek.push(key);
                    dataPerDay.push(value);
                });
                var canvasLastOrders = $('#lastOrders');
                var data = {
                    labels: dayOfWeek,
                    datasets: [
                        {
                            label: "Total Orders",
                            backgroundColor: "rgba(75,192,192,0.2)",
                            borderColor: "rgba(75,192,192)",
                            borderWidth: 1,
                            data: dataPerDay,
                        }
                    ]
                };

                Chart.Bar(canvasLastOrders, {
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

                /*---Grafica Last Checkin---*/
                dayOfWeek = [];
                dataPerDay = [];
                $.each(statistics.lastOrdersBuyers, function (key, value) {
                    dayOfWeek.push(key);
                    dataPerDay.push(value);
                });
                var canvasLastOrdersBuyers = $('#lastOrdersBuyers');
                var data = {
                    labels: dayOfWeek,
                    datasets: [
                        {
                            label: "Total Orders Profit",
                            backgroundColor: "rgba(75,192,192,0.2)",
                            borderColor: "rgba(75,192,192)",
                            borderWidth: 1,
                            data: dataPerDay,
                        }
                    ]
                };

                Chart.Bar(canvasLastOrdersBuyers, {
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

                /*function addData() {
                    myLineChart.data.datasets[0].data[5] += 5;
                    myLineChart.update();
                }*/

            });
        });

    </script>
@endsection