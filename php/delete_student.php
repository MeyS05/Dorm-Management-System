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

    if (isset($_POST['StudentID'])) {
        $studentID = $_POST['StudentID'];

        if ($studentID == "") {
            die("StudentID is required.");
        }

        $sql = "DELETE FROM Student WHERE StudentID = ?";

        $stmt = mysqli_prepare($conn, $sql);

        if (!$stmt) {
            die("Prepare failed: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "i", $studentID);

        if (mysqli_stmt_execute($stmt)) {
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo "Student deleted successfully.";
            } else {
                echo "No student found with that ID.";
            }
        } else {
            echo "Error deleting student: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    }
}

mysqli_close($conn);

?>

<html>
<head>
    <title>Delete Student</title>
</head>
<body>

<h2>Delete Student</h2>

<form method="POST" action="">
    Student ID:
    <input type="number" name="StudentID" required>
    <br><br>
    <input type="submit" value="Delete Student">
</form>

</body>
</html>

<?php include 'footer.php'; ?>
