<?php
include '../php/api-session-siswa.php';
include 'header.php';
$queryPaket = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_keranjang = '".$_GET['id']."'");
$resPaket = mysqli_fetch_assoc($queryPaket);
  $harga = (int)$resPaket['harga1'];
  $bulan = (int)$resPaket['jumlah_bulan'];
  $nama = $resPaket['nama_paket'];
  $id = $id_user;
  $queryuser = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '".$id."'");
  $result = mysqli_fetch_assoc($queryuser);
  
require_once('../vendor/Veritrans.php');
 
  Veritrans_Config::$serverKey = "SB-Mid-server-vEZlC-DdH703aGozKzcn9NVt";
  Veritrans_Config::$isSanitized = true;
  Veritrans_Config::$is3ds = true;

$transaction_details = array(
    'order_id' => rand(),
    'gross_amount' => 40000, 
  );

  $item1_details = array(
    'id' => $resPaket['id_keranjang'],
    'price' => $harga,
    'quantity' => $bulan,
    'name' => $nama
  );

  $item_details = array ($item1_details);

  $billing_address = array(
    'first_name'    => "Muhammad Rafli",
    'last_name'     => "",
    'address'       => "Purwakarta",
    'city'          => "Purwakarta",
    'postal_code'   => "41118",
    'phone'         => "082275713049",
    'country_code'  => 'IDN'
  );

  $shipping_address = array(
    'first_name'    => $result['nama_user'],
    'last_name'     => "",
    'address'       => $result['alamat_user'],
    'city'          => $result['kota_user'],
    'postal_code'   => $result['kodepos_user'],
    'phone'         => $result['telepon_user'],
    'country_code'  => 'IDN'
  );

  $customer_details = array(
    'first_name'    => $result['nama_user'],
    'last_name'     => "",
    'email'         => $result['email_user'],
    'phone'         => $result['telepon_user'],
    'billing_address'  => $billing_address,
    'shipping_address' => $shipping_address
  );

  $enable_payments = array('credit_card','cimb_clicks','mandiri_clickpay','echannel','alfamart');

  $transaction = array(
    'enabled_payments' => $enable_payments,
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
  );

  $snapToken = Veritrans_Snap::getSnapToken($transaction);


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
      <div style="background-color: #ECFCF3; border-radius:25px;border: 1px solid #50AFAB" class="p-4 m-2">
        <div class="float-end">
          <a href="../php/api-delete.php?id=<?=$_GET['id']?>&&jenis=pembayaran" class="p-2" name="keranjang" style="text-decoration:none;background-color:#ECFCF3; border: 1px solid #50AFAB; color: #50AFAB">
          <i class="fas fa-trash"></i> Hapus</a>
        </div>
        <div class="clearfix"></div>
        <br>
        <input type="hidden" name="nama_paket" value="<?=$resPaket['nama_paket']?>">
        <input type="hidden" name="id_user" value="<?=$id_user?>">
        <input type="hidden" name="nama" value="<?=$resPaket['nama_paket']?>">
        <h6><b>Nama Paket : </b><?=$resPaket['nama_paket']?></h6>
        <h6><b>Username : </b><?=$id_user?></h6>
        <label for="">
          <strong>Pesanan untuk 8x pertemuan/bulan</strong>
          <input id="hargaawal" name="hargaawal" type="hidden" value="<?=$resPaket['harga1']?>" onkeyup="sum()">
          <input id="hargaawal" name="bulan" type="hidden" value="<?=$resPaket['jumlah_bulan']?>" onkeyup="sum()">
          Rp <?= number_format($resPaket['harga1'], 2, ',', '.')?> x <?=$resPaket['jumlah_bulan']?> bulan
          <br>
          <label for=""><strong>Total :</strong></label><br>
          <input id="totalharga" name="totalharga" type="text" style="width:100%; border: 1px solid #50AFAB; background-color:#ECFCF3; color:#50AFAB" readonly="" value="<?=$resPaket['total_harga']?>">
        </label>
        <br><br>
        <div class="text-center">
          <button id="pay-button" style="color:#50AFAB" name="bayar" class="btn btn-warning">Bayar Sekarang</button>
        </div>
      </div>
      <div class="m-5"></div>
      <br><br>
    </div>
  </div>
</div>
<script 
      type="text/javascript"
      src="https://app.sandbox.midtrans.com/snap/snap.js"
      data-client-key="SB-Mid-client-RaBqRWo1OxT2aukx"
    ></script>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-RaBqRWo1OxT2aukx"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        snap.pay('<?=$snapToken?>', {
          onSuccess: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          onPending: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          onError: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>
<?php
  include 'footer.php';
?>