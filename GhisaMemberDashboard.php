<?php
session_start();
if(!isset($_SESSION['ghisa_user_id'])){
    header("Location: GhisaLogin.php");
    exit();
}
include("GhisaDB.php");
include("layout/header.php");
include("layout/sidebar.php");
?><?php include("layout/footer.php"); ?>

<div class="content">

<h2>Member Dashboard</h2>
<p>Welcome to GHISA modern portal system.</p>

</div>


<!DOCTYPE html>
<html>
<head>
    <title>GHISA Member Dashboard</title>
    <link rel="stylesheet" href="GhisaStyle.css">
</head>
<body>

<!-- Header -->
<div class="dashboard-header">
    <div class="logo">GHISA Portal</div>

    <div class="nav-links">
        <a href="GhisaMemberDashboard.php">Home</a>
        <a href="#">Events</a>
        <a href="#">Meetings</a>
        <a href="#">Resources</a>
        <a href="GhisaLogout.php">Logout</a>
    </div>
</div>

<!-- Welcome Section -->
<div class="dashboard-container">

    <h2>Welcome, <?php echo htmlspecialchars($user['first_name']); ?>!</h2>
    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>

    <hr>

    <!-- Mission & Vision -->
    <section class="dashboard-section">
        <h3>Our Mission</h3>
        <p>
            To unite and empower students in Gujba Local Government Area to achieve
            academic excellence, foster leadership, and promote community development
            through collaboration and innovation.
        </p>

        <h3>Our Vision</h3>
        <p>
            To create a thriving network of students who support each other in their
            academic journeys and develop leadership skills to drive positive change.
        </p>
    </section>

    <hr>

  <section class="dashboard-section">
<h3>Upcoming Events</h3>

<?php
$events = $conn->query("SELECT * FROM ghisa_events ORDER BY event_date ASC");

while($event = $events->fetch_assoc()){
    echo "<div style='margin-bottom:15px;'>";
    echo "<strong>".$event['title']."</strong><br>";
    echo $event['description']."<br>";
    echo "Date: ".$event['event_date']."<br>";
    echo "<a href='GhisaRSVP.php?event_id=".$event['id']."'>RSVP</a>";
    echo "</div>";
}
?>

</section>

    <hr>

    <!-- Constitution -->
    <section class="dashboard-section">
        <h3>GHISA Constitution</h3>
        <p>
            <a href="uploads/GHISA_Constitution.pdf" target="_blank">
                Read the GHISA Constitution
            </a>
        </p>
    </section>

</div>

</body>
</html>