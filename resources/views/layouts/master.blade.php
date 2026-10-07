<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Pengelolaan Barang')
    </title>


    <!-- FONT INTER -->

    <link rel="preconnect"
          href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet">


    <!-- FONT AWESOME -->

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }


        body {

            font-family: 'Inter', sans-serif;

            background: #f5f7f6;

            color: #1f2937;

            font-size: 14px;

        }


        /* =====================================
           SIDEBAR
        ===================================== */

        .sidebar {

            position: fixed;

            left: 0;
            top: 0;
            bottom: 0;

            width: 245px;

            background: #123b2a;

            padding: 24px 12px;

            z-index: 1000;

            overflow-y: auto;

        }


        /* =====================================
           BRAND
        ===================================== */

        .brand {

            padding: 3px 14px 24px;

            border-bottom:
                1px solid
                rgba(255,255,255,.10);

            margin-bottom: 24px;

        }


        .brand-main {

            display: flex;

            align-items: center;

            gap: 11px;

        }


        .brand-icon {

            width: 34px;

            height: 34px;

            background: #2f7d55;

            color: #ffffff;

            border-radius: 7px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 15px;

            flex-shrink: 0;

        }


        .brand-title {

            color: #ffffff;

            font-size: 16px;

            font-weight: 700;

            line-height: 1.3;

            letter-spacing: -.2px;

        }


        .brand-subtitle {

            color: #91b5a4;

            font-size: 10px;

            margin-top: 8px;

            padding-left: 45px;

            white-space: nowrap;

        }


        /* =====================================
           MENU TITLE
        ===================================== */

        .menu-title {

            color: #7fa494;

            font-size: 10px;

            font-weight: 600;

            text-transform: uppercase;

            padding: 0 14px;

            margin-bottom: 9px;

            letter-spacing: .9px;

        }


        /* =====================================
           MENU
        ===================================== */

        .menu {

            list-style: none;

            margin-bottom: 29px;

        }


        .menu li {

            margin-bottom: 3px;

        }


        .menu a {

            display: flex;

            align-items: center;

            gap: 13px;

            padding: 11px 14px;

            color: #d1ddd7;

            text-decoration: none;

            border-radius: 6px;

            font-size: 13px;

            font-weight: 500;

            transition:
                background .15s ease,
                color .15s ease;

        }


        .menu a:hover {

            background: #1b4d38;

            color: #ffffff;

        }


        .menu a.active {

            background: #2f7d55;

            color: #ffffff;

            font-weight: 600;

        }


        /* =====================================
           MENU ICON
        ===================================== */

        .menu-icon {

            width: 18px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 14px;

            color: #8eb5a3;

            flex-shrink: 0;

        }


        .menu a:hover .menu-icon {

            color: #ffffff;

        }


        .menu a.active .menu-icon {

            color: #ffffff;

        }


        /* =====================================
           LOGOUT
        ===================================== */

        .logout-button {

            width: 100%;

            background: transparent;

            border: none;

            color: #d1ddd7;

            padding: 11px 14px;

            border-radius: 6px;

            text-align: left;

            font-family: 'Inter', sans-serif;

            font-size: 13px;

            font-weight: 500;

            cursor: pointer;

            display: flex;

            align-items: center;

            gap: 13px;

            transition:
                background .15s ease,
                color .15s ease;

        }


        .logout-button:hover {

            background: #1b4d38;

            color: #ffffff;

        }


        .logout-button .menu-icon {

            color: #8eb5a3;

        }


        .logout-button:hover .menu-icon {

            color: #ffffff;

        }


        /* =====================================
           MAIN
        ===================================== */

        .main {

            margin-left: 245px;

            min-height: 100vh;

        }


        /* =====================================
           TOPBAR
        ===================================== */

        .topbar {

            height: 68px;

            background: #ffffff;

            border-bottom:
                1px solid
                #e2e8e5;

            padding: 0 30px;

            display: flex;

            justify-content: space-between;

            align-items: center;

        }


        .page-title {

            font-size: 17px;

            font-weight: 600;

            color: #17231d;

            letter-spacing: -.2px;

        }


        /* =====================================
           USER INFO
        ===================================== */

        .user-info {

            display: flex;

            align-items: center;

            gap: 10px;

        }


        .user-avatar {

            width: 35px;

            height: 35px;

            border-radius: 50%;

            background: #2f7d55;

            color: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 12px;

            font-weight: 600;

        }


        .user-name {

            font-size: 12px;

            font-weight: 600;

            color: #17231d;

        }


        .user-email {

            font-size: 10px;

            color: #7a8781;

            margin-top: 3px;

        }


        /* =====================================
           CONTENT
        ===================================== */

        .content {

            padding: 30px;

        }


        /* =====================================
           RESPONSIVE
        ===================================== */

        @media (max-width: 800px) {

            .sidebar {

                width: 210px;

            }


            .main {

                margin-left: 210px;

            }


            .content {

                padding: 20px;

            }


            .topbar {

                padding: 0 20px;

            }

        }


        @media (max-width: 600px) {

            .sidebar {

                position: relative;

                width: 100%;

                min-height: auto;

            }


            .main {

                margin-left: 0;

            }


            .topbar {

                height: auto;

                padding: 15px 20px;

            }


            .user-info {

                display: none;

            }


            .content {

                padding: 15px;

            }

        }

    </style>


    @stack('styles')

</head>


<body>


    <!-- =====================================
         SIDEBAR
    ===================================== -->

    <aside class="sidebar">


        <!-- BRAND -->

        <div class="brand">

            <div class="brand-main">

                <div class="brand-icon">

                    <i class="fa-solid fa-box"></i>

                </div>


                <div class="brand-title">

                    Pengelolaan Barang

                </div>

            </div>


            <div class="brand-subtitle">

                Sistem Manajemen Persediaan

            </div>

        </div>


        <!-- MENU UTAMA -->

        <div class="menu-title">

            Menu Utama

        </div>


        <ul class="menu">


            <!-- DASHBOARD -->

            <li>

                <a href="{{ route('dashboard') }}"
                   class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">

                    <span class="menu-icon">

                        <i class="fa-solid fa-house"></i>

                    </span>


                    Dashboard

                </a>

            </li>


            <!-- DATA BARANG -->

            <li>

                <a href="{{ route('barang.index') }}"
                   class="{{ request()->routeIs('barang.*') ? 'active' : '' }}">

                    <span class="menu-icon">

                        <i class="fa-solid fa-boxes-stacked"></i>

                    </span>


                    Data Barang

                </a>

            </li>


            <!-- BARANG MASUK -->

            <li>

                <a href="{{ route('barang-masuk.index') }}"
                   class="{{ request()->routeIs('barang-masuk.*') ? 'active' : '' }}">

                    <span class="menu-icon">

                        <i class="fa-solid fa-arrow-down"></i>

                    </span>


                    Barang Masuk

                </a>

            </li>


            <!-- BARANG KELUAR -->

            <li>

                <a href="{{ route('barang-keluar.index') }}"
                   class="{{ request()->routeIs('barang-keluar.*') ? 'active' : '' }}">

                    <span class="menu-icon">

                        <i class="fa-solid fa-arrow-up"></i>

                    </span>


                    Barang Keluar

                </a>

            </li>


        </ul>


        <!-- AKUN -->

        <div class="menu-title">

            Akun

        </div>


        <ul class="menu">


            <li>

                <form action="{{ route('logout') }}"
                      method="POST">

                    @csrf


                    <button
                        type="submit"
                        class="logout-button">


                        <span class="menu-icon">

                            <i class="fa-solid fa-right-from-bracket"></i>

                        </span>


                        Logout


                    </button>

                </form>

            </li>


        </ul>


    </aside>


    <!-- =====================================
         MAIN
    ===================================== -->

    <main class="main">


        <!-- TOPBAR -->

        <div class="topbar">


            <div class="page-title">

                @yield(
                    'page-title',
                    'Dashboard'
                )

            </div>


            <div class="user-info">


                <div class="user-avatar">

                    {{ strtoupper(
                        substr(
                            auth()->user()->name,
                            0,
                            1
                        )
                    ) }}

                </div>


                <div>

                    <div class="user-name">

                        {{ auth()->user()->name }}

                    </div>


                    <div class="user-email">

                        {{ auth()->user()->email }}

                    </div>

                </div>


            </div>


        </div>


        <!-- CONTENT -->

        <div class="content">

            @yield('content')

        </div>


    </main>


    @stack('scripts')


</body>

</html>