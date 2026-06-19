<header class="header" id="header">
    <nav class="nav container">
        <a href="#home" class="nav-logo">
            <span class="nav-logo-icon">&#x2B22;</span>
            Campus<span class="logo-accent">Hub</span>
        </a>
        <ul class="nav-links" id="navLinks">
            <li><a href="#home" class="nav-link active">Home</a></li>
            <li><a href="#events" class="nav-link">Events</a></li>
            <li><a href="#clubs" class="nav-link">Clubs</a></li>
            <li><a href="#gallery" class="nav-link">Gallery</a></li>
            <li><a href="#announcements" class="nav-link">News</a></li>
            <li><a href="#contact" class="nav-link">Contact</a></li>
        </ul>
        <div class="nav-actions">
            <?php
            if(isset($_SESSION["u"])){
            ?>
            <a href="student-profile.php" class="btn btn-primary">My Profile</a>
            <?php
            } else {
            ?>
            <a href="auth/studentLogin.php" class="btn btn-ghost">Sign In</a>
            <a href="auth/studentRegister.php" class="btn btn-primary">Register</a>
            <?php
            }
            ?>
            
        </div>
        <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </nav>
</header>