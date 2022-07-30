@extends('user.layouts.udashboard')

@section('title', 'Gform')

@section('style')
<link rel="stylesheet" type="text/css" href="/app-assets/cssku/styledetail.css">

@endsection

@section('content')
<h2 class="text-center"><b>Ups, Kamu Sudah Mengisi Pantauan Bulan Ini !</b> <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-emoji-smile" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
        <path d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683zM7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z" />
    </svg>
</h2>

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="card-body">
                @php
                $total_skor = $respon_users->last()->total_skor;
                $rata_rata_skor = ($respon_users->last()->total_skor)/($kuisoner - $respon_users->last()->skor_nol);
                $perbandingan = '2';
                $sehat = '';

                if($rata_rata_skor >= $perbandingan){
                $sehat = 'Keluarga anda masuk kategori hidup sehat';
                }else{
                $sehat = 'Keluarga anda belum masuk kategori hidup sehat';
                }

                @endphp
                <div class="row">
                    <div class="col-md-3">
                        <h4>Total Skor</h4>
                    </div>
                    <div class="col">
                        <h4>: {{$respon_users->last()->total_skor;}}</h4>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">
                        <h4>Rata-Rata</h4>
                    </div>
                    <div class="col">
                        <h4>: {{round($respon_users->last()->total_skor / ($kuisoner - $respon_users->last()->skor_nol),2);}}</h4>
                    </div>
                </div>
                <center>
                    <h4>
                        {{ $sehat }} pada bulan {{ $bulan->bulan }}
                    </h4>
                </center>
            </div>
        </div>
    </div>
</div>
<!-- <div class="card">
    <div class="card-header">
        Anda Sudah Isi Kuisoner Bulan {{ $bulan->bulan }}!
    </div>
    <div class="card-body">
        <center>
            <h5 class="card-title">Special title treatment</h5>
            @php
            $total_skor = $respon_users->last()->total_skor;
            $rata_rata_skor = ($respon_users->last()->total_skor)/($kuisoner - $respon_users->last()->skor_nol);
            $perbandingan = '2';
            $sehat = '';

            if($rata_rata_skor >= $perbandingan){
            $sehat = 'Keluarga anda masuk kategori hidup sehat';
            }else{
            $sehat = 'Keluarga anda belum masuk kategori hidup sehat';
            }

            @endphp
            <p class="card-text">Total Skor : {{$respon_users->last()->total_skor;}} | {!! $sehat !!} </p>
            <p class="card-text">Rata-Rata Skor : {{$respon_users->last()->total_skor / ($kuisoner - $respon_users->last()->skor_nol);}} </p>
        </center>
        <a href="#" class="btn btn-primary">Kembali</a>
    </div>
</div> -->
@endsection

@section('script')

@endsection