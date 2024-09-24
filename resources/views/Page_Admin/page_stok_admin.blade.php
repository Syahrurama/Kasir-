<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Barang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        *{
            text-decoration: none;
        }
        /* Resetting styles for full-screen layout */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow-y: auto;
        }

        body {
            background: whitesmoke;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            margin: 0;
        }

        /* Sidebar styles */
        .side-bar {
            width: 100px;
            height: 100vh;
            background-color: rgb(116, 116, 203);
            padding: 20px;
            box-sizing: border-box;
            color: #fff;
            overflow: hidden;
            border-radius: 10px;
            transition: width 0.75s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 3;
        }

        .side-bar:hover {
            width: 250px;
        }

        /* Sidebar menu items */
        .menu-item {
            width: 100%;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s, opacity 0.75s ease;
            opacity: 0.8;
            cursor: pointer;
        }

        .menu-item i {
            font-size: 24px;
            margin-right: 10px;
        }

        .menu-item span {
            white-space: nowrap;
            overflow: hidden;
            opacity: 0;
            transition: opacity 0.75s ease;
            font-weight: bold;
        }

        .side-bar:hover .menu-item span {
            opacity: 1;
        }

        .menu-item:hover {
            background-color: #fff;
            color: rgb(116, 116, 203);
            opacity: 1;
        }

        .menu-item.keluar:hover {
            background-color: #fff;
            color: red;
            opacity: 1;
        }

        .side-bar img {
            width: 95px;
            height: 95px;
            margin-bottom: 20px;
            transition: width 0.75s ease, height 0.75s ease;
        }

        .side-bar:hover img {
            width: 200px;
            height: 200px;
        }

        /* Content area styles */
        .content {
            margin-left: 120px; /* Default margin */
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            transition: margin-left 0.75s ease; /* Transition to match sidebar */
        }

        .side-bar:hover ~ .content {
            margin-left: 270px; /* Margin when sidebar is expanded */
        }

        .content.show {
            opacity: 1;
            transform: translateY(0);
        }

        .header-container {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .detile h1 {
            margin-bottom: 50px;
            color: #6674ee;
            font-weight: bold;
        }

        .container-content {
            width: 95%;
            max-width: 1300px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }

        .container-content h1 {
            color: #6674ee;
            display: flex;
            justify-content: center;
        }

        .serch {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            position: relative;
            margin-left: -10%;
        }

        .serch input[type="text"] {
            padding: 10px 20px;
            width: 100%;
            max-width: 300px;
            border: 1px solid #ccc;
            border-radius: 25px;
            box-sizing: border-box;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            margin-left: 70%;
        }

        .serch input[type="text"]:focus {
            border-color: #7B86EF;
            box-shadow: 0 0 5px rgba(123, 134, 239, 0.5);
        }

        .serch button {
            position: absolute;
            right: 10px;
            border: none;
            background: #d9d9d9;
            cursor: pointer;
            font-size: 16px;
            color: white;
            transition: color 0.3s ease;
            border-radius:40px;
            transition: background-color 0.3s;
        }

        .serch button:hover {
            color: white;
            background: #7B86EF;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            overflow: hidden;
            border-radius: 10px;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #7B86EF;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e9ecef;
            transition: background-color 0.3s;
        }

        button {
            display: inline-block;
            padding: 10px 25px;
            background-color: #7B86EF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 5px;
        }

        button:hover {
            background-color: whitesmoke;
            color: #7B86EF;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 4;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .modal.show {
            display: flex;
            opacity: 1;
            transform: scale(1);
        }

        .modal-content {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            position: relative;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                transform: translateY(-30px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s;
        }

        .close-btn:hover,
        .close-btn:focus {
            color: #000;
        }

        #modal-title {
            color: #7B86EF;
            text-align: left;
            margin-bottom: 20px;
        }

        form label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #333;
        }

        form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        form button {
            width: 100%;
            padding: 10px;
            background-color: #7B86EF;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button:hover {
            background-color: whitesmoke;
            color: #7B86EF;
        }

        /* Footer styles */
        .footer {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            color: #aaa;
            font-size: 14px;
            display: none;
        }
    </style>
</head>

<body>

    <div class="side-bar">
        <img src="{{url('/Asset/admin.png')}}" alt="Forgot Password Image">
        <div class="menu-item">
            <i class="fas fa-house"></i>
            <a href="dashboard"><span>Home</span></a>
        </div>
        <div class="menu-item">
            <i class="fa-solid fa-users"></i>
            <a href="page_anggota"><span>Anggota</span></a>
        </div>
        <div class="menu-item">
            <i class="fa-solid fa-clock-rotate-left"></i>
            <span>Riwayat</span>
        </div>
        <div class="menu-item">
            <i class="fa-solid fa-dolly"></i>
            <span>Stok Barang</span>
        </div>
        <div class="menu-item keluar">
            <i class="fa-solid fa-right-from-bracket"></i>
            <a href="page_keluar"><span>Keluar</span></a>
        </div>
    </div>

    <div class="content">
        <div class="header-container">
            <div class="detile">
                <h1>Stok Barang</h1>
            </div>
        </div>
        <div class="container-content">
            <h1>Stok Produk</h1>

            <div class="serch">
                <input type="text" placeholder="Cari produk...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>

            <table id="product-table">
                <thead>
                    <tr>
                        <th>Gambar Produk</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Produk akan ditambahkan di sini -->
                </tbody>
            </table>
            <button id="add-product-btn">Tambahkan Produk</button>
        </div>
    </div>

    <div id="product-modal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2 id="modal-title">Tambahkan Produk</h2>
            <form id="product-form">
                <label for="product-name">Nama Produk</label>
                <input type="text" id="product-name" required>
                <label for="product-stock">Stok</label>
                <input type="number" id="product-stock" required>
                <label for="product-price">Harga</label>
                <input type="number" id="product-price" required>
                <label for="product-image">Gambar Produk</label>
                <input type="file" id="product-image" required>
                <button type="submit">Tambah Produk</button>
            </form>
        </div>
    </div>

    <script>
        // Animasi untuk memunculkan konten ketika halaman dimuat
        window.addEventListener('load', () => {
            document.querySelector('.content').classList.add('show');
        });

        // Menampilkan modal saat tombol "Tambahkan Produk" diklik
        document.getElementById('add-product-btn').addEventListener('click', () => {
            document.getElementById('product-modal').classList.add('show');
        });

        // Menutup modal saat tombol close diklik
        document.querySelector('.close-btn').addEventListener('click', () => {
            document.getElementById('product-modal').classList.remove('show');
        });

        // Menutup modal saat area di luar modal diklik
        window.addEventListener('click', (event) => {
            if (event.target === document.getElementById('product-modal')) {
                document.getElementById('product-modal').classList.remove('show');
            }
        });

        // Menghandle submit form produk
        document.getElementById('product-form').addEventListener('submit', (event) => {
            event.preventDefault();
            // Logika untuk menambahkan produk ke tabel di sini
            alert('Produk telah ditambahkan!');
            document.getElementById('product-modal').classList.remove('show');
        });
    </script>

</body>

</html>
