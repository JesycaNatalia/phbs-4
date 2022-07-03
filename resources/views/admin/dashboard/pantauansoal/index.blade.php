@extends('admin.layouts.dashboard')

@section('title', 'Laporan Pantauan Persoal')

@section('style')
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="breadcrumbs-top">
            <h5 class="content-header-title float-left pr-1 mb-0">Pantauan Per Soal</h5>
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
                <form action="{{ route('admin.dashboard.pantauansoal.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="category" class="form-label">Pilih Kategori Pemantauan</label>
                        <select class="form-control" name="pemantauansoal" id="category">
                            <option hidden>--- Jenis Pemantauan ---</option>
                            @foreach($ppemantauans as $ppemantauan)
                            <option value="{{ $ppemantauan->namapemantauan }}">{{ $ppemantauan->namapemantauan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="course" class="form-label">Tahun</label>
                        <select class="form-control" name="tahun" id="category">
                            <option hidden>--- Pilih Tahun ---</option>
                            @foreach ($tahuns as $tahun)
                            <option value="{{ $tahun }}">{{ $tahun }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="btn-group btn-group-sm">
                        <button type="submit" class="btn btn-primary">Cari</button>
                        <!-- <a href="{{ route('admin.dashboard.pantauansoal.create') }}" class="btn btn-primary">Kirim</a> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
@endsection