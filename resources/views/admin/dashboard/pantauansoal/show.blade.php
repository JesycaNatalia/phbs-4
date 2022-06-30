@extends('admin.layouts.dashboard')

@section('title', 'Laporan Pantauan Persoal')

@section('style')
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="breadcrumbs-top">
            <h5 class="content-header-title float-left pr-1 mb-0">Pemantauan</h5>
            <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                    <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Tabel Pemantauan
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
                <p class="card-title font-weight-bold">Tabel Pemantauan (isi ini sesuai nama pemantauansoal yg dipilih)</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table datatable table-responsive" style="width: 100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Bulan</th>
                                    <!-- opsi ini sesuai jawaban dari pertanyaan yg dipilih di dropdown -->
                                    <th>(opsi A)</th>
                                    <th>(opsi B)</th>
                                    <th>(opsi C)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>{{ session()->get('bulan.bulan') }}</td>
                                    <td>{{ session()->get('skor3') }}</td>
                                    <td>{{ session()->get('skor2') }}</td>
                                    <td>{{ session()->get('skor1') }}</td>
                                </tr>
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