<?php
// add_animal.php

// Database connection details
$servername = "localhost"; // Update if your server is different
$username = "root"; // Update with your MySQL username
$password = "swethaswetha.1@"; // Update with your MySQL password
$dbname = "testdb"; // Update with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO animals (name, species, age, habitat, date_added) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssiss", $name, $species, $age, $habitat, $date_added);

// Set parameters and execute
$name = $_POST['name'];
$species = $_POST['species'];
$age = $_POST['age'];
$habitat = $_POST['habitat'];
$date_added = $_POST['date_added'];<?php
// add_animals.php

// Database connection details
$servername = "localhost"; // Update if your server is different
$username = "root"; // Update with your MySQL username
$password = "swethaswetha.1@"; // Update with your MySQL password
$dbname = "testdb"; // Update with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO animals (name, species, age, habitat, date_added) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssiss", $name, $species, $age, $habitat, $date_added);

// Set parameters and execute
$name = $_POST['name'];
$species = $_POST['species'];
$age = (int)$_POST['age']; // Cast to integer for safety
$habitat = $_POST['habitat'];
$date_added = $_POST['date_added'];

if ($stmt->execute()) {
    // Redirect to a success page or display a success message
    echo "<h2>New animal added successfully!</h2>";
    echo "<a href='animals_add.html'>Add Another Animal</a> | <a href='view_animals.html'>View Animals</a>";
} else {
    echo "<h2>Error: " . $stmt->error . "</h2>";
    echo "<a href='animals_add.html'>Go Back</a>";
}

$stmt->close();
$conn->close();
?>


if ($stmt->execute()) {
    echo "New animal added successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
