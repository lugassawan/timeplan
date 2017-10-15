<?php
if(!isset($_SESSION['role'])){
    ?>
    <?php
    echo '<script language="javascript">alert("Anda harus Login!"); document.location="index.php";</script>';
}else{
    if($_SESSION["role"] != "admin"){
    echo '<script language="javascript">alert("Access Denied!"); history.go(-1);</script>'; 
    }
}
?>