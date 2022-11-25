<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>CRUD KARYAWAN</title>
</head>

<body>
    <div class="container mt-3">
        <h2>CRUD KARYAWAN</h2>

        @if (session('status'))
            <div class="result">
                <div class="alert alert-primary">{{ session('status') }}</div>
            </div>

        @endif
        <button type="button" class="btn btn-primary btn-tambah" data-toggle="modal" data-target="#modalTambah">
            Tambah Data
        </button>
        <table class="table table-light">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Gaji</th>
                    <!-- <th>Status Karyawan</th> -->
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($karyawan as $item)
                    <tr>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->tanggal_lahir }}</td>
                        <td>{{ $item->gaji }}</td>
                        <!-- <td>{{ $item->status_karyawan == 1 ? 'Aktif' : 'Tidak Aktif' }}</td> -->
                        <td><button type="button" class="btn btn-warning btn-edit"
                                data-url={{ route('karyawan.getKaryawan', ['id' => $item->id]) }} data-toggle="modal"
                                data-target="#modalEdit">
                                Edit
                            </button>
                            <a class="btn btn-danger btn-delete"
                                href="{{ route('karyawan.delete', ['id' => $item->id]) }}"
                                onclick="return confirm('Apa kamu yakin?')">Delete</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('karyawan.create') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                    placeholder="" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gaji" class="col-sm-3 col-form-label">Gaji</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="gaji" id="gaji" placeholder="" value="">
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="status_karyawan" class="col-sm-3 col-form-label">Status Karyawan</label>
                            <div class="col-sm-9">
                                <select id="status_karyawan" class="custom-select" name="status_karyawan">
                                    <option value=1>Aktif</option>
                                    <option value=0>Tidak Aktif</option>
                                </select>
                            </div>
                        </div> -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="{{ route('karyawan.update') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" name="id" id="id" value="">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                    placeholder="" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gaji" class="col-sm-3 col-form-label">Gaji</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="gaji" id="gaji" placeholder="" value="">
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="status_karyawan" class="col-sm-3 col-form-label">Status Karyawan</label>
                            <div class="col-sm-9">
                                <select id="status_karyawan" class="custom-select" name="status_karyawan">
                                    <option value=1>Aktif</option>
                                    <option value=0>Tidak Aktif</option>
                                </select>
                            </div>
                        </div> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        $('.btn-edit').click(function() {
            var url = $(this).data('url');
            $('#modalEdit #id').val('')
            $('#modalEdit #nama').val('')
            $('#modalEdit #tanggal_lahir').val('')
            $('#modalEdit #gaji').val('')
            $.ajax({
                type: "get",
                url: url,
                dataType: "json",
                success: function(res) {
                    $('#modalEdit #id').val(res['id'])
                    $('#modalEdit #nama').val(res['nama'])
                    $('#modalEdit #tanggal_lahir').val(res['tanggal_lahir'])
                    $('#modalEdit #gaji').val(res['gaji'])
                }
            });
        });

    </script>
</body>

</html>