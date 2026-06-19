<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In | CampusHub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css" >
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/auth.css">
   
    
</head>
<body class="auth-body">

<div class="auth-layout auth-layout--login">

    <!-- ===== LEFT BRAND PANEL ===== -->
    <aside class="auth-panel">
        <div class="auth-panel-deco">
            <div class="ap-blob ap-blob--1"></div>
            <div class="ap-blob ap-blob--2"></div>
            <div class="ap-dots"></div>
        </div>

        <div class="auth-panel-content">
            <a href="index.html" class="auth-panel-logo">
                <span class="nav-logo-icon">&#x2B22;</span>
                Campus<span class="logo-accent">Hub</span>
            </a>
                <br><br>
            <div class="auth-panel-hero">
                <h2 class="auth-panel-title">
                    Welcome<br>
                    <em>back.</em>
                </h2>
                <p class="auth-panel-desc">
                    Sign in to access your student dashboard, view upcoming events,
                    manage your registrations, and stay connected with your campus.
                </p>
            </div>

            <!-- Quick stats -->
            <div class="auth-panel-stats">
                <div class="ap-stat">
                    <span class="ap-stat-num">500+</span>
                    <span class="ap-stat-lbl">Events This Year</span>
                </div>
                <div class="ap-stat-sep"></div>
                <div class="ap-stat">
                    <span class="ap-stat-num">80+</span>
                    <span class="ap-stat-lbl">Active Clubs</span>
                </div>
                <div class="ap-stat-sep"></div>
                <div class="ap-stat">
                    <span class="ap-stat-num">15K+</span>
                    <span class="ap-stat-lbl">Students</span>
                </div>
            </div>

            
        </div>
    </aside>

    <?php
    include "../connection.php";
        $email = "";
         $password = "";

        if (isset($_COOKIE["email"])) {
            $email = $_COOKIE["email"];
        }

        if (isset($_COOKIE["password"])) {
            $password = $_COOKIE["password"];
        }
    ?>

    <!-- ===== RIGHT FORM AREA ===== -->
    <main class="auth-form-area auth-form-area--centered">

        <div class="auth-topbar">
            <a href="../index.html" class="auth-back-link">
                <i class="bi bi-arrow-left"></i> Back to Home
            </a>
            <span class="auth-alt-action">
                New to CampusHub?
                <a href="studentRegister.php">Create Account</a>
            </span>
        </div>

        <!-- toast -->
        <div class="toast-msg" id="toast-msg">
            <i id="toast-icon" class="bi bi-x-circle-fill"></i>
            <span id="toast-text" class="toast-text"></span>
        </div>

        <div class="auth-form-wrapper auth-form-wrapper--login mt-3"><br/><br/>
            <div class="auth-form-head">
                <h1 class="auth-form-title">Sign In</h1>
                <p class="auth-form-subtitle">Welcome back! Enter your credentials to continue.</p>
            </div>

            <form class="auth-form" id="loginForm" novalidate>

                <!-- Email  -->
                <div class="form-group">
                    <label class="form-label" for="loginEmail">
                        Email Address<span class="form-required">*</span>
                    </label>
                    <div class="input-icon-wrap">
                        <i class="bi bi-person input-icon"></i>
                        <input
                            type="text"
                            class="form-control"
                            id="loginEmail"
                            name="loginEmail"
                            placeholder="yourname@email.com"
                            required
                            autocomplete="username"
                            value="<?php echo $email; ?>"
                        >
                    </div>
                </div>

                <!-- Password with show/hide -->
                <div class="form-group mt-3">
                    <div class="form-label-row ">
                        <label class="form-label" for="loginPassword">
                            Password <span class="form-required">*</span>
                        </label>
                        <a href="forgotpassword.php" class="form-forgot-link">Forgot password?</a>
                    </div>
                    <div class="input-pw-wrap">
                        <div class="input-icon-wrap">
                            <i class="bi bi-lock input-icon"></i>
                            <input
                                type="password"
                                class="form-control"
                                id="loginPassword"
                                name="loginPassword"
                                placeholder="Enter your password"
                                required
                                autocomplete="current-password"
                                value="<?php echo $password; ?>"
                            >
                        </div>
                        <button
                            type="button"
                            class="pw-toggle"
                            data-target="loginPassword"
                            aria-label="Show or hide password"
                        >
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Remember me -->
                <div class="form-check-group form-check-group--remember mt-3">
                    <input type="checkbox" class="form-checkbox" id="rememberMe" name="rememberMe">
                    <label class="form-check-label" for="rememberMe">
                        Keep me signed in for 30 days
                    </label>
                </div>

                <!-- Submit -->
                <button type="submit" class="btn btn-primary btn-lg auth-submit-btn" >
                    <i class="bi bi-box-arrow-in-right"></i>
                    Sign In to CampusHub
                </button>

                

                <p class="auth-switch-link">
                    Don't have an account yet?
                    <a href="studentRegister.php">Create one — it's free</a>
                </p>

            </form>

            <!-- Admin link -->
            <div class="auth-admin-link">
                <i class="bi bi-shield-lock"></i>
                <a href="adminLogin.php">Administrator Login</a>
            </div>

        </div>
        <br/><br/>
    </main>

</div><!-- /.auth-layout -->

<script>
    /* ─── Password show / hide toggle ─── */
    document.querySelectorAll('.pw-toggle').forEach(btn => {
        btn.addEventListener('click', () => {
            const target = document.getElementById(btn.dataset.target);
            const icon   = btn.querySelector('i');
            if (target.type === 'password') {
                target.type = 'text';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            } else {
                target.type = 'password';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            }
        });
    });

    /* ─── Form submit ─── */
    document.getElementById('loginForm').addEventListener('submit', function (e) {
        e.preventDefault();
        if (!this.checkValidity()) {
            this.classList.add('was-validated');
            this.querySelector(':invalid')?.focus();
            return;
        }

        studentLogin();
    });
</script>

<script src="../js/auth.js"></script>
</body>
</html>
