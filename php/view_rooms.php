<?php

include 'header.php'; 


$conn = mysqli_connect("localhost", "root", "", "dorm_management");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$sql = "SELECT RoomCode, DormName, Capacity, Floor, RoomType FROM Room";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

echo "<h2>All Rooms</h2>";
echo "<table border='1'>";
echo "<tr><th>RoomCode</th><th>DormName</th><th>Capacity</th><th>Floor</th><th>RoomType</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['RoomCode'] . "</td>";
    echo "<td>" . $row['DormName'] . "</td>";
    echo "<td>" . $row['Capacity'] . "</td>";
    echo "<td>" . $row['Floor'] . "</td>";
    echo "<td>" . $row['RoomType'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);

include 'footer.php';
?>

