<?php

include 'header.php'; 

$conn = mysqli_connect("localhost", "root", "", "dorm_management");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$sql = "SELECT FacilityCode, DormName, FacilityName, Type FROM Facility";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

echo "<h2>All Facilities</h2>";
echo "<table border='1'>";
echo "<tr><th>FacilityCode</th><th>DormName</th><th>FacilityName</th><th>Type</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['FacilityCode'] . "</td>";
    echo "<td>" . $row['DormName'] . "</td>";
    echo "<td>" . $row['FacilityName'] . "</td>";
    echo "<td>" . $row['Type'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);

include 'footer.php';
?>

