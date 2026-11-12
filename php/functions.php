<?php

function needsMoreStaff($conn, $dormName) {
    $sql = "SELECT COUNT(*) FROM StaffDormAssignment WHERE DormName = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $dormName);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    return $count < 5; 
}


 ?>
