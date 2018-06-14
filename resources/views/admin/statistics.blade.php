@extends('admin.layout')
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Statistics</li>
@endsection
@section('css')
    <style>
    </style>
@endsection
@section('content')
    <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding: 10px;">
    <h2 id="statisticsTitle"><i class="fas fa-calendar-alt" style="padding: 5px;"></i>Statistics</h2>
        <canvas id="myChart"></canvas>

    </div>

    <input type="button" value="add" class="btn btn-success" onclick="addData()">
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

    <script>

        var canvas = document.getElementById('myChart');
        var data = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
                {
                    label: "My First dataset",
                    backgroundColor: "rgba(75,192,192,0.4)",
                    borderColor: "rgba(75,192,192,1)",
                    data: [65, 59, 80, 0, 56, 55, 40],
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
            options:option

        });

    </script>
@endsection