<!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Kategori</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">
            <!-- Mengambil data kategori -->
            @php
            $categories = App\Models\Category::orderBy('category_name','ASC')->get();
            @endphp

            @foreach($categories as $category)
            <li class="dropdown menu-item">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="{{ $category->category_icon }}" aria-hidden="true"></i>
                    {{ $category->category_name }}
                </a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <div class="row">
                            <!-- Mengambil data sub kategori -->
                            @php
                            $subcategories = App\Models\SubCategory::where('category_id',
                            $category->id)->orderBy('subcategory_name','ASC')->get();
                            @endphp

                            @foreach($subcategories as $subcategory)
                            <div class="col-sm-12 col-md-3">
                                <ul class="links list-unstyled">
                                    <a
                                        href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug) }}">
                                        <h2 class="title">{{ $subcategory->subcategory_name }}</h2>
                                    </a>
                                    <!-- Mengambil data sub-sub kategori -->
                                    @php
                                    $subsubcategories =
                                    App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name','ASC')->get();
                                    @endphp

                                    @foreach($subsubcategories as $subsubcategory)
                                    <li>
                                        <a href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug) }}">
                                            {{ $subsubcategory->subsubcategory_name }}
                                        </a>
                                    </li>
                                    @endforeach
                                    <!-- end foreach sub-sub category -->
                                </ul>
                            </div>
                            @endforeach
                            <!-- end foreach sub category -->
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </li>
                    <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu -->
            </li>
            @endforeach
            <!-- end foreach category -->
            <!-- /.menu-item -->
        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
<!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->