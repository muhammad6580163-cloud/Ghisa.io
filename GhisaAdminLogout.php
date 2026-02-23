<?php
session_start();
session_destroy();
header("Location: GhisaAdminLogin.php");
exit();
?>