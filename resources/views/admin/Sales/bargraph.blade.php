@extends('layouts.master')
@section('title')
Admin DashBoard | Sales Graph
@endsection

@section('sidebar')
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Sales', 'Price', 'Quantity','Total'],
          <?php echo $barData?>     
        ]);

        var options = {
          chart: {
            title: 'Sales Details',
            subtitle: 'Daily Sales Chart',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 1140px; height: 500px; margin-left: 6%; margin-top: 2%"></div>

@endsection