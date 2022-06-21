@extends('layouts.empty', ['paceTop' => true, 'bodyExtraClass' => 'bg-white'])

@section('title', 'SPMB')

@section('content')
<!-- begin login -->
<div class="login login-with-news-feed">
	<!-- begin news-feed -->
	<div class="news-feed">
		<div class="news-image" style="background-image: url(/assets/img/login-bg/front.png)"></div>
		<div class="news-caption">
			<h4 class="caption-title"><b>S</b>PMB</h4>
			<p>
				Sistem Pendaftaran Mahasiswa Baru
			</p>
		</div>
	</div>
	<!-- end news-feed -->
	<!-- begin right-content -->
	<div class="right-content">
		<!-- begin login-header -->
		<div class="login-header mx-auto">
			<a href="#"><img src="{{asset('assets/img/login-bg/logo.png')}}" width="150"></a>
		</div>
		<!-- end login-header -->
		<!-- begin login-content -->
		<div class="login-content">
			@if (session('status'))
			<div class="alert alert-success" role="alert">
				{{ session('status') }}
			</div>
			@endif
			<form action="{{ route('register') }}" method="POST" class="margin-bottom-0">
				@csrf
				<div class="form-group m-b-15">
					<input id="email" type="text"
						class="form-control form-control-lg @error('email') is-invalid @enderror" name="nama"
						value="{{ old('nama') }}" required autocomplete="nama" placeholder="Nama" autofocus />

					@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>
				<div class="form-group m-b-15">
					<input id="password" type="password"
						class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"
						required autocomplete="current-password" placeholder="Password" />

					@error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
					@enderror
				</div>

                <div class="form-group m-b-15">
					<input type="text"
						class="form-control form-control-lg" name="no_kk"
						required placeholder="No KK" />
				</div>

                <div class="form-group m-b-15">
					<select name="jenis_kelamin" class="form-control form-control-lg">
                        <option value="" disabled selected>Pilih jenis kelamin..</option>
                        <option value="L">Laki laki</option>
                        <option value="P">Perempuan</option>
                    </select>
				</div>

                <div class="form-group m-b-15">
					<select name="status_kepala" class="form-control form-control-lg">
                        <option value="" disabled selected>Pilih status keluarga..</option>
                        <option value="ya">Kepala</option>
                        <option value="tidak">Anggota</option>
                    </select>
				</div>

				<div class="login-buttons">
					<button type="submit" class="btn btn-success btn-block btn-lg">Register</button>
				</div>
				@if(!request()->routeIs('admin*'))
				<p>
					<br />
					Sudah punya akun? <a href="">Login</a>
					
				</p>
				@endif
				<hr />
				<p class="text-center text-grey-darker">
					&copy;
					<?= date('Y') ?> Mandiri Solusindo
				</p>
			</form>
		</div>
		<!-- end login-content -->
	</div>
	<!-- end right-container -->
</div>
<!-- end login -->
@endsection