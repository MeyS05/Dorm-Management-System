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
    if (isset($_POST['RoomCode']) && isset($_POST['DormName']) && isset($_POST['Capacity']) && isset($_POST['Floor']) &&
    isset($_POST['RoomType'])) {
        $RoomCode = $_POST['RoomCode'];
        $DormName = $_POST['DormName'];
        $Capacity  = $_POST['Capacity'];
        $floor = $_POST['Floor'];
        $RoomType  = $_POST['RoomType'];

        echo "Room added successfully!<br><br>";
        echo "Room Code: " . $RoomCode . "<br>";
        echo "Dorm Name: " . $DormName . "<br>";
        echo "Capacity: " . $Capacity . "<br>";
        echo "floor: " . $floor . "<br>";
        echo "Room Type: " . $RoomType . "<br>"; 
        
        if ($RoomCode == "" || $DormName == "" || $Capacity == "" || $floor == "" || $RoomType == "") {
            die("Missing required fields: RoomCode, DormName, Capacity, floor and RoomType are required.");
        }

        $sql = "INSERT INTO Room (RoomCode, DormName, Capacity, Floor, RoomType)
            VALUES (?, ?, ?, ?, ?)";
            
        $stmt = mysqli_prepare($conn, $sql);
        
        if (!$stmt) {
            die("Prepare failed: " . mysqli_error($conn));
        }
        
        mysqli_stmt_bind_param($stmt, "ssiis",
            $RoomCode,
            $DormName,
            $Capacity,
            $floor,
            $RoomType
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "Room added successfully!";
        } else {
            echo "Error adding Room: " . mysqli_stmt_error($stmt);
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
    <title>Add  Room</title>
</head>
<body>
<h2>Add Room</h2>

<form method="POST" action="">
    Room Code: <input type="text" name="RoomCode" required><br>
    Dorm Name: <input type="text" name="DormName" required><br>
    Capacity: <input type="text" name="Capacity" required><br>
    Floor: <input type="text" name="Floor" required><br>
    Room Type: <input type="RoomType" name="RoomType" required><br>
    <input type="submit" value="Add Room">
</form>

</body>
</html>

<?php include 'footer.php'; ?>