
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <style>
     .disclaimer{
         display: none;
     }
 </style>
</head>
<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
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
  
  include 'config.php';
  if (isset($_POST['daftar'])) {
    // Dapatkan ID Otomatis
    $queryGet = mysqli_query($conn, "SELECT max(id_user) as id FROM user");
    $data = mysqli_fetch_array($queryGet);
    $id = $data['id'];
    $urutan = (int) substr($id, 7, 6);
    $urutan++;
    $kode = '4clearn';
    
    // Data yang akan Dikirim
    $id_user = $kode . sprintf("%06s", $urutan);
    $username = $id_user;
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $password = $_POST['password'];
    
    // Query SELECT
    $querySelect = mysqli_query($conn, "SELECT * FROM  user WHERE email_user = '".$email."'");

    if(mysqli_num_rows($querySelect) > 0){
      echo('
          <script>
            swal({
              title: "Gagal Daftar",
              text: "Email anda sudah digunakan !",
              icon: "error"
            }).then(function(){
              document.location.href="../daftar.php?token='.randomString().'";
            });
          </script>');
    } else{
    
    // Query Insert
    $queryPost = mysqli_query($conn,"INSERT INTO user(id_user, email_user, username_user, password_user, nama_user, telepon_user, status_keaktifan_user, level_user) VALUES('".$id_user."', '".$email."', '".$username."', '".base64_encode($password)."', '".$nama."', '".$telepon."', 'Aktif', 'Siswa')");
      
      if($queryPost == 'TRUE'){
        echo('
          <script>
            swal({
              title: "Berhasil Daftar",
              text: "Username anda adalah '.$username.' !",
              icon: "success"
            }).then(function(){
              document.location.href="../masuk.php?token='.randomString().'";
            });
          </script>');
          
      } 
    }
  }
  
?>
</body>