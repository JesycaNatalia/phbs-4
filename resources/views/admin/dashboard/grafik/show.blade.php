@extends('admin.layouts.dashboard')

@section('title', 'Dashboard')

@section('style')
@endsection

@section('content')
<div class="card col-xl-11 col-md-6">
    <div class="card-header">
    </div>
    <div class="card-body">
        <center>
            <h4> {{$all_respon_users->first()->ppemantauan->namapemantauan}} </h4>
        </center>
    </div>
</div>

@php
$januari = 0;
$februari = 0;
$maret = 0;
$april = 0;
$mei = 0;
$juni = 0;
$juli = 0;
$agustus = 0;
$september = 0;
$oktober = 0;
$november = 0;
$desember = 0;
foreach($all_respon_users as $all_respon_user){ //ini logic buat ngitung data dari masing" user yang nantinya dimasukin ke variabel $sehat sama $belum_sehat
if($all_respon_user->bulan->bulan == 'Januari'){
$januari++;
} elseif ($all_respon_user->bulan->bulan == 'Februari') {
$februari++;
} elseif ($all_respon_user->bulan->bulan == 'Maret') {
$maret++;
} elseif ($all_respon_user->bulan->bulan == 'April') {
$april++;
} elseif ($all_respon_user->bulan->bulan == 'Mei') {
$mei++;
} elseif ($all_respon_user->bulan->bulan == 'Juni') {
$juni++;
} elseif ($all_respon_user->bulan->bulan == 'Juli') {
$juli++;
} elseif ($all_respon_user->bulan->bulan == 'Agustus') {
$agustus++;
} elseif ($all_respon_user->bulan->bulan == 'September') {
$september++;
} elseif ($all_respon_user->bulan->bulan == 'Oktober') {
$oktober++;
} elseif ($all_respon_user->bulan->bulan == 'November') {
$november++;
} elseif ($all_respon_user->bulan->bulan == 'Desember') {
$desember++;
}
}


$total_warga = $user;

$dataPoints = array(
array("label" => "Januari", "y" => $januari / $total_warga * 100),
array("label" => "Februari", "y" => $februari / $total_warga * 100),
array("label" => "Maret", "y" => $maret / $total_warga * 100),
array("label" => "April", "y" => $april / $total_warga * 100),
array("label" => "Mei", "y" => $mei / $total_warga * 100),
array("label" => "Juni", "y" => $juni / $total_warga * 100),
array("label" => "Juli", "y" => $juli / $total_warga * 100),
array("label" => "Agustus", "y" => $agustus / $total_warga * 100),
array("label" => "September", "y" => $september / $total_warga * 100),
array("label" => "Oktober", "y" => $oktober / $total_warga * 100),
array("label" => "November", "y" => $november / $total_warga * 100),
array("label" => "Desember", "y" => $desember / $total_warga * 100)
)

@endphp
<script>
    window.onload = function() {


        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Total Pengisian Kuisoner Perbulan"
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