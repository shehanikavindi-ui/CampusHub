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
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">


    <link rel="icon" href="assets/favicon.svg" type="image/svg+xml" />

    <style>
        .hero-auth {
            position: relative;
            overflow: hidden;
            min-height: calc(100vh - var(--header-h));
            display: flex;
            align-items: center;
            padding-block: clamp(4rem, 8vw, 6rem);
            background: linear-gradient(135deg, var(--teal-50) 0%, var(--bg-soft) 55%, var(--violet-50) 100%);
        }

        .hero-auth-shapes {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }

        .hero-auth-shape {
            position: absolute;
            border-radius: var(--radius-full);
            opacity: 0.45;
        }

        .hero-auth-shape--1 {
            width: 220px;
            height: 220px;
            top: -70px;
            right: -60px;
            background: var(--teal-200);
        }

        .hero-auth-shape--2 {
            width: 160px;
            height: 160px;
            bottom: -50px;
            left: -40px;
            background: var(--violet-200);
        }

        .hero-auth-shape--3 {
            width: 46px;
            height: 46px;
            top: 18%;
            left: 12%;
            background: var(--teal-300);
            border-radius: var(--radius-lg);
            transform: rotate(15deg);
            opacity: 0.5;
        }

        .hero-auth-shape--4 {
            width: 30px;
            height: 30px;
            bottom: 22%;
            right: 16%;
            background: var(--violet-300);
        }

        .hero-auth-shape--5 {
            width: 24px;
            height: 24px;
            top: 30%;
            right: 8%;
            background: var(--teal-400);
            border-radius: var(--radius-sm);
            opacity: 0.4;
        }

        .hero-auth-shape--6 {
            width: 130px;
            height: 130px;
            top: 8%;
            left: 38%;
            background: var(--violet-100);
            opacity: 0.35;
        }

        .hero-auth-content {
            position: relative;
            z-index: 1;
            max-width: 600px;
            margin-inline: auto;
            text-align: center;
        }

        .hero-auth-date {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-size: var(--text-sm);
            font-weight: 600;
            color: var(--primary-dark);
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid var(--teal-200);
            padding: 0.4rem 0.9rem;
            border-radius: var(--radius-full);
            margin-bottom: 1.25rem;
        }

        .hero-auth-kicker {
            font-size: var(--text-xs);
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--primary-dark);
            margin-bottom: 0.5rem;
        }

        .hero-auth-title {
            font-size: clamp(var(--text-3xl), 4vw, var(--text-4xl));
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.75rem;
        }

        .hero-auth-subtitle {
            font-size: var(--text-lg);
            color: var(--text-secondary);
            margin-bottom: 2rem;
        }

        .hero-auth-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        @media (max-width: 640px) {
            .hero-auth-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .hero-auth-actions .btn {
                justify-content: center;
            }
        }
    </style>
</head>

<body>

    <!-- ===================== HEADER ===================== -->
    <?php
    include "header.php";
    ?>


    <main>

        <?php
        if (isset($_SESSION["u"])) {

            $studentName = $_SESSION['u']['fname'];

            $today = date('l, j F');
        ?>

            <!-- ===================== HERO (LOGGED IN) ===================== -->
            <br>
            <section class="hero-auth mt-1">
                <div class="hero-auth-shapes" aria-hidden="true">
                    <span class="hero-auth-shape hero-auth-shape--1"></span>
                    <span class="hero-auth-shape hero-auth-shape--2"></span>
                    <span class="hero-auth-shape hero-auth-shape--3"></span>
                    <span class="hero-auth-shape hero-auth-shape--4"></span>
                    <span class="hero-auth-shape hero-auth-shape--5"></span>
                    <span class="hero-auth-shape hero-auth-shape--6"></span>
                </div>

                <div class="container hero-auth-content">

                    <div class="hero-auth-date">
                        <i class="fa-regular fa-calendar"></i>
                        <?php echo htmlspecialchars($today); ?>
                    </div>

                    <p class="hero-auth-kicker mt-2">Welcome back</p>
                    <h1 class="hero-auth-title mt-3">Hi, <?php echo htmlspecialchars($studentName); ?></h1>
                    <p class="hero-auth-subtitle">Your campus community is buzzing today. Let's see what's happening.</p>

                    <div class="hero-auth-actions">
                        <a href="announcements.php" class="btn btn-primary">
                            <i class="fa-solid fa-bullhorn"></i>
                            View announcements
                        </a>
                        <a href="my-events.php" class="btn btn-outline-primary">
                            <i class="fa-solid fa-calendar-days"></i>
                            My events
                        </a>
                        <a href="student-profile.php" class="btn btn-outline-primary">
                            <i class="fa-solid fa-user"></i>
                            My profile
                        </a>
                    </div>

                </div>
            </section>
        <?php
        } else {
        ?>
            <!-- ===================== HERO ===================== -->
            <section class="hero" id="home">

                <div class="hero-bg">
                    <div class="hero-blob hero-blob--1"></div>
                    <div class="hero-blob hero-blob--2"></div>
                    <div class="hero-blob hero-blob--3"></div>
                    <div class="hero-dots"></div>
                </div>

                <div class="container hero-content">
                    <div class="hero-badge">
                        <span class="hero-badge-pulse"></span>
                        Spring 2025 &mdash; Registrations Now Open
                    </div>

                    <h1 class="hero-title">
                        Your Campus,<br>
                        <em>Your Community.</em>
                    </h1>

                    <p class="hero-subtitle">
                        Connect with clubs, register for events, discover opportunities,<br class="br-desktop">
                        and be part of a thriving student ecosystem — all in one place.
                    </p>

                    <div class="hero-actions">
                        <a href="#events" class="btn btn-primary btn-lg">
                            <i class="fa-solid fa-calendar-days"></i>
                            Explore Events
                        </a>
                        <a href="#" class="btn btn-outline-white btn-lg">
                            <i class="fa-solid fa-user-plus"></i>
                            Join Now — It's Free
                        </a>
                    </div>

                    <div class="hero-stats">
                        <div class="hero-stat">
                            <span class="hero-stat-number">500+</span>
                            <span class="hero-stat-label">Annual Events</span>
                        </div>
                        <span class="hero-stat-sep"></span>
                        <div class="hero-stat">
                            <span class="hero-stat-number">80+</span>
                            <span class="hero-stat-label">Active Clubs</span>
                        </div>
                        <span class="hero-stat-sep"></span>
                        <div class="hero-stat">
                            <span class="hero-stat-number">15K+</span>
                            <span class="hero-stat-label">Students</span>
                        </div>
                        <span class="hero-stat-sep"></span>
                        <div class="hero-stat">
                            <span class="hero-stat-number">12</span>
                            <span class="hero-stat-label">Institutions</span>
                        </div>
                    </div>
                </div>
            </section>
        <?php
        }
        ?>

        <!-- toast -->
        <div class="toast-msg" id="toast-msg">
            <i id="toast-icon" class="bi bi-x-circle-fill"></i>
            <span id="toast-text" class="toast-text"></span>
        </div>


        <!-- ===================== QUICK HIGHLIGHTS STRIP ===================== -->
        <div class="highlights-strip">
            <div class="container highlights-inner">
                <div class="highlight-item">
                    <i class="fa-solid fa-bolt"></i>
                    <span>Instant Event Registration</span>
                </div>
                <span class="highlight-sep"></span>
                <div class="highlight-item">
                    <i class="fa-solid fa-bell"></i>
                    <span>Real-time Announcements</span>
                </div>
                <span class="highlight-sep"></span>
                <div class="highlight-item">
                    <i class="fa-solid fa-id-card"></i>
                    <span>Digital Member Profiles</span>
                </div>
                <span class="highlight-sep"></span>
                <div class="highlight-item">
                    <i class="fa-solid fa-images"></i>
                    <span>Multimedia Gallery</span>
                </div>
                <span class="highlight-sep"></span>
                <div class="highlight-item">
                    <i class="fa-solid fa-building-columns"></i>
                    <span>12 Institutions</span>
                </div>
            </div>
        </div>

        <!-- ===================== ANNOUNCEMENTS ===================== -->
        <section class="section section--white" id="announcements">
            <div class="container">
                <div class="section-header">
                    <span class="section-tag">Latest Updates</span>
                    <h2 class="section-title">Announcements</h2>
                    <p class="section-subtitle">Stay informed with the latest news, updates, and notices from CampusHub.
                    </p>
                </div>

                <div class="announcements-grid">

                    <?php
                    $q = "SELECT a.*, c.name AS category_name, c.color AS category_color, i.name AS institution_name
                        FROM announcements a
                        INNER JOIN category c ON a.category_id = c.id
                        LEFT JOIN institution i ON a.institution_id = i.id
                        ORDER BY a.id DESC";

                    $announcements_rs = Database::search($q);


                    for ($a = 0; $a < 3; $a++) {
                        $announcements_data = $announcements_rs->fetch_assoc();
                        $categoryColor = $announcements_data['category_color'] ?? '#9CA3AF';
                    ?>
                        <article class="ann-card ann-card--event"
                            style="--ann-color: <?php echo htmlspecialchars($categoryColor); ?>;
                            --ann-color-bg: color-mix(in srgb, <?php echo htmlspecialchars($categoryColor); ?> 15%, white);">
                            <div class="ann-accent"></div>
                            <div class="ann-body">
                                <div class="ann-meta">
                                    <span class="ann-badge ann-badge--event">
                                        <i class="fa-solid fa-bullhorn"></i>
                                        <?php echo $announcements_data['category_name']; ?>
                                    </span>
                                </div>
                                <h3 class="ann-title"><?php echo $announcements_data['title']; ?></h3>
                                <p class="ann-text"><?php echo $announcements_data['description']; ?></p>
                                <p class="ann-link"><?php echo $announcements_data['institution_name']; ?></p>
                            </div>
                        </article>
                    <?php
                    }
                    ?>



                </div>

                <div class="section-footer">
                    <a href="announcements.php" class="btn btn-outline-primary">View All Announcements</a>
                </div>
            </div>
        </section>




        <?php
        $grs = Database::search("
            SELECT
                e.id,
                e.title,
                MIN(ei.path) AS photo
            FROM event e
            INNER JOIN event_images ei ON ei.event_id = e.id
            GROUP BY e.id, e.title
            ORDER BY e.id DESC
            LIMIT 6
        ");

        $home_gallery = [];
        while ($grow = $grs->fetch_assoc()) {
            $home_gallery[] = $grow;
        }
        ?>
        <!-- ===================== GALLERY ===================== -->
        <section class="section section--dark" id="gallery">
            <div class="container">
                <div class="section-header section-header--light">
                    <span class="section-tag section-tag--light">Memories</span>
                    <h2 class="section-title section-title--light">Campus Life Gallery</h2>
                    <p class="section-subtitle section-subtitle--light">A glimpse into the vibrant life on campus —
                        events, faces, and moments.</p>
                </div>

                <?php
                $layout_classes = [
                    'gallery-item--tall',   // 1 – spans 2 rows
                    '',                     // 2
                    '',                     // 3
                    'gallery-item--wide',   // 4 – spans 2 cols
                    '',                     // 5
                    '',                     // 6
                ];
                ?>

                <div class="gallery-grid">
                    <?php if (!empty($home_gallery)):
                        foreach ($home_gallery as $i => $item):
                            $extra = $layout_classes[$i] ?? '';
                    ?>
                            <div class="gallery-item <?= $extra ?>"
                                style="background-image: url('<?= htmlspecialchars($item['photo']) ?>');">
                                <div class="gallery-overlay">
                                    <i class="fa-solid fa-camera"></i>
                                    <span><?= htmlspecialchars($item['title']) ?></span>
                                </div>
                            </div>
                        <?php endforeach;
                    else: ?>
                        <!-- fallback gradients if no photos yet -->
                        <div class="gallery-item gallery-item--tall gallery-g1"></div>
                        <div class="gallery-item gallery-g2"></div>
                        <div class="gallery-item gallery-g3"></div>
                        <div class="gallery-item gallery-item--wide gallery-g4"></div>
                        <div class="gallery-item gallery-g5"></div>
                        <div class="gallery-item gallery-g6"></div>
                    <?php endif; ?>
                </div>

                <div class="section-footer">
                    <a href="gallery.php" class="btn btn-outline-white">View Full Gallery</a>
                </div>
            </div>
        </section>


        <!-- ===================== UPCOMING EVENTS ===================== -->
        <section class="section section--soft" id="events">
            <div class="container">
                <div class="section-header">
                    <span class="section-tag">Don't Miss Out</span>
                    <h2 class="section-title">Upcoming Events</h2>
                    <p class="section-subtitle">From workshops to championships — there is something for every student.
                    </p>
                </div>


                <div class="events-grid">

                    <?php
                    $q = "SELECT e.*, c.name AS category_name, i.name AS institution_name, s.name AS status_name
                    FROM event e
                    INNER JOIN category c ON e.category_id = c.id
                    LEFT JOIN institution i ON e.institution_id = i.id
                    INNER JOIN status s ON e.status = s.id
                    ORDER BY e.id DESC";

                    $events_rs = Database::search($q);

                    for ($e = 0; $e < 3; $e++) {
                        $events_data = $events_rs->fetch_assoc();
                    ?>

                        <article class="event-card">
                            <div class="event-img event-img--cultural">
                                <?php
                                if (!$events_data['banner_img']) {
                                ?><i class="fa-solid fa-bullhorn event-img-icon"></i><?php
                                                                                        } else {
                                                                                            ?>
                                    <img src="uploads/events/<?php echo $events_data['banner_img']; ?>" />
                                <?php
                                                                                        }
                                ?>

                                <span class="event-cat-badge"><?php echo $events_data['category_name']; ?></span>
                                <div class="event-date-pill">
                                    <?php
                                    $date = date("d M", strtotime($events_data['date']));
                                    $day = date("d", strtotime($events_data['date']));
                                    $month = date("M", strtotime($events_data['date']));
                                    ?>
                                    <b><?php echo $day; ?></b><span><?php echo $month; ?></span>
                                </div>
                            </div>
                            <div class="event-body">
                                <div class="event-meta-row">
                                    <span><i class="fa-regular fa-clock"></i> <?php echo $events_data['start_time']; ?> -
                                        <?php echo $events_data['end_time']; ?> </span>
                                    <span><i class="fa-solid fa-location-dot"></i>
                                        <?php echo $events_data['location']; ?></span>
                                </div>
                                <h3 class="event-title"><?php echo $events_data['title']; ?></h3>
                                <p class="event-desc"><?php echo $events_data['description']; ?></p>
                                <div class="event-footer">
                                    <div class="event-capacity">
                                        <div class="capacity-bar">
                                            <div class="capacity-fill" style="width:45%"></div>
                                        </div>
                                        <span class="capacity-label">0 / <?php echo $events_data['capacity']; ?>
                                            spots</span>
                                    </div>
                                    <?php
                                    if (!isset($_SESSION['u'])) {
                                    ?>
                                        <button class="btn btn-primary btn-sm" onclick="gotoLogin();">
                                            Register</button>
                                        <?php
                                    } else {
                                        $register_rs = Database::search("SELECT * FROM `registration` WHERE `student_id`='" . $_SESSION['u']['id'] . "' 
                                        AND `event_id`='" . $events_data['id'] . "' ");
                                        $register_num = $register_rs->num_rows;
                                        if ($register_num == 1) {
                                        ?>
                                            <button class="btn btn-secondary btn-sm"> Registered</button>
                                        <?php
                                        } else {
                                        ?>
                                            <button class="btn btn-primary btn-sm"
                                                onclick="registerEvent(<?php echo $events_data['id']; ?>);">
                                                Register</button>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </article>
                    <?php
                    }
                    ?>



                </div>

                <div class="section-footer">
                    <a href="events.php" class="btn btn-outline-primary">View All Events</a>
                </div>
            </div>
        </section>

        <?php
        if (!isset($_SESSION["u"])) {
        ?>
            <!-- ===================== CTA BANNER ===================== -->
            <section class="cta-section" id="join">
                <div class="cta-bg">
                    <div class="cta-blob cta-blob--1"></div>
                    <div class="cta-blob cta-blob--2"></div>
                    <div class="cta-dots"></div>
                </div>
                <div class="container cta-content">
                    <h2 class="cta-title">Ready to Be Part of Something Bigger?</h2>
                    <p class="cta-subtitle">Join thousands of students who are already discovering events, connecting with
                        clubs, and building memories through CampusHub.</p>
                    <div class="cta-actions">
                        <a href="#" class="btn btn-white btn-lg">
                            <i class="fa-solid fa-user-plus"></i>
                            Create Your Account
                        </a>
                        <a href="#" class="btn btn-outline-white btn-lg">
                            <i class="fa-solid fa-circle-play"></i>
                            Watch How It Works
                        </a>
                    </div>
                </div>
            </section>
        <?php
        }
        ?>


    </main>

    <!-- ===================== FOOTER ===================== -->
    <?php include "footer.php"; ?>

    <script>
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
    </script>
    <script src="js/main.js"></script>

</body>

</html>