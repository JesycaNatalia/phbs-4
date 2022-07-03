@extends('user.layouts.udashboard')

@section('title', 'Rekap Bulanan')

@section('style')
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="breadcrumbs-top">
            <h5 class="content-header-title float-left pr-1 mb-0">Rekap Informasi Bulanan</h5>
            <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                    <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Tabel Informasi Lingkungan
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <p class="card-title font-weight-bold">Tabel Laporan</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table datatable table-responsive" style="width: 100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Tahun</th>
                                    <th>Bulan</th>
                                    <th>Rata-Rata Tertinggi</th>
                                    <th>Rata-Rata Terendah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i = 0; $i < count($rekap_user); $i++)
                                <tr>
                                    <td></td>
                                    <td>{{$rekap_user[$i]['tahun']}}</td>
                                    <td>{{$rekap_user[$i]['bulan']}}</td>
                                    <td>{{$rekap_user[$i]['max']}} || {{$rekap_user[$i]['pertanyaan_max']}}</td>
                                    <td>{{$rekap_user[$i]['min']}} || {{$rekap_user[$i]['pertanyaan_min']}}</td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
@endsection