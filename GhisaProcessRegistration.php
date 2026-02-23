<?php
session_start();
include("GhisaDB.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // ===============================
    // HANDLE FILE UPLOADS
    // ===============================

    $uploadDir = "uploads/";

    if(!is_dir($uploadDir)){
        mkdir($uploadDir, 0777, true);
    }

    // Passport Upload
    $passportName = time() . "_" . basename($_FILES["passport"]["name"]);
    $passportPath = $uploadDir . $passportName;
    move_uploaded_file($_FILES["passport"]["tmp_name"], $passportPath);

    // Result Upload
    $resultName = time() . "_" . basename($_FILES["result_file"]["name"]);
    $resultPath = $uploadDir . $resultName;
    move_uploaded_file($_FILES["result_file"]["tmp_name"], $resultPath);

    // ===============================
    // GENERATE VERIFICATION CODE
    // ===============================

    $verification_code = rand(10000, 99999);

    // ===============================
    // INSERT INTO DATABASEY
    // ===============================

    $stmt = $conn->prepare("INSERT INTO applicants (
        passport, result_file,
        first_name, surname, middle_name, guardian_name,
        gender, dob, marital_status,
        country, state, lga, res_address, home_address, ward,
        email, student_phone, guardian_phone,
        level, final_school, school_state,
        ambition, verification_code
    ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    $stmt->bind_param(
        "sssssssssssssssssssssss",
        $passportName, $resultName,
        $_POST['first_name'], $_POST['surname'], $_POST['middle_name'], $_POST['guardian_name'],
        $_POST['gender'], $_POST['dob'], $_POST['marital_status'],
        $_POST['country'], $_POST['state'], $_POST['lga'], $_POST['res_address'], $_POST['home_address'], $_POST['ward'],
        $_POST['email'], $_POST['student_phone'], $_POST['guardian_phone'],
        $_POST['level'], $_POST['final_school'], $_POST['school_state'],
        $_POST['ambition'], $verification_code
    );

    $stmt->execute();
if(!$stmt){
    die("Prepare failed: " . $conn->error);
}

if(!$stmt->execute()){
    die("Execute failed: " . $stmt->error);
}
    // Store email & code in session for next step
    $_SESSION['verification_email'] = $_POST['email'];
    $_SESSION['verification_code'] = $verification_code;

    // Redirect to verification page
    header("Location: GhisaVerifyEmail.php");
    exit();
}
?>