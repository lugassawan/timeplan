<?php
    /* Catatan
	- Secure form yang dibuat
	- Buat alert kalo input salah, dari sisi client
	- Buat alert dari sisi server ( alert error seperi laravel)
	- Untuk pass dan con, dibuat biar langsung ngasih info jika tidak cocok (optional)
    */
?>
<?php 
	include("main/header.php"); 
?>
<section class="form-section register-form">
	<div class="container">
		<h1 class="h2 heading-primary font-weight-normal mb-md mt-lg">Create an Account</h1>

		<div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
			<div class="box-content">
				<form action="register_act.php" method="POST" enctype="multipart/form-data">

					<h4 class="heading-primary text-uppercase mb-lg">PERSONAL INFORMATION</h4>
					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label class="font-weight-normal">Nama Lengkap</label>
								<input type="text" name="name" class="form-control" required>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label class="font-weight-normal">Nama Perusahaan</label>
								<input type="text" name="nm_usaha" class="form-control" required>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label class="font-weight-normal">Username</label>
								<input type="text" name="username" class="form-control" required>
							</div>
						</div>
					</div>

                    <div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label class="font-weight-normal">Email Address</label>
								<input type="email" name="email" class="form-control" required>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label class="font-weight-normal">Password</label>
								<input type="password" name="password" class="form-control" required>
							</div>
						</div>

						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label class="font-weight-normal">Confirm Password</label>
								<input type="password" name="con_pass" class="form-control" required>
							</div>
						</div>
					</div>

                    <h4 class="heading-primary text-uppercase mb-lg">ADDITIONAL INFORMATION</h4>

                    <div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="font-weight-normal">No. Telp</label>
								<input type="text" pattern="^\d{12}$" name="telp" class="form-control" required>
							</div>
                            <div class="form-group">
								<label class="font-weight-normal">Alamat Perusahaan</label>
                                <textarea class="form-control" name="alamat" rows="3" required></textarea>
							</div>
							<div class="form-group">
								<input type="hidden" name="role" class="form-control" value="customers" required>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="font-weight-normal">File Upload</label>
								<input type="file" name="userfile" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12">
							<div class="form-action clearfix mt-none">
								<a href="index" class="pull-left"><i class="fa fa-angle-double-left"></i> Back</a>

								<input type="submit" class="btn btn-primary pull-right" value="Submit">
							</div>
						</div>
				    </div>
				</form>
			</div>
		</div>
	</div>
</section>
<?php
	include("main/footer.php");
?>