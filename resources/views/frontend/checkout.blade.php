@extends('frontend.main-master')
@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li class='active'>Checkout</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="checkout-box ">
            <div class="row">
                <div class="col-md-8">
                    <div class="panel-group checkout-steps" id="accordion">
                        <!-- checkout-step-01  -->
                        <div class="panel panel-default checkout-step-01">
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <!-- panel-body  -->
                                <div class="panel-body">
                                    <div class="row">
                                        <!-- guest-login -->
                                        <h4 class="checkout-subtitle"><b>Alamat Pengiriman</b></h4>
                                        <hr>
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <form method="POST" action="{{ route('checkout.store') }}"
                                                class="register-form">
                                                @csrf

                                                <div class="form-group">
                                                    <label class="info-title"><b>Nama </b>
                                                        <span>*</span></label>
                                                    <input type="text" name="shipping_name"
                                                        class="form-control unicase-form-control text-input"
                                                        placeholder="Nama" required=""
                                                        value="{{ Auth::user()->name }}">
                                                </div> <!-- // end form group  -->
                                                <div class="form-group">
                                                    <label class="info-title"><b>Email </b>
                                                        <span>*</span></label>
                                                    <input type="email" name="shipping_email"
                                                        class="form-control unicase-form-control text-input"
                                                        placeholder="Email" required=""
                                                        value="{{ Auth::user()->email }}">
                                                </div> <!-- // end form group  -->
                                                <div class="form-group">
                                                    <label class="info-title">
                                                        <b>No.Telepon</b> <span>*</span>
                                                    </label>
                                                    <input type="number" name="shipping_phone"
                                                        class="form-control unicase-form-control text-input"
                                                        placeholder="Nomor Telepon" required=""
                                                        value="{{ Auth::user()->phone }}">
                                                </div> <!-- // end form group  -->
                                                <div class="form-group">
                                                    <label class="info-title">
                                                        <b>Kode Pos </b><span>*</span>
                                                    </label>
                                                    <input type="text" name="post_code"
                                                        class="form-control unicase-form-control text-input"
                                                        placeholder="Kode Pos" required="">
                                                </div> <!-- // end form group  -->
                                        </div>
                                        <!-- guest-login -->

                                        <!-- already-registered-login -->
                                        <div class="col-md-6 col-sm-6 already-registered-login">
                                            <div class="form-group">
                                                <h5><b>Pilih Provinsi </b> <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="province_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Pilih Provinsi</option>
                                                        @foreach($provinces as $item)
                                                        <option value="{{ $item->id }}">{{ $item->province_name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                    @error('province_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- // end form group -->
                                            <div class="form-group">
                                                <h5><b>Pilih Kota / Kabupaten</b> <span class="text-danger">*</span>
                                                </h5>
                                                <div class="controls">
                                                    <select name="city_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Pilih Kota / Kabupaten
                                                        </option>
                                                    </select>
                                                    @error('city_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- // end form group -->
                                            <div class="form-group">
                                                <h5><b>Pilih Kecamatan</b> <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="district_id" class="form-control" required="">
                                                        <option value="" selected="" disabled="">Pilih Kecamatan
                                                        </option>
                                                    </select>
                                                    @error('district_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div> <!-- // end form group -->
                                            <div class="form-group">
                                                <label class="info-title" for="exampleInputEmail1">Alamat
                                                    <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" cols="30" rows="5" 
                                                              placeholder="Alamat"
                                                              name="address" required>
                                                              {!! Auth::user()->address !!}
                                                    </textarea>
                                            </div> <!-- // end form group  -->
                                        </div>
                                        <!-- already-registered-login -->
                                    </div>
                                </div>
                                <!-- panel-body  -->
                            </div><!-- row -->
                        </div>
                        <!-- End checkout-step-01  -->
                    </div><!-- /.checkout-steps -->
                </div>
                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Ringkasan Pesanan</h4>
                                </div>
                                <div class="">
                                    <ul class="nav nav-checkout-progress list-unstyled">
                                        @foreach($carts as $item)
                                        <li>
                                            <strong>Gambar: </strong>
                                            <img src="{{ asset($item->options->image) }}"
                                                style="height: 50px; width: 50px;">
                                        </li>
                                        <li>
                                            <strong>Kuantitas: </strong>
                                            ( {{ $item->qty }} )

                                            <strong>Warna: </strong>
                                            {{ $item->options->color }}

                                            <strong>Ukuran: </strong>
                                            {{ $item->options->size }}
                                        </li>
                                        @endforeach
                                        <hr>
                                        <li>
                                            @if(Session::has('coupon'))
                                                <strong>SubTotal: </strong> Rp{{ number_format($cartTotal, 0, '', '.') }}}
                                                <hr>

                                                <strong>Kupon : </strong>
                                                {{ session()->get('coupon')['coupon_name'] }}
                                                ( {{ session()->get('coupon')['coupon_discount'] }} % )
                                                <hr>

                                                <strong>Diskon : </strong>
                                                Rp{{ number_format(session()->get('coupon')['discount_amount'], 0, '', '.') }}
                                                <hr>

                                                <strong>Total Pembayaran : </strong>
                                                Rp{{ number_format(session()->get('coupon')['total_amount'], 0, '', '.') }}
                                                <hr>

                                            @else
                                                <strong>SubTotal: </strong> Rp{{ number_format($cartTotal, 0, '', '.') }}
                                                <hr>
                                                
                                                <strong>Total Pembayaran : </strong> Rp{{ number_format($cartTotal, 0, '', '.') }}
                                                <hr>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div>
                <div class="col-md-4">
                    <!-- checkout-progress-sidebar -->
                    <div class="checkout-progress-sidebar ">
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">Pilih Metode Pembayaran</h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Stripe</label>
                                        <input type="radio" name="payment_method" value="stripe">
                                        <img src="{{ asset('frontend/assets/images/payments/4.png') }}">
                                    </div> <!-- end col md 4 -->
                                    <div class="col-md-3">
                                        <label for="">COD</label>
                                        <input type="radio" name="payment_method" value="cash">
                                        <img src="{{ asset('frontend/assets/images/payments/cod.png') }}">
                                    </div> <!-- end col md 4 -->
                                    <div class="col-md-5">
                                        <label for="">Transfer</label>
                                        <input type="radio" name="payment_method" value="transfer">
                                        <img src="{{ asset('frontend/assets/images/payments/bri.png') }}">
                                    </div> <!-- end col md 4 -->
                                </div> <!-- // end row  -->
                                <hr>
                                <button type="submit" class="btn-upper btn btn-primary checkout-page-button">
                                  Lanjutkan Belanja
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- checkout-progress-sidebar -->
                </div>
                </form>
            </div><!-- /.row -->
        </div><!-- /.checkout-box -->
    </div><!-- /.container -->
</div><!-- /.body-content -->

<script type = "text/javascript" >
    $(document).ready(function () {
        $('select[name="province_id"]').on('change', function () {
            var province_id = $(this).val();
            if (province_id) {
                $.ajax({
                    url: "{{  url('/user/city-get/ajax') }}/" + province_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $.each(data, function (key, value) {
                            $('select[name="city_id"]').append('<option value="' + value.id + '">' + value.city_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });

        $('select[name="city_id"]').on('change', function () {
            var city_id = $(this).val();
            if (city_id) {
                $.ajax({
                    url: "{{  url('/user/district-get/ajax') }}/" + city_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $.each(data, function (key, value) {
                            $('select[name="district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    }); 
</script>
@endsection