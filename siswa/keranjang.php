<?php
 include '../php/api-session-siswa.php';
 //echo($id_user);
 $queryKeranjang = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_user = '".$id_user."'");
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
      <strong>Keranjang Saya</strong>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="container mt-3">
    <div class="keranjang m-3 p-3">
      <?php
      while($resKer = mysqli_fetch_assoc($queryKeranjang)) {
      ?>
      <a href="bayar-keranjang.php?id=<?=$resKer['id_keranjang']?>" style="color: #50AFAB">
        <div class="mb-2 p-3" style="position: relative;background-color:#ECFCF3; border: 1px solid #50AFAB">
          <img width="100%" src="../assets/img/bayar.jpeg" alt="" class="float-start col-3" style="border-radius: 50px">
          <div style="font-size: 90%" class="ms-3 float-start col-8">
            <b><?=$resKer['nama_paket']?></b>
            <div style="position: absolute; bottom: 5%; right: 5%; font-size: 75%">
              <?=$resKer['jumlah_bulan']?> x Rp <?=number_format($resKer['harga1'], 2, ',', '.')?>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
      </a>
      <?php } ?>
      
    </div>
  </div>
</div>
<?php
  include 'footer.php';
?>