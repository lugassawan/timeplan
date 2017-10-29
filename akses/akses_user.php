<?php
if(!isset($_SESSION['role'])){
    ?>
    <?php
    echo '<script language="javascript">document.location="index";</script>';
}
?>