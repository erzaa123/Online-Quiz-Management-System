<?php
// Connect to MySQL database
$conn = mysqli_connect("localhost", "username", "password", "project");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Update team information
$newName = "New Team Name";
$teamId = 1; // Assuming you want to update the team with TeamId = 
