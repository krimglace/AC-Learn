<?php

  session_start();
  
  if (isset($_SESSION['username_siswa'])) {
    echo '<script>
      document.location.href="siswa/index.php?id='.base64_encode($_SESSION['username_siswa']).'";
    </script>';
  } elseif (isset($_SESSION['username_op'])) {
    echo '<script>
      document.location.href="operator/index.php?id='.base64_encode($_SESSION['username_op']).'";
    </script>';
  }

?>