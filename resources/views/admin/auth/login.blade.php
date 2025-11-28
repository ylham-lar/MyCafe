<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyCafe | Admin Login</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <style>
        body {
            background: url('/images/bg_dark_marble.jpg') center/cover no-repeat fixed,
                linear-gradient(135deg, #1a1a1a, #000);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }

        .login-card {
            background: rgba(0, 0, 0, 0.65);
            backdrop-filter: blur(8px);
            border-radius: 1.8rem;
            padding: 2.5rem 2.8rem;
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.5);
            animation: fadeInUp 0.8s ease;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px) scale(1.01);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6), 0 0 25px rgba(255, 204, 102, 0.3);
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

        .brand {
            font-size: 2.2rem;
            font-weight: 800;
            color: #ffcc66;
            letter-spacing: 1.2px;
            text-shadow: 0 0 12px rgba(255, 204, 102, 0.8);
        }

        .brand-sub {
            color: #cccccc;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
            margin-top: 3px;
        }

        .form-label {
            color: #e5e5e5;
            font-weight: 600;
        }

        .form-control {
            background: #1e1e1e !important;
            border: none;
            border-radius: 0.8rem;
            padding: 0.9rem 1rem;
            color: #fff !important;
        }

        .form-control::placeholder {
            color: #bbbbbb !important;
            opacity: 1;
        }

        .form-control:focus {
            background: #262626 !important;
            color: #fff !important;
            box-shadow: 0 0 0 2px #ffcc66;
        }

        .btn-gold {
            background: linear-gradient(135deg, #ffcc66, #ffaa33);
            border: none;
            padding: 0.9rem;
            font-weight: 700;
            border-radius: 0.8rem;
            color: #000;
            transition: all 0.3s ease;
            box-shadow: 0 0 8px rgba(255, 204, 102, 0.6);
        }

        .btn-gold:hover {
            background: linear-gradient(135deg, #ffd98c, #ffb955);
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 0 18px rgba(255, 204, 102, 0.8);
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