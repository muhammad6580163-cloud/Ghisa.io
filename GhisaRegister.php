<?php
// GhisaRegister.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>GHISA Registration</title>

<link rel="stylesheet" href="GhisaStyle.css">
<script defer src="GhisaScript.js"></script>
</head>
<body>

<div class="form-container">

<!-- ================= HEADER ================= -->
<h2 style="text-align:center; color:#0b3d91;">
Gujba High Institution Student Association<br>
Registration Form
</h2>

<form action="GhisaProcessRegistration.php" method="POST" enctype="multipart/form-data">

<!-- ================= TOP IMAGES ================= -->
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">

    <!-- Association Logo -->
    <div>
        <!-- INSERT ASSOCIATION LOGO HERE -->
        <!-- <img src="assets/images/logo.png" width="80"> -->
    </div>

    <!-- Passport Preview -->
    <div>
        <img id="photoPreview" src="" style="width:80px; height:80px; display:none; border-radius:6px;">
    </div>

</div>

<!-- ================= PASSPORT UPLOAD ================= -->
<h3>Passport Photograph</h3>

<input type="file" id="passportUpload" name="passport"
accept="image/*" capture="user" required>

<small>You can upload or capture using your phone camera</small>

<br><br>

<!-- ================= PERSONAL INFO ================= -->
<h3>Personal Information</h3>

<div class="form-group">
<input type="text" name="first_name" required placeholder=" ">
<label>First Name</label>
</div>

<div class="form-group">
<input type="text" name="surname" required placeholder=" ">
<label>Surname</label>
</div>

<div class="form-group">
<input type="text" name="middle_name" placeholder=" ">
<label>Middle Name</label>
</div>

<div class="form-group">
<input type="text" name="guardian_name" required placeholder=" ">
<label>Guardian Name</label>
</div>

<div class="form-group">
<select name="gender" required>
<option value="">Gender</option>
<option>Male</option>
<option>Female</option>
</select>
</div>

<div class="form-group">
<input type="date" name="dob" required>
</div>

<div class="form-group">
<select name="marital_status" required>
<option value="">Marital Status</option>
<option>Single</option>
<option>Married</option>
</select>
</div>

<!-- ================= CONTACT INFO ================= -->
<h3>Contact Information</h3>

<div class="form-group">
<input type="text" name="country" required placeholder=" ">
<label>Country</label>
</div>

<div class="form-group">
<input type="text" name="state" required placeholder=" ">
<label>State</label>
</div>

<div class="form-group">
<input type="text" name="lga" required placeholder=" ">
<label>Local Government</label>
</div>

<div class="form-group">
<input type="text" name="res_address" required placeholder=" ">
<label>Residential Address</label>
</div>

<div class="form-group">
<input type="text" name="home_address" required placeholder=" ">
<label>Home Address</label>
</div>

<div class="form-group">
<input type="text" name="ward" required placeholder=" ">
<label>Ward</label>
</div>

<div class="form-group">
<input type="email" name="email" required placeholder=" ">
<label>Email Address</label>
</div>

<div class="form-group">
<input type="text" name="student_phone" required placeholder=" ">
<label>Student Phone</label>
</div>

<div class="form-group">
<input type="text" name="guardian_phone" required placeholder=" ">
<label>Guardian Phone</label>
</div>

<!-- ================= EDUCATION ================= -->
<h3>Student Level</h3>

<select name="level" required>
<option value="">Select Level</option>
<option>Primary School</option>
<option>Secondary School</option>
<option>Senior Secondary</option>
<option>Post Secondary</option>
<option>Tertiary</option>
</select>

<br><br>

<div class="form-group">
<input type="text" name="final_school" required placeholder=" ">
<label>Final School Attended</label>
</div>

<div class="form-group">
<input type="text" name="school_state" required placeholder=" ">
<label>School State</label>
</div>

<!-- ================= RESULT UPLOAD ================= -->
<h3>Upload Admission/Result</h3>

<input type="file" name="result_file" required>

<br><br>

<!-- ================= FUTURE AMBITION ================= -->
<h3>Future Ambition</h3>

<textarea name="ambition" rows="4" required></textarea>

<br><br>

<!-- ================= TERMS ================= -->
<label>
<input type="checkbox" required>
I agree to GHISA terms and conditions
</label>

<br><br>

<button type="submit" class="cta-btn" style="width:100%;">
Submit & Continue to Email Verification
</button>

</form>

</div>

</body>
</html>
