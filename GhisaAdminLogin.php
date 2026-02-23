<?php
session_start();
include("GhisaDB.php");

$message = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM ghisa_admin WHERE username=?");
    $stmt->bind_param("s",$username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $admin = $result->fetch_assoc();

        if(password_verify($password,$admin['password'])){
            $_SESSION['ghisa_admin_id'] = $admin['id'];
            $_SESSION['ghisa_admin_username'] = $admin['username'];

            header("Location: GhisaAdminDashboard.php");
            exit();
        } else {
            $message = "Invalid credentials.";
        }
    } else {
        $message = "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>GHISA Admin Login</title>
<link rel="stylesheet" href="GhisaStyle.css">
</head>
<body>

<div class="form-container">
<h2>Admin Login</h2>

<?php if($message!="") echo "<p style='color:red;'>$message</p>"; ?>

<form method="POST">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit">Login</button>
</form>

</div>

</body>
</html>