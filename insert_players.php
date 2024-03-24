<?php
// Connect to MySQL database
$conn = mysqli_connect("localhost", "username", "password", "project");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve team options from database
$teamOptions = array();
$sql = "SELECT TeamId, Name FROM Team";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $teamOptions[$row['TeamId']] = $row['Name'];
    }
}

// Insert players into the database
$players = array(
    array('Name' => 'Lionel Messi', 'Number' => 30, 'BirthYear' => 1987, 'TeamId' => 1),
    array('Name' => 'Neymar', 'Number' => 10, 'BirthYear' => 1992, 'TeamId' => 2)
);

foreach ($players as $player) {
    $name = $player['Name'];
    $number = $player['Number'];
    $birthYear = $player['BirthYear'];
    $teamId = $player['TeamId'];

    $sql = "INSERT INTO Player (Name, Number, BirthYear, TeamId) VALUES ('$name', '$number', '$birthYear', '$teamId')";

    if (mysqli_query($conn, $sql)) {
        echo "Player $name inserted successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close connection
mysqli_close($conn);
?>
