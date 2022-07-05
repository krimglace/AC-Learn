<?php
 include '../php/api-session-siswa.php';
 //echo($id_user);
 
 include 'header.php';
  $queryGame = mysqli_query($conn, "SELECT * FROM ac_game");
?>
<style>
  .setting{
    background-color: #ECFCF3;
  }
  .poto-profil img{
    border-radius: 50%;
    border: 1.5px solid #50AFAB;
  }
  .nama{
    color: #50AFAB;
  }
  .block-game{
    border-radius: 15px;
    border: 2px solid #50AFAB;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    color: #50AFAB;
    background-color: #ECFCF3;
  }
  .block-game img{
    border-radius: 15px;
  }
</style>
  <div class="mt-2 setting p-2">
    <div class="nama ms-4 mt-3">
      <h4 style="margin-bottom: -2px"><strong>Pilihan Game</strong></h4>
      <p style="font-size: 75%">Silahkan pilih game yang ingin anda mainkan</p>
    </div>
  </div>
  <br>
  <div class="container">
    <?php
      while($resGame = mysqli_fetch_assoc($queryGame)){
    ?>
    <a href="game-play.php?id=<?=$resGame['id_game']?>&&=/code=<?=md5($resGame['id_game'])?>">
      <div class="block-game p-3">
        <h6 class="float-start col-7 me-3">
          <?= $resGame['nama_game'] ?>
        </h6>
        <img class="float-end col-4 ms-2" src="../assets/game/<?=$resGame['thumbnail']?>" alt="" width="100%">
        <div class="clearfix"></div>
      </div>
    </a>
    <?php } ?>
  </div>
<?php
  include 'footer.php';
?>