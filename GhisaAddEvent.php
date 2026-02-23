<?php
session_start();
if(!isset($_SESSION['ghisa_admin_id'])){
    header("Location: GhisaAdminLogin.php");
    exit();
}
session_start();
include("GhisaDB.php");
include("GhisaLogger.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $stmt = $conn->prepare("INSERT INTO ghisa_events (title,description,event_date) VALUES (?,?,?)");
    $stmt->bind_param("sss",$_POST['title'],$_POST['description'],$_POST['event_date']);
    $stmt->execute();
    $message="Event Added Successfully!";
    
}
ghisa_log($conn, 'admin', $_SESSION['ghisa_admin_id'], "Created event: ".$_POST['title']);
// Get all approved users
$users = $conn->query("SELECT id FROM applicants WHERE account_status='approved'");

while($u = $users->fetch_assoc()){
    $notify = $conn->prepare("INSERT INTO ghisa_notifications (user_id, message) VALUES (?, ?)");
    $msg = "New Event Added: ".$_POST['title']." scheduled for ".$_POST['event_date'];
    $notify->bind_param("is", $u['id'], $msg);
    $notify->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Event - GHISA</title>
<link rel="stylesheet" href="GhisaStyle.css">
</head>
<body>

<h2>Add New Event</h2>

<?php if(isset($message)) echo "<p>$message</p>"; ?>

<form method="POST">
<input type="text" name="title" placeholder="Event Title" required>
<textarea name="description" placeholder="Event Description" required></textarea>
<input type="date" name="event_date" required>
<button type="submit">Add Event</button>
</form>

</body>
</html>