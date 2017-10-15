<?php 
	session_start();
    include("main/header.php"); 
    include("inc/koneksi.php");
    include("akses/akses_tim.php"); 
?>
<html>
<head></head>
<body>
<form method="POST" action="test.php" enctype="multipart/form-data">
<?php
for($i=0;$i<5;$i++){ 
    ?>
    <input type="file" class="form-control" name="<?php echo "file" . $i; ?>"></br>
<?php } ?>
<input type="submit" class="form-control" value="Submit"> </br>
</form>
    <?php
        //Looping untuk menemukan activity yang sesuai menu
        $id_pelanggan = 1;
        $id_menus = 1;
        
        $activitys = mysqli_query($conn,"select * from act_test where id_produk='$id_menus' AND id_pelanggan='$id_pelanggan'");
        //Menghitung total nilai dari field waktu_activity
        //$tot = mysqli_query($conn, "select sum(if(id_produk= $id_menus, waktu_activity, 0)) as waktu_activity from act_test");
        //$rtot = mysqli_fetch_array($tot);
                    
        while($ractivitys = mysqli_fetch_array($activitys)){
                            
    ?>
        <!-- <?php echo $ractivitys['nm_activity'] ?> -->
        <div class="form-group">
            <label class="col-sm-6 form-control-static"><?php echo $ractivitys['nm_activity']; ?></label>
            <label class="col-sm-1 form-control-static control-label">:</label>
            <div class="col-sm-3">
                <p class="form-control-static"><?php echo $ractivitys['waktu_activity']; ?> hari</p>
            </div>
        </div>
                
    <?php 
       }
    ?>

        <div class="row">
           <div id="piechart" style="width: 550px; height: 350px;"></div>
        </div>
</body>
</html>
<?php
include('main/footer.php');
?>