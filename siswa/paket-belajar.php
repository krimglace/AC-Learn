<?php
 include '../php/api-session-siswa.php';
// echo($id_user);
 
 include 'header.php';
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
  if ($resultUser['tingkat_user'] == NULL || $resultUser['tingkat_user'] == '') {
      echo '<script>
        swal({
            title: "Gagal Memuat Halaman!",
            text: "Isi Kelas Anda Sebelum Memilih Paket !",
            icon: "warning"
          }).then(function(){
            window.location.href="../siswa/profil.php?token='.base64_encode($id_user).'";
          });
      </script>';
    
  } elseif($resultUser['tingkat_user'] == 'SD'){
    $querySD = mysqli_query($conn, "SELECT * FROM paket WHERE tingkatan_paket = 'SD'");
?>
  <div class="mt-5 setting p-2">
    <div class="ms-3 me-3">
      <h2><b>Banyak pilihan paket yang bisa kamu pilih !!</b></h2>
    </div>
  </div>
<style>
.paket{
  overflow: auto;
  white-space: nowrap;
  margin-right: 100px;
}
ul.paketsma li{
  display: inline-block;
}
.paket-all{
  border-radius: 10px;
  border: 1px solid #50AFAB;
}
ul.bllok li{
  display: block;
}
</style>
  <div class="container paket">
    <ul class="paketsma">
<?php
    while($resSD = mysqli_fetch_assoc($querySD)){
?>
      <li>
        <div class="paket-all p-3 m-2">
          <b><?= $resSD['nama_paket'] ?></b>
          <ul class="bllok">
            <li>
              <i class="fas fa-fire text-warning"></i> Untuk SD <br>
              <i class="fas fa-fire text-warning"></i> Contoh Soal dan Materi <br>
              <i class="fas fa-fire text-warning"></i> Akses Video Premium <br>
              <i class="fas fa-fire text-warning"></i> Akses Game Premium <br>
            </li>
          </ul>
          <br>
          <img src="../assets/img/<?=$resSD['profil_paket']?>" alt="">
          <br>
          Harga : <br>
          <b>Rp <?= number_format($resSD['harga_paket'], 2, ',', '.')?>/bulan</b>
          <div class="text-center mt-2">
            <a href="konfirmasi-awal.php?idpaket=<?=$resSD['id_paket']?>" class="ps-3 pe-3 bg-warning" style="text-decoration: none;border-radius: 20px; color: #50AFAB; border: none"><b>Beli Paket</b></a>
          </div>
        </div>
      </li>
<?php
    }
 ?>
      <li class="me-5"></li>
    </ul>
  </div>
<?php
  } elseif($resultUser['tingkat_user'] == 'SMP'){

    $querySMP = mysqli_query($conn, "SELECT * FROM paket WHERE tingkatan_paket = 'SMP'");
?>
  <div class="mt-5 setting p-2">
    <div class="ms-3 me-3">
      <h2><b>Banyak pilihan paket yang bisa kamu pilih !!</b></h2>
    </div>
  </div>
<style>
.paket{
  overflow: auto;
  white-space: nowrap;
  margin-right: 100px;
}
ul.paketsma li{
  display: inline-block;
}
.paket-all{
  border-radius: 10px;
  border: 1px solid #50AFAB;
}
ul.bllok li{
  display: block;
}
</style>
  <div class="container paket">
    <ul class="paketsma">
<?php
    while($resSMP = mysqli_fetch_assoc($querySMP)){
?>
      <li>
        <div class="paket-all p-3 m-2">
          <b><?= $resSMP['nama_paket'] ?></b>
          <ul class="bllok">
            <li>
              <i class="fas fa-fire text-warning"></i> Untuk SMP <br>
              <i class="fas fa-fire text-warning"></i> Contoh Soal dan Materi <br>
              <i class="fas fa-fire text-warning"></i> Akses Video Premium <br>
              <i class="fas fa-fire text-warning"></i> Akses Game Premium <br>
            </li>
          </ul>
          <br>
          <img src="../assets/img/<?=$resSMP['profil_paket']?>" alt="">
          <br>
          Harga : <br>
          <b>Rp <?= number_format($resSMP['harga_paket'], 2, ',', '.')?>/bulan</b>
          <div class="text-center mt-2">
            <a href="konfirmasi-awal.php?idpaket=<?=$resSMP['id_paket']?>" class="ps-3 pe-3 bg-warning" style="text-decoration: none;border-radius: 20px; color: #50AFAB; border: none"><b>Beli Paket</b></a>
          </div>
        </div>
      </li>
<?php
    }
 ?>
      <li class="me-5"></li>
    </ul>
  </div>
  
<?php
  } elseif($resultUser['tingkat_user'] == 'SMA'){
    $querySMA = mysqli_query($conn, "SELECT * FROM paket WHERE tingkatan_paket = 'SMA'");
?>
  <div class="mt-5 setting p-2">
    <div class="ms-3 me-3">
      <h2><b>Banyak pilihan paket yang bisa kamu pilih !!</b></h2>
    </div>
  </div>
<style>
.paket{
  overflow: auto;
  white-space: nowrap;
  margin-right: 100px;
}
ul.paketsma li{
  display: inline-block;
}
.paket-all{
  border-radius: 10px;
  border: 1px solid #50AFAB;
}
ul.bllok li{
  display: block;
}
</style>
  <div class="container paket">
    <ul class="paketsma">
<?php
    while($resSMA = mysqli_fetch_assoc($querySMA)){
?>
      <li>
        <div class="paket-all p-3 m-2">
          <b><?= $resSMA['nama_paket'] ?></b>
          <ul class="bllok">
            <li>
              <i class="fas fa-fire text-warning"></i> Untuk SMA <br>
              <i class="fas fa-fire text-warning"></i> Contoh Soal dan Materi <br>
              <i class="fas fa-fire text-warning"></i> Akses Video Premium <br>
              <i class="fas fa-fire text-warning"></i> Akses Game Premium <br>
            </li>
          </ul>
          <br>
          <img src="../assets/img/<?=$resSMA['profil_paket']?>" alt="">
          <br>
          Harga : <br>
          <b>Rp <?= number_format($resSMA['harga_paket'], 2, ',', '.')?>/bulan</b>
          <div class="text-center mt-2">
            <a href="konfirmasi-awal.php?idpaket=<?=$resSMA['id_paket']?>" class="ps-3 pe-3 bg-warning" style="text-decoration: none;border-radius: 20px; color: #50AFAB; border: none"><b>Beli Paket</b></a>
          </div>
        </div>
      </li>
<?php
    }
 ?>
      <li class="me-5"></li>
    </ul>
  </div>
 <?php
  }

  include 'footer.php';
?>
