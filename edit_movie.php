<?php
session_start();
include_once('connection_ashensori.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
    $id = $_POST['movieId'];
    $title = $_POST['title'];
    $releaseYear = $_POST['releaseYear'];
    $directorId = $_POST['directorId'];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE movies SET title = ?, releaseYear = ?, directorId = ? WHERE movieId = ?");
    $stmt->bind_param("ssii", $title, $releaseYear, $directorId, $id);

    // Execute and check the result
    if ($stmt->execute()) {
        $_SESSION['success'] = 'Movie updated successfully';
    } else {
        $_SESSION['error'] = 'Something went wrong in updating movie: ' . $stmt->error;
    }

    $stmt->close();
} else {
    $_SESSION['error'] = 'Select movie to edit first';
}

// Redirect back to the movie page
header('location: movie.php');
exit();
?>
