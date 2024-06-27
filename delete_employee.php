<?php
session_start();
include_once('connection_ashensori.php');

if (isset($_GET['EmployeeId'])) {
    $employeeId = $_GET['EmployeeId'];
    $stmt = $conn->prepare("DELETE FROM employee WHERE EmployeeId = ?");
    $stmt->bind_param("s", $employeeId);

    if ($stmt->execute()) {
        $_SESSION['success'] = 'employee deleted successfully';
    } else {
        $_SESSION['error'] = 'Something went wrong while deleting employee: ' . $stmt->error;
    }
    $stmt->close();
} else {
    $_SESSION['error'] = 'Select employee to delete first';
}

header('location: employee.php');
exit();
?>
