<?php
header('Content-Type: application/json');

$servername = "sql12.freesqldatabase.com:3306";
$username = "sql12728588";
$password = "wbrhtUq1KD";
$dbname = "sql12728588";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id']; // Get ID from query parameter

$sql = "DELETE FROM pdf_files WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "File deleted successfully";
} else {
    echo "Error deleting file: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
