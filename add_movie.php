<!-- Add movie.php -->
<?php
session_start();
include_once('connection_ashensori.php');

if (isset($_POST['add'])){
    $title = $_POST['title'];
    $releaseYear = $_POST['releaseYear'];
    $directorId = $_POST['directorId'];

    $stmt = $conn->prepare("INSERT INTO movies (Title, ReleaseYear, DirectorId) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $title, $releaseYear, $directorId);

    if ($stmt->execute()) {
        $_SESSION['success'] = 'Movie added successfully';
    } else {
        $_SESSION['error'] = 'Something went wrong while adding: ' . $stmt->error;
    }
    $stmt->close();
} else {
    $_SESSION['error'] = 'Fill up add form first';
}

header('location: movie.php');
exit();
?>
