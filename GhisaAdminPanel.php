<?php
session_start();
include("GhisaDB.php");

/* SIMPLE ADMIN LOGIN (change password here) */
$admin_password = "ghisa123";

if(isset($_POST['login'])){
    if($_POST['password'] == $admin_password){
        $_SESSION['admin'] = true;
    } else {
        $error = "Wrong password";
    }
}

if(isset($_GET['logout'])){
    session_destroy();
    header("Location: GhisaAdminPanel.php");
    exit;
}

/* APPROVE USER */
if(isset($_GET['approve'])){
    $id = intval($_GET['approve']);
    $conn->query("UPDATE applicants SET status='accepted' WHERE id=$id");
}

/* REJECT USER */
if(isset($_GET['reject'])){
    $id = intval($_GET['reject']);
    $conn->query("UPDATE applicants SET status='rejected' WHERE id=$id");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>GHISA Admin Panel</title>
<link rel="stylesheet" href="GhisaStyle.css">
</head>
<body>

<div class="form-container">

<h2 style="text-align:center;">GHISA Admin Panel</h2>

<?php if(!isset($_SESSION['admin'])): ?>

<!-- LOGIN FORM -->
<form method="POST">
<input type="password" name="password" placeholder="Admin password" required>
<br><br>
<button name="login">Login</button>
</form>

<?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<?php else: ?>

<a href="?logout=1">Logout</a>

<hr>

<h3>All Applicants</h3>

<table border="1" width="100%" cellpadding="8">
<tr style="background:#0b3d91;color:#fff;">
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Level</th>
<th>Status</th>
<th>View</th>
<th>Action</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM applicants ORDER BY id DESC");

while($row = $result->fetch_assoc()):
?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['first_name']." ".$row['surname']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['student_phone']; ?></td>
<td><?php echo $row['level']; ?></td>
<td><?php echo $row['status']; ?></td>

<td>
<a href="GhisaViewUser.php?id=<?php echo $row['id']; ?>">View</a>
</td>

<td>
<a href="?approve=<?php echo $row['id']; ?>">Approve</a> |
<a href="?reject=<?php echo $row['id']; ?>">Reject</a>
</td>
</tr>

<?php endwhile; ?>

</table>

<?php endif; ?>

</div>
</body>
</html>
