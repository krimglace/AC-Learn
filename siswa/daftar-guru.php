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
  .comming{
    transform: rotate(-45deg);
    box-shadow: 10px 10px 10px #50AFAB;
    text-align: center;
  }
</style>
<div>
  <div class="mt-4 setting p-2">
    <div class="nama ms-2">
      <strong>Daftar Guru</strong>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="m-3">
    <div class="float-start col-4">
      <a onclick="coming()" style="text-align:center;color: #50AFAB; text-decoration: none; font-size: 50%">
        <div class="m-1 p-1" style="background-color:#ECFCF3;" class="text-center">
          <img class="mt-2" src="../assets/img/Pas Foto.jpg" alt="" width="60%">
          <br>
          <i class="fas fa-user"></i> Muhammad Rafli <br>
          <i class="fas fa-book"></i> Matematika <br>
          <i class="fas fa-star"></i> 4.5
        </div>
      </a>
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