


<?php $this->view('partials/header')?>
<!-- Compiled and minified CSS -->
<link rel="stylesheet" media="all" href="https://unpkg.com/materialize-stepper@3.1.0/dist/css/mstepper.min.css" />
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
	<section class="contact section-register">
	<div class="container">
	<br />
	<br />
	<div class="panel panel-default">
		<div class="panel-heading">Register as <?php echo $this->input->get('user') ;?></div>
		<div class="panel-body">
			<form method="post" action="<?php echo base_url(); ?>index.php/register/validation"  >
				<div class="form-group" hidden>
					<label>Type</label>
					<input type="text" name="user_type" class="form-control" value="<?php echo  $this->input->get('user'); ?>" />
				</div>

				<div class="form-group">
					<label for="user_name">Enter Your Name</label>
					<input type="text" name="user_name" class="form-control" autocomplete="off"/>
					<span class="text-danger" style="color:red;"><?php echo form_error('user_name'); ?></span>
				</div>
				<div class="form-group">
					<label>Enter Your Valid Email Address</label>
					<input type="email" name="user_email" class="form-control"  autocomplete="off"/>
					<span class="text-danger" style="color:red;"><?php echo form_error('user_email'); ?></span>
				</div>
				<div class="form-group">
					<label>Enter Password</label>
					<input type="password" name="user_password" class="form-control" autocomplete="new-password" />
					<span class="text-danger" style="color:red;"><?php echo form_error('user_password'); ?></span>
				</div>
				<div class="form-group">
					<input type="submit" name="register" value="Register" class="btn btn-info" />
					<a href="<?php echo base_url(); ?>index.php/login"><span class="text-danger" style="color:green;float:right;">Already have account?  Login !</span></a>

				</div>
			</form>
		</div>
	</div>
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

<script>
	$(document).ready(function(){



	})
</script>

</html>
