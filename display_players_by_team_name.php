<?php
// Connect to MySQL database
$conn = mysqli_connect("localhost", "username", "password", "project");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($team['Team']['Name'])) {
    $teamName = $team['Team']['Name'];
} else {
    $teamName = 'Unknown';
}

if (isset($_GET['teamName'])) {
    $teamName = $_GET['teamName'];
    // Further processing using $teamName
} else {
    echo "Team name parameter is missing in the URL.";
}



// Retrieve players by team name
$teamName = $_GET['teamName']; // Assume the team name is passed as a parameter
$sql = "SELECT Player.Name, Player.Number FROM Player INNER JOIN Team ON Player.TeamId = Team.TeamId WHERE Team.Name = '$teamName'";
$result = mysqli_query($conn, $sql);

// Output players
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Player: " . $row['Name'] . ", Number: " . $row['Number'] . "<br>";
    }
} else {
    echo "No players found for the given team name";
}

// Close connection
mysqli_close($conn);
?>
<script>
var teamName = "FC Barcelona";
var url = "http://localhost/exam/display_players_by_team_name.php?teamName=" + encodeURIComponent(teamName);
</script>