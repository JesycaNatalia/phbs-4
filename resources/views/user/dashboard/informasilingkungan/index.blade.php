@extends('user.layouts.udashboard')

@section('title', 'Informasi Lingkungan')

@section('style')
<link rel="stylesheet" type="text/css" href="/app-assets/cssku/styleinfo.css">

@endsection

@section('content')

<h2 class="text-center"><b>Informasi Lingkungan Kamu Bulan Ini!</b></h2>

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="card-body">
                @if($rekap_user['min'] != 0 && $rekap_user['max'] != 0)
                <div class="row">
                    <div class="col-md-5">
                        <h4>Rata-Rata Pemantauan Tertinggi</h4>
                    </div>
                    <div class="col">
                        <h4>: {{round($rekap_user['max'], 2)}} || {{$rekap_user['pertanyaan_max']}}</h4>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-5">
                        <h4>Rata-Rata Pemantauan Terendah</h4>
                    </div>
                    <div class="col">
                        <h4>: {{round($rekap_user['min']),2}} || {{$rekap_user['pertanyaan_min']}}</h4>
                    </div>
                </div>
                <center>
                    <h5>Melihat rata-rata pemantauan terendah bulan ini, maka berikut diberikan saran kepada warga</h5>
                    <br>
                    <p>Saran : {{ $rekap_user['saran'] }}</p>
                </center>
                @else
                belum ngisi
                @endif
            </div>
        </div>
    </div>
    <!-- <div class="col">
        <div class="container px-4 mx-auto">
            <div class="p-6 m-20 bg-white rounded shadow">
                {!! $informasiLingkunganChart->container() !!}
            </div>
        </div>

        <script src="{{ $informasiLingkunganChart->cdn() }}"></script>
        {{ $informasiLingkunganChart->script() }}
    </div> -->

    <!-- <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <p class="card-title font-weight-bold">Informasi Hasil Pemantauan</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table class="" style="width: 100%">
                            <thead>
                                <tr>
                                    <th scope=""></th>
                                    <th scope=""></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Rata-Rata Pemantauan Tertinggi = {{$rekap_user['max']}} </td>
                                    <td class="text-success"> {{$rekap_user['pertanyaan_max']}}</td>
                                </tr>
                                <tr>
                                    <td>Rata-Rata Pemantauan Terendah = {{$rekap_user['min']}}</td>
                                    <td class="text-danger">{{$rekap_user['pertanyaan_min']}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <br> <br>
                        <center>
                            <h5>Melihat rata-rata pemantauan terendah bulan ini, maka berikut diberikan saran kepada warga</h5>
                            <hp>Saran : {{ $rekap_user['saran'] }}</hp>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
    <!-- </div> -->
    @endsection

    @section('script')
    @endsection