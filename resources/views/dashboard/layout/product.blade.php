@php
    use App\Models\produk;
    $produk = produk::all();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Karya Alam Abadi</title>

    @include('dashboard.partials.style')
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
</head>

<body>
    <div id="app">
        @include('dashboard.partials.sidebar')

        <div id="main" class="layout-navbar">
            @include('dashboard.partials.header')

            <div id="main-content">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Konten Produk</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Produk</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="page-heading">
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-sm btn-success" href="#" role="button"
                                    onclick="$('#editProduk').modal('show')">Tambah</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($produk as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->judul }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td><img width="100px" src="/img/product/{{ $item->gambar }}"></td>
                                            <td>
                                                {{-- <button class="btn btn-sm btn-primary" role="button"
                                                    onclick="showModalEdit({{$item->id}})">Edit</button> --}}
                                                <a class="btn btn-sm btn-danger" href="/product-hapus/{{ $item->id }}"
                                                    role="button">Hapus</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </section>
                </div>

                @include('dashboard.partials.footer')
            </div>
        </div>
    </div>

    <div class="modal" id="editProduk">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Masukan Data Produk</h4>
                    <a type="button" class="close" data-dismiss="modal"
                        onclick="$('#editProduk').modal('hide')">&times;</a>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/product" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input id="first-name-column" class="form-control" type="text" name="judul"
                                placeholder="Masukkan Judul">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="deskripsi" placeholder="Masukkan Deskripsi"
                                rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="first-name-column">Masukkan Gambar</label>
                            <input id="first-name-column" class="form-control" type="file" name="gambar">
                        </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                    <button type="button" class="btn btn btn-danger" data-dismiss="modal"
                        onclick="$('#editProduk').modal('hide')">Batal</button>
                </div>

            </div>
        </div>
    </div>

    {{-- MODAL EDIT --}}
    <div class="modal" id="updateProduk">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Produk</h4>
                    <a type="button" class="close" data-dismiss="modal"
                        onclick="$('#updateProduk').modal('hide')">&times;</a>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form id="form-edit" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <input id="input_edit_judul" class="form-control" type="text" name="judul"
                                placeholder="Masukkan Judul">
                        </div>
                        <div class="form-group">
                            <textarea id="input_edit_deskripsi" class="form-control" name="deskripsi"
                                placeholder="Masukkan Deskripsi" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="input_edit_gambar">Masukkan Gambar</label>
                            <input id="gambar" class="form-control" type="file" name="gambar">
                        </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                    <button type="button" class="btn btn btn-danger" data-dismiss="modal"
                        onclick="$('#updateProduk').modal('hide')">Batal</button>
                </div>

            </div>
        </div>
    </div>

    @include('dashboard.partials.script')

    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);

        function showModalEdit(id) {
            fetch(window.location.origin+'/product-get/'+id)
            .then(res => res.json())
            .then(res => {
                
        // masukin id ke form action edit
        $('#form-edit').attr('action', window.location.origin+'/product-get/'+id);

        // Masukin data dari result ke input modal edit
        $('#input_edit_judul').val(res.judul)
        $('#input_edit_deskripsi').val(res.deskripsi)
        $('#input_edit_gambar').val(res.gambar)
        $('#updateProduk').modal('show')
        })
    }
    </script>
</body>

</html>
