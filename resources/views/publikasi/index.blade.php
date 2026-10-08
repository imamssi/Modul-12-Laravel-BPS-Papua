<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-
scale=1.0">

    <title>Daftar Publikasi BPS Provinsi Bengkulu</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">


</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <h1>Daftar Publikasi BPS Provinsi Bengkulu</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Tanggal Rilis</th>
                <th>Sampul</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($publikasi as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->judul }}</td>
                <td>{{ $item->tanggal_rilis }}</td>
                <td>
                    <img src="/images/{{ $item->sampul }}"
                        alt="{{ $item->judul }}"

                        width="80">

                </td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">
                        Edit
                    </a>
                    <a href="#" class="btn btn-danger btn-sm">
                        Hapus
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>