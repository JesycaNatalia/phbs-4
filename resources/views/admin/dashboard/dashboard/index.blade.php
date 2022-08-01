@extends('admin.layouts.dashboard')

@section('title', 'Dashboard')

@section('style')
<link rel="stylesheet" type="text/css" href="/app-assets/cssku/adashboard.css">
@endsection

@section('content')

<div class="row justify-content-center">
    <div class="">
        <center>
            <b>
                <h3>
                    DASHBOARD ADMIN
                </h3>
            </b>
        </center>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <!-- begin col-3 -->
        <div class="kotak col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <br>
                <div class="stats-info">
                    <center>
                        <h4>TOTAL WARGA</h4> <!-- total berapa kali kepala keluarga isi kuisoner -->
                        <hr>
                        <h3>{{$userr}}</h3>
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
                        <h4>Bulan</h4> <!-- total berapa kali kepala keluarga isi kuisoner -->
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


        <div class="kotak col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <br>
                <div class="stats-info">

                    <center>
                        <h4>Warga Isi Kuisioner</h4> <!-- total berapa kali kepala keluarga isi kuisoner -->
                        <hr>
                        <h3>{{$itung}}</h3>
                    </center>

                </div>
            </div>
        </div>

    </div>
</div>
<br>

<body class="h-screen bg-gray-100">

    <div class="container px-4 mx-auto">
        <div class="p-6 m-20 bg-white rounded shadow">
            {!! $chart->container() !!}
        </div>
    </div>

    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
</body>

@endsection

@section('script')
@endsection