<?php
include 'config.php';

$sql = "SELECT * FROM reservations";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>RESERVATION ID</th>
                <th>NAME</th>
                <th>E-MAIL</th>
                <th>PHONE NUMBER</th>
                <th>DATE</th>
                <th>TIME</th>
                <th>GUESTS</th>

            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"]. "</td>
                <td>" . $row["name"]. "</td>
                <td>" . $row["email"]. "</td>
                <td>" . $row["phone"]. "</td>
                <td>" . $row["date"]. "</td>
                <td>" . $row["time"]. "</td>
                <td>" . $row["guests"]. "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
