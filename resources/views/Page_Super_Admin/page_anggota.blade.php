<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota</title>
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
            transition: width .75s ease;
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
            transition: background-color .3s, color .3s, opacity .75s ease;
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
            transition: opacity .75s ease;
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
            transition: width .75s ease, height .75s ease;
        }

        .side-bar:hover img {
            width: 200px;
            height: 200px;
        }

        /* Content area styles */
        .content {
            margin-left: 120px;
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            transition: margin-left .75s ease; /* Agar transisi margin selaras dengan sidebar */
        }

        .side-bar:hover ~ .content {
            margin-left: 270px; /* Mengatur jarak yang sama dengan lebar maksimum sidebar */
        }

        /* Header and container styles */
        .header-container {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .header-container img {
            margin-right: 20px;
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
            border-radius: 40px;
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

        th, td {
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
            transition: background-color 0.3s, box-shadow 0.3s;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        }

        .posisi {
            margin-top: 30px;
            display: flex; /* Mengatur tombol dalam satu baris */
            justify-content: space-between; /* Memberi jarak di antara tombol */
        }

        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.3s;
        }

        .close-btn:hover, .close-btn:focus {
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
            margin-top: auto;
            text-align: center;
            padding: 10px;
            background: #fff;
            color: #aaa;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="side-bar">
        <img src="{{url('/Asset/super admin.png')}}" alt="Super Admin Image">
        <div class="menu-item">
            <i class="fas fa-house"></i>
            <a href="{{ route('page_dashboard') }}"><span>Home</span></a>
        </div>
        
        <div class="menu-item">
            <i class="fa-solid fa-users"></i>
            <span>Anggota</span>
        </div>
        <div class="menu-item">
            <i class="fa-solid fa-clock-rotate-left"></i>
            <span>Riwayat</span>
        </div>
        <div class="menu-item">
            <i class="fa-solid fa-dolly"></i>
            <a href="page_stok"><span>Stok Barang</span></a>
        </div>
        <div class="menu-item keluar">
            <i class="fa-solid fa-right-from-bracket"></i>
            <a href="page_keluar"><span>Keluar</span></a>
        </div>
    </div>

    <div class="content">
        <div class="header-container">
            <div class="detile">
                <h1>Anggota</h1>
            </div>
        </div>
        <div class="container-content">
            <h1>Detail Anggota</h1>

            <div class="serch">
                <input type="text" id="search-input" placeholder="Cari Anggota...">
                <button type="button" id="search-btn"><i class="fas fa-search"></i></button>
            </div>
            

            <table id="member-table">
                <thead>
                    <tr>
                        <th>Nama Pengguna</th>
                        <th>Password</th>
                        <th>Posisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->password }}</td> <!-- Kolom password -->
                        <td>{{ $user->role }}</td> <!-- Kolom posisi atau role -->

                        <td>
                            
                            <button class="edit-btn" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-role="{{ $user->role }}">Edit</button>
                            <button class="hapus-btn" data-id="{{ $user->id }}">Hapus</button>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button id="add-member-btn">Tambahkan Anggota</button>
        </div>
    </div>

     <!-- Modal Create-->
    <div id="member-modal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2 id="modal-title">Tambahkan Anggota</h2>

            <form id="member-form" action="{{ route('page_anggota.store') }}" method="POST">
                @csrf
                <label for="username">Nama Pengguna</label>
                <input type="text" id="username" name="name" required>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
                <label for="position">Posisi</label>
                <input type="text" id="position" name="role" required>
                <button type="submit">Tambah</button>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="edit-modal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2 id="modal-title">Edit Anggota</h2>

            <form id="edit-form" action="" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit-id" name="id">
                <label for="edit-username">Nama Pengguna</label>
                <input type="text" id="edit-username" name="name" required>
                <label for="edit-password">Password</label>
                <input type="password" id="edit-password" name="password" required>
                <label for="edit-position">Posisi</label>
                <input type="text" id="edit-position" name="role" required>
                <button type="submit">Simpan</button>
            </form>
        </div>
    </div>

    <!-- Modal Delete -->
<div id="delete-modal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2 id="modal-title">Konfirmasi Hapus</h2>
        <p>Apakah Anda yakin ingin menghapus anggota ini?</p>
        <form id="delete-form" action="" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" id="delete-id" name="id">
            {{-- untuk posisi jarak hapus dan batal --}}
            <div class="posisi">
                <button type="submit" class="arak">Hapus</button>
                <button type="button" id="cancel-delete">Batal</button>
            </div>
        </form>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const addModal = document.getElementById('member-modal');
        const editModal = document.getElementById('edit-modal');
        const deleteModal = document.getElementById('delete-modal');
        const openAddModalBtn = document.getElementById('add-member-btn');
        const closeAddModalBtn = document.querySelector('#member-modal .close-btn');
        const closeEditModalBtn = document.querySelector('#edit-modal .close-btn');
        const closeDeleteModalBtn = document.querySelector('#delete-modal .close-btn');
        const openEditModalBtns = document.querySelectorAll('.edit-btn');
        const openDeleteModalBtns = document.querySelectorAll('.hapus-btn');
        const cancelDeleteBtn = document.getElementById('cancel-delete');
        const addForm = document.getElementById('member-form');
        const editForm = document.getElementById('edit-form');
        const deleteForm = document.getElementById('delete-form');

        // Java Scriptcreate 
        openAddModalBtn.addEventListener('click', () => {
            addModal.style.display = 'flex';
        });

        closeAddModalBtn.addEventListener('click', () => {
            addModal.style.display = 'none';
        });

        closeEditModalBtn.addEventListener('click', () => {
            editModal.style.display = 'none';
        });

        closeDeleteModalBtn.addEventListener('click', () => {
            deleteModal.style.display = 'none';
        });

        cancelDeleteBtn.addEventListener('click', () => {
            deleteModal.style.display = 'none';
        });

        window.addEventListener('click', (event) => {
            if (event.target === addModal) {
                addModal.style.display = 'none';
            }
            if (event.target === editModal) {
                editModal.style.display = 'none';
            }
            if (event.target === deleteModal) {
                deleteModal.style.display = 'none';
            }
        });

        // Java Script Edit 
        openEditModalBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                const id = e.target.getAttribute('data-id');
                const name = e.target.getAttribute('data-name');
                const role = e.target.getAttribute('data-role');

                document.getElementById('edit-id').value = id;
                document.getElementById('edit-username').value = name;
                document.getElementById('edit-position').value = role;
                // bentuk route java script //
                document.getElementById('edit-form').action = `page_anggota.update/${id}`;

                editModal.style.display = 'flex';
            });
        });

        //java Script Delete 
        openDeleteModalBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                const id = e.target.getAttribute('data-id');
                document.getElementById('delete-id').value = id;
                deleteForm.action = `page_anggota.destroy/${id}`;
                deleteModal.style.display = 'flex';
                 // bentuk route java script //
                document.getElementById('delete-form').action = `page_anggota.delete/${id}`;
            });
        });
    });

    // untuk serch
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('search-input');
        const searchBtn = document.getElementById('search-btn');
        const tableRows = document.querySelectorAll('#member-table tbody tr');

    // Function to filter rows based on the search query
    function filterTable(query) {
        tableRows.forEach(row => {
            const cells = row.getElementsByTagName('td');
            let match = false;

            for (let i = 0; i < cells.length; i++) {
                if (cells[i].textContent.toLowerCase().includes(query)) {
                    match = true;
                    break;
                }
            }

            if (match) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    searchBtn.addEventListener('click', () => {
        const query = searchInput.value.toLowerCase();
        filterTable(query);
    });

    // Handle input change for real-time search
    searchInput.addEventListener('input', () => {
        const query = searchInput.value.toLowerCase();
        if (query === '') {
            // Show all rows if query is empty
            tableRows.forEach(row => row.style.display = '');
        } else {
            filterTable(query);
        }
    });

    // Optional: Allow pressing Enter to trigger search
    searchInput.addEventListener('keypress', (event) => {
        if (event.key === 'Enter') {
            searchBtn.click();
        }
    });
});


</script>


</body>

</html>
