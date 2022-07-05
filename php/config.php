<?php

  $server = 'localhost';
  $user = 'id18186383_admin';
  $pass = '{5OhYDB?eRVYkS)6';
  $dbname = 'id18186383_aclearn';
  
  $conn = mysqli_connect($server, $user, $pass, $dbname);
  if (!$conn) {
    die('error'.mysqli_error());
  }

?>