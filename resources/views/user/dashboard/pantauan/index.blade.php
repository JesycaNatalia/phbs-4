@extends('user.layouts.udashboard')

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
                                    <th>Jenis Pemantauan</th>
                                    <th>Tahun</th>
                                    <th>Bulan</th>
                                    <th>Skor</th>
                                    <th>Status</th> <!-- //disini nanti status buat nentuin dia termasuk keluarga hidup bersih apa ngga -->
                                    <th class="text-center" style="width: 15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($respon_users as $respon_user)
                                @php 
                                $total_skor = $respon_user->total_skor;
                                $perbandingan = ($respon_user->skor_nol * 3) - ($kuisoner->where('ppemantauan_id', $respon_user->ppemantauan_id)->count() * 3) / 2; //ini *3 karna 3 adalah skor tertinggi dan dibagi 2 untuk menghitung nilai tengahnya buat jadi pacuan sehat dan tidak
                                @endphp
                                {{-- kode diatas untuk menghitung nilai sehat dan tidak --}}
                                <tr>
                                    <td></td>
                                    <td>{{ $respon_user->ppemantauan->namapemantauan }}</td>
                                    <td>{{ $respon_user->bulan->tahun }}</td>
                                    <td>{{ $respon_user->bulan->bulan }}</td>
                                    <td>{{ $respon_user->total_skor }}</td>
                                    <td>@if($total_skor > $perbandingan) 
                                            Sehat 
                                        @else 
                                            Belum Sehat 
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/dashboard/gform_result/{{$respon_user->bulan_id}}?ppemantauan_id={{$respon_user->ppemantauan_id}}" class="btn btn-info">Detail</a>
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
<script>
    $(document).on("click", ".deleteButton", function() {
        let id = $(this).val();

        $("#deleteForm").attr("action", "{{ route('admin.dashboard.bulan.index') }}/" + id)
        $("#deleteModal").modal();
    });
</script>
@endsection