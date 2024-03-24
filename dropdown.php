<?php
include ('dbConnection.php');

if(isset($_POST['submit'])){
    $name = $_POST['player_name'];
    // Assuming you have input fields with names 'player_name' and 'team'
    $number = $_POST['number'];
    $birthYear = $_POST['birth_year'];
    $teamId = $_POST['team']; // Assuming 'team' corresponds to 'TeamId'


    // You should validate and sanitize user input before using it in queries to prevent SQL injection attacks
    // For simplicity, this example does not include input validation and sanitization
    $query = mysqli_query($con, "INSERT INTO player (Player_Name, Number, BirthYear, TeamId) VALUES ('$name', '$number', '$birthYear', '$teamId')");

    if($query){
        echo "<script>alert('Player added successfully')</script>";
    } else {
        echo "<script>alert('Error adding player')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Player</title>
</head>
<body>
    <form method="POST">
        <label for="player_name">Player Name:</label>
        <input type="text" id="player_name" name="player_name"><br><br>

        <label for="number">Number:</label>
        <input type="text" id="number" name="number"><br><br>

        <label for="birth_year">Birth Year:</label>
        <input type="text" id="birth_year" name="birth_year"><br><br>

        <label for="team">Select Team:</label>
        <select name="team" id="team">
            <?php
            $teams = mysqli_query($con, "SELECT * FROM team");
            while($t = mysqli_fetch_array($teams)) {
            ?>
            <option value="<?php echo $t['TeamId'] ?>"><?php echo $t['Name']?></option>
            <?php } ?>
        </select>

        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
