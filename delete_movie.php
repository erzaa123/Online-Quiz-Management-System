<!--delete movie.php-->
<?php
session_start();
include_once('connection_ashensori.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['MovieId'])) {
    $movieId = $_GET['MovieId'];
    $stmt = $conn->prepare("DELETE FROM movies WHERE MovieId = ?");
    $stmt->bind_param("i", $movieId);

    if ($stmt->execute()) {
        $_SESSION['success'] = 'Movie deleted successfully';
    } else {
        $_SESSION['error'] = 'Something went wrong while deleting Movie: ' . $stmt->error;
    }
    $stmt->close();
} else {
    $_SESSION['error'] = 'Select Movie to delete first';
}

header('location: movie.php');
exit();
?>
