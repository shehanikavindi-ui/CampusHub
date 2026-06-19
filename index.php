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
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    
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
                    <p class="section-subtitle">Stay informed with the latest news, updates, and notices from CampusHub.</p>
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
                                        <i class="fa-solid fa-bullhorn"></i> <?php echo $announcements_data['category_name']; ?>
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

        <!-- ===================== UPCOMING EVENTS ===================== -->
        <section class="section section--soft" id="events">
            <div class="container">
                <div class="section-header">
                    <span class="section-tag">Don't Miss Out</span>
                    <h2 class="section-title">Upcoming Events</h2>
                    <p class="section-subtitle">From workshops to championships — there is something for every student.</p>
                </div>

                <!-- <div class="events-filter">
                    <button class="filter-btn active">All</button>
                    <button class="filter-btn">Academic</button>
                    <button class="filter-btn">Sports</button>
                    <button class="filter-btn">Cultural</button>
                    <button class="filter-btn">Workshops</button>
                    <button class="filter-btn">Competitions</button>
                </div> -->

                <div class="events-grid">

                    
                    <article class="event-card">
                        <div class="event-img event-img--cultural">
                            <i class="fa-solid fa-masks-theater event-img-icon"></i>
                            <span class="event-cat-badge">Cultural</span>
                            <div class="event-date-pill">
                                <b>25</b><span>Jun</span>
                            </div>
                        </div>
                        <div class="event-body">
                            <div class="event-meta-row">
                                <span><i class="fa-regular fa-clock"></i> 6:00 PM – 10:00 PM</span>
                                <span><i class="fa-solid fa-location-dot"></i> Open Air Theatre</span>
                            </div>
                            <h3 class="event-title">Cultural Festival Night</h3>
                            <p class="event-desc">A vibrant celebration of diversity through performances, art, food, and music from students across all institutions.</p>
                            <div class="event-footer">
                                <div class="event-capacity">
                                    <div class="capacity-bar">
                                        <div class="capacity-fill" style="width:45%"></div>
                                    </div>
                                    <span class="capacity-label">225 / 500 spots</span>
                                </div>
                                <a href="#" class="btn btn-primary btn-sm">Register</a>
                            </div>
                        </div>
                    </article>

                    <article class="event-card">
                        <div class="event-img event-img--workshop">
                            <i class="fa-solid fa-users-gear event-img-icon"></i>
                            <span class="event-cat-badge">Workshop</span>
                            <div class="event-date-pill">
                                <b>05</b><span>Jul</span>
                            </div>
                        </div>
                        <div class="event-body">
                            <div class="event-meta-row">
                                <span><i class="fa-regular fa-clock"></i> 10:00 AM – 1:00 PM</span>
                                <span><i class="fa-solid fa-location-dot"></i> Room 204, Block B</span>
                            </div>
                            <h3 class="event-title">Leadership Workshop Series</h3>
                            <p class="event-desc">Develop essential leadership skills through interactive sessions with experienced mentors, coaches, and peers.</p>
                            <div class="event-footer">
                                <div class="event-capacity">
                                    <div class="capacity-bar">
                                        <div class="capacity-fill" style="width:30%"></div>
                                    </div>
                                    <span class="capacity-label">15 / 50 spots</span>
                                </div>
                                <a href="#" class="btn btn-primary btn-sm">Register</a>
                            </div>
                        </div>
                    </article>

                    <article class="event-card">
                        <div class="event-img event-img--competition">
                            <i class="fa-solid fa-comments event-img-icon"></i>
                            <span class="event-cat-badge">Competition</span>
                            <div class="event-date-pill">
                                <b>12</b><span>Jul</span>
                            </div>
                        </div>
                        <div class="event-body">
                            <div class="event-meta-row">
                                <span><i class="fa-regular fa-clock"></i> 9:00 AM - 6:00 PM</span>
                                <span><i class="fa-solid fa-location-dot"></i> Conference Hall A</span>
                            </div>
                            <h3 class="event-title">Inter-University Debate Championship</h3>
                            <p class="event-desc">Represent your institution in this prestigious annual debate competition with cash prizes and perpetual trophies.</p>
                            <div class="event-footer">
                                <div class="event-capacity">
                                    <div class="capacity-bar">
                                        <div class="capacity-fill" style="width:60%"></div>
                                    </div>
                                    <span class="capacity-label">24 / 40 spots</span>
                                </div>
                                <a href="#" class="btn btn-primary btn-sm">Register</a>
                            </div>
                        </div>
                    </article>

                    <article class="event-card">
                        <div class="event-img event-img--sports">
                            <i class="fa-solid fa-person-running event-img-icon"></i>
                            <span class="event-cat-badge">Sports</span>
                            <div class="event-date-pill">
                                <b>18</b><span>Jul</span>
                            </div>
                        </div>
                        <div class="event-body">
                            <div class="event-meta-row">
                                <span><i class="fa-regular fa-clock"></i> 7:00 AM – 5:00 PM</span>
                                <span><i class="fa-solid fa-location-dot"></i> Sports Complex</span>
                            </div>
                            <h3 class="event-title">Annual Sports Day 2025</h3>
                            <p class="event-desc">Compete in track & field, team sports, and individual events. Win for your faculty and claim the championship shield.</p>
                            <div class="event-footer">
                                <div class="event-capacity">
                                    <div class="capacity-bar capacity-bar--full">
                                        <div class="capacity-fill" style="width:92%"></div>
                                    </div>
                                    <span class="capacity-label">460 / 500 spots</span>
                                </div>
                                <a href="#" class="btn btn-secondary btn-sm">Waitlist</a>
                            </div>
                        </div>
                    </article>

                    <article class="event-card">
                        <div class="event-img event-img--academic">
                            <i class="fa-solid fa-microscope event-img-icon"></i>
                            <span class="event-cat-badge">Academic</span>
                            <div class="event-date-pill">
                                <b>22</b><span>Jul</span>
                            </div>
                        </div>
                        <div class="event-body">
                            <div class="event-meta-row">
                                <span><i class="fa-regular fa-clock"></i> 2:00 PM – 5:00 PM</span>
                                <span><i class="fa-solid fa-location-dot"></i> Library Hall</span>
                            </div>
                            <h3 class="event-title">Research Symposium & Poster Presentation</h3>
                            <p class="event-desc">Showcase your research and receive expert feedback from faculty and industry professionals at this annual academic showcase.</p>
                            <div class="event-footer">
                                <div class="event-capacity">
                                    <div class="capacity-bar">
                                        <div class="capacity-fill" style="width:20%"></div>
                                    </div>
                                    <span class="capacity-label">10 / 50 spots</span>
                                </div>
                                <a href="#" class="btn btn-primary btn-sm">Register</a>
                            </div>
                        </div>
                    </article>

                </div>

                <div class="section-footer">
                    <a href="#" class="btn btn-outline-primary">View All Events</a>
                </div>
            </div>
        </section>

        <!-- ===================== CLUBS & SOCIETIES ===================== -->
        <!-- <section class="section section--white" id="clubs">
            <div class="container">
                <div class="section-header">
                    <span class="section-tag">Get Involved</span>
                    <h2 class="section-title">Clubs &amp; Societies</h2>
                    <p class="section-subtitle">Find your tribe. Join a community that shares your passions.</p>
                </div>

                <div class="clubs-grid">

                    <div class="club-card">
                        <div class="club-icon club-icon--tech">
                            <i class="fa-solid fa-microchip"></i>
                        </div>
                        <div class="club-info">
                            <h3 class="club-name">Tech Society</h3>
                            <p class="club-desc">Explore coding, AI, robotics, and emerging tech through hackathons, workshops, and industry visits.</p>
                            <div class="club-stats">
                                <span><i class="fa-solid fa-users"></i> 342 Members</span>
                                <span><i class="fa-solid fa-calendar-check"></i> 24 Events/yr</span>
                            </div>
                        </div>
                        <a href="#" class="club-join">Join <i class="fa-solid fa-arrow-right"></i></a>
                    </div>

                    <div class="club-card">
                        <div class="club-icon club-icon--arts">
                            <i class="fa-solid fa-palette"></i>
                        </div>
                        <div class="club-info">
                            <h3 class="club-name">Drama &amp; Arts Society</h3>
                            <p class="club-desc">Express yourself through theatre, visual arts, and creative performances. All skill levels are warmly welcome.</p>
                            <div class="club-stats">
                                <span><i class="fa-solid fa-users"></i> 210 Members</span>
                                <span><i class="fa-solid fa-calendar-check"></i> 18 Events/yr</span>
                            </div>
                        </div>
                        <a href="#" class="club-join">Join <i class="fa-solid fa-arrow-right"></i></a>
                    </div>

                    <div class="club-card">
                        <div class="club-icon club-icon--photo">
                            <i class="fa-solid fa-camera"></i>
                        </div>
                        <div class="club-info">
                            <h3 class="club-name">Photography Club</h3>
                            <p class="club-desc">Capture the world through your lens. Weekly photo walks, editing tutorials, and annual exhibitions.</p>
                            <div class="club-stats">
                                <span><i class="fa-solid fa-users"></i> 178 Members</span>
                                <span><i class="fa-solid fa-calendar-check"></i> 30 Events/yr</span>
                            </div>
                        </div>
                        <a href="#" class="club-join">Join <i class="fa-solid fa-arrow-right"></i></a>
                    </div>

                    <div class="club-card">
                        <div class="club-icon club-icon--sports">
                            <i class="fa-solid fa-futbol"></i>
                        </div>
                        <div class="club-info">
                            <h3 class="club-name">Sports Federation</h3>
                            <p class="club-desc">Compete and train across multiple sports disciplines, representing the university at inter-institutional championships.</p>
                            <div class="club-stats">
                                <span><i class="fa-solid fa-users"></i> 520 Members</span>
                                <span><i class="fa-solid fa-calendar-check"></i> 40 Events/yr</span>
                            </div>
                        </div>
                        <a href="#" class="club-join">Join <i class="fa-solid fa-arrow-right"></i></a>
                    </div>

                    <div class="club-card">
                        <div class="club-icon club-icon--debate">
                            <i class="fa-solid fa-comments"></i>
                        </div>
                        <div class="club-info">
                            <h3 class="club-name">Debate &amp; Oratory</h3>
                            <p class="club-desc">Sharpen critical thinking and public speaking through competitive debates, MUN conferences, and training camps.</p>
                            <div class="club-stats">
                                <span><i class="fa-solid fa-users"></i> 145 Members</span>
                                <span><i class="fa-solid fa-calendar-check"></i> 16 Events/yr</span>
                            </div>
                        </div>
                        <a href="#" class="club-join">Join <i class="fa-solid fa-arrow-right"></i></a>
                    </div>

                    <div class="club-card">
                        <div class="club-icon club-icon--music">
                            <i class="fa-solid fa-music"></i>
                        </div>
                        <div class="club-info">
                            <h3 class="club-name">Music Society</h3>
                            <p class="club-desc">From classical to contemporary — perform, collaborate, and create music in a supportive and inclusive community.</p>
                            <div class="club-stats">
                                <span><i class="fa-solid fa-users"></i> 193 Members</span>
                                <span><i class="fa-solid fa-calendar-check"></i> 22 Events/yr</span>
                            </div>
                        </div>
                        <a href="#" class="club-join">Join <i class="fa-solid fa-arrow-right"></i></a>
                    </div>

                </div>

                <div class="section-footer">
                    <a href="#" class="btn btn-outline-primary">Browse All 80+ Clubs</a>
                </div>
            </div>
        </section> -->

        <!-- ===================== GALLERY ===================== -->
        <section class="section section--dark" id="gallery">
            <div class="container">
                <div class="section-header section-header--light">
                    <span class="section-tag section-tag--light">Memories</span>
                    <h2 class="section-title section-title--light">Campus Life Gallery</h2>
                    <p class="section-subtitle section-subtitle--light">A glimpse into the vibrant life on campus — events, faces, and moments.</p>
                </div>

                <div class="gallery-grid">
                    <div class="gallery-item gallery-item--tall gallery-g1">
                        <div class="gallery-overlay">
                            <i class="fa-solid fa-rocket"></i>
                            <span>Tech Innovation Summit</span>
                        </div>
                    </div>
                    <div class="gallery-item gallery-g2">
                        <div class="gallery-overlay">
                            <i class="fa-solid fa-masks-theater"></i>
                            <span>Cultural Festival Night</span>
                        </div>
                    </div>
                    <div class="gallery-item gallery-g3">
                        <div class="gallery-overlay">
                            <i class="fa-solid fa-person-running"></i>
                            <span>Annual Sports Day</span>
                        </div>
                    </div>
                    <div class="gallery-item gallery-item--wide gallery-g4">
                        <div class="gallery-overlay">
                            <i class="fa-solid fa-camera"></i>
                            <span>Photography Exhibition</span>
                        </div>
                    </div>
                    <div class="gallery-item gallery-g5">
                        <div class="gallery-overlay">
                            <i class="fa-solid fa-users-gear"></i>
                            <span>Leadership Workshop</span>
                        </div>
                    </div>
                    <div class="gallery-item gallery-g6">
                        <div class="gallery-overlay">
                            <i class="fa-solid fa-comments"></i>
                            <span>Debate Championship</span>
                        </div>
                    </div>
                </div>

                <div class="section-footer">
                    <a href="#" class="btn btn-outline-white">View Full Gallery</a>
                </div>
            </div>
        </section>

        <!-- ===================== TESTIMONIALS ===================== -->
        <section class="section section--soft" id="testimonials">
            <div class="container">
                <div class="section-header">
                    <span class="section-tag">Student Voices</span>
                    <h2 class="section-title">What Students Say</h2>
                    <p class="section-subtitle">Real experiences from students across our partner institutions.</p>
                </div>

                <div class="testimonials-grid">

                    <div class="testi-card">
                        <div class="testi-quote">&ldquo;</div>
                        <p class="testi-text">CampusHub completely changed how I experience university life. I found my debate team, registered for workshops, and made friends across faculties — all in one place.</p>
                        <div class="testi-author">
                            <div class="testi-avatar testi-avatar--1">AK</div>
                            <div>
                                <p class="testi-name">Aisha Khan</p>
                                <p class="testi-role">2nd Year, Law &middot; University of Sunway</p>
                            </div>
                        </div>
                    </div>

                    <div class="testi-card testi-card--featured">
                        <div class="testi-quote">&ldquo;</div>
                        <p class="testi-text">As a club president, managing registrations used to be a nightmare. With CampusHub's admin tools, it's completely seamless. Our event turnout has tripled since we started using it.</p>
                        <div class="testi-author">
                            <div class="testi-avatar testi-avatar--2">MR</div>
                            <div>
                                <p class="testi-name">Marcus Raj</p>
                                <p class="testi-role">President, Tech Society &middot; MMU</p>
                            </div>
                        </div>
                    </div>

                    <div class="testi-card">
                        <div class="testi-quote">&ldquo;</div>
                        <p class="testi-text">I never knew there were so many events happening on campus until I found CampusHub. The notifications keep me updated and I haven't missed a single event I cared about.</p>
                        <div class="testi-author">
                            <div class="testi-avatar testi-avatar--3">SP</div>
                            <div>
                                <p class="testi-name">Sara Priya</p>
                                <p class="testi-role">3rd Year, Engineering &middot; UTP</p>
                            </div>
                        </div>
                    </div>

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
                    <p class="cta-subtitle">Join thousands of students who are already discovering events, connecting with clubs, and building memories through CampusHub.</p>
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

</body>

</html>