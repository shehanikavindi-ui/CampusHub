<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | CampusHub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css" >
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/auth.css">

</head>
<body class="fp-body">

    <!-- back link -->
    <a href="auth/studentLogin.html" class="fp-back">
        <i class="bi bi-arrow-left"></i> Back to login
    </a>


    <!-- toast -->
    <div class="toast-msg" id="toast-msg">
        <i id="toast-icon" class="bi bi-x-circle-fill"></i>
        <span id="toast-text" class="toast-text"></span>
    </div>

    <div class="fp-card">
        <div class="fp-card::before"></div>
        <div class="fp-card-inner">

            <!-- ── Steps indicator ── -->
            <div class="fp-steps" id="stepsBar">
                <div class="fp-step active" id="step-dot-1">
                    <div class="fp-step-dot">1</div>
                    <span class="fp-step-label">Email</span>
                </div>
                <div class="fp-step-line" id="line-1-2"></div>
                <div class="fp-step pending" id="step-dot-2">
                    <div class="fp-step-dot">2</div>
                    <span class="fp-step-label">Verify</span>
                </div>
                <div class="fp-step-line" id="line-2-3"></div>
                <div class="fp-step pending" id="step-dot-3">
                    <div class="fp-step-dot">3</div>
                    <span class="fp-step-label">Reset</span>
                </div>
            </div>

            <!-- ══ PANEL 1 — Enter email ══ -->
            <div class="fp-panel active" id="panel-1">
                <div class="fp-icon-badge">
                    <i class="bi bi-envelope-at"></i>
                </div>
                <h1 class="fp-title">Forgot your password?</h1>
                <p class="fp-subtitle">
                    No worries. Enter the email address linked to your CampusHub account
                    and we'll send you a verification code.
                </p>

                <div class="fp-form-group">
                    <label class="fp-label" for="emailInput">Email address</label>
                    <div class="fp-input-wrap">
                        <input class="fp-input" type="email" id="emailInput"
                            placeholder="yourname@email.com" autocomplete="email">
                        <i class="bi bi-envelope fp-input-icon"></i>
                    </div>
                </div>

                <button class="fp-btn" onclick="sendOtp();">
                    <i class="bi bi-send"></i>
                    Send verification code
                </button>

                <div class="fp-divider"></div>
                <div class="fp-bottom">
                    Remembered it?
                    <a href="auth/studentLogin.html">Sign in instead</a>
                </div>
            </div>

            <!-- ══ PANEL 2 — OTP verify ══ -->
            <div class="fp-panel" id="panel-2">
                <div class="fp-icon-badge">
                    <i class="bi bi-shield-lock"></i>
                </div>
                <h1 class="fp-title">Check your inbox</h1>
                <p class="fp-subtitle">
                    We sent a 6-digit code to <strong id="emailDisplay"></strong>.
                    Enter it below.
                </p>

                <div class="fp-form-group">
                    <div class="otp-group" id="otpGroup">
                        <input class="otp-input" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
                        <input class="otp-input" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
                        <input class="otp-input" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
                        <input class="otp-input" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
                        <input class="otp-input" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
                        <input class="otp-input" type="text" maxlength="1" inputmode="numeric" pattern="[0-9]">
                    </div>
                    <p class="fp-resend">
                        Didn't receive it?
                        <a onclick="resendOtp();">Resend code</a>
                        <span id="resendTimer"></span>
                    </p>
                </div>

                <button class="fp-btn" onclick="verifyOtp();">
                    <i class="bi bi-patch-check"></i>
                    Verify code
                </button>

                <div class="fp-divider"></div>
                <div class="fp-bottom">
                    <a onclick="goToStep(1)" style="cursor:pointer;">
                        <i class="bi bi-arrow-left"></i> Use a different email
                    </a>
                </div>
            </div>

            <!-- ══ PANEL 3 — New password ══ -->
            <div class="fp-panel" id="panel-3">
                <div class="fp-icon-badge">
                    <i class="bi bi-key"></i>
                </div>
                <h1 class="fp-title">Set a new password</h1>
                <p class="fp-subtitle">
                    Choose something strong. Your new password must be at least 8 characters
                    and include an uppercase letter, a number, and a special character.
                </p>

                <div class="fp-form-group">
                    <label class="fp-label" for="newPassword">New password</label>
                    <div class="fp-input-wrap fp-pw-wrap">
                        <input class="fp-input" type="password" id="newPassword"
                            placeholder="Create a strong password" autocomplete="new-password">
                        <i class="bi bi-envelope fp-input-icon" style="display:none;"></i>
                        <button class="fp-pw-toggle" onclick="togglePw('newPassword', this)" type="button">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="fp-form-group">
                    <label class="fp-label" for="confirmPassword">Confirm new password</label>
                    <div class="fp-input-wrap fp-pw-wrap">
                        <input class="fp-input" type="password" id="confirmPassword"
                            placeholder="Re-enter your password" autocomplete="new-password">
                        <i class="bi bi-envelope fp-input-icon" style="display:none;"></i>
                        <button class="fp-pw-toggle" onclick="togglePw('confirmPassword', this)" type="button">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <p class="fp-hint" id="pwMatchHint"></p>
                </div>

                <button class="fp-btn" onclick="resetPassword();">
                    <i class="bi bi-lock-fill"></i>
                    Reset password
                </button>
            </div>

            <!-- ══ PANEL 4 — Success ══ -->
            <div class="fp-panel" id="panel-4">
                <div class="fp-success">
                    <div class="fp-success-icon">
                        <i class="bi bi-check-lg"></i>
                    </div>
                    <h2>Password updated!</h2>
                    <p>Your password has been reset successfully. You can now sign in with your new password.</p>
                    <a href="auth/studentLogin.php" class="fp-btn" style="text-decoration:none;">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Go to sign in
                    </a>
                </div>
            </div>

        </div>
    </div>

    <script src="../js/auth.js"></script>
<script>
   
    let currentStep = 1;
    let userEmail   = '';
    let resendCountdown = null;

    function goToStep(n) {
        document.querySelectorAll('.fp-panel').forEach(p => p.classList.remove('active'));
        document.getElementById('panel-' + n).classList.add('active');

        // update dots
        [1,2,3].forEach(i => {
            const dot = document.getElementById('step-dot-' + i);
            dot.classList.remove('active', 'done', 'pending');
            if (i < n)       dot.classList.add('done');
            else if (i === n) dot.classList.add('active');
            else              dot.classList.add('pending');
        });

        // update lines
        document.getElementById('line-1-2').classList.toggle('done', n > 1);
        document.getElementById('line-2-3').classList.toggle('done', n > 2);

        // hide steps bar on success
        document.getElementById('stepsBar').style.display = n === 4 ? 'none' : 'flex';

        currentStep = n;
    }


    function startResendTimer(seconds) {
        const el = document.getElementById('resendTimer');
        let t = seconds;
        el.textContent = '(' + t + 's)';
        resendCountdown = setInterval(() => {
            t--;
            el.textContent = t > 0 ? '(' + t + 's)' : '';
            if (t <= 0) {
                clearInterval(resendCountdown);
                resendCountdown = null;
            }
        }, 1000);
    }

    /* ── OTP auto-advance ── */
    const otpInputs = document.querySelectorAll('.otp-input');
    otpInputs.forEach((input, idx) => {
        input.addEventListener('input', function () {
            this.value = this.value.replace(/[^0-9]/g, '');
            if (this.value) {
                this.classList.add('filled');
                if (idx < otpInputs.length - 1) otpInputs[idx + 1].focus();
            } else {
                this.classList.remove('filled');
            }
        });

        input.addEventListener('keydown', function (e) {
            if (e.key === 'Backspace' && !this.value && idx > 0) {
                otpInputs[idx - 1].focus();
                otpInputs[idx - 1].classList.remove('filled');
            }
        });

        input.addEventListener('paste', function (e) {
            e.preventDefault();
            const pasted = e.clipboardData.getData('text').replace(/[^0-9]/g, '').slice(0, 6);
            [...pasted].forEach((ch, i) => {
                if (otpInputs[i]) {
                    otpInputs[i].value = ch;
                    otpInputs[i].classList.add('filled');
                }
            });
            otpInputs[Math.min(pasted.length, 5)].focus();
        });
    });

    /* ── Password confirm hint ── */
    document.getElementById('confirmPassword').addEventListener('input', function () {
        const hint = document.getElementById('pwMatchHint');
        const pw   = document.getElementById('newPassword').value;
        if (!this.value) {
            hint.textContent = '';
        } else if (this.value === pw) {
            hint.textContent = 'Passwords match.';
            hint.style.color = '#0D9488';
        } else {
            hint.textContent = 'Passwords do not match.';
            hint.style.color = '#DC2626';
        }
    });

    /* ── Password toggle ── */
    function togglePw(id, btn) {
        const input = document.getElementById(id);
        const icon  = btn.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.replace('bi-eye', 'bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.replace('bi-eye-slash', 'bi-eye');
        }
    }
</script>

</body>
</html>