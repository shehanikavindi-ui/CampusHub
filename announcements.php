<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements | CampusHub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" href="assets/favicon.svg" type="image/svg+xml" />
    
</head>
<body>

    <!-- ===================== HEADER ===================== -->
    <?php 
    include "header.php"; 
    ?>
    
        
        <!-- ===================== ANNOUNCEMENTS ===================== -->
        <section class="section section--white" id="announcements">
            <div class="container">
                <div class="section-header">
                    <span class="section-tag">Latest Updates</span>
                    <h2 class="section-title">Announcements</h2>
                    <p class="section-subtitle">Stay informed with the latest news, updates, and notices from CampusHub.</p>
                </div>

                <div class="announcements-grid">

                    <!-- <article class="ann-card ann-card--urgent">
                        <div class="ann-accent"></div>
                        <div class="ann-body">
                            <div class="ann-meta">
                                <span class="ann-badge ann-badge--urgent">
                                    <i class="fa-solid fa-circle-exclamation"></i> Urgent
                                </span>
                                <time class="ann-date">June 15, 2025</time>
                            </div>
                            <h3 class="ann-title">Spring 2025 Semester Registration Now Open</h3>
                            <p class="ann-text">All students are required to complete their semester registration by June 30. Late registrations will incur an additional fee. Visit the student portal to begin your registration process.</p>
                            <a href="#" class="ann-link">Read More <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </article> -->

                    <?php
                    $q = "SELECT a.*, c.name AS category_name, c.color AS category_color, i.name AS institution_name
                        FROM announcements a
                        INNER JOIN category c ON a.category_id = c.id
                        LEFT JOIN institution i ON a.institution_id = i.id
                        ORDER BY a.id DESC";

                    $announcements_rs = Database::search($q);
                    $announcements_num = $announcements_rs->num_rows;

                    for ($a=0; $a < $announcements_num; $a++) { 
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
                                        <i class="fa-solid fa-bullhorn"></i>  <?php echo $announcements_data['category_name']; ?>
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

                
            </div>
        </section>

        <!-- ===================== FOOTER ===================== -->
    <?php include "footer.php"; ?>

    <script>
        /* --- Navbar scroll effect --- */
        const header = document.getElementById('header');
        window.addEventListener('scroll', () => {
            header.classList.toggle('header--scrolled', window.scrollY > 60);
        }, { passive: true });

        /* --- Mobile nav toggle --- */
        const navToggle = document.getElementById('navToggle');
        const navLinks  = document.getElementById('navLinks');
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
        }, { threshold: 0.1 });
        reveals.forEach(el => observer.observe(el));
    </script>

</body>
</html>
