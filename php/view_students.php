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

$sql = "SELECT StudentID, RoomCode, FirstName, LastName, Gender, Email FROM Student";
$result = mysqli_query($conn, $sql);

echo "<h2>All Students</h2>";
echo "<table border='1'>";
echo "<tr><th>StudentID</th><th>RoomCode</th><th>FirstName</th><th>LastName</th><th>Gender</th><th>Email</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['StudentID'] . "</td>";
    echo "<td>" . $row['RoomCode'] . "</td>";
    echo "<td>" . $row['FirstName'] . "</td>";
    echo "<td>" . $row['LastName'] . "</td>";
    echo "<td>" . $row['Gender'] . "</td>";
    echo "<td>" . $row['Email'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);

include 'footer.php';
?>
