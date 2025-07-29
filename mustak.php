<!DOCTYPE html>
<html>
<head>
    <title>User Data Collection</title>
</head>
<body>

<h2>Enter User Information</h2>
<form method="post" enctype="multipart/form-data">
    Name: <input type="text" name="name" required><br>
    Age: <input type="number" name="age" required><br>
    Country: <input type="text" name="country" required><br>
    Degree: <input type="text" name="degree" required><br>
    Upload File 1: <input type="file" name="userfile1" required><br>
    Upload File 2: <input type="file" name="userfile2" required><br>
    <input type="submit" value="Submit">
</form>

<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// MySQL Configuration
$servername = "192.168.0.156";
$username = "udc143";
$password = "Root@143";
$dbname = "udc";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form inputs
    $name = $conn->real_escape_string($_POST["name"]);
    $age = (int) $_POST["age"];
    $country = $conn->real_escape_string($_POST["country"]);
    $degree = $conn->real_escape_string($_POST["degree"]);

    // Insert data into database
    $sql = "INSERT INTO users (name, age, country, degree)
            VALUES ('$name', $age, '$country', '$degree')";

    if ($conn->query($sql) === TRUE) {
        echo "✅ User data has been successfully stored.<br>";
    } else {
        echo "❌ Error inserting data: " . $conn->error . "<br>";
    }

    // File upload logic
    $uploadDir = '/var/udc/uploads/';
    $files = ['userfile1', 'userfile2'];

    foreach ($files as $fileKey) {
        $uploadFile = $uploadDir . basename($_FILES[$fileKey]['name']);

        if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], $uploadFile)) {
            echo "✅ " . htmlspecialchars($_FILES[$fileKey]['name']) . " upload successfully.<br>";
        } else {
            echo "❌ Upload failed for " . htmlspecialchars($_FILES[$fileKey]['name']) . "<br>";
        }
    }
}

$conn->close();
?>

</body>
</html>
