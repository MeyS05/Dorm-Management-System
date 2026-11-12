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

$student = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentID = $_POST['StudentID'];

    if ($studentID == "") {
        die("Please enter a Student ID.");
    }

    $sql = "SELECT StudentID, RoomCode, FirstName, LastName, Gender, Email 
            FROM Student 
            WHERE StudentID = ?";

    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "i", $studentID);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $id, $roomCode, $firstName, $lastName, $gender, $email);

    if (mysqli_stmt_fetch($stmt)) {
        $student = [
            "StudentID" => $id,
            "RoomCode"  => $roomCode,
            "FirstName" => $firstName,
            "LastName"  => $lastName,
            "Gender"    => $gender,
            "Email"     => $email
        ];
    } else {
        echo "<p>No student found with ID $studentID</p>";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);

?>

<html>
<head>
    <title>Search Student</title>
</head>
<body>

<h2>Search Student</h2>

<form method="post">
    Student ID: <input type="number" name="StudentID" required>
    <input type="submit" value="Search">
</form>

<?php
if ($student) {
    echo "<h3>Student Info:</h3>";
    echo "Student ID: " . $student['StudentID'] . "<br>";
    echo "First Name: " . $student['FirstName'] . "<br>";
    echo "Last Name: " . $student['LastName'] . "<br>";
    echo "Gender: " . $student['Gender'] . "<br>";
    echo "Email: " . $student['Email'] . "<br>";
    echo "Room Code: " . ($student['RoomCode'] ?? "Not assigned") . "<br>";
}
?>
</body>
</html>

<?php include 'footer.php'; ?>