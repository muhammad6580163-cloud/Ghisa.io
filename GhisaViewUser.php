<?php
session_start();
if(!isset($_SESSION['ghisa_admin_id'])){
    header("Location: GhisaAdminLogin.php");
    exit();
}
session_start();
include("GhisaDB.php");

if(!isset($_SESSION['admin'])){
    header("Location: GhisaAdminPanel.php");
    exit;
}

if(!isset($_GET['id'])){
    echo "No user selected";
    exit;
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM applicants WHERE id=$id");

if($result->num_rows == 0){
    echo "User not found";
    exit;
}

$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>View Applicant</title>
<link rel="stylesheet" href="GhisaStyle.css">
</head>
<body>

<div class="form-container">

<a href="GhisaAdminPanel.php">← Back to Admin</a>

<h2 style="text-align:center;">Applicant Details</h2>

<hr>

<h3>Passport</h3>
<?php if($row['passport']): ?>
<img src="../uploads/<?php echo $row['passport']; ?>" width="120">
<?php endif; ?>

<hr>

<h3>Personal Information</h3>
<p><b>Name:</b> <?php echo $row['first_name']." ".$row['surname']." ".$row['middle_name']; ?></p>
<p><b>Guardian:</b> <?php echo $row['guardian_name']; ?></p>
<p><b>Gender:</b> <?php echo $row['gender']; ?></p>
<p><b>DOB:</b> <?php echo $row['dob']; ?></p>
<p><b>Marital Status:</b> <?php echo $row['marital_status']; ?></p>

<hr>

<h3>Contact Information</h3>
<p><b>Email:</b> <?php echo $row['email']; ?></p>
<p><b>Student Phone:</b> <?php echo $row['student_phone']; ?></p>
<p><b>Guardian Phone:</b> <?php echo $row['guardian_phone']; ?></p>
<p><b>Country:</b> <?php echo $row['country']; ?></p>
<p><b>State:</b> <?php echo $row['state']; ?></p>
<p><b>LGA:</b> <?php echo $row['lga']; ?></p>
<p><b>Residential:</b> <?php echo $row['res_address']; ?></p>
<p><b>Home:</b> <?php echo $row['home_address']; ?></p>
<p><b>Ward:</b> <?php echo $row['ward']; ?></p>

<hr>

<h3>Education</h3>
<p><b>Level:</b> <?php echo $row['level']; ?></p>
<p><b>Final School:</b> <?php echo $row['final_school']; ?></p>
<p><b>School State:</b> <?php echo $row['school_state']; ?></p>

<hr>

<h3>Future Ambition</h3>
<p><?php echo nl2br($row['ambition']); ?></p>

<hr>

<h3>Uploaded Result/Admission</h3>
<?php if($row['result_file']): ?>
<a href="../uploads/<?php echo $row['result_file']; ?>" target="_blank">Download/View Result</a>
<?php endif; ?>

<hr>

<h3>Status: <?php echo $row['status']; ?></h3>

</div>
</body>
</html>
