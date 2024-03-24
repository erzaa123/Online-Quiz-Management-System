<?php
// Connect to MySQL database
$conn = mysqli_connect("localhost", "username", "password", "project");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($player['BirthYear'])) {
    // Access the birth year
    $birthYear = $player['BirthYear'];
} else {
    echo "BirthYear key is not defined in the player array.";
}

echo $player['BirthYear'];
var_dump($player);
$teamName = "FC Barcelona";
$birthYear = 1990;

// Construct the URL with parameters
$url = "http://example.com/display_players.php?teamName=" . urlencode($teamName) . "&birthYear=" . $birthYear;

// Redirect to the URL
header("Location: $url");
exit; // Make sure to exit after redirection


// Retrieve players by birth year
$birthYear = $_GET["BirthYear"]; // Assume the birth year is passed as a parameter
$sql = "SELECT * FROM Player WHERE BirthYear = '$birthYear'";
$result = mysqli_query($conn, $sql);

// Output players
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Player: " . $row['Name'] . ", Number: " . $row['Number'] . "<br>";
    }
} else {
    echo "No players found for the given birth year";
}

// Close connection
mysqli_close($conn);
?>
