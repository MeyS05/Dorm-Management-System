<?php

include 'header.php'; 

$conn = mysqli_connect("localhost", "root", "", "dorm_management");
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

$sql = "SELECT StaffID, FirstName, LastName, Role, Email FROM Staff";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

echo "<h2>All Staff</h2>";
echo "<table border='1'>";
echo "<tr><th>StaffID</th><th>FirstName</th><th>LastName</th><th>Role</th><th>Email</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['StaffID'] . "</td>";
    echo "<td>" . $row['FirstName'] . "</td>";
    echo "<td>" . $row['LastName'] . "</td>";
    echo "<td>" . $row['Role'] . "</td>";
    echo "<td>" . $row['Email'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);

include 'footer.php';
?>
