<!-- ======================== Navigation ======================== -->

<nav>

	<div class="clearfix">

		<a href="<?php echo base_url(); ?>index.php/index" class="logo"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Yahia-mas" width="30"/></a>

		<!-- ==========  Pre navigation ========== -->

		<div class="navigation navigation-pre clearfix">
			<div class="row">
				<div class="col-md-3">
					<a href="#"><i class="icon icon-heart-pulse"></i> <?= lang('help_center') ?></a>
				</div>
				<div class="col-md-3">
					<a href="#"><i class="icon icon-phone"></i> Contact us</a>
				</div>
				<div class="col-md-3">
					<a href="#"></a>
				</div>
				<div class="col-md-3">
					<a href="#"></a>
				</div>
			</div>
		</div>

		<!-- ==========  Top navigation ========== -->

		<div class="navigation navigation-top clearfix">
			<ul>
				<!--add active class for current page-->
				<li class="left-side"><a href="index.html" class="logo-icon"><!--<img src="<?php /*echo base_url(); */?>assets/images/icon.png" alt="Alternate Text" /></a>--></li>
				<li class="left-side"><a href="<?php echo base_url(); ?>index.php/register?user=teacher"><img alt="teacher" src="<?php echo base_url(); ?>assets/images/teacher.png" width="30" /></a></li>
				<!--

					// Use active class for current state

					<li class="left-side active"><a href="#">Man</a></li>

				-->
				<li class="left-side"><a href="<?php echo base_url(); ?>index.php/register?user=student"><img alt="student" src="<?php echo base_url(); ?>assets/images/57_Student.jpg" width="30" /></a></li>
<!--				<li class="left-side"><a href="<?php /*echo base_url(); */?>index.php/register?user=admin"><img alt="admin" src="<?php /*echo base_url(); */?>assets/images/58_Admin.jpg" width="30" /></a></li>
-->				<li><a href="javascript:void(0);" class="open-login"><i class="icon icon-user"></i></a></li>
				<li><a href="javascript:void(0);" class="open-search"><i class="icon icon-magnifier"></i></a></li>
				<!--<li><a href="javascript:void(0);" class="open-cart"><i class="icon icon-cart"></i> <span>4</span></a></li>-->
			</ul>
		</div>

		<!-- ==========  Main navigation ========== -->

		<div class="navigation navigation-main">
			<a href="#" class="open-login"><i class="icon icon-user"></i></a>
			<a href="#" class="open-search"><i class="icon icon-magnifier"></i></a>
<!--			<a href="#" class="open-cart"><i class="icon icon-cart"></i> <span>4</span></a>
-->			<a href="#" class="open-menu"><i class="icon icon-menu"></i></a>
			<div class="floating-menu">
				<!--mobile toggle menu trigger-->
				<div class="close-menu-wrapper">
					<span class="close-menu"><i class="icon icon-cross"></i></span>
				</div>
				<ul>
					<li>
						<a href="#">Home <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
						<div class="navbar-dropdown navbar-dropdown-single">
							<div class="navbar-box">
								<div class="box-full">
									<div class="box clearfix">
										<ul>
											<li class="" ><a href="<?php echo base_url(); ?>index.php/index">Home</a></li>
											<?php $id= $this->session->userdata('id'); if ( !isset($id)  ) : ?>
											<li class="" ><a href="<?php echo base_url(); ?>index.php/login">Login</a></li>
											<?php endif ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li>
						<a href="#">Pages <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
						<div class="navbar-dropdown navbar-dropdown-single">
							<div class="navbar-box">
								<div class="box-full">
									<div class="box clearfix">
										<ul>
											<li class="label">Exams</li>
											<?php if ( $this->session->userdata('user_type') === 'ROLE_ADMIN' ) : ?>
												<li><a  style="cursor: pointer;" href="<?php echo base_url(); ?>index.php/admin/edit-home-page">Edit Home page</a></li>
												<li><a  style="cursor: pointer;" href="<?php echo base_url(); ?>index.php/admin/edit-footer">Edit Footer</a></li>
												<li><a  style="cursor: pointer;" href="<?php echo base_url(); ?>index.php/admin/edit-whatsapp">Edit Whatsapp</a></li>
												<li><a  style="cursor: pointer;" href="<?php echo base_url(); ?>index.php/admin/list-categories">Edit Categories</a></li>
											<?php endif; ?>
											<?php if ( $this->session->userdata('user_type') === 'ROLE_TEACHER' ) : ?>
											<li><a  style="cursor: pointer;" href="<?php echo base_url(); ?>index.php/teacher/teacher-exam">Add Exam</a></li>
												<li><a style="cursor: pointer;" href="<?php echo base_url(); ?>index.php/teacher/list/exam-by-teacher/<?php echo $this->session->userdata('idTeacher'); ?>">List Exams</a></li>
											<?php endif; ?>
											<?php if ( $this->session->userdata('user_type') === 'ROLE_STUDENT' ) : ?>
												<li><a style="cursor: pointer;" href="<?php echo base_url(); ?>index.php/student/list/exam">List Exams</a></li>
											<?php endif; ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</li>
					<!--<li>
						<a href="#">Questions <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
						<div class="navbar-dropdown navbar-dropdown-single">
							<div class="navbar-box">
								<div class="box-full">
									<div class="box clearfix">
										<ul>
											<li class="label">Questions</li>
											<li><a href="#">Q1</a></li>
											<li><a href="#">Q2</a></li>
											<li><a href="#">Q3</a></li>
											<li><a href="#">Q4</a></li>
											<li><a href="#">Q5</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</li>-->
					<!--<li>
						<a href="#">Reviews <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
						<div class="navbar-dropdown navbar-dropdown-single">
							<div class="navbar-box">
								<div class="box-full">
									<div class="box clearfix">
										<ul>
											<li class="label">Blog pages</li>
											<li><a href="#">Blog grid</a></li>
											<li><a href="#">Blog list</a></li>
											<li><a href="#">Blog fullpage</a></li>
											<li><a href="#">Blog ideas</a></li>
											<li><a href="#">Article</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</li>-->

					<!--<li class="nav-settings">
						<a href="javascript:void(0);"><span class="nav-settings-value">USD</span> <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
						<div class="navbar-dropdown navbar-dropdown-single">
							<div class="navbar-box">
								<div class="box-full">
									<div class="box clearfix">
										<ul class="nav-settings-list">
											<li><a href="javascript:void(0);">USD</a></li>
											<li><a href="javascript:void(0);">EUR</a></li>
											<li><a href="javascript:void(0);">GBP</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</li>-->
					<li class="nav-settings">
						<a href="javascript:void(0);"><span class="nav-settings-value">ENG</span> <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
						<div class="navbar-dropdown navbar-dropdown-single">
							<div class="navbar-box">
								<div class="box-full">
									<div class="box clearfix">
										<ul class="nav-settings-list">
											<li><a href="javascript:void(0);">ENG</a></li>
											<li><a href="javascript:void(0);">لعربية</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>

		<!-- ==========  Search wrapper ========== -->

		<div class="search-wrapper">
			<input class="form-control" placeholder="Search..." />
			<button class="btn btn-main">Go!</button>
		</div>

		<!-- ==========  Login wrapper ========== -->
		<?php if(!$this->session->userdata('id')):?>
			<div class="login-wrapper">
				<div class="h4">Sign in</div>
				<form method="post" action="<?php echo base_url(); ?>index.php/login/validation">
					<div class="form-group">
						<input type="email" name="user_email" class="form-control" value="<?php echo set_value('user_email'); ?>" id="exampleInputEmail1" placeholder="Email">
						<span class="text-danger" style="color:red;"><?php echo form_error('user_email'); ?></span>
					</div>
					<div class="form-group">
						<input type="password" name="user_password"  class="form-control" id="exampleInputPassword1" value="<?php echo set_value('user_password'); ?>" placeholder="Password">
						<span class="text-danger" style="color:red;"><?php echo form_error('user_password'); ?></span>
					</div>
					<div class="form-group">
						<a href="#forgotpassword" class="open-popup">Forgot password?</a>
						<a href="#createaccount" class="open-popup">Don't have an account?</a>
					</div>
					<button type="submit" class="btn btn-block btn-main">Submit</button>
				</form>
			</div>
		<?php else:?>
			<div class="login-wrapper card-profile ">
				<div class="background"></div>

				<div class="outer-div">
					<div class="inner-div">
						<div class="front">
							<div class="front__bkg-photo"></div>
							<div class="front__face-photo" <?php if($_SESSION['user_image']!='') { ?> style="background: url('<?php echo base_url().'assets/uploads/'.$_SESSION['user_image'];?>');    background-size: 120px; " <?php  } ?>></div>
							<div class="front__text">
								<h3 class="front__text-header"><?php echo $_SESSION['user_name']; ?></h3>
								<p class="front__text-para"><i class="fas fa-map-marker-alt front-icons"></i><?php echo $_SESSION['user_email']; ?></p>

								<span class="front__text-hover"><?php echo $_SESSION['user_type_role']; ?></span>
							</div>
						</div>
						<div class="back">
							<div class="social-media-wrapper">
								<a href="<?php echo base_url(); ?>index.php/change-password" class="social-icon" style="color:black;"><i class="fa fa-key" aria-hidden="true"></i>Change password</a>
								<a href="<?php echo base_url(); ?>index.php/edit-profile" class="social-icon" style="color:black;"><i class="fa fa-cog" aria-hidden="true"></i>Edit profile</a>
								<a href="<?php echo base_url(); ?>index.php/logout" class="social-icon" style="color:black;"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
							</div>
						</div>

					</div>
				</div>

			</div>
		<?php endif;?>


		<!-- ==========  Cart wrapper ========== -->

		<div class="cart-wrapper">
			<div class="checkout">
				<div class="clearfix">

					<!--cart item-->

					<div class="row">

						<div class="cart-block cart-block-item clearfix">
							<div class="image">
								<a href="product.html"><img src="<?php echo base_url(); ?>assets/images/product-1.png" alt="" /></a>
							</div>
							<div class="title">
								<div><a href="product.html">Product item</a></div>
								<small>Product category</small>
							</div>
							<div class="quantity">
								<input type="number" value="2" class="form-control form-quantity" />
							</div>
							<div class="price">
								<span class="final">$ 1.998</span>
								<span class="discount">$ 2.666</span>
							</div>
							<!--delete-this-item-->
							<span class="icon icon-cross icon-delete"></span>
						</div>

						<!--cart item-->

						<div class="cart-block cart-block-item clearfix">
							<div class="image">
								<a href="product.html"><img src="<?php echo base_url(); ?>assets/images/product-2.png" alt="" /></a>
							</div>
							<div class="title">
								<div><a href="product.html">Product item</a></div>
								<small>Product category</small>
							</div>
							<div class="quantity">
								<input type="number" value="2" class="form-control form-quantity" />
							</div>
							<div class="price">
								<span class="final">$ 1.998</span>
								<span class="discount">$ 2.666</span>
							</div>
							<!--delete-this-item-->
							<span class="icon icon-cross icon-delete"></span>
						</div>

						<!--cart item-->

						<div class="cart-block cart-block-item clearfix">
							<div class="image">
								<a href="product.html"><img src="<?php echo base_url(); ?>assets/images/product-3.png" alt="" /></a>
							</div>
							<div class="title">
								<div><a href="product.html">Product item</a></div>
								<small>Product category</small>
							</div>
							<div class="quantity">
								<input type="number" value="2" class="form-control form-quantity" />
							</div>
							<div class="price">
								<span class="final">$ 1.998</span>
								<span class="discount">$ 2.666</span>
							</div>
							<!--delete-this-item-->
							<span class="icon icon-cross icon-delete"></span>
						</div>

						<!--cart item-->

						<div class="cart-block cart-block-item clearfix">
							<div class="image">
								<a href="product.html"><img src="<?php echo base_url(); ?>assets/images/product-4.png" alt="" /></a>
							</div>
							<div class="title">
								<div><a href="product.html">Product item</a></div>
								<small>Product category</small>
							</div>
							<div class="quantity">
								<input type="number" value="2" class="form-control form-quantity" />
							</div>
							<div class="price">
								<span class="final">$ 1.998</span>
								<span class="discount">$ 2.666</span>
							</div>
							<!--delete-this-item-->
							<span class="icon icon-cross icon-delete"></span>
						</div>
					</div>

					<hr />

					<!--cart prices -->

					<div class="clearfix">
						<div class="cart-block cart-block-footer clearfix">
							<div>
								<strong>Discount 15%</strong>
							</div>
							<div>
								<span>$ 159,00</span>
							</div>
						</div>

						<div class="cart-block cart-block-footer clearfix">
							<div>
								<strong>Shipping</strong>
							</div>
							<div>
								<span>$ 30,00</span>
							</div>
						</div>

						<div class="cart-block cart-block-footer clearfix">
							<div>
								<strong>VAT</strong>
							</div>
							<div>
								<span>$ 59,00</span>
							</div>
						</div>
					</div>

					<hr />

					<!--cart final price -->

					<div class="clearfix">
						<div class="cart-block cart-block-footer clearfix">
							<div>
								<strong>Total</strong>
							</div>
							<div>
								<div class="h4 title">$ 1259,00</div>
							</div>
						</div>
					</div>


					<!--cart navigation -->

					<div class="cart-block-buttons clearfix">
						<div class="row">
							<div class="col-xs-6">
								<a href="products-grid.html" class="btn btn-clean-dark">Continue shopping</a>
							</div>
							<div class="col-xs-6 text-right">
								<a href="checkout-1.html" class="btn btn-main"><span class="icon icon-cart"></span> Checkout</a>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</nav>

