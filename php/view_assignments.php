<?php

include 'header.php'; 

$conn = mysqli_connect("localhost", "root", "", "dorm_management");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$sql = "SELECT StaffID, DormName FROM StaffDormAssignment";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

echo "<h2>The assignments of Staff to Dorms</h2>";
echo "<table border='1'>";
echo "<tr><th>StaffID</th><th>DormName</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['StaffID'] . "</td>";
    echo "<td>" . $row['DormName'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);

include 'footer.php';
?>

