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
  
function randomString($length = 10) {
    $str = "";
    $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str  .= $characters[$rand];
    }
    return $str;
}
  
  
  if (!isset($_SESSION['username_siswa'])) {
    echo '<script>
      swal({
          title: "Gagal Memuat Halaman!",
          text: "Anda Harus Masuk Terlebih Dahulu !",
          icon: "warning"
        }).then(function(){
          window.location.href="../masuk.php?token='.randomString().'";
        });
    </script>';
  }
  
  $id_user = $_SESSION['username_siswa'];
  $queryUser = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '".$id_user."'");
  $resultUser = mysqli_fetch_assoc($queryUser);
 
?>
</body>