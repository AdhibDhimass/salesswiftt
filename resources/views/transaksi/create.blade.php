@extends('layouts.master')

@section('title')
Transaksi
@endsection

@section('sub-title')
Transaksi
@endsection

@section('content')
<section id="basic-layouts">
    <div class="container-fluid">
        <div class="row match-height justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Transaksi</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form" action="{{ route('penjualan.store') }}" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="product_id" class="form-label">Product</label>
                                        </div>
                                        <div class="col-8 form-group">
                                            <select class="form-select" id="product_id" required>
                                                <option value="" selected>--Pilih Product--</option>
                                                @foreach ($produk as $produk)
                                                    <option value="{{ $produk->id }}">{{ $produk->namaproduk }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="qty" class="form-label">qty</label>
                                        </div>
                                        <div class="col-8 form-group">
                                            <input type="number" class="form-control" id="qty" name="qty" min="1" placeholder="Masukkan Jumlah Barang">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="diskon" class="form-label">Diskon</label>
                                        </div>
                                        <div class="col-8 form-group">
                                            <input type="number" class="form-control" id="diskon" name="diskon" placeholder="Masukkan diskon Barang">
                                        </div>
                                        <div class="col-sm-12 d-flex row">
                                            <div class="col-lg-6">
                                                <a href="{{ route('penjualan.index') }}" onclick="history.back()" class="mx-auto flex">
                                                    <button type="submit" class="btn btn-outline-secondary">Kembali</button>
                                                </a>
                                            </div>
                                            <div class="col-lg-6 mx-auto d-flex justify-content-end">
                                                <button type="button" class="btn btn-primary me-1 mb-1" id="add-cart-btn">Tambah</button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 row">
        <div class="col-7">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-3">Keranjang</h6>
                    <div class="overflow-auto">
                        <div style="height: 220px">
                            <table id="cartTable" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Product</th>
                                        <th scope="col">Qty</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card" style="height: 300px;">
                <div class="card-body">
                    <h6 class="mb-3">Pesanan</h6>
                    <div class="mb-3">
                        <h1 class="fw-semibold text-muted fs-6">Total Pesanan</h1>
                        <h1 id="total-pesanan" class="fw-bolder text-primary">Rp 0</h1>
                    </div>
                    <div class="mb-3">
                        <label for="pembayaran" class="form-label">Uang</label>
                        <input type="number" class="form-control border-3" name="pembayaran" id="pembayaran" placeholder="" />
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 w-100">Submit</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Fungsi untuk menambahkan produk ke keranjang saat tombol tambah ditekan
        $('#add-cart-btn').click(function(e) {
            e.preventDefault();

            // Mendapatkan nilai input
            var productId = $('#product_id').val();
            var productName = $('#product_id option:selected').text();
            var qty = $('#qty').val();
            var diskon = $('#diskon').val();

            // Validasi input
            if (productId === '') {
                alert('Product harus dipilih');
                return;
            }

            if (qty === '' || parseInt(qty) <= 0) {
                alert('Jumlah harus diisi dengan angka yang lebih besar dari 0');
                return;
            }

            // Menambahkan produk ke keranjang
            addToCart(productId, productName, qty, diskon);
        });

        // Fungsi untuk menambahkan produk ke keranjang
        function addToCart(productId, productName, qty, diskon) {
            // Hitung total harga
            var total = qty * 1000; // Anda perlu mengganti nilai ini dengan perhitungan yang sesuai

            // Buat baris baru untuk tabel keranjang
            var newRow = '<tr>' +
                            '<td>#</td>' +
                            '<td>' + productName + '</td>' +
                            '<td>' + qty + '</td>' +
                            '<td>' + total + '</td>' +
                            '<td><button class="btn btn-danger btn-sm delete-btn">Hapus</button></td>' +
                         '</tr>';

            // Masukkan baris baru ke dalam tabel keranjang
            $('#cartTable tbody').append(newRow);

            // Hitung total pesanan
            var totalPesanan = 0;
            $('#cartTable tbody tr').each(function() {
                totalPesanan += parseInt($(this).find('td:eq(3)').text());
            });

            // Update total pesanan
            $('#total-pesanan').text('Rp ' + totalPesanan);

            // Kosongkan nilai input setelah produk ditambahkan ke keranjang
            $('#product_id').val('');
            $('#qty').val('');
            $('#diskon').val('');
        }

        // Fungsi untuk menghapus produk dari keranjang saat tombol hapus ditekan
        $('#cartTable').on('click', '.delete-btn', function() {
            $(this).closest('tr').remove();

            // Hitung total pesanan setelah menghapus produk
            var totalPesanan = 0;
            $('#cartTable tbody tr').each(function() {
                totalPesanan += parseInt($(this).find('td:eq(3)').text());
            });

            // Update total pesanan setelah menghapus produk
            $('#total-pesanan').text('Rp ' + totalPesanan);
        });
    });
</script>
@endsection
