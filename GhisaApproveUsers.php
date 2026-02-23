<?php
session_start();
if(!isset($_SESSION['ghisa_admin_id'])){
    header("Location: GhisaAdminLogin.php");
    exit();
}
session_start();
include("GhisaDB.php");
include("GhisaLogger.php");

// OPTIONAL: Later we secure admin login
// For now assume admin can access directly

// Approve user
if(isset($_GET['approve'])){
    $id = $_GET['approve'];

    // Approve user
    $stmt = $conn->prepare("UPDATE applicants SET account_status='approved' WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
     ghisa_log($conn, 'admin', $_SESSION['ghisa_admin_id'], "Approved user ID $id");
    // Create notification
$notify = $conn->prepare("INSERT INTO ghisa_notifications (user_id, message) VALUES (?, ?)");
$msg = "Congratulations! Your GHISA account has been approved. You can now access full features.";
$notify->bind_param("is", $id, $msg);
$notify->execute();

    // Get user email
    $user = $conn->query("SELECT email, first_name FROM applicants WHERE id=$id")->fetch_assoc();

    $to = $user['email'];
    $subject = "GHISA Account Approved";
    $message = "Dear ".$user['first_name'].",\n\nYour GHISA account has been approved. You can now login to the portal.\n\nRegards,\nGHISA Team";
    $headers = "From: info@ghisa.local";

    mail($to, $subject, $message, $headers);

}


// Reject user
if(isset($_GET['reject'])){
    $id = $_GET['reject'];
    $stmt = $conn->prepare("UPDATE applicants SET account_status='rejected' WHERE id=?");
    $stmt->bind_param("i",$id);
    $stmt->execute();
    ghisa_log($conn, 'admin', $_SESSION['ghisa_admin_id'], "Rejected user ID $id");
}

$result = $conn->query("SELECT * FROM applicants ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Approve Members - GHISA</title>
<link rel="stylesheet" href="GhisaStyle.css">
</head>
<body>

<h2>Member Approval Panel</h2>

<table border="1" cellpadding="10">
<tr>
<th>Name</th>
<th>Email</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>
<tr>
<td><?php echo $row['first_name']." ".$row['surname']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['account_status']; ?></td>
<td>
<a href="?approve=<?php echo $row['id']; ?>">Approve</a> |
<a href="?reject=<?php echo $row['id']; ?>">Reject</a>
</td>
</tr>
<?php } ?>

</table>

</body>
</html>