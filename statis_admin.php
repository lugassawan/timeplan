<?php 
	session_start();
	include("main/header.php"); 
    include("inc/koneksi.php"); 
    include("akses/akses_admin.php"); 
?>

<div role="main" class="main">

    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <aside class="sidebar">

                    <ul class="nav nav-list mb-xlg sort-source" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">
                        <li data-option-value="*" class="active"><a href="#">Overview</a></li>
                        <li data-option-value=".fiber"><a href="#">INSTALASI FIBER OPTIK</a></li>
                        <li data-option-value=".route"><a href="#">DESIGN & ROUTE FIBER OPTIK</a></li>
                        <li data-option-value=".radio"><a href="#">INSTALASI RADIO LINK</a></li>
                        <li data-option-value=".bwa"><a href="#">INSTALASI BWA</a></li>
                        <li data-option-value=".vsat"><a href="#">INSTALASI VSAT</a></li>
                        <li data-option-value=".modul"><a href="#">INSTALASI & INTEGRASI MODUL</a></li>
                        <li data-option-value=".bts"><a href="#">INSTALASI BTS</a></li>
                        <li data-option-value=".tower"><a href="#">INSTALASI TOWER</a></li>
                        <li data-option-value=".service"><a href="#">MANAGE SERVICE FIBER OPTIK</a></li>
                        <li data-option-value=".tools"><a href="#">TOOLS</a></li>
                    </ul>

                    <hr class="invisible mt-xl mb-sm">

                    <h4 class="heading-primary">Contact <strong>Us</strong></h4>
                    <p>Contact us or give us a call to discover how we can help.</p>

                    <form id="contactForm" action="#" method="POST">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Your name *</label>
                                    <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Your email address *</label>
                                    <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Subject</label>
                                    <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Message *</label>
                                    <textarea maxlength="5000" data-msg-required="Please enter your message." rows="3" class="form-control" name="message" id="message" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="Send Message" class="btn btn-primary mb-xl" data-loading-text="Loading...">

                                <div class="alert alert-success hidden" id="contactSuccess">
                                    Message has been sent to us.
                                </div>

                                <div class="alert alert-danger hidden" id="contactError">
                                    Error sending your message.
                                </div>
                            </div>
                        </div>
                    </form>

                </aside>
            </div>

            <div class="col-md-9">
                <!-- Nama Produk -->
                <?php
                    // SQL untuk menu
                    $id_menus = $_SESSION['id_produk'];
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