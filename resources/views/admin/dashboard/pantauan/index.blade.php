@extends('admin.layouts.dashboard')

@section('title', 'Laporan')

@section('style')
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="breadcrumbs-top">
            <h5 class="content-header-title float-left pr-1 mb-0">Pantauan</h5>
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
                                    <th>Nama Pemantauan</th>
                                    <th>Nama Kepala Keluarga</th>
                                    <th>Nama Responden</th>
                                    <th>No KK</th>
                                    <th>Bulan</th>
                                    <th>Skor</th>
                                    <th>Status</th> <!-- //disini nanti status buat nentuin dia termasuk keluarga hidup bersih apa ngga -->
                                    <a href="#"></a>
                                    <th class="text-center" style="width: 15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($respon_users as $respon_user)
                                @php
                                $total_skor = $respon_user->total_skor;
                                $perbandingan = ($respon_user->skor_nol * 3) - (($kuisoner * 3) / 2);
                                @endphp
                                <tr>
                                    <td></td>
                                    <td>{{ $respon_user->ppemantauan->namapemantauan }}</td>
                                    <td>
                                        @foreach($respon_user->kartu_keluarga->status_keluarga as $keluarga)
                                        @if($keluarga->user->status_kepala == 'ya')
                                        {{$keluarga->user->nama}}
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $respon_user->user->nama }}</td>
                                    <td>{{ $respon_user->kartu_keluarga->no_kk }}</td>
                                    <td>{{ $respon_user->bulan->bulan }}</td>
                                    <td>{{ $respon_user->total_skor }}</td>
                                    <td>
                                        @php
                                        $total_skor = $respon_user->total_skor;
                                        $rata_rata_skor = ($respon_user->total_skor)/($kuisoner - $respon_user->skor_nol);
<<<<<<< HEAD
                                        $perbandingan = '2';
=======
                                        $perbandingan = '2 ';
>>>>>>> 68686e63146df66fec8192bca19d644aa63fa804
                                        $sehat = '';

                                        if($rata_rata_skor >= $perbandingan ){
                                        $sehat = 'Sehat';
                                        }else{
                                        $sehat = 'Belum Sehat';
                                        }
                                        @endphp
                                        {{$sehat}}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.dashboard.pantauan.show', $respon_user->bulan->id) }}?user_id={{ $respon_user->kartu_keluarga_id }}&ppemantauan_id={{ $respon_user->ppemantauan_id }}" class="btn btn-info">Detail</a>
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

<div class="modal fade show" id="deleteModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title white">Hapus Bulan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                </button>
            </div>
            <form id="deleteForm" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>Apa anda yakin ingin menghapus data ini?, data yang telah <b>di hapus</b> tidak dapat <b>di
                            kembalikan</b>.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>
                    <button type="submit" class="btn btn-danger ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Iya, hapus</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection