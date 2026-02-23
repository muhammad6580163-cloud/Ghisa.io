<?php
session_start();
include("GhisaDB.php");
include("GhisaLogger.php");
ghisa_log($conn, 'member', $user_id, "RSVP for event ID $event_id");

if(!isset($_SESSION['ghisa_user_id'])){
    header("Location: GhisaLogin.php");
    exit();
}

$user_id = $_SESSION['ghisa_user_id'];
$event_id = $_GET['event_id'];

$stmt = $conn->prepare("INSERT INTO ghisa_rsvp (user_id,event_id) VALUES (?,?)");
$stmt->bind_param("ii",$user_id,$event_id);
$stmt->execute();

header("Location: GhisaMemberDashboard.php");
exit();
?>