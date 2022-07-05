<?php
 include '../php/api-session-siswa.php';
 include '../php/api-pilihan.php';
 
 
 $queryVideo = mysqli_query($conn, "SELECT * FROM tentang");
 $resVideo = mysqli_fetch_assoc($queryVideo);
 $queryPend = mysqli_query($conn, "SELECT * FROM pendidikan_user WHERE id_user = '".$id_user."'");
 
 $queryKelas = mysqli_query($conn, "SELECT * FROM kelas_mengajar WHERE id_user = '".$id_user."'");

 include 'header.php';
?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<style>
  .kriteria{
    background-color: #ECFCF3;
    border-radius: 20px;
  }
  .kriteria a{
    text-decoration: none;
    color: #50AFAB;
  }
</style>
  <div class="mt-5 setting p-2">
    <div class="ms-3 me-3">
      <h1><b>Mau Ngajar di AcLearn !! Daftar Sekarang !!</b></h1>
      <br>
      <iframe src="<?=$resVideo['video_jadipengajar']?>" frameborder="0"></iframe>
      <br>
      <br>
      <div class="text-center">
        <h2><b>Ayo lengkapi data berikut !</b></h2>
      </div>
      <div class="kriteria pt-1 pb-1 ps-4 pe-4 mb-2" style="position: relative">
        <a href="edit-profil.php?id=<?= base64_encode($id_user) ?>">
          <i style="font-size: 120%" class="fas fa-user-circle me-3"></i><b> Profil</b>
          <i class="fas fa-arrow-right" style="font-size:120%; position: absolute; right: 5%; top: 20%"></i>
        </a>
        <div class="clearfix"></div>
      </div>
      <div class="kriteria pt-1 pb-1 ps-4 pe-4 mb-2" style="position: relative">
        <a href="riwayat-hidup.php?id=<?= base64_encode($id_user) ?>">
          <i style="font-size: 120%" class="fas fa-graduation-cap me-3"></i><b>Riwayat Hidup</b>
          <i class="fas fa-arrow-right" style="font-size:120%; position: absolute; right: 5%; top: 20%"></i>
        </a>
        <div class="clearfix"></div>
      </div>
      <div class="kriteria pt-1 pb-1 ps-4 pe-4 mb-2" style="position: relative">
        <a href="pilihan-mengajar.php?id=<?= base64_encode($id_user) ?>">
          <i style="font-size: 120%" class="fas fa-list me-3"></i><b> Pilihan Mengajar</b>
          <i class="fas fa-arrow-right" style="font-size:120%; position: absolute; right: 5%; top: 20%"></i>
        </a>
        <div class="clearfix"></div>
      </div>
    </div>
    <br>
    <?php
      if (($resCek['nama_user'] == null) || ($resCek['telepon_user'] == null) || ($resCek['tanggallahir_user'] == null) || ($resCek['tingkat_user'] == null) || ($resCek['kelas_user'] == null) || ($resCek['kegiatan_user'] == null) || ($resCek['alamat_user'] == null) || ($resCek['provinsi_user'] == null) || ($resCek['kota_user'] == null) || ($resCek['jeniskelamin_user'] == null) || ($resCek['kodepos_user'] == null) || ($resCek['foto_user'] == null) || ($resCek['foto_user'] == '') || (mysqli_num_rows($queryPend) == 0) || (mysqli_num_rows($queryKelas) == 0)) {
    ?>
    <div class="text-center">
      <button onclick="databelumlengkap()" class="btn btn-warning" style="border-radius: 20px; color: #50AFAB"><b>Bergabung Sekarang</b></button>
    </div>
    <?php
      } else{
    ?>
    <form method="post" action="../php/api-tambahdata.php" class="text-center">
      <input type="hidden" value="<?=$id_user?>" name="id">
      <button class="btn btn-warning" style="border-radius: 20px; color: #50AFAB" name="pengajar"><b>Bergabung Sekarang</b></button>
    </form>
    <?php
      }
    ?>
  </div>
  <script>
    function databelumlengkap(){
      swal({
        title: "Data Belum Lengkap!",
        text: "Lengkapi Data Anda Terlebih Dahulu",
        icon: "warning"
      });
    }
  </script>
<?php
  include 'footer.php';
?>
