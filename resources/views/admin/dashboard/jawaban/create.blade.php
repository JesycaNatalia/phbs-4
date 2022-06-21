@extends('admin.layouts.dashboard')

@section('title', 'Tambah Jawaban')

@section('style')
<style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
</style>
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-12 mb-2 mt-1">
        <div class="breadcrumbs-top">
            <h5 class="content-header-title float-left pr-1 mb-0">Jawaban</h5>
            <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                    <li class="breadcrumb-item"><a href="index.html"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Tambah Jawaban
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="{{ route('admin.dashboard.jawaban.store') }}" method="POST">
                <div class="card-header">
                    <p class="card-title font-weight-bold">Form Tambah Jawaban</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-50">
                                <div class="form-group mb-50">
                                    <label class="text-bold-600">Jawaban <span class="text-danger">*</span></label>
                                    <input type="text" name="jawaban" id="title" class="form-control"
                                        placeholder="e.g: Sering" required>
                                </div>
                            </div>
                            <div class="form-group mb-50">
                                <div class="form-group mb-50">
                                    <label class="text-bold-600">Skor <span class="text-danger">*</span></label>
                                    <input type="number" name="skor" id="title" class="form-control"
                                        placeholder="e.g: 3" required>
                                    <input type="hidden" name="kuisoner_id" value="{{ request()->id }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @csrf
                <div class="card-footer">
                    <button type="submit" class="btn btn-success float-right mb-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection