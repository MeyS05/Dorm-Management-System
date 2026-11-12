
<?php include 'header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Dorm Management System</title>

</head>
<body>
    <h1>Welcome to Dorm Management System</h1>

<section>
    <h2>Students</h2>
    <ul>
        <li><a href="add_student.php">Add Student</a></li>
        <li><a href="delete_student.php">Delete Student</a></li>
        <li><a href="search_student.php">Search Student</a></li>
        <li><a href="assign_student.php">Assign Student to Room</a></li>
        <li><a href="view_students.php">View All Students</a></li>
    </ul>
</section>

<section>
    <h2>Staff</h2>
    <ul>
        <li><a href="add_staff.php">Add Staff</a></li>
        <li><a href="delete_staff.php">Delete Staff</a></li>
        <li><a href="view_staff.php">View All Staff</a></li>
        <li><a href="assign_staff.php">Assign Staff to Dorm</a></li>
    </ul>
</section>

<section>
    <h2>Rooms and Dorms</h2>
    <ul>
        <li><a href="add_room.php">Add a Room</a></li>
        <li><a href="view_rooms.php">View All Rooms</a></li>
        <li><a href="view_dorms.php">View Dorms</a></li>
    </ul>
</section>

<section>
    <h2>Facilities</h2>
    <ul>
        <li><a href="view_facilities.php">View Facilities</a></li>
    </ul>
</section>

<section>
    <h2>Assignments Overview</h2>
    <ul>
        <li><a href="view_assignments.php">View All Assignments</a></li>
    </ul>
</section>

</body>
</html>

<?php include 'footer.php'; ?>
