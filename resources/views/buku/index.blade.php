<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body class="bg-light">
    <main class="container">
        <!-- START FORM -->
        <div class="bg-body my-3 rounded p-3 shadow-sm">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action='' method='post'>
                @csrf

                @if (Route::current()->uri == 'buku/{id}')
                    @method('put')
                @endif
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul Buku</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='judul' id="judul"
                            value="{{ isset($data['judul']) ? $data['judul'] : old('judul') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Pengarang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='pengarang' id="pengarang"
                            value="{{ isset($data['pengarang']) ? $data['pengarang'] : old('pengarang') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="tanggal_publikasi" class="col-sm-2 col-form-label">Tanggal Publikasi</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control w-50" name='tanggal_publikasi' id="tanggal_publikasi"
                            value="{{ isset($data['tanggal_publikasi']) ? $data['tanggal_publikasi'] : old('tanggal_publikasi') }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- AKHIR FORM -->

        @if (Route::current()->uri == 'buku')

            <!-- START DATA -->
            <div class="bg-body my-3 rounded p-3 shadow-sm">
                <table class="table-striped table">
                    <thead>



                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-4">Judul</th>
                            <th class="col-md-3">Pengarang</th>
                            <th class="col-md-2">Tanggal Publikasi</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>


                    </thead>
                    <tbody>
                        @php
                            $no = $data['from'];
                        @endphp
                        @foreach ($data['data'] as $item)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $item['judul'] }}</td>
                                <td>{{ $item['pengarang'] }}</td>
                                <td>{{ date('d-m-Y', strtotime($item['tanggal_publikasi'])) }}</td>
                                <td>
                                    <a href="{{ route('buku.edit', $item['id']) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('buku.delete', $item['id']) }}" method="post"
                                        onsubmit="return confirm('apakah yakin akan melakukan penghapusan data')"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                @if ($data['links'])
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            @foreach ($data['links'] as $item)
                                <li class="page-item {{ $item['active'] ? 'active' : '' }}"><a class="page-link"
                                        href="{{ $item['url2'] }}">{!! $item['label'] !!}</a></li>
                            @endforeach

                        </ul>
                    </nav>
                @endif

            </div>
            <!-- AKHIR DATA -->
        @endif

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>
