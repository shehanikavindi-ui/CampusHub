<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events | CampusHub</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

    
</head>
<body>

    <!-- ===================== HEADER ===================== -->
    <?php 
    include "header.php"; 
    ?>       
        
        
        <section class="section section--soft" id="events">
            <div class="container">

                <!-- toast -->
                <div class="toast-msg" id="toast-msg" >
                    <i id="toast-icon" class="bi bi-x-circle-fill"></i>
                    <span id="toast-text" class="toast-text"></span>
                </div>

                <div class="section-header">
                    <span class="section-tag">Don't Miss Out</span>
                    <h2 class="section-title">Upcoming Events</h2>
                    <p class="section-subtitle">From workshops to championships — there is something for every student.</p>
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
                $events_num = $events_rs->num_rows;

                
                for ($e=0; $e < $events_num; $e++) { 
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
                                <span><i class="fa-regular fa-clock"></i> <?php echo $events_data['start_time']; ?> - <?php echo $events_data['end_time']; ?> </span>
                                <span><i class="fa-solid fa-location-dot"></i> <?php echo $events_data['location']; ?></span>
                            </div>
                            <h3 class="event-title"><?php echo $events_data['title']; ?></h3>
                            <p class="event-desc"><?php echo $events_data['description']; ?></p>
                            <div class="event-footer">
                                <div class="event-capacity">
                                    <div class="capacity-bar">
                                        <div class="capacity-fill" style="width:45%"></div>
                                    </div>
                                    <span class="capacity-label">0 / <?php echo $events_data['capacity']; ?> spots</span>
                                </div>
                                <?php
                                if (!isset($_SESSION['u'])) {
                                ?>
                                    <button class="btn btn-primary btn-sm" 
                                        onclick="gotoLogin();">
                                        Register</button>
                                <?php
                                } else {
                                    $register_rs = Database::search("SELECT * FROM `registration` WHERE `student_id`='".$_SESSION['u']['id']."' 
                                        AND `event_id`='".$events_data['id']."' ");
                                    $register_num = $register_rs->num_rows;
                                    if ($register_num == 1) {
                                    ?>
                                        <button class="btn btn-secondary btn-sm"> Registered</button>
                                    <?php
                                    }else {
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
            </div>
        </section>

            <!-- ===================== FOOTER ===================== -->
    <?php include "footer.php"; ?>

    <script>

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
    <script src="js/main.js"></script>

</body>
</html>