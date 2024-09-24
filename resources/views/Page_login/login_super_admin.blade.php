<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin</title>
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
            color: white;
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
            font-weight: bolder;
            text-transform: uppercase;
        }

        .highlight {
            color: #EF907C;
        }

        .detile form {
            display: flex;
            flex-direction: column;
        }

        .detile form label {
            color: white;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .detile form input {
            padding: 10px;
            margin-bottom: 6px;
            border-radius: 10px;
            border: none;
            outline: none;
            font-size: 16px;
        }

        .login-button, .back-button {
            padding: 12px;
            background: #fff;
            font-size: 16px;
            cursor: pointer;
            border-radius: 18px;
            border: none;
            font-weight: bolder;
            transition: all 0.3s ease;
            width: auto;
            min-width: 150px;
            text-align: center;
            margin-top: 20px;
        }

        .login-button {
            color: rgb(116, 116, 203);
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
            background: #fff;
            color: red;
            margin-top: 10px;
        }

        .back-button:hover {
            background-color: red;
            color: #fff;
            transform: scale(1.05);
        }

        .back-button:active {
            transform: scale(0.95);
        }

        /* Style tambahan untuk mengatur jarak antar tombol */
        button + button {
            margin-top: 10px;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="gambar">
            <img src="{{url('/Asset/super admin.png')}}" alt="Forgot Password Image">
        </div>

        <div class="separator"></div>

        <div class="login">
            <h1>Super <span class="highlight">Admin</span></h1>

            <!-- Flash Message -->
            @if (session('error'))
                <div class="alert alert-danger" style="color: red; text-align: center; margin-bottom: 15px;">
                    {{ session('error') }}
                </div>
            @endif

            <div class="detile">
                <form action="{{ route('loginSuperAdmin') }}" method="POST">
                    @csrf
                    <label for="name">Nama Pengguna :</label>
                    <input required name="name" type="text" id="name" placeholder="Masukan Nama Pengguna">
                    
                    <label for="password">Password :</label>
                    <input required name="password" type="password" id="password" placeholder="Masukan Password">
                    
                    <button type="submit" class="login-button">Login</button>
                    <button type="button" class="back-button" onclick="history.back()">Kembali</button>  
                </form>
            </div>
        </div>
    </div>
</body>
</html>
