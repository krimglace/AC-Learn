<?php
 include '../php/api-session-siswa.php';
 //echo($id_user);
 
 include 'header.php';
?>
<style>
  .setting{
    background-color: #ECFCF3;
    position: relative;
    justify-content: center;
    align-items: center;
    display: flex;
  }
  .poto-profil{
    border-radius: 50%;
    background-color: blue;
    border: 1.5px solid #50AFAB;
  }
  .nama{
    color: #50AFAB;
  }
</style>
<div>
  <div class="mt-4 setting p-2">
    <div class="float-start ms-3 col-2">
      <?php
        if($resultUser['foto_user'] == NULL | $resultUser['foto_user'] == ''){
      ?>
      <img class="poto-profil" style="width: 50px; height: 50px" src="../assets/img/icon-profil.png" alt="">
      <?php
        } else {
      ?>
      <img class="poto-profil" style="width: 50px; height: 50px" src="../assets/img/<?= $resultUser['foto_user'] ?>" alt="">
      <?php
        }
      ?>
    </div>
    <div class="float-start col-7 nama ms-2">
      <strong>Kirim Masukan</strong>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="container mt-4">
    <div style="background-color: #ECFCF3; border: 1px solid #50AFAB" class="p-3 m-2 content-masukan">
      <form action="../php/api-tambahdata.php" method="post">
        <input type="hidden" value="<?=$id_user?>" name="id">
        <label for="masukan"><strong>Pesan/Masukan</strong></label>
        <textarea name="masukan" id="masukan" cols="30" rows="10" required=""></textarea>
        <br><br>
        <button style="border: 1px solid #50AFAB; color: #50AFAB" class="btn btn-warning float-end" type="submit" name="saran">Kirim</button>
        <div class="clearfix"></div>
      </form>
    </div>
  </div>
</div>
<?php
  include 'footer.php';
?>