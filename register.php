<?php 
	include("main/header.php"); 
?>
<section class="form-section register-form">
	<div class="container">
		<h1 class="h2 heading-primary font-weight-normal mb-md mt-lg">Create an Account</h1>

		<div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
			<div class="box-content">
				<form action="#" method="POST">

					<h4 class="heading-primary text-uppercase mb-lg">PERSONAL INFORMATION</h4>
					<div class="row">
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label class="font-weight-normal">Nama Lengkap</label>
								<input type="text" class="form-control" required>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label class="font-weight-normal">Nama Perusahaan</label>
								<input type="text" class="form-control" required>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<div class="form-group">
								<label class="font-weight-normal">Email Address</label>
								<input type="email" class="form-control" required>
							</div>
						</div>
					</div>

                    <div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="font-weight-normal">Password</label>
								<input type="password" class="form-control" required>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="font-weight-normal">Confirm Password</label>
								<input type="password" class="form-control" required>
							</div>
						</div>
					</div>

                    <h4 class="heading-primary text-uppercase mb-lg">ADDITIONAL INFORMATION</h4>

                    <div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="font-weight-normal">No. Telp</label>
								<input type="number" class="form-control" required>
							</div>
                            <div class="form-group">
								<label class="font-weight-normal">Alamat Perusahaan</label>
                                <textarea class="form-control" rows="3" required></textarea>
							</div>
						</div>

						<div class="col-sm-6">
							<div class="form-group">
								<label class="font-weight-normal">File Upload</label>
								<input type="file" required>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12">
							<div class="form-action clearfix mt-none">
								<a href="index.php" class="pull-left"><i class="fa fa-angle-double-left"></i> Back</a>

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