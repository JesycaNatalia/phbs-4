@extends('user.layouts.udashboard')

@section('title', 'Gform')

@section('style')

@endsection

@section('content')

<div class="card">
    <div class="card-header">
        Jawaban anda sudah direkam!
    </div>
    <div class="card-body">
        <center>
            <h5 class="card-title">Special title treatment</h5>
            @php
            $total_skor = $respon_users->last()->total_skor;
            $perbandingan = ($respon_users->last()->skor_nol * 3) - (($kuisoner * 3) / 2);
            $sehat = '';

            if($total_skor > $perbandingan ){
            $sehat = 'Keluarga anda masuk kategori hidup sehat';
            }else{
            $sehat = 'Keluarga anda belum masuk kategori hidup sehat';
            }

            @endphp
            <p class="card-text">Total Skor : {{$respon_users->last()->total_skor;}} | {{ $sehat }} pada bulan {{ $bulan->bulan }} </p>
            <p class="card-text">Rata-Rata Skor : {{$respon_users->last()->total_skor / ($kuisoner - $respon_users->last()->skor_nol);}} </p>
        </center>
        <a href="#" class="btn btn-primary">Kembali</a>
    </div>
</div>
@endsection

@section('script')

@endsection