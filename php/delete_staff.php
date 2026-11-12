<?php

include 'header.php'; 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dorm_management";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['StaffID'])) {
        $staffID = $_POST['StaffID'];

        if ($staffID == "") {
            die("StaffID is required.");
        }

        $sql = "DELETE FROM Staff WHERE StaffID = ?";

        $stmt = mysqli_prepare($conn, $sql);

        if (!$stmt) {
            die("Prepare failed: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "i", $staffID);

        if (mysqli_stmt_execute($stmt)) {
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "Staff deleted successfully.";
            } else {
                echo "No Staff found with that ID.";
            }
        } else {
            echo "Error deleting staff: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete staff</title>
</head>
<body>

<h2>Delete Staff</h2>

<form method="POST" action="">
    Staff ID:
    <input type="number" name="StaffID" required>
    <br><br>
    <input type="submit" value="Delete Staff">
</form>

</body>
</html>

<?php include 'footer.php'; ?>
