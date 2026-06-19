function showToast(msg, type = 'error') {
    const t = document.getElementById('toast-msg');
    const text = document.getElementById('toast-text');
    const icon = document.getElementById('toast-icon');

    text.textContent = msg;

    if (type === 'success') {
        t.style.backgroundColor = '#15803D';
        t.style.boxShadow = '0 8px 24px rgba(21,128,61,0.28)';
        icon.className = 'bi bi-check-circle-fill';
    } else if (type === 'warning') {
        t.style.backgroundColor = '#D97706';
        t.style.boxShadow = '0 8px 24px rgba(217,119,6,0.28)';
        icon.className = 'bi bi-exclamation-triangle-fill';
    } else {
        t.style.backgroundColor = '#DC2626';
        t.style.boxShadow = '0 8px 24px rgba(220,38,38,0.28)';
        icon.className = 'bi bi-x-circle-fill';
    }

    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 3000);
}

function studentRegister() {

    var pfp = document.getElementById('avatarInput');

    var firstname = document.getElementById('firstName');
    var lastname = document.getElementById('lastName');
    var dob = document.getElementById('dob');
    var gender = document.getElementById('gender');
    var email = document.getElementById('email');
    var phone = document.getElementById('phone');

    var studentId = document.getElementById('studentId');
    var institution = document.getElementById('institution');
    var faculty = document.getElementById('faculty');
    var programme = document.getElementById('programme');
    var yearOfStudy = document.getElementById('yearOfStudy');

    var password = document.getElementById('password');
    var confirmPassword = document.getElementById('confirmPassword');


    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
        showToast("⚠ Please enter a valid email!");
        document.getElementById("email").focus();
        return;
    }

    var form = new FormData();
    form.append("fn", firstname.value);
    form.append("ln", lastname.value);
    form.append("dob", dob.value);
    form.append("g", gender.value);
    form.append("em", email.value);
    form.append("ph", phone.value);

    form.append("sid", studentId.value);
    form.append("in", institution.value);
    form.append("fac", faculty.value);
    form.append("pr", programme.value);
    form.append("yos", yearOfStudy.value);

    form.append("pw", password.value);

    if (pfp.files.length > 0) {
        form.append("pfp", pfp.files[0]);
    }

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText.trim();
            if (response === "success") {
                showToast("Account created successfully!", "success");
                setTimeout(() => window.location.href = "studentLogin.php", 1500);
            } else if (response === "exists") {
                showToast("An account with this email already exists.");
            } else if (response === "invalid email") {
                showToast("Please enter a valid email.");
            } else {
                showToast("Something went wrong. Please try again.");
            }
        }
    }
    request.open("POST", "../process/studentRegister.php", true);
    request.send(form);

}

function studentLogin() {
    var email = document.getElementById('loginEmail');
    var password = document.getElementById('loginPassword');
    var rememberMe = document.getElementById('rememberMe');

    if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
        showToast("⚠ Please enter a valid email!");
        document.getElementById("loginEmail").focus();
        return;
    }

    var form = new FormData();
    form.append("em", email.value);
    form.append("pw", password.value);
    form.append("rm", rememberMe.checked);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            if (response == "success") {
                showToast("Login successful! ✓", "success");
                setTimeout(() => window.location = "../index.php", 1500);
            } else if (response == "invalid") {
                showToast("⚠ Invalid email or password!");
            } else {
                showToast("⚠ Something went wrong!");
            }
        }
    }
    request.open("POST", "../process/studentLogin.php", true);
    request.send(form);
}


function sendOtp() {   /* ── STEP 1 — send OTP ── */
    var email = document.getElementById('emailInput').value.trim();

    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        showToast('Please enter a valid email address.');
        return;
    }

    userEmail = email;
    document.getElementById('emailDisplay').textContent = email;

    var form = new FormData();
    form.append('em', email);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            const response = request.responseText.trim();
            if (response === 'sent') {
                showToast('Code sent! Check your inbox.', 'success');
                goToStep(2);
                startResendTimer(60);
            } else if (response === 'not_found') {
                showToast('No account found with that email.');
            } else {
                showToast('Something went wrong. Try again.', 'warning');
            }
        }
    };
    request.open('POST', '../process/sendResetOtp.php', true);
    request.send(form);
}


function verifyOtp() {  /* ── STEP 2 — verify OTP ── */
    var inputs = document.querySelectorAll('.otp-input');
    var otp = [...inputs].map(i => i.value).join('');
    if (otp.length < 6) {
        showToast('Please enter the full 6-digit code.', 'warning');
        return;
    }

    var form = new FormData();
    form.append('em', userEmail);
    form.append('otp', otp);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText.trim();
            if (response === 'valid') {
                goToStep(3);
            } else {
                showToast('Incorrect code. Please try again.');
            }
        }
    };
    request.open('POST', '../process/verifyResetOtp.php', true);
    request.send(form);
}


function resetPassword() {    /* ── STEP 3 — reset password ── */
    var password = document.getElementById('newPassword').value;
    var confirmPw = document.getElementById('confirmPassword').value;
    var hint = document.getElementById('pwMatchHint');

    if (password.length < 8 || !/[A-Z]/.test(password) || !/[0-9]/.test(password) || !/[^A-Za-z0-9]/.test(password)) {
        showToast('Password must be at least 8 chars with uppercase, number & symbol.', 'warning');
        return;
    }
    if (password !== confirmPw) {
        hint.textContent = 'Passwords do not match.';
        hint.style.color = '#DC2626';
        return;
    }

    var form = new FormData();
    form.append('em', userEmail);
    form.append('pw', password);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText.trim();
            if (response === 'success') {
                goToStep(4);
            } else {
                showToast('Failed to update password. Try again.');
            }
        }
    };
    request.open('POST', '../process/resetPassword.php', true);
    request.send(form);
}

function resendOtp() {
    if (resendCountdown) return;
    sendOtp();
    startResendTimer(60);
}   

function adminLogin() {
    var email = document.getElementById('email');
    var password = document.getElementById('password');

    var form = new FormData();
    form.append("em", email.value);
    form.append("pw", password.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            if (response == "success") {
                showToast("Login successful! ✓", "success");
                setTimeout(() => {
                    window.location = "adminDashboard.php";
                }, 1500);
            } else if (response == "invalid") {
                showToast("Invalid email or password!");
            } else {
                showToast("Something went wrong!");
            }
        }
    }
    request.open("POST", "../process/adminLogin.php", true);
    request.send(form);
}