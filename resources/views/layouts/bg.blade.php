<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <style>
        /* Global Style */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(to bottom right, #fdfbfb, #fddfdf);
            background-size: contain;
            overflow: hidden;
        }

        /* Decorative Circles */
        .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 123, 123, 0.3);
            z-index: -1;
        }

        .circle1 {
            width: 150px;
            height: 150px;
            top: 10%;
            left: 5%;
        }

        .circle2 {
            width: 100px;
            height: 100px;
            bottom: 10%;
            right: 10%;
        }

        /* Content Wrapper */
        .content-wrapper {
            width: 100%;
            max-width: 600px;
            padding: 20px;
        }

        /* Card Customization */
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px 40px;
            /* Lebih banyak padding */
            width: 100%;
            max-width: 450px;
            /* Lebar card */
            margin: 20px;
        }

        .card-header {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Input Fields */
        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #ff7b7b;
            box-shadow: 0 0 5px rgba(255, 123, 123, 0.5);
            outline: none;
        }

        /* Remember Me */
        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .form-check-label {
            margin-left: 5px;
            font-size: 14px;
            color: #555;
        }

        /* Buttons */
        .btn-primary {
            background-color: #ff7b7b;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #e76868;
        }

        .btn-link {
            color: #ff7b7b;
            text-decoration: none;
            margin-left: 15px;
            /* Jarak antara tombol dan teks */
        }

        .btn-link:hover {
            color: #e76868;
        }

        /* Flex Layout for Buttons */
        .button-container {
            display: flex;
            align-items: center;
        }

        /* Responsive */
        @media (max-width: 576px) {
            .card {
                padding: 20px;
            }
        }

        /* Tombol Register di Atas Kanan */
        .top-right {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 10;
        }

        .btn-register {
            background-color: #ff7b7b;
            /* Warna peach */
            color: #fff;
            /* Teks putih */
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-register:hover {
            background-color: #e76868;
            box-shadow: 0 4px 8px rgba(231, 104, 104, 0.4);
        }
    </style>
</head>

<body>
    <!-- Decorative Circles -->
    <div class="circle circle1"></div>
    <div class="circle circle2"></div>

    <!-- Tombol Register Hanya di Halaman Login -->
    @if (Route::currentRouteName() == 'login')
        <div class="top-right">
            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn-register">Register</a>
            @endif
        </div>
    @endif

    <!-- Content -->
    <div class="content-wrapper">
        @yield('content')
    </div>
</body>

</html>