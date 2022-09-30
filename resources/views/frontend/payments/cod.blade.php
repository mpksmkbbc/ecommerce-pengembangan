@extends('frontend.main-master')
@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li class='active'>Cash On Delivery</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-6">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Total Pembayaran </h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        <li>
                                            {{-- jika memasukkan kupon di halaman checkout --}}
                                            @if(Session::has('coupon'))
                                                {{-- tampilkan syntak berikut ini --}}
                                                <strong>SubTotal: </strong> Rp{{ number_format($cartTotal, 0, '', '.') }}
                                                <hr>

                                                <strong>Kupon : </strong>
                                                {{ session()->get('coupon')['coupon_name'] }}
                                                ( {{ session()->get('coupon')['coupon_discount'] }} % )
                                                <hr>

                                                <strong>Diskon Kupon : </strong>
                                                Rp{{ number_format( session()->get('coupon')['discount_amount'], 0, '', '.') }}
                                                <hr>

                                                <strong>Total Bayar : </strong>
                                                Rp{{ number_format(session()->get('coupon')['total_amount'], 0, '', '.') }}
                                                <hr>
                                            @else
                                                {{-- jika tidak memasukkan kupon di halaman checkout --}}
                                                {{-- tampilkan syntak berikut --}}
                                                <strong>SubTotal: </strong> Rp{{ number_format($cartTotal, 0, '', '.') }}
                                                <hr>

                                                <strong>Total Bayar : </strong> Rp{{ number_format($cartTotal, 0, '', '.') }}
                                                <hr>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div> <!--  // end col md 6 -->
                <div class="col-md-6">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Metode Pembayaran</h4>
                                </div>

                                <form action="{{ route('pay.cash') }}" method="post" id="payment-form">
                                  @csrf
                                  <div class="form-row">
                                      <img class="img-fluid" style="width: 150px" src="{{ asset('frontend/assets/images/payments/cash.png') }}">
                                      <label for="card-element">
                                        <input type="hidden" name="name" value="{{ $data['shipping_name'] }}">
                                        <input type="hidden" name="email" value="{{ $data['shipping_email'] }}">
                                        <input type="hidden" name="phone" value="{{ $data['shipping_phone'] }}">
                                        <input type="hidden" name="post_code" value="{{ $data['post_code'] }}">
                                        <input type="hidden" name="province_id" value="{{ $data['province_id'] }}">
                                        <input type="hidden" name="city_id" value="{{ $data['city_id'] }}">
                                        <input type="hidden" name="district_id" value="{{ $data['district_id'] }}">
                                        <input type="hidden" name="address" value="{{ $data['address'] }}">
                                      </label>
                                  </div>
                                  <br>
                                  <button class="btn btn-primary">Buat Pesanan</button>
                              </form>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div><!--  // end col md 6 -->
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
    </div><!-- /.container -->
</div><!-- /.body-content -->
@endsection