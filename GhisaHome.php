<?php
// GhisaHome.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GHISA Portal</title>

    <!-- CSS -->
    <link rel="stylesheet" href="GhisaStyle.css">

    <!-- JS -->
    <script defer src="GhisaScript.js"></script>
</head>
<body>

<!-- ================= HEADER ================= -->
<header class="ghisa-header">
    <div class="logo">
        <!-- Insert logo image -->
        <img src="image/GhisaLogo.png" alt="GHISA Logo">
    </div>

    <nav class="nav-menu">
        <a href="GhisaHome.php">Home</a>
        <a href="#">About Us</a>
        <a href="#">Mission & Vision</a>
        <a href="#">Events</a>
        <a href="#">Meetings</a>
        <a href="#">Resources</a>
        <a href="#">Constitution</a>
        <a href="#">Contact</a>
    </nav>

    <div class="auth-buttons">
        <a href="GhisaLogin.php" class="btn">Login</a>
        <a href="GhisaRegister.php" class="btn primary">Sign Up</a>
    </div>
</header>

<!-- ================= HERO BANNER ================= -->
<section class="hero">
    <div class="hero-slider">

        <!-- Slide 1 -->
        <div class="slide">
           <img src="image/001.jpeg" alt="">
            <div class="slide-text">
                This is great movement, empowering youth for leadership.
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="slide">
            <img src="image/Dungus.jpeg" alt="">
            <div class="slide-text">
                Together we build academic excellence and unity.
            </div>
        </div>

    </div>

    <div class="hero-content">
        <h1>Welcome to GHISA</h1>
        <p>Uniting Students for Academic Excellence and Leadership</p>

        <a href="GhisaRegister.php" class="cta-btn">Apply for Registration</a>
        <a href="#" class="cta-btn outline">Explore Mission</a>
    </div>
</section>

<!-- ================= ABOUT ================= -->
<section class="about-ghisa">
    <h2>About GHISA</h2>
    <p>
        GHISA (Gujba High Institution Students Association) is a student-led
        organization focused on academic excellence, leadership development,
        and community engagement.
    </p>
</section>

<!-- ================= SECTIONS ================= -->
<section class="info-links">

    <div class="info-item">
        <img src="image/my logo.jpeg" alt="">
        <span>About Policies Assessors</span>
    </div>

    <div class="info-item">
        <img src="image/my logo.jpeg" alt="">
        <span>About GHISA Staff</span>
    </div>

    <div class="info-item">
        <img src="image/my logo.jpeg" alt="">
        <span>About GHISA Members</span>
    </div>

    <div class="info-item">
        <img src="image/my logo.jpeg" alt="">
        <span>About Developer</span>
    </div>

</section>

<!-- ================= NEWSLETTER ================= -->
<section class="newsletter">
    <h3>Stay Updated with GHISA</h3>
    <form>
        <input type="text" placeholder="Your Name">
        <input type="email" placeholder="Email Address">
        <button type="submit">Subscribe</button>
    </form>
</section>

<!-- ================= FOOTER ================= -->
<footer class="footer">
    <div>
        <p>Email: info@ghisa.org</p>
        <p>Phone: +234 xxx xxx</p>
    </div>

    <div class="socials">
        <a href="#">Facebook</a>
        <a href="#">Instagram</a>
        <a href="#">LinkedIn</a>
    </div>
</footer>

</body>
</html>
