<?php
 include '../php/api-session-siswa.php';
 //echo($id_user);
 
 include 'header.php';

  $queryKelas = mysqli_query($conn, "SELECT * FROM kelas_mengajar WHERE id_user = '".$id_user."'");
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
  input[type="checkbox"]{
    display: none;
  }
  input[type="checkbox"] + label{
    background-color: #ECFCF3;
    color: #50AFAB;
    border-radius: 25px;
    text-align: center;
    content: "";
    width: 100%;
  }
  input[type="checkbox"]:checked + label{
    background-color: #50AFAB;
    color: #ECFCF3;
    content: "";
  }
</style>
<div>
  <div class="container-fluid mt-2">
    <a href="jadiguru.php?id=<?= base64_encode($id_user) ?>"><i class="fas fa-arrow-left" style="color: #50AFAB; font-size: 150%;"></i></a>
  </div>
  <div class="mt-2 setting p-2">
    <div class="nama ms-4 mt-3">
      <h4 style="margin-bottom: -2px"><strong>Pilihan Kelas</strong></h4>
      <p style="font-size: 75%">Silahkan pilih kelas yang ingin anda ajari</p>
    </div>
  </div>
  <br>
  <div class="container">
    <table class="table text-center">
      <tr>
        <th>No</th>
        <th>Data Kelas</th>
        <th>Aksi</th>
      </tr>
      <?php
        $no = 1;
        while($resKelas = mysqli_fetch_assoc($queryKelas)){
      ?>
      <tr>
        <td><?=$no++?></td>
        <td><?=$resKelas['nama_kelas']?></td>
        <td>
            <a href="../php/api-delete.php?id=<?=$resKelas['id_kelasmengajar']?>&&jenis=kelas"><i class="text-danger fas fa-trash"></i></a>
        </td>
      </tr>
      <?php } ?>
    </table>
  </div>
  <br><hr>
  <div class="container">
    <form action="../php/api-tambahdata.php" method="post">
      <input type="hidden" value="<?=$id_user?>" name="id_user">
      <div class="float-start col-4 p-2">
        <input type="checkbox" id="sd1" name="chk[]" value="1 SD">
        <label for="sd1">1 SD</label>
      </div>
      
      <div class="float-start col-4 p-2">
        <input type="checkbox" id="sd2" name="chk[]" value="2 SD">
        <label for="sd2">2 SD</label>
      </div>
      
      <div class="float-start col-4 p-2">
        <input type="checkbox" id="sd3" name="chk[]" value="3 SD">
        <label for="sd3">3 SD</label>
      </div>
  
      <div class="float-start col-4 p-2">
        <input type="checkbox" id="sd4" name="chk[]" value="4 SD">
        <label for="sd4">4 SD</label>
      </div>
      
      <div class="float-start col-4 p-2">
        <input type="checkbox" id="sd5" name="chk[]" value="5 SD">
        <label for="sd5">5 SD</label>
      </div>
      
      <div class="float-start col-4 p-2">
        <input type="checkbox" id="sd6" name="chk[]" value="6 SD">
        <label for="sd6">6 SD</label>
      </div>
      
      <div class="float-start col-4 p-2">
        <input type="checkbox" id="smp7" name="chk[]" value="7 SMP">
        <label for="smp7">7 SMP</label>
      </div>
      
      <div class="float-start col-4 p-2">
        <input type="checkbox" id="smp8" name="chk[]" value="8 SMP">
        <label for="smp8">8 SMP</label>
      </div>
      
      <div class="float-start col-4 p-2">
        <input type="checkbox" id="smp9" name="chk[]" value="9 SMP">
        <label for="smp9">9 SMP</label>
      </div>
     
      <div class="float-start col-4 p-2">
        <input type="checkbox" id="sma10" name="chk[]" value="10 SMA">
        <label for="sma10">10 SMA</label>
      </div>
      
      <div class="float-start col-4 p-2">
        <input type="checkbox" id="sma11" name="chk[]" value="11 SMA">
        <label for="sma11">11 SMA</label>
      </div>
      
      <div class="float-start col-4 p-2">
        <input type="checkbox" id="sma12" name="chk[]" value="12 SMA">
        <label for="sma12">12 SMA</label>
      </div>
      
      <div class="clearfix"></div>
      <button style="color: #50AFAB; margin-left: 30%; margin-righr:30%; width: 40%" class="mb-5 btn btn-warning mt-2" type="submit" name="kelas"><b>Simpan</b></button>
    </form>
  </div>
</div>
<?php
  include 'footer.php';
?>
