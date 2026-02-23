<?php if(isset($_SESSION['ghisa_user_id'])){ ?>
    <a href="GhisaNotifications.php" style="color:white; margin-left:15px;">
        🔔 (<?php echo $notification_count; ?>)
    </a>
<?php } ?>
<?php
$notification_count = 0;

if(isset($_SESSION['ghisa_user_id'])){
    include("includes/GhisaDB.php");
    $uid = $_SESSION['ghisa_user_id'];
    $notification_count = $conn->query(
        "SELECT COUNT(*) as total FROM ghisa_notifications 
         WHERE user_id=$uid AND is_read=0"
    )->fetch_assoc()['total'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>GHISA Portal</title>
    <link rel="stylesheet" href="assets/css/GhisaStyle.css">
</head>
<body>

<div class="topbar">
    <div class="topbar-left">
        <strong>GHISA Portal</strong>
    </div>

    <div class="topbar-right">
        <?php if(isset($_SESSION['ghisa_user_name'])){ ?>
            Welcome, <?php echo $_SESSION['ghisa_user_name']; ?>
        <?php } ?>

        <?php if(isset($_SESSION['ghisa_admin_username'])){ ?>
            Admin: <?php echo $_SESSION['ghisa_admin_username']; ?>
        <?php } ?>
    </div>
</div>