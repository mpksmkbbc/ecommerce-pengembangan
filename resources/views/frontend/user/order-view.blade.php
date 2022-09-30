@extends('frontend.main-master')
@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class='active'>Data Transaksi</li>
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
                                    <th class="text-center"><i class="fa fa-shopping-bag"></i> Belanja</th>
                                    <th class="text-center">Invoice</th>
                                    <th class="text-center">Pembayaran</th>
                                    <th class="text-center">Total Belanja</th>
                                    <th class="text-center">Status</th>
                                    <th width="16%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr class="border-bottom">
                                    <td>
                                        {{ $order->order_date }} <br>
                                    </td>
                                    <td>{{ $order->invoice_number }}
                                    </td>
                                    <td>{{ $order->payment_method }}</td>
                                    <td><strong>Rp{{ number_format($order->amount, 2, ',', '.') }}</strong>
                                    </td>
                                    <td>
                                        @if($order->shipping_status == 'Ditunda')        
                                            <span class="badge badge-pill badge-warning" 
                                                style="background: #800080; padding: 10px;"> Ditunda 
                                            </span>
                                        @elseif($order->shipping_status == 'Di konfirmasi')
                                            <span class="badge badge-pill badge-warning" 
                                                style="background: #0000FF; padding: 10px;"> Dikonfirmasi 
                                            </span>
                                        @elseif($order->shipping_status == 'Dikemas')
                                            <span class="badge badge-pill badge-warning" 
                                                style="background: #FFA500; padding: 10px;"> Di proses 
                                            </span>
                                        @elseif($order->shipping_status == 'Dikirim')
                                            <span class="badge badge-pill badge-warning" 
                                                style="background: #808000; padding: 10px;"> Dalam Pengiriman 
                                            </span>
                                        @elseif($order->shipping_status == 'Dalam Perjalanan')
                                            <span class="badge badge-pill badge-warning" 
                                                style="background: #808080; padding: 10px;"> Dalam perjalanan 
                                            </span>
                                        @elseif($order->shipping_status == 'Selesai')
                                            <span class="badge badge-pill badge-warning" 
                                                style="background: #008000; padding: 10px;"> Selesai 
                                            </span>

                                        @endif
                                        
                                        @if($order->cancel_order == 1) 
                                            <div style="margin-top: 10px">
                                                <span class="badge badge-pill badge-warning" 
                                                    style="background:red; padding: 10px;">
                                                    Permintaan <br> Pembatalan 
                                                </span>
                                            </div>
                                        @endif

                                        @if($order->return_order == 1) 
                                            <div style="margin-top: 10px">
                                                <span class="badge badge-pill badge-warning" 
                                                    style="background:red; padding: 10px;">
                                                    Permintaan <br> Pengembalian 
                                                </span>
                                            </div>
                                        @endif
                                    </td>
                                    <td align="right">
                                        <a href="{{ url('user/order-details/' . $order->id) }}"
                                            class="btn btn-sm btn-default" style="padding: 10px 20px">
                                            <i class="fa fa-print"></i> Detail Transaksi
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection