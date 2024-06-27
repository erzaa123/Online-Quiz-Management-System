<?php
session_start();
include_once('connection_ashensori.php');

if (isset($_POST['add'])) {
    $employeeId = $_POST['employeeId'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];

    $stmt = $conn->prepare("INSERT INTO employee (employeeId, name, surname) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $employeeId, $name, $surname);

    if ($stmt->execute()) {
        $_SESSION['success'] = 'employee added successfully';
    } else {
        $_SESSION['error'] = 'Something went wrong while adding: ' . $stmt->error;
    }
    $stmt->close();
} else {
    $_SESSION['error'] = 'Fill up add form first';
}

header('location: employee.php');
exit();
?>
