<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$items = json_decode($_POST['items'], true);
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

// Now you can access the items in an array like this:
foreach ($items as $item) {
    echo "Dish: " . $item['dish'] . "<br>";
    echo "Quantity: " . $item['quantity'] . "<br>";
    echo "Price: " . $item['price'] . "<br><br>";
}
// Get raw POST data

$data = file_get_contents("php://input");
echo "Received data: $data\n";
$order = json_decode($data, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Error decoding JSON: " . json_last_error_msg();
    exit;
}
print_r($order);


// Debugging
if ($order === null) {
    echo "Error decoding JSON: " . json_last_error_msg();
    exit;
}

// Check if all necessary fields are set
if (isset($order['cname'], $order['phone'], $order['caddress'], $order['items'], $order['total_amount'], $order['delivery_charge'])) {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO orders (cname, phone, caddress, items, total_amount, delivery_charge) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssdd", $order['cname'], $order['phone'], $order['caddress'], $order['items'], $order['total_amount'], $order['delivery_charge']);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close the statement
    $stmt->close();
} else {
    echo "Missing fields in order data.";
}
header('Content-Type: application/json');

$order = json_decode(file_get_contents('php://input'), true);

// Your logic to process the order
// For demonstration, let's assume the order is always successful

$response = ['success' => true];
echo json_encode($response);

// Close connection
$conn->close();
?>
