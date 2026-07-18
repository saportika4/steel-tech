<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Steel Tech</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        :root {
            --brand-color: #131310;
            --brand-dark: #131310;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #ffffff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: slideUp 0.5s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            /* background: linear-gradient(135deg, var(--brand-color) 0%, var(--brand-dark) 100%); */
            background: #131310;
            padding: 40px 30px;
            text-align: center;
            color: #fff;
        }

        .login-logo {
            width: 180px;
            /* height: 120px; */
            /* background: #fff; */
            /* border-radius: 50%; */
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            /* box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2); */
            overflow: hidden;
        }

        .login-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .login-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .login-header p {
            font-size: 14px;
            opacity: 0.95;
        }

        .login-body {
            padding: 40px 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            font-size: 14px;
        }

        .form-input-group {
            position: relative;
        }

        .form-input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 18px;
        }

        .form-input {
            width: 100%;
            padding: 14px 15px 14px 45px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--brand-color);
            box-shadow: 0 0 0 4px rgba(254, 169, 53, 0.1);
        }

        .form-input.is-invalid {
            border-color: #dc3545;
            animation: shake 0.5s;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }

        .invalid-feedback.show {
            display: block;
        }

        .form-checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 25px;
        }

        .form-checkbox {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: var(--brand-color);
        }

        .form-checkbox-label {
            font-size: 14px;
            color: #666;
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            padding: 15px;
            background: #131310;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(254, 169, 53, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-login:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(254, 169, 53, 0.4);
        }

        .btn-login:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .spinner {
            width: 18px;
            height: 18px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-top-color: #fff;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
            display: none;
        }

        .btn-login.loading .spinner {
            display: block;
        }

        .btn-login.loading .btn-text {
            display: none;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        .login-footer {
            text-align: center;
            padding: 20px 30px;
            background: #f8f9fa;
            border-top: 1px solid #e0e0e0;
        }

        .login-footer p {
            font-size: 13px;
            color: #666;
        }

        .login-footer a {
            color: var(--brand-color);
            text-decoration: none;
            font-weight: 600;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .login-container {
                border-radius: 15px;
            }

            .login-header {
                padding: 30px 20px;
            }

            .login-body {
                padding: 30px 20px;
            }

            .login-header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="login-logo">
                <img src="{{ asset('assets/images/logo/logo.webp') }}" alt="Steel Tech">
            </div>
            <h1>Admin Login</h1>
            {{-- <p>Management Panel</p> --}}
        </div>

        <div class="login-body">
            <form id="loginForm">
                @csrf

                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <div class="form-input-group">
                        <svg class="form-input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="form-input"
                            placeholder="Enter your email"
                            autofocus
                        >
                    </div>
                    <span class="invalid-feedback" id="email-error"></span>
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="form-input-group">
                        <svg class="form-input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="form-input"
                            placeholder="Enter your password"
                        >
                    </div>
                    <span class="invalid-feedback" id="password-error"></span>
                </div>

                {{-- <div class="form-checkbox-group">
                    <input type="checkbox" id="remember" name="remember" class="form-checkbox">
                    <label for="remember" class="form-checkbox-label">Remember me</label>
                </div> --}}

                <button type="submit" class="btn-login" id="loginBtn">
                    <div class="spinner"></div>
                    <span class="btn-text">Login to Dashboard</span>
                </button>
            </form>
        </div>

        <div class="login-footer">
            <p>© {{ date('Y') }} Steel Tech. All rights reserved.</p>
            <p><a href="{{ route('home') }}">← Back to Website</a></p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // Clear errors on input
            $('.form-input').on('input', function() {
                $(this).removeClass('is-invalid');
                $(`#${$(this).attr('id')}-error`).removeClass('show').text('');
            });

            // Handle form submission
            $('#loginForm').on('submit', function(e) {
                e.preventDefault();

                // Clear previous errors
                $('.form-input').removeClass('is-invalid');
                $('.invalid-feedback').removeClass('show').text('');

                const btn = $('#loginBtn');
                const email = $('#email').val().trim();
                const password = $('#password').val();

                // Client-side validation
                let hasError = false;

                if (!email) {
                    $('#email').addClass('is-invalid');
                    $('#email-error').addClass('show').text('Email is required');
                    hasError = true;
                } else if (!isValidEmail(email)) {
                    $('#email').addClass('is-invalid');
                    $('#email-error').addClass('show').text('Please enter a valid email address');
                    hasError = true;
                }

                if (!password) {
                    $('#password').addClass('is-invalid');
                    $('#password-error').addClass('show').text('Password is required');
                    hasError = true;
                } else if (password.length < 6) {
                    $('#password').addClass('is-invalid');
                    $('#password-error').addClass('show').text('Password must be at least 6 characters');
                    hasError = true;
                }

                if (hasError) {
                    return;
                }

                // Disable button and show loading
                btn.prop('disabled', true).addClass('loading');

                // Ajax request
                $.ajax({
                    url: '{{ route("admin.login.submit") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        email: email,
                        password: password,
                        remember: $('#remember').is(':checked') ? 1 : 0
                    },
                    success: function(response) {
                        if (response.success) {
                            window.location.href = response.redirect || '{{ route("admin.dashboard") }}';
                        }
                    },
                    error: function(xhr) {
                        btn.prop('disabled', false).removeClass('loading');

                        if (xhr.status === 422) {
                            const errors = xhr.responseJSON.errors;

                            if (errors.email) {
                                $('#email').addClass('is-invalid');
                                $('#email-error').addClass('show').text(errors.email[0]);
                            }

                            if (errors.password) {
                                $('#password').addClass('is-invalid');
                                $('#password-error').addClass('show').text(errors.password[0]);
                            }
                        } else if (xhr.status === 401) {
                            const message = xhr.responseJSON.message || 'Invalid credentials. Please try again.';

                            $('#email').addClass('is-invalid');
                            $('#email-error').addClass('show').text(message);

                            $('#password').addClass('is-invalid');
                            $('#password-error').addClass('show').text(message);
                        } else {
                            // generic error
                            $('#password').addClass('is-invalid');
                            $('#password-error')
                                .addClass('show')
                                .text('An unexpected error occurred. Please try again.');
                        }
                    }

                });
            });

            // Email validation helper
            function isValidEmail(email) {
                const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return regex.test(email);
            }

        });
    </script>
</body>
</html>
