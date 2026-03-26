
<?php $this->view('partials/header')?>
    <style>
		@import url("<?php echo base_url(); ?>assets/css/materialize.css");
		@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css);
		@import url('https://fonts.googleapis.com/css?family=Roboto');
		nav .logo img {
			width: 140px !important;
			height: 70px !important;
		}
		.owl-carousel .owl-item img {
			width: 90% !important;
		}
		.instagram .gallery .item img{
			height: 171px !important;
		}
	</style>
<div class="page-loader"></div>

<div class="wrapper">

	<?php $this->view('partials/menu' );?>
	<!-- ========================  Tabsy wrapper ======================== -->

	<section class="tabsy-wrapper tabsy-wrapper-intro">

		<!-- === header title === -->

		<header class="hidden">
			<div class="row">
				<div class="col-md-offset-2 col-md-8 text-center">
					<h2 class="title">Latest projects</h2>
				</div>
			</div>
		</header>

		<div class="tabsy" style="background-image:url(<?php echo base_url(); ?>assets/images/sliders/physics.jpg)">

			<!-- === tabsy images === -->

			<div class="tabsy-images">

				<?php foreach($allCategories as $key => $cat) { ?>
				<div id="idImgPrim<?php echo $key+1;?>">
					<div class="h1 title"><small>Category</small> <?php echo $cat->name; ?></div>
					<img <?php if($cat->image!=null){ ?> src="<?php echo base_url(); ?>assets/uploads/categories/<?php echo $cat->image; ?>" <?php }else{ ?> src="<?php echo base_url(); ?>assets/images/sliders/math.jpg" <?php  }?> alt="Alternate Text" />
				</div>
				<?php } ?>
			</div>

			<!-- === tabsy links === -->

			<div class="tabsy-links">

				<div class="row">
					<?php foreach($allCategories as $key => $cat) { ?>
						<figure class="col-xs-6 col-sm-6 col-md-2 current" data-image="idImgPrim<?php echo $key+1;?>">
						<a href="<?php echo base_url(); ?>index.php/student/list/exam-by-category/<?php echo $cat->id;?>" class="link">Anchor link</a>
						<figcaption>
							<span class="h4 title"><?php echo $cat->name; ?></span>
							<span class="desc">You’ve finally reached this point in your life- you’ve bought your first home, moved into your very own apartment...</span>
						</figcaption>
					</figure>
					<?php } ?>

				</div> <!--/row-->
			</div> <!--/tabsy-links-->
		</div> <!--/tabsy--> <!--/container-->

	</section>

	<!-- ========================  Icons slider ======================== -->

	<section class="owl-icons-wrapper">

		<!-- === header === -->

		<header class="hidden">
			<h2>Product categories</h2>
		</header>

		<div class="clearfix">

			<div class="owl-icons owl-icons-rounded">

				<!-- === icon item  for student === -->
				<?php if(array_key_exists('user_type_role',$_SESSION) and $_SESSION['user_type_role']=='Student')  : ?>
					<?php foreach($teachers_by_student as $teacher) { ?>
					<a target="_blank" href="<?php echo base_url(); ?>index.php/student/list/exam/<?php echo $teacher->id; ?>">
						<figure>
							<img src="<?php echo base_url(); ?>assets/images/avatars/teacher<?php echo $teacher->id % 4 +1; ?>.jpg" alt="Alternate Text" />
							<figcaption><?php echo $teacher->name; ?></figcaption>
						</figure>
					</a>
					<?php } ?>
				<?php endif ;?>

				<?php if(array_key_exists('user_type_role',$_SESSION) and $_SESSION['user_type_role']=='Teacher')  : ?>
					<?php foreach($students_by_teacher as $student) { ?>
						<a target="_blank" href="<?php echo base_url(); ?>index.php/teacher/list/exam-by-student/<?php echo $student->id; ?>">
							<figure>
								<img src="<?php echo base_url(); ?>assets/images/avatars/teacher<?php echo $student->id % 4 +1; ?>.jpg" alt="Alternate Text" />
								<figcaption><?php echo $student->name; ?></figcaption>
							</figure>
						</a>
					<?php } ?>
				<?php endif ;?>





			</div> <!--/owl-icons-->
		</div> <!--/container-->
	</section>

	<!-- ========================  Block banner category ======================== -->
	<?php if ( $this->session->userdata('user_type') === 'ROLE_TEACHER' ) { ?>

		<section class="products">

			<!-- === header title === -->

			<header>
				<div class="row">
					<div class="col-md-offset-2 col-md-8 text-center">
						<h2 class="title">Categories</h2>
					</div>
				</div>
			</header>

			<div class="row row-clean">

				<!-- === product-item === -->
				<?php foreach($allCategoriesList as $category) { ?>
					<div class="col-xs-6 col-sm-4 col-lg-2">
						<article>
							<div class="info">
								<!--<span class="add-favorite">
									<a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
								</span>-->
								<!--<span>
										<a href="#productid1" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
									</span>-->
							</div>
							<!--<div class="btn btn-add">
								<i class="icon icon-cart"></i>
							</div>-->
							<div class="figure-grid">
								<div class="image">
									<a href="<?php echo base_url(); ?>index.php/student/list/exam-by-category/<?php echo $category->id;?>" >
										<img src="<?php echo base_url(); ?>assets/images/cat.png" alt="category" />
									</a>
								</div>
								<div class="text">
									<h2 class="title h5">
										<a href="<?php echo base_url(); ?>index.php/student/list/exam-by-category/<?php echo $category->id;?>"><?php echo $category->name; ?></a><br>
										<!--<img src="<?php /*echo base_url(); */?>assets/images/5-stars.png" alt="" width="150"  style="margin-top: -30px !important;"/>-->
									</h2>
									<span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
								</div>
							</div>
						</article>
					</div>
				<?php  } ?>
			</div> <!--/row-->
			<!-- === button more === -->


			<!-- ========================  Product info popup - quick view ======================== -->

		</section>
	<?php } ?>
	<!-- ========================  Best seller ======================== -->
	<?php if ( $this->session->userdata('user_type') === 'ROLE_STUDENT' ) { ?>

	<section class="products">

			<!-- === header title === -->

			<header>
				<div class="row">
					<div class="col-md-offset-2 col-md-8 text-center">
						<h2 class="title">Categories</h2>
					</div>
				</div>
			</header>

			<div class="row row-clean">

				<!-- === product-item === -->
				<?php foreach($allCategoriesList as $category) { ?>
					<div class="col-xs-6 col-sm-4 col-lg-2">
						<article>
							<div class="info">
								<!--<span class="add-favorite">
									<a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
								</span>-->
								<!--<span>
										<a href="#productid1" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
									</span>-->
							</div>
							<!--<div class="btn btn-add">
								<i class="icon icon-cart"></i>
							</div>-->
							<div class="figure-grid">
								<div class="image">
									<a href="<?php echo base_url(); ?>index.php/student/list/exam-by-category/<?php echo $category->id;?>" >
										<img src="<?php echo base_url(); ?>assets/images/cat.png" alt="category" />
									</a>
								</div>
								<div class="text">
									<h2 class="title h5">
										<a href="<?php echo base_url(); ?>index.php/student/list/exam-by-category/<?php echo $category->id;?>"><?php echo $category->name; ?></a><br>
										<!--<img src="<?php /*echo base_url(); */?>assets/images/5-stars.png" alt="" width="150"  style="margin-top: -30px !important;"/>-->
									</h2>
									<span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
								</div>
							</div>
						</article>
					</div>
				<?php  } ?>
			</div> <!--/row-->
			<!-- === button more === -->


			<!-- ========================  Product info popup - quick view ======================== -->

		</section>

	<section class="products">

		<!-- === header title === -->

		<header>
			<div class="row">
				<div class="col-md-offset-2 col-md-8 text-center">
					<h2 class="title">Results</h2>
					<div class="text">
						<p>Most recent</p>
					</div>
				</div>
			</div>
		</header>

		<div class="row row-clean">

			<!-- === product-item === -->
			<?php foreach($results_exam as $exam) { ?>
			<div class="col-xs-6 col-sm-4 col-lg-2">
				<article>
					<div class="info">
                            <!--<span class="add-favorite">
                                <a href="javascript:void(0);" data-title="Add to favorites" data-title-added="Added to favorites list"><i class="icon icon-heart"></i></a>
                            </span>-->
						<!--<span>
                                <a href="#productid1" class="mfp-open" data-title="Quick wiew"><i class="icon icon-eye"></i></a>
                            </span>-->
					</div>
					<!--<div class="btn btn-add">
						<i class="icon icon-cart"></i>
					</div>-->
					<div class="figure-grid">
						<span class="label <?php if($exam->note_by_teacher<10){ ?>label-danger<?php }else{?> label-info<?php }?>">Note : <?php echo $exam->note_by_teacher;?></span>
						<div class="image">
							<a href="" class="mfp-open">
								<img src="<?php echo base_url(); ?>assets/images/question-detective.png" alt=""   style="margin-left: 5%;"/>
							</a>
						</div>
						<div class="text">
							<h2 class="title h5">
								<a href="#">Exam <?php echo $exam->title_exam;?></a><br>
								<!--<img src="<?php /*echo base_url(); */?>assets/images/5-stars.png" alt="" width="150"  style="margin-top: -30px !important;"/>-->
							</h2>
							<span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
						</div>
					</div>
				</article>
			</div>
			<?php  } ?>
		</div> <!--/row-->
		<!-- === button more === -->

		<div class="wrapper-more">
			<a href="<?php echo base_url(); ?>index.php/student/list/exam" class="btn btn-lg">View all</a>
		</div>

		<!-- ========================  Product info popup - quick view ======================== -->

	</section>
	<?php } ?>
	<!-- ========================  Stretcher widget ======================== -->

	<section class="stretcher-wrapper">

		<!-- === stretcher header === -->

		<header>
			<div class="row">
				<div class="col-md-offset-2 col-md-8 text-center">
					<h1 class="h2 title">List of Exams</h1>
					<div class="text">
						<p>Visit old exams or add a new one</p>
					</div>
				</div>
			</div>
		</header>

		<!-- === stretcher === -->

		<ul class="stretcher">

			<!-- === if student === -->
			<?php if(array_key_exists('user_type_role',$_SESSION) and $_SESSION['user_type_role']=='Student')  : ?>
			<?php foreach($exams_by_student as $exam) { ?>
				<li class="stretcher-item" style="background-image:url(<?php echo base_url(); ?>assets/images/assesment.png);">
					<!--logo-item-->
					<div class="stretcher-logo">
						<div class="text">
							<span class="text-intro">Exam  : <?php echo $exam->title_exam; ?><br>
								<?php echo date('d/m/Y h:i:s',strtotime($exam->date_created)); ?></span>
						</div>
					</div>
					<!--main text-->
					<figure>
						<h4>Exam :<?php echo $exam->title_exam ?></h4>
					</figure>
					<!--anchor-->
					<a href="<?php echo base_url(); ?>index.php/student/pass/exam/<?php echo $exam->id ?>">Anchor link</a>
				</li>
			<?php } ?>
				<li class="stretcher-item more">
					<div class="more-icon">
						<span data-title-show="Show more" data-title-hide="+"></span>
					</div>
					<a href="<?php echo base_url(); ?>index.php/student/list/exam"></a>
				</li>
			<?php  endif ;?>
			<!-- === if teacher === -->
			<?php if(array_key_exists('user_type_role',$_SESSION) and $_SESSION['user_type_role']=='Teacher')  : ?>
				<?php foreach($exams_by_student as $exam) { ?>
					<li class="stretcher-item" style="background-image:url(<?php echo base_url(); ?>assets/images/assesment.png);">
						<!--logo-item-->
						<div class="stretcher-logo">
							<div class="text">
								<span class="text-intro">Exam  : <?php echo $exam->title_exam; ?> <br>
									<?php echo date('d/m/Y h:i:s',strtotime($exam->date_created)); ?></span>
							</div>
						</div>
						<!--main text-->
						<figure>
							<h4>Exam :<?php echo $exam->title_exam ?></h4>
						</figure>
						<!--anchor-->
						<a target="_blank" href="<?php echo base_url(); ?>index.php/teacher/adminstrate/exam-by-teacher/<?php echo $exam->exam_id ; ?>">Anchor link</a>
					</li>
				<?php } ?>
				<!-- === stretcher exams more=== -->

				<li class="stretcher-item more">
					<div class="more-icon">
						<span data-title-show="Show more" data-title-hide="+"></span>
					</div>
					<a href="<?php echo base_url(); ?>index.php/teacher/list/exam-by-teacher/<?php echo $idTeacher;?>"></a>
				</li>
			<?php  endif ;?>


		</ul>
	</section>

	<!-- ========================  Cards ======================== -->

	<!-- ========================  Banner ======================== -->


	<!-- ========================  Blog Block ======================== -->

	<!-- ========================  Instagram ======================== -->

	<section class="instagram">

		<!-- === instagram header === -->

		<header>
			<h2 class="h3 title"><br>
			<?php  echo $homePage->title ;?>
			</h2>
			<div class="text">
				<p>@YahiaMas</p>
			</div>
		</header>

		<!-- === instagram gallery === -->

		<div class="gallery clearfix">
			<a class="item" href="#">
				<img  <?php if($homePage->image_1!=null){ ?> src="<?php echo base_url(); ?>assets/uploads/homePage/<?php  echo $homePage->image_1 ;?>" <?php }else{?> src="<?php echo base_url(); ?>assets/images/square-12.jpg" <?php }?> alt="Alternate Text"  />
			</a>
			<a class="item" href="#">
				<img  <?php if($homePage->image_2 !=null){ ?> src="<?php echo base_url(); ?>assets/uploads/homePage/<?php  echo $homePage->image_2 ;?>" <?php }else{?> src="<?php echo base_url(); ?>assets/images/square-12.jpg" <?php }?> alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img  <?php if($homePage->image_3 !=null){ ?> src="<?php echo base_url(); ?>assets/uploads/homePage/<?php  echo $homePage->image_3 ;?>" <?php }else{?> src="<?php echo base_url(); ?>assets/images/square-12.jpg" <?php }?> alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img  <?php if($homePage->image_4 !=null){ ?> src="<?php echo base_url(); ?>assets/uploads/homePage/<?php  echo $homePage->image_4 ;?>" <?php }else{?> src="<?php echo base_url(); ?>assets/images/square-12.jpg" <?php }?> alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img  <?php if($homePage->image_5 !=null){ ?> src="<?php echo base_url(); ?>assets/uploads/homePage/<?php  echo $homePage->image_5 ;?>" <?php }else{?> src="<?php echo base_url(); ?>assets/images/square-12.jpg" <?php }?> alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img  <?php if($homePage->image_6 !=null){ ?> src="<?php echo base_url(); ?>assets/uploads/homePage/<?php  echo $homePage->image_6 ;?>" <?php }else{?> src="<?php echo base_url(); ?>assets/images/square-12.jpg" <?php }?> alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img <?php if($homePage->image_7 !=null){ ?> src="<?php echo base_url(); ?>assets/uploads/homePage/<?php  echo $homePage->image_7 ;?>" <?php }else{?> src="<?php echo base_url(); ?>assets/images/square-12.jpg" <?php }?> alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img  <?php if($homePage->image_8 !=null){ ?> src="<?php echo base_url(); ?>assets/uploads/homePage/<?php  echo $homePage->image_8 ;?>" <?php }else{?> src="<?php echo base_url(); ?>assets/images/square-12.jpg" <?php }?> alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img <?php if($homePage->image_9 !=null){ ?> src="<?php echo base_url(); ?>assets/uploads/homePage/<?php  echo $homePage->image_9 ;?>" <?php }else{?> src="<?php echo base_url(); ?>assets/images/square-12.jpg" <?php }?> alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img <?php if($homePage->image_10 !=null){ ?> src="<?php echo base_url(); ?>assets/uploads/homePage/<?php  echo $homePage->image_10 ;?>" <?php }else{?> src="<?php echo base_url(); ?>assets/images/square-12.jpg" <?php }?> alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img <?php if($homePage->image_11 !=null){ ?> src="<?php echo base_url(); ?>assets/uploads/homePage/<?php  echo $homePage->image_11 ;?>" <?php }else{?> src="<?php echo base_url(); ?>assets/images/square-12.jpg" <?php }?> alt="Alternate Text" />
			</a>
			<a class="item" href="#">
				<img <?php if($homePage->image_12 !=null){ ?> src="<?php echo base_url(); ?>assets/uploads/homePage/<?php  echo $homePage->image_12 ;?>" <?php }else{?> src="<?php echo base_url(); ?>assets/images/square-12.jpg" <?php }?> alt="Alternate Text" />
			</a>
		</div> <!--/gallery-->

	</section>
	<!-- Modal Structure -->
	<div id="modal-show-url" class="modal" style="height:60%;max-height: 33% !important;padding-right: 0 !important;">
		<div class="modal-content">
			<h4>Copy the url to stend to Students</h4>
			<div class="input-field col s12">
				<?php if($this->session->flashdata('showUrl')){ ?>
				<p  id="url-to-be-copied" style="color:blue"><?php echo $this->session->flashdata('showUrl');?></p>
				<?php  } ?>
			</div>
			<button class="btn" data-clipboard-target="#url-to-be-copied">Copy to clipboard <i class="fa fa-copy"></i></button>

		</div>

		<div class="modal-footer">
			<a class="modal-action
                    modal-close waves-effect waves-green
                    btn green lighten-1 copy-text"  data-clipboard-target="#url-to-be-copied">
				Close
			</a>
		</div>
	</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/clipboard@2/dist/clipboard.min.js"></script>

<?php $this->view('partials/footer'); ?>
	<div>
		<?php
		$this->load->view('alert');
		?>
	</div>
</div> <!--/wrapper-->
<script>
	$(document).ready(function(){
		<?php if(array_key_exists('user_type_role',$_SESSION) and $_SESSION['user_type_role']=='Teacher' and $this->session->flashdata('showUrl')) { ?>
		$('#modal-show-url').modal('show');
		$('.modal-close').click(function (){
			$('#modal-show-url').modal('hide');
		});
		<?php  } ?>
	})
</script>
<script>
	var clipboard = new ClipboardJS('.btn');
	clipboard.on('success', function(e) {
		console.log(e);
	});
	clipboard.on('error', function(e) {
		console.log(e);
	});
</script>

</html>
