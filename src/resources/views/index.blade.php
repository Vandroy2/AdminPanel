@extends('layouts.admin')
@section('style')
    <link href="{{ asset('adminAssets/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('adminAssets/vendor/toastr/css/toastr.min.css') }}">
@endsection
@section('content')
    <!-- row -->

    <div class="text-right w-100 text-end">

        <a href="/" style="margin-bottom:40px;">
            <div class="btn btn-primary" style="display:flex;float: right;margin-right: 3rem;">
                {{-- <span class="btn-icon-left text-primary"> --}}
                    <i style="font-size: 24px;color:#fff;margin-right:10px;" class="bi bi-arrow-left-circle-fill"></i>
                    {{-- </span> --}}
                <span style="font-weight: bold;color:#fff;">Перейти на на головну сторiнку сайту</span>
            </div>
        </a>

    </div>
    <div class="container-fluid text-center">
        <div class="row page-titles mx-0" style="background: transparent;">
            <div class="w-100 p-md-0">
                <div class="welcome-text">
                    <h4>
                        Привiт {{\Illuminate\Support\Facades\Auth::user()->name}}</h4>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">

                </div>
            </div>
        </div>
    </div>

@endsection




