<?php

include '../php/api-session-siswa.php';
?>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <style>
   .disclaimer{
     display: none;
   }
 </style>
</head>
<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php
  include 'config.php';
  $queryselect = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_user = '".$id_user."'");
 
  $select = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '".$id_user."'");
  $result = mysqli_fetch_assoc($select);
  while($resultselect = mysqli_fetch_assoc($queryselect)){
    $queryinsert = mysqli_query($conn, "INSERT INTO kelas_user(id_user, nama_user, nama_paket, jumlah_bulan, status_kelas) VALUES('".$id_user."', '".$result['nama_user']."', '".$resultselect['nama_paket']."', '".$resultselect['jumlah_bulan']."', 'Menunggu Konfirmasi Admin')");
    if ($queryinsert == true) {
       $querydelete = mysqli_query($conn, "DELETE FROM keranjang WHERE id_user = '".$id_user."'");
?>
<script>
      swal({
        title: "Berhasil!",
        text: "Berhasil melakukan pembayaran !",
        icon: "success"
      }).then(function(){
        window.location.href="../siswa/profil.php?id='.base64_encode($id).'";
      });
</script>
<?php
    } else {
      var_dump($queryinsert);
    }
    
  }

?>
</body>