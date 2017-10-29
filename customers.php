<?php 
	session_start();
    include("main/header.php"); 
    include("inc/koneksi.php");
    include("akses/akses_user.php"); 
?>

<div role="main" class="main">

    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <aside class="sidebar">

                    <ul class="nav nav-list mb-xlg sort-source" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
                        <li data-option-value="*" class="active"><a href="overview.php">Overview</a></li>
                        <li data-option-value=".fiber"><a href="menu_act.php?menu=1">INSTALASI FIBER OPTIK</a></li>
                        <li data-option-value=".route"><a href="menu_act.php?menu=2">DESIGN & ROUTE FIBER OPTIK</a></li>
                        <li data-option-value=".radio"><a href="menu_act.php?menu=3">INSTALASI RADIO LINK</a></li>
                        <li data-option-value=".bwa"><a href="menu_act.php?menu=4">INSTALASI BWA</a></li>
                        <li data-option-value=".vsat"><a href="menu_act.php?menu=5">INSTALASI VSAT</a></li>
                        <li data-option-value=".modul"><a href="menu_act.php?menu=6">INSTALASI & INTEGRASI MODUL</a></li>
                        <li data-option-value=".bts"><a href="menu_act.php?menu=7">INSTALASI BTS</a></li>
                        <li data-option-value=".tower"><a href="menu_act.php?menu=8">INSTALASI TOWER</a></li>
                        <li data-option-value=".service"><a href="menu_act.php?menu=9">MANAGE SERVICE FIBER OPTIK</a></li>
                        <li data-option-value=".tools"><a href="#">TOOLS</a></li>
                    </ul>

                    <hr class="invisible mt-xl mb-sm">

                </aside>
            </div>

            <div class="col-md-9">
                <!-- Nama Produk -->
                <?php
                    // SQL untuk menu
                    $id_menus = $_SESSION['id_menu'];
                    $menus = mysqli_query($conn,"select * from produk2 where id_produk='$id_menus'");
                    $rmenus = mysqli_fetch_array($menus);

                ?>
                <div class="form-group">
                    <h2 class="mb-sm"><?php echo $rmenus['nm_produk']; ?></h2>
                </div>

                <!-- Input Activity -->
                <div class="col-md-6">
                <?php
                    //Looping untuk menemukan activity yang sesuai menu
                    $activitys = mysqli_query($conn,"SELECT DISTINCT nm_activity, sum(if(id_produk='$id_menus', waktu_activity, 0)) as waktu_activity FROM act_admin WHERE id_produk='$id_menus' GROUP by nm_activity DESC");
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
                </div>
                <!-- !Input Activity -->
                <div class="col-md-6">
                    <div class="row">
                        <div id="piechart" style="width: 550px; height: 350px;"></div>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>

    </div>

</div>

<?php
	include("main/footer.php");
 ?>