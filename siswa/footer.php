  <style>
    .bottom-menu{
      background-color: #50AFAB;
      border-top-left-radius: 25px;
      border-top-right-radius: 25px;
    }
    .menu-cover{
      margin: 2.5% 5%;
    }
    a.menu{
      float: left;
      text-align: center;
      width: 20%;
      font-size: 200%;
      color: white;
    }
  </style>
  <div class="fixed-bottom bottom-menu">
    <div class="menu-cover">
      <a href="../siswa/paket-belajar.php?id=<?= base64_encode($id_user) ?>" class="menu"><i class="menu fas fa-book-open"></i></a>
      <a href="../siswa/game.php" class="menu"><i class="menu fas fa-gamepad"></i></a>
      <a href="../siswa/index.php?id=<?= base64_encode($id_user) ?>" class="menu"><i class="menu fas fa-home"></i></a>
      <a href="../siswa/jadiguru.php?id=<?= base64_encode($id_user) ?>" class="menu"><i class="menu fas fa-chalkboard-teacher"></i></a>
      <a href="../siswa/profil.php?id=<?= base64_encode($id_user) ?>" class="menu"><i class="menu fas fa-user"></i></a>
      <div class="clearfix"></div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>