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
            <button type="button" class="btn btn-outline-danger">
                <h4>
                    {{ $status }}
                </h4>
            </button>

        </center>
        <!-- jadi nanti ada pengkondisian disini, kalo udah ngisi berarti cardnya -->
    </div>
</div>
@else
<div class="card col-xl-11 col-md-6">
    <div class="card-header">
    </div>
    <div class="card-body">
        <center>

            <h4>
                Hasil Pemantauan
            </h4>


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
                        <h3>{{ round($rata_rata ),2}}</h3>
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
                    <center>
                        <h4>BULAN AKTIF</h4> <!-- total berapa kali kepala keluarga isi kuisoner -->
                        <hr>
                        <h3>{{$bulan->bulan}}</h3>
                    </center>
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-md-6">
            <div class="widget widget-stats bg-blue">
                <br>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        @if($respon_users != '[]')
        <div class="kotak col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <br>
                <div class="stats-info">
                    @php
                    $total_skor = $respon_user->total_skor;
                    $rata_rata_skor = ($respon_user->total_skor)/($kuisoner->where('ppemantauan_id', $respon_user->ppemantauan_id)->count() - $respon_user->skor_nol);
                    $perbandingan = '2';
                    @endphp
                    {{-- kode diatas untuk menghitung nilai sehat dan tidak --}}
                    @if($rata_rata_skor >= $perbandingan)
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
                        <h3>Belum Ada Data</h3>
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
<div class="row">
    <div class="form-group">
        <label for="">Pilih</label>
        <select name="bulan" id="bulan">
            @foreach ($bulann as $bulanns)
            <option value="{{$bulanns-> bulan}}">{{ $bulanns -> bulan}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="container" id="chart">
    <div class="row">
        @if($all_respon_users != '[]')
        <!-- manggil hasil -->
        <div class="col-md-6">
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
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>
        @else
        <div class="col-md-6">
            <h1> BELUM ADA DATA</h1>
        </div>
        @endif


        <div class="col-md-6">
            <div class="container px-4 mx-auto">
                <div class="p-6 m-20 bg-white rounded shadow">
                    {!! $udashboardChart->container() !!}
                </div>
            </div>

            <script src="{{ $udashboardChart->cdn() }}"></script>
            {{ $udashboardChart->script() }}
        </div>

    </div>


</div>

<body>
</body>



@endsection

@section('script')
<script>
    console.log("show")
    $(function() {
        $("#bulan").change(function() {
            var bulan = this.value
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $.ajax({
                url: "{{route('user.dashboard.rata2bulan')}}",
                data: {
                    bulan: bulan
                },
                method: 'POST',
                dataType: 'json',
                success: function(data) {
                    console.log(JSON.stringify(data))
                }
            })
        })
    })
</script>
@endsection