<?php

  session_start();
  
  session_unset();
  session_destroy();

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
<script type="text/javascript">
  swal({
    title: "Berhasil!",
    text: "Anda Berhasil Logout !",
    icon: "success"
  }).then(function(){
    window.location.href="../index.php";
  });
</script>
</body>
    
    