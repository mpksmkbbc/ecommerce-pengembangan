@extends('backend.admin-master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Kecamatan
                            <span class="badge badge-pill badge-primary">{{ count($district) }} </span>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th>Provinsi</th>
                                        <th>Kota / Kabupaten </th>
                                        <th>Kecamatan </th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($district as $key => $item)
                                    <tr>
                                        <td> {{ $key + 1 }} </td>
                                        <td> {{ $item->province->province_name }} </td>
                                        <td> {{ $item->city->city_name }} </td>
                                        <td> {{ $item->district_name }} </td>
                                        <td width="40%">
                                            <a href="{{ route('district.edit', $item->id) }}" class="btn btn-sm btn-info"
                                                title="Edit Data">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('district.delete', $item->id) }}"
                                                class="btn btn-sm btn-danger" title="Delete Data" id="delete">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <!-- Tambah Kecamatan -->
            <div class="col-md-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Kecamatan </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('district.store') }}" 
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <h5>Provinsi <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="province_id" class="form-control">
                                            <option value="" selected="" disabled="">Pilih Provinsi</option>
                                            @foreach($province as $div)
                                            <option value="{{ $div->id }}">{{ $div->province_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('province_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Kota / Kabupaten <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="city_id" class="form-control">
                                            <option value="" selected="" disabled="">Pilih Kota / Kabupaten</option>
                                            @foreach($city as $dis)
                                            <option value="{{ $dis->id }}">{{ $dis->city_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('city_id')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Kecamatan <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="district_name" class="form-control"
                                            placeholder="Nama Kecamatan">
                                        @error('district_name ')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-md btn-primary mb-5" value="Tambah">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

@endsection