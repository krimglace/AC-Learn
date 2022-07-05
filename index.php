<?php
include 'php/api-session-homepage.php';
?>
<!doctype html>
<html>
  <head>
    <title>AC-Learn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
      include 'css-template.php';
    ?>
    <style>
        .disclaimer{
            display: none;
        }
    </style>
  </head>
  <body>
    <div class="mt-5" style="margin-left: 10%; margin-right: 10%;">
      <h1 class="mt-5">
        <strong>
          Selamat Datang di AC-Learn
        </strong>
      </h1>
      <br>
      <img src="assets/img/logo.png" width="100%" style="background-color: white" alt="">
      <br>
      <form action="php/api-homepage.php" method="post">
        <button class="pt-2 pb-2" name="masuk"><b>Masuk</b></button>
        <button class="pt-2 pb-2" name="daftar"><b>Daftar</b></button>
      </form>
    </div>
  </body>
</html>