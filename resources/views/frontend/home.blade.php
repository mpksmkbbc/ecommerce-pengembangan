@extends('frontend.main-master')
@section('content')

<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
        <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">

                {{-- Vertical Menu --}}
                @include('frontend.templates.vertical-menu')

                {{-- Product Promo --}}
                @include('frontend.templates.product-promo')

                <!-- ============================================== SPECIAL OFFER ============================================== -->

                <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                    <h3 class="section-title">Best Seller</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                            @foreach($best_seller as $product)
                            <div class="item">
                                <div class="products special-product">
                                    <div class="product">
                                        <div class="product-micro">
                                            <div class="row product-micro-row">
                                                <div class="col col-xs-5">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <a href="">
                                                                <img src="{{ asset($product->product_thumbnail) }}">
                                                            </a>
                                                        </div>
                                                        <!-- /.image -->
                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-xs-7">
                                                    <div class="product-info text-left">
                                                        <h3 class="name">
                                                            <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
                                                                {{ $product->product_name }}
                                                            </a>
                                                        </h3>
                                                        <div class="rating rateit-small"></div>
                
                                                        {{-- jika product_discount sama dengan null atau tidak ada --}}
                                                        @if ($product->product_discount == NULL)
                                                        {{-- tampilkan product_price --}}
                                                        <div class="product-price">
                                                            <span class="price">
                                                                Rp{{ number_format($product->product_price, 0, '', '.') }}
                                                            </span>
                                                        </div>
                                                        @else
                                                        {{-- jika product_discount tidak null atau ada --}}
                                                        <div class="product-price">
                                                            {{-- tampilkan product_discount --}}
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
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-micro-row -->
                                        </div>
                                        <!-- /.product-micro -->
                                    </div>
                                </div>
                            </div>
                            @endforeach <!-- endforeach products -->
                        </div>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== SPECIAL OFFER : END ============================================== -->

                {{-- Product Tags --}}
                @include('frontend.templates.product-tags')
                
                <!-- ============================================== NEWSLETTER ============================================== -->
                <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
                    <h3 class="section-title">Newsletters</h3>
                    <div class="sidebar-widget-body outer-top-xs">
                        <p>Sign Up for Our Newsletter!</p>
                        <form>
                            <div class="form-group">
                                <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Subscribe to our newsletter">
                            </div>
                            <button class="btn btn-primary">Subscribe</button>
                        </form>
                    </div>
                    <!-- /.sidebar-widget-body -->
                </div>
                <!-- /.sidebar-widget -->
                <!-- ============================================== NEWSLETTER: END ============================================== -->

                {{-- Testimonials --}}
                @include('frontend.templates.testimonials')

            </div>
            <!-- /.sidemenu-holder -->
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SECTION – HERO ========================================= -->

                <div id="hero">
                    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                        @foreach($sliders as $slider)
                        <a href="#">
                            <div class="item" style="background-image: url({{ asset($slider->slider_img) }});">

                                {{-- jika judul tidak sama dengan null atau ada --}}
                                @if ($slider->title != NULL)
                                {{-- jalankan atau tampilkan code berikut --}}
                                <div class="container-fluid">
                                    <div class="caption bg-color vertical-center text-left">
                                        <div class="big-text">{{ $slider->title }} </div>
                                        <div class="excerpt hidden-xs"> <span>{{ $slider->description }}</span>
                                        </div>
                                            <button class="btn-lg btn btn-uppercase btn-primary shop-now-button">
                                                Belanja Sekarang
                                            </button>
                                    </div>
                                    <!-- /.caption -->
                                </div>
                                <!-- /.container-fluid -->
                                @else
                                {{-- jika judul sama dengan null atau tidak ada, maka kosong atau tidak ada yang ditampilkan --}}
                                @endif
                            </div>
                            <!-- /.item -->
                        </a>
                        @endforeach
                        <!-- end foreach slider -->
                    </div>
                    <!-- /.owl-carousel -->
                </div>

                <!-- ========================================= SECTION – HERO : END ========================================= -->

                <!-- ============================================== INFO BOXES ============================================== -->
                <div class="info-boxes wow fadeInUp">
                    <div class="info-boxes-inner">
                        <div class="row">
                            <div class="col-md-6 col-sm-3 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <i class="fa fa-truck" style="color: #FEF266; font-size: 20px"
                                                aria-hidden="true"></i>
                                            <h6 class="info-box-heading green">Pengiriman Cepat</h6>
                                        </div>
                                    </div>
                                    <h6 class="text">Kurir pengiriman yang handal</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="hidden-md col-sm-3 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <i class="fa fa-check" style="color: #FEF266; font-size: 20px"
                                                aria-hidden="true"></i>
                                            <h6 class="info-box-heading green">Kualitas Terjamin</h6>
                                        </div>
                                    </div>
                                    <h6 class="text">3 Bulan garansi produk</h6>
                                </div>
                            </div>
                            <!-- .col -->

                            <div class="col-md-6 col-sm-3 col-lg-4">
                                <div class="info-box">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <i class="fa fa-money" style="color: #FEF266; font-size: 20px"
                                                aria-hidden="true"></i>
                                            <h6 class="info-box-heading green">Pembayaran Mudah</h6>
                                        </div>
                                    </div>
                                    <h6 class="text">Bisa Cash On Delivery</h6>
                                </div>
                            </div>
                            <!-- .col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.info-boxes-inner -->

                </div>
                <!-- /.info-boxes -->
                <!-- ============================================== INFO BOXES : END ============================================== -->
                <!-- ============================================== SCROLL TABS ============================================== -->
                <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                    <div class="more-info-tab clearfix ">
                        <h3 class="new-product-title pull-left">Produk Kami</h3>
                        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                            <li class="active">
                                <a data-transition-type="backSlide" href="#all" data-toggle="tab">Semua</a>
                            </li>
                            @foreach($categories as $category)
                            <li>
                                <a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">
                                    {{ $category->category_name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <!-- /.nav-tabs -->
                    </div>
                    <div class="tab-content outer-top-xs">
                        <div class="tab-pane in active" id="all">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                                    @foreach($products as $product)
                                    <div class="item item-carousel">
                                        <div class="products">
                                            <div class="product">
                                                <div class="product-image">
                                                    <div class="image">
                                                        <a href="">
                                                            <img src="{{ asset($product->product_thumbnail) }}">
                                                        </a>
                                                    </div>
                                                    <!-- /.image -->
                                                    <div>

                                                        {{-- Syntak untuk menghitung diskon dalam format persen(%) --}}
                                                        @php
                                                        $amount = $product->product_price - $product->product_discount;
                                                        $discount = ($amount/$product->product_price) * 100;
                                                        @endphp

                                                        {{-- jika product_discount tidak sama dengan null atau ada --}}
                                                        @if ($product->product_discount != NULL)
                                                        {{-- tampilkan discount dalam bentuk % --}}
                                                        <div class="tag hot">
                                                            <span>{{ round($discount) }}%</span>
                                                        </div>
                                                        @else
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- /.product-image -->

                                                <div class="product-info text-left">
                                                    <h3 class="name">
                                                        <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
                                                            {{ $product->product_name }}
                                                        </a>
                                                    </h3>
                                                    <div class="rating rateit-small"></div>

                                                    {{-- jika product_discount sama dengan null atau tidak ada --}}
                                                    @if ($product->product_discount == NULL)
                                                    {{-- tampilkan product_price --}}
                                                    <div class="product-price">
                                                        <span class="price">
                                                            Rp{{ number_format($product->product_price, 0, '', '.') }}
                                                        </span>
                                                    </div>
                                                    @else
                                                    {{-- jika product_discount tidak null atau ada --}}
                                                    <div class="product-price">
                                                        {{-- tampilkan product_discount --}}
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
                                                                <button class="btn btn-primary icon" type="button"
                                                                    title="Kerajang" data-toggle="modal"
                                                                    data-target="#product-modal"
                                                                    id="{{ $product->id }}"
                                                                    onclick="productView(this.id)"> 
                                                                    <i class="fa fa-shopping-cart"></i> 
                                                                </button>
                                                                <button class="btn btn-primary cart-btn"
                                                                    type="button">Keranjang</button>
                                                            </li>
                                                                <button data-toggle="tooltip" class="btn btn-primary icon" 
                                                                        type="button"
                                                                        id="{{ $product->id }}"
                                                                        onclick="addToWishList(this.id)" title="Wishlist">
                                                                    <i class="icon fa fa-heart"></i>
                                                                </button>
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
                                    @endforeach
                                    <!-- endforeach products -->
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->

                        {{-- Dinamis Tabs --}}
                        @foreach($categories as $category)
                        <div class="tab-pane" id="category{{ $category->id }}">
                            <div class="product-slider">
                                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

                                    {{-- memanggil data produk berdasarkan category_id --}}
                                    @php
                                    $products = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get();
                                    @endphp

                                    {{-- menampilkan data produk menggunakan perulangan forelse --}}
                                    @forelse($products as $product)
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
                                                                    title="Keranjang">
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
                                </div>
                                <!-- /.home-owl-carousel -->
                            </div>
                            <!-- /.product-slider -->
                        </div>
                        <!-- /.tab-pane -->
                        @endforeach <!-- end foreach category -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.scroll-tabs -->
                <!-- ============================================== SCROLL TABS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-7 col-sm-7">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="{{ asset('frontend/assets/images/banners/home-banner1.jpg') }}" alt="">
                                </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-5 col-sm-5">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="{{ asset('frontend/assets/images/banners/home-banner2.jpg') }}" alt="">
                                </div>
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->

                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                <section class="section featured-product wow fadeInUp">
                    <h3 class="section-title">Produk Terbaru</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        @foreach($new_product as $product)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <a href="">
                                                <img src="{{ asset($product->product_thumbnail) }}">
                                            </a>
                                        </div>
                                        <!-- /.image -->
                                        <div>

                                            {{-- Syntak untuk menghitung diskon dalam format persen(%) --}}
                                            @php
                                            $amount = $product->product_price - $product->product_discount;
                                            $discount = ($amount/$product->product_price) * 100;
                                            @endphp

                                            {{-- jika product_discount tidak sama dengan null atau ada --}}
                                            @if ($product->product_discount != NULL)
                                            {{-- tampilkan discount dalam bentuk % --}}
                                            <div class="tag hot">
                                                <span>{{ round($discount) }}%</span>
                                            </div>
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name">
                                            <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
                                                {{ $product->product_name }}
                                            </a>
                                        </h3>
                                        <div class="rating rateit-small"></div>

                                        {{-- jika product_discount sama dengan null atau tidak ada --}}
                                        @if ($product->product_discount == NULL)
                                        {{-- tampilkan product_price --}}
                                        <div class="product-price">
                                            <span class="price">
                                                Rp{{ number_format($product->product_price, 0, '', '.') }}
                                            </span>
                                        </div>
                                        @else
                                        {{-- jika product_discount tidak null atau ada --}}
                                        <div class="product-price">
                                            {{-- tampilkan product_discount --}}
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
                                                        title="Keranjang">
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
                        @endforeach
                        <!-- endforeach products -->
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                <!-- ============================================== WIDE PRODUCTS ============================================== -->
                <div class="wide-banners wow fadeInUp outer-bottom-xs">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="wide-banner cnt-strip">
                                <div class="image"> <img class="img-responsive"
                                        src="{{ asset('frontend/assets/images/banners/home-banner.jpg') }}" alt="">
                                </div>
                                <div class="strip strip-text">
                                    <div class="strip-inner">
                                        <h2 class="text-right">New Mens Fashion<br>
                                            <span class="shopping-needs">Save up to 40% off</span></h2>
                                    </div>
                                </div>
                                <div class="new-label">
                                    <div class="text">NEW</div>
                                </div>
                                <!-- /.new-label -->
                            </div>
                            <!-- /.wide-banner -->
                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.wide-banners -->
                <!-- ============================================== WIDE PRODUCTS : END ============================================== -->

                <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                <section class="section wow fadeInUp new-arriavls">
                    <h3 class="section-title">Koleksi Terbaru</h3>
                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                        @foreach($new_arrival as $product)
                        <div class="item item-carousel">
                            <div class="products">
                                <div class="product">
                                    <div class="product-image">
                                        <div class="image">
                                            <a href="">
                                                <img src="{{ asset($product->product_thumbnail) }}">
                                            </a>
                                        </div>
                                        <!-- /.image -->
                                        <div>

                                            {{-- Syntak untuk menghitung diskon dalam format persen(%) --}}
                                            @php
                                            $amount = $product->product_price - $product->product_discount;
                                            $discount = ($amount/$product->product_price) * 100;
                                            @endphp

                                            {{-- jika product_discount tidak sama dengan null atau ada --}}
                                            @if ($product->product_discount != NULL)
                                            {{-- tampilkan discount dalam bentuk % --}}
                                            <div class="tag hot">
                                                <span>{{ round($discount) }}%</span>
                                            </div>
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                    <!-- /.product-image -->

                                    <div class="product-info text-left">
                                        <h3 class="name">
                                            <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}">
                                                {{ $product->product_name }}
                                            </a>
                                        </h3>
                                        <div class="rating rateit-small"></div>

                                        {{-- jika product_discount sama dengan null atau tidak ada --}}
                                        @if ($product->product_discount == NULL)
                                        {{-- tampilkan product_price --}}
                                        <div class="product-price">
                                            <span class="price">
                                                Rp{{ number_format($product->product_price, 0, '', '.') }}
                                            </span>
                                        </div>
                                        @else
                                        {{-- jika product_discount tidak null atau ada --}}
                                        <div class="product-price">
                                            {{-- tampilkan product_discount --}}
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
                                                        title="Keranjang">
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
                        @endforeach
                        <!-- endforeach products -->
                    </div>
                    <!-- /.home-owl-carousel -->
                </section>
                <!-- /.section -->
                <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

            </div>
            <!-- /.homebanner-holder -->
            <!-- ============================================== CONTENT : END ============================================== -->
        </div>
        <!-- /.row -->

        {{-- Brands --}}
        @include('frontend.templates.brands')

    </div>
    <!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->
@endsection