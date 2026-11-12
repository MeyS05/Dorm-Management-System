<?php include 'header.php'; ?>

<?php
include "functions.php"; 


$servername = "localhost";
$username = "root";
$password = "";
$db_name = "dorm_management";

$conn = mysqli_connect($servername, $username, $password, $db_name);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $staffID = $_POST["StaffID"];
    $dormName = $_POST["DormName"];

    if($staffID == "" || $dormName == ""){
        die("You need to fill out all fields!.");
    }

    if (needsMoreStaff($conn, $dormName)){
        $sql = "INSERT INTO StaffDormAssignment (StaffID, DormName) VALUES (?, ?)";
        $stmt= mysqli_prepare($conn, $sql);
        if (!$stmt) {
            die("Prepare failed: " . mysqli_error($conn));
        }
        mysqli_stmt_bind_param($stmt, "is", $staffID, $dormName);
        if (mysqli_stmt_execute($stmt)) {
            echo "Staff assigned to dorm successfully!";
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
    }else{
        echo "This Dorm has already 5 staff";
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Assign Staff to Dorm</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<h2>Assign Staff to Dorm</h2>

<form method="post" action="">
    Staff ID: <input type="number" name="StaffID" required><br><br>
    Dorm name: <input type="text" name="DormName" required><br><br>
    <input type="submit" value="Assign Dorm">
</form>

</body>
</html>
<?php include 'footer.php'; ?>