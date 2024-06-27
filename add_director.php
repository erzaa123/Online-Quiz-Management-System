<?php
session_start();
include_once('connection_ashensori.php');

if (isset($_POST['add'])) {
    $directorId = $_POST['directorId'];
    $name = $_POST['name'];
    $birthYear = $_POST['birthyear'];

    $stmt = $conn->prepare("INSERT INTO directors (DirectorId, Name, BirthYear) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $directorId, $name, $birthYear);

    if ($stmt->execute()) {
        $_SESSION['success'] = 'Director added successfully';
    } else {
        $_SESSION['error'] = 'Something went wrong while adding: ' . $stmt->error;
    }
    $stmt->close();
} else {
    $_SESSION['error'] = 'Fill up add form first';
}

header('location: director.php');
exit();
?>
