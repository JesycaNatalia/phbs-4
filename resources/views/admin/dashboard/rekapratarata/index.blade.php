@extends('admin.layouts.dashboard')

@section('title', 'Laporan Pantauan Persoal')

@section('style')
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="breadcrumbs-top">
            <h5 class="content-header-title float-left pr-1 mb-0">Rekap Rata-Rata Pemantauan</h5>
            <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                    <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Laporan Bulanan
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
                                    <th>Pemantauan</th>
                                    <th>Rata-Rata</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for($i = 0; $i < count($rekap_pemantauan); $i++)
                                
                                <tr>
                                    <td></td>
                                    <td>{{ $rekap_pemantauan[$i]['tahun'] }}</td>
                                    <td>{{ $rekap_pemantauan[$i]['bulan'] }}</td>
                                    <td>
                                        @for($j = 0; $j < count($rekap_pemantauan[$i]['data']); $j++)
                                        <table>
                                            <tr>
                                                <td>{{ $rekap_pemantauan[$i]['data'][$j]['pertanyaan'] }}</td>
                                            </tr>
                                        </table>
                                        @endfor
                                    </td>
                                    <td>
                                        @for($j = 0; $j < count($rekap_pemantauan[$i]['data']); $j++)
                                        <table>
                                            <tr>
                                                <td>{{ $rekap_pemantauan[$i]['data'][$j]['rata_rata'] }}</td>
                                            </tr>
                                        </table>
                                        @endfor
                                    </td>
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