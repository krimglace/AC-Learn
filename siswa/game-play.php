<?php
 include '../php/api-session-siswa.php';
 //echo($id_user);
 
 include 'header.php';
  $queryGame = mysqli_query($conn, "SELECT * FROM ac_game WHERE id_game = '".$_GET['id']."'");
  $resGame = mysqli_fetch_assoc($queryGame);
?>
<style>
.loading-halaman::before {
    content:" ";
    display:block;
    position:fixed;
    z-index:10;
    height:2px;
    width:100%;
    top:0;
    left:0;
    background-color: #1a73e8;
    -webkit-animation: load-halaman infinite ease-out 2s;
            animation: load-halaman infinite ease-out 2s;
    -webkit-box-shadow:0 2px 2px rgba(0,0,0,.2);
            box-shadow:0 2px 2px rgba(0,0,0,.2);
}

@-webkit-keyframes load-halaman {
    from {
        background-color: #ffc422;
    }
    to {
        background-color: #c0392b;
    }
}

@keyframes load-halaman {
    from {
        background-color: #ffc422;
    }
    to {
        background-color: #c0392b;
    }
}
</style>

<div class="loading-halaman"></div>
<embed src="<?=$resGame['link_game']?>" type="" height="100%" width="100%">
<script>
window.addEventListener("beforeunload", function(e) {
    document.body.className = "loading-halaman";
}, false);
</script>
<?php
  include 'footer.php';
?>