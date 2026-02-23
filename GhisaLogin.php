<?php
session_start();
include("GhisaDB.php");


$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM applicants WHERE email = ?");
    
    if(!$stmt){
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("s", $email);

    if(!$stmt->execute()){
        die("Execute failed: " . $stmt->error);
    }

    $result = $stmt->get_result();

    if($result->num_rows > 0){

        $user = $result->fetch_assoc();

        if($user['email_verified'] != 1){
            $message = "Please verify your email before logging in.";
        }
        elseif($user['account_status'] != 'approved'){
            $message = "Your account is pending admin approval.";
        }
        elseif(!password_verify($password, $user['password'])){
            $message = "Invalid password.";
        }
        else{
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['first_name'];

            header("Location: GhisaMemberDashboard.php");
            exit();
        }

    } else {
        $message = "No account found with that email.";
    }
}
?>