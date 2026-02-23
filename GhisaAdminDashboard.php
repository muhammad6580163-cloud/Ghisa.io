<?php
session_start();
if(!isset($_SESSION['ghisa_admin_id'])){
    header("Location: GhisaAdminLogin.php");
    exit();
}

include("includes/GhisaDB.php");
include("includes/layout/header.php");
include("layout/sidebar.php");

// Statistics Queries
$totalMembers = $conn->query("SELECT COUNT(*) as total FROM applicants")->fetch_assoc()['total'];
$approvedMembers = $conn->query("SELECT COUNT(*) as total FROM applicants WHERE account_status='approved'")->fetch_assoc()['total'];
$pendingMembers = $conn->query("SELECT COUNT(*) as total FROM applicants WHERE account_status='pending'")->fetch_assoc()['total'];
$rejectedMembers = $conn->query("SELECT COUNT(*) as total FROM applicants WHERE account_status='rejected'")->fetch_assoc()['total'];

$totalEvents = $conn->query("SELECT COUNT(*) as total FROM ghisa_events")->fetch_assoc()['total'];
$totalRSVP = $conn->query("SELECT COUNT(*) as total FROM ghisa_rsvp")->fetch_assoc()['total'];
?>

<div class="content">

<h2>Admin Dashboard Overview</h2>

<div class="stats-grid">

    <div class="stat-card">
        <h3>Total Members</h3>
        <p><?php echo $totalMembers; ?></p>
    </div>

    <div class="stat-card">
        <h3>Approved Members</h3>
        <p><?php echo $approvedMembers; ?></p>
    </div>

    <div class="stat-card">
        <h3>Pending Approvals</h3>
        <p><?php echo $pendingMembers; ?></p>
    </div>

    <div class="stat-card">
        <h3>Rejected Members</h3>
        <p><?php echo $rejectedMembers; ?></p>
    </div>

    <div class="stat-card">
        <h3>Total Events</h3>
        <p><?php echo $totalEvents; ?></p>
    </div>

    <div class="stat-card">
        <h3>Total RSVPs</h3>
        <p><?php echo $totalRSVP; ?></p>
    </div>

</div>

</div>

<?php include("layout/footer.php"); ?>
<!DOCTYPE html>
<html>
<head>
<title>GHISA Admin Dashboard</title>
<link rel="stylesheet" href="GhisaStyle.css">
</head>
<body>

<h2>Welcome Admin: <?php echo $_SESSION['ghisa_admin_username']; ?></h2>

<ul>
<li><a href="GhisaApproveUsers.php">Approve Members</a></li>
<li><a href="GhisaAddEvent.php">Add Event</a></li>
<li><a href="GhisaViewUsers.php">View All Users</a></li>
<li><a href="GhisaAdminLogout.php">Logout</a></li>
</ul>

</body>
</html>