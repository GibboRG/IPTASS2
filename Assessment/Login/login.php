<!DOCTYPE html>
<html>
<head>
  <title>Login - McDonald's Delivery</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<h2>Enter Name and Role</h2>
<form name="login" action="login.php" method="POST">
  Name: <input type="text" name="Login_FName" required /><br><br>
  Role: <input type="text" name="Login_Role" required /><br><br>
  <input type="submit" name="submit" />
</form>

<?php
session_start(); // Start the session

if (isset($_POST['submit'])) {
    $dbh = pg_connect("host=localhost port=5432 dbname=McDonalds_Delivery_Sheet user=postgres password=password");
    $name = pg_escape_string($_POST['Login_FName']);
    $role = pg_escape_string($_POST['Login_Role']);

    $sql = "SELECT * FROM ulogin WHERE login_fname = '$name' AND login_role = '$role'";
    $result = pg_query($dbh, $sql);

    if ($row = pg_fetch_array($result)) {
        $_SESSION['Login_FName'] = $name; // Storing user's name in session
        $_SESSION['Login_Role'] = $role; // Storing user's role in session

        switch ($role) {
            case 'Manager':
                header('location: ../HomePages/ManagerHome.php');
                break;
            case 'Crew':
                header('location: ../HomePages/CrewHome.php');
                break;
            case 'Delivery Driver': // Updated the role value
                header('location: ../HomePages/DeliveryHome.php');
                break;
            case 'Admin':
                header('location: ../HomePages/AdminHome.php');
                break;
        }
    } else {
        echo "<br />";
        echo "Incorrect Name or Role. Please try again!";
        echo "<br />";
    }

    pg_free_result($result);
    pg_close($dbh);
}
?>
</body>
</html>
