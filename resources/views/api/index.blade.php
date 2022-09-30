<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('API Tokens') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('api.api-token-manager')
        </div>
    </div>
</x-app-layout>


@extends('backend.admin-master')
@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Produk
                            <span class="badge badge-pill badge-primary"> {{ count($products) }} </span>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No. </th>
                                        <th width="25%">Foto </th>
                                        <th>Barcode </th>
                                        <th width="15%">Nama Produk </th>
                                        <th>Harga </th>
                                        <th>Diskon </th>
                                        <th>Stok </th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset($item->product_thumbnail) }}"
                                                style="width: 70px; height: 70px;" alt="">
                                        </td>
                                        <td>{{ $item->product_code }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td>Rp{{ number_format($item->product_price,0,'','.') }}</td>
                                        <td>
                                            {{-- jika product_discount tidak ada atau null --}}
                                            @if($item->product_discount == NULL)
                                            {{-- tampilkan ini --}}
                                            <span class="badge badge-pill badge-danger">Tidak ada diskon</span>
                                            @else
                                            {{-- jika product_discount ada --}}

                                            {{-- jalankan perintah berikut --}}
                                            @php
                                            $amount = $item->product_price - $item->product_discount;
                                            $discount = ($amount/$item->product_price) * 100;
                                            @endphp
                                            {{-- kemudian tampilkan ini --}}
                                            <span class="badge badge-pill badge-danger">{{ round($discount)  }} %</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->product_qty }}</td>
                                        <td>
                                            {{-- jika product_status true atau 1 --}}
                                            @if($item->product_status == 1)
                                            {{-- tampilkan ini --}}
                                            <span class="badge badge-pill badge-success"> Aktif </span>
                                            @else
                                            {{-- jika product_status false atau 0 --}}
                                            {{-- tampilkan ini --}}
                                            <span class="badge badge-pill badge-danger"> Non Aktif </span>
                                            @endif
                                        </td>
                                        <td width="20%">
                                            <a href="" class="btn btn-sm btn-info"
                                                title="Edit Data">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="" class="btn btn-sm btn-danger" 
                                                title="Hapus Data" id="delete">
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
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

@endsection