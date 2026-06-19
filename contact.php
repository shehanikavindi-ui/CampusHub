<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CampusHub — Your Campus, Your Community</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .contact-section {
            padding: 48px 50px;
            margin-top: 2.5rem;
        }

        .contact-intro {
            padding: 2.5rem 0 2rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 12px;
        }

        .intro-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #CCFBF1;
            border: 1px solid #99F6E4;
            border-radius: 9999px;
            padding: 4px 14px;
            font-size: 11.5px;
            font-weight: 500;
            color: #0F766E;
            letter-spacing: 0.3px;
        }

        .intro-badge i {
            font-size: 13px;
        }

        .intro-heading {
            font-size: 28px;
            font-weight: 600;
            color: #1E293B;
            line-height: 1.3;
            max-width: 480px;
        }

        .intro-heading span {
            color: #0D9488;
        }

        .intro-sub {
            font-size: 14px;
            color: #64748B;
            line-height: 1.7;
            max-width: 420px;
        }

        .intro-tips {
            display: flex;
            gap: 10px;
            margin-top: 6px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .intro-tip {
            display: flex;
            align-items: center;
            gap: 6px;
            background: #F8FAFC;
            border: 1px solid #E2E8F0;
            border-radius: 9999px;
            padding: 5px 14px;
            font-size: 12.5px;
            color: #475569;
        }

        .intro-tip i {
            font-size: 14px;
            color: #0D9488;
        }

        .contact-wrap {
            display: grid;
            grid-template-columns: 1fr 1fr;
            background: white;
            border: 1px solid var(--neutral-200);
            border-radius: var(--radius-xl);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            min-height: 420px;
        }

        /* ── Left panel ── */
        .contact-left {
            background: var(--teal-700);
            padding: 2.5rem 2rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .contact-eyebrow {
            font-size: 11px;
            font-weight: 500;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            color: var(--teal-300);
            margin-bottom: 14px;
        }

        .contact-heading {
            font-size: 22px;
            font-weight: 600;
            color: var(--teal-50);
            line-height: 1.35;
            margin-bottom: 12px;
        }

        .contact-sub {
            font-size: 13.5px;
            color: var(--teal-300);
            line-height: 1.65;
        }

        .contact-meta {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 2rem;
        }

        .contact-meta-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 13px;
            color: var(--teal-100);
        }

        .contact-meta-item i {
            font-size: 16px;
            color: var(--teal-400);
            flex-shrink: 0;
        }

        /* ── Right panel ── */
        .contact-right {
            padding: 2.5rem 2rem;
            display: flex;
            flex-direction: column;
            gap: 18px;
            background: white;
        }

        .field-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .field-label {
            font-size: 12px;
            font-weight: 500;
            color: var(--neutral-500);
            letter-spacing: 0.3px;
        }

        .field-required {
            color: #E24B4A;
            margin-left: 2px;
        }

        .field-input {
            width: 100%;
            height: 38px;
            padding: 0 12px;
            border: 1px solid var(--neutral-200);
            border-radius: var(--radius-md);
            background: white;
            color: var(--neutral-800);
            font-size: 14px;
            font-family: var(--font-body);
            outline: none;
            transition: border-color var(--transition), box-shadow var(--transition);
            box-sizing: border-box;
        }

        .field-input::placeholder {
            color: var(--neutral-400);
        }

        .field-input:focus {
            border-color: var(--teal-500);
            box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.12);
        }

        .field-textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid var(--neutral-200);
            border-radius: var(--radius-md);
            background: white;
            color: var(--neutral-800);
            font-size: 14px;
            font-family: var(--font-body);
            line-height: 1.6;
            resize: vertical;
            min-height: 110px;
            outline: none;
            transition: border-color var(--transition), box-shadow var(--transition);
            box-sizing: border-box;
        }

        .field-textarea::placeholder {
            color: var(--neutral-400);
        }

        .field-textarea:focus {
            border-color: var(--teal-500);
            box-shadow: 0 0 0 3px rgba(20, 184, 166, 0.12);
        }

        .field-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .field-hint {
            font-size: 11.5px;
            color: var(--neutral-400);
        }

        .char-count {
            font-size: 11px;
            color: var(--neutral-400);
        }

        .form-actions {
            display: flex;
            gap: 8px;
            justify-content: flex-end;
            margin-top: 4px;
        }

        .btn-reset {
            padding: 8px 16px;
            border-radius: var(--radius-md);
            border: 1px solid var(--neutral-200);
            background: white;
            color: var(--neutral-500);
            font-size: 13px;
            font-weight: 500;
            font-family: var(--font-body);
            cursor: pointer;
            transition: all var(--transition);
        }

        .btn-reset:hover {
            background: var(--neutral-100);
            border-color: var(--neutral-300);
            color: var(--neutral-700);
        }

        .btn-send {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 18px;
            border-radius: var(--radius-md);
            border: none;
            background: var(--teal-600);
            color: white;
            font-size: 13px;
            font-weight: 500;
            font-family: var(--font-body);
            cursor: pointer;
            transition: background var(--transition);
        }

        .btn-send:hover {
            background: var(--teal-700);
        }

        .btn-send i {
            font-size: 15px;
        }
    </style>
</head>

<body>

    <!-- ===================== HEADER ===================== -->
    <?php
    include "header.php";
    ?>

    <section class="contact-section">

            <!-- toast -->
            <div class="toast-msg" id="toast-msg">
                <i id="toast-icon" class="bi bi-x-circle-fill"></i>
                <span id="toast-text" class="toast-text"></span>
            </div>

        <div class="contact-intro">
            <div class="intro-badge">
                <i class="ti ti-headset"></i> We're here to help
            </div>
            <div class="intro-heading">
                Reach out to the <span>admin team</span> anytime
            </div>
            <div class="intro-sub">
                Have a question about an event, registration, or anything else? Fill out the form below and we'll get back to you shortly.
            </div>
            <div class="intro-tips">
                <div class="intro-tip"><i class="ti ti-calendar-event"></i> Event queries</div>
                <div class="intro-tip"><i class="ti ti-clipboard-list"></i> Registration issues</div>
                <div class="intro-tip"><i class="ti ti-speakerphone"></i> Announcements</div>
                <div class="intro-tip"><i class="ti ti-help-circle"></i> General support</div>
            </div>
        </div>
        <div class="contact-wrap">

            <!-- Left info panel -->
            <div class="contact-left">
                <div class="contact-left-top">
                    <div class="contact-eyebrow">Student support</div>
                    <div class="contact-heading">Got a question or concern? Let us know.</div>
                    <div class="contact-sub">Send a message directly to the admin team and we'll get back to you as soon as possible.</div>
                    <div class="contact-meta">
                        <div class="contact-meta-item">
                            <i class="ti ti-clock"></i> Usually responds within 1-2 business days
                        </div>
                        <div class="contact-meta-item">
                            <i class="ti ti-lock"></i> Your message is private and secure
                        </div>
                        <div class="contact-meta-item">
                            <i class="ti ti-user-check"></i> Sent under your student account
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right form panel -->
            <div class="contact-right">
                <div class="field-group">
                    <label class="field-label" for="subject">
                        Subject <span class="field-required">*</span>
                    </label>
                    <input
                        class="field-input"
                        id="subject"
                        name="subject"
                        type="text"
                        placeholder="e.g. Missing event registration"
                        maxlength="100"
                        oninput="updateSubjectCount(this)">
                    <div class="field-footer">
                        <span class="field-hint">Keep it short and descriptive</span>
                        <span class="char-count" id="subject-count">0 / 100</span>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" for="body">
                        Message <span class="field-required">*</span>
                    </label>
                    <textarea
                        class="field-textarea"
                        id="body"
                        name="body"
                        placeholder="Describe your issue or question in detail..."
                        maxlength="1000"
                        oninput="updateBodyCount(this)"></textarea>
                    <div class="field-footer">
                        <span class="field-hint">Be as specific as you can</span>
                        <span class="char-count" id="body-count">0 / 1000</span>
                    </div>
                </div>

                <div class="form-actions">
                    <button class="btn-reset" type="button" onclick="resetForm()">Clear</button>
                    <button class="btn-send" type="button" onclick="sendForm()">
                        <i class="ti ti-send"></i> Send message
                    </button>
                </div>
            </div>

        </div>
    </section>

    <!-- ===================== FOOTER ===================== -->
    <?php include "footer.php"; ?>

    <script>

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

        /* --- Navbar scroll effect --- */
        const header = document.getElementById('header');
        window.addEventListener('scroll', () => {
            header.classList.toggle('header--scrolled', window.scrollY > 60);
        }, {
            passive: true
        });

        /* --- Mobile nav toggle --- */
        const navToggle = document.getElementById('navToggle');
        const navLinks = document.getElementById('navLinks');
        navToggle.addEventListener('click', () => {
            const open = navLinks.classList.toggle('nav-links--open');
            navToggle.setAttribute('aria-expanded', open);
            navToggle.classList.toggle('nav-toggle--open', open);
        });

        /* --- Close mobile nav on link click --- */
        navLinks.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('nav-links--open');
                navToggle.classList.remove('nav-toggle--open');
            });
        });

        /* --- Filter buttons (visual only) --- */
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            });
        });

        /* --- Scroll-reveal via IntersectionObserver --- */
        const reveals = document.querySelectorAll(
            '.ann-card, .event-card, .club-card, .gallery-item, .testi-card, .hero-stat'
        );
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('is-visible');
                    observer.unobserve(e.target);
                }
            });
        }, {
            threshold: 0.1
        });
        reveals.forEach(el => observer.observe(el));


        function updateSubjectCount(el) {
            document.getElementById('subject-count').textContent = el.value.length + ' / 100';
        }

        function updateBodyCount(el) {
            document.getElementById('body-count').textContent = el.value.length + ' / 1000';
        }

        function resetForm() {
            document.getElementById('subject').value = '';
            document.getElementById('body').value = '';
            document.getElementById('subject-count').textContent = '0 / 100';
            document.getElementById('body-count').textContent = '0 / 1000';
        }

        function sendForm() {
            var subject = document.getElementById('subject').value.trim();
            var body = document.getElementById('body').value.trim();

            if (!subject || !body) {
                showToast('Enter your email and password to continue.');
                return;
            }

            var form = new FormData();
            form.append("sub", subject);
            form.append("bdy", body);

            var request = new XMLHttpRequest();
            request.onreadystatechange = function(){
                if (request.readyState == 4 && request.status == 200) {
                    var response = request.responseText;
                    if (response == "success") {
                        showToast("Form sent successfully!", "success");
                        setTimeout(() => resetForm(), 1500);
                    } else {
                        showToast("Sending failed!. Please try again.");
                    }
                }
            }
            request.open("POST", "process/sendForm.php", true);
            request.send(form);
        }
    </script>

</body>

</html>