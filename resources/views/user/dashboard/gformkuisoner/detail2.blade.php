@extends('user.layouts.udashboard')

@section('title', 'Gform')

@section('style')

@endsection

@section('content')

<div class="card">
    <div class="card-header">
        Anda Sudah Isi Kuisoner Bulan {{ $bulan->bulan }}!
    </div>
    <div class="card-body">
        <center>
            <h5 class="card-title">Special title treatment</h5>
            @php 
            $total_skor = $respon_users->last()->total_skor;
            $perbandingan = ($kuisoner * 3) / 2; //ini *3 karna 3 adalah skor tertinggi dan dibagi 2 untuk menghitung nilai tengahnya buat jadi pacuan sehat dan tidak
            $sehat = '';
            
            if($total_skor > $perbandingan ){
                $sehat = 'Keluarga anda masuk kategori hidup sehat';
            }else{
                $sehat = 'Keluarga anda <b style="color:red">belum</b> masuk kategori hidup sehat';
            }
            
            @endphp
            <p class="card-text">Total Skor : {{$respon_users->last()->total_skor;}} | {!! $sehat !!} </p>
        </center>
        <a href="#" class="btn btn-primary">Kembali</a>
    </div>
</div>
@endsection

@section('script')

@endsection