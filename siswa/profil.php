<?php
 include '../php/api-session-siswa.php';
 //echo($id_user);
 
 include 'header.php';
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
  <div class="mt-5 setting p-2">
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
      <strong><?= $resultUser['nama_user']; ?></strong>
    </div>
    <div class="float-start col-2">
      <a style="color: #50AFAB;" href="edit-profil.php?id=<?= base64_encode($id_user) ?>"><i class="fas fa-gear"></i></a>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="content-profil mt-2 p-3">
    <style>
      .content-profil{
        background-color: #ECFCF3;
      }
      .linkhref{
        border-bottom: 1px solid #50AFAB;
      }
      .linkhref a{
        color: #50AFAB;
        text-decoration: none;
      }
    </style>
    <?php if ($resultUser['premium'] != 'Premium'): ?>
    <h5 class="text-danger text-center"><i>" Upgrade akun ke premium untuk mendapat akses lebih banyak "</i></h5>
    <hr color="red">
    <?php endif; ?>
    <div class="linkhref p-1">
      <a href="paket-belajar.php?id=<?= base64_encode($id_user) ?>">Daftar Paket</a>
    </div>
    <div class="linkhref p-1">
      <a href="kelas-saya.php?id=<?=base64_encode($id_user)?>">Kelas Saya</a>
    </div>
    <div class="linkhref p-1">
      <a href="daftar-guru.php?id=<?=base64_encode($id_user)?>">Daftar Guru</a>
    </div>
    <div class="linkhref p-1">
      <a href="soal-pembahasan.php?id=<?= base64_encode($id_user) ?>">Paket soal dan Pembahasan</a>
    </div>
    <div class="linkhref p-1">
      <a href="keranjang.php?id=<?= base64_encode($id_user) ?>">Keranjang Saya</a>
    </div>
    <div style="color:#50AFAB" class="linkhref p-1">
      <a onclick="coming()">AC Poin</a>
    </div>
    <div class="linkhref p-1">
      <a href="masukan.php?id=<?= base64_encode($id_user) ?>">Kirim Masukan</a>
    </div>
    <?php if ($resultUser['premium'] != 'Premium'): ?>
    <div class="linkhref p-1">
      <a onclick="coming()" class="text-danger">Upgrade ke Premium</a>
    </div>
    <?php endif; ?>
    
    <div class="m-5"></div>
    <div class="text-center linkhref">
      <a href="#">aclearn &copy; 2022</a>
    </div>
  </div>
</div>
<script>
  function coming(){
    swal({
        title: "Coming Soon!",
        text: "Data akan segera hadir",
        icon: "warning"
      });
  }
</script>
<?php
  include 'footer.php';
?>
