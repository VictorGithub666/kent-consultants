{{-- resources/views/admin/auth/login.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login - Kent Consultants Ltd</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Fraunces:ital,wght@0,400;0,600;0,700;1,500&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 -->
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
        
        .login-wrapper {
            width: 100%;
            max-width: 440px;
        }
        
        .login-card {
            background: white;
            border-radius: 16px;
            padding: 48px 40px 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
            position: relative;
            overflow: hidden;
        }
        
        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--gold-gradient);
        }
        
        .login-logo {
            text-align: center;
            margin-bottom: 32px;
        }
        
        .login-logo img {
            max-height: 60px;
            width: auto;
        }
        
        .login-logo h1 {
            font-family: 'Fraunces', serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--charcoal);
            margin-top: 12px;
            margin-bottom: 4px;
        }
        
        .login-logo p {
            color: #6c6a68;
            font-size: 0.9rem;
            margin: 0;
        }
        
        .login-card .form-label {
            font-weight: 500;
            font-size: 0.85rem;
            color: var(--charcoal);
        }
        
        .login-card .form-control {
            border-radius: 10px;
            padding: 12px 16px;
            border: 1.5px solid #e2e0dc;
            font-size: 0.95rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        
        .login-card .form-control:focus {
            border-color: var(--gold-1);
            box-shadow: 0 0 0 3px rgba(166, 124, 0, 0.15);
        }
        
        .login-card .input-group-text {
            background: transparent;
            border: 1.5px solid #e2e0dc;
            border-right: none;
            border-radius: 10px 0 0 10px;
            color: #6c6a68;
        }
        
        .login-card .input-group .form-control {
            border-left: none;
            border-radius: 0 10px 10px 0;
        }
        
        .login-card .input-group .form-control:focus {
            border-left: none;
        }
        
        .login-card .btn-login {
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
        
        .login-card .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(166, 124, 0, 0.3);
        }
        
        .login-card .btn-login:active {
            transform: translateY(0);
        }
        
        .login-card .form-check-label {
            font-size: 0.85rem;
            color: #6c6a68;
        }
        
        .login-card .forgot-link {
            font-size: 0.85rem;
            color: var(--gold-1);
            text-decoration: none;
            transition: color 0.2s;
        }
        
        .login-card .forgot-link:hover {
            color: var(--gold-3);
            text-decoration: underline;
        }
        
        .login-footer {
            text-align: center;
            margin-top: 24px;
            font-size: 0.8rem;
            color: rgba(255, 255, 255, 0.5);
        }
        
        .login-footer a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
        }
        
        .login-footer a:hover {
            color: var(--gold-2);
        }
        
        /* Animated background */
        .bg-animation {
            position: fixed;
            inset: 0;
            z-index: -1;
            overflow: hidden;
        }
        
        .bg-animation .shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 215, 0, 0.03);
            animation: float 20s infinite alternate;
        }
        
        .bg-animation .shape:nth-child(1) {
            width: 600px;
            height: 600px;
            top: -200px;
            right: -200px;
            animation-delay: 0s;
        }
        
        .bg-animation .shape:nth-child(2) {
            width: 400px;
            height: 400px;
            bottom: -100px;
            left: -100px;
            animation-delay: -5s;
        }
        
        .bg-animation .shape:nth-child(3) {
            width: 300px;
            height: 300px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation-delay: -10s;
        }
        
        @keyframes float {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(30px, 30px) scale(1.1); }
        }
        
        .alert-danger {
            border-radius: 10px;
            border: none;
            padding: 12px 16px;
            font-size: 0.9rem;
        }
        
        @media (max-width: 576px) {
            .login-card {
                padding: 32px 20px 28px;
            }
            
            .login-logo img {
                max-height: 48px;
            }
        }
    </style>
</head>
<body>
    <div class="bg-animation">
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Kent Consultants Ltd">
                <h1>Kent Consultants</h1>
                <p>Administration Panel</p>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            @if(session('status'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email') }}" 
                               placeholder="admin@kentconsultantsltd.co.ke" required autofocus>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               id="password" name="password" placeholder="••••••••" required>
                        <button type="button" class="input-group-text bg-transparent border-start-0" id="togglePassword"
                                title="Show/hide password" style="cursor:pointer;">
                            <i class="bi bi-eye" id="togglePasswordIcon"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <a href="{{ route('admin.password.request') }}" class="forgot-link">Forgot password?</a>
                </div>

                <button type="submit" class="btn-login">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Sign In
                </button>
            </form>
        </div>

        <div class="login-footer">
            &copy; {{ date('Y') }} Kent Consultants Ltd. All rights reserved.
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const field = document.getElementById('password');
            const icon  = document.getElementById('togglePasswordIcon');
            if (field.type === 'password') {
                field.type = 'text';
                icon.className = 'bi bi-eye-slash';
            } else {
                field.type = 'password';
                icon.className = 'bi bi-eye';
            }
        });
    </script>
</body>
</html>