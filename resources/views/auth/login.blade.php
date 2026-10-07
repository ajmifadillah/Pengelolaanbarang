<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login - Pengelolaan Barang</title>


    <!-- Font -->

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >


    <!-- Font Awesome -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    >


    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        body {

            min-height: 100vh;

            font-family: 'Inter', sans-serif;

            background: #f4f7f5;

            color: #17231d;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 25px;

        }


        .login-container {

            width: 100%;

            max-width: 880px;

            min-height: 510px;

            background: #ffffff;

            border: 1px solid #e0e8e3;

            border-radius: 10px;

            overflow: hidden;

            display: grid;

            grid-template-columns: 1fr 1fr;

            box-shadow:
                0 12px 35px rgba(25, 55, 39, .08);

        }


        /* =========================================
           LEFT
        ========================================= */

        .login-info {

            background: #2f7d55;

            color: #ffffff;

            padding: 48px;

            display: flex;

            flex-direction: column;

            justify-content: space-between;

        }


        .brand {

            display: flex;

            align-items: center;

            gap: 12px;

        }


        .brand-icon {

            width: 42px;

            height: 42px;

            border-radius: 8px;

            background: rgba(255,255,255,.13);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 17px;

        }


        .brand-name {

            font-size: 15px;

            font-weight: 700;

            letter-spacing: -.2px;

        }


        .brand-subtitle {

            font-size: 9px;

            color: rgba(255,255,255,.7);

            margin-top: 3px;

        }


        .info-content {

            max-width: 330px;

        }


        .info-content h1 {

            font-size: 30px;

            line-height: 1.25;

            margin-bottom: 14px;

            letter-spacing: -.7px;

        }


        .info-content p {

            color: rgba(255,255,255,.78);

            font-size: 12px;

            line-height: 1.8;

        }


        .info-features {

            margin-top: 25px;

            display: flex;

            flex-direction: column;

            gap: 12px;

        }


        .feature {

            display: flex;

            align-items: center;

            gap: 10px;

            color: rgba(255,255,255,.88);

            font-size: 10px;

        }


        .feature-icon {

            width: 27px;

            height: 27px;

            border-radius: 5px;

            background: rgba(255,255,255,.1);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 10px;

        }


        .copyright {

            font-size: 9px;

            color: rgba(255,255,255,.55);

        }


        /* =========================================
           RIGHT
        ========================================= */

        .login-form-area {

            padding: 48px;

            display: flex;

            flex-direction: column;

            justify-content: center;

        }


        .form-heading {

            margin-bottom: 28px;

        }


        .form-heading h2 {

            font-size: 22px;

            font-weight: 700;

            color: #17231d;

            margin-bottom: 6px;

        }


        .form-heading p {

            font-size: 11px;

            color: #7a8781;

            line-height: 1.6;

        }


        .alert-error {

            background: #fcebea;

            border: 1px solid #f3d1ce;

            color: #b42318;

            border-radius: 6px;

            padding: 10px 12px;

            margin-bottom: 18px;

            font-size: 10px;

        }


        .form-group {

            margin-bottom: 17px;

        }


        .form-label {

            display: block;

            font-size: 10px;

            font-weight: 600;

            color: #52615a;

            margin-bottom: 7px;

        }


        .input-wrapper {

            position: relative;

        }


        .input-icon {

            position: absolute;

            left: 12px;

            top: 50%;

            transform: translateY(-50%);

            color: #8a9690;

            font-size: 11px;

        }


        .form-input {

            width: 100%;

            height: 40px;

            border: 1px solid #d6dfda;

            border-radius: 6px;

            padding: 0 12px 0 34px;

            font-family: 'Inter', sans-serif;

            font-size: 11px;

            color: #26352e;

            outline: none;

            transition: .15s;

        }


        .form-input:focus {

            border-color: #2f7d55;

            box-shadow:
                0 0 0 2px rgba(47,125,85,.08);

        }


        .form-input::placeholder {

            color: #a1aaa5;

        }


        .btn-login {

            width: 100%;

            height: 40px;

            margin-top: 5px;

            border: none;

            border-radius: 6px;

            background: #2f7d55;

            color: #ffffff;

            font-family: 'Inter', sans-serif;

            font-size: 11px;

            font-weight: 600;

            cursor: pointer;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            transition: .15s;

        }


        .btn-login:hover {

            background: #256644;

        }


        .register-link {

            text-align: center;

            margin-top: 20px;

            font-size: 10px;

            color: #7a8781;

        }


        .register-link a {

            color: #2f7d55;

            font-weight: 600;

            text-decoration: none;

        }


        .register-link a:hover {

            text-decoration: underline;

        }


        @media (max-width: 700px) {

            body {

                padding: 15px;

            }


            .login-container {

                grid-template-columns: 1fr;

                max-width: 450px;

            }


            .login-info {

                padding: 28px;

                min-height: 230px;

            }


            .info-content {

                margin-top: 30px;

            }


            .info-content h1 {

                font-size: 23px;

            }


            .info-features {

                display: none;

            }


            .copyright {

                margin-top: 25px;

            }


            .login-form-area {

                padding: 30px;

            }

        }


        @media (max-width: 400px) {

            .login-info {

                padding: 24px;

            }


            .login-form-area {

                padding: 24px;

            }

        }

    </style>

</head>


<body>


<div class="login-container">


    <!-- LEFT SIDE -->

    <div class="login-info">


        <div class="brand">

            <div class="brand-icon">

                <i class="fa-solid fa-boxes-stacked"></i>

            </div>


            <div>

                <div class="brand-name">
                    Pengelolaan Barang
                </div>

                <div class="brand-subtitle">
                    Sistem Manajemen Persediaan
                </div>

            </div>

        </div>


        <div class="info-content">

            <h1>
                Kelola persediaan<br>
                dengan lebih teratur.
            </h1>


            <p>

                Pantau data barang, transaksi masuk,
                transaksi keluar, dan kondisi stok
                dalam satu sistem.

            </p>


            <div class="info-features">


                <div class="feature">

                    <div class="feature-icon">

                        <i class="fa-solid fa-box"></i>

                    </div>

                    Data barang terorganisir

                </div>


                <div class="feature">

                    <div class="feature-icon">

                        <i class="fa-solid fa-arrow-right-arrow-left"></i>

                    </div>

                    Pencatatan transaksi

                </div>


                <div class="feature">

                    <div class="feature-icon">

                        <i class="fa-solid fa-chart-simple"></i>

                    </div>

                    Monitoring persediaan

                </div>


            </div>

        </div>


        <div class="copyright">

            Sistem Manajemen Persediaan Barang

        </div>


    </div>


    <!-- RIGHT SIDE -->

    <div class="login-form-area">


        <div class="form-heading">

            <h2>
                Masuk ke Sistem
            </h2>

            <p>
                Silakan masukkan akun Anda untuk melanjutkan.
            </p>

        </div>


        @if($errors->any())

            <div class="alert-error">

                <i class="fa-solid fa-circle-exclamation"></i>

                {{ $errors->first() }}

            </div>

        @endif


        <form
            action="{{ route('login.process') }}"
            method="POST"
        >

            @csrf


            <!-- EMAIL -->

            <div class="form-group">

                <label class="form-label">
                    Email
                </label>


                <div class="input-wrapper">

                    <i class="fa-regular fa-envelope input-icon"></i>


                    <input
                        type="email"
                        name="email"
                        class="form-input"
                        value="{{ old('email') }}"
                        placeholder="Masukkan email"
                        autocomplete="email"
                        required
                    >

                </div>

            </div>


            <!-- PASSWORD -->

            <div class="form-group">

                <label class="form-label">
                    Password
                </label>


                <div class="input-wrapper">

                    <i class="fa-solid fa-lock input-icon"></i>


                    <input
                        type="password"
                        name="password"
                        class="form-input"
                        placeholder="Masukkan password"
                        autocomplete="current-password"
                        required
                    >

                </div>

            </div>


            <button
                type="submit"
                class="btn-login"
            >

                <i class="fa-solid fa-arrow-right-to-bracket"></i>

                Masuk

            </button>


        </form>


        <div class="register-link">

            Belum memiliki akun?

            <a href="{{ route('register') }}">
                Daftar sekarang
            </a>

        </div>


    </div>


</div>


</body>

</html>