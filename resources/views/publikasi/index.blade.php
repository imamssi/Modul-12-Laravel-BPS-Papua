<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Publikasi BPS Provinsi Papua</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        :root {
            --navy: rgb(2, 20, 79);
            --navy-light: rgb(40, 64, 137);
            --navy-soft: rgb(232, 242, 251);
            --accent-blue: #005baa;
            --text-light: rgb(209, 220, 252);
        }

        * {
            box-sizing: border-box;
        }

        body {
            background-color: var(--navy-soft);
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        main {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 10px 5vw;
            color: white;
            background-color: var(--navy);
            font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
            padding: 10px 4vw;
            box-shadow: 0 4px 16px rgba(2, 20, 79, 0.1);
        }

        .header-brand {
            display: flex;
            align-items: center;
            gap: 14px;
            min-width: 0;
        }

        .logoBPS {
            width: 46px;
            flex-shrink: 0;
        }

        header h1 {
            font-style: italic;
            font-size: 15px;
            line-height: 1.35;
            margin: 0;
        }

        nav {
            display: flex;
            flex-wrap: wrap;
            gap: 4px 6px;
        }

        nav a {
            font-family: sans-serif;
            font-size: 14px;
            color: white;
            text-decoration: none;
            padding: 9px 14px;
            border-radius: 6px;
            white-space: nowrap;
        }

        nav a:hover {
            background-color: var(--navy-light);
        }

        nav a.active {
            background-color: var(--navy-light);
        }

        article {
            margin-top: 32px;
            margin-bottom: 48px;
            flex: 1;
        }

        .page-title {
            text-align: center;
            color: var(--navy);
            font-family: Georgia, serif;
            font-weight: normal;
            margin: 0 0 20px;
        }

        .alert-success {
            width: min(80vw, 900px);
            margin: 0 auto 16px;
            color: #1e7e34;
            background-color: #e6f4ea;
            border-left: 4px solid #1e7e34;
            padding: 8px 14px;
            border-radius: 4px;
            font-size: 14px;
        }

        .toolbar {
            width: min(80vw, 900px);
            margin: 0 auto 16px;
        }

        .btn-tambah {
            display: inline-block;
            padding: 10px 24px;
            background-color: var(--accent-blue);
            color: white;
            border-radius: 6px;
            font-size: 14px;
            text-decoration: none;
        }

        .btn-tambah:hover {
            background-color: #003f7a;
            color: white;
        }

        .table-wrap {
            width: min(80vw, 900px);
            margin: 0 auto;
            overflow-x: auto;
        }

        table.tabel-publikasi {
            background-color: white;
            border-collapse: collapse;
            border-radius: 5px;
            width: 100%;
            margin: 0;
        }

        .tabel-publikasi th {
            background-color: rgb(18, 35, 112);
            color: azure;
            font-family: Serif;
            padding: 20px 0.5em;
            text-align: center;
        }

        .tabel-publikasi td {
            text-align: center;
            padding: 8px;
            font-family: "cambria";
        }

        .tabel-publikasi tr:nth-child(even) {
            background-color: rgb(232, 240, 255);
            color: rgb(2, 3, 79);
        }

        .tabel-publikasi img {
            width: 70px;
            height: auto;
        }

        .empty-row td {
            padding: 22px;
            color: #8892a8;
            font-style: italic;
        }

        @media (max-width: 720px) {
            header {
                justify-content: center;
                text-align: center;
            }

            .header-brand {
                justify-content: center;
            }

            nav {
                width: 100%;
                justify-content: center;
            }

            header h1 {
                font-size: 13px;
            }

            nav a {
                font-size: 13px;
                padding: 8px 10px;
            }

            .toolbar,
            .alert-success,
            .table-wrap {
                width: 92vw;
            }
        }
    </style>
</head>

<body>
    <main>
        <header>
            <div class="header-brand">
                <img class="logoBPS"
                    src="https://papua.bps.go.id/_next/image?url=%2Fassets%2Flogo-bps.png&w=3840&q=75"
                    alt="Logo BPS">
                <h1>BADAN PUSAT STATISTIK<br>PROVINSI PAPUA</h1>
            </div>
            <nav>
                <a class="active" href="{{ route('publikasi.index') }}">Daftar Publikasi</a>
                <a href="{{ route('publikasi.create') }}">Tambah Publikasi</a>
            </nav>
        </header>
        <article>
            <h2 class="page-title">Daftar Publikasi</h2>
            @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-wrap">
                <table class="tabel-publikasi" border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tanggal Rilis</th>
                            <th>Sampul</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($publikasi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->tanggal_rilis }}</td>
                            <td>
                                @if (
                                !empty($item->sampul) &&
                                file_exists(public_path('images/' . $item->sampul))
                                )
                                <img
                                    src="{{ asset('images/' . $item->sampul) }}"
                                    alt="{{ $item->judul }}">
                                @else
                                <span>Tidak ada sampul</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr class="empty-row">
                            <td colspan="4">Belum ada data publikasi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </article>
    </main>
</body>

</html>