@php

// mengambil data product_tags di dalam tabel products
$tags = App\Models\Product::groupBy('product_tags')->select('product_tags')->get();

@endphp

<!-- ============================================== PRODUCT TAGS ============================================== -->
<div class="sidebar-widget product-tag wow fadeInUp" style="margin-bottom: 30px">
  <h3 class="section-title">Tag Produk</h3>
  <div class="sidebar-widget-body outer-top-xs">
      <div class="tag-list"> 
        @foreach($tags as $tag)
          <a class="item active" href="{{ url('product/tag/'.$tag->product_tags) }}">
            {{ str_replace(',',' ',$tag->product_tags)  }}</a>
        @endforeach
      </div>
      <!-- /.tag-list -->
  </div>
  <!-- /.sidebar-widget-body -->
</div>
<!-- /.sidebar-widget -->
<!-- ============================================== PRODUCT TAGS : END ============================================== -->