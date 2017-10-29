<?php 
	include("main/header.php"); 
?>

    <section class="form-section">
		<div class="container">
			<h1 class="h2 heading-primary font-weight-normal mb-md mt-lg">Login or Create an Account</h1>

			<div class="featured-box featured-box-primary featured-box-flat featured-box-text-left mt-md">
				<div class="box-content">
					<form action="login_act.php" method="POST">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-content">
									<h3 class="heading-text-color font-weight-normal">New Customers</h3>
									<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
								</div>

								<div class="form-action clearfix">
									<a href="register" class="btn btn-primary">Create an Account</a>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-content">
									<h3 class="heading-text-color font-weight-normal">Registered Customers</h3>
									<p>If you have an account with us, please log in.</p>
									<div class="form-group">
										<label class="font-weight-normal">Username <span class="required">*</span></label>
										<input type="text" class="form-control" name="username" required>
								    </div>

								    <div class="form-group">
										<label class="font-weight-normal">Password <span class="required">*</span></label>
										<input type="password" class="form-control" name="password" required>
									</div>

									<p class="required">* Required Fields</p>
                                    	
									<div class="form-action clearfix">
										<a href="#" class="pull-left">Forgot Your Password?</a>
										<input type="submit" class="btn btn-primary col-md-offset-6" value="Submit">
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