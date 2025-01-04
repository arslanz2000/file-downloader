<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FilePro Admin') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        body {
            margin: 0;
            overflow: hidden;
            font-family: 'Figtree', sans-serif;
            background-color: #000; /* Set background to black for a starry night effect */
        }

        canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .login-container {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-heading {
            font-size: 2rem;
            font-weight: 600;
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }

        .login-form {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<!-- Animated Stars Background -->
<canvas id="stars"></canvas>

<!-- Login Container -->
<div class="login-container">
    <!-- Login Heading -->
    <h1 class="login-heading">FilePro Admin Dashboard</h1>

    <!-- Login Form -->
    <div class="login-form">
        {{ $slot }}
    </div>
</div>

<!-- Moving Stars Animation Script -->
<script>
    const canvas = document.getElementById('stars');
    const ctx = canvas.getContext('2d');

    let stars = [];
    const numStars = 200;
    const speed = 0.2;

    // Resize canvas
    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }

    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();

    // Create stars
    function createStars() {
        stars = [];
        for (let i = 0; i < numStars; i++) {
            stars.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                radius: Math.random() * 1.5,
                velocity: Math.random() * speed + 0.1,
            });
        }
    }

    createStars();

    // Update stars
    function updateStars() {
        for (let star of stars) {
            star.y += star.velocity;
            if (star.y > canvas.height) {
                star.y = 0;
                star.x = Math.random() * canvas.width;
            }
        }
    }

    // Draw stars
    function drawStars() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.fillStyle = '#ffffff';

        for (let star of stars) {
            ctx.beginPath();
            ctx.arc(star.x, star.y, star.radius, 0, Math.PI * 2);
            ctx.fill();
        }
    }

    // Animate stars
    function animateStars() {
        updateStars();
        drawStars();
        requestAnimationFrame(animateStars);
    }

    animateStars();
</script>

</body>
</html>
