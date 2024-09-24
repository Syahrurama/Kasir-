<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awal</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: whitesmoke;
        }

        .container {
            display: flex;
            max-width: 850px;
            width: 100%;
            background: rgb(116, 116, 203);
            border-radius: 20px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
        }

        .gambar {
            width: 50%;
            background: rgb(116, 116, 203);
            position: relative;
            animation: slideInLeft 1s ease-out;
        }

        .gambar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        .separator {
            position: absolute;
            right: 50%;
            top: 0;
            bottom: 0;
            width: 2px;
            background-color: white; 
        }

        .login {
            width: 50%;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            animation: fadeIn 1.5s ease-out;
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
            font-weight: bolder;
            text-transform: uppercase;
            color: white;
            animation: fadeIn 2s ease-out;
        }

        /* Warna buat tulisan "Datang!" */
        .highlight {
            color: #EF907C;
        }

        .role {
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: fadeIn 2s ease-out;
        }

        .role button {
            border: none;
            outline: none;
            padding: 10px;
            width: 150px;
            color: rgb(116, 116, 203);
            font-size: 16px;
            cursor: pointer;
            margin: 10px 0;
            border-radius: 5px;
            background: #fff;
            font-weight: bolder;
            transition: transform 0.3s ease, background-color 0.3s ease;
            animation: slideInUp 1.2s ease-out;
        }
        
        /* untuk membesar kecil button  */
        .role button:hover {
            transform: scale(1.2);
            background-color: #EF907C;
            color: #fff;
        }

        /* Pressed effect */
        .role button:active {
            transform: scale(0.95);
        }

        @media (max-width: 880px) {
            .container {
                flex-direction: column;
                max-width: 90%;
                margin: 20px;
            }

            .gambar {
                width: 100%;
                height: 200px;
            }

            .gambar img {
                border-radius: 0;
                border-top-right-radius: 15px;
                border-top-left-radius: 15px;
            }

            .separator {
                width: 100%;
                height: 2px;
                left: 0;
                right: 0;
                top: auto;
                bottom: 50%;
            }

            .login {
                width: 100%;
                padding: 20px 10px;
            }
        }

        /* animasi masuk gambar */
        @keyframes slideInLeft {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* animasi masuk tulisan */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        /* animasi masuk button  */
        @keyframes slideInUp {
            from {
                transform: translateY(100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>

</head>
<body>

    <!-- untuk gambar -->
    <div class="container">
        <div class="gambar">
        <img src="{{url('/Asset/kasir.png')}}" alt="Forgot Password Image">

        </div>

    <!-- untuk tulisan -->
    <div class="separator"></div>
    <div class="login">
        <h1>Selamat <span class="highlight">Datang!</span></h1>

    <!-- untuk button -->
    <div class="role">
        <button onclick="window.location.href='{{ url('/login_super_admin') }}'">Super Admin</button>
        <button onclick="window.location.href='{{ url('/login_admin') }}'">Admin</button>
        <button onclick="window.location.href='{{ url('/login_petugas') }}'">Petugas</button>
    </div>
    
        </div>
    </div>
</body>
</html>
