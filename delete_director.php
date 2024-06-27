<?php
session_start();
include_once('connection_ashensori.php');

if (isset($_GET['DirectorId'])) {
    $directorId = $_GET['DirectorId'];
    $stmt = $conn->prepare("DELETE FROM directors WHERE DirectorId = ?");
    $stmt->bind_param("s", $directorId);

    if ($stmt->execute()) {
        $_SESSION['success'] = 'Director deleted successfully';
    } else {
        $_SESSION['error'] = 'Something went wrong while deleting director: ' . $stmt->error;
    }
    $stmt->close();
} else {
    $_SESSION['error'] = 'Select director to delete first';
}

header('location: director.php');
exit();
?>
