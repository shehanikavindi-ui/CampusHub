<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | CampusHub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/auth.css">
</head>

<body class="auth-body">

    <div class="auth-layout">

        <!-- ===== LEFT BRAND PANEL ===== -->
        <aside class="auth-panel">
            <div class="auth-panel-deco">
                <div class="ap-blob ap-blob--1"></div>
                <div class="ap-blob ap-blob--2"></div>
                <div class="ap-dots"></div>
            </div>

            <div class="auth-panel-content">
                <a href="../index.html" class="auth-panel-logo">
                    <span class="nav-logo-icon">&#x2B22;</span>
                    Campus<span class="logo-accent">Hub</span>
                </a>

                <div class="auth-panel-hero mt-4">
                    <h2 class="auth-panel-title">
                        Join a community<br>
                        <em>built for you.</em>
                    </h2>
                    <p class="auth-panel-desc">
                        Create your free account and unlock access to events, clubs,
                        workshops, and everything happening across your campus.
                    </p>
                </div>

                <ul class="auth-panel-features">
                    <li>
                        <span class="ap-feat-icon"><i class="bi bi-calendar-check"></i></span>
                        Register for events in seconds
                    </li>
                    <li>
                        <span class="ap-feat-icon"><i class="bi bi-people"></i></span>
                        Join and manage club memberships
                    </li>
                    <li>
                        <span class="ap-feat-icon"><i class="bi bi-bell"></i></span>
                        Get real-time announcements
                    </li>
                    <li>
                        <span class="ap-feat-icon"><i class="bi bi-images"></i></span>
                        Upload photos &amp; activity updates
                    </li>
                    <li>
                        <span class="ap-feat-icon"><i class="bi bi-person-badge"></i></span>
                        Manage your student profile
                    </li>
                </ul>


            </div>
        </aside>

        <!-- ===== RIGHT FORM AREA ===== -->
        <main class="auth-form-area">

            <div class="auth-topbar">
                <a href="../index.html" class="auth-back-link">
                    <i class="bi bi-arrow-left"></i> Back to Home
                </a>
                <span class="auth-alt-action">
                    Already have an account?
                    <a href="studentLogin.php">Sign In</a>
                </span>
            </div>

            <!-- toast -->
            <div class="toast-msg" id="toast-msg">
                <i id="toast-icon" class="bi bi-x-circle-fill"></i>
                <span id="toast-text" class="toast-text"></span>
            </div>

            <?php
            include "../connection.php";
            ?>

            <div class="auth-form-wrapper">

                <div class="auth-form-head">
                    <h1 class="auth-form-title">Create Your Account</h1>
                    <p class="auth-form-subtitle">Fill in your details below to get started. It only takes a minute.</p>
                </div>

                <form class="auth-form" id="registerForm" novalidate>

                    <!-- ── SECTION 1: Personal Information ── -->
                    <div class="form-section">
                        <div class="form-section-label">
                            <span class="form-section-num">01</span>
                            <h3 class="form-section-title">Personal Information</h3>
                        </div>

                        <!-- Avatar upload -->
                        <div class="form-group avatar-group">
                            <label class="form-label">
                                Profile Photo
                                <span class="form-optional">Optional</span>
                            </label>
                            <div class="avatar-upload-area" id="avatarArea" title="Click to upload photo">
                                <div class="avatar-preview" id="avatarPreview">
                                    <i class="bi bi-camera"></i>
                                    <span>Upload Photo</span>
                                </div>
                                <input type="file" id="avatarInput" accept="image/*" hidden
                                    aria-label="Upload profile photo">
                                <button type="button" class="avatar-change-btn" id="avatarBtn">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </div>
                            <p class="form-hint">JPG, PNG or GIF &middot; Max 2MB</p>
                        </div>

                        <!-- First + Last Name -->
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="firstName">First Name <span
                                        class="form-required">*</span></label>
                                <div class="input-icon-wrap">
                                    <i class="bi bi-person input-icon"></i>
                                    <input type="text" class="form-control" id="firstName" name="firstName"
                                        placeholder="e.g. Aisha" required autocomplete="given-name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="lastName">Last Name <span
                                        class="form-required">*</span></label>
                                <div class="input-icon-wrap">
                                    <i class="bi bi-person input-icon"></i>
                                    <input type="text" class="form-control" id="lastName" name="lastName"
                                        placeholder="e.g. Khan" required autocomplete="family-name">
                                </div>
                            </div>
                        </div>

                        <!-- DOB + Gender -->
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="dob">Date of Birth <span
                                        class="form-required">*</span></label>
                                <div class="input-icon-wrap">
                                    <i class="bi bi-calendar3 input-icon"></i>
                                    <input type="date" class="form-control" id="dob" name="dob" required>
                                </div>
                            </div>

                            <?php
                            $gender_rs = Database::search("SELECT * FROM `gender`");
                            $gender_num = $gender_rs->num_rows;
                            ?>
                            <div class="form-group">
                                <label class="form-label" for="gender">Gender <span
                                        class="form-required">*</span></label>
                                <div class="input-icon-wrap">
                                    <i class="bi bi-gender-ambiguous input-icon"></i>
                                    <select class="form-control form-select" id="gender" name="gender" required>
                                        <option value="" disabled selected>Select gender</option>
                                        <?php
                                        for ($g = 0; $g < $gender_num; $g++) {
                                            $gender_data = $gender_rs->fetch_assoc();
                                            ?>
                                            <option value="<?php echo $gender_data['id']; ?>">
                                                <?php echo $gender_data['name']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Email + Phone -->
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="email">Email Address <span
                                        class="form-required">*</span></label>
                                <div class="input-icon-wrap">
                                    <i class="bi bi-envelope input-icon"></i>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="yourname@email.com" required autocomplete="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="phone">Phone Number <span
                                        class="form-required">*</span></label>
                                <div class="input-icon-wrap">
                                    <i class="bi bi-telephone input-icon"></i>
                                    <input type="tel" class="form-control" id="phone" name="phone"
                                        placeholder="e.g. +94 71 234 5678" required autocomplete="tel">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ── SECTION 2: Academic Details ── -->
                    <div class="form-section">
                        <div class="form-section-label">
                            <span class="form-section-num">02</span>
                            <h3 class="form-section-title">Academic Details</h3>
                        </div>

                        <!-- Student ID -->
                        <div class="form-group">
                            <label class="form-label" for="studentId">Student ID / Matric Number <span
                                    class="form-required">*</span></label>
                            <div class="input-icon-wrap">
                                <i class="bi bi-credit-card-2-front input-icon"></i>
                                <input type="text" class="form-control" id="studentId" name="studentId"
                                    placeholder="e.g. SC220012345" required style="text-transform: uppercase;">
                            </div>
                            <p class="form-hint">Found on your student card or official letter of offer.</p>
                        </div>

                        <?php
                        $institute_rs = Database::search("SELECT * FROM `institution`");
                        $institute_num = $institute_rs->num_rows;
                        ?>
                        <!-- Institution -->
                        <div class="form-group">
                            <label class="form-label" for="institution">Institution <span
                                    class="form-required">*</span></label>
                            <div class="input-icon-wrap">
                                <i class="bi bi-building-columns input-icon"></i>
                                <select class="form-control form-select" id="institution" name="institution" required>
                                    <option value="" disabled selected>Select your institution</option>
                                    <?php
                                    for ($i = 0; $i < $institute_num; $i++) {
                                        $institute_data = $institute_rs->fetch_assoc();
                                        ?>
                                        <option value="<?php echo $institute_data['id']; ?>">
                                            <?php echo $institute_data['name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <?php
                        $faculty_rs = Database::search("SELECT * FROM `faculty`");
                        $faculty_num = $faculty_rs->num_rows;
                        ?>
                        <!-- Faculty + Programme -->
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label" for="faculty">Faculty / Department <span
                                        class="form-required">*</span></label>
                                <div class="input-icon-wrap">
                                    <i class="bi bi-building-columns input-icon"></i>
                                    <select class="form-control form-select" id="faculty" name="faculty" required>
                                        <option value="" disabled selected>Select your faculty</option>
                                        <?php
                                        for ($i = 0; $i < $faculty_num; $i++) {
                                            $faculty_data = $faculty_rs->fetch_assoc();
                                            ?>
                                            <option value="<?php echo $faculty_data['id']; ?>">
                                                <?php echo $faculty_data['name']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="programme">Programme / Course <span
                                        class="form-required">*</span></label>
                                <div class="input-icon-wrap">
                                    <i class="bi bi-building-columns input-icon"></i>
                                    <select class="form-control form-select" id="programme" name="programme" required>
                                        <option value="" disabled selected>Select your programme</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <?php
                        $yos_rs = Database::search("SELECT * FROM `yearOfStudy`");
                        $yos_num = $yos_rs->num_rows;
                        ?>
                        <!-- Year of Study -->
                        <div class="form-group form-group--half">
                            <label class="form-label" for="yearOfStudy">Year of Study <span
                                    class="form-required">*</span></label>
                            <div class="input-icon-wrap">
                                <i class="bi bi-bookmark-star input-icon"></i>
                                <select class="form-control form-select" id="yearOfStudy" name="yearOfStudy" required>
                                    <option value="" disabled selected>Select year</option>
                                    <?php
                                    for ($y = 0; $y < $yos_num; $y++) {
                                        $yos_data = $yos_rs->fetch_assoc();
                                        ?>
                                        <option value="<?php echo $yos_data['id']; ?>"><?php echo $yos_data['name']; ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- ── SECTION 3: Account Setup ── -->
                    <div class="form-section">
                        <div class="form-section-label">
                            <span class="form-section-num">03</span>
                            <h3 class="form-section-title">Account Setup</h3>
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label class="form-label" for="password">Password <span
                                    class="form-required">*</span></label>
                            <div class="input-pw-wrap">
                                <div class="input-icon-wrap">
                                    <i class="bi bi-lock input-icon"></i>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Create a strong password" required autocomplete="new-password"
                                        minlength="8" aria-describedby="strengthLabel">
                                </div>
                                <button type="button" class="pw-toggle" data-target="password"
                                    aria-label="Show/hide password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            <!-- Strength meter -->
                            <div class="pw-strength-wrap">
                                <div class="pw-strength-bar">
                                    <span class="pw-strength-fill" id="strengthFill"></span>
                                </div>
                                <span class="pw-strength-label" id="strengthLabel">Enter a password</span>
                            </div>
                            <ul class="pw-rules">
                                <li class="pw-rule" id="rule-len"><i class="bi bi-check-circle"></i> At least 8
                                    characters</li>
                                <li class="pw-rule" id="rule-up"><i class="bi bi-check-circle"></i> One uppercase letter
                                </li>
                                <li class="pw-rule" id="rule-num"><i class="bi bi-check-circle"></i> One number</li>
                                <li class="pw-rule" id="rule-sym"><i class="bi bi-check-circle"></i> One special
                                    character</li>
                            </ul>
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label class="form-label" for="confirmPassword">Confirm Password <span
                                    class="form-required">*</span></label>
                            <div class="input-pw-wrap">
                                <div class="input-icon-wrap">
                                    <i class="bi bi-lock-fill input-icon"></i>
                                    <input type="password" class="form-control" id="confirmPassword"
                                        name="confirmPassword" placeholder="Re-enter your password" required
                                        autocomplete="new-password">
                                </div>
                                <button type="button" class="pw-toggle" data-target="confirmPassword"
                                    aria-label="Show/hide confirm password">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            <p class="form-feedback" id="confirmFeedback"></p>
                        </div>
                    </div>

                    <!-- ── Agreement ── -->
                    <div class="form-agreements">
                        <div class="form-check-group">
                            <input type="checkbox" class="form-checkbox" id="terms" name="terms" required>
                            <label class="form-check-label" for="terms">
                                I agree to the
                                <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>
                                <span class="form-required">*</span>
                            </label>
                        </div>
                        <div class="form-check-group">
                            <input type="checkbox" class="form-checkbox" id="newsletter" name="newsletter">
                            <label class="form-check-label" for="newsletter">
                                I'd like to receive event notifications and updates via email
                            </label>
                        </div>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary btn-lg auth-submit-btn">
                        <i class="bi bi-person-plus"></i>
                        Create My Account
                    </button>

                    <p class="auth-switch-link">
                        Already have an account?
                        <a href="studentLogin.php">Sign In</a>
                    </p>

                </form>
            </div>
        </main>

    </div><!-- /.auth-layout -->

    <script src="../js/auth.js"></script>
    <script>
        /* ─── Avatar upload preview ─── */
        const avatarArea = document.getElementById('avatarArea');
        const avatarInput = document.getElementById('avatarInput');
        const avatarBtn = document.getElementById('avatarBtn');
        const avatarPreview = document.getElementById('avatarPreview');

        [avatarArea, avatarBtn].forEach(el => {
            el.addEventListener('click', () => avatarInput.click());
        });

        avatarInput.addEventListener('change', function () {
            const file = this.files[0];
            if (!file) return;
            if (file.size > 2 * 1024 * 1024) {
                alert('File size must be under 2 MB.'); return;
            }
            const reader = new FileReader();
            reader.onload = e => {
                avatarPreview.style.backgroundImage = `url('${e.target.result}')`;
                avatarPreview.innerHTML = '';
                avatarPreview.classList.add('has-image');
            };
            reader.readAsDataURL(file);
        });

        /* ─── Password show / hide toggle ─── */
        document.querySelectorAll('.pw-toggle').forEach(btn => {
            btn.addEventListener('click', () => {
                const target = document.getElementById(btn.dataset.target);
                const icon = btn.querySelector('i');
                if (target.type === 'password') {
                    target.type = 'text';
                    icon.classList.replace('bi-eye', 'bi-eye-slash');
                } else {
                    target.type = 'password';
                    icon.classList.replace('bi-eye-slash', 'bi-eye');
                }
            });
        });

        /* ─── Password strength meter ─── */
        const pwInput = document.getElementById('password');
        const strengthFill = document.getElementById('strengthFill');
        const strengthLabel = document.getElementById('strengthLabel');

        const rules = {
            'rule-len': v => v.length >= 8,
            'rule-up': v => /[A-Z]/.test(v),
            'rule-num': v => /[0-9]/.test(v),
            'rule-sym': v => /[^A-Za-z0-9]/.test(v)
        };
        const levels = [
            { label: 'Too weak', color: '#EF4444', width: '15%' },
            { label: 'Weak', color: '#F97316', width: '35%' },
            { label: 'Fair', color: '#EAB308', width: '60%' },
            { label: 'Good', color: '#22C55E', width: '82%' },
            { label: 'Strong', color: '#14B8A6', width: '100%' }
        ];

        pwInput.addEventListener('input', () => {
            const val = pwInput.value;
            let score = 0;
            Object.entries(rules).forEach(([id, test]) => {
                const el = document.getElementById(id);
                const ok = val.length > 0 && test(val);
                el.classList.toggle('pw-rule--met', ok);
                if (ok) score++;
            });
            if (val.length === 0) {
                strengthFill.style.width = '0';
                strengthLabel.textContent = 'Enter a password';
                strengthLabel.style.color = '';
            } else {
                const lvl = levels[score] || levels[0];
                strengthFill.style.width = lvl.width;
                strengthFill.style.background = lvl.color;
                strengthLabel.textContent = lvl.label;
                strengthLabel.style.color = lvl.color;
            }
        });

        // /* ─── Confirm password match ─── */
        const confirmPw = document.getElementById('confirmPassword');
        const confirmFb = document.getElementById('confirmFeedback');

        confirmPw.addEventListener('input', () => {
            if (confirmPw.value === '') {
                confirmFb.textContent = '';
                confirmPw.classList.remove('is-valid', 'is-invalid');
            } else if (confirmPw.value === pwInput.value) {
                confirmFb.textContent = 'Passwords match.';
                confirmFb.className = 'form-feedback form-feedback--ok';
                confirmPw.classList.add('is-valid');
                confirmPw.classList.remove('is-invalid');
            } else {
                confirmFb.textContent = 'Passwords do not match.';
                confirmFb.className = 'form-feedback form-feedback--err';
                confirmPw.classList.add('is-invalid');
                confirmPw.classList.remove('is-valid');
            }
        });

        document.getElementById('faculty').addEventListener('change', function () {
            const facultyId = this.value;
            const programmeSelect = document.getElementById('programme');

            // reset and show loading state
            programmeSelect.innerHTML = '<option value="" disabled selected>Loading...</option>';
            programmeSelect.disabled = true;

            var request = new XMLHttpRequest();
            request.onreadystatechange = function () {
                if (request.readyState == 4 && request.status == 200) {
                    var courses = JSON.parse(request.responseText);
                    programmeSelect.innerHTML = '';

                    if (courses.length === 0) {
                        programmeSelect.innerHTML = '<option value="" disabled selected>No courses found</option>';
                    } else {
                        programmeSelect.innerHTML = '<option value="" disabled selected>Select your programme</option>';
                        courses.forEach(function (course) {
                            var option = document.createElement('option');
                            option.value = course.id;
                            option.textContent = course.name;
                            programmeSelect.appendChild(option);
                        });
                    }
                    programmeSelect.disabled = false;
                }
            };
            request.open("GET", "../process/getCourses.php?faculty_id=" + facultyId, true);
            request.send();
        });

        /* ─── Form submit ─── */
        document.getElementById('registerForm').addEventListener('submit', function (e) {
            e.preventDefault();

            if (!this.checkValidity()) {
                this.classList.add('was-validated');
                this.querySelector(':invalid')?.focus();
                return;
            }

            if (!document.getElementById('terms').checked) {
                showToast('Please agree to the Terms of Use and Privacy Policy.');
                document.getElementById('terms').focus();
                return;
            }

            if (pwInput.value !== confirmPw.value) {
                confirmPw.focus(); return;
            }

            studentRegister();
        });
    </script>

</body>

</html>