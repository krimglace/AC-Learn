<?php
 include '../php/api-session-siswa.php';
 
 include 'header.php';
?>
<style>
.paket-sekolah{
  overflow: auto;
  white-space: nowrap;
}
.paket-sekolah ul li{
  display: inline-block;
}
.kelas-sd{
   background-color: #ECFCF3;
   padding: 10%;
   box-shadow: -5px 5px 5px #50AFBA;
}
.paket-khusus{
  position: relative;
  align-items: center;
  justify-content: center;
  display: flex;
}
.sbmptn{
  background-color: #ECFCF3;
   box-shadow: -5px 5px 5px #50AFBA;
   padding: 0 5%;
}
.sbmptn h6, .sbmptn p{
  color: #50AFAB;
}
</style>
<div class="mt-4 ms-3" style="color: #50AFAB;">
  <h6><strong>Halo, <?= $resultUser['nama_user']; ?></strong></h6>
</div>
<div class="container">
  <h2 class="float-start col-7 ms-3">
    <b>
      Mau Belajar Apa Hari Ini?
    </b>
  </h2>
  <?php
    if($resultUser['foto_user'] == NULL || $resultUser['foto_user'] == ''){
  ?> 
  <img src="../assets/img/icon-profil.png" alt="" class="float-end col-3 me-3" style="width: 75px; height: 75px; border-radius: 50%; border: 1.5px solid #50AFAB; margin-top:-7.5%">
  <?php
    } else {
  ?>
  <img src="../assets/img/<?=$resultUser['foto_user']?>" alt="" class="float-end col-3 me-3" style="width: 75px; height: 75px; border-radius: 50%; border: 1.5px solid #50AFAB; margin-top:-7.5%">
  <?php
    }
  ?>
  <div class="clearfix"></div>
  <br>
</div>
  <div class="paket-sekolah">
    <ul>
      <li>
        <div onclick="paket()" class="kelas-sd me-2">
          <img src="../assets/img/paketsd.png" alt="" width="100%"><br>
          SD <br>
          <strong>Kelas 1 - 6</strong>
        </div>
      </li>
      <li>
        <div onclick="paket()" class="kelas-sd me-2">
          <img src="../assets/img/paketsmp.png" alt="" width="100%"><br>
          SMP <br>
          <strong>Kelas 7 - 9</strong>
        </div>
      </li>
      <li>
        <div onclick="paket()" class="kelas-sd me-2">
          <img src="../assets/img/paketsd.png" alt="" width="100%"><br>
          SMA <br>
          <strong>Kelas 10 - 12</strong>
        </div>
      </li>
      <li>
        <div class="me-3"></div>
      </li>
    </ul>
  </div>
  <h3 class="m-3"><strong>Kelas Khusus</strong></h3>
  <div class="paket-khusus">
    <div onclick="paket()" class="mb-2 sbmptn">
      <div style=" transform: translate(0,50%)" class="float-start col-7">
        <h6><strong>Hadapi SBMPTN</strong></h6>
        <p style="font-size: 75%">Modul Soal dan Pembahasan</p>
      </div>
      <div class="float-end col-5">
        <img src="../assets/img/sbm.png" width="100%" alt="">
      </div>
    </div>
  </div>
  <div class="paket-khusus">
    <div onclick="paket()" class="mb-2 sbmptn">
      <div style=" transform: translate(0,50%)" class="float-start col-7">
        <h6><strong>Hadapi PTS dan PAT</strong></h6>
        <p style="font-size: 75%">Modul Soal dan Pembahasan</p>
      </div>
      <div class="float-end col-5">
        <img src="../assets/img/pts.png" width="100%" alt="">
      </div>
    </div>
  </div>
  <div class="paket-khusus">
    <div onclick="paket()" class="mb-3 sbmptn">
      <div style=" transform: translate(0,50%)" class="float-start col-7">
        <h6><strong>Hadapi Tes Kedinasan</strong></h6>
        <p style="font-size: 75%">Modul Soal dan Pembahasan</p>
      </div>
      <div class="float-end col-5">
        <img src="../assets/img/sbm.png" width="100%" alt="">
      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
<?php
  echo '<script>
    function paket(){
      document.location.href="../siswa/paket-belajar.php?id='.base64_encode($id_user).'";
    }
  </script>' ;
  
  include 'footer.php';
?>
