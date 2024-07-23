<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "indie_zaika";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch all menu items
$sql = "SELECT * FROM menu_items";

// Execute the query
$result = $conn->query($sql);

// Store results in an array
$menuItems = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $menuItems[] = $row;
    }
} else {
    echo "No menu items found.";
}

// Encode the array as JSON
$json = json_encode($menuItems);

// Send JSON response
header('Content-Type: application/json');
echo $json;

// Close connection
$conn->close();
?>