<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
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
            background: white;
            overflow: hidden;
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
            opacity: 0; /* Mulai dengan opacity 0 untuk animasi masuk */
            animation: zoomInContainer 1s ease-out forwards; /* Animasi zoom dan fade-in untuk container */
            will-change: opacity, transform; /* Menunjukkan perubahan yang diharapkan */
        }

        .gambar {
            width: 50%;
            background: rgb(116, 116, 203);
            position: relative;
            animation: slideInLeft 1s ease-out forwards; /* Animasi slide-in untuk gambar */
        }

        .gambar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
        }

        .separator {
            position: absolute;
            right: 50%;
            top: 0;
            bottom: 0;
            width: 2px;
            background-color: #E0F2FC;
        }

        .login {
            width: 50%;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            opacity: 0; /* Mulai dengan opacity 0 untuk animasi masuk */
            animation: fadeInLogin 1.5s ease-out 0.5s forwards; /* Animasi fade-in untuk login dengan delay */
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
            font-weight: bolder;
            text-transform: uppercase;
            color: white;
            animation: fadeInH1 2s ease-out;
        }

        .highlight {
            color: #EF907C;
        }

        .detile form {
            display: flex;
            flex-direction: column;
            animation: fadeInForm 2s ease-out 1s forwards; /* Animasi fade-in untuk form dengan delay */
        }

        .detile form label {
            color: white;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .detile form input {
            padding: 10px;
            margin-bottom: 6px; /* Mengurangi jarak antara input */
            border-radius: 10px;
            border: none;
            outline: none;
            font-size: 16px;
        }

        .login-button {
            padding: 10px;
            background: #fff;
            color: rgb(116, 116, 203);
            font-size: 16px;
            cursor: pointer;
            border-radius: 18px;
            border: none;
            font-weight: bolder;
            transition: transform 0.3s ease, background-color 0.3s ease;
            width: auto;
            min-width: 150px;
            text-align: center;
            margin-top: 30px; /* Mengurangi jarak antara button password dengan login */
        }
        
        .login-button:hover {
            transform: scale(1.05);
            background-color: #EF907C;
            color: #fff;
        }

        .login-button:active {
            transform: scale(0.95);
        }

        .back-button {
            padding: 10px;
            font-weight: bolder;
            border-radius: 18px;
            background: #fff;
            color: red;
            margin-top: 10px; /* Mengurangi jarak antara tombol back dan login */
            border: none;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: red; 
            color: #fff;
            transform: scale(1.05);
        }

        .back-button:active {
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
                border-top-right-radius: 20px;
                border-top-left-radius: 20px;
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

        @keyframes zoomInContainer {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes fadeInLogin {
            from {
                opacity: 0;
                transform: translateY(20px); /* Animasi masuk dari bawah */
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInH1 {
            from {
                opacity: 0;
                transform: translateY(-20px); /* Animasi masuk dari atas */
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInForm {
            from {
                opacity: 0;
                transform: translateY(20px); /* Animasi masuk dari bawah */
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="gambar">
        <img src="{{url('/Asset/admin.png')}}" alt="Forgot Password Image">
        </div>

        <div class="separator"></div>

        <div class="login"  >
            <h1>Login <span class="highlight">Admin</span></h1>

            <!-- Flash Message -->
            @if (session('error'))
                <div class="alert alert-danger" style="color: red; text-align: center; margin-bottom: 15px;">
                    {{ session('error') }}
                </div>
            @endif

            <div class="detile">
                <form action="{{ route('loginAdmin') }}" method="POST">
                    @csrf
                    <label for="username">Nama Pengguna :</label>
                    <input type="text" id="username" name="name" placeholder="Masukan Nama Pengguna">
                
                    <label for="password">Password :</label>
                    <input type="password" id="password" name="password" placeholder="Masukan Password">
                
                    <button type="submit" class="login-button">Login</button>
                    <button type="button" class="back-button" onclick="history.back()">Kembali</button>  
                </form>
            </div>
        </div>
    </div>

</body>
</html>
