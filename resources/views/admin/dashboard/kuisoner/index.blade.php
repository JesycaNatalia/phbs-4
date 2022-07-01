@extends('admin.layouts.dashboard')

@section('title', 'Tabel Kuisoner')

@section('style')
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="breadcrumbs-top">
            <h5 class="content-header-title float-left pr-1 mb-0">Kuisoner</h5>
            <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                    <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Tabel Kuisoner
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
                <p class="card-title font-weight-bold">Tabel Kuisoner</p>
                <a style="float:right" class="btn btn-primary" href="{{ route('admin.dashboard.kuisoner.create') }}/{{$id}}"><i class="bx bx-plus"></i><span class="menu-item text-truncate" data-i18n="Tambah Kuisioner">Tambah
                        Kuisoner</span></a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <table class="table datatable table-responsive" style="width: 100%">
                            <thead>
                                <tr>
                                    <th style="width: 5%">No</th>
                                    <th>Pertanyaan</th>
                                    <th class="text-center" style="width: 15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kuisoners as $kuisoner)
                                <tr>
                                    <td></td>
                                    <td>{{ $kuisoner->pertanyaan }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('admin.dashboard.jawaban.show', $kuisoner->id) }}" class="btn btn-primary">Jawaban</a>
                                            <a href="{{ route('admin.dashboard.saranpemantauan.show', $kuisoner->id) }}" class="btn btn-success">Saran</a>
                                            <a href="{{ route('admin.dashboard.kuisoner.edit', $kuisoner->id) }}" class="btn btn-info">Edit</a>
                                            <button class="btn btn-danger deleteButton" value="{{ $kuisoner->id }}">Hapus</button>
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

<div class="modal fade show" id="deleteModal">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title white">Hapus Kuisoner</h5>
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

        $("#deleteForm").attr("action", "{{ route('admin.dashboard.kuisoner.index') }}/" + id)
        $("#deleteModal").modal();
    });
</script>
@endsection