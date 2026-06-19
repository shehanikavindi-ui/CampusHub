<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | CampusHub</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- <link rel="stylesheet" href="../css/bootstrap.css"> -->
    <link rel="stylesheet" href="../css/style.css">

    <style>
        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            background: var(--bg-soft);
            padding: var(--container-px);
        }

        .login-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(90px);
            opacity: 0.32;
            z-index: 0;
            pointer-events: none;
        }

        .login-blob--a {
            width: 460px;
            height: 460px;
            background: var(--teal-300);
            top: -140px;
            left: -140px;
            animation: drift-a 22s ease-in-out infinite alternate;
        }

        .login-blob--b {
            width: 420px;
            height: 420px;
            background: var(--violet-300);
            bottom: -150px;
            right: -120px;
            animation: drift-b 26s ease-in-out infinite alternate;
        }

        @keyframes drift-a {
            from {
                transform: translate(0, 0);
            }

            to {
                transform: translate(36px, 26px);
            }
        }

        @keyframes drift-b {
            from {
                transform: translate(0, 0);
            }

            to {
                transform: translate(-30px, -34px);
            }
        }

        .back-home {
            position: absolute;
            top: 1.75rem;
            left: 1.75rem;
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            font-size: var(--text-sm);
            font-weight: 500;
            color: var(--text-muted);
            z-index: 1;
            transition: var(--transition);
        }

        .back-home:hover {
            color: var(--primary);
        }

        /* —— Card —— */
        .login-card {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 408px;
            background: var(--bg-white);
            border-radius: var(--radius-2xl);
            box-shadow: var(--shadow-xl);
            padding: clamp(2rem, 5vw, 2.75rem);
            animation: rise 0.5s var(--ease) both;
        }

        @keyframes rise {
            from {
                opacity: 0;
                transform: translateY(14px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-mark {
            width: 52px;
            height: 52px;
            margin: 0 auto 1.25rem;
            border-radius: var(--radius-lg);
            background: linear-gradient(135deg, var(--teal-500), var(--secondary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.2rem;
            box-shadow: var(--shadow-primary);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h1 {
            font-size: var(--text-2xl);
            margin-bottom: 0.4rem;
        }

        .login-header p {
            font-size: var(--text-sm);
        }

        .input-group {
            margin-bottom: 1.25rem;
        }

        .input-group label {
            display: block;
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.4rem;
        }

        .input-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrap i.icon-left {
            position: absolute;
            left: 14px;
            color: var(--text-muted);
            font-size: 0.85rem;
            pointer-events: none;
        }

        .input-wrap input {
            width: 100%;
            padding: 0.75rem 0.9rem 0.75rem 2.5rem;
            border: 1.5px solid var(--neutral-200);
            border-radius: var(--radius-md);
            font-size: var(--text-sm);
            color: var(--text-primary);
            background: var(--bg-soft);
            transition: var(--transition);
        }

        .input-wrap input::placeholder {
            color: var(--text-muted);
        }

        .input-wrap input:focus {
            outline: none;
            border-color: var(--primary);
            background: var(--bg-white);
            box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.14);
        }

        .input-wrap input.has-toggle {
            padding-right: 2.5rem;
        }

        .toggle-pass {
            position: absolute;
            right: 10px;
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            padding: 0.35rem;
            font-size: 0.85rem;
            transition: var(--transition);
        }

        .toggle-pass:hover {
            color: var(--primary);
        }

        .form-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.6rem;
            font-size: var(--text-sm);
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-secondary);
            cursor: pointer;
        }

        .remember input {
            accent-color: var(--primary);
            width: 15px;
            height: 15px;
            cursor: pointer;
        }

        .forgot-link {
            color: var(--primary);
            font-weight: 600;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        .btn-block {
            width: 100%;
            justify-content: center;
        }

        .login-footer {
            margin-top: 1.75rem;
            text-align: center;
            font-size: var(--text-xs);
            color: var(--text-muted);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
        }

        /* Visible keyboard focus for interactive elements */
        a:focus-visible,
        button:focus-visible,
        input:focus-visible {
            outline: 2px solid var(--primary);
            outline-offset: 2px;
        }

        @media (prefers-reduced-motion: reduce) {

            .login-blob,
            .login-card {
                animation: none;
            }
        }

        @media (max-width: 420px) {
            .back-home {
                top: 1.1rem;
                left: 1.1rem;
            }

            .login-blob {
                display: none;
            }
        }
    </style>

</head>

<body>

    <div class="login-page">

        <div class="login-blob login-blob--a"></div>
        <div class="login-blob login-blob--b"></div>

        <a href="studentLogin.php" class="back-home"><i class="fa-solid fa-arrow-left"></i> Back to student login</a>

        <main class="login-card">

            <!-- toast -->
            <div class="toast-msg" id="toast-msg">
                <i id="toast-icon" class="bi bi-x-circle-fill"></i>
                <span id="toast-text" class="toast-text"></span>
            </div>

            <div class="login-mark"><i class="fa-solid fa-shield-halved"></i></div>

            <div class="login-header">
                <h1>Welcome back</h1>
                <p>Sign in to access the admin dashboard.</p>
            </div>

            <form id="loginForm" novalidate>

                <div class="input-group">
                    <label for="email">Email address</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-envelope icon-left"></i>
                        <input type="email" id="email" name="email" placeholder="you@company.com" autocomplete="username">
                    </div>
                </div>

                <div class="input-group">
                    <label for="password">Password</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-lock icon-left"></i>
                        <input type="password" id="password" name="password" placeholder="••••••••" class="has-toggle" autocomplete="current-password">
                        <button type="button" class="toggle-pass" id="togglePass" aria-label="Show password">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- <div class="form-row">
                <label class="remember">
                    <input type="checkbox" id="remember" name="remember">
                    Keep me signed in
                </label>
                <a href="#" class="forgot-link">Forgot password?</a>
            </div> -->

                <button type="submit" class="btn btn-primary btn-lg btn-block" id="submitBtn">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i> Sign in
                </button>

            </form>

            <div class="login-footer">
                <i class="fa-solid fa-lock"></i> Admin access is monitored and logged.
            </div>

        </main>

    </div>

    

    <script>
        // Show / hide password
        const passInput = document.getElementById('password');
        const toggleBtn = document.getElementById('togglePass');
        toggleBtn.addEventListener('click', () => {
            const isHidden = passInput.type === 'password';
            passInput.type = isHidden ? 'text' : 'password';
            toggleBtn.innerHTML = isHidden ? '<i class="fa-solid fa-eye-slash"></i>' : '<i class="fa-solid fa-eye"></i>';
            toggleBtn.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
        });

        /* ─── Form submit ─── */
        const submitBtn = document.getElementById('submitBtn');
        const emailInput = document.getElementById('email');

        document.getElementById('loginForm').addEventListener('submit', function (e) {
            e.preventDefault();

            if (!emailInput.value.trim() || !passInput.value.trim()) {
                showToast('Enter your email and password to continue.');
                return;
            }
            adminLogin();
        });
    </script>
    <script src="../js/auth.js"></script>
</body>

</html>