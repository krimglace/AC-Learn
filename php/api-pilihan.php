<?php

  session_start();
?>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
  include 'config.php';
  
  $id = $_SESSION['username_siswa'];
  
  $queryCekProfil = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '".$id."'");
  $resCek = mysqli_fetch_assoc($queryCekProfil);
?>

</body>