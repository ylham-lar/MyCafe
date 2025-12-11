<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCafe | Admin Login</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #0a0a0a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background:
                radial-gradient(circle at 20% 30%, rgba(255, 215, 90, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(255, 215, 90, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(255, 215, 90, 0.05) 0%, transparent 70%);
            animation: gradientShift 15s ease infinite;
            z-index: 0;
        }

        @keyframes gradientShift {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: 0.8;
                transform: scale(1.1);
            }
        }

        .particle {
            position: absolute;
            background: rgba(255, 215, 90, 0.3);
            border-radius: 50%;
            animation: float linear infinite;
            z-index: 1;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateY(-100px) rotate(360deg);
                opacity: 0;
            }
        }

        .container {
            position: relative;
            z-index: 10;
        }

        .login-card {
            background: linear-gradient(145deg, rgba(26, 26, 26, 0.95), rgba(15, 15, 15, 0.95));
            backdrop-filter: blur(20px);
            border-radius: 1.8rem;
            padding: 2.5rem 2.8rem;
            border: 1px solid rgba(255, 215, 90, 0.2);
            box-shadow:
                0 20px 60px rgba(0, 0, 0, 0.7),
                0 0 100px rgba(255, 215, 90, 0.1),
                inset 0 1px 0 rgba(255, 215, 90, 0.1);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.8s ease;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 215, 90, 0.1), transparent);
            animation: shimmer 3s infinite;
        }

        @keyframes shimmer {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }

        .login-card:hover {
            transform: translateY(-5px) scale(1.01);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6), 0 0 25px rgba(255, 215, 90, 0.3);
        }

        .brand {
            font-size: 2.2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #ffd95a, #ffed4e, #ffd95a);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: 1.2px;
            text-shadow: 0 0 30px rgba(255, 215, 90, 0.6);
            animation: gradientText 3s ease infinite;
        }

        @keyframes gradientText {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        .brand-sub {
            color: rgba(255, 215, 90, 0.7);
            font-size: 0.95rem;
            letter-spacing: 0.5px;
            margin-top: 3px;
        }

        .form-label {
            color: #ffd95a;
            font-weight: 600;
        }

        .form-control {
            background: rgba(255, 215, 90, 0.05) !important;
            border: 2px solid rgba(255, 215, 90, 0.3) !important;
            border-radius: 0.8rem;
            padding: 0.9rem 1rem;
            color: #ffd95a !important;
            transition: all 0.3s ease;
        }

        .form-control::placeholder {
            color: rgba(255, 215, 90, 0.4) !important;
            opacity: 1;
        }

        .form-control:focus {
            background: rgba(255, 215, 90, 0.08) !important;
            color: #ffd95a !important;
            border-color: #ffd95a !important;
            box-shadow: 0 0 25px rgba(255, 215, 90, 0.3) !important;
            transform: translateY(-2px);
        }

        .btn-gold {
            background: linear-gradient(135deg, #ffd95a, #ffed4e);
            border: none;
            padding: 0.9rem;
            font-weight: 700;
            border-radius: 0.8rem;
            color: #111;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(255, 215, 90, 0.4);
            position: relative;
            overflow: hidden;
        }

        .btn-gold::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-gold:hover::before {
            width: 400px;
            height: 400px;
        }

        .btn-gold:hover {
            background: linear-gradient(135deg, #ffed4e, #ffd95a);
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 12px 35px rgba(255, 215, 90, 0.6);
        }

        @media (max-width: 576px) {
            .login-card {
                padding: 2rem 1.8rem;
            }

            .brand {
                font-size: 1.8rem;
            }
        }
    </style>
</head>

<body>
    <script>
        for (let i = 0; i < 15; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';
            particle.style.width = Math.random() * 5 + 2 + 'px';
            particle.style.height = particle.style.width;
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDuration = Math.random() * 10 + 10 + 's';
            particle.style.animationDelay = Math.random() * 5 + 's';
            document.body.appendChild(particle);
        }
    </script>

    @include('admin.app.alert')

    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-11 col-md-7 col-lg-4">
            <div class="login-card">

                <div class="text-center mb-4">
                    <div class="brand">MyCafe</div>
                    <div class="brand-sub">Admin Login</div>
                </div>

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter username"
                            value="{{ old('username') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-gold">Log In</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

</body>

</html>