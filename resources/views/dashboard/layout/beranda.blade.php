@php
use App\Models\home;
$home = home::all();
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
                            <h3>Konten Beranda</h3>
                            <p class="text-subtitle text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Beranda</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="page-heading">
                    <section class="section">
                        <div class="card">                            
                            <div class="card-header">
                                <button class="btn btn-sm btn-success" role="button"
                                    onclick="$('#editHome').modal('show')">Tambah</button>
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
                                        @foreach ($home as $item)
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $item->nama  }}</td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td><img width="100px" src="/img/home/{{ $item->gambar }}"></td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="#" role="button">Edit</a>
                                                <a class="btn btn-sm btn-danger" href="#" role="button">Hapus</a>
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

    <div class="modal" id="editHome">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Home</h4>
                    <a type="button" class="close" data-dismiss="modal" onclick="$('#editHome').modal('hide')">&times;</a>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/home" method="post">
                        @csrf
                        <div class="form-group">
                            <input id="first-name-column" class="form-control" type="text" name="nama"
                                placeholder="masukan nama ">
                        </div>
                        <div class="form-group">
                            <input id="first-name-column" class="form-control" type="text" name="deskripsi"
                                placeholder="deskripsi">
                        </div>
                        <div class="form-group">
                            <input id="first-name-column" class="form-control" type="file" name="gambar">
                        </div>                        
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    </form>
                    <button type="button" class="btn btn btn-danger" data-dismiss="modal"onclick="$('#editKontak').modal('hide')">Batal</button>
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
    </script>
</body>

</html>
