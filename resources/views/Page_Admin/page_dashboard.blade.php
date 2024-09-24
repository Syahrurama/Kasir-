<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keluar</title>
    <!-- Menambahkan Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            background: whitesmoke;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Mengatur tinggi body agar konten terpusat */
            overflow: hidden; /* Menghilangkan scrollbar saat animasi */
        }

        .container {
            display: flex;
            width: 100%;
            height: 100%;
            opacity: 0; /* Mulai dengan transparan untuk animasi */
            transition: opacity 1s ease-in-out; /* Transisi untuk efek masuk */
        }

        .container.show {
            opacity: 1; /* Menampilkan konten saat animasi selesai */
        }

        .side-bar {
            width: 100px;
            height: 100vh; /* Memastikan sidebar memanjang hingga bawah halaman */
            background-color: rgb(116, 116, 203);
            padding: 20px;
            box-sizing: border-box;
            color: #fff;
            overflow: hidden;
            border-radius: 10px;
            transition: width .75s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: fixed; /* Sidebar tetap pada posisi tetap saat menggulir */
            top: 0; /* Memastikan sidebar berada di bagian atas */
            left: 0; /* Memastikan sidebar berada di sisi kiri */
            z-index: 1; /* Menjaga sidebar berada di bawah kartu */
        }

        .side-bar:hover {
            width: 250px;
        }

        .menu-item {
            width: 100%;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            padding: 10px; /* Memberi ruang untuk padding pada menu-item */
            border-radius: 5px; /* Menambahkan border-radius pada menu-item */
            transition: background-color .3s, color .3s, opacity .75s ease;
            opacity: 0.8;
            cursor: pointer; /* Menambahkan cursor pointer untuk efek tombol */
        }

        .menu-item i {
            font-size: 24px;
            margin-right: 10px;
        }

        .menu-item span {
            white-space: nowrap;
            overflow: hidden;
            opacity: 0; /* Menyembunyikan teks saat tidak diperluas */
            transition: opacity .75s ease;
            font-weight: bold;
        }

        .side-bar:hover .menu-item span {
            opacity: 1; /* Menampilkan teks saat diperluas */
        }

        .menu-item:hover {
            background-color: #fff; /* Mengubah background menjadi putih saat hover */
            color: rgb(116, 116, 203); /* Mengubah warna teks saat hover */
            opacity: 1; /* Menyesuaikan opacity saat hover */
        }

        .menu-item.keluar:hover {
            background-color: #fff; /* Mengubah background menjadi putih saat hover */
            color: red; /* Mengubah warna teks dan ikon menjadi merah saat hover */
            opacity: 1; /* Menyesuaikan opacity saat hover */
        }

        /* Pengaturan gambar */
        .side-bar img {
            width: 95px; /* Mengatur lebar gambar */
            height: 95px; /* Mengatur tinggi gambar */
            margin-bottom: 20px; /* Menambah jarak bawah gambar */
            transition: width .75s ease, height .75s ease; /* Animasi ukuran gambar */
        }

        .side-bar:hover img {
            width: 200px; /* Mengubah lebar gambar saat sidebar diperluas */
            height: 200px; /* Mengubah tinggi gambar saat sidebar diperluas */
        }

        .content {
            margin-left: 120px; /* Margin default dari sidebar */
            flex: 1; /* Membuat konten menyesuaikan ruang yang tersisa */
            padding: 20px;
            position: relative; /* Menjaga konten tetap di atas */
            z-index: 2; /* Menjaga konten berada di atas sidebar */
            transition: margin-left .75s ease; /* Transisi untuk margin ketika sidebar diperluas */
        }

        .side-bar:hover ~ .content {
            margin-left: 270px; /* Margin saat sidebar diperluas */
        }

        h1 {
            color: rgb(116, 116, 203);
            margin-left: 12px;
        }

        .card-container {
            display: flex;
            justify-content: flex-start; /* Mengatur kartu agar sejajar kiri */
            flex-wrap: wrap; /* Agar kartu bisa turun baris jika tidak cukup ruang */
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 250px; /* Menyesuaikan ukuran kartu */
            text-align: center;
            margin: 10px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            z-index: 2; /* Menjaga kartu berada di atas sidebar */
        }

        .card:hover {
            transform: translateY(-15px); /* Mengangkat kartu saat hover */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Menambah bayangan saat hover */
        }

        .card i {
            font-size: 36px; /* Memperbesar ikon */
            color: rgb(116, 116, 203); /* Menyesuaikan warna ikon */
            margin-bottom: 10px; /* Menambah jarak bawah ikon */
        }

        .card h3 {
            font-size: 28px;
            margin: 10px 0;
        }

        .card p {
            font-size: 16px;
            color: rgb(116, 116, 203);
            margin: 0;
        }

        .card a {
            display: inline-block;
            margin-top: 10px;
            color: rgb(116, 116, 203);
            text-decoration: none;
            font-weight: bold;
        }

        .card a:hover {
            text-decoration: underline;
        }

        .lupa a {
            display: inline-block;
            margin-top: 10px;
            color: rgb(116, 116, 203);
            text-decoration: none; /* Menghilangkan garis bawah */
            font-weight: bold;
            transition: color 0.3s ease, transform 0.3s ease; /* Transisi untuk perubahan warna dan transformasi */
        }

        .lupa a:hover {
            color: red; /* Mengubah warna saat hover */
            transform: scale(1.1); /* Membesarkan teks sedikit saat hover */
        }

        .footer {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            color:#aaa;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <!-- Bagian Side-Bar dan Konten -->
    <div class="container">
        <div class="side-bar">
            <img src="{{url('/Asset/admin.png')}}" alt="Forgot Password Image">
            <br>
            <div class="menu-item">
                <i class="fas fa-house"></i>
                <form action=""><span>Home</span></form>
            </div>

            <div class="menu-item">
                <i class="fa-solid fa-clock-rotate-left"></i>
                <form action=""><span>Riwayat</span></form>
            </div>
            <div class="menu-item">
                <i class="fa-solid fa-dolly"></i>
                <a href="#"><span>Stok Barang</span></a>
            </div>
            <div class="menu-item keluar">
                <i class="fa-solid fa-right-from-bracket"></i>
                <a href="page_keluar"><span>Keluar</span></a>
            </div>
        </div>

        <div class="content">
            <h1>Home</h1>
            <div class="card-container">

                <div class="card">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                    <p>Riwayat</p>
                    <div class="lupa">
                        <a href="#">Selengkapnya</a>
                    </div>
                </div>
                <div class="card">
                    <i class="fa-solid fa-dolly"></i>
                    <p>Stock Barang</p>
                    <div class="lupa">
                        <a href="page_stok_admin">Selengkapnya</a>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <span>Powered by RaSa</span>
            </footer>
        </div>
    </div>

    <script>
        window.addEventListener('load', () => {
            document.querySelector('.container').classList.add('show');
        });
    </script>
</body>
</html>
