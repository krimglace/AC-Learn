<?php

  session_start();
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
  
  if (isset($_POST['sendprofil'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jeniskelamin = $_POST['jenis_kelamin'];
    
    if($_POST['tanggal_lahir'] == ''){
      $tanggal_lahir = "tanggallahir_user = NULL";
    } else {
      $tanggal_lahir = "tanggallahir_user = '".$_POST['tanggal_lahir']."'";
    }
    $tingkat = $_POST['tingkat'];
    $kelassd = $_POST['kelassd'];
    $kelassmp = $_POST['kelassmp'];
    $kelassma = $_POST['kelassma'];
    if ($_POST['kegiatan'] == '') {
      $kegiatan = "kegiatan_user = NULL";
    } else{
      $keg = $_POST['kegiatan'];
      $kegiatan = "kegiatan_user = '".$_POST['kegiatan']."'";
    }
    if ($_POST['alamat'] == '') {
      $alamat = "alamat_user = NULL";
    } else {
      $alamat = "alamat_user = '".$_POST['alamat']."'";
    }
    if ($_POST['provinsi'] == '') {
      $provinsi = "provinsi_user = NULL";
    } else{
      $provinsi = "provinsi_user = '".$_POST['provinsi']."'";
    }
    if ($_POST['kota_kab'] == '') {
      $kota = "kota_user = NULL";
    } else {
      $kota = "kota_user = '".$_POST['kota_kab']."'";
    }
    if ($_POST['kodepos'] == '') {
      $kodepos = "kodepos_user = NULL";
    } else{
      $kodepos = "kodepos_user = '".$_POST['kodepos']."'";
    }
    $telepon = $_POST['nomor'];
    
    if ($tingkat == 'SD') {
      $query = "UPDATE user SET nama_user = '".$nama."', jeniskelamin_user = '".$jeniskelamin."', ".$tanggal_lahir.", ".$kegiatan.", ".$alamat.", ".$provinsi.", ".$kota.", ".$kodepos.", telepon_user = '".$telepon."', tingkat_user = '".$tingkat."', kelas_user = '".$kelassd."' WHERE id_user = '".$id."'";
      
      mysqli_query($conn, $query);
      echo '<script>
        swal({
          title: "Berhasil!",
          text: "Data Berhasil Diperbaharui !",
          icon: "success"
          }).then(function(){
          window.location.href="../siswa/edit-profil.php?id='.base64_encode($id).'";
        });
      </script>';
      
    } elseif($tingkat == 'SMP') {
      $query = "UPDATE user SET nama_user = '".$nama."', jeniskelamin_user = '".$jeniskelamin."', ".$tanggal_lahir.", ".$kegiatan.", ".$alamat.", ".$provinsi.", ".$kota.", ".$kodepos.", telepon_user = '".$telepon."', tingkat_user = '".$tingkat."', kelas_user = '".$kelassmp."' WHERE id_user = '".$id."'";
      
      mysqli_query($conn, $query);
      echo '<script>
        swal({
          title: "Berhasil!",
          text: "Data Berhasil Diperbaharui !",
          icon: "success"
        }).then(function(){
          window.location.href="../siswa/edit-profil.php?id='.base64_encode($id).'";
        });
      </script>';
    } elseif($tingkat == 'SMA') {
    $query = "UPDATE user SET nama_user = '".$nama."', jeniskelamin_user = '".$jeniskelamin."', ".$tanggal_lahir.", ".$kegiatan.", ".$alamat.", ".$provinsi.", ".$kota.", ".$kodepos.", telepon_user = '".$telepon."', tingkat_user = '".$tingkat."', kelas_user = '".$kelassma."' WHERE id_user = '".$id."'";
      
      
      mysqli_query($conn, $query);
      echo '<script>
        swal({
          title: "Berhasil!",
          text: "Data Berhasil Diperbaharui !",
          icon: "success"
        }).then(function(){
          window.location.href="../siswa/edit-profil.php?id='.base64_encode($id).'";
        });
      </script>';
    } else{
    $query = "UPDATE user SET nama_user = '".$nama."', jeniskelamin_user = '".$jeniskelamin."', ".$tanggal_lahir.", ".$kegiatan.", ".$alamat.", ".$provinsi.", ".$kota.", ".$kodepos.", telepon_user = '".$telepon."', tingkat_user = NULL, kelas_user = NULL WHERE id_user = '".$id."'";
    
      mysqli_query($conn, $query);
      echo '<script>
        swal({
          title: "Berhasil!",
          text: "Data Berhasil Diperbaharui !",
          icon: "success"
        }).then(function(){
          window.location.href="../siswa/edit-profil.php?id='.base64_encode($id).'";
        });
      </script>';
    }
  } elseif (isset($_POST['gantiFoto'])) {
    $eks	= array('png','jpg', 'jpeg', 'image', 'svg');
  	$nama = $_FILES['foto']['name'];
  	$x = explode('.', $nama);
  	$ekstensi = strtolower(end($x));
  	$file_tmp = $_FILES['foto']['tmp_name'];	
    $id = $_POST['id'];
  	
		if(in_array($ekstensi, $eks) == true){
			$query = mysqli_query($conn, "UPDATE user SET foto_user = '".$nama."' WHERE id_user = '".$id."'");
			if($query){
			  move_uploaded_file($file_tmp, '../assets/img/'.$nama);
  		  echo '<script>
          swal({
            title: "Berhasil!",
            text: "Foto anda berhasil diganti !",
            icon: "success"
          }).then(function(){
            window.location.href="../siswa/edit-profil.php?id='.base64_encode($id).'";
          });
        </script>';
			}else{
  		  echo '<script>
          swal({
            title: "Gagal!",
            text: "Foto anda gagal diganti !",
            icon: "error"
          }).then(function(){
            window.location.href="../siswa/edit-profil.php?id='.base64_encode($id).'";
          });
        </script>';
			}
		} else{
  		  echo '<script>
          swal({
            title: "Gagal!",
            text: "Eksistensi '.$ekstensi.' tidak diperbolehkan !",
            icon: "error"
          }).then(function(){
            window.location.href="../siswa/edit-profil.php?id='.base64_encode($id).'";
          });
        </script>';
		}
  }
?>
</body>