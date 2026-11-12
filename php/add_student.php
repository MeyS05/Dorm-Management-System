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
    if (isset($_POST['StudentID']) && isset($_POST['RoomCode']) && isset($_POST['FirstName']) &&
    isset($_POST['LastName']) && isset($_POST['Gender']) && isset($_POST['Email'])) {
        $studentID = $_POST['StudentID'];
        $roomCode = !empty($_POST['RoomCode']) ? $_POST['RoomCode'] : NULL;
        $firstName = $_POST['FirstName'];
        $lastName  = $_POST['LastName'];
        $gender    = $_POST['Gender'];
        $email     = $_POST['Email'];

        echo "Student added successfully!<br><br>";
        echo "Student ID: " . $studentID . "<br>";
        echo "Room Code: " . $roomCode . "<br>";
        echo "First Name: " . $firstName . "<br>";
        echo "Last Name: " . $lastName . "<br>";
        echo "Gender: " . $gender . "<br>";
        echo "Email: " . $email . "<br>"; 
        
        if ($studentID == "" || $firstName == "" || $lastName == "" || $gender == "" || $email == "") {
            die("Missing required fields: StudentID, FirstName, LastName, Gender and email are required.");
        }

        $sql = "INSERT INTO Student (StudentID, RoomCode, FirstName, LastName, Gender, Email)
            VALUES (?, ?, ?, ?, ?, ?)";
            
        $stmt = mysqli_prepare($conn, $sql);
        
        if (!$stmt) {
            die("Prepare failed: " . mysqli_error($conn));
        }
        
        mysqli_stmt_bind_param($stmt, "isssss",
            $studentID,
            $roomCode,
            $firstName,
            $lastName,
            $gender,
            $email
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "Student added successfully!";
        } else {
            echo "Error adding student: " . mysqli_stmt_error($stmt);
            echo "<br>MySQL errno: " . mysqli_errno($conn);
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
    <title>Add Student</title>
</head>
<body>

<h2>Add Student</h2>
<form method="POST" action="">
    Student ID: <input type="text" name="StudentID" required><br>
    Room Code: <input type="text" name="RoomCode"><br>
    First Name: <input type="text" name="FirstName" required><br>
    Last Name: <input type="text" name="LastName" required><br>
    Gender: <input type="text" name="Gender" required><br>
    Email: <input type="email" name="Email" required><br>
    <input type="submit" value="Add Student">
</form>

</body>
</html>

<?php include 'footer.php'; ?>
