<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Data Yayasan</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        header {
            background-color: #0047AB;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .hero {
            background: url('hero-image.jpg') no-repeat center center/cover;
            height: 70vh;
            color: #333;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .hero h1 {
            font-size: 2.5rem;
        }

        .hero p {
            font-size: 1.2rem;
            margin: 20px 0;
        }

        .hero .button {
            text-decoration: none;
            background-color: #0047AB;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
        }

        .features {
            display: flex;
            justify-content: space-around;
            padding: 50px 20px;
        }

        .feature {
            text-align: center;
            max-width: 250px;
        }

        .feature img {
            width: 100px;
            margin-bottom: 15px;
        }

        footer {
            background-color: #002a6e;
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">Yayasan</div>
        <nav>
            <ul>
                <li><a href="#features">Fitur</a></li>
                <li><a href="#about">Tentang</a></li>
                <li><a href="#contact">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <h1>Pengelolaan Data Yayasan</h1>
        <p>Kelola data Yayasan dengan mudah</p>
        @auth
            <a href="{{ url('/admin') }}" class="button">Dasbor</a>
        @else
            <a href="{{ url('/admin/login') }}" class="button">Login</a>
        @endauth
    </section>

    <section id="features" class="features">
        <div class="feature">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none"
                stroke="#0047AB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" stroke="#0047AB"></circle>
                <path d="M8 13l2 2l4-4" stroke="#0047AB" fill="none"></path>
                <circle cx="12" cy="12" r="3" fill="#0047AB"></circle>
            </svg>

            <h3>Mudah digunakan</h3>
            <p>Desain yang sederhana untuk semua</p>
        </div>
        <div class="feature">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none"
                stroke="#0047AB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-shield">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                <circle cx="12" cy="12" r="3" fill="#0047AB"></circle>
            </svg>

            <h3>Keamanan</h3>
            <p>Keamanan tingkat tinggi untuk data Anda.</p>
        </div>
        <div class="feature">
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="none"
                stroke="#0047AB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-file-text">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" y1="13" x2="8" y2="13"></line>
                <line x1="16" y1="17" x2="8" y2="17"></line>
                <line x1="10" y1="9" x2="8" y2="9"></line>
            </svg>

            <h3>Laporan yang komprehensif</h3>
            <p>Buat laporan hanya dengan beberapa klik saja!</p>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Foundation Manager. All rights reserved.</p>
    </footer>
</body>

</html>
