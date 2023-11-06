<?php
$host = 'localhost'; // Change this to your database host if it's different
$username = 'your_username'; // Replace with your database username
$password = 'your_password'; // Replace with your database password
$database = 'name_checker';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to check if a name exists in the database
function checkName($name, $conn) {
    $name = mysqli_real_escape_string($conn, $name);
    $query = "SELECT * FROM names WHERE name='$name'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        return true; // Name found in the database
    } else {
        return false; // Name not found in the database
    }
}

if (isset($_POST['submit'])) {
    $nameToCheck = $_POST['name'];
    $nameExists = checkName($nameToCheck, $conn);

    if ($nameExists) {
        echo "Name '$nameToCheck' is present in the database.";
    } else {
        echo "Name '$nameToCheck' is not found in the database.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Name Checker</title>
</head>
<body>
    <h1>Check if a Name is in the Database</h1>
    <form method="POST" action="">
        <label for="name">Enter a name: </label>
        <input type="text" name="name" required>
        <input type="submit" name="submit" value="Check">
    </form>
</body>
</html>
