@extends('admin.layouts.dashboard')

@section('title', 'Grafik Bulanan')

@section('style')
@endsection

@section('content')

@if($all_respon_users != '[]')
@php
$sehat = 0;
$belum_sehat = 0;
foreach($all_respon_users as $all_respon_user){ //ini logic buat ngitung data dari masing" user yang nantinya dimasukin ke variabel $sehat sama $belum_sehat
$rata_rata_skor = ($all_respon_user->total_skor)/($kuisoner->where('ppemantauan_id', $all_respon_user->ppemantauan_id)->count() - $all_respon_user->skor_nol);
$perbandingan = '2';
// $perbandingan = (($kuisoner->count() * 3) / 2) - ($all_respon_user->skor_nol * 3);
$total_skor_user = 0;
foreach($all_respon_users as $keluarga_respon){
if($keluarga_respon->kartu_keluarga_id == $all_respon_user->kartu_keluarga_id){
$total_skor_user = $total_skor_user + $keluarga_respon->total_skor;
}
}
if($rata_rata_skor >= $perbandingan){
$sehat++;
} else {
$belum_sehat++;
}
}
$total_warga = $sehat + $belum_sehat;
$rata_sehat = $sehat / $total_warga * 100;
$rata_belum_sehat = $belum_sehat / $total_warga * 100;
@endphp
<?php

$dataPoints = array(
    array("label" => "Sehat", "y" => $rata_sehat),
    array("label" => "Belum Sehat", "y" => $rata_belum_sehat)
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
@else
    <p>Belum ada data</p>
@endif

<body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
@endsection

@section('script')
@endsection