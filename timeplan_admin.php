<?php 
	include("main/header.php"); 
?>

<div role="main" class="main" style="background:yellow;">

    <div class="container">

        <div class="row">
            <div class="col-md-3" style="background:blue;">
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

                    <form id="contactForm" action="php/contact-form.php" method="POST">
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

                <div class="row" style="background:red;">
                    ......................
                </div>

            </div>
            <!-- !Ruang untuk input data -->
        </div>

    </div>

</div>

<?php
	include("main/footer.php");
 ?>