<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['Login_Role'])) {
    header('location: ../Login/login.php'); // Redirect to login page if not logged in
    exit;
}

// Redirect users to the appropriate page based on their role
switch ($_SESSION['Login_Role']) {
    case 'Admin':
        // Allow admin to continue on this page
        break;
    case 'Manager':
        header('location: ManagerHome.php');
        exit;
    case 'Crew':
        header('location: CrewHome.php');
        exit;
    case 'Delivery Driver':
        header('location: DeliveryHome.php');
        exit;
    default:
        header('location: ../Login/login.php'); // Redirect to login page if role is not recognized
        exit;
}

// Your HTML content for the admin home page goes here
?>
