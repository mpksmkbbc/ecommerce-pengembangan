@extends('frontend.main-master')
@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li class='active'>Detail Produk</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row single-product'>
            <div class='col-md-12'>
                <div class="detail-block">
                    <div class="row  wow fadeInUp">
                        <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                            <div class="product-item-holder size-big single-product-gallery small-gallery">
                                <div id="owl-single-product">

                                    @foreach($product_galleries as $proGal)
                                    <div class="single-product-gallery-item" id="slide{{ $proGal->id }}">
                                        <a data-lightbox="image-1" data-title="Gallery"
                                            href="{{ asset($proGal->photo_name ) }}">
                                            <img class="img-responsive" alt="" src="{{ asset($proGal->photo_name ) }}"
                                                data-echo="{{ asset($proGal->photo_name ) }}" />
                                        </a>
                                    </div><!-- /.single-product-gallery-item -->
                                    @endforeach
                                </div><!-- /.single-product-slider -->
                                <div class="single-product-gallery-thumbs gallery-thumbs">
                                    <div id="owl-single-product-thumbnails">

                                        @foreach($product_galleries as $proGal)
                                        <div class="item">
                                            <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                data-slide="1" href="#slide{{ $proGal->id }}">
                                                <img class="img-responsive" width="85" alt=""
                                                    src="{{ asset($proGal->photo_name ) }}"
                                                    data-echo="{{ asset($proGal->photo_name ) }}" />
                                            </a>
                                        </div>
                                        @endforeach
                                    </div><!-- /#owl-single-product-thumbnails -->
                                </div><!-- /.gallery-thumbs -->
                            </div><!-- /.single-product-gallery -->
                        </div><!-- /.gallery-holder -->
                        <div class='col-sm-6 col-md-7 product-info-block'>
                            <div class="product-info">
                                <h1 class="name">{{ $product->product_name }}</h1>

                                <div class="rating-reviews m-t-20">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="rating rateit-small"></div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="reviews">
                                                <a href="#" class="lnk">(13 Reviews)</a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.rating-reviews -->

                                <div class="stock-container info-container m-t-10">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <div class="stock-box">
                                                <span class="label">Availability :</span>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="stock-box">
                                                <span class="value">In Stock</span>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.stock-container -->

                                <div class="description-container m-t-20">
                                    {{ $product->product_short_desc }}
                                </div><!-- /.description-container -->

                                <div class="price-container info-container m-t-20">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="price-box">
                                                @if ($product->product_discount == NULL)
                                                    <span class="price">
                                                        Rp{{ number_format($product->product_price, 0, '', '.') }}
                                                    </span>
                                                @else
                                                    <span class="price">
                                                        Rp{{ number_format($product->product_discount, 0, '', '.') }}
                                                    </span>
                                                    <span class="price-strike">
                                                        Rp{{ number_format($product->product_price, 0, '', '.') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="favorite-button m-t-10">
                                                <a class="btn btn-primary" data-toggle="tooltip" data-placement="right"
                                                    title="Wishlist" href="#">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.price-container -->

                                <!-- Add Product Color And Product Size -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            @if($product->product_color == null)

                                            @else

                                            <label class="info-title control-label">Pilih Warna <span> </span></label>
                                            <select class="form-control unicase-form-control selectpicker"
                                                style="display: none;" id="color">
                                                <option selected="" disabled="">--Pilih Warna--</option>
                                                @foreach($product_color as $color)
                                                <option value="{{ $color }}">{{ ucwords($color) }}</option>
                                                @endforeach
                                            </select>
                                            @endif
                                        </div> <!-- // end form group -->
                                    </div> <!-- // end col 6 -->
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="info-title control-label">Pilih Ukuran <span> </span></label>
                                            <select class="form-control unicase-form-control selectpicker"
                                                style="display: none;" id="size">
                                                <option selected="" disabled="">--Pilih Ukuran--</option>
                                                @foreach($product_size as $size)
                                                    <option value="{{ $size }}">{{ ucwords($size) }}</option>
                                                @endforeach
                                            </select>
                                        </div> <!-- // end form group -->
                                    </div> <!-- // end col 6 -->
                                </div><!-- /.row -->
                                <div class="quantity-container info-container">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <span class="label">Jumlah :</span>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="cart-quantity">
                                                <div class="quant-input">
                                                    <div class="arrows">
                                                        <div class="arrow plus gradient">
                                                            <span class="ir">
                                                                <i class="icon fa fa-sort-asc"></i>
                                                            </span>
                                                        </div>
                                                        <div class="arrow minus gradient">
                                                            <span class="ir">
                                                                <i class="icon fa fa-sort-desc"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <input type="text" value="1">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-7">
                                            <a href="#" class="btn btn-primary">
                                                <i class="fa fa-shopping-cart inner-right-vs"></i> 
                                                Keranjang
                                            </a>
                                        </div>
                                    </div><!-- /.row -->
                                </div><!-- /.quantity-container -->
                            </div><!-- /.product-info -->
                        </div><!-- /.col-sm-7 -->
                    </div><!-- /.row -->
                </div>

                <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                    <div class="row">
                        <div class="col-sm-3">
                            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                <li class="active"><a data-toggle="tab" href="#description">Deskripsi</a></li>
                                <li><a data-toggle="tab" href="#review">Penilaian dan Ulasan</a></li>
                            </ul><!-- /.nav-tabs #product-tabs -->
                        </div>
                        <div class="col-sm-9">
                            <div class="tab-content">
                                <div id="description" class="tab-pane in active">
                                    <div class="product-tab">
                                        <p class="text">{!! $product->product_long_desc !!}</p>
                                    </div>
                                </div><!-- /.tab-pane -->

                                <div id="review" class="tab-pane">
                                    <div class="product-tab">
                                        <div class="product-reviews">
                                            <h4 class="title">Ulasan Pembeli</h4>
                                            @php
                                                $reviews = App\Models\Review::where('product_id',$product->id)->latest()->limit(5)->get();
                                            @endphp
                                            <div class="reviews">
                                                @foreach($reviews as $item)

                                                @if($item->status == 0)
                                                    {{-- jika statusnya 0 --}}
                                                    {{-- tidak ditampilkan --}}

                                                @else
                                                    {{-- jika statusnya 1 --}}
                                                    {{-- tampilkan ulasan --}}
                                                    <div class="review">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <img style="border-radius: 50%"
                                                                    src="{{ (!empty($item->user->profile_photo_path))? url('upload/user-images/'.$item->user->profile_photo_path):url('upload/no_image.jpg') }}"
                                                                    width="40px;" height="40px;"><b>
                                                                    {{ $item->user->name }}</b>
                                                                        @if($item->rating == 0)

                                                                        @elseif($item->rating == 1)
                                                                            <span class="fa fa-star checked" style="color: yellow"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                        @elseif($item->rating == 2)
                                                                            <span class="fa fa-star checked" style="color: yellow"></span>
                                                                            <span class="fa fa-star checked" style="color: yellow"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                        @elseif($item->rating == 3)
                                                                            <span class="fa fa-star checked" style="color: yellow"></span>
                                                                            <span class="fa fa-star checked" style="color: yellow"></span>
                                                                            <span class="fa fa-star checked" style="color: yellow"></span>
                                                                            <span class="fa fa-star"></span>
                                                                            <span class="fa fa-star"></span>
                                                                        @elseif($item->rating == 4)
                                                                            <span class="fa fa-star checked" style="color: yellow"></span>
                                                                            <span class="fa fa-star checked" style="color: yellow"></span>
                                                                            <span class="fa fa-star checked" style="color: yellow"></span>
                                                                            <span class="fa fa-star checked" style="color: yellow"></span>
                                                                            <span class="fa fa-star"></span>
                                                                        @elseif($item->rating == 5)
                                                                            <span class="fa fa-star checked" style="color: yellow"></span>
                                                                            <span class="fa fa-star checked" style="color: yellow"></span>
                                                                            <span class="fa fa-star checked" style="color: yellow"></span>
                                                                            <span class="fa fa-star checked" style="color: yellow"></span>
                                                                            <span class="fa fa-star checked" style="color: yellow"></span>
                                                                        @endif
                                                            </div>
                                                        </div>
                                                        <div class="review-title">
                                                            <span class="date">
                                                                <i class="fa fa-calendar"></i>
                                                                <span>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                                            </span>
                                                        </div>
                                                        <div class="text">"{{ $item->comment }}"</div>
                                                    </div>
                                                @endif
                                                @endforeach
                                            </div><!-- /.reviews -->
                                        </div><!-- /.product-reviews -->
                                        <div class="product-add-review">
                                            <h4 class="title">Beri Penilaian dan Ulasan</h4>
                                            <div class="review-form">
                                                @guest
                                                    <p> <b> Untuk menambahkan ulasan. Anda harus login terlebih dahulu 
                                                        <a href="{{ route('login') }}">Login disini</a> </b> 
                                                    </p>
                                                @else
                                                    <div class="form-container">
                                                        <form role="form" class="cnt-form" method="post" action="{{ route('review.store') }}">
                                                            @csrf

                                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th class="cell-label">&nbsp;</th>
                                                                            <th>1 star</th>
                                                                            <th>2 stars</th>
                                                                            <th>3 stars</th>
                                                                            <th>4 stars</th>
                                                                            <th>5 stars</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="cell-label">Rating</td>
                                                                            <td><input type="radio" name="quality" 
                                                                                        class="radio" value="1"></td>
                                                                            <td><input type="radio" name="quality" 
                                                                                        class="radio" value="2"></td>
                                                                            <td><input type="radio" name="quality" 
                                                                                        class="radio" value="3"></td>
                                                                            <td><input type="radio" name="quality" 
                                                                                        class="radio" value="4"></td>
                                                                            <td><input type="radio" name="quality" 
                                                                                        class="radio" value="5"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">
                                                                            Tulis Ulasan <span class="astk">*</span>
                                                                        </label>
                                                                        <textarea class="form-control"
                                                                            name="comment" id="exampleInputReview" rows="4"
                                                                            placeholder="Bagaimana pengalaman anda setelah menggunakan produk ini ?">
                                                                        </textarea>
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                            </div><!-- /.row -->
                                                            <div class="action text-right">
                                                                <button class="btn btn-primary btn-upper">
                                                                    Kirim Ulasan
                                                                </button>
                                                            </div><!-- /.action -->
                                                        </form><!-- /.cnt-form -->
                                                    </div><!-- /.form-container -->
                                                @endguest
                                            </div><!-- /.review-form -->
                                        </div><!-- /.product-add-review -->
                                    </div><!-- /.product-tab -->
                                </div><!-- /.tab-pane -->
                            </div><!-- /.tab-content -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.product-tabs -->
            </div><!-- /.col -->
            <div class='col-md-3 sidebar'>
                <div class="sidebar-module-container">

                    {{-- Product Promo --}}
                    @include('frontend.templates.product-promo')
                    
                </div>
            </div><!-- /.sidebar -->
            <div class="col-md-9">
                <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">Produk Terkait</h3>
                    <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
                        {{-- menampilkan data produk menggunakan perulangan forelse --}}
                        @forelse($related_product as $product)
                        {{-- jika data produk ada, tampilkan syntak berikut --}}
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <a href="">
                                                <img src="{{ asset($product->product_thumbnail) }}" alt="">
                                            </a>
                                        </div>
                                        <!-- /.image -->
                                        <div>
                                            @php
                                            $amount = $product->product_price - $product->product_discount;
                                            $discount = ($amount/$product->product_price) * 100;
                                            @endphp

                                            @if ($product->product_discount != NULL)
                                            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name">
                                            <a href="detail.html">{{ $product->product_name }}</a>
                                        </h3>
                                        <div class="rating rateit-small"></div>

                                        @if ($product->product_discount == NULL)
                                        <div class="product-price">
                                            <span class="price">
                                                Rp{{ number_format($product->product_price, 0, '', '.') }}
                                            </span>
                                        </div>
                                        @else
                                        <div class="product-price">
                                            <span class="price">
                                                Rp{{ number_format($product->product_discount, 0, '', '.') }}
                                            </span>
                                            <span class="price-before-discount">
                                                Rp{{ number_format($product->product_price, 0, '', '.') }}
                                            </span>
                                        </div>
                                        @endif
                                        <!-- /.product-price -->
                                    </div>
                                    <!-- /.product-info -->
                                    <div class="cart clearfix animate-effect">
                                        <div class="action">
                                            <ul class="list-unstyled">
                                                <li class="add-cart-button btn-group">
                                                    <button data-toggle="tooltip"
                                                        class="btn btn-primary icon" type="button"
                                                        title="Add Cart">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </button>
                                                    <button class="btn btn-primary cart-btn"
                                                        type="button">Keranjang</button>
                                                </li>
                                                <li class="lnk wishlist">
                                                    <a data-toggle="tooltip" class="add-to-cart"
                                                        href="detail.html" title="Wishlist">
                                                        <i class="icon fa fa-heart"></i>
                                                    </a>
                                                </li>
                                                <li class="lnk">
                                                    <a data-toggle="tooltip" class="add-to-cart"
                                                        href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}" 
                                                        title="Detail Produk">
                                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /.action -->
                                    </div>
                                    <!-- /.cart -->
                                </div>
                                <!-- /.product -->

                            </div>
                            <!-- /.products -->
                        </div>
                        <!-- /.item -->
                        @empty
                        {{-- jika data product tidak ada atau kosong --}}
                        {{-- tampilkan syntak berikut --}}
                        <h5 class="text-danger">Produk Tidak Ditemukan</h5>

                        @endforelse  <!-- endforelse option products -->
                    </div><!-- /.home-owl-carousel -->
                </section><!-- /.section -->
                <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->
            </div>
            <div class="clearfix"></div>
        </div><!-- /.row -->

        {{-- Brands --}}
        @include('frontend.templates.brands')

    </div><!-- /.container -->
</div><!-- /.body-content -->
@endsection