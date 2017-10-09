<?php
if(!isset($_SESSION['role'])){
    ?>
    <?php
    echo '<script language="javascript">alert("Anda harus Login!"); document.location="index.php";</script>';
}
?>