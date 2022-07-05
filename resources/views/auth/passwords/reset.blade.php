@extends('layouts.empty', ['paceTop' => true, 'bodyExtraClass' => 'bg-white'])

@section('title', __('Reset Password'))

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
            <form action="{{ route('reset') }}" method="POST" class="margin-bottom-0">
                @csrf

                <div class="form-group m-b-15">

                    <input id="nik" type="nik" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ $request->nik ?? old('nik') }}" required autocomplete="nik" placeholder="{{ __('NIK') }}">

                    @error('nik')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group m-b-15">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('New Password') }}">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group m-b-15">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                </div>

                <div class="register-buttons">
                    <button type="submit" class="btn btn-success btn-block btn-lg">{{ __('Reset Password') }}</button>
                </div>
                <p>
                    <br />
                    Ingat kata sandi? <a href="{{route('login')}}">Masuk</a>
                </p>
                <hr />
                <p class="text-center text-grey-darker">
                    &copy; <?= date('Y') ?> Mandiri Solusindo </p>
            </form>
        </div>
        <!-- end login-content -->
    </div>
    <!-- end right-container -->
</div>
<!-- end login -->
@endsection