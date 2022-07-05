<?php
include 'php/api-session-homepage.php';
  if($_GET['token'] == ''){
    echo "<script>
      document.location.href='index.php';
    </script>";
  } else{
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

?>
<!doctype html>
<html>
  <head>
    <title>AC-Learn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <style>
      *{
        font-family: arial;
      }
      h1{
        font-size: 200%;
        color: #50AFAB;
      }
      button{
        width: 100%;
        background-color: #FFDB1C;
        color: #50AFAB;
        font-size: 150%;
        border: none;
        border-radius: 25px;
        margin-top: 5%;
      }
      input{
        width: 100%;
        font-size: 100%;
        border: none;
        padding: 2% 5%;
        color: #50AFAB;
        background-color: #ECFCF3;
        margin-bottom: 2.5%;
      }
      a{
        text-decoration: none;
        color: #50AFAB;
      }
      .disclaimer{
          display: none;
      }
    </style>
    
  </head>
  <body>
    <div class="mt-5" style="margin-left: 10%; margin-right: 10%;">
      <h1 class="mt-5 text-center">
        <strong>
          Daftar
        </strong>
      </h1>
      <br>
      <form action="php/api-register.php" method="post">
        <label for="nama">Nama Lengkap</label>
        <input type="text" name="nama" required="">
        
        <label for="email">Email</label>
        <input type="email" name="email" required="">
        
        <label for="telepon">Nomor Handphone</label>
        <input type="number" name="telepon" required="" min="0">
        
        <label for="password">Kata Sandi</label>
        <input type="password" name="password" required="">
        <br><br>
        <button class="pt-2 pb-2" name="daftar"><b>Daftar</b></button>
        <br><br>
        <p>Sudah Memiliki Akun ? <a href="masuk.php?token=<?= randomString() ?>">Masuk Sekarang</a></p>
      </form>
    </div>
  </body>
</html>
<?php } ?>