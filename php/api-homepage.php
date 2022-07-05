<?php
function randomString($length = 10) {
    $str = "";
    $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str  .= $characters[$rand];
    }
    return $str;
}
  if(isset($_POST['masuk'])){
    echo "<script>
      document.location.href='../masuk.php?token=".randomString()."';
    </script>";
  }
  elseif(isset($_POST['daftar'])){
    echo "<script>
      document.location.href='../daftar.php?token=".randomString()."';
    </script>";
  }

?>