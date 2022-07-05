@extends('admin.layouts.dashboard')

@section('title', 'Dashboard')

@section('style')
@endsection

@section('content')

<div class="card col-xl-11 col-md-6">
    <div class="card-header">
    </div>
    <div class="card-body">
        <center>
            <h4> DASHBOARD ADMIN</h4>
        </center>
        <!-- jadi nanti ada pengkondisian disini, kalo udah ngisi berarti cardnya -->
    </div>
</div>

<body class="h-screen bg-gray-100">

    <div class="container px-4 mx-auto">
        <div class="p-6 m-20 bg-white rounded shadow">
            {!! $chart->container() !!}
        </div>
    </div>

    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
</body>

@endsection

@section('script')
@endsection