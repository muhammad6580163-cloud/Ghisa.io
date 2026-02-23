<?php
session_start();
session_destroy();
header("Location: GhisaLogin.php");
exit();
?>