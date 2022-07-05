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
  
  if(isset($_POST['tambahPend'])){
    $id = $_POST['id'];
    $jenjang = $_POST['jenjangPend'];
    $institusi = $_POST['instPend'];
    $cek = $_POST['masihPend'];
    $mulai = $_POST['mulaiPend'];
    $selesai = $_POST['selesaiPend'];
    $nilai = $_POST['nilaiPend'];
    $lampiran = $_FILES['lamPend']['name'];
    $eks	= array('png','jpg', 'jpeg', 'image', 'svg', 'pdf', 'doc', 'docx');
  	$x = explode('.', $lampiran);
  	$ekstensi = strtolower(end($x));
  	$file_tmp = $_FILES['lamPend']['tmp_name'];
  	
  	if ($lampiran == "") {
  			if ($cek == 'on') {
  			  $query = mysqli_query($conn, "INSERT INTO pendidikan_user(id_user, jenjang_pend, institusi_pend, mulai_pend, selesai_pend, keterangan_pend, nilai_pend, file_pend) VALUES ('".$id."', '".$jenjang."', '".$institusi."', '".$mulai."', null, 'On', '".$nilai."', '')");
  			  if ($query) {
      		  echo '<script>
              swal({
                title: "Berhasil!",
                text: "Data Pendidikan Berhasil Ditambahkan !",
                icon: "success"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  } else {
      		  echo '<script>
              swal({
                title: "Gagal!",
                text: "Data Pendidikan Gagal Ditambahkan !",
                icon: "error"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  }
  			} else {
  			  $query = mysqli_query($conn, "INSERT INTO pendidikan_user(id_user, jenjang_pend, institusi_pend, mulai_pend, selesai_pend, keterangan_pend, nilai_pend, file_pend) VALUES ('".$id."', '".$jenjang."', '".$institusi."', '".$mulai."', '".$selesai."', null, '".$nilai."', '')");
  			  if ($query) {
      		  echo '<script>
              swal({
                title: "Berhasil!",
                text: "Data Pendidikan Berhasil Ditambahkan !",
                icon: "success"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  } else {
      		  echo '<script>
              swal({
                title: "Gagal!",
                text: "Data Pendidikan Gag      		  al Ditambahkan !",
                icon: "error"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  }
  			}
  	} else {
  		if(in_array($ekstensi, $eks) == true){
  			if ($cek == 'on') {
  			  $query = mysqli_query($conn, "INSERT INTO pendidikan_user(id_user, jenjang_pend, institusi_pend, mulai_pend, selesai_pend, keterangan_pend, nilai_pend, file_pend) VALUES ('".$id."', '".$jenjang."', '".$institusi."', '".$mulai."', null, 'On', '".$nilai."', '".$lampiran."')");
  			  if ($query) {
            move_uploaded_file($file_tmp, '../assets/img/'.$lampiran);
      		  echo '<script>
              swal({
                title: "Berhasil!",
                text: "Data Pendidikan Berhasil Ditambahkan !",
                icon: "success"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  } else {
      		  echo '<script>
              swal({
                title: "Gagal!",
                text: "Data Pendidikan Gagal Ditambahkan !",
                icon: "error"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  }
  			} else {
  			  $query = mysqli_query($conn, "INSERT INTO pendidikan_user(id_user, jenjang_pend, institusi_pend, mulai_pend, selesai_pend, keterangan_pend, nilai_pend, file_pend) VALUES ('".$id."', '".$jenjang."', '".$institusi."', '".$mulai."', '".$selesai."', null, '".$nilai."', '".$lampiran."')");
  			  if ($query) {
            move_uploaded_file($file_tmp, '../assets/img/'.$lampiran);
      		  echo '<script>
              swal({
                title: "Berhasil!",
                text: "Data Pendidikan Berhasil Ditambahkan !",
                icon: "success"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  } else {
      		  echo '<script>
              swal({
                title: "Gagal!",
                text: "Data Pendidikan Gagal Ditambahkan !",
                icon: "error"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  }
  			}
  		} else{
  		  echo '<script>
          swal({
            title: "Gagal!",
            text: "Eksistensi '.$ekstensi.' tidak diperbolehkan !",
            icon: "error"
          }).then(function(){
            window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
          });
        </script>';
  		}
  	}
  } elseif(isset($_POST['tambahMen'])){
    $id = $_POST['id'];
    $institusi = $_POST['instMen'];
    $pelajaran = $_POST['pelMen'];
    $cek = $_POST['masihMen'];
    $mulai = $_POST['mulaiMen'];
    $selesai = $_POST['selesaiMen'];
    $deskripsi = $_POST['desMen'];
    $lampiran = $_FILES['serMen']['name'];
    
    $eks	= array('png','jpg', 'jpeg', 'image', 'svg', 'pdf', 'doc', 'docx');
  	$x = explode('.', $lampiran);
  	$ekstensi = strtolower(end($x));
  	$file_tmp = $_FILES['serMen']['tmp_name'];
  	
  	if ($lampiran == "") {
  			if ($cek == 'on') {
  			  $query = mysqli_query($conn, "INSERT INTO mengajar_user(id_user, institusi_men, mapel_men, mulai_men, selesai_men, keterangan_men, deskripsi_men, file_men) VALUES ('".$id."', '".$institusi."', '".$pelajaran."', '".$mulai."', null, 'On', '".$deskripsi."', '')");
  			  if ($query) {
      		  echo '<script>
              swal({
                title: "Berhasil!",
                text: "Data Pengalaman Mengajar Berhasil Ditambahkan !",
                icon: "success"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  } else {
      		  echo '<script>
              swal({
                title: "Gagal!",
                text: "Data Pengalaman Mengajar Gagal Ditambahkan !",
                icon: "error"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  }
  			} else {
  			  $query = mysqli_query($conn, "INSERT INTO mengajar_user(id_user, institusi_men, mapel_men, mulai_men, selesai_men, keterangan_men, deskripsi_men, file_men) VALUES ('".$id."', '".$institusi."', '".$pelajaran."', '".$mulai."', '".$selesai."', null, '".$deskripsi."', '')");

  			  if ($query) {
      		  echo '<script>
              swal({
                title: "Berhasil!",
                text: "Data Pengalaman Mengajar Berhasil Ditambahkan !",
                icon: "success"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  } else {
      		  echo '<script>
              swal({
                title: "Gagal!",
                text: "Data Pengalaman Mengajar Gagal Ditambahkan !",
                icon: "error"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  }
  			}
  	} else {
  		if(in_array($ekstensi, $eks) == true){
  			if ($cek == 'on') {
  			  $query = mysqli_query($conn, "INSERT INTO mengajar_user(id_user, institusi_men, mapel_men, mulai_men, selesai_men, keterangan_men, deskripsi_men, file_men) VALUES ('".$id."', '".$institusi."', '".$pelajaran."', '".$mulai."', null, 'On', '".$deskripsi."', '".$lampiran."')");
  			  
  			  if ($query) {
            move_uploaded_file($file_tmp, '../assets/img/'.$lampiran);
      		  echo '<script>
              swal({
                title: "Berhasil!",
                text: "Data Pengalaman Mengajar Berhasil Ditambahkan !",
                icon: "success"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  } else {
      		  echo '<script>
              swal({
                title: "Gagal!",
                text: "Data Pengalaman Mengajar Gagal Ditambahkan !",
                icon: "error"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  }
  			} else {
  			  $query = mysqli_query($conn, "INSERT INTO mengajar_user(id_user, institusi_men, mapel_men, mulai_men, selesai_men, keterangan_men, deskripsi_men, file_men) VALUES ('".$id."', '".$institusi."', '".$pelajaran."', '".$mulai."', '".$selesai."', null, '".$deskripsi."', '".$lampiran."')");
  			  
  			  if ($query) {
            move_uploaded_file($file_tmp, '../assets/img/'.$lampiran);
      		  echo '<script>
              swal({
                title: "Berhasil!",
                text: "Data Pengalaman Mengajar Berhasil Ditambahkan !",
                icon: "success"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  } else {
      		  echo '<script>
              swal({
                title: "Gagal!",
                text: "Data Pengalaman Mengajar Gagal Ditambahkan !",
                icon: "error"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  }
  			}
  		} else{
  		  echo '<script>
          swal({
            title: "Gagal!",
            text: "Eksistensi '.$ekstensi.' tidak diperbolehkan !",
            icon: "error"
          }).then(function(){
            window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
          });
        </script>';
  		}
  	}
  } elseif(isset($_POST['tambahNMen'])){
    $id = $_POST['id'];
    $institusi = $_POST['instNMen'];
    $jabatan = $_POST['jabNMen'];
    $cek = $_POST['masihNMen'];
    $mulai = $_POST['mulaiNMen'];
    $selesai = $_POST['selesaiNMen'];
    $deskripsi = $_POST['desNMen'];
    $lampiran = $_FILES['serNMen']['name'];
    
    $eks	= array('png','jpg', 'jpeg', 'image', 'svg', 'pdf', 'doc', 'docx');
  	$x = explode('.', $lampiran);
  	$ekstensi = strtolower(end($x));
  	$file_tmp = $_FILES['serNMen']['tmp_name'];
  	
  	if ($lampiran == "") {
  			if ($cek == 'on') {
  			  $query = mysqli_query($conn, "INSERT INTO nonmengajar_user(id_user, institusi_nmen, jabatan_nmen, mulai_nmen, selesai_nmen, keterangan_nmen, deskripsi_nmen, file_nmen) VALUES ('".$id."', '".$institusi."', '".$jabatan."', '".$mulai."', null, 'On', '".$deskripsi."', '')");
  			  if ($query) {
      		  echo '<script>
              swal({
                title: "Berhasil!",
                text: "Data Pengalaman Bekerja Berhasil Ditambahkan !",
                icon: "success"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  } else {
      		  echo '<script>
              swal({
                title: "Gagal!",
                text: "Data Pengalaman Bekerja Gagal Ditambahkan !",
                icon: "error"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  }
  			} else {
  			  $query = mysqli_query($conn, "INSERT INTO nonmengajar_user(id_user, institusi_nmen, jabatan_nmen, mulai_nmen, selesai_nmen, keterangan_nmen, deskripsi_nmen, file_nmen) VALUES ('".$id."', '".$institusi."', '".$jabatan."', '".$mulai."', '".$selesai."', null, '".$deskripsi."', '')");

  			  if ($query) {
      		  echo '<script>
              swal({
                title: "Berhasil!",
                text: "Data Pengalaman Bekerja Berhasil Ditambahkan !",
                icon: "success"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  } else {
      		  echo '<script>
              swal({
                title: "Gagal!",
                text: "Data Pengalaman Bekerja Gagal Ditambahkan !",
                icon: "error"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  }
  			}
  	} else {
  		if(in_array($ekstensi, $eks) == true){
  			if ($cek == 'on') {
  			  $query = mysqli_query($conn, "INSERT INTO nonmengajar_user(id_user, institusi_nmen, jabatan_nmen, mulai_nmen, selesai_nmen, keterangan_nmen, deskripsi_nmen, file_nmen) VALUES ('".$id."', '".$institusi."', '".$jabatan."', '".$mulai."', null, 'On', '".$deskripsi."', '".$lampiran."')");
  			  
  			  if ($query) {
            move_uploaded_file($file_tmp, '../assets/img/'.$lampiran);
      		  echo '<script>
              swal({
                title: "Berhasil!",
                text: "Data Pengalaman Bekerja Berhasil Ditambahkan !",
                icon: "success"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  } else {
      		  echo '<script>
              swal({
                title: "Gagal!",
                text: "Data Pengalaman Bekerja Gagal Ditambahkan !",
                icon: "error"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  }
  			} else {
  			  $query = mysqli_query($conn, "INSERT INTO nonmengajar_user(id_user, institusi_nmen, jabatan_nmen, mulai_nmen, selesai_nmen, keterangan_nmen, deskripsi_nmen, file_nmen) VALUES ('".$id."', '".$institusi."', '".$jabatan."', '".$mulai."', '".$selesai."', null, '".$deskripsi."', '".$lampiran."')");
  			  
  			  if ($query) {
            move_uploaded_file($file_tmp, '../assets/img/'.$lampiran);
      		  echo '<script>
              swal({
                title: "Berhasil!",
                text: "Data Pengalaman Bekerja Berhasil Ditambahkan !",
                icon: "success"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  } else {
      		  echo '<script>
              swal({
                title: "Gagal!",
                text: "Data Pengalaman Bekerja Gagal Ditambahkan !",
                icon: "error"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  }
  			}
  		} else{
  		  echo '<script>
          swal({
            title: "Gagal!",
            text: "Eksistensi '.$ekstensi.' tidak diperbolehkan !",
            icon: "error"
          }).then(function(){
            window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
          });
        </script>';
  		}
  	}
  } elseif(isset($_POST['tambahorg'])){
    $id = $_POST['id'];
    $nama = $_POST['namaorg'];
    $jabatan = $_POST['jaborg'];
    $cek = $_POST['masihorg'];
    $mulai = $_POST['mulaiorg'];
    $selesai = $_POST['selesaiorg'];
    $deskripsi = $_POST['desorg'];
    $lampiran = $_FILES['serorg']['name'];
    
    $eks	= array('png','jpg', 'jpeg', 'image', 'svg', 'pdf', 'doc', 'docx');
  	$x = explode('.', $lampiran);
  	$ekstensi = strtolower(end($x));
  	$file_tmp = $_FILES['serorg']['tmp_name'];
  	
  	if ($lampiran == "") {
  			if ($cek == 'on') {
  			  $query = mysqli_query($conn, "INSERT INTO organisasi_user(id_user, nama_org, jabatan_org, mulai_org, selesai_org, keterangan_org, deskripsi_org, file_org) VALUES ('".$id."', '".$nama."', '".$jabatan."', '".$mulai."', null, 'On', '".$deskripsi."', '')");
  			  if ($query) {
      		  echo '<script>
              swal({
                title: "Berhasil!",
                text: "Data Pengalaman Organisasi Berhasil Ditambahkan !",
                icon: "success"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  } else {
      		  echo '<script>
              swal({
                title: "Gagal!",
                text: "Data Pengalaman Organisasi Gagal Ditambahkan !",
                icon: "error"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  }
  			} else {
  			  $query = mysqli_query($conn, "INSERT INTO organisasi_user(id_user, nama_org, jabatan_org, mulai_org, selesai_org, keterangan_org, deskripsi_org, file_org) VALUES ('".$id."', '".$nama."', '".$jabatan."', '".$mulai."', '".$selesai."', null, '".$deskripsi."', '')");

  			  if ($query) {
      		  echo '<script>
              swal({
                title: "Berhasil!",
                text: "Data Pengalaman Bekerja Berhasil Ditambahkan !",
                icon: "success"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  } else {
      		  echo '<script>
              swal({
                title: "Gagal!",
                text: "Data Pengalaman Bekerja Gagal Ditambahkan !",
                icon: "error"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  }
  			}
  	} else {
  		if(in_array($ekstensi, $eks) == true){
  			if ($cek == 'on') {
  			  $query = mysqli_query($conn, "INSERT INTO organisasi_user(id_user, nama_org, jabatan_org, mulai_org, selesai_org, keterangan_org, deskripsi_org, file_org) VALUES ('".$id."', '".$institusi."', '".$nama."', '".$mulai."', null, 'On', '".$deskripsi."', '".$lampiran."')");
  			  
  			  if ($query) {
            move_uploaded_file($file_tmp, '../assets/img/'.$lampiran);
      		  echo '<script>
              swal({
                title: "Berhasil!",
                text: "Data Pengalaman Organisasi Berhasil Ditambahkan !",
                icon: "success"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  } else {
      		  echo '<script>
              swal({
                title: "Gagal!",
                text: "Data Pengalaman Organisasi Gagal Ditambahkan !",
                icon: "error"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  }
  			} else {
  			  $query = mysqli_query($conn, "INSERT INTO organisasi_user(id_user, nama_org, jabatan_org, mulai_org, selesai_org, keterangan_org, deskripsi_org, file_org) VALUES ('".$id."', '".$nama."', '".$jabatan."', '".$mulai."', '".$selesai."', null, '".$deskripsi."', '".$lampiran."')");
  			  
  			  if ($query) {
            move_uploaded_file($file_tmp, '../assets/img/'.$lampiran);
      		  echo '<script>
              swal({
                title: "Berhasil!",
                text: "Data Pengalaman Organisasi Berhasil Ditambahkan !",
                icon: "success"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  } else {
      		  echo '<script>
              swal({
                title: "Gagal!",
                text: "Data Pengalaman Organisasi Gagal Ditambahkan !",
                icon: "error"
              }).then(function(){
                window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
              });
            </script>';
  			  }
  			}
  		} else{
  		  echo '<script>
          swal({
            title: "Gagal!",
            text: "Eksistensi '.$ekstensi.' tidak diperbolehkan !",
            icon: "error"
          }).then(function(){
            window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
          });
        </script>';
  		}
  	}
  } elseif(isset($_POST['tambahpres'])){
    $id = $_POST['id'];
    $nama = $_POST['namapres'];
    $lembaga = $_POST['lempres'];
    $waktu = $_POST['waktupres'];
    $deskripsi = $_POST['despres'];
    $lampiran = $_FILES['serpres']['name'];
    
    $eks	= array('png','jpg', 'jpeg', 'image', 'svg', 'pdf', 'doc', 'docx');
  	$x = explode('.', $lampiran);
  	$ekstensi = strtolower(end($x));
  	$file_tmp = $_FILES['serpres']['tmp_name'];
  	
  	if ($lampiran == "") {
			  $query = mysqli_query($conn, "INSERT INTO prestasi_user(id_user, nama_prestasi, lembaga_prestasi, waktu_prestasi, deskripsi_prestasi, file_prestasi) VALUES ('".$id."', '".$nama."', '".$lembaga."', '".$waktu."', '".$deskripsi."', '')");
			  if ($query) {
    		  echo '<script>
            swal({
              title: "Berhasil!",
              text: "Data Prestasi Berhasil Ditambahkan !",
              icon: "success"
            }).then(function(){
              window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
            });
          </script>';
			  } else {
    		  echo '<script>
            swal({
              title: "Gagal!",
              text: "Data Prestasi Gagal Ditambahkan !",
              icon: "error"
            }).then(function(){
              window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
            });
          </script>';
			  }
  	} else {
  		if(in_array($ekstensi, $eks) == true){
			  $query = mysqli_query($conn, "INSERT INTO prestasi_user(id_user, nama_prestasi, lembaga_prestasi, waktu_prestasi, deskripsi_prestasi, file_prestasi) VALUES ('".$id."', '".$nama."', '".$lembaga."', '".$waktu."', '".$deskripsi."', '$lampiran')");
			  if ($query) {
    		  echo '<script>
            swal({
              title: "Berhasil!",
              text: "Data Prestasi Berhasil Ditambahkan !",
              icon: "success"
            }).then(function(){
              window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
            });
          </script>';
			  } else {
    		  echo '<script>
            swal({
              title: "Gagal!",
              text: "Data Prestasi Gagal Ditambahkan !",
              icon: "error"
            }).then(function(){
              window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
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
            window.location.href="../siswa/riwayat-hidup.php?id='.base64_encode($id).'";
          });
        </script>';
  		}
  	}
  } elseif(isset($_POST['kelas'])){
    if($_POST['chk'] == ""){
		  echo '<script>
        swal({
          title: "Gagal!",
          text: "Pilih minimal satu kelas !",
          icon: "error"
        }).then(function(){
          window.location.href="../siswa/pilihan-mengajar.php?id='.base64_encode($id).'";
        });
      </script>';
    } else{
      foreach ($_POST['chk'] as $val){
        $queselect = mysqli_query($conn, "SELECT * FROM kelas_mengajar WHERE id_user = '".$_POST['id_user']."' AND nama_kelas = '".$val."'");
       
        if(mysqli_num_rows($queselect) > 0){
    		  echo '<script>
            swal({
              title: "Gagal!",
              text: "Anda telah memilih kelas ini sebelumnya !",
              icon: "error"
            }).then(function(){
              window.location.href="../siswa/pilihan-mengajar.php?id='.base64_encode($id).'";
            });
          </script>';
        }else{
        $query = mysqli_query($conn, "INSERT INTO kelas_mengajar(id_user, nama_kelas) VALUES('".$_POST['id_user']."', '".$val."')");
		  echo '<script>
        swal({
          title: "Berhasil!",
          text: "Data kelas berhasil ditambahkan !",
          icon: "success"
        }).then(function(){
          window.location.href="../siswa/pilihan-mengajar.php?id='.base64_encode($id).'";
        });
      </script>';
        }
      }
    }
  } elseif(isset($_POST['pengajar'])){
    $select = mysqli_query($conn, "SELECT * FROM daftar_pengajar WHERE id_user = '".$_POST['id']."'");
    if(mysqli_num_rows($select) > 0){
		  echo '<script>
        swal({
          title: "Gagal!",
          text: "Anda sudah mendaftarkan data anda sebelumnya!",
          icon: "error"
        }).then(function(){
          window.location.href="../siswa/jadiguru.php?id='.base64_encode($id).'";
        });
      </script>';
    }else{
      $query = mysqli_query($conn, "INSERT INTO daftar_pengajar(id_user, status) VALUES('".$_POST['id']."', 'pending')");
      if ($query == true) {
  		  echo '<script>
          swal({
            title: "Berhasil!",
            text: "Admin akan segera memproses data anda !",
            icon: "success"
          }).then(function(){
            window.location.href="../siswa/jadiguru.php?id='.base64_encode($id).'";
          });
        </script>';
      } else {
  		  
      }
    }
  }elseif(isset($_POST['keranjang'])){
    $nama = $_POST['nama_paket'];
    $id = $_POST['id_user'];
    $awal = $_POST['hargaawal'];
    $banyak = $_POST['banyakbulan'];
    $total = $_POST['totalharga'];
 
    $cari = mysqli_query($conn, "SELECT * FROM keranjang WHERE id_user = '".$id."'");
    if(mysqli_num_rows($cari) > 0){
  		  echo '<script>
          swal({
            title: "Gagal!",
            text: "Masih ada pesanan di keranjang anda !",
            icon: "error"
          }).then(function(){
            window.location.href="../siswa/keranjang.php?id='.base64_encode($id).'";
          });
        </script>';
    } else{
    $query = mysqli_query($conn, "INSERT INTO keranjang(id_user, nama_paket, jumlah_bulan, total_harga, harga1) VALUES('".$id."', '".$nama."', '".$banyak."', '".$total."', '".$awal."')");
    if ($query == true) {
		  echo '<script>
        swal({
          title: "Berhasil!",
          text: "Pesanan anda sudah masuk ke keranjang !",
          icon: "success"
        }).then(function(){
          window.location.href="../siswa/keranjang.php?id='.base64_encode($id).'";
        });
      </script>';
    } else {
		  
    }
    }
  } elseif(isset($_POST['saran'])){
    $id = $_POST['id'];
    $isi = $_POST['masukan'];
    
    $query = mysqli_query($conn, "INSERT INTO masukan(id_user, isi_masukan) VALUES('".$id."', '".$isi."')");
    if ($query == true) {
		  echo '<script>
        swal({
          title: "Berhasil!",
          text: "Pesan dan Masukan anda berhasil dikirim !",
          icon: "success"
        }).then(function(){
          window.location.href="../siswa/masukan.php?id='.base64_encode($id).'";
        });
      </script>';
    } else {
		  
    }
  }
?>
</body>