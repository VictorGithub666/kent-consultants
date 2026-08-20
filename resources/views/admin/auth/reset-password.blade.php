{{-- resources/views/admin/auth/reset-password.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Reset Password - Kent Consultants Ltd</title>

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

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6c6a68;
            cursor: pointer;
            padding: 0;
            z-index: 10;
        }

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

        .password-strength { margin-top: 6px; }
        .strength-bar {
            height: 4px;
            border-radius: 2px;
            background: #e5e7eb;
            overflow: hidden;
        }
        .strength-fill {
            height: 100%;
            border-radius: 2px;
            transition: width 0.3s, background 0.3s;
            width: 0%;
        }

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
                <p>Set your new password</p>
            </div>

            @if($errors->any())
                <div class="alert alert-danger" style="border-radius:10px; border:none; padding:12px 16px; font-size:0.9rem;">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.password.update') }}">
                @csrf

                {{-- Hidden fields --}}
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               id="email" name="email" value="{{ old('email', $email) }}"
                               placeholder="Your email address" required autofocus>
                    </div>
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <div class="input-group position-relative">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               id="password" name="password"
                               placeholder="Minimum 8 characters" required
                               oninput="updateStrength(this.value)">
                        <button type="button" class="password-toggle" onclick="toggleVisibility('password', this)">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <div class="password-strength mt-1">
                        <div class="strength-bar">
                            <div class="strength-fill" id="strengthFill"></div>
                        </div>
                        <small class="text-muted" id="strengthLabel"></small>
                    </div>
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                    <div class="input-group position-relative">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control"
                               id="password_confirmation" name="password_confirmation"
                               placeholder="Repeat new password" required>
                        <button type="button" class="password-toggle" onclick="toggleVisibility('password_confirmation', this)">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="btn-auth mb-3">
                    <i class="bi bi-check-circle me-2"></i> Reset Password
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
    <script>
        function toggleVisibility(fieldId, btn) {
            const field = document.getElementById(fieldId);
            const icon  = btn.querySelector('i');
            if (field.type === 'password') {
                field.type = 'text';
                icon.className = 'bi bi-eye-slash';
            } else {
                field.type = 'password';
                icon.className = 'bi bi-eye';
            }
        }

        function updateStrength(value) {
            const fill  = document.getElementById('strengthFill');
            const label = document.getElementById('strengthLabel');
            let score = 0;
            if (value.length >= 8)                        score++;
            if (/[A-Z]/.test(value))                      score++;
            if (/[0-9]/.test(value))                      score++;
            if (/[^A-Za-z0-9]/.test(value))               score++;

            const levels = [
                { pct: '0%',   color: '#e5e7eb', text: '' },
                { pct: '25%',  color: '#dc3545', text: 'Weak' },
                { pct: '50%',  color: '#fd7e14', text: 'Fair' },
                { pct: '75%',  color: '#ffc107', text: 'Good' },
                { pct: '100%', color: '#28a745', text: 'Strong' },
            ];

            const level = value.length === 0 ? levels[0] : levels[score];
            fill.style.width      = level.pct;
            fill.style.background = level.color;
            label.textContent     = level.text;
        }
    </script>
</body>
</html>
