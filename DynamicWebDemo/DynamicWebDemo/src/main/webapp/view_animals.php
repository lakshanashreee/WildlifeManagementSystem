<?php
// view_animals.php

// Database connection details
$servername = "localhost";
$username = "root";
$password = "swethaswetha.1@";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch animals
$sql = "SELECT * FROM animals";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Animals | Wildlife Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Animals in the Database</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Species</th>
                <th>Age</th>
                <th>Habitat</th>
                <th>Date Added</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["name"] . "</td>
                            <td>" . $row["species"] . "</td>
                            <td>" . $row["age"] . "</td>
                            <td>" . $row["habitat"] . "</td>
                            <td>" . $row["date_added"] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No animals found</td></tr>";
            }
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
