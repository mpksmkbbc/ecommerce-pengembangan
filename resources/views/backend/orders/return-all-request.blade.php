@extends('backend.admin-master')
@section('content')

<div class="container-full">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                          Data Pengembalian <span class="badge badge-pill badge-danger">{{ count($orders) }}</span>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th>Tanggal </th>
                                        <th>Invoice </th>
                                        <th>Total Bayar </th>
                                        <th>Metode Bayar </th>
                                        <th>Status </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $orders as $key => $item )
                                    <tr>
                                        <td> {{ $key+1 }} </td>
                                        <td> {{ $item->order_date }} </td>
                                        <td> {{ $item->invoice_number }} </td>
                                        <td> Rp{{ number_format($item->amount,0,'','.') }} </td>
                                        <td> {{ $item->payment_method }} </td>
                                        <td>
                                            @if($item->return_order == 1)
                                            <span class="badge badge-pill badge-primary">Ditunda </span>
                                            @elseif($item->return_order == 2)
                                            <span class="badge badge-pill badge-success">Berhasil </span>
                                            @endif
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
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

@endsection