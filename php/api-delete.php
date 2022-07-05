<?php

  session_start();
  include('config.php');
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
if ($_GET['jenis'] == 'pendidikan') {
  $query = mysqli_query($conn, "DELETE FROM pendidikan_user WHERE id_pendidikan = '".$_GET['id']."'");
  if ($query) {
	  echo '<script>
      swal({
        title: "Berhasil!",
        text: "Data Pendidikan Berhasil Dihapus !",
        icon: "success"
      }).then(function(){
        window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
      });
    </script>';
  } else {
	  echo '<script>
      swal({
        title: "Gagal!",
        text: "Data Pendidikan Gagal Dihapus !",
        icon: "error"
      }).then(function(){
        window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
      });
    </script>';
  }
} elseif($_GET['jenis'] == 'pengalamanmengajar'){
  $query = mysqli_query($conn, "DELETE FROM mengajar_user WHERE id_mengajar = '".$_GET['idmen']."'");
  if ($query) {
	  echo '<script>
      swal({
        title: "Berhasil!",
        text: "Data Pengalaman Mengajar Berhasil Dihapus !",
        icon: "success"
      }).then(function(){
        window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
      });
    </script>';
  } else {
	  echo '<script>
      swal({
        title: "Gagal!",
        text: "Data Pengalaman Mengajar Gagal Dihapus !",
        icon: "error"
      }).then(function(){
        window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
      });
    </script>';
  }
} elseif($_GET['jenis'] == 'pengalamannonmengajar'){
  $query = mysqli_query($conn, "DELETE FROM nonmengajar_user WHERE id_nmengajar = '".$_GET['idnmen']."'");
  if ($query) {
	  echo '<script>
      swal({
        title: "Berhasil!",
        text: "Data Pengalaman Kerja Berhasil Dihapus !",
        icon: "success"
      }).then(function(){
        window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
      });
    </script>';
  } else {
	  echo '<script>
      swal({
        title: "Gagal!",
        text: "Data Pengalaman Kerja Gagal Dihapus !",
        icon: "error"
      }).then(function(){
        window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
      });
    </script>';
  }
} elseif($_GET['jenis'] == 'pengalamanorganisasi'){
  $query = mysqli_query($conn, "DELETE FROM organisasi_user WHERE id_organisasi = '".$_GET['idorg']."'");
  if ($query) {
	  echo '<script>
      swal({
        title: "Berhasil!",
        text: "Data Pengalaman Organisasi Berhasil Dihapus !",
        icon: "success"
      }).then(function(){
        window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
      });
    </script>';
  } else {
	  echo '<script>
      swal({
        title: "Gagal!",
        text: "Data Pengalaman Organisasi Gagal Dihapus !",
        icon: "error"
      }).then(function(){
        window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
      });
    </script>';
  }
} elseif($_GET['jenis'] == 'prestasi'){
  $query = mysqli_query($conn, "DELETE FROM prestasi_user WHERE id_prestasi = '".$_GET['idpres']."'");
  if ($query) {
	  echo '<script>
      swal({
        title: "Berhasil!",
        text: "Data Prestasi Berhasil Dihapus !",
        icon: "success"
      }).then(function(){
        window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
      });
    </script>';
  } else {
	  echo '<script>
      swal({
        title: "Gagal!",
        text: "Data Prestasi Gagal Dihapus !",
        icon: "error"
      }).then(function(){
        window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
      });
    </script>';
  }
} elseif($_GET['jenis'] == 'kelas'){
  $query = mysqli_query($conn, "DELETE FROM kelas_mengajar WHERE id_kelasmengajar = '".$_GET['id']."'");
  if ($query) {
	  echo '<script>
      swal({
        title: "Berhasil!",
        text: "Data Kelas Berhasil Dihapus !",
        icon: "success"
      }).then(function(){
        window.location.href="../siswa/pilihan-mengajar.php?id='.base64_encode($id).'";
      });
    </script>';
  } else {
	  echo '<script>
      swal({
        title: "Gagal!",
        text: "Data Kelas Gagal Dihapus !",
        icon: "error"
      }).then(function(){
        window.location.href="../siswa/pilihan-mengajar.php?id='.base64_encode($id).'";
      });
    </script>';
  }
}elseif($_GET['jenis'] == 'pembayaran'){
    $query = mysqli_query($conn, "DELETE FROM keranjang WHERE id_keranjang = '".$_GET['id']."'");
  if ($query) {
	  echo '<script>
      swal({
        title: "Berhasil!",
        text: "Pesanan dalam keranjang Berhasil Dihapus !",
        icon: "success"
      }).then(function(){
        window.location.href="../siswa/keranjang.php";
      });
    </script>';
  } else {
	  echo '<script>
      swal({
        title: "Gagal!",
        text: "Pesanan dalam keranjang gagal dihapus !",
        icon: "error"
      }).then(function(){
        window.location.href="../siswa/keranjang.php";
      });
    </script>';
  }
}

?>

</body>
    
    