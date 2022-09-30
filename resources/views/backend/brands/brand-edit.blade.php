@extends('backend.admin-master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- Edit Brand -->
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Ubah Merek </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            
                            <form method="post" action="{{ route('brand.update',$brands->id) }}"
                                enctype="multipart/form-data">
                                @csrf

                                {{-- Mengambil data brand berdasarkan id yang diambil dari url --}}
                                <input type="hidden" name="id" value="{{ $brands->id }}">
                                <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">

                                <div class="form-group">
                                    <h5>Nama Merek <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="brand_name" class="form-control"
                                            value="{{ $brands->brand_name }}">
                                        @error('brand_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Gambar Merek <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="brand_image" class="form-control">
                                        @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-md btn-primary mb-5" value="Perbarui">
                                </div>
                            </form>
                            <!-- /.box-body -->
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

@endsection