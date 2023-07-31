

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
  <head>
    <title>Change later</title>
    <link rel="stylesheet" href="main.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	
  </head>
  <body>
    <header>    
	  <div><h1><img src="images/books2.png" alt="Books" width="100" height="80">Books Database</h1></div>
	</header>

	<nav>
      <ul>
        <li><a href="Home.html">Home</a></li>
        <li><a href="#">Delivery</a>
		<ul>
            <li><a href="find.php">Find a Delivery</a></li>
			<li><a href="list_all.php">List all Delivery</a></li>
            <li><a href="update.php">Update information about a Delivery</a></li>
            <li><a href="add.php">Add a new Delivery</a></li>
        </ul>
		</li>

	  </ul>
	</nav>
</body>
</html>
<?php
// attempt a connection
$dbh = pg_connect("host=localhost port=5432 dbname=McDonalds_Delivery_Sheet user=postgres password=password");

if (!$dbh) {
    die("Error in connection: " . pg_last_error());
}

// execute query
$sql = "SELECT * FROM public.delivery";
$result = pg_query($dbh, $sql);

if (!$result) {
    die("Error in SQL query: " . pg_last_error());
}

// iterate over result set
// print each row of the array where [0] is the value in column 1 of the table
while ($row = pg_fetch_array($result)) {
    echo "<p>";
    echo "ID: " . $row[0] . "<br />";
    echo "Quantity One: " . $row[1] . "<br />";
	echo "Description One: " . $row[2] . "<br />";
  echo "Quantity Two: " . $row[3] . "<br />";
  echo "Description Two: " . $row[4] . "<br />";
  echo "Quantity Three: " . $row[5] . "<br />";
  echo "Description Three: " . $row[6] . "<br />";
  echo "Quantity Four: " . $row[7] . "<br />";
  echo "Description Four: " . $row[8] . "<br />";
  echo "Quantity Five: " . $row[9] . "<br />";
  echo "Description Five: " . $row[10] . "<br />";
	echo "</p>";
	
}

// free memory
pg_free_result($result);

// close connection
pg_close($dbh);
?>
