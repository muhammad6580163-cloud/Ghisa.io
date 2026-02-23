<?php
session_start();
if(!isset($_SESSION['ghisa_user_id'])){
    header("Location: GhisaLogin.php");
    exit();
}

include("GhisaDB.php");
include("layout/header.php");
include("layout/sidebar.php");

$uid = $_SESSION['ghisa_user_id'];

// Mark all as read
$conn->query("UPDATE ghisa_notifications SET is_read=1 WHERE user_id=$uid");

$notifications = $conn->query(
    "SELECT * FROM ghisa_notifications 
     WHERE user_id=$uid 
     ORDER BY created_at DESC"
);
?>

<div class="content">
<h2>Your Notifications</h2>

<?php while($note = $notifications->fetch_assoc()){ ?>
    <div class="stat-card" style="text-align:left;">
        <?php echo $note['message']; ?>
        <br>
        <small><?php echo $note['created_at']; ?></small>
    </div>
<?php } ?>

</div>

<?php include("layout/footer.php"); ?>