<?php
 include '../php/api-session-siswa.php';
 //echo($id_user);
 
 include 'header.php';
 $querykelas = mysqli_query($conn, "SELECT * FROM kelas_user WHERE id_user = '".$id_user."' ORDER BY id_kelas DESC ");
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
      <strong>Kelas Saya</strong>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="m-3">
    <?php
      while($resulkelas = mysqli_fetch_assoc($querykelas)){
        if($resulkelas['tanggal_mulai'] == null){
    ?>
    <a onclick="konfir()">
      <div style="border: 1px solid #50AFAB; position: relative; justify-content: center; align-items: center; display: flex;font-size: 80%;background-color: #ECFCF3; color: #50AFAB;"class="p-2 mb-2">
          <img width="100%" src="../assets/img/bayar.jpeg" alt="" class="float-start col-3" style="border-radius: 50px">
          <div class="float-start col-8 ms-2">
            <i class="fas fa-school"></i> <?=$resulkelas['nama_paket']?>
            <br>
            <i class="fas fa-clock"></i> <?= $resulkelas['jumlah_bulan']?> bulan <br>
            <?php if ($resulkelas['tanggal_mulai'] == null): ?>
              <i class="fas fa-calendar"></i> <b class="text-danger"><?= $resulkelas['status_kelas']?></b>
            <?php else: ?>
              <i class="fas fa-calendar"></i> <?=$tanggal_mulai?>
            <?php endif; ?>
            
          </div>
          <div class="clearfix"></div>
      </div>
    </a>
    <?php } else{?>
    <a href="">
      <div style="border: 1px solid #50AFAB; position: relative; justify-content: center; align-items: center; display: flex;font-size: 80%;background-color: #ECFCF3; color: #50AFAB;"class="p-2 mb-2">
          <img width="100%" src="../assets/img/bayar.jpeg" alt="" class="float-start col-3" style="border-radius: 50px">
          <div class="float-start col-8 ms-2">
            <i class="fas fa-school"></i> <?=$resulkelas['nama_paket']?>
            <br>
            <i class="fas fa-clock"></i> <?= $resulkelas['jumlah_bulan']?> bulan <br>
            <?php if ($resulkelas['tanggal_mulai'] == null): ?>
              <i class="fas fa-calendar"></i> <b class="text-danger"><?= $resulkelas['status_kelas']?></b>
            <?php else: ?>
              <i class="fas fa-calendar"></i> <?=$tanggal_mulai?>
            <?php endif; ?>
            
          </div>
          <div class="clearfix"></div>
      </div>
    </a>
    <?php
    }
      }
    ?>
  </div>
</div>
<script>
  function konfir(){
    swal({
        title: "Menunggu Konfirmasi Admin!",
        text: "Data akan segera hadir",
        icon: "warning"
      });
  }
</script>
<?php
  include 'footer.php';
?>