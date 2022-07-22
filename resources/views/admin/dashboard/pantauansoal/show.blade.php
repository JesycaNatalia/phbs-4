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
                <p class="card-title font-weight-bold">Tabel Pemantauan {{ session()->get('pertanyaan') }}</p>
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
                                    <!-- opsi ini sesuai jawaban dari pertanyaan yg dipilih di dropdown -->
                                    @foreach(session()->get('isi_kuisoner') as $isi_kuisoners)
                                    <th>{{$isi_kuisoners->jawaban}}</th>
                                    @endforeach
                                    <th>Rata-Rata</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $bulans = session()->get('bulans');
                                @endphp
                                @for($i=0; $i< count($bulans); $i++) <tr>
                                    <!--  // [Januari, Februari] -->
                                    <td></td>
                                    <td>{{ $bulans[$i] -> tahun }}</td>
                                    <td>{{ $bulans[$i] -> bulan }}</td>
                                    @php
                                    $skors = session()->get('skors'); // [0 => [0=>2, 1=>1,2=> 2,3 => 2], 1 => [1,0,1,1]]
                                    @endphp
                                    @for($j=0; $j< count($skors[$i]); $j++) <td>{{ $skors[$i][$j] }}</td>
                                        @endfor
                                        <!-- <td>(ini rata rata cara ngitungnya ((jumlah user pilih opsiA X Skor opsi A)+(jumlah user pilih opsiB X Skor opsi B)+(jumlah user pilih opsiC X Skor opsi C))/Jumlah user yang ngisi kuisoner di bulan itu)</td> -->
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