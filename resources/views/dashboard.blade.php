@extends('frontend.main-master')
@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li class='active'>Beranda</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row">
            
            {{-- User Sidebar --}}
            @include('frontend.templates.user-sidebar')

            <div class="col-md-10">
                <h4 class="text-center">
                    <!-- Menampilkan nama yang login -->
                    Selamat Datang <strong class="text-danger">{{ Auth::user()->name }}</strong> Di Toko Kami 
                </h4>
            </div> 
        </div>
    </div>
</div>
@endsection