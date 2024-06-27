<?php
session_start();
include_once('connection_ashensori.php');

if (isset($_POST['edit'])) {
    $employeeId = $_POST['employeeId'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];

    $stmt = $conn->prepare("UPDATE employee SET Name = ?, Surname = ? WHERE EmployeeId = ?");
    $stmt->bind_param("sss", $name, $surname, $employeeId);

    if ($stmt->execute()) {
        $_SESSION['success'] = 'employee updated successfully';
    } else {
        $_SESSION['error'] = 'Something went wrong while updating: ' . $stmt->error;
    }
    $stmt->close();
} else {
    $_SESSION['error'] = 'Fill up edit form first';
}

header('location: employee.php');
exit();
?>
