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
  
  if (isset($_SESSION['username_siswa'])) {
    
    echo '<script>
      document.location.href="../siswa/index.php?id='.base64_encode($_SESSION['username_siswa']).'";
    </script>';
  } elseif (isset($_SESSION['username_op'])) {
    echo '<script>
      document.location.href="../operator/index.php?id='.base64_encode($_SESSION['username_op']).'";
    </script>';
  }
  
  else{
    
    if(isset($_POST['masuk'])){
      $username = $_POST['username'];
      $password = base64_encode($_POST['password']);
      
      // Query Select
      $query = mysqli_query($conn, "SELECT * FROM user WHERE username_user = '".$username."' AND password_user = '".$password."'");
      $result = mysqli_fetch_assoc($query);
      if(mysqli_num_rows($query) > 0){
        if ($result['level_user'] == 'Operator') {
          $_SESSION['username_op'] = $result['username_user'];
          echo("<script>
            document.location.href='../operator/index.php?id=".base64_encode($result['username_user'])."';
          </script>");
        } elseif ($result['level_user'] == 'Admin') {
        } elseif ($result['level_user'] == 'Guru') {
        } else{
          $_SESSION['username_siswa'] = $result['username_user'];
          echo '<script>
            swal({
                title: "Berhasil Masuk !",
                text: "Anda Masuk Sebagai Siswa !",
                icon: "success"
              }).then(function(){
                document.location.href="../siswa/index.php?id='.base64_encode($result['username_user']).'";
              });
          </script>' ;
        }
      } else{
        echo('
          <script>
            swal({
              title: "Gagal Masuk",
              text: "Username atau Password Anda Salah !",
              icon: "error"
            }).then(function(){
              document.location.href="../masuk.php?token='.base64_encode(random_bytes(16)).'";
            });
          </script>');
      }
    }
    
  }

?>