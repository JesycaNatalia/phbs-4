@extends('user.layouts.udashboard')

@section('title', 'Informasi Lingkungan')

@section('style')
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="breadcrumbs-top">
            <h5 class="content-header-title float-left pr-1 mb-0">Pemantauan Lingkungan</h5>
            <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                    <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Informasi Lingkungan
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        Pemantauan Lingkungan RT/RW Makmur Bulan !
    </div>
    <div class="card-body">
        <center>
            <h5 class="card-title">Hasil Pemantauan </h5>
            <p class="card-text">Rata-Rata Pemantauan Tertinggi : (skor & nama pemantauannya)</p>
            <p class="card-text">Rata-Rata Pemantauan Terendah : (skor & nama pemantauannya)</p>
        </center>

        <br>

        <center>
            <h5>Melihat rata-rata pemantauan terendah bulan ini, maka berikut diberikan saran kepada warga</h5>
            <hp>Saran : (Ini ambil saran yang diinput bareng tabel kuisoner, saran yg muncul sesuai sama rata-rata terendah)</hp>
        </center>

    </div>
</div>
<a href="#" class="btn btn-primary">Kembali</a>
@endsection

@section('script')
@endsection