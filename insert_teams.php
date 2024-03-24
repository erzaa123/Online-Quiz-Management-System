<?php
// Connect to MySQL database
$conn = mysqli_connect("localhost", "username", "password", "project");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Insert teams into the database
$sql = "INSERT INTO Team (Name) VALUES ('FC Barcelona'), ('Paris')";

if (mysqli_query($conn, $sql)) {
    echo "Teams inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
