<!-- <ul>
	@foreach($products as $item)
	<li> <img src="{{ asset($item->product_thambnail) }}" style="width: 30px; height: 30px;"> {{ $item->product_name_en }}  </li>
	@endforeach

</ul> -->
<style>
    body {
        background-color: #eee
    }

    .card {
        background-color: #fff;
        padding: 15px;
        border: none
    }

    .input-box {
        position: relative
    }

    .input-box i {
        position: absolute;
        right: 13px;
        top: 15px;
        color: #ced4da
    }

    .form-control {
        height: 50px;
        background-color: #eeeeee69
    }

    .form-control:focus {
        background-color: #eeeeee69;
        box-shadow: none;
        border-color: #eee
    }

    .list {
        padding-top: 20px;
        padding-bottom: 10px;
        display: flex;
        align-items: center
    }

    .border-bottom {
        border-bottom: 2px solid #eee
    }

    .list i {
        font-size: 19px;
        color: red
    }

    .list small {
        color: #dedddd
    }
</style>

{{-- jika produk tidak ada --}}
@if($products -> isEmpty())
{{-- tampilkan ini --}}
<h4 class="text-center text-danger">Produk tidak ditemukan </h4>
@else
{{-- jika produk yang di cari ada --}}
{{-- tampilkan ini --}}
<div class="container mt-5">
    <div class="row d-flex justify-content-center ">
        <div class="col-md-6">
            <div class="card">

                @foreach($products as $item)
                <a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug ) }}">
                    <div class="list border-bottom">
                        <img src="{{ asset($item->product_thumbnail) }}" style="width: 30px; height: 30px;">
                        <div class="d-flex flex-column ml-3" style="margin-left: 10px;">
                            <span>{{ $item->product_name }} </span> 
                            <small>Rp{{ number_format($item->product_price, 0, '', '.') }}</small>
                        </div>
                    </div>
                </a>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endif