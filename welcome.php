<?php 
	session_start();
    include("main/header.php"); 
    include("inc/koneksi.php");
?>

<div role="main" class="main">

    <div class="container">

        <div class="row">
            <!-- Ruang untuk input data -->
            <div class="col-md-offset-3">
                    <p>Selamat Anda telah berhasil registrasi. Silahkan login melalui link dibawah ini.</p>
                    </br>
                    <div class="col-md-offset-3">
                        <a href="index">Login</a>
                    </div>
            </div>
            <!-- !Ruang untuk input data -->
        </div>

    </div>

</div>

<?php
	include("main/footer.php");
 ?>