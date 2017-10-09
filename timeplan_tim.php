<?php 
	session_start();
    include("main/header.php"); 
    include("inc/koneksi.php");
    include("akses/akses_tim.php"); 
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
            <!-- Ruang untuk input data -->
            <div class="col-md-9">
                <form class="form-horizontal" action="" method="POST">
                    <!-- Nama Produk -->
                    <div class="form-group">
                        <h2 class="mb-sm">INSTALASI FIBER OPTIK</h2>
                        <div class="col-sm-5">
                            <input type="hidden" class="form-control" id="produk" value="">
                        </div>
                    </div>

                    <!-- Input Activity -->
                    <div class="col-md-9">
                        <!-- Pelanggan -->
                        <div class="form-group">
                            <label for="pelanggan" class="col-sm-2">Pelanggan</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" name="pelanggan" value="">
                            </div>
                        </div>

                        <!-- Survey -->
                        <div class="form-group">
                            <label for="survey" class="col-sm-2">Survey</label></label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="survey">
                                <input type="file" class="form-control" id="survey_file">
                            </div>
                            hari
                        </div>

                        <!-- Perizinan -->
                        <div class="form-group">
                            <label for="perizinan" class="col-sm-2">Perizinan</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="perizinan">
                                <input type="file" class="form-control" id="perizinan_file">
                            </div>
                            hari
                        </div>

                        <!-- Pengadaan Material -->
                        <div class="form-group">
                            <label for="pengadaan" class="col-sm-2">Pengadaan Material</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="pengadaan">
                                <input type="file" class="form-control" id="pengadaan_file">
                            </div>
                            hari
                        </div>

                        <!-- Installasi -->
                        <div class="form-group">
                            <label for="installasi" class="col-sm-2">Installasi</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="installasi">
                                <input type="file" class="form-control" id="installasi_file">
                            </div>
                            hari
                        </div>

                        <!-- Uji Terima ATP -->
                        <div class="form-group">
                            <label for="atp" class="col-sm-2">Uji Terima (ATP)</label>
                            <div class="col-sm-5">
                                <input type="number" class="form-control" id="atp">
                                <input type="file" class="form-control" id="atp_file">
                            </div>
                            hari
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </div><!-- !Input Activity -->

                    
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