<!DOCTYPE html>
<html>
  <head>
    <title>NAME OF INFORMATION SYSTEM</title>
    <link rel="stylesheet" href="main.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>	
  </head>
  <body>
    <header>    
	  <div><h1><img src="images/books2.png" alt="Books" width="100" height="80">Books Database</h1></div>
	</header>
	<nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="#">TABLE_NAME</a>
		<ul>
            <li><a href="find.php">Find a TABLE_NAME</a></li>
			<li><a href="list_all.php">List all TABLE_NAME</a></li>
            <li><a href="update.php">Update information about a TABLE_NAME</a></li>
            <li><a href="add.php">Add a new TABLE_NAME</a></li>
        </ul>
		</li>
	  </ul>
	</nav>
<p>
<h2>Update Information about a TABLE_NAME</h2>
<h3>Enter the PRIMARY_KEY_COLUMN_LABEL Number</h3>
<ul>
<form name="display" action="enter_primarykey.php" method="POST" >
<li>COLUMN_LABEL</li><li><input type="text" name="PRIMARY_KEY_COLUMN" /></li><br>
<li><input type="submit" name="submit" /></li>
</form>
</ul>
</body>
</html>
<?php
$db = pg_connect("host=localhost port=5432 dbname=DATABASE_NAME user=postgres password=password");
$result = pg_query($db, "SELECT * FROM TABLE_NAME where PRIMARY_KEY_COLUMN = '$_POST[PRIMARY_KEY_COLUMN]'");
$row = pg_fetch_assoc($result);

if (isset($_POST['submit']))
{
echo "<ul>
<form name='update' action='enter_primarykey.php' method='POST' >

<li>COLUMN_LABEL</li><li><input type='text' name='PRIMARY_KEY_COLUMN_updated' value='$row[PRIMARY_KEY_COLUMN]' /></li>

<li>COLUMN_LABEL</li><li><input type='text' name='COLUMN_NAME_updated' value='$row[COLUMN_NAME]' /></li>
<li>COLUMN_LABEL</li><li><input type='text' name='COLUMN_NAME_updated' value='$row[COLUMN_NAME]' /></li> 

<li><input type='submit' name='new' /></li>  </form>
</ul>";
}
if (isset($_POST['new']))
{
$result1 = pg_query($db, "UPDATE TABLE_NAME SET COLUMN_NAME = '$_POST[COLUMN_NAME_updated]', 
COLUMN_NAME = '$_POST[COLUMN_NAME_updated]' 
WHERE PRIMARY_KEY_COLUMN= '$_POST[PRIMARY_KEY_COLUMN_updated]'");


if (!$result1)
{
echo "Update failed!!";
} else
{
echo "Update successfull;";

}
}
?>
