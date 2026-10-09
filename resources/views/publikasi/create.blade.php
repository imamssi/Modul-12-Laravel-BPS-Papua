<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Publikasi BPS</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        :root {
            --navy: rgb(2, 20, 79);
            --navy-light: rgb(40, 64, 137);
            --navy-soft: rgb(232, 242, 251);
            --accent-blue: #005baa;
            --text-light: rgb(209, 220, 252);
        }
        * { box-sizing: border-box; }
        body {
            background-color: var(--navy-soft);
            font-family: "Segoe UI", Arial, sans-serif;
            margin: 0;
        }
        main {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .bps-header {
            background-color: var(--navy);
            color: white;
            padding: 10px 4vw;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 10px 5vw;
            font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
            box-shadow: 0 4px 16px rgba(2, 20, 79, 0.1);
        }
        .header-brand {
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .header-brand img { width: 46px; }
        .header-brand h1 {
            font-style: italic;
            font-size: 15px;
            line-height: 1.35;
            margin: 0;
            font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
        }
        .bps-nav { display: flex; flex-wrap: wrap; gap: 4px 6px; }
        .bps-nav a {
            font-family: sans-serif;
            font-size: 14px;
            color: white;
            text-decoration: none;
            padding: 9px 14px;
            border-radius: 6px;
            white-space: nowrap;
        }
        .bps-nav a:hover, .bps-nav a.active { background-color: var(--navy-light); }
        article { margin-top: 32px; margin-bottom: 48px; flex: 1; }
        .page-title {
            text-align: center;
            color: var(--navy);
            font-family: Georgia, serif;
            font-weight: normal;
            margin: 0 0 20px;
        }
        .form-card {
            background: #fff;
            max-width: 600px;
            margin: 0 auto;
            padding: 28px;
            border-radius: 10px;
            box-shadow: 0 4px 16px rgba(2, 20, 79, 0.1);
        }
        .form-publikasi {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .form-group label { font-weight: bold; font-size: 14px; }
        .form-group input {
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 14px;
            width: 100%;
            box-sizing: border-box;
        }
        .form-group input:focus {
            outline: none;
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 3px rgba(0, 91, 170, 0.15);
        }
        .is-invalid { border-color: #c0392b !important; }
        .invalid-feedback { color: #c0392b; font-size: 13px; }
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
        .btn-simpan {
            padding: 10px 24px;
            background-color: var(--accent-blue);
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
        }
        .btn-simpan:hover { background-color: #003f7a; }
        .btn-kembali {
            padding: 10px 24px;
            background-color: #6c757d;
            color: white;
            border-radius: 6px;
            font-size: 14px;
            text-decoration: none;
        }
        .btn-kembali:hover { background-color: #5a6268; color: white; }
        .pesanError { margin-bottom: 4px; }
        .error-msg {
            box-sizing: border-box;
            color: #c0392b;
            background-color: #fdecea;
            border-left: 4px solid #c0392b;
            padding: 6px 12px;
            margin: 4px 0;
            border-radius: 4px;
            font-size: 13px;
        }
        @media (max-width: 640px) {
            .form-card { margin: 0 12px; padding: 20px; }
            .bps-header { justify-content: center; text-align: center; }
            .bps-nav { width: 100%; justify-content: center; }
        }
    </style>
</head>

<body>
    <main>
    <header class="bps-header">
        <div class="header-brand">
            <img src="https://papua.bps.go.id/_next/image?url=%2Fassets%2Flogo-bps.png&w=3840&q=75" alt="Logo BPS">
            <h1>BADAN PUSAT STATISTIK<br>PROVINSI PAPUA</h1>
        </div>
        <nav class="bps-nav">
            <a href="{{ route('publikasi.index') }}">Daftar Publikasi</a>
            <a class="active" href="{{ route('publikasi.create') }}">Tambah Publikasi</a>
        </nav>
    </header>

    <article>
    <h2 class="page-title">Tambah Publikasi</h2>

    <div class="form-card">
        @if ($errors->any())
            <div class="pesanError">
                @foreach ($errors->all() as $error)
                    <div class="error-msg">{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('publikasi.store') }}" enctype="multipart/form-data" class="form-publikasi">
            @csrf

            <div class="form-group">
                <label for="judul">Judul Publikasi</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul') }}"
                    placeholder="Masukkan judul publikasi"
                    class="@error('judul') is-invalid @enderror">
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tanggal_rilis">Tanggal Rilis</label>
                <input type="date" id="tanggal_rilis" name="tanggal_rilis" value="{{ old('tanggal_rilis') }}"
                    class="@error('tanggal_rilis') is-invalid @enderror">
                @error('tanggal_rilis')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="sampul">Foto Sampul</label>
                <input type="file" id="sampul" name="sampul" accept=".jpg,.jpeg,.png,.webp"
                    class="@error('sampul') is-invalid @enderror">
                @error('sampul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('publikasi.index') }}" class="btn-kembali">Kembali</a>
                <button type="submit" class="btn-simpan">Simpan</button>
            </div>
        </form>
    </div>

    </article>
    </main>
</body>

</html>
