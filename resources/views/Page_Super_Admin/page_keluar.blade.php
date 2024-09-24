<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keluar</title>
    <style>
        body {
            background-repeat: no-repeat;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.4); /* Gelap lebih serasi */
            overflow: hidden;
        }

        .modal {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            width: 350px;
            text-align: center;
            position: relative;
            z-index: 2;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3); /* Efek box-shadow yang lebih dalam */
            animation: fadeIn 0.5s ease forwards;
        }

        .modal h1 {
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .modal p {
            color: #666;
            margin-bottom: 30px;
            font-size: 16px;
        }

        .modal button {
            margin: 10px;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            background-color: #7B86EF;
            color: white;
            transition: background-color 0.3s ease, transform 0.3s ease;
            display: inline-block;
        }

        .modal button:hover {
            background-color: #5a68d3;
            transform: scale(1.2);
        }

        .modal button:active {
            transform: scale(0.95);
        }

        .modal .cancel-button {
            background-color: #e0e0e0;
            color: #333;
        }

        .modal .cancel-button:hover {
            background-color: #c0c0c0;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
            animation: fadeInOverlay 0.5s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes fadeInOverlay {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: scale(1);
            }
            to {
                opacity: 0;
                transform: scale(0.9);
            }
        }

        @keyframes fadeOutOverlay {
            from {
                opacity: 1;
            }
            to {
                opacity: 0;
            }
        }
    </style>
</head>
<body>

    <div class="overlay"></div>
    
    <div class="modal">
        <h1>Konfirmasi Keluar</h1>
        <p>Apakah Anda yakin ingin keluar? Semua perubahan yang belum disimpan akan hilang.</p>
        <a href="/" class="modal-button"><button>Keluar</button></a>
        <button type="button" class="cancel-button" onclick="history.back()">Kembali</button> 
    </div>

    <script>
        // Menutup modal dan overlay
        function closeModal() {
            const modal = document.querySelector('.modal');
            const overlay = document.querySelector('.overlay');
            
            modal.style.animation = 'fadeOut 0.5s ease forwards';
            overlay.style.animation = 'fadeOutOverlay 0.5s ease forwards';
            
            setTimeout(() => {
                modal.style.display = 'none';
                overlay.style.display = 'none';
            }, 500);
        }
    </script>

</body>
</html>
