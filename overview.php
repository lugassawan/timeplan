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
            <!-- Ruang untuk input data -->
            <div class="col-md-9">
                    <!-- Nama Produk -->
                    <div class="form-group">
                        <h2 class="mb-sm">Overview</h2>
                        <div class="col-sm-5">
                            <input type="hidden" class="form-control" id="produk" value="">
                        </div>
                    </div>
                    <p>Halaman utama setelah login</p>
                    
                <div style="clear:both">
                
            </div>
            <!-- !Ruang untuk input data -->
        </div>

    </div>

</div>

<?php
	include("main/footer.php");
 ?>