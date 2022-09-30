@extends('frontend.main-master')
@section('content')

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="{{ url('/') }}">Beranda</a></li>
                <li class='active'>Cari Produk</li>
            </ul>
        </div>
        <!-- /.breadcrumb-inner -->
    </div>
    <!-- /.container -->
</div>
<!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
    <div class='container'>
        <div class='row'>
            <div class='col-md-3 sidebar'>
                <!-- ================================== TOP NAVIGATION ================================== -->
                @include('frontend.templates.vertical-menu')
                <!-- ================================== TOP NAVIGATION : END ================================== -->
                <div class="sidebar-module-container">
                    <div class="sidebar-filter">
                        <!-- ============================================== SIDEBAR CATEGORY ============================================== -->
                        <div class="sidebar-widget wow fadeInUp">
                            <h3 class="section-title">Filter</h3>
                            <div class="widget-header">
                                <h4 class="widget-title">Kategori</h4>
                            </div>
                            <div class="sidebar-widget-body">
                                <div class="accordion">
                                    @foreach($categories as $category)
                                    <div class="accordion-group">
                                        <div class="accordion-heading"> 
                                            <a href="#collapse{{ $category->id }}" data-toggle="collapse" 
                                                class="accordion-toggle collapsed">
                                                {{ $category->category_name }} 
                                            </a> 
                                        </div>
                                        <!-- /.accordion-heading -->
                                        <div class="accordion-body collapse" id="collapse{{ $category->id }}"
                                            style="height: 0px;">
                                            <div class="accordion-inner">

                                                @php
                                                $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
                                                @endphp

                                                @foreach($subcategories as $subcategory)
                                                <ul>
                                                    <li>
                                                        <a href="#}">
                                                            {{ $subcategory->subcategory_name }} 
                                                        </a>
                                                    </li>
                                                </ul>
                                                @endforeach
                                            </div>
                                            <!-- /.accordion-inner -->
                                        </div>
                                        <!-- /.accordion-body -->
                                    </div>
                                    <!-- /.accordion-group -->
                                    @endforeach
                                </div>
                                <!-- /.accordion -->
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

                        <!-- ============================================== PRICE SILDER============================================== -->
                        <div class="sidebar-widget wow fadeInUp" style="margin-bottom: 30px">
                            <div class="widget-header">
                                <h4 class="widget-title">Harga</h4>
                            </div>
                            <div class="sidebar-widget-body m-t-10">
                                <div class="price-range-holder"> <span class="min-max"> <span
                                            class="pull-left">$200.00</span> <span class="pull-right">$800.00</span>
                                    </span>
                                    <input type="text" id="amount"
                                        style="border:0; color:#666666; font-weight:bold;text-align:center;">
                                    <input type="text" class="price-slider" value="">
                                </div>
                                <!-- /.price-range-holder -->
                            </div>
                            <!-- /.sidebar-widget-body -->
                        </div>
                        <!-- /.sidebar-widget -->
                        <!-- ============================================== PRICE SILDER : END ============================================== -->

                        <!-- ============================================== PRODUCT TAGS ============================================== -->
                        @include('frontend.templates.product-tags')

                        <!-- ============================================== TESTIMONIALS ============================================== -->
                        @include('frontend.templates.testimonials')
                        <!-- ============================================== TESTIMONIALS: END ============================================== -->
                    </div>
                    <!-- /.sidebar-filter -->
                </div>
                <!-- /.sidebar-module-container -->
            </div>
            <!-- /.sidebar -->
            <div class='col-md-9'>
                <!-- ========================================== SECTION – HERO ========================================= -->
                <div id="category" class="category-carousel hidden-xs">
                    <div class="item">
                        <div class="image">
                            <img src="{{ asset('frontend/assets/images/banners/home-banner.png') }}" alt=""
                                class="img-responsive">
                        </div>
                    </div>
                </div>

                <h4>
                    <b>Total Pencarian </b>
                    {{-- menampilkan jumlah produk yang memiliki tag yang sama yang diklik sebelumnya --}}
                    <span class="badge badge-danger" style="background: #FF0000;">{{ count($products) }}</span> Items
                </h4>

                <div class="clearfix filters-container m-t-10">
                    <div class="row">
                        <div class="col col-sm-6 col-md-2">
                            <div class="filter-tabs">
                                <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                    <li class="active"> 
                                        <a data-toggle="tab" href="#grid-container">
                                            <i class="icon fa fa-th-large"></i>Grid
                                        </a> 
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#list-container">
                                            <i class="icon fa fa-th-list"></i>List
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.filter-tabs -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <div class="search-result-container ">
                    <div id="myTabContent" class="tab-content category-list">
                        <div class="tab-pane active " id="grid-container">
                            <div class="category-product">
                                <div class="row">

                                    {{-- menampilkan data produk dalam mode grid --}}
                                    @foreach ($products as $product)
                                    <div class="col-sm-6 col-md-4 wow fadeInUp">
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
                                    @endforeach

                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.category-product -->
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane " id="list-container">
                            <div class="category-product">

                                {{-- Menampilkan data produk dalam mode list --}}
                                @foreach($products as $product)
                                <div class="category-product-inner wow fadeInUp">
                                    <div class="products">
                                        <div class="product-list product">
                                            <div class="row product-list-row">
                                                <div class="col col-sm-4 col-lg-4">
                                                    <div class="product-image">
                                                        <div class="product-image">
                                                            <div class="image"> 
                                                                <img src="{{ asset($product->product_thumbnail) }}" alt="">
                                                            </div>
                                                        </div>
                                                        <!-- /.product-image -->
                                                    </div>
                                                    <!-- /.product-image -->
                                                </div>
                                                <!-- /.col -->
                                                <div class="col col-sm-8 col-lg-8">
                                                    <div class="product-info">
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
                                                        <div class="description m-t-10">{{ $product->product_short_desc }}</div>
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        <button class="btn btn-primary icon"
                                                                            data-toggle="dropdown" type="button"> 
                                                                            <i class="fa fa-shopping-cart"></i>
                                                                        </button>
                                                                        <button class="btn btn-primary cart-btn"
                                                                            type="button">Keranjang</button>
                                                                    </li>
                                                                    <li class="lnk wishlist"> 
                                                                        <a class="add-to-cart"
                                                                            href="detail.html" title="Wishlist">
                                                                            <i class="icon fa fa-heart"></i> 
                                                                        </a> 
                                                                    </li>
                                                                    <li class="lnk"> 
                                                                        <a class="add-to-cart"
                                                                            href="{{ url('product/details/'.$product->id.'/'.$product->product_slug ) }}" 
                                                                            title="Detail Produk"> 
                                                                            <i class="fa fa-eye"></i> 
                                                                        </a> 
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <!-- /.action -->
                                                        </div>
                                                        <!-- /.cart -->
                                                    </div>
                                                    <!-- /.product-info -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.product-list-row -->
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
                                        <!-- /.product-list -->
                                    </div>
                                    <!-- /.products -->
                                </div>
                                <!-- /.category-product-inner -->
                                @endforeach

                            </div>
                            <!-- /.category-product -->
                        </div>
                        <!-- /.tab-pane #list-container -->
                    </div>
                    <!-- /.tab-content -->
                    <div class="clearfix filters-container">
                        <div class="text-right">
                            <div class="pagination-container">
                                <ul class="list-inline list-unstyled">
                                    {{ $products->links() }}
                                </ul>
                                <!-- /.list-inline -->
                            </div>
                            <!-- /.pagination-container -->
                        </div>
                        <!-- /.text-right -->

                    </div>
                    <!-- /.filters-container -->

                </div>
                <!-- /.search-result-container -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.templates.brands')
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->

</div>
<!-- /.body-content -->

@endsection