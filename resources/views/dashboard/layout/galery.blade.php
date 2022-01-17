@php
    use App\Models\galery;
    $galery = galery::all();
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
                {{-- <div class="page-heading">
                    <h3>Profile Statistics</h3>
                </div> --}}

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
                    {{-- <section id="multiple-column-form">
                        <div class="row match-height">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Multiple Column</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <form class="form">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="first-name-column">First Name</label>
                                                            <input type="text" id="first-name-column"
                                                                class="form-control" placeholder="First Name"
                                                                name="fname-column">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="last-name-column">Last Name</label>
                                                            <input type="text" id="last-name-column"
                                                                class="form-control" placeholder="Last Name"
                                                                name="lname-column">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="city-column">City</label>
                                                            <input type="text" id="city-column" class="form-control"
                                                                placeholder="City" name="city-column">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="country-floating">Country</label>
                                                            <input type="text" id="country-floating"
                                                                class="form-control" name="country-floating"
                                                                placeholder="Country">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="company-column">Company</label>
                                                            <input type="text" id="company-column" class="form-control"
                                                                name="company-column" placeholder="Company">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="email-id-column">Email</label>
                                                            <input type="email" id="email-id-column"
                                                                class="form-control" name="email-id-column"
                                                                placeholder="Email">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <div class='form-check'>
                                                            <div class="checkbox">
                                                                <input type="checkbox" id="checkbox5"
                                                                    class='form-check-input' checked>
                                                                <label for="checkbox5">Remember Me</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="btn btn-primary me-1 mb-1">Submit</button>
                                                        <button type="reset"
                                                            class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> --}}
                    <section class="section">
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-sm btn-success" role="button" onclick="$('#tambahGambar').modal('show')">Tambah</button>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($galery as $item)
                                            
                                        
                                        <tr>
                                            <td>1</td>
                                            <td><img width="100px" src="/img/galery/{{ $item->gambar }}"></td>
                                            <td>
                                                {{-- <a class="btn btn-sm btn-primary" href="#" role="button">Edit</a> --}}
                                                <a class="btn btn-sm btn-danger" href="/galery-hapus/{{ $item->id }}" role="button">Hapus</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        {{-- <tr>
                                            <td>2</td>
                                            <td>fringilla.euismod.enim@quam.ca</td>
                                            <td>0500 527693</td>
                                            <td>New Quay</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="#" role="button">Edit</a>
                                                <a class="btn btn-sm btn-danger" href="#" role="button">Hapus</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>mi.Duis@diam.edu</td>
                                            <td>(012165) 76278</td>
                                            <td>Grumo Appula</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="#" role="button">Edit</a>
                                                <a class="btn btn-sm btn-danger" href="#" role="button">Hapus</a>
                                            </td>
                                        </tr> --}}
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

    <div class="modal" id="tambahGambar">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/galery" method="post" enctype="multipart/form-data">
                        @csrf
                        <label>Masukkan Gambar</label>
                        <input type="file" name="gambar">
                        <button type="submit">Simpan</button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
