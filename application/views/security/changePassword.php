<?php $this->view('partials/header')?>
<!-- Compiled and minified CSS -->
<head>
</head>
<link rel="stylesheet" media="all" href="https://unpkg.com/materialize-stepper@3.1.0/dist/css/mstepper.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/toastr.min.css">

<style>
	@import url("<?php echo base_url(); ?>assets/css/materialize.css");
	@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css);
	@import url('https://fonts.googleapis.com/css?family=Roboto');

	nav .logo img {
		width: 140px !important;
		height: 70px !important;
	}
</style>


<div class="page-loader"></div>

<div class="wrapper">

	<!-- ======================== Navigation ======================== -->

	<?php $this->view('partials/menu')?>

	<!-- ========================  Tabsy wrapper ======================== -->

	<!-- ========================  Icons slider ======================== -->


	<!-- ========================  Block banner category ======================== -->
	<section class="contact section-register" style="background-color: white;">
		<div class="container card  " style="margin-left: 20%;margin-top:5%;">

			<div class="login-block login-block-signup">

				<div class="h4" style="text-align: center">Change Password </div>

				<hr />
				<div class="row">

					<form method="post" action="<?php echo base_url(); ?>index.php/change-password-treatment">
						<div class="form-group col-md-6 col-md-offset-3">
							<label>Enter your email</label>
							<input type="text" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" />
							<span class="text-danger" style="color:red;"><?php echo form_error('user_email'); ?></span>
						</div>
						<div class="form-group col-md-6 col-md-offset-3">
							<label>Enter Old Password</label>
							<input type="password" name="user_old_password" class="form-control" placeholder="Old Password" />
							<span class="text-danger" style="color:red;"><?php echo form_error('user_old_password'); ?></span>
						</div>
						<div class="form-group col-md-6 col-md-offset-3">
							<label>Enter New Password</label>
							<input type="password" name="user_new_password" class="form-control" placeholder="New Password" />
							<span class="text-danger" style="color:red;"><?php echo form_error('user_new_password'); ?></span>
						</div>
						<div class="form-group col-md-6 col-md-offset-3">
							<input type="submit" name="login" value="Submit" class="btn btn-info" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!--<a style="float:right;" href="<?php /*echo base_url(); */?>register">Forgot password ?</a>-->
						</div>
					</form>

				</div>
			</div> <!--/signup-->

		</div>

	</section>





	<?php $this->view('partials/footer'); ?>

	<div>
		<?php
		$this->load->view('alert');
		?>
	</div>
</div> <!--/wrapper-->
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/toastr.min.js"></script>
<script>
	$(document).ready(function(){

	})
</script>

</html>
