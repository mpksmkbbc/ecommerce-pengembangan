@extends('backend.admin-master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Edit Kategori -->
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ubah Kategori </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        
                        <form method="post" action="{{ route('category.update') }}" enctype="multipart/form-data">
                            @csrf
                            {{-- Mengambil data kategori berdasarkan id yang diambil dari url --}}
                            <input type="hidden" name="id" value="{{ $categories->id }}">

                            <div class="form-group">
                                <h5>Kategori <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_name" class="form-control"
                                        value="{{ $categories->category_name }}">
                                    @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group pt-5">
                                <h5>Ikon <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="category_icon" class="form-control"
                                        value="{{ $categories->category_icon }}">
                                    @error('category_icon')
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
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection