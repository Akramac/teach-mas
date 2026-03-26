
<?php $this->view('partials/header')?>
<!-- Compiled and minified CSS -->
<style>
	@import url("<?php echo base_url(); ?>assets/css/materialize.css");
	@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css);
	@import url('https://fonts.googleapis.com/css?family=Roboto');

	nav .logo img {
		width: 140px !important;
		height: 70px !important;
	}
	/* style uploader */
	.uploader {
		display: block;
		clear: both;
		margin: 0 auto;
		width: 100%;
		max-width: 600px;
	}
	.uploader label {
		float: left;
		clear: both;
		width: 100%;
		padding: 2rem 1.5rem;
		text-align: center;
		background: #fff;
		border-radius: 7px;
		border: 3px solid #eee;
		transition: all 0.2s ease;
		user-select: none;
	}
	.uploader label:hover {
		border-color: #454cad;
	}
	.uploader label.hover {
		border: 3px solid #454cad;
		box-shadow: inset 0 0 0 6px #eee;
	}
	.uploader label.hover #start i.fa {
		transform: scale(0.8);
		opacity: 0.3;
	}
	.uploader #start {
		float: left;
		clear: both;
		width: 100%;
	}
	.uploader #start.hidden {
		display: none;
	}
	.uploader #start i.fa {
		font-size: 50px;
		margin-bottom: 1rem;
		transition: all 0.2s ease-in-out;
	}
	.uploader #response {
		float: left;
		clear: both;
		width: 100%;
	}
	.uploader #response.hidden {
		display: none;
	}
	.uploader #response #messages {
		margin-bottom: 0.5rem;
	}
	.uploader #file-image {
		display: inline;
		margin: 0 auto 0.5rem auto;
		width: auto;
		height: auto;
		max-width: 180px;
	}
	.uploader #file-image.hidden {
		display: none;
	}
	.uploader #notimage {
		display: block;
		float: left;
		clear: both;
		width: 100%;
	}
	.uploader #notimage.hidden {
		display: none;
	}
	.uploader progress, .uploader .progress {
		display: inline;
		clear: both;
		margin: 0 auto;
		width: 100%;
		max-width: 180px;
		height: 8px;
		border: 0;
		border-radius: 4px;
		background-color: #eee;
		overflow: hidden;
	}
	.uploader .progress[value]::-webkit-progress-bar {
		border-radius: 4px;
		background-color: #eee;
	}
	.uploader .progress[value]::-webkit-progress-value {
		background: linear-gradient(to right, #393f90 0%, #454cad 50%);
		border-radius: 4px;
	}
	.uploader .progress[value]::-moz-progress-bar {
		background: linear-gradient(to right, #393f90 0%, #454cad 50%);
		border-radius: 4px;
	}
	.uploader input[type="file"] {
		display: none;
	}
	.uploader div {
		margin: 0 0 0.5rem 0;
		color: #5f6982;
	}
	.uploader .btn {
		display: inline-block;
		margin: 0.5rem 0.5rem 1rem 0.5rem;
		clear: both;
		font-family: inherit;
		font-weight: 700;
		font-size: 14px;
		text-decoration: none;
		text-transform: initial;
		border: none;
		border-radius: 0.2rem;
		outline: none;
		padding: 0 1rem;
		height: 36px;
		line-height: 36px;
		color: #fff;
		transition: all 0.2s ease-in-out;
		box-sizing: border-box;
		background: #454cad;
		border-color: #454cad;
		cursor: pointer;
	}


	/* style countdown */

	.countdown {
		display: grid;
		margin: 1em auto;
		width: 20em;
		height: 20em;
	}
	.countdown::after {
		grid-column: 1;
		grid-row: 1;
		place-self: center;
		font: 5em/ 2 ubuntu mono, consolas, monaco, monospace;
		animation: num 20s steps(1) infinite;
		content: '0:' counter(s,decimal-leading-zero);
	}
	@keyframes num {
		0% {
			counter-reset: s 20;
		}
		5% {
			counter-reset: s 19;
		}
		10% {
			counter-reset: s 18;
		}
		15% {
			counter-reset: s 17;
		}
		20% {
			counter-reset: s 16;
		}
		25% {
			counter-reset: s 15;
		}
		30% {
			counter-reset: s 14;
		}
		35% {
			counter-reset: s 13;
		}
		40% {
			counter-reset: s 12;
		}
		45% {
			counter-reset: s 11;
		}
		50% {
			counter-reset: s 10;
		}
		55% {
			counter-reset: s 9;
		}
		60% {
			counter-reset: s 8;
		}
		65% {
			counter-reset: s 7;
		}
		70% {
			counter-reset: s 6;
		}
		75% {
			counter-reset: s 5;
		}
		80% {
			counter-reset: s 4;
		}
		85% {
			counter-reset: s 3;
		}
		90% {
			counter-reset: s 2;
		}
		95% {
			counter-reset: s 1;
		}
		100% {
			counter-reset: s 0;
		}
	}
	svg {
		grid-column: 1;
		grid-row: 1;
	}
	[r] {
		fill: none;
		stroke: silver;
	}
	[r] + [r] {
		transform: rotate(-90deg);
		stroke-linecap: round;
		stroke: #8a9b0f;
		animation: arc 20s linear infinite;
		animation-name: arc, col;
	}
	@keyframes arc {
		0% {
			stroke-dashoffset: 0px;
		}
	}
	@keyframes col {
		0% {
			stroke: #8a9b0f;
		}
		25% {
			stroke: #f8ca00;
		}
		50% {
			stroke: #e97f02;
		}
		75% {
			stroke: #bd1550;
		}
		100% {
			stroke: #490a3d;
		}
	}
	/*  style multi step form */

	/*
Common
*/

	.wizard,
	.tabcontrol
	{
		display: block;
		width: 100%;
		overflow: hidden;
	}

	.wizard a,
	.tabcontrol a
	{
		outline: 0;
	}

	.wizard ul,
	.tabcontrol ul
	{
		list-style: none !important;
		padding: 0;
		margin: 0;
	}

	.wizard ul > li,
	.tabcontrol ul > li
	{
		display: block;
		padding: 0;
	}

	/* Accessibility */
	.wizard > .steps .current-info,
	.tabcontrol > .steps .current-info
	{
		position: absolute;
		left: -999em;
	}

	.wizard > .content > .title,
	.tabcontrol > .content > .title
	{
		position: absolute;
		left: -999em;
	}

	/*
		Wizard
	*/

	.wizard > .steps
	{
		position: relative;
		display: block;
		width: 100%;
	}

	.wizard.vertical > .steps
	{
		display: inline;
		float: left;
		width: 30%;
	}

	.wizard > .steps .number
	{
		font-size: 1.429em;
	}

	.wizard > .steps > ul > li
	{
		width: 25%;
	}

	.wizard > .steps > ul > li,
	.wizard > .actions > ul > li
	{
		float: left;
	}

	.wizard.vertical > .steps > ul > li
	{
		float: none;
		width: 100%;
	}

	.wizard > .steps a,
	.wizard > .steps a:hover,
	.wizard > .steps a:active
	{
		display: block;
		width: auto;
		margin: 0 0.5em 0.5em;
		padding: 1em 1em;
		text-decoration: none;

		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
	}

	.wizard > .steps .disabled a,
	.wizard > .steps .disabled a:hover,
	.wizard > .steps .disabled a:active
	{
		background: #eee;
		color: #aaa;
		cursor: default;
	}

	.wizard > .steps .current a,
	.wizard > .steps .current a:hover,
	.wizard > .steps .current a:active
	{
		background: #2184be;
		color: #fff;
		cursor: default;
	}

	.wizard > .steps .done a,
	.wizard > .steps .done a:hover,
	.wizard > .steps .done a:active
	{
		background: #9dc8e2;
		color: #fff;
	}

	.wizard > .steps .error a,
	.wizard > .steps .error a:hover,
	.wizard > .steps .error a:active
	{
		background: #ff3111;
		color: #fff;
	}

	.wizard > .actions
	{
		position: relative;
		display: block;
		text-align: right;
		width: 100%;
	}

	.wizard.vertical > .actions
	{
		display: inline;
		float: right;
		margin: 0 2.5%;
		width: 95%;
	}

	.wizard > .actions > ul
	{
		display: inline-block;
		text-align: right;
	}

	.wizard > .actions > ul > li
	{
		margin: 0 0.5em;
	}

	.wizard.vertical > .actions > ul > li
	{
		margin: 0 0 0 1em;
	}

	.wizard > .actions a,
	.wizard > .actions a:hover,
	.wizard > .actions a:active
	{
		background: #2184be;
		color: #fff;
		display: block;
		padding: 0.5em 1em;
		text-decoration: none;

		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
	}

	.wizard > .actions .disabled a,
	.wizard > .actions .disabled a:hover,
	.wizard > .actions .disabled a:active
	{
		background: #eee;
		color: #aaa;
	}


	/*  style colors form step */

	ul.stepper .step.active::before, ul.stepper .step.done::before
	{
		background-color: #ec5252 !important;
	}
	.blue {
		background-color: #ec5252 !important;
	}

	@media only screen and (min-width: 993px){
		ul.stepper.horizontal .step.active .step-title::before, ul.stepper.horizontal .step.done .step-title::before
		{
			background-color: #ec5252;
		}

		#sortlistOrder{
			margin-left: 20%;
		}
		.div-after-label{
			margin-top: 7% !important;
		}

	}
	.owl-carousel .owl-item img {
		width: 90% !important;
	}

	/* drag style  */
	.example-parent {
		border: 2px solid #DFA612;
		color: black;
		display: flex;
		font-family: sans-serif;
		font-weight: bold;
	}

	.example-origin {
		flex-basis: 100%;
		flex-grow: 1;
		padding: 10px;
	}

	.example-draggable {
		background-color: #4AAE9B;
		font-weight: normal;
		margin-bottom: 10px;
		margin-top: 10px;
		padding: 10px;
	}

	.example-dropzone {
		background-color: #6DB65B;
		flex-basis: 50%;
		flex-grow: 1;
		padding: 10px;
	}
	ul.stepper.horizontal .step .step-content .step-actions{
		position: relative !important;
	}


	/*  style drag and drop */
	/* (A) LIST STYLES */
	.slist, .correspList {
		list-style: none;
		padding: 0;
		margin: 0;
	}
	.slist li, .correspList li {
		margin: 10px;
		padding: 15px;
		border: 1px solid #dfdfdf;
		background: #f5f5f5;
	}
	.correspList li {
		margin: 10px;
		padding: 15px;
		border: 1px solid #ec5252;
		background: #f5f5f5;
	}

	/* (B) DRAG-AND-DROP HINT */
	.slist li.hint {
		border: 1px solid #ffc49a;
		background: #feffb4;
	}
	.slist li.active {
		border: 1px solid #ffa5a5;
		background: #ffe7e7;
	}

	.card-options:hover{
		cursor: pointer;
	}

	/* selected card choice */

	.activated-card{
		border: 3px solid #ec5252;
		box-shadow: 0 0 5px 5px #ec5252;

	}
	.div-after-label{
		margin-top: 15%;
	}

	/* Pagination css */

	/*** fixing bug on reflex ***/
	:root {
		--c2: #004a6a;
	}

	body {
		overflow-y: auto;
		width: 100vw;
		height: 100vh;
		margin: 0;
		display: flex;
		align-items: center;
		justify-content: center;
		font-family: Arial, Helvetica, serif;
		font-size: 18px;
		background: radial-gradient(circle at 50% 0%, #6cafc3, rgba(255, 255, 255, 0)), radial-gradient(circle at 50% 100%, #6cafc3, #1a456e);
	}
	body * {
		box-sizing: border-box;
	}

	.gallery {
		display: flex;
		align-items: center;
		flex-direction: column;
		position: relative;
		padding-top: 60px;
	}
	.gallery:before, .gallery:after {
		content: "";
		position: absolute;
		width: 14px;
		height: 14px;
		border: 0 solid #fff;
		border-width: 0 0 3px 3px;
		transform: rotate(45deg);
		left: 15px;
		top: 11px;
		border-radius: 2px;
		opacity: 0.5;
		animation: hide-s 2s ease 6s 1;
		animation-fill-mode: forwards;
	}
	.gallery:after {
		left: inherit;
		right: 15px;
		transform: rotate(-135deg);
	}

	.resizer {
		position: absolute;
		top: 0;
		width: calc(100% - 45px);
		height: 36px;
		overflow: hidden;
		text-align: center;
		color: #fff;
		line-height: 38px;
		font-weight: 500;
		letter-spacing: 1px;
		animation: letter-s 2s ease 0s 3 alternate, hide-s 2s ease 6s 1;
		animation-fill-mode: backwards, forwards;
		opacity: 0.5;
	}
	.resizer:before, .resizer:after {
		content: "";
		position: absolute;
		width: calc(50% - 125px);
		border-bottom: 4px dotted #fff;
		margin-left: 20px;
		top: 18px;
		left: 0;
		animation: lines-s 2s ease 0s 3 alternate;
	}
	.resizer:after {
		right: 15px;
		left: inherit;
		margin-right: 7px;
	}

	@keyframes letter-s {
		0% {
			letter-spacing: 8px;
		}
		100% {
			letter-spacing: 1px;
		}
	}
	@keyframes lines-s {
		0% {
			width: calc(50% - 175px);
		}
		100% {
			width: calc(50% - 125px);
		}
	}
	@keyframes hide-s {
		0% {
			opacity: 0.5;
		}
		100% {
			opacity: 0.2;
		}
	}
	.item:after {
		content: "";
		background-color: rgba(255, 255, 255, 0.6);
		opacity: 0.6;
		top: 0;
		bottom: 0;
		left: -100%;
		position: absolute;
		width: 5vmin;
		box-shadow: 0 0 10vmin 2.5vmin #fff;
		transform: skew(-20deg);
		transition: all 0.25s ease;
	}
	.item:hover:before {
		opacity: 0;
		transition: opacity 0.65s ease 0s;
	}
	.item:hover:after {
		left: 400px;
		transition: left 0.5s ease 0s;
	}

	/*** Navigation ***/
	.pagination {
		text-align: center;
	}
	.pagination ul {
		padding: 0 0px;
		margin: 10px 0 0;
		background: rgba(255, 255, 255, 0.1333333333);
		border-radius: 10px;
	}
	.pagination ul li {
		display: inline-flex;
		margin: 5px;
		color: #fff;
		height: 50px;
	}

	.pagination li {
		vertical-align: baseline;
	}

	.pagination li a {
		padding: 10px;
		background: rgba(255, 255, 255, 0.8666666667);
		color: var(--c2);
		text-decoration: none;
		border-radius: 5px;
		line-height: 20px;
	}

	.pagination li.page_link a:hover {
		background: var(--c2);
		color: #fff;
	}

	.pagination li.active_page a {
		background: var(--c2);
		color: #fff;
	}

	.pagination li > span {
		color: #000;
		font-weight: bold;
		font-size: 15px;
		top: -4px;
		position: relative;
	}

	.pagination li a span {
		min-width: 20px;
		display: inline-block;
	}

	.pagination li.page_link.active_page.active a {
		cursor: default;
	}

	li.previous_link a, li.next_link a,
	li.first_link a, li.last_link a {
		background: rgba(255, 255, 255, 0);
		/* border: 2px solid #fff; */
		color: black;
		display: block;
		padding: 10px 12px;
	}

	li.previous_link a:before, li.next_link a:before,
	li.first_link a:before, li.last_link a:before {
		content: "";
		border: 2px solid #000;
		width: 12px;
		height: 12px;
		display: block;
		position: absolute;
		border-width: 3px 0 0 3px;
		transform: rotate(-45deg);
		margin-top: 3px;
		margin-left: 3px;
		border-radius: 2px;
	}

	li.next_link a:before,
	li.last_link a:before {
		transform: rotate(135deg);
		margin-left: -3px;
	}

	li.first_link a:before, li.last_link a:before {
		filter: drop-shadow(5px 5px 0 #000);
		margin-left: 0px;
	}

	li.previous_link a:hover, li.next_link a:hover,
	li.first_link a:hover, li.last_link a:hover {
		background: var(--c2);
		border-color: var(--c2);
	}

	li.no_more.disabled {
		opacity: 0.5;
		pointer-events: none;
	}

	li.page_link.first.active_page.active a {
		cursor: default;
	}

	@media screen and (orientation: landscape) and (max-width: 800px) {
		.pagination ul {
			margin-top: 20px;
		}
		.resizer {
			top: 5px;
		}
		.gallery:before, .gallery:after {
			top: 16px;
		}
	}
</style>
<div class="page-loader"></div>

<div class="wrapper">

	<!-- ======================== Navigation ======================== -->
	<?php $this->view('partials/menu')?>

	<!-- ========================  Tabsy wrapper ======================== -->

	<!-- ========================  Icons slider ======================== -->

	<section class="owl-icons-wrapper">

		<!-- === header === -->

		<header class="hidden">
			<h2>Product categories</h2>
		</header>

		<div class="clearfix">

			<div class="owl-icons owl-icons-rounded ">

				<?php foreach($listTeachersByAdmin as $teacher) { ?>
					<a <?php  if($teacher->approved_by_admin!=false) {?>href="<?php echo base_url(); ?>index.php/admin/administration/<?php echo $teacher->id ; ?>" <?php } ?>>
						<figure>
							<img src="<?php echo base_url(); ?>assets/images/avatars/teacher<?php echo $teacher->id % 4 +1; ?>.jpg" alt="Alternate Text" />
							<figcaption><?php echo $teacher->name; ?></figcaption>
						</figure>
						<?php  if($teacher->approved_by_admin==false) {?>
							<img src="<?php echo base_url(); ?>assets/images/not_approved.png" alt="Alternate Text"  />

						<?php } ?>
					</a>
				<?php } ?>



			</div> <!--/owl-icons-->
		</div> <!--/container-->
	</section>
	<!-- ========================  Block banner category ======================== -->

	<!-- ========================  Best seller ======================== -->

	<section class="contact section-questions">

		<!-- === Goolge map === -->

		<div id="map" style="background-image:url(<?php echo base_url(); ?>assets/images/backgrounds/wall.jpg)"></div>

		<div class="container products">
			<div class="row row-clean">

				<!-- === product-filters === -->

				<div class="col-md-3 col-xs-12">
					<div class="filters">
						<!--Teachers-->
						<div class="filter-box active">
							<div class="title">
								Teachers List
							</div>
							<div class="filter-content">
								<?php foreach($listTeachersByAdmin as $teacher) { ?>
									<span class="checkbox">
										<input type="radio" class="check-teacher" name="teacher<?php echo $teacher->id; ?>" id="teacher<?php echo $teacher->id; ?>">
										<label for="teacher<?php echo $teacher->id; ?>"><?php echo $teacher->name; ?> <i></i></label>
                                	</span>
								<?php } ?>

								<span class="checkbox">
                                    <input type="checkbox" id="allTeachers">
                                    <label for="allTeachers">All Professors <i></i></label>
                                </span>
							</div>
						</div> <!--/filter-box-->
						<!--close filters on mobile / update filters class removed .toggle-filters-close-->
						<div type="button" class=" btn btn-main" id="submit-search-by-teachers">
							Update search
						</div>

					</div> <!--/filters-->

					<div class="filters">
						<!--Teachers-->
						<form method="POST" action="<?php echo base_url(); ?>index.php/admin/add-category">
						<div class="filter-box active">
							<div class="title">
								Categories List
							</div>
							<div class="filter-content">
								<?php foreach($categories as $key => $categorie) { ?>
									<span class="checkbox">
										<label><?php echo $key+1 ; ?> . <?php echo $categorie->name; ?> <i></i></label>
                                	</span>
								<?php } ?>

								<span class="checkbox">

                                    <label for="category">Add new Category</label>

											<input type="text" placeholder="Write name of category"  id="category" name="category" >

                                </span>
							</div>
						</div> <!--/filter-box-->
						<!--close filters on mobile / update filters class removed .toggle-filters-close-->
						<input type="submit" class=" btn btn-main" value="Add Category" id="submit-category">
						</form>

					</div> <!--/filters-->
				</div>

				<!-- === product items === -->

				<div class="col-md-9 col-xs-12">

					<div class="sort-bar clearfix">
						<div class="sort-options pull-right">
							<span class="hidden-xs">List of Exams of all teachers</span>
							<!--Grid-list view-->
							<span class="grid-list" hidden>
                                <a href="products-grid.html" > <i class="fa fa-th-large"></i></a>
                            </span>
						</div>
					</div>

					<div class="row row-clean pagination-container">

						<!--teacher-details-->

						<div class="col-md-12">
							<?php if(count($teacherChoosen)>0){ ?>
								<p><a style="font-weight: bold;">Name of the teacher:</a> <?php echo $teacherChoosen[0]->name?></p>
							<p><a style="font-weight: bold;">Email :</a> <?php echo $teacherChoosen[0]->email?></p>
							<p><a style="font-weight: bold;">Number of exams:</a> <?php echo $countExamsByTeacher?></p>
							<?php } ?>
						</div>
					</div>

					<div class="row row-clean pagination-container gallery">

						<!--product-item-->

						  <!--
							<div class="col-md-12 items">

								<article data-page="<?php /*echo ($exam->id % 5)+1; */?>"  >
									<div class="info">
									<span>
                                        <a target="_blank" href="<?php /*echo base_url(); */?>index.php/admin/edit/exam-by-teacher/<?php /*echo $exam->id ; */?>/<?php /*echo $exam->teacher_id */?>" class="" data-title="View/edit Exam"><i class="icon icon-eye"></i></a>
                                    </span>
										<span>
                                        <a target="_blank" href="<?php /*echo base_url(); */?>index.php/admin/affect/exam/<?php /*echo $exam->id ; */?>" class="" data-title="Affect"><i class="icon icon-arrow-right"></i></a>
                                    </span>
										<span>
                                        <a target="_blank" href="<?php /*echo base_url(); */?>index.php/admin/list-students/exam/<?php /*echo $exam->id ; */?>" class="" data-title="students who passed this exam"><i class="icon icon-menu"></i></a>
                                    </span>

									</div>
									<div class="figure-list item">
										<div class="image">
											<a  target="_blank" href="<?php /*echo base_url(); */?>index.php/student/pass/exam/<?php /*echo $exam->id ; */?>" class="mfp-open">
												<img src="<?php /*echo base_url(); */?>assets/images/avatars/exam.png" alt="" width="300" style="width: 70% !important;margin-left: 10%;" />
											</a>
										</div>
										<div class="text">
											<h2 class="title h4"><a target="_blank" href="<?php /*echo base_url(); */?>index.php/student/pass/exam/<?php /*echo $exam->id ; */?>">Exam <?php /*echo $exam->title_exam; */?></a></h2>
											<sup>Date of creation : <?php /*echo $exam->date_created ; */?></sup><br>
											<sup>Students who passed this exam :
												<?php /*foreach ($arrayCountStudentsByExam as $key => $countStudents){
													if($key==$exam->id) {*/?>
												<a style="font-weight: bold;"><?php /*echo $arrayCountStudentsByExam[$key] ; */?></a>
												<?php /*}} */?>
											</sup>
																					</div>
									</div>
								</article>


							</div>
						-->
						<div class="gallery">
							<div class="resizer">RESIZE SCREEN</div>
							<div class="items">
								<!--product-item-->

								<?php foreach($listExamsByAdmin as $exam) { ?>
									<div class="col-md-12 item">

										<article data-page="<?php echo ($exam->id % 5)+1; ?>"  >
											<div class="info">
									<span>
                                        <a target="_blank" href="<?php echo base_url(); ?>index.php/admin/edit/exam-by-teacher/<?php echo $exam->id ; ?>/<?php echo $exam->teacher_id ?>" class="" data-title="View/edit Exam"><i class="icon icon-eye"></i></a>
                                    </span>
												<span>
                                        <a target="_blank" href="<?php echo base_url(); ?>index.php/admin/affect/exam/<?php echo $exam->id ; ?>" class="" data-title="Affect"><i class="icon icon-arrow-right"></i></a>
                                    </span>
												<span>
                                        <a target="_blank" href="<?php echo base_url(); ?>index.php/admin/list-students/exam/<?php echo $exam->id ; ?>" class="" data-title="students who passed this exam"><i class="icon icon-menu"></i></a>
                                    </span>

											</div>
											<div class="figure-list">
												<div class="image">
													<a  target="_blank" href="<?php echo base_url(); ?>index.php/student/pass/exam/<?php echo $exam->id ; ?>" class="mfp-open">
														<img src="<?php echo base_url(); ?>assets/images/avatars/exam.png" alt="" width="300" style="width: 70% !important;margin-left: 10%;" />
													</a>
												</div>
												<div class="text">
													<h2 class="title h4"><a target="_blank" href="<?php echo base_url(); ?>index.php/student/pass/exam/<?php echo $exam->id ; ?>">Exam <?php echo $exam->title_exam; ?></a></h2>
													<sup>Date of creation : <?php echo $exam->date_created ; ?></sup><br>
													<sup>Students who passed this exam :
														<?php foreach ($arrayCountStudentsByExam as $key => $countStudents){
															if($key==$exam->id) {?>
																<a style="font-weight: bold;"><?php echo $arrayCountStudentsByExam[$key] ; ?></a>
															<?php }} ?>
													</sup>
													<!--											<span class="description clearfix">Gubergren amet dolor ea diam takimata consetetur facilisis blandit et aliquyam lorem ea duo labore diam sit et consetetur nulla</span>
													-->										</div>
											</div>
										</article>


									</div>
								<?php } ?>

							</div>
							<div class="pagination"></div>
						</div>
						<br><br><br>

					</div><!--/row-->
					<!--Pagination-->
					<!--<div class="pagination-wrapper">
						<ul class="pagination">
							<li>
								<a href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
								</a>
							</li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li>
								<a href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
								</a>
							</li>
						</ul>
					</div>-->

				</div> <!--/product items-->

			</div><!--/row-->
		</div><!--/container-->
	</section>
	<!-- Modal Structure -->
	<div id="modal-show-teachers" class="modal" style="height:60%;max-height: 33% !important;padding-right: 0 !important;">
		<div class="modal-content">
			<h4>List of teachers to approve</h4>
			<div class="input-field col s12">
				<?php if(isset($listTeachersToaApproveByAdmin) and $listTeachersToaApproveByAdmin!=null){ ?>

					<ul class="list-group">
						<?php foreach($listTeachersToaApproveByAdmin as $teacher) { ?>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							<a style="color:black;font-weight: bold">Name:</a> <?php echo  $teacher->name ?>; <a style="color:black;font-weight: bold">Date: </a><?php echo  $teacher->created_at ?>
							<a style="cursor: pointer" href="<?php echo base_url(); ?>index.php/admin/approve-teacher/<?php echo  $teacher->id ?>"><span class="badge badge-success badge-pill" style="color:white;background-color: green;">Approve</span></a>
							<a style="cursor: pointer" href="<?php echo base_url(); ?>index.php/admin/no-approve-teacher/<?php echo  $teacher->id ?>"><span class="badge badge-danger badge-pill" style="color:white;background-color: red;">Do not Approve</span></a>
						</li>
						<?php  } ?>
					</ul>
				<?php  } ?>
			</div>
		</div>

		<div class="modal-footer">
			<a href="#!" class="modal-action
                    modal-close waves-effect waves-green
                    btn green lighten-1">
				Close
			</a>
		</div>
	</div>
	<!-- ========================  Stretcher widget ======================== -->

	<!-- ========================  Cards ======================== -->

	<!-- ========================  Banner ======================== -->


	<!-- ========================  Blog Block ======================== -->

	<!-- ========================  Instagram ======================== -->




	<?php $this->view('partials/footer'); ?>
	<div>
		<?php
		$this->load->view('alert');
		?>
	</div>

</div> <!--/wrapper-->
<!-- Compiled and minified JavaScript -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.0.0/jquery.steps.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdn.josetxu.com/js/pure-pajinate.es5.min.js"></script>

<script>


	let itms = 6; // itemsPerPage
	let stpg = 1; // startPage
	let pltd = 4; // pageLinksToDisplay
	let winw = window.innerWidth;

	function optionsByWindowSize() {
		winw = window.innerWidth;
		if (winw > 1600) { itms = 3; stpg = 1; pltd = 4; }
		else if (winw > 1230) { itms = 3; stpg = 2; pltd = 4; }
		else if (winw > 980) { itms = 4; stpg = 3; pltd = 4; }
		else if (winw > 750) { itms = 3; stpg = 4; pltd = 4; }
		else if (winw > 510) { itms = 2; stpg = 5; pltd = 4; }
		else { itms = 1; stpg = 6; pltd = 1; }
	}

	function reportWindowSize() {
		optionsByWindowSize();
		//purePajination Script - START
		if (document.readyState === "complete") {
			var gallery = new purePajinate({
				containerSelector: '.items',
				itemSelector: '.items > div',
				navigationSelector: '.pagination',
				/*wrapAround: true,*/
				pageLinksToDisplay: pltd,
				showFirstLast: true,
				navLabelPrev: '&nbsp;&nbsp;&nbsp;',
				navLabelNext: '&nbsp;&nbsp;&nbsp;',
				navLabelFirst: '&nbsp;&nbsp;&nbsp;',
				navLabelLast: '&nbsp;&nbsp;&nbsp;',
				itemsPerPage: itms,
				startPage: stpg
			});
		} //purePajination Script - END
	}

	document.onreadystatechange = reportWindowSize;
	window.onresize = reportWindowSize;


	var paginationHandler = function(){
		// store pagination container so we only select it once
		<?php if(isset($listTeachersToaApproveByAdmin) and $listTeachersToaApproveByAdmin!=null){ ?>
		$('.modal').modal({
			dismissible: true
		});
		$('#modal-show-teachers').modal('open');
		$('.modal-close').click(function (){
			$('#modal-show-teachers').modal('hide');
		});
		<?php  } ?>
		$('.check-teacher').change(function(){
			if(this.checked) {
				$('.check-teacher').prop('checked',false);
				$(this).prop('checked',true);
			}

		});
		$('#allTeachers').change(function(){
			if(this.checked) {
				$('.check-teacher').prop('checked',false);
			}else{
				$('.check-teacher').prop('checked',false);
			}

		});
		$('#submit-search-by-teachers').click(function(){
			$(".check-teacher:radio").each(function(){
				var $this = $(this);

				if($this.is(":checked")){
					idTeacher=$this.attr('id').replace('teacher','');
					window.location.href="<?php echo base_url(); ?>index.php/admin/administration/"+idTeacher;
				}else{
					console.log('unchecker');
				}
			});
			$("#allTeachers:checkbox").each(function(){
				var $this = $(this);

				if($this.is(":checked")){
					window.location.href="<?php echo base_url(); ?>index.php/admin/administration/all";
				}else{
					console.log('unchecker');
				}
			});
		});

	};
	$( document ).ready( paginationHandler );

</script>

</html>
