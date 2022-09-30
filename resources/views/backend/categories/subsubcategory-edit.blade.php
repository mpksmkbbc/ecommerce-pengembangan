@extends('backend.admin-master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Edit Sub Sub Kategori -->
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ubah Sub-Sub Kategori </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="table-responsive">
                                <form method="post" action="{{ route('subsubcategory.update',$subsubcategories->id)}}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- Mengambil data subsubkategori berdasarkan id yang diambil dari url --}}
                                    <input type="hidden" name="id" value="{{ $subsubcategories->id }}">
    
                                    <div class="form-group">
                                        <h5>Kategori <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select class="form-control" name="category_id">
                                                <option selected disabled>Pilih Kategori</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $subsubcategories->category_id ? 'selected' : '' }}>
                                                    {{ $category->category_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Sub Kategori <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" class="form-control">
                                                <option value="" selected="" disabled="">Pilih Sub Kategori</option>
    
                                                @foreach($subcategories as $subsub)
                                                <option value="{{ $subsub->id }}"
                                                    {{ $subsub->id == $subsubcategories->subcategory_id ? 'selected':'' }}>
                                                    {{ $subsub->subcategory_name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>Sub-Sub Kategori <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="subsubcategory_name" class="form-control"
                                                value="{{ $subsubcategories->subsubcategory_name }}">
                                            @error('subsubcategory_name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-md btn-primary mb-5" value="Ubah">
                                    </div>
                                </form>
                                <!-- /.box-body -->
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

{{-- Ajax Sub Category --}}
<script type="text/javascript">
    $(document).ready(function () {
        $('select[name="category_id"]').on('change', function () {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="subcategory_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .subcategory_name + '</option>');
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