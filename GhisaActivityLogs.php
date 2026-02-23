<?php
session_start();
if(!isset($_SESSION['ghisa_admin_id'])){
    header("Location: GhisaAdminLogin.php");
    exit();
}

include("GhisaDB.php");
include("layout/header.php");
include("layout/sidebar.php");

$logs = $conn->query("SELECT * FROM ghisa_activity_logs ORDER BY created_at DESC LIMIT 100");
?>

<div class="content">
<h2>System Activity Logs</h2>

<table border="1" cellpadding="8">
<tr>
<th>User Type</th>
<th>User ID</th>
<th>Action</th>
<th>Date</th>
</tr>

<?php while($log = $logs->fetch_assoc()){ ?>
<tr>
<td><?php echo $log['user_type']; ?></td>
<td><?php echo $log['user_id']; ?></td>
<td><?php echo $log['action']; ?></td>
<td><?php echo $log['created_at']; ?></td>
</tr>
<?php } ?>

</table>

</div>

<?php include("layout/footer.php"); ?>