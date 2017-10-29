<?php
if(!isset($_SESSION['role'])){
    ?>
    <?php
    echo '<script language="javascript">document.location="index";</script>';
}else{
    if($_SESSION['role'] != "tim" AND $_SESSION['role'] != "admin"){
        echo '<script language="javascript">history.go(-1);</script>';
    } 
}
?>