@extends('admin.layouts.dashboard')

@section('title', 'Grafik Bulanan')

@section('style')
@endsection

@section('content')
<?php

$dataPoints = array(
    array("label" => "Sehat", "y" => 64.02),
    array("label" => "Tidak Sehat", "y" => 12.55)
)

?>
<script>
    window.onload = function() {


        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Total Pengisian Kuisoner Bulan <?php echo $bulan->bulan ?>"
            },
            subtitles: [{
                text: "November 2017"
            }],
            data: [{
                type: "pie",
                yValueFormatString: "#,##0.00\"%\"",
                indexLabel: "{label} ({y})",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
</script>

<body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
@endsection

@section('script')
@endsection