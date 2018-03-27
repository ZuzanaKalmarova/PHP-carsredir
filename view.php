<?php
session_start();
if ( !isset($_SESSION['account'])) {
  die('Not logged in');
}

require_once "pdo.php";

$stmt = $pdo->query("SELECT make, year, mileage FROM autos");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Zuzana autos</title>
</head>
<body>
  <h1>Tracking autos for</h1>
  <?php
   if ( isset($_SESSION['account'])) {
     echo ("<h2>".htmlentities($_SESSION['account'])."</h2>\n");
   }
   if (Isset($_SESSION['success'])){
     echo ('<p style="color: green;">'.htmlentities($_SESSION['success'])."</p>\n");
     unset($_SESSION['success']);
   }
   ?>
  <h3>Automobiles</h3>
  <table border="1">
   <?php
   foreach( $rows as $row) {
     echo "<tr><td>";
     echo ($row['make']);
     echo ("</td><td>");
     echo ($row['year']);
     echo ("</td><td>");
     echo ($row['mileage']);
     echo ("</td></tr>\n");
   }
  ?>
  <p>
    <a href="add.php">Add new</a>
    |
    <a href="logout.php">Logout</a>
  </p>
</body>
</html>
