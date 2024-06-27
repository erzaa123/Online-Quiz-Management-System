<?php
session_start();
include_once('connection_ashensori.php');

if (isset($_POST['edit'])) {
    $directorId = $_POST['directorId'];
    $name = $_POST['name'];
    $birthYear = $_POST['birthyear'];

    $stmt = $conn->prepare("UPDATE directors SET Name = ?, BirthYear = ? WHERE DirectorId = ?");
    $stmt->bind_param("sss", $name, $birthYear, $directorId);

    if ($stmt->execute()) {
        $_SESSION['success'] = 'Director updated successfully';
    } else {
        $_SESSION['error'] = 'Something went wrong while updating: ' . $stmt->error;
    }
    $stmt->close();
} else {
    $_SESSION['error'] = 'Fill up edit form first';
}

header('location: director.php');
exit();
?>
