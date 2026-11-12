<?php

include 'header.php'; 

$conn = mysqli_connect("localhost", "root", "", "dorm_management");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$sql = "SELECT DormName, Location, Capacity, ContactNumber FROM Dorm";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

echo "<h2>All Dorms</h2>";
echo "<table border='1'>";
echo "<tr><th>DormName</th><th>Location</th><th>Capacity</th><th>ContactNumber</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['DormName'] . "</td>";
    echo "<td>" . $row['Location'] . "</td>";
    echo "<td>" . $row['Capacity'] . "</td>";
    echo "<td>" . $row['ContactNumber'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);

include 'footer.php';
?>

