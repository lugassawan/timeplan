<?php 
	session_start();
    include("main/header.php"); 
    include("inc/koneksi.php");
    require_once('functions.php');
    include("akses/akses_tim.php"); 
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
            <!-- Ruang untuk input data -->
            <div class="col-md-9">
                <form class="form-horizontal" action="act_tim.php?id=<?php echo $_SESSION['id_menu']; ?>&user=<?php echo $_SESSION['id_user']; ?>" method="POST" enctype="multipart/form-data">
                    <!-- Nama Produk -->
                    <div class="form-group">
                        <h2 class="mb-sm"><?php echo $_SESSION['nm_menu']; ?></h2>
                        <div class="col-sm-5">
                            <input type="hidden" class="form-control" name="<?php echo $_SESSION['name_menu']; ?>" value="<?php echo $_SESSION['id_menu']; ?>">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <!-- Input Activity -->
                        <div class="col-md-6">
                            <!-- Pelanggan -->
                            <div class="form-group">
                                <label for="pelanggan" class="col-sm-3">Pelanggan</label>
                                <div class="col-sm-7">
                                <?php
                                    if(!empty($_GET)){
                                        $data_get = filter_submittedform($_GET);
                                ?>
                                        <input type="number" class="form-control" name="pelanggan" id="pelanggan" onchange="idpelanggan()" value="<?php echo $data_get['pelanggan'] ?>">
                                <?php
                                    }else{
                                ?>
                                        <input type="number" class="form-control" name="pelanggan" id="pelanggan" onchange="idpelanggan()">
                                <?php
                                    }
                                ?>
                                </div>
                            </div>

                            <?php
                                $id_menus = $_SESSION['id_menu'];
                                //Mendapatkan ID dari GET
                                if(!empty($_GET)){
                                    $id_pelanggan = $_GET['pelanggan'];
                                }else{
                                    $id_pelanggan = 'KOSONG';
                                }
                                //Looping untuk menemukan activity yang sesuai menu
                                $activity_length = $_SESSION['activity_length'];
                                for($i=0;$i<$activity_length;$i++){
                                    $activity[$i] = $_SESSION['activity'][$i];
                                    $activitys = mysqli_query($conn,"select * from activity where id_activity='$activity[$i]'");
                                    $ractivitys = mysqli_fetch_array($activitys);

                                    //Mengambil kata awal di setiap activity
                                    $kt_acti = $ractivitys['nm_activity'];
                                    $jumlah = "1";
                                    $hasil_acti = implode(" ", array_slice(explode(" ", $kt_acti), 0, $jumlah));
                                    
                            ?>
                                <!-- <?php echo $ractivitys['nm_activity']; ?> -->
                                <div class="form-group">
                                    <label for="<?php echo $ractivitys['nm_activity']; ?>" class="col-sm-3"><?php echo $ractivitys['nm_activity']; ?></label>
                                    <div class="col-sm-7">
                                        <input type="hidden" class="form-control" name="<?php echo "nm_" . $hasil_acti; ?>" value="<?php echo $ractivitys['nm_activity']; ?>">
                                        <input type="number" class="form-control" name="<?php echo "waktu_" . $hasil_acti; ?>">
                                        <input type="file" class="form-control" name="<?php echo $hasil_acti . "_file" . $i; ?>">
                                    </div>
                                    hari
                                </div>
                            
                            <?php
                                }
                            ?>

                            <div class="form-group">
                                <div class="col-sm-offset-4">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </div>                        
                        </div>
                        <!-- !Input Activity -->
                        
                        <div class="col-md-6">
                            <div class="row">
                                <div id="piechart" style="width: 550px; height: 350px;"></div>
                            </div>
                        </div>
                        
                    </div>

                    
                </form>
                <div style="clear:both">
                
            </div>
            <!-- !Ruang untuk input data -->
        </div>

    </div>

</div>

<?php
	include("main/footer.php");
 ?>