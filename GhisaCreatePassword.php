<?php
session_start();
include("GhisaDB.php");

if(!isset($_SESSION['verification_email'])){
    header("Location: GhisaRegister.php");
    exit();
}

$email = $_SESSION['verification_email'];
$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($password !== $confirm_password){
        $message = "Passwords do not match.";
    } else {

        // Hash password securely
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("UPDATE applicants SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashed_password, $email);
        $stmt->execute();

        // Clear session
        session_destroy();

        header("Location: GhisaLogin.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Password - GHISA</title>
    <link rel="stylesheet" href="GhisaStyle.css">
</head>
<body>

<div class="form-container">
    <h2>Create Your Password</h2>

    <?php if($message != ""){ ?>
        <p style="color:red;"><?php echo $message; ?></p>
    <?php } ?>

    <form method="POST">
        <input type="password" name="password" placeholder="Enter Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <button type="submit">Create Account</button>
    </form>
</div>

</body>
</html>