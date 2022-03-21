@extends('layouts.master')
@section('title')
Admin DashBoard | Pie Chart
@endsection
@section('sidebar')
<div class="row ">
    <div class="col-sm-6 ml-4" id="chart">
        <div class="card" style="min-height: 485px">
            <div class="card-header card-header-text">
                <a href="{{ url('/in_stock_pdf/pdf') }}" class="btn btn-success "><span
                        class="font-weight-bold text-reset">
                        InStock Details</span>
                    <i class="bx bxs-download"></i>
                </a>
            </div>
            <div class="card-content table-responsive ">
                <table class="table table-hover ">
                    <thead class="text-danger">
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Qr COde</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Instocks as $in)
                        <tr>
                            {{-- <td>{{ $in->id }}</td> --}}
                            <td>{{ $in->name }}</td>
                            <td>{{ $in->quantity }}</td>
                            <td>
                                <div class="qrcode">
                                    {!! QrCode::size(60)->generate(
                                    " Product Name:$in->name, Quantity:$in->quantity"
                                    ); !!}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="piechart_3d" class="col-sm-6 " style="width: 600px; height: 485px;"></div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Products', 'Quantity'],
            <?php echo $chartData?>
        ]);

        var options = {
          title: 'Product Details',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
</script>

<script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js">
</script>
@endsection