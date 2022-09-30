@extends('frontend.main-master')
@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li><a href="{{ route('dashboard') }}">Profil</a></li>
                <li class='active'>Detail Transaksi</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="sign-in-page" style="margin: 30px 0">
            <div class="row">
                <div class="col-md-7">
                    <!-- Menampilkan Data Produk Yang Dibeli -->
                    <h4>Rincian Produk</h4>
                    <hr>
                    @foreach ($orderItem as $item)
                    <div class="media product-card">
                        <a class="pull-left" href="#">
                            <img style="width: 150px" src="{{ asset($item->product->product_thumbnail) }}"
                                alt="Image" />
                        </a>
                        <div class="media-body">
                            <h4 style="font-size: 16px; font-weight: 500" class="media-heading">
                                {{ $item->product->product_name }}
                            </h4>
                            <span style="float: right">
                                <a data-toggle="modal" data-target="#product-modal" id="{{ $item->product->id }}"
                                    onclick="productView(this.id)" class="btn btn-primary"
                                    style="padding: 6px 40px;">Beli Lagi
                                </a>
                            </span>
                            <p class="">{{ $item->size }} - {{ $item->color }}</p>
                            <p>{{ $item->product->product_code }}</p>
                            <span style="float: right">
                                <a href="{{ url('product/details/'.$item->product_id.'/'.$item->product->product_slug ) }}"
                                     style="padding: 6px 40px; ">Beri Ulasan</a>
                            </span>
                            <p style="font-size: 14px">{{ $item->qty }}
                                produk x Rp{{ number_format($item->price, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                    @endforeach

                    <!-- Menampilkan Data Pengiriman -->
                    <h4 style="padding-top: 30px">Info Pengiriman</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <p>Nama</p>
                            <p>No Telepon</p>
                            <p>Email</p>
                            <p>Alamat</p>
                        </div>
                        <div class="col-md-8">
                            <p style="margin-bottom: 10px">
                                <span style="margin-right: 10px">:</span>
                                {{ $order->name }}
                            </p>
                            <p style="margin-bottom: 10px">
                                <span style="margin-right: 10px">:</span>
                                {{ $order->phone }}
                            </p>
                            <p style="margin-bottom: 10px">
                                <span style="margin-right: 10px">:</span>
                                {{ $order->email }}
                            </p>
                            <p style="margin-bottom: -20px;">
                                <span style="margin-right: 10px">:</span>
                                <div style="padding: 0 20px">
                                    {{ $order->address }} <br>
                                    {{ $order->district->district_name }}, {{ $order->city->city_name }}, <br>
                                    {{ $order->province->province_name }}, {{ $order->poscode }}
                                </div>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <!-- Menampilkan Data Pemesanan -->
                    <h4>Rincian Pembayaran</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <p style="margin-bottom: 20px">Status Pesanan</p>
                            <p>Invoice</p>
                            <p>Tanggal Pembelian</p>
                            <p>Metode Pembayaran</p>
                        </div>
                        <div class="col-md-8">
                            <p style="margin-bottom: 10px">
                                @if($order->shipping_status == 'Ditunda')
                                    @if($order->cancel_order == 2)
                                    <span class="badge badge-pill badge-warning"
                                        style="background:red; padding: 10px;">Batal
                                    </span>
                                    @else
                                    <span class="badge badge-pill badge-warning"
                                        style="background: #800080; padding: 10px;"> Ditunda
                                    </span>
                                    @endif
                                @elseif($order->shipping_status == 'Di konfirmasi')
                                    @if($order->cancel_order == 2)
                                    <span class="badge badge-pill badge-warning"
                                        style="background:red; padding: 10px;">Batal
                                    </span>
                                    @else
                                    <span class="badge badge-pill badge-warning"
                                        style="background: #0000FF; padding: 10px;"> Dikonfirmasi
                                    </span>
                                    @endif
                                @elseif($order->shipping_status == 'Dikemas')
                                    @if($order->cancel_order == 1)
                                    <span class="badge badge-pill badge-warning"
                                        style="background:red; padding: 10px;">Batal
                                    </span>
                                    @else
                                    <span class="badge badge-pill badge-warning"
                                        style="background: #FFA500; padding: 10px;"> Dikemas
                                    </span>
                                    @endif
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
                            </p>
                            <p style="margin-bottom: 10px">
                                @if ($order->shipping_status == 'Selesai')
                                    <a href="{{ url('user/invoice-download/' . $order->id) }}" 
                                        target="_blank" class="text-success">
                                        <i class="fa fa-print"></i>
                                        {{ $order->invoice_number }}
                                    </a>
                                @else
                                    <span>
                                        <i class="fa fa-print"></i>
                                        {{ $order->invoice_number }}
                                    </span>
                                @endif
                            </p>
                            <p style="margin-bottom: 10px">
                                <span style="margin-bottom: 10px;">{{ $order->order_date }}</span>
                            </p>
                            <p style="margin-bottom: 10px;">
                                <span class="">{{ $order->payment_method }}</span>
                            </p>
                            <p style="margin: 15px 0;">
                                <span style="checkout-btn">
                                    <strong style="font-size: 16px">Total Belanja</strong>
                                </span>
                                <span class="">
                                    <strong style="font-size: 16px">
                                      Rp{{ number_format($order->amount, 0, ',', '.') }}
                                    </strong>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pembatalan Pesanan -->
            <div class="row">
                <div class="col-md-12">
                    @if($order->shipping_status === "Ditunda" || $order->shipping_status === "Di konfirmasi" || $order->shipping_status === "Dikemas")
                        @php
                        // ambil data order berdasarkan id dengan kolom cancel_order bernilai null
                        $order_cancel = App\Models\Order::where('id',$order->id)->where('cancel_order','=',NULL)->first();
                        // ambil data order berdasarkan id dengan kolom cancel_order bernilai 1
                        $cancel = App\Models\Order::where('id',$order->id)->where('cancel_order','=',1)->first();
                        @endphp

                        {{-- jika ada data order dengan kondisi yang sesuai dengan variabel $order_cancel --}}
                        @if($order_cancel)
                            {{-- jika kolom cancel_order bernilai NULL --}}
                            {{-- tampilkan ini --}}
                            <h4 style="padding-top: 30px">Pembatalan Pesanan</h4>
                            <hr>
                            <form action="{{ route('cancel.order',$order->id) }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="label"> Alasan Pembatalan Pesanan :</label>
                                    <textarea name="cancel_reason" id="" class="form-control" cols="30" rows="05">Tulis alasan</textarea>
                                </div>
                                <button type="submit" class="btn btn-danger">Kirim</button>
                            </form>
                        {{-- jika ada data order dengan kondisi yang sesuai dengan variabel $cancel --}}
                        @elseif($cancel)
                            {{-- jika kolom cancel_order bernilai 1 --}}
                            {{-- tampilkan ini --}} <br>
                            <span class="badge badge-pill badge-warning" style="background: red; padding: 10px;">
                                Anda telah mengirim permintaan pembatalan untuk produk ini 
                            </span>
                        @else

                        @endif

                    @endif
                </div>
            </div>

            <!-- Pengembalian Pesanan -->
            <div class="row">
                <div class="col-md-12">
                    @if($order->shipping_status === "Selesai")
                        @php
                        // ambil data order berdasarkan id dengan kolom return_order bernilai null
                        $order_return = App\Models\Order::where('id',$order->id)->where('return_order','=',NULL)->first();
                        // ambil data order berdasarkan id dengan kolom return_order bernilai 1
                        $return = App\Models\Order::where('id',$order->id)->where('return_order','=',1)->first();
                        @endphp

                        {{-- jika ada data order dengan kondisi yang sesuai dengan variabel $order_return --}}
                        @if($order_return)
                            {{-- jika kolom return_order bernilai NULL --}}
                            {{-- tampilkan ini --}}
                            <h4 style="padding-top: 30px">Pengembalian Pesanan</h4>
                            <hr>
                            <form action="{{ route('return.order',$order->id) }}" method="post">
                                @csrf

                                <div class="form-group">
                                    <label for="label"> Alasan Pengembalian Pesanan :</label>
                                    <textarea name="return_reason" id="" class="form-control" cols="30" rows="05">Tulis alasan</textarea>
                                </div>
                                <button type="submit" class="btn btn-danger">Kirim</button>
                            </form>
                        {{-- jika ada data order dengan kondisi yang sesuai dengan variabel $return --}}
                        @elseif($return)
                            {{-- jika kolom return_order bernilai 1 --}}
                            {{-- tampilkan ini --}} <br>
                            <span class="badge badge-pill badge-warning" style="background: red; padding: 10px;">
                                Anda telah mengirim permintaan pengembalian untuk produk ini 
                            </span>
                        @else

                        @endif

                    @endif
                </div>
            </div>

        </div>
    </div>
</div>
@endsection