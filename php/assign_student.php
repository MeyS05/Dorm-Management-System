<?php

include 'header.php'; 

echo "<h1>Assign Student to Room</h1>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dorm_management";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentID = $_POST['StudentID'];
    $roomCode  = $_POST['RoomCode'];

    if ($studentID == "" || $roomCode == "") {
        die("All fields must be filled.");
    }

    $sql = "UPDATE Student SET RoomCode = ? WHERE StudentID = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "si", $roomCode, $studentID);
    if (mysqli_stmt_execute($stmt)) {
        echo "<p>Room assigned successfully!</p>";
    } else {
        echo "<p>Error: " . mysqli_stmt_error($stmt) . "</p>";
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);

?>
<html>
<head>
    <title>Assign Student to Room</title>
</head>
<body>

<h2>Assign Student</h2>

<form method="post">
    Student ID: <input type="number" name="StudentID" required><br><br>
    Room Code: <input type="text" name="RoomCode" required><br><br>
    <input type="submit" value="Assign Room">
</form>

</body>
</html>

<?php include 'footer.php'; ?>
