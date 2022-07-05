<?php
 include '../php/api-session-siswa.php';
 //echo($id_user);
 
 include 'header.php';
  $queryPaket = mysqli_query($conn, "SELECT * FROM paket WHERE id_paket = '".$_GET['idpaket']."'");
  $resPaket = mysqli_fetch_assoc($queryPaket);
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
  .content-bayar{
    color: #50AFAB;
  }
</style>
<div>
  <div class="container-fluid mt-2">
    <a href="paket-belajar.php?id=<?= base64_encode($id_user) ?>"><i class="fas fa-arrow-left" style="color: #50AFAB; font-size: 150%;"></i></a>
  </div>
  <div class="mt-2 mb-2 setting p-2">
    <div class="nama ms-4 mt-3">
      <h4><strong>Konfirmasi Pembayaran</strong></h4>
    </div>
  </div>
  <div class="content-bayar mt-2">
    <div class="container">
      <div class="m-3">
        <img src="../assets/img/bayar.jpeg" alt="" width="100%">
      </div>
      <br>
      <h5><b>Detail Pesanan : </b></h5>
      <form action="../php/api-tambahdata.php" method="post" style="background-color: #ECFCF3; border-radius:25px;border: 1px solid #50AFAB" class="p-4 m-2">
        <input type="hidden" name="nama_paket" value="<?=$resPaket['nama_paket']?>">
        <input type="hidden" name="id_user" value="<?=$id_user?>">
        
        <h6><b>Nama Paket : </b><?=$resPaket['nama_paket']?></h6>
        <h6><b>Username : </b><?=$id_user?></h6>
        <label for="">
          <strong>Pesanan untuk 8x pertemuan/bulan</strong>
          <input id="hargaawal" name="hargaawal" type="hidden" value="<?=$resPaket['harga_paket']?>" onkeyup="sum()">
          Rp <?= number_format($resPaket['harga_paket'], 2, ',', '.')?> x <input id="banyakbulan" name="banyakbulan" type="number" class="text-center" style="width:10%;border: 1px solid #50AFAB; background-color:#ECFCF3; color:#50AFAB" placeholder="1" onkeyup="sum()" min="1" required=""> bulan
          <br>
          <label for=""><strong>Total :</strong></label><br>
          <input id="totalharga" name="totalharga" type="text" style="width:100%; border: 1px solid #50AFAB; background-color:#ECFCF3; color:#50AFAB" readonly="" required="">
        </label>
        <br><br>
        <div class="text-center">
          <button id="tombolbayar" style="color:#50AFAB" type="submit" name="keranjang" class="btn btn-warning">Tambah Keranjang</button>
        </div>
      </form>
      <div class="m-5"></div>
      <br><br>
    </div>
  </div>
</div>
<script>
  function sum(){
    var harga = document.getElementById('hargaawal').value;
    var bulan = document.getElementById('banyakbulan').value;
    var total = parseInt(harga) * parseInt(bulan);
    if(bulan == ''){
      document.getElementById('totalharga').value = 'Rp '+harga;
    }else{
      if(!isNaN(total)){
        document.getElementById('totalharga').value = 'Rp '+total;
      }
    }
  }
</script>
<?php
  include 'footer.php';
?>