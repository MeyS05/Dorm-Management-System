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
    if (isset($_POST['StaffID']) && isset($_POST['FirstName']) && isset($_POST['LastName']) && isset($_POST['Role']) &&
    isset($_POST['Email'])) {
        $staffID = $_POST['StaffID'];
        $firstname = $_POST['FirstName'];
        $lastname  = $_POST['LastName'];
        $role = $_POST['Role'];
        $email  = $_POST['Email'];

        echo "Staff added successfully!<br><br>";
        echo "Staff ID: " . $staffID . "<br>";
        echo "First Name: " . $firstname . "<br>";
        echo "Last Name: " . $lastname . "<br>";
        echo "Role: " . $role . "<br>";
        echo "Email: " . $email . "<br>"; 
        
        if ($staffID == "" || $firstname == "" || $lastname == "" || $role == "" || $email == "") {
            die("Missing required fields: StaffID, FirstName, LastName, Role and Email are required.");
        }

        $sql = "INSERT INTO Staff (StaffID, FirstName, LastName, Role, Email)
            VALUES (?, ?, ?, ?, ?)";
            
        $stmt = mysqli_prepare($conn, $sql);
        
        if (!$stmt) {
            die("Prepare failed: " . mysqli_error($conn));
        }
        
        mysqli_stmt_bind_param($stmt, "issss",
            $staffID,
            $firstname,
            $lastname,
            $role,
            $email
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "Staff added successfully!";
        } else {
            echo "Error adding Staff: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
        
    } else {
        die("Form data not received correctly.");
    }
}

mysqli_close($conn);
?>
<html>
<head>
    <title>Add Staff</title>
</head>
<body>
<h2>Add Staff</h2>

<form method="POST" action="">
    Staff ID: <input type="text" name="StaffID" required><br>
    First Name: <input type="text" name="FirstName" required><br>
    Last Name: <input type="text" name="LastName" required><br>
    Role: <input type="text" name="Role" required><br>
    Email: <input type="email" name="Email"><br>
    <input type="submit" value="Add Staff">
</form>

</body>
</html>

<?php include 'footer.php'; ?>