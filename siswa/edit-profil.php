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
  .poto-profil img{
    border-radius: 50%;
    border: 1.5px solid #50AFAB;
  }
  .nama{
    color: #50AFAB;
  }
  input.input-form, select.input-form{
    width: 100%;
    background-color: #ECFCF3;
    border: none;
    margin-bottom: 1%;
    color: #50AFAB;
    padding: 1% 2.5%;
    border-radius: 25px;
    font-size: 80%;
  }
  label{
    margin-left: 2.5%;
    margin-top: 2%;
    font-size: 80%;
  }
</style>
<div>
  <div class="container-fluid mt-2">
    <a href="profil.php?id=<?= base64_encode($id_user) ?>"><i class="fas fa-arrow-left" style="color: #50AFAB; font-size: 150%;"></i></a>
  </div>
  <div class="mt-2 setting p-2">
    <div class="float-start ms-3 col-2">
      <a class="poto-profil" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <?php
          if($resultUser['foto_user'] == NULL | $resultUser['foto_user'] == ''){
        ?>
        <img style="width: 50px; height: 50px" src="../assets/img/icon-profil.png" alt="">
        <?php
          } else {
        ?>
        <img style="width: 50px; height: 50px" src="../assets/img/<?= $resultUser['foto_user'] ?>" alt="">
        <?php
          }
        ?>
      </a>
    </div>
    <div class="float-start col-6 nama ms-2">
      <strong><?= $resultUser['nama_user']; ?></strong>
    </div>
    <div class="float-start col-3">
      <a href="../php/api-logout.php" class="btn btn-warning" style="color: #50AFAB;"><strong>Keluar</strong></a>
    </div>
    <div class="clearfix"></div>
  </div>
</div>

<!-- Modal Ganti Gambar -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ganti Foto Profil</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../php/api-updatesiswa.php" method="post" enctype="multipart/form-data">
    <input name="id" type="hidden" value="<?= $resultUser['id_user'] ?>">
        <div class="modal-body">
          <div class="container-fluid">
             <?php
              if($resultUser['foto_user'] == NULL | $resultUser['foto_user'] == ''){
            ?>
            <img style="width: 100%" src="../assets/img/icon-profil.png" alt="">
            <?php
              } else {
            ?>
            <img style="width: 100%" src="../assets/img/<?= $resultUser['foto_user'] ?>" alt="">
            <?php
              }
            ?>
          </div>
          <div class="form-group">
            <h3 class="mt-2">Ganti Foto</h3>
            <input name="foto" type="file" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button name="gantiFoto" type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Akhir Modal  -->

<div class="container-fluid">
  <form action="../php/api-updatesiswa.php" method="post">
    <input name="id" type="hidden" value="<?= $resultUser['id_user'] ?>">
    <div class="form-group">
      <label for="nama">Nama Lengkap</label>
      <input name="nama" value="<?= $resultUser['nama_user'] ?>" class="input-form" type="text">
    </div>
    <div class="form-group">
      <label for="jenis_kelamin">Jenis Kelamin</label>
      <select name="jenis_kelamin" class="input-form">
        <option value="" <?php if($resultUser['jeniskelamin_user'] == NULL || $resultUser['jeniskelamin_user'] == '') { echo "selected";} ?>>----- Pilih -----</option>
        <option value="Laki - Laki" <?php if($resultUser['jeniskelamin_user'] == "Laki - Laki") { echo "selected";} ?> >Laki - Laki</option>
        <option value="Perempuan" <?php if($resultUser['jeniskelamin_user'] == "Perempuan") { echo "selected";} ?> >Perempuan</option>
      </select>
    </div>
    <div class="form-group">
      <label for="email">Email (Hubungi admin jika ingin melakukan perubahan)</label>
      <input name="email" value="<?= $resultUser['email_user'] ?>" class="input-form" type="email" readonly>
    </div>
    <div class="form-group">
      <label for="tanggal_lahir">Tanggal Lahir</label>
      <input name="tanggal_lahir" value="<?= $resultUser['tanggallahir_user'] ?>" class="input-form" type="date">
    </div>
    <!-- Untuk Kelas -->
    <div class="form-group">
      <label for="tingkat">Tingkatan Sekolah</label>
      <select class="input-form" name="tingkat" id="tingkat">
        <option value="NULL" <?php if($resultUser['tingkat_user'] == "" || $resultUser['tingkat_user'] == NULL) { echo "selected";} ?>> Pilih Tingkatan </option>
        <option value="SD" <?php if($resultUser['tingkat_user'] == "SD") { echo "selected";} ?>> SD </option>
        <option value="SMP" <?php if($resultUser['tingkat_user'] == "SMP") { echo "selected";} ?>> SMP </option>
        <option value="SMA" <?php if($resultUser['tingkat_user'] == "SMA") { echo "selected";} ?>> SMA </option>
      </select>
    </div>
    <?php if($resultUser['tingkat_user'] == 'SD'){ ?>
    <div class="form-group" id="kelas-sd">
      <label for="kelassd">Kelas</label>
      <select name="kelassd" class="input-form">
        <label for="">Kelas</label>
        <option value="1" <?php if($resultUser['kelas_user'] == "1") { echo "selected";} ?>> 1 </option>
        <option value="2" <?php if($resultUser['kelas_user'] == "2") { echo "selected";} ?>> 2 </option>
        <option value="3" <?php if($resultUser['kelas_user'] == "3") { echo "selected";} ?>> 3 </option>
        <option value="4" <?php if($resultUser['kelas_user'] == "4") { echo "selected";} ?>> 4 </option>
        <option value="5" <?php if($resultUser['kelas_user'] == "5") { echo "selected";} ?>> 5 </option>
        <option value="6" <?php if($resultUser['kelas_user'] == "6") { echo "selected";} ?>> 6 </option>
      </select>
    </div>
    <div class="form-group" id="kelas-smp">
      <label for="kelas">Kelas</label>
      <select name="kelassmp" class="input-form">
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
      </select>
    </div>
    <div class="form-group" id="kelas-sma">
      <label for="kelas">Kelas</label>
      <select name="kelassma" class="input-form">
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
      </select>
    </div>
    <?php } elseif($resultUser['tingkat_user'] == 'SMP'){
    ?>
    <div class="form-group" id="kelas-sd">
      <label for="kelas">Kelas</label>
      <select name="kelassd" class="input-form">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
      </select>
    </div>
    <div class="form-group" id="kelas-smp">
      <label for="kelassmp">Kelas</label>
      <select name="kelassmp" class="input-form">
        <label for="">Kelas</label>
        <option value="7" <?php if($resultUser['kelas_user'] == "7") { echo "selected";} ?>> 7 </option>
        <option value="8" <?php if($resultUser['kelas_user'] == "8") { echo "selected";} ?>> 8 </option>
        <option value="9" <?php if($resultUser['kelas_user'] == "9") { echo "selected";} ?>> 9 </option>
      </select>
    </div>
    <div class="form-group" id="kelas-sma">
      <label for="kelas">Kelas</label>
      <select name="kelassma" class="input-form">
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
      </select>
    </div>
    <?php } elseif($resultUser['tingkat_user'] == 'SMA'){ ?>
    <div class="form-group" id="kelas-sd">
      <label for="kelas">Kelas</label>
      <select name="kelassd" class="input-form">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
      </select>
    </div>
    <div class="form-group" id="kelas-smp">
      <label for="kelas">Kelas</label>
      <select name="kelassmp" class="input-form">
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
      </select>
    </div>
    <div class="form-group" id="kelas-sma">
      <label for="kelassma">Kelas</label>
      <select name="kelassma" class="input-form">
        <label for="">Kelas</label>
        <option value="10" <?php if($resultUser['kelas_user'] == "10") { echo "selected";} ?>> 10 </option>
        <option value="11" <?php if($resultUser['kelas_user'] == "11") { echo "selected";} ?>> 11 </option>
        <option value="12" <?php if($resultUser['kelas_user'] == "12") { echo "selected";} ?>> 12 </option>
      </select>
    </div>
    <?php } else{ ?>
    
    <div class="form-group" id="kelas-sd">
      <label for="kelas">Kelas</label>
      <select name="kelassd" class="input-form">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
      </select>
    </div>
    <div class="form-group" id="kelas-smp">
      <label for="kelas">Kelas</label>
      <select name="kelassmp" class="input-form">
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
      </select>
    </div>
    <div class="form-group" id="kelas-sma">
      <label for="kelas">Kelas</label>
      <select name="kelassma" class="input-form">
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12/option>
        <option value="12">12</option>
      </select>
    </div>
    
    <?php } ?>
    <div class="form-group">
      <label for="kegiatan">Kegiatan Saat Ini</label>
      <input name="kegiatan" value="<?= $resultUser['kegiatan_user'] ?>" class="input-form" type="text">
    </div>
    <div class="form-group">
      <label for="alamat">Alamat Lengkap</label>
      <input name="alamat" value="<?= $resultUser['alamat_user'] ?>" class="input-form" type="text">
    </div>
    <div class="form-group">
      <label for="provinsi">Provinsi</label>
      <input name="provinsi" value="<?= $resultUser['provinsi_user'] ?>" class="input-form" type="text">
    </div>
    <div class="form-group">
      <label for="kota_kab">Kota/Kabupaten</label>
      <input name="kota_kab" value="<?= $resultUser['kota_user'] ?>" class="input-form" type="text">
    </div>
    <div class="form-group">
      <label for="kodepos">Kode Pos</label>
      <input name="kodepos" value="<?= $resultUser['kodepos_user'] ?>" class="input-form" type="number" min="0">
    </div>
    <div class="form-group">
      <label for="nomor">Nomor Handphone</label>
      <input name="nomor" value="<?= $resultUser['telepon_user'] ?>" class="input-form" type="number">
    </div>
    <div class="form-group text-center mt-3 mb-5">
      <button name="sendprofil" style="color: #50AFAB" class="btn btn-warning mb-3"><b>Kirim</b></button>
    </div>
  </form>
</div>

	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  $(document).ready(function(){
    $('#kelas-sd').hide();
    $('#kelas-smp').hide();
    $('#kelas-sma').hide();
    
    loadlevel();
  });
  function loadlevel(){
    $('#tingkat').on('change', function(){
      var classd = document.getElementById('kelas-sd');
      var classmp = document.getElementById('kelas-smp');
      var classma = document.getElementById('kelas-sma');
      
      const selectedPackage = $('#tingkat').val();
      if(  selectedPackage == 'SD' ) {
        classma.style.display = 'none';
        classmp.style.display = 'none';
        classd.style.display = 'block';

      } else if ( selectedPackage == 'SMP' ){
        classma.style.display = 'none';
        classmp.style.display = 'block';
        classd.style.display = 'none';
        
      } else if ( selectedPackage == 'SMA' ){
        classma.style.display = 'block';
        classmp.style.display = 'none';
    		classd.style.display = 'none';

      } else {
        classma.style.display ='none';
        classmp.style.display = 'none';
        classd.style.display = 'none';

      }
    });
  }
</script>
<?php
  include 'footer.php';
?>
