<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/icon-logo.png" type="image/x-icon">
    <title>Login</title>
</head>

<style>
    :root {
        --background: #1a1a2e;
        --color: #ffffff;
        --primary-color: #0f3460;
        --font-bebas-neue: 'Bebas Neue', sans-serif;
    }

    * {
        box-sizing: border-box;
    }

    html {
        scroll-behavior: smooth;
    }

    body {
        margin: 0;
        box-sizing: border-box;
        font-family: "poppins";
        background: var(--background);
        color: var(--color);
        letter-spacing: 1px;
        transition: background 0.2s ease;
        -webkit-transition: background 0.2s ease;
        -moz-transition: background 0.2s ease;
        -ms-transition: background 0.2s ease;
        -o-transition: background 0.2s ease;
    }

    a {
        text-decoration: none;
        color: var(--color);
    }

    h1 {
        font-size: 2.5rem;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-container {
        position: relative;
        width: 22.2rem;
    }

    .form-container {
        border: 1px solid hsla(0, 0%, 65%, 0.158);
        box-shadow: 0 0 36px 1px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        backdrop-filter: blur(20px);
        z-index: 99;
        padding: 2rem;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
    }

    .login-container form input {
        display: block;
        padding: 14.5px;
        width: 100%;
        margin: 2rem 0;
        color: var(--color);
        outline: none;
        background-color: #9191911f;
        border: none;
        border-radius: 5px;
        font-weight: 500;
        letter-spacing: 0.8px;
        font-size: 15px;
        backdrop-filter: blur(15px);
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        -o-border-radius: 5px;
    }

    .login-container form input:focus {
        box-shadow: 0 0 16px 1px rgba(0, 0, 0, 0.2);
        animation: wobble 0.3s ease-in;
        -webkit-animation: wobble 0.3s ease-in;
    }

    .login-container form button {
        background-color: var(--primary-color);
        color: var(--color);
        display: block;
        padding: 13px;
        border-radius: 5px;
        outline: none;
        font-size: 18px;
        letter-spacing: 1.5px;
        font-weight: bold;
        width: 100%;
        cursor: pointer;
        margin-bottom: 2rem;
        transition: all 0.1s ease-in-out;
        border: none;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        -o-border-radius: 5px;
        -webkit-transition: all 0.1s ease-in-out;
        -moz-transition: all 0.1s ease-in-out;
        -ms-transition: all 0.1s ease-in-out;
        -o-transition: all 0.1s ease-in-out;
    }

    .login-container form button:hover {
        box-shadow: 0 0 10px 1px rgba(0, 0, 0, 0.15);
        transform: scale(1.02);
        -webkit-transform: scale(1.02);
        -moz-transform: scale(1.02);
        -ms-transform: scale(1.02);
        -o-transform: scale(1.02);
    }

    .circle {
        width: 8rem;
        height: 8rem;
        background: var(--primary-color);
        border-radius: 50%;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        -o-border-radius: 50%;
        position: absolute;
    }

    .illustration {
        position: absolute;
        top: -14%;
        right: -2px;
        width: 90%;
    }

    .circle-one {
        top: 0;
        left: 0;
        z-index: -1;
        transform: translate(-45%, -45%);
        -webkit-transform: translate(-45%, -45%);
        -moz-transform: translate(-45%, -45%);
        -ms-transform: translate(-45%, -45%);
        -o-transform: translate(-45%, -45%);
    }

    .circle-two {
        bottom: 0;
        right: 0;
        z-index: -1;
        transform: translate(45%, 45%);
        -webkit-transform: translate(45%, 45%);
        -moz-transform: translate(45%, 45%);
        -ms-transform: translate(45%, 45%);
        -o-transform: translate(45%, 45%);
    }

    .register-forget {
        margin: 1rem 0;
        display: flex;
        justify-content: space-between;
    }

    .opacity {
        opacity: 0.6;
    }

    .theme-btn-container {
        position: absolute;
        left: 0;
        bottom: 2rem;
    }

    .theme-btn {
        cursor: pointer;
        transition: all 0.3s ease-in;
    }

    .theme-btn:hover {
        width: 40px !important;
    }

    .logo-container {
        display: flex;
        align-items: center;
        font-family: var(--font-bebas-neue);

    }

    .logo-container img {
        margin-right: 2px;
        height: 60px; /* Adjust the height as needed */
    }

    .alert-danger {
    position: absolute;
    top: 5%;
    left: 50%;
    transform: translateX(-50%);
    width: 100%;
    max-width: 22.2rem;
    padding: 1rem;
    background-color: rgba(255, 0, 0, 0.8); /* Ganti nilai keempat (0.8) sesuai keinginan */
    color: var(--color);
    border: 1px solid hsla(0, 0%, 65%, 0.158);
    border-radius: 10px;
    backdrop-filter: blur(20px);
    z-index: 99;
}


</style>

<body>
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <!-- Logo dan judul DataPintar -->
                    <div class="logo-container">
                        <img src="assets/img/icon-logo.png" alt="Logo" class="h-6 w-6">
                        <h2 class="text-lg font-bold">DataPintar</h2>
                    </div>
                </div>
            </div>
        </div>
        @if (Session::get('failed') || Session::get('gagal'))
        <div class="alert-danger block items-center p-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800"
            role="alert">
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Login gagal!</span>
                {{ Session::get('failed') ? Session::get('failed') : Session::get('gagal') }}
            </div>
        </div>
        @endif
    </nav>

    <section class="container mt-20">
        <div class="login-container flex items-center justify-center">
            <div class="circle circle-one"></div>
            <div class="form-container bg-white p-6 rounded">
                <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png"
                    alt="illustration" class="illustration" />
                <h1 class="font-bold text-2xl text-center mb-4">LOGIN</h1>
                <form action="{{ route('login.auth') }}" method="post">
                    @csrf
                    <div class="relative z-0 w-full mb-5 group mt-5">
                        <input type="email" name="email" id="email" placeholder="Masukan Email" value="{{ old('email') }}"
                            required />
                    </div>
                    <div class="relative z-0 w-full mb-5 group mt-5">
                        <input type="password" name="password" id="password" placeholder="Password"
                            value="{{ old('password') }}" required />
                    </div>
                    <div class="text-center">
                        <button type="submit"
                            class="w-full bg-[#222] px-7 pb-2.5 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                            data-te-ripple-init data-te-ripple-color="light">
                            SUBMIT
                        </button>
                    </div>
                    <p  class="text-center text-gray-500 mt-3">Sebelum masuk ke DataPintar, silahkan login terlebih dahulu.</p>
                </form>
            </div>
            <div class="circle circle-two"></div>
        </div>
    </section>

    <div class="theme-btn-container"></div>

    @vite('resources/js/app.js')
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
       
        var alertDanger = document.querySelector('.alert-danger');
        
        
        if (alertDanger) {
            setTimeout(function() {
                alertDanger.style.display = 'none'; 
            }, 3000); 
        }
    });
</script>

</html>
