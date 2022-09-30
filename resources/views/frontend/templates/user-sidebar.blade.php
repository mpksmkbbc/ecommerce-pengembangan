@php

$id = Auth::user()->id;
$user = App\Models\User::find($id);

@endphp
<div class="col-md-2"><br>
  <!-- Menampilkan foto profil yang login -->
  <img class="card-img-top" style="border-radius: 50%"
      src="{{ (!empty($user->profile_photo_path))? url('upload/user-images/'.$user->profile_photo_path):url('upload/no-image.jpg') }}"
      height="100%" width="100%"><br><br>
  <ul class="list-group list-group-flush">
      <a href="{{ route('dashboard') }}" class="btn btn-sm btn-primary btn-block">Beranda</a>
      <a href="{{ route('user.profile') }}" class="btn btn-sm btn-primary btn-block">Profil Saya</a>
      <a href="{{ route('change.password') }}" class="btn btn-sm btn-primary btn-block">Ubah Kata Sandi</a>
      <a href="{{ route('my.orders') }}" class="btn btn-sm btn-primary btn-block">Transaksi</a>
      <a href="{{ route('cancel.order.list') }}" class="btn btn-sm btn-primary btn-block">Batal Pesan</a>
      <a href="{{ route('return.order.list') }}" class="btn btn-sm btn-primary btn-block">Pengembalian</a>
      <a href="{{ route('user.logout') }}" class="btn btn-sm btn-danger btn-block">Keluar</a>
  </ul>
</div>