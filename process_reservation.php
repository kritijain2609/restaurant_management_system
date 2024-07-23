<?php
// Database connection settings
$servername = "localhost"; // Change this if needed
$username = "root"; // Change this if needed
$password = ""; // Change this if needed
$dbname = "indie_zaika"; // Change this if needed

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO reservations (name, email, phone, date, time, guests) VALUES (?, ?, ?, ?, ?, ?)");
if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("sssssi", $name, $email, $phone, $date, $time, $guests);

// Set parameters and execute
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$date = htmlspecialchars($_POST['date']);
$time = htmlspecialchars($_POST['time']);
$guests = htmlspecialchars($_POST['guests']);

if (!$stmt->execute()) {
    die("Execute failed: " . $stmt->error);
}

// Close statement and connection
$stmt->close();
$conn->close();

// Pass data to the success page
header("Location: reservation_success.php?name=$name&email=$email&phone=$phone&date=$date&time=$time&guests=$guests");
exit();
?>
