<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Food & Booking Hero</title>
     <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #f3e5f5, #e0f7fa);
            color: #333;
        }

        nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(6px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .nav-title {
            font-weight: bold;
            font-size: 1.5rem;
            color: #2e7d32;
        }

        .nav-links a {
            margin-left: 1.5rem;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #388e3c;
        }

        .hero {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 6rem 2rem;
            text-align: center;
            background: linear-gradient(to right, #ffffffcc, #ffffffcc), url('/images/hero-bg.jpg') center/cover no-repeat;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #1b5e20;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 600px;
            color: #555;
        }

        .hero button {
            margin-top: 2rem;
            padding: 0.8rem 2rem;
            font-size: 1rem;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .hero button:hover {
            background-color: #388e3c;
        }

        .services {
            padding: 4rem 2rem;
            background: #fff;
            text-align: center;
        }

        .services h2 {
            color: #2e7d32;
            margin-bottom: 2rem;
        }

        .service-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 2rem;
        }

        .card {
            background: #f9fbe7;
            border-radius: 12px;
            padding: 2rem;
            width: 280px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            color: #33691e;
            margin-bottom: 1rem;
        }

        .card p {
            font-size: 0.95rem;
            color: #444;
        }

        footer {
            text-align: center;
            padding: 2rem;
            background-color: #e0f2f1;
            color: #555;
            margin-top: 4rem;
        }
    </style>
</head>

<body>

    <nav>
        <div class="nav-title">FoodBooking</div>
        <div class="nav-links">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <section class="hero">
        <h1>Welcome to Food & Fruit Paradise</h1>
        <p>Order your favorite food and fruits with ease. Fast, reliable, and healthy options at your fingertips.</p>
        @auth
            <a href="{{ route('bookings.create') }}"><button>Book Now</button></a>
        @else
            <a href="{{ route('login') }}"><button>Login to Book</button></a>
        @endauth
    </section>

    <section id="services" class="services">
        <h2>Our Services</h2>
        <div class="service-cards">
            <div class="card">
                <h3>Easy Booking</h3>
                <p>Use our booking system to select multiple items and schedule your order instantly.</p>
            </div>
            <div class="card">
                <h3>Fast Delivery</h3>
                <p>Your food delivered on time with excellent customer support.</p>
            </div>
        </div>
    </section>

    <footer>
        &copy; {{ date('Y') }} FoodBooking. All rights reserved.
    </footer>

</body>

</html>
