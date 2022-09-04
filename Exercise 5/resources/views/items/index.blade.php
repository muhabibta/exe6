<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">

    <title>Buku | Exercise 5: Alfat</title>
</head>

<body>
    <div class="container">
        <h1 class="my-4">Data Buku</h1>

        <table class="table table-hover table-borderless">
            <thead id="table-head">
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Jumlah</th>
                    <th class="text-center">Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $index => $item)
                    <tr class="text-center align-middle">
                        <td style="width: 8%">{{ $index + 1 }}</td>
                        <td class="text-start" style="width: 20%">{{ $item->name }}</td>
                        <td class="text-start" style="width: 20%">{{ $item->category->name }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td style="width: 40%">Rp. {{ $item->price }}</td>
                        <td>
                            <div class="d-flex justify-content-start mb-0">
                                <a href="{{ route('edit', $item->id) }}" class="btn btn-success edit">
                                    Edit        |       <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger delete ms-2" type="submit">
                                        Hapus       |       <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <hr>

        <div class="col-2 ms-auto">
            <a href="{{ route('create') }}" class="btn btn-primary add ms-auto rounded-full">
                Tambah Data
            </a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
