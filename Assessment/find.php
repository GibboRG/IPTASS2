?>
<!DOCTYPE html>
<html>
  <head>
    <title>NAME OF INFORMATION SYSTEM</title>
    <link rel="stylesheet" href="main.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>	
  </head>
  <body>
    <header>    
	  <div><h1><img src="images/books2.png" alt="Books" width="100" height="80">eea</h1></div>
	</header>
	<nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="delivery"></a>
		<ul>
            <li><a href="find.php">Find a delivery</a></li>
			<li><a href="list_all.php">List all delivery</a></li>
            <li><a href="update.php">Update information about a delivery</a></li>
            <li><a href="add.php">Add a new delivery</a></li>
        </ul>
		</li>
	  </ul>
	</nav>
<body>
<h2>Find a delivery</h2>
<h3>Enter the id</h3>
<p>
<form name="display" action="find.php" method="POST" >
id <input type="text" name="id" /><br><br>
<input type="submit" name="submit" />
</form>
<p>
</body>
</html>


<?php

$dbh = pg_connect("host=localhost port=5432 dbname=McDonalds_Delivery_Sheet user=postgres password=password");

$pre_search_string = $_POST[id];

$sql = "SELECT * FROM delivery where id = '$pre_search_string'" ;
$result = pg_query($dbh, $sql);

if (isset($_POST['submit']))
{
	while ($row = pg_fetch_array($result)) {
    echo "<br />";
	echo "ID: " . $row[0] . "<br />";
	echo "Quantity 1: " . $row[1] . "<br />";
	echo "Description 1: " . $row[2] . "<br />";
  echo "Quantity 2: " . $row[3] . "<br />";
	echo "Description 2: " . $row[4] . "<br />";
	echo "Quantity 3: " . $row[5] . "<br />";
  echo "Description 3: " . $row[6] . "<br />";
	echo "Quantity 4: " . $row[7] . "<br />";
	echo "Description 4: " . $row[8] . "<br />";
  echo "Quantity 5: " . $row[9] . "<br />";
  echo "Description 5: " . $row[10] . "<br />";
	}

}

// free memory
pg_free_result($result);

// close connection
pg_close($dbh);
?>
