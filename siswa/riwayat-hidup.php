<?php
 include '../php/api-session-siswa.php';
 //echo($id_user);
 
 include 'header.php';
 
 $queryPend = mysqli_query($conn, "SELECT * FROM pendidikan_user WHERE id_user = '".$id_user."'");
  $queryMen = mysqli_query($conn, "SELECT * FROM mengajar_user WHERE id_user = '".$id_user."'");
  $queryNMen = mysqli_query($conn, "SELECT * FROM nonmengajar_user WHERE id_user = '".$id_user."'");
  $queryOrg = mysqli_query($conn, "SELECT * FROM organisasi_user WHERE id_user = '".$id_user."'");
  $queryPres = mysqli_query($conn, "SELECT * FROM prestasi_user WHERE id_user = '".$id_user."'");

?>
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
  .riwayat{
    background-color: #ECFCF3;
    border-radius: 10px;
    border: 1px solid #50AFAB;
  }
  .riwayat h6, .riwayat a{
    color: #50AFAB;
  }
  .input-form{
    background-color: #ECFCF3;
    width: 100%;
    border: none;
    border-radius: 10px;
    border: 1px solid #50AFAB;
    color: #50AFAB;
    padding: 0 5%;
  }
  .masih{
    display: flex;
    position: relative;
    align-items: center;
    justify-content: left;
  }
  ul.pendidikan li{
    display: block;
  }
</style>
<div>
  <div class="container-fluid mt-2">
    <a href="jadiguru.php?id=<?= base64_encode($id_user) ?>"><i class="fas fa-arrow-left" style="color: #50AFAB; font-size: 150%;"></i></a>
  </div>
  <div class="mt-2 setting p-2">
    <div class="nama ms-4 mt-3">
      <h4 style="margin-bottom: -2px"><strong>Riwayat Hidup</strong></h4>
      <p style="font-size: 75%">Silahkan mengisi riwayat hidup dengan lengkap</p>
    </div>
  </div>
  <div class="mt-2 ms-3 me-3">
    <div class="riwayat pt-2">
      <h6 class="float-start col-4 ps-3">
        <b>Pendidikan</b>
      </h6>
      <div class="float-start col-7">
        <ul class="pendidikan">
          <?php
          while($resultPend = mysqli_fetch_assoc($queryPend)){
          ?>
          <li style="border-bottom: 1px solid #50AFAB">
            <a href="../php/api-delete.php?id=<?=$resultPend['id_pendidikan']?>&&jenis=pendidikan" class="pt-1 float-start col-1"><i style="font-size:60%" class="text-danger fas fa-trash"></i></a>
            <h6 style="font-size: 60%" class="pt-1 float-start col-10"><b><?=$resultPend['institusi_pend']?></b></h6>
          <div class="clearfix"></div>
          </li>
          <?php } ?>
        </ul>
      </div>
      <a data-bs-toggle="modal" data-bs-target="#pendidikanModal" class="float-end text-end col-1 pe-3">
        <i class="fas fa-plus-square"></i>
      </a>
      <div class="clearfix"></div>
    </div>
    <div class="riwayat pt-2 mt-2">
      <h6 class="float-start col-4 ps-3">
        <b>Pengalaman Mengajar</b>
      </h6>
      <div class="float-start col-7">
        <ul class="pendidikan">
          <?php
          while($resultMen = mysqli_fetch_assoc($queryMen)){
          ?>
          <li style="border-bottom: 1px solid #50AFAB">
            <a href="../php/api-delete.php?idmen=<?=$resultMen['id_mengajar']?>&&jenis=pengalamanmengajar" class="pt-1 float-start col-1"><i style="font-size:60%" class="text-danger fas fa-trash"></i></a>
            <h6 style="font-size: 60%" class="pt-1 float-start col-10"><b><?=$resultMen['institusi_men']?></b></h6>
          <div class="clearfix"></div>
          </li>
          <?php } ?>
        </ul>
      </div>
      <a data-bs-toggle="modal" data-bs-target="#mengajarModal" class="float-end text-end col-1 pe-3">
        <i class="fas fa-plus-square"></i>
      </a>
      <div class="clearfix"></div>
    </div>
    <div class="riwayat pt-2 mt-2">
      <h6 class="float-start col-4 ps-3">
        <b>Pengalaman Kerja</b>
      </h6>
      <div class="float-start col-7">
        <ul class="pendidikan">
          <?php
          while($resultNMen = mysqli_fetch_assoc($queryNMen)){
          ?>
          <li style="border-bottom: 1px solid #50AFAB">
            <a href="../php/api-delete.php?idnmen=<?=$resultNMen['id_nmengajar']?>&&jenis=pengalamannonmengajar" class="pt-1 float-start col-1"><i style="font-size:60%" class="text-danger fas fa-trash"></i></a>
            <h6 style="font-size: 60%" class="pt-1 float-start col-10"><b><?=$resultNMen['institusi_nmen']?></b></h6>
          <div class="clearfix"></div>
          </li>
          <?php } ?>
        </ul>
      </div>
      <a data-bs-toggle="modal" data-bs-target="#nonmengajarModal" class="float-end text-end col-1 pe-3">
        <i class="fas fa-plus-square"></i>
      </a>
      <div class="clearfix"></div>
    </div>
    <div class="riwayat pt-2 mt-2">
      <h6 class="float-start col-4 ps-3">
        <b>Riwayat Organisasi</b>
      </h6>
      <div class="float-start col-7">
        <ul class="pendidikan">
          <?php
          while($resultOrg = mysqli_fetch_assoc($queryOrg)){
          ?>
          <li style="border-bottom: 1px solid #50AFAB">
            <a href="../php/api-delete.php?idorg=<?=$resultOrg['id_organisasi']?>&&jenis=pengalamanorganisasi" class="pt-1 float-start col-1"><i style="font-size:60%" class="text-danger fas fa-trash"></i></a>
            <h6 style="font-size: 60%" class="pt-1 float-start col-10"><b><?=$resultOrg['nama_org']?></b></h6>
          <div class="clearfix"></div>
          </li>
          <?php } ?>
        </ul>
      </div>
      <a data-bs-toggle="modal" data-bs-target="#organisasiModal" class="float-end text-end col-1 pe-3">
        <i class="fas fa-plus-square"></i>
      </a>
      <div class="clearfix"></div>
    </div>
    <div class="riwayat pt-2 mt-2">
      <h6 class="float-start col-4 ps-3">
        <b>Riwayat Prestasi</b>
      </h6>
      <div class="float-start col-7">
        <ul class="pendidikan">
          <?php
          while($resultPres = mysqli_fetch_assoc($queryPres)){
          ?>
          <li style="border-bottom: 1px solid #50AFAB">
            <a href="../php/api-delete.php?idpres=<?=$resultPres['id_prestasi']?>&&jenis=prestasi" class="pt-1 float-start col-1"><i style="font-size:60%" class="text-danger fas fa-trash"></i></a>
            <h6 style="font-size: 60%" class="pt-1 float-start col-10"><b><?=$resultPres['nama_prestasi']?></b></h6>
          <div class="clearfix"></div>
          </li>
          <?php } ?>
        </ul>
      </div>
      <a data-bs-toggle="modal" data-bs-target="#prestasiModal" class="float-end text-end col-1 pe-3">
        <i class="fas fa-plus-square"></i>
      </a>
      <div class="clearfix"></div>
    </div>
  </div>
</div>

<!-- Modal Tambah Pendidikan -->
<div class="modal fade" id="pendidikanModal" tabindex="-1" aria-labelledby="pendModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pendModalLabel">Tambah Pendidikan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../php/api-tambahdata.php" method="post" enctype="multipart/form-data" onsubmit="return validasi()">
        <div class="modal-body">
          <input type="hidden" name="id" value="<?=$id_user?>">
          
          <label for="jenjangPend">Jenjang <b class="text-danger">*</b></label>
          <input type="text" class="input-form" id="jenjangPend" name="jenjangPend" required="">
          
          <label for="instPend">Nama Institusi <b class="text-danger">*</b></label>
          <input type="text" class="input-form" id="instPend" name="instPend" required="">
          
          <label for="masihPend" class="masih">
            <input onclick="cek()" type="checkbox" name="masihPend" class="mt-2" id="masihPend"> <u class="ms-2 mt-2" style="font-size: 75%; text-decoration:none;"> Masih berlangsung sampai saat ini</u>
          </label>
          
          <label for="">Rentang Waktu <b class="text-danger">*</b></label>
          <br>
          <div class="float-start col-5">
            <input type="date" class="input-form" id="mulaiPend" name="mulaiPend" required="">
          </div>
          <div id="cekKey">
            <div class="float-start text-center col-2">
              <b style="color:#50AFAB">s/d</b>
            </div>
            <div class="float-end col-5">
              <input type="date" class="input-form" id="selesaiPend" name="selesaiPend" required="">
            </div>
          </div>
          <div class="clearfix"></div>
          
          <label for="nilaiPend">Nilai Akhir <b class="text-danger">*</b></label>
          <input type="number" class="input-form" id="nilaiPend" name="nilaiPend" required="">
          
          <label for="lamPend">Lampiran Transkip Nilai</label>
          <input type="file" class="input-form" id="lamPend" name="lamPend">
        </div>
        <div class="modal-footer">
          <button id="tambahPend" name="tambahPend" style="color: #50AFAB; border: 1px solid #50AFAB" type="submit" class="btn btn-warning"><b>Simpan</b></button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Akhir Modal  -->

<!-- Modal Tambah Mengajar -->
<div class="modal fade" id="mengajarModal" tabindex="-1" aria-labelledby="menModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="menModalLabel">Tambah Pengalaman Mengajar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../php/api-tambahdata.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="id" value="<?=$id_user?>">
          
          <label for="instMen">Nama Institusi<b class="text-danger">*</b></label>
          <input type="text" class="input-form" id="instMen" name="instMen" required="">
          
          <label for="pelMen">Mata Pelajaran <b class="text-danger">*</b></label>
          <input type="text" class="input-form" id="pelMen" name="pelMen" required="">
          
          <label for="masihMen" class="masih">
            <input onclick="cekmen()" type="checkbox" name="masihMen" class="mt-2" id="masihMen"> <u class="ms-2 mt-2" style="font-size: 75%; text-decoration:none;"> Masih berlangsung sampai saat ini</u>
          </label>
          
          <label for="">Rentang Waktu <b class="text-danger">*</b></label>
          <br>
          <div class="float-start col-5">
            <input type="date" class="input-form" id="mulaiMen" name="mulaiMen" required="">
          </div>
          <div id="cekKeyMen">
            <div class="float-start text-center col-2">
              <b style="color:#50AFAB">s/d</b>
            </div>
            <div class="float-end col-5">
              <input type="date" class="input-form" id="selesaiMen" name="selesaiMen" required="">
            </div>
          </div>
          <div class="clearfix"></div>
          
          <label for="desMen">Deskripsi Kegiatan Mengajar <b class="text-danger">*</b></label>
          <textarea class="input-form" id="desMen" name="desMen" required=""></textarea>
          
          <label for="serMen">Lampiran Surat Mengajar </label>
          <input type="file" id="serMen" class="input-form" name="serMen">
        </div>
        
        <div class="modal-footer">
          <button id="tambahMen" name="tambahMen" style="color: #50AFAB; border: 1px solid #50AFAB" type="submit" class="btn btn-warning"><b>Simpan</b></button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Akhir Modal  -->

<!-- Modal Tambah Non Mengajar -->
<div class="modal fade" id="nonmengajarModal" tabindex="-1" aria-labelledby="nonmenModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="nonmenModalLabel">Tambah Pengalaman Kerja (Non Mengajar)</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../php/api-tambahdata.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="id" value="<?=$id_user?>">
          
          <label for="instNMen">Nama Institusi<b class="text-danger">*</b></label>
          <input type="text" class="input-form" id="instNMen" name="instNMen" required="">
          
          <label for="jabNMen">Jabatan <b class="text-danger">*</b></label>
          <input type="text" class="input-form" id="jabNMen" name="jabNMen" required="">
          
          <label for="masihNMen" class="masih">
            <input onclick="ceknmen()" type="checkbox" name="masihNMen" class="mt-2" id="masihNMen"> <u class="ms-2 mt-2" style="font-size: 75%; text-decoration:none;"> Masih berlangsung sampai saat ini</u>
          </label>
          
          <label for="">Rentang Waktu <b class="text-danger">*</b></label>
          <br>
          <div class="float-start col-5">
            <input type="date" class="input-form" id="mulaiNMen" name="mulaiNMen" required="">
          </div>
          <div id="cekKeyNMen">
            <div class="float-start text-center col-2">
              <b style="color:#50AFAB">s/d</b>
            </div>
            <div class="float-end col-5">
              <input type="date" class="input-form" id="selesaiNMen" name="selesaiNMen" required="">
            </div>
          </div>
          <div class="clearfix"></div>
          
          <label for="desNMen">Deskripsi Kegiatan Mengajar <b class="text-danger">*</b></label>
          <textarea class="input-form" id="desMen" name="desNMen" required=""></textarea>
          
          <label for="serNMen">Lampiran Surat Mengajar </label>
          <input type="file" id="serMen" class="input-form" name="serMen">
        </div>
        
        <div class="modal-footer">
          <button id="tambahNMen" name="tambahNMen" style="color: #50AFAB; border: 1px solid #50AFAB" type="submit" class="btn btn-warning"><b>Simpan</b></button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Akhir Modal  -->

<!-- Modal Tambah Organisasi -->
<div class="modal fade" id="OrganisasiModal" tabindex="-1" aria-labelledby="orgModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="orgModalLabel">Tambah Riwayat Organisasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../php/api-tambahdata.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="id" value="<?=$id_user?>">
          
          <label for="namaorg">Nama Organisasi<b class="text-danger">*</b></label>
          <input type="text" class="input-form" id="namaorg" name="namaorg" required="">
          
          <label for="jaborg">Jabatan <b class="text-danger">*</b></label>
          <input type="text" class="input-form" id="jaborg" name="jaborg" required="">
          
          <label for="masihorg" class="masih">
            <input onclick="cekorg()" type="checkbox" name="masihorg" class="mt-2" id="masihorg"> <u class="ms-2 mt-2" style="font-size: 75%; text-decoration:none;"> Masih berlangsung sampai saat ini</u>
          </label>
          
          <label for="">Rentang Waktu <b class="text-danger">*</b></label>
          <br>
          <div class="float-start col-5">
            <input type="date" class="input-form" id="mulaiorg" name="mulaiorg" required="">
          </div>
          <div id="cekKeyorg">
            <div class="float-start text-center col-2">
              <b style="color:#50AFAB">s/d</b>
            </div>
            <div class="float-end col-5">
              <input type="date" class="input-form" id="selesaiorg" name="selesaiorg" required="">
            </div>
          </div>
          <div class="clearfix"></div>
          
          <label for="desorg">Deskripsi Organisasi <b class="text-danger">*</b></label>
          <textarea class="input-form" id="desorg" name="desorg" required=""></textarea>
          
          <label for="serorg">Lampiran Sertifikat Organisasi </label>
          <input type="file" id="serorg" class="input-form" name="serorg">
        </div>
        
        <div class="modal-footer">
          <button id="tambahorg" name="tambahorg" style="color: #50AFAB; border: 1px solid #50AFAB" type="submit" class="btn btn-warning"><b>Simpan</b></button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Akhir Modal  -->

<!-- Modal Tambah Prestasi -->
<div class="modal fade" id="prestasiModal" tabindex="-1" aria-labelledby="presModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="presModalLabel">Tambah Riwayat Prestasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="../php/api-tambahdata.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="id" value="<?=$id_user?>">
          
          <label for="namapres">Nama Prestasi<b class="text-danger">*</b></label>
          <input type="text" class="input-form" id="namapres" name="namapres" required="">
          
          <label for="lempres">Lembaga Prestasi <b class="text-danger">*</b></label>
          <input type="text" class="input-form" id="lempres" name="lempres" required="">
          
          <label for="waktupres">Waktu <b class="text-danger">*</b></label>
          <input type="date" class="input-form" id="waktupres" name="waktupres" required="">

          <label for="despres">Deskripsi Prestasi <b class="text-danger">*</b></label>
          <textarea class="input-form" id="despres" name="desorg" required=""></textarea>
          
          <label for="serpres">Lampiran Penghargaan </label>
          <input type="file" id="serpres" class="input-form" name="serpres">
        </div>
        
        <div class="modal-footer">
          <button id="tambahpres" name="tambahpres" style="color: #50AFAB; border: 1px solid #50AFAB" type="submit" class="btn btn-warning"><b>Simpan</b></button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Akhir Modal  -->

<script>
  function cek(){
    if(document.getElementById('masihPend').checked){
      document.getElementById('cekKey').style.display = "none";
      document.getElementById('selesaiPend').required = false;
    } else{
      document.getElementById('cekKey').style.display = "block";
      document.getElementById('selesaiPend').setAttribute('required','required');
    }
  }
  function cekmen(){
    if(document.getElementById('masihMen').checked){
      document.getElementById('cekKeyMen').style.display = "none";
      document.getElementById('selesaiMen').required = false;
    } else{
      document.getElementById('cekKeyMen').style.display = "block";
      document.getElementById('selesaiMen').setAttribute('required','required');
    }
  }
  function ceknmen(){
    if(document.getElementById('masihNMen').checked){
      document.getElementById('cekKeyNMen').style.display = "none";
      document.getElementById('selesaiNMen').required = false;
    } else{
      document.getElementById('cekKeyNMen').style.display = "block";
      document.getElementById('selesaiNMen').setAttribute('required','required');
    }
  } 
  function cekorg(){
    if(document.getElementById('masihorg').checked){
      document.getElementById('cekKeyorg').style.display = "none";
      document.getElementById('selesaiorg').required = false;
    } else{
      document.getElementById('cekKeyorg').style.display = "block";
      document.getElementById('selesaiorg').setAttribute('required','required');
    }
  }
</script>
<?php
  include 'footer.php';
?>
