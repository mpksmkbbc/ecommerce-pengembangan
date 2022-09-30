@extends('frontend.main-master')
@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
              <li><a href="{{ url('/') }}">Beranda</a></li>
              <li><a href="{{ route('dashboard') }}">Profil</a></li>
              <li class='active'>Pembatalan Pesanan</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row">
          
            @include('frontend.templates.user-sidebar')

            <div class="col-md-10">
                <div class="sign-in-page">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Total Belanja</th>
                                    <th class="text-center">Metode Pembayaran</th>
                                    <th class="text-center">Invoice</th>
                                    <th class="text-center">Alasan Pengembalian</th>
                                    <th class="text-center">Status Pesanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td class="col-md-1">
                                        <label for=""> {{ $order->order_date }}</label>
                                    </td>
                                    <td class="col-md-3">
                                        <label for=""> Rp{{ number_format($order->amount, 0, ',', '.') }}</label>
                                    </td>
                                    <td class="col-md-3">
                                        <label for=""> {{ $order->payment_method }}</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for=""> {{ $order->invoice_number }}</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for=""> {{ $order->cancel_reason }}</label>
                                    </td>
                                    <td class="col-md-2">
                                        <label for="">
                                            @if($order->cancel_order == 0)
                                            <span class="badge badge-pill badge-warning" style="background: #418DB9;">
                                                Tidak ada permintaan </span>
                                            @elseif($order->cancel_order == 1)
                                            <span class="badge badge-pill badge-warning" style="background: #800000;">
                                                Ditunda </span>
                                            <span class="badge badge-pill badge-warning"
                                                style="background:red;">Permintaan Pembatalan </span>
                                            @elseif($order->cancel_order == 2)
                                            <span class="badge badge-pill badge-warning"
                                                style="background: #008000;">Berhasil Dibatalkan </span>
                                            @endif
                                        </label>
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

@endsection