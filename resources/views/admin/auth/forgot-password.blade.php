{{-- resources/views/admin/auth/forgot-password.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Forgot Password - Kent Consultants Ltd</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Fraunces:ital,wght@0,400;0,600;0,700;1,500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <style>
        :root {
            --gold-1: #A67C00;
            --gold-2: #FFD700;
            --gold-3: #7F5800;
            --gold-gradient: linear-gradient(to right, #A67C00 0%, #FFD700 50%, #7F5800 100%);
            --charcoal: #1a1715;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--charcoal);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 20px;
        }

        .auth-wrapper { width: 100%; max-width: 440px; }

        .auth-card {
            background: white;
            border-radius: 16px;
            padding: 48px 40px 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
            position: relative;
            overflow: hidden;
        }

        .auth-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: var(--gold-gradient);
        }

        .auth-logo { text-align: center; margin-bottom: 32px; }
        .auth-logo img { max-height: 60px; width: auto; }
        .auth-logo h1 {
            font-family: 'Fraunces', serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--charcoal);
            margin-top: 12px;
            margin-bottom: 4px;
        }
        .auth-logo p { color: #6c6a68; font-size: 0.9rem; margin: 0; }

        .auth-card .form-label { font-weight: 500; font-size: 0.85rem; color: var(--charcoal); }

        .auth-card .form-control {
            border-radius: 10px;
            padding: 12px 16px;
            border: 1.5px solid #e2e0dc;
            font-size: 0.95rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .auth-card .form-control:focus {
            border-color: var(--gold-1);
            box-shadow: 0 0 0 3px rgba(166, 124, 0, 0.15);
        }

        .auth-card .input-group-text {
            background: transparent;
            border: 1.5px solid #e2e0dc;
            border-right: none;
            border-radius: 10px 0 0 10px;
            color: #6c6a68;
        }
        .auth-card .input-group .form-control {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }

        .btn-auth {
            background: var(--gold-gradient);
            color: var(--charcoal);
            border: none;
            padding: 14px;
            font-weight: 600;
            font-size: 1rem;
            border-radius: 10px;
            width: 100%;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .btn-auth:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(166, 124, 0, 0.3);
        }

        .back-link { font-size: 0.85rem; color: var(--gold-1); text-decoration: none; }
        .back-link:hover { color: var(--gold-3); text-decoration: underline; }

        .auth-footer {
            text-align: center;
            margin-top: 24px;
            font-size: 0.8rem;
            color: rgba(255,255,255,0.5);
        }

        .bg-animation { position: fixed; inset: 0; z-index: -1; overflow: hidden; }
        .bg-animation .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,215,0,0.03);
        }
        .bg-animation .shape:nth-child(1) { width: 600px; height: 600px; top: -200px; right: -200px; }
        .bg-animation .shape:nth-child(2) { width: 400px; height: 400px; bottom: -100px; left: -100px; }

        @media (max-width: 576px) {
            .auth-card { padding: 32px 20px 28px; }
        }
    </style>
</head>
<body>
    <div class="bg-animation">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="auth-wrapper">
        <div class="auth-card">
            <div class="auth-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Kent Consultants Ltd">
                <h1>Kent Consultants</h1>
                <p>Reset your password</p>
            </div>

            @if(session('status'))
                <div class="alert alert-success" style="border-radius:10px; border:none; padding:12px 16px; font-size:0.9rem;">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('status') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger" style="border-radius:10px; border:none; padding:12px 16px; font-size:0.9rem;">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            <p class="text-muted small mb-4">
                Enter your email address and we will send you a link to reset your password.
            </p>

            <form method="POST" action="{{ route('admin.password.email') }}">
                @csrf

                <div class="mb-4">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               id="email" name="email" value="{{ old('email') }}"
                               placeholder="admin@kentconsultantsltd.co.ke" required autofocus>
                    </div>
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn-auth mb-3">
                    <i class="bi bi-envelope me-2"></i> Send Reset Link
                </button>

                <div class="text-center">
                    <a href="{{ route('admin.login') }}" class="back-link">
                        <i class="bi bi-arrow-left me-1"></i> Back to Login
                    </a>
                </div>
            </form>
        </div>

        <div class="auth-footer">
            &copy; {{ date('Y') }} Kent Consultants Ltd. All rights reserved.
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
