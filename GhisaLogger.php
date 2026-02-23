<?php
function ghisa_log($conn, $user_type, $user_id, $action){
    $stmt = $conn->prepare("INSERT INTO ghisa_activity_logs (user_type, user_id, action) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $user_type, $user_id, $action);
    $stmt->execute();
}
?>