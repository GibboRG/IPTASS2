<?php

  $db = pg_connect("host=localhost port=5432 dbname=McDonalds_Delivery_Sheet user=postgres password=password");

  if (isset($_POST['submit']))
  {
    $query = "INSERT INTO delivery VALUES (DEFAULT,'$_POST[QTY_1]', '$_POST[DESC_1]','$_POST[QTY_2]' ,' $_POST[DESC_2]','$_POST[QTY_3]' ,' $_POST[DESC_3]','$_POST[QTY_4]' ,' $_POST[DESC_4]','$_POST[QTY_5]' ,' $_POST[DESC_5]')";

    $result = pg_query($query); 

    if (!$result)
    {
      echo "Insert failed!!";
    } else
    {
      echo "Insert successful;";
    }
  }
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
    <h2>Enter a new Delivery</h2>
    <ul>
      <form name="add" action="add.php" method="POST" >
      <li>Quantity 1:</li><li><input type="text" name="QTY_1" /></li><br/>
        <li>Description 1:</li><li><input type="text" name="DESC_1" /></li><br/>
        <li>Quantity 2:</li><li><input type="text" name="QTY_2" /></li><br/>
        <li>Description 2:</li><li><input type="text" name="DESC_2" /></li><br/>
        <li>Quantity 3:</li><li><input type="text" name="QTY_3" /></li><br/>
        <li>Description 3:</li><li><input type="text" name="DESC_3" /></li><br/>
        <li>Quantity 4:</li><li><input type="text" name="QTY_4" /></li><br/>
        <li>Description 4:</li><li><input type="text" name="DESC_4" /></li><br/>
        <li>Quantity 5:</li><li><input type="text" name="QTY_5" /></li><br/>
        <li>Description 5:</li><li><input type="text" name="DESC_5" /></li><br/>

        <li><input type='submit'  name='submit'/></li>
      </form>
    </ul>
  </body>
</html>
