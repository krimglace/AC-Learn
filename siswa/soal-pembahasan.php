<?php
 include '../php/api-session-siswa.php';
 //echo($id_user);
 
 include 'header.php';
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
</style>
<div>
  <div class="container-fluid mt-2">
    <a href="profil.php?id=<?= base64_encode($id_user) ?>"><i class="fas fa-arrow-left" style="color: #50AFAB; font-size: 150%;"></i></a>
  </div>
  <div class="mt-2 mb-2 setting p-2">
    <div class="nama ms-4 mt-3">
      <h4><strong>Modul dan Soal Drilling</strong></h4>
    </div>
  </div>
  <div style="border: 1px solid #50AFAB; background-color: #ECFCF3;" class=" mt-3 mb-2 ms-3 me-3 pb-2 pt-3 ps-3 pe-3 Modul">
    <a style="color:#50AFAB" onclick="coming()"><h3><strong>Modul Drilling</strong></h3></a>
  </div>
  <div style="border: 1px solid #50AFAB; background-color: #ECFCF3;" class=" mt-1 mb-2 ms-3 me-3 pb-2 pt-3 ps-3 pe-3 Modul">
    <a style="color:#50AFAB" onclick="coming()"><h3><strong>Soal dan Pembahasan</strong></h3></a>
  </div>
  <div style="border: 1px solid #50AFAB; background-color: #ECFCF3;" class=" mt-1 mb-2 ms-3 me-3 pb-2 pt-3 ps-3 pe-3 Modul">
    <a style="color:#50AFAB" onclick="coming()"><h3><strong>Soal Drilling</strong></h3></a>
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