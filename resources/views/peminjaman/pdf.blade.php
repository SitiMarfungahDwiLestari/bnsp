<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bukti Peminjaman Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .content {
            margin-top: 20px;
        }
        .info-item {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            width: 150px;
            display: inline-block;
        }
        .footer {
            margin-top: 50px;
            text-align: right;
        }
        .signature-line {
            margin-top: 70px;
            border-top: 1px solid #000;
            width: 200px;
            display: inline-block;
        }
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 100px;
            color: rgba(0,0,0,0.1);
            z-index: -1;
        }
    </style>
</head>
<body>
    <div class="watermark">PERPUSTAKAAN</div>
    <div class="header">
        <h1>BUKTI PEMINJAMAN BUKU</h1>
        <h2>PERPUSTAKAAN</h2>
    </div>

    <div class="content">
        <div class="info-item">
            <span class="label">No. Peminjaman</span>: {{ $peminjaman->id }}
        </div>
        <div class="info-item">
            <span class="label">Nama Peminjam</span>: {{ $peminjaman->user->name }}
        </div>
        <div class="info-item">
            <span class="label">Email</span>: {{ $peminjaman->user->email }}
        </div>
        <div class="info-item">
            <span class="label">Judul Buku</span>: {{ $peminjaman->buku->judul }}
        </div>
        <div class="info-item">
            <span class="label">Tanggal Pinjam</span>: {{ date('d/m/Y', strtotime($peminjaman->tanggal_pinjam)) }}
        </div>
        <div class="info-item">
            <span class="label">Tanggal Kembali</span>: {{ date('d/m/Y', strtotime($peminjaman->tanggal_kembali)) }}
        </div>
    </div>

    <div class="footer">
        <p>{{ date('d-m-Y') }}</p>
        <div class="signature-line">
            <p>Petugas Perpustakaan</p>
        </div>
    </div>
</body>
</html>
