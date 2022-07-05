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
    <style>
      input{
        width: 100%;
        font-size: 150%;
        border-top: none;
        border-right: none;
        border-left: none;
        border-bottom: 1px solid #50AFAB;
        padding: 2.5% 12.5%;
        color: #50AFAB;
      }
      .disclaimer{
          display: none;
      }
    </style>
    <?php
      include 'css-template.php';
    ?>
    
  </head>
  <body>
    <div class="mt-5" style="margin-left: 10%; margin-right: 10%;">
      <h1 class="mt-5 text-center">
        <strong>
          Masuk
        </strong>
      </h1>
      <br>
      <form action="php/api-login.php" method="post">
        <i class="fas fa-user-circle"></i>
        <input type="text" name="username" placeholder="Username" required="">
        <br><br>
        <i class="fas fa-lock"></i>
        <input type="password" name="password" placeholder="Password" required="">
        <div class="text-end mt-2">
          <a href="">Lupa Password ?</a>
        </div>
        <button class="pt-2 pb-2" name="masuk"><b>Masuk</b></button>
        <br><br>
        <p>Belum Memiliki Akun ? <a href="daftar.php?token=<?= randomString() ?>">Daftar Sekarang</a></p>
      </form>
    </div>
  </body>
</html>
<?php } ?>