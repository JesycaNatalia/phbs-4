@extends('user.layouts.udashboard')

@section('title', 'Dashboard')

@section('style')
<link rel="stylesheet" type="text/css" href="/app-assets/cssku/udashboard.css">
@endsection

@section('content')

@php
$respon_users = $all_respon_users->where('kartu_keluarga_id', Auth::user()->kartu_keluarga_id); //ini aku taroh sini karna di view gabisa dikirim datanya untuk peruser

@endphp

@if($status != null)
<div class="card col-xl-11 col-md-6">
    <div class="card-header">
    </div>
    <div class="card-body">
        <center>
            <h4> {{ $status }}</h4>
        </center>
        <!-- jadi nanti ada pengkondisian disini, kalo udah ngisi berarti cardnya -->
    </div>
</div>
@endif

<div class="container">
    <div class="row">
        <!-- begin col-3 -->
        <div class="kotak col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <br>
                <div class="stats-info">
                    <center>
                        <h4>TOTAL ISI KUISONER</h4> <!-- total berapa kali kepala keluarga isi kuisoner -->
                        <hr>
                        <h3>{{ $respon_users->count() }} Kali</h3>
                    </center>
                </div>
            </div>
        </div>

        <div class="col-xl-1 col-md-6">
            <div class="widget widget-stats bg-blue">
                <br>
            </div>
        </div>

        <div class="kotak col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <br>
                <div class="stats-info">
                    @php
                    $rata_rata = 0;
                    $respon_total = 0;
                    if($respon_users->count() == 0){
                    $respon_total = 1;
                    } else {
                    $respon_total = $respon_users->count();
                    }
                    foreach($respon_users as $respon_user){
                    $rata_rata = $rata_rata + $respon_user->total_skor;
                    }
                    $rata_rata = $rata_rata / $respon_total;
                    @endphp
                    <center>
                        <h4>Rata-Rata </h4> <!-- total berapa kali kepala keluarga isi kuisoner -->
                        <hr>
                        <h3>{{ $rata_rata }}</h3>
                    </center>
                </div>
            </div>
        </div>

        <div class="col-xl-1 col-md-6">
            <div class="widget widget-stats bg-blue">
                <br>
            </div>
        </div>

        @if($respon_users != '[]')
        <div class="kotak col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <br>
                <div class="stats-info">
                    @php

                    $total_skor = $respon_users->last()->total_skor;
                    $perbandingan = ($respon_users->last()->skor_nol * 3) - (($kuisoner->where('ppemantauan_id', $respon_user->ppemantauan_id)->count() * 3) / 2);
                    // $perbandingan = ($kuisoner->where('ppemantauan_id', $respon_user->ppemantauan_id)->count() * 3) / 2;
                    @endphp
                    {{-- kode diatas untuk menghitung nilai sehat dan tidak --}}
                    @if($total_skor > $perbandingan )
                    <center>
                        <h4>KATEGORI</h4> <!-- total berapa kali kepala keluarga isi kuisoner -->
                        <hr>
                        <h3>Keluarga Sehat</h3>
                    </center>
                    @else
                    <center>
                        <h4>KATEGORI</h4> <!-- total berapa kali kepala keluarga isi kuisoner -->
                        <hr>
                        <h3>Keluarga Belum Sehat</h3>
                    </center>
                    @endif
                </div>
            </div>
        </div>
        @else
        <div class="kotak col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <br>
                <div class="stats-info">
                    <center>
                        <h4>KATEGORI</h4> <!-- total berapa kali kepala keluarga isi kuisoner -->
                        <hr>
                        <h3>Keluarga Sehat</h3>
                    </center>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
<br>
<br>
<br>

@if($all_respon_users != '[]')
<div class="container">
    @php
    $sehat = 0;
    $belum_sehat = 0;
    foreach($all_respon_users as $all_respon_user){ //ini logic buat ngitung data dari masing" user yang nantinya dimasukin ke variabel $sehat sama $belum_sehat
    // $perbandingan = (($kuisoner->count() * 3) / 2) - ($all_respon_user->skor_nol * 3);
    $rata_rata_skor = ($all_respon_user->total_skor)/($kuisoner - $all_respon_user->skor_nol);
    $perbandingan = '2';
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
    <div class="row">
        <div class="col">
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
                            text: "PIE CHART KATEGORI KELUARGA"
                        },
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
        </div>
    </div>
</div>
@endif

@endsection

@section('script')
@endsection