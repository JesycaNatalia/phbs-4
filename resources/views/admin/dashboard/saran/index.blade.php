@extends('admin.layouts.dashboard')

@section('title', 'Laporan Pantauan Persoal')

@section('style')
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="breadcrumbs-top">
            <h5 class="content-header-title float-left pr-1 mb-0">Data Saran</h5>
            <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                    <li class="breadcrumb-item">
                        <a href="javascript:history.back(-1);">
                            <i class="fa fa-arrow-circle-left"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item active">Tabel Data Saran
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
                <a style="float:right" class="btn btn-primary" href="{{ route('admin.dashboard.saranpemantauan.create') }}/{{$id}}"><i class="bx bx-plus"></i><span class="menu-item text-truncate" data-i18n="Tambah Saran">Tambah Saran</span></a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table datatable table-responsive" style="width: 100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <!-- ini pemantauannya yang sesuai dropdown di laporan persoal/ pertanyaan dari pemantauan phbbs -->
                                    <th>Saran</th>
                                    <th class="text-center" style="width: 15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($saran_pemantauans as $saran_pemantauan)
                                <tr>
                                    <td></td>
                                    <td>{{ $saran_pemantauan->saran}}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.dashboard.saranpemantauan.edit', $saran_pemantauan->id) }}" class="btn btn-info">Edit</a>
                                            <button class="btn btn-danger deleteButton" value="{{ $saran_pemantauan->id }}">Hapus</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
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