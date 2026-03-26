
<?php $this->view('partials/header')?>
<!-- Compiled and minified CSS -->
<link rel="stylesheet" media="all" href="https://unpkg.com/materialize-stepper@3.1.0/dist/css/mstepper.min.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" media="all" href="<?php echo base_url(); ?>assets/css/jquery-ui-timepicker-addon.css" />
<style>
	@import url("<?php echo base_url(); ?>assets/css/materialize.css");
	@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css);
	@import url('https://fonts.googleapis.com/css?family=Roboto');

	nav .logo img {
		width: 140px !important;
		height: 70px !important;
	}
	/* style timer */
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
	}
	.owl-carousel .owl-item img {
		width: 90% !important;
	}

	/* style correct option */
	input[name='option-1']{
		border-bottom:  1px solid  #0f9d58 !important;
	}
	.tawsil-grised{
		background-color: #D3D3D3 !important;
	}

	.correct-input{
		background-color: #90EE90 !important;
	}
	/* style iframe math equations */
	#frame {
		max-width: 40em;
		margin: auto;
	}

	#input {
		border: 1px solid grey;
		margin: 0 0 .25em;
		width: 100%;
		box-sizing: border-box;
	}

	#output {
		font-size: 120%;
		margin-top: .75em;
		border: 1px solid grey;
		padding: .25em;
		min-height: 2em;
	}

	.right {
		float: right;
	}

	/*  style drag span */

	p.given {
		display: flex;
		flex-wrap: wrap;
	}

	p.given span.w span.ui-icon {
		cursor: pointer;
	}

	div.blanks {
		display: inline-block;
		min-width: 50px;
		border-bottom: 2px solid #000000;
		color: #000000;
	}

	div.blanks.ui-droppable-active {
		min-height: 20px;
	}

	span.answers>b {
		border-bottom: 2px solid #000000;
	}

	span.given {
		margin: 5px;
	}

	.w:has(.ui-icon-close) {
		color: forestgreen !important;
		border-bottom: 2px solid green;
	}

	.wrs_formulaDisplay{
		height: 99px !important;
	}

	/* canva draw */
	canvas {
		background: #fff;
		display: block;
		margin: 50px auto 10px;
		border-radius: 5px;
		box-shadow: 0 4px 0 0 #222;
		cursor: url(../img/cursor.png), crosshair;
	}

	.controls {
		min-height: 60px;
		margin: 0 auto;
		width: 600px;
		border-radius: 5px;
		overflow: hidden;
	}

	.draw ul {
		list-style: none;
		margin: 0;
		float: left;
		padding: 10px 0 20px;
		width: 100%;
		text-align: center;
	}

	.draw ul li,
	#newColor {
		display: block;
		height: 54px;
		width: 54px;
		border-radius: 60px;
		cursor: pointer;
		border: 0;
		box-shadow: 0 3px 0 0 #222;
	}

	.draw ul li {
		display: inline-block;
		margin: 0 5px 10px;
	}

	.red {
		background: #fc4c4f;
	}

	.blue {
		background: #4fa3fc;
	}

	.yellow {
		background: #ECD13F;
	}

	.draw .selected {
		border: 7px solid #fff;
		width: 40px;
		height: 40px;
	}

	.draw button {
		background: #68B25B;
		box-shadow: 0 3px 0 0 #6A845F;
		color: #fff;
		outline: none;
		cursor: pointer;
		text-shadow: 0 1px #6A845F;
		display: block;
		font-size: 16px;
		line-height: 40px;
	}

	#revealColorSelect {
		border: none;
		border-radius: 5px;
		margin: 10px auto;
		padding: 5px 20px;
		width: 160px;
	}


	/* New Color Palette */

	#colorSelect {
		background: #fff;
		border-radius: 5px;
		clear: both;
		margin: 20px auto 0;
		padding: 10px;
		width: 305px;
		position: relative;
		display: none;
	}

	#colorSelect:after {
		bottom: 100%;
		left: 50%;
		border: solid transparent;
		content: " ";
		height: 0;
		width: 0;
		position: absolute;
		pointer-events: none;
		border-color: rgba(255, 255, 255, 0);
		border-bottom-color: #fff;
		border-width: 10px;
		margin-left: -10px;
	}

	#newColor {
		width: 80px;
		height: 80px;
		border-radius: 3px;
		box-shadow: none;
		float: left;
		border: none;
		margin: 10px 20px 20px 10px;
	}

	.sliders p {
		margin: 8px 0;
		vertical-align: middle;
	}

	.sliders label {
		display: inline-block;
		margin: 0 10px 0 0;
		width: 35px;
		font-size: 14px;
		color: #6D574E;
	}

	.sliders input {
		position: relative;
		top: 2px;
	}

	#colorSelect button {
		border: none;
		border-top: 1px solid #6A845F;
		border-radius: 0 0 5px 5px;
		clear: both;
		margin: 10px -10px -7px;
		padding: 5px 10px;
		width: 325px;
	}
</style>
<div class="page-loader"></div>

<div class="wrapper">

	<!-- ======================== Navigation ======================== -->

	<?php $this->view('partials/menu')?>

	<!-- ========================  Tabsy wrapper ======================== -->

	<!-- ========================  Icons slider ======================== -->

	<!--
	<section class="stretcher-wrapper">

		s

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



		<ul class="stretcher">


			<li class="stretcher-item" style="background-image:url(<?php /*echo base_url(); */?>assets/images/assesment.png);">

				<div class="stretcher-logo">
					<div class="text">
						<span class="text-intro">Exam 12-2022</span>
					</div>
				</div>

				<figure>
					<h4>Exam 1</h4>
					<figcaption>Collection of questions</figcaption>
				</figure>

				<a href="#">Anchor link</a>
			</li>



			<li class="stretcher-item" style="background-image:url(<?php /*echo base_url(); */?>assets/images/assesment.png);">

				<div class="stretcher-logo">
					<div class="text">
						<span class="text-intro">Exam 03-2022</span>
					</div>
				</div>

				<figure>
					<h4>Exam 2</h4>
					<figcaption>Collection of questions</figcaption>
				</figure>

				<a href="#">Anchor link</a>
			</li>



			<li class="stretcher-item" style="background-image:url(<?php /*echo base_url(); */?>assets/images/assesment.png);">

				<div class="stretcher-logo">
					<div class="text">
						<span class="text-intro">Exam 05-2022</span>
					</div>
				</div>

				<figure>
					<h4>Exam 3</h4>
					<figcaption>Collection of questions</figcaption>
				</figure>

				<a href="#">Anchor link</a>
			</li>



			<li class="stretcher-item" style="background-image:url(<?php /*echo base_url(); */?>assets/images/assesment.png);">

				<div class="stretcher-logo">
					<div class="text">
						<span class="text-intro">Exam 11-2022</span>
					</div>
				</div>

				<figure>
					<h4>Exam 4</h4>
					<figcaption>Collection of questions</figcaption>
				</figure>

				<a href="#">Anchor link</a>
			</li>



			<li class="stretcher-item more">
				<div class="more-icon">
					<span data-title-show="Show more" data-title-hide="+"></span>
				</div>
				<a href="#"></a>
			</li>

		</ul>
	</section>-->

	<!-- ========================  Block banner category ======================== -->

	<!-- ========================  Best seller ======================== -->

	<section class="contact section-questions">

		<!-- === Goolge map === -->

		<div id="map" style="background-image:url(<?php echo base_url(); ?>assets/images/backgrounds/wall.jpg)"></div>

		<div class="container">
			<h2 class="title">Exam</h2>
			<p>
				Make your questions by adding part by part and adding the time and also pictures
			</p>
			<form id="msform-teacher" method="POST" action="<?php echo base_url(); ?>index.php/teacher/add-exam" enctype='multipart/form-data'>
				<div class="form-group">
					<label style="text-align:left">Title of the exam</label>
					<input type="text"  name="title_exam" required>
				</div>


				<div class="input-field col s12">
					<select class="browser-default" name="select-category" style="margin-top:7%;" required>
						<option value=""  disabled selected>Choose the category</option>
						<?php foreach($categories as $categorie) { ?>
							<option value="<?php echo $categorie->id; ?>"><?php echo $categorie->name; ?></option>
						<?php } ?>
					</select>

				</div>
				<div class="input-field col s12">
					<label style="text-align:left;margin-top: -6%;">Choose the time option</label>
					<select class="browser-default" name="select-time-option" id="select-time-option" style="margin-top:7%;" required>
						<option value=""  disabled selected>Choose the time option</option>
						<option value="whole-time"  id="whole-time" selected>Time for Whole exam</option>
						<option value="each-question-time" id="each-question-time" >Time for each question</option>

					</select>

				</div>
				<div class="form-group" id="whole-duration-pick">
					<label style="text-align:left">Duration of the whole exam <a style="color:black;">(h:m:s)</a></label>
					<input type="text" class="time-pick" id="timepicker" value="00:15:00"  name="usr_time_exam">
				</div>
				<div class="input-field col s12">
					<label style="text-align:left;margin-top: -6%;">Choose to record screen/camera of the student</label>
					<span class="checkbox" style="margin-top:7%;">
						<input type="checkbox" class="check-record" name="record-screen" id="record-screen">
						<label for="record-screen"> <i></i>Record screen</label>
					</span>
					<span class="checkbox">
						<input type="checkbox" class="check-record" name="record-camera" id="record-camera">
						<label for="record-camera"><i></i>Record Camera</label>
					</span>

				</div>
				<div class="input-field col s12">
					<label style="text-align:left;margin-top: -6%;">Choose to make random order of questions</label>
					<span class="checkbox" style="margin-top:7%;">
						<input type="checkbox" class="check-random-questions" name="check-random-questions" id="check-random-questions">
						<label for="check-random-questions"> <i></i>Random Questions</label>
					</span>

				</div>
				<div class="input-field col s12">
					<label style="text-align:left;margin-top: -6%;">Choose to not retake the exam by students</label>
					<span class="checkbox" style="margin-top:7%;">
						<input type="checkbox" class="check-no-retake-exam" name="check-no-retake-exam" id="check-no-retake-exam">
						<label for="check-no-retake-exam"> <i></i>Do not Retake the exam</label>
					</span>
				</div>
				<div class="col-md-12" >
					<h5> Copy paste equations from this editor</h5>
					<textarea id="editor"></textarea>
				</div>
				<div class="quest-0 quest--list">
				</div>
				<div class="quest-1 quest--list">
					<input type="text" name="quest_mutliple-1" value="quest_mutliple" hidden>
					<input type="text" name="count-quest-mutli" value="1" hidden>
					<a class="btn-floating btn-large waves-effect waves-light red close-question"  id="close-1" style="float:right;"><i class="fa fa-times"></i></a>
					<div data-step-label="" class="step-title waves-effect waves-dark">Question 1</div>
					<div class="step-content">
						<div class="row">
							<div class="input-field col s12">
								<div class="col-md-12" >
									<div class="form-group">
										<label style="text-align:left">Title of your question</label>
										<input type="text" name="title-question-multi-1" class="form-control"  required="required">
									</div>
								</div>
								<div class="col-md-12" >
									<div class="form-group">
										<label style="text-align:left">Point of the question</label>
										<input type="number" class="form-control"  min="0" max="20"   name="points-multi-1" required>
									</div>
								</div>
								<div class="col-md-12" >
									<div class="form-group duration-each-input">
										<label style="text-align:left">Duration of the question</label>
										<p>
										<label>
										<input class="no-specific-time" name="no-specific-time-multi-1"  type="checkbox" />
										<span>no specific time</span>
										</label>
										</p>
										<input type="text" class="time-pick" value="00:00:00"   name="usr_time-multi-1">
									</div>
								</div>
								<div class="col-md-12" >
									<p>
										<label>
											<input class="indeterminate-checkbox-single" name="indeterminate-checkbox-single-1" value="single" type="radio" />
											<span>Single Choice</span>
										</label>
									</p>
									<p>
										<label>
											<input class="indeterminate-checkbox-multiple" name="indeterminate-checkbox-single-1" value="multiple" type="radio" />
											<span>Multiple choices</span>
										</label>
									</p>
								</div>

								<div class="col-md-12" >
									<label style="text-align:left">Options (Max 6) <a alt="1" title="Show all"  class="btn-floating btn-small waves-effect waves-light red show-all-option-btn" > <i class="fa fa-eye"></i></a></label>
									<div class="form-group">
										<div class="col-md-6" >
											<a class="btn-floating btn-small waves-effect waves-light green correct-option-btn" > <i class="fa fa-check"></i></a>
											<input type="text" class="form-control options-list"  name="option-multi-1-1">
											<input type="text" style="display: none;" class="form-control correct-options-list"  name="correct-option-multi-1-1">
										</div>
										<div class="col-md-6" >
											<a class="btn-floating btn-small waves-effect waves-light green correct-option-btn" > <i class="fa fa-check"></i></a>
											<input type="text" class="form-control options-list"  name="option-multi-2-1">
											<input type="text" style="display: none;" class="form-control correct-options-list"  name="correct-option-multi-2-1">
										</div>
										<div class="col-md-6" >
											<a class="btn-floating btn-small waves-effect waves-light red remove-option-btn" > <i class="fa fa-minus"></i></a>
											<a class="btn-floating btn-small waves-effect waves-light green correct-option-btn" > <i class="fa fa-check"></i></a>
											<input type="text" class="form-control options-list"  name="option-multi-3-1">
											<input type="text" style="display: none;" class="form-control correct-options-list"  name="correct-option-multi-3-1">
										</div>
										<div class="col-md-6" >
											<a class="btn-floating btn-small waves-effect waves-light red remove-option-btn" > <i class="fa fa-minus"></i></a>
											<a class="btn-floating btn-small waves-effect waves-light green correct-option-btn" > <i class="fa fa-check"></i></a>
											<input type="text" class="form-control options-list"  name="option-multi-4-1">
											<input type="text" style="display: none;" class="form-control correct-options-list"  name="correct-option-multi-4-1">
										</div>
										<div class="col-md-6" >

											<a style="display: none;" class="btn-floating btn-small waves-effect waves-light green correct-option-btn" > <i class="fa fa-check"></i></a>
											<a style="display: none;" class="btn-floating btn-small waves-effect waves-light red remove-option-btn" > <i class="fa fa-minus"></i></a>
											<input type="text"  value="" style="display:none;" class="form-control options-list"  name="option-multi-5-1">
											<a class="btn-floating btn-small waves-effect waves-light red add-option-btn" > <i class="fa fa-plus"></i></a>
											<input type="text" style="display: none;" class="form-control correct-options-list"  name="correct-option-multi-5-1">

										</div>
										<div class="col-md-6" >
											<a style="display: none;" class="btn-floating btn-small waves-effect waves-light green correct-option-btn" > <i class="fa fa-check"></i></a>
											<a style="display: none;" class="btn-floating btn-small waves-effect waves-light red remove-option-btn" > <i class="fa fa-minus"></i></a>
											<input type="text"   value=""  style="display:none;" class="form-control options-list"  name="option-multi-6-1"><a class="btn-floating btn-small waves-effect waves-light red add-option-btn" > <i class="fa fa-plus"></i></a>
											<input type="text" style="display: none;" class="form-control correct-options-list"  name="correct-option-multi-5-1">

										</div>
									</div>
								</div>
								<div class="col-md-12" style="text-align: left;" >
									<div class = "row draw">
										<label>Draw</label>
										<canvas width="600" height="400" id="output"></canvas>
										<div class="controls">
											<ul>
												<li class="red selected"></li>
												<li class="blue"></li>
												<li class="yellow"></li>
											</ul>

											<button type="button" download="example.jpg" href=""  id="saveImage"  onclick="downloadCanvas(this);" hidden>Save Image</button>
											<button type="button" id="revealColorSelect">New Color</button>
											<div id="colorSelect">
												<span id="newColor"></span>
												<div class="sliders">
													<p>
														<label for="red">Red</label>
														<input id="red" name="red" type="range" min=0 max=255 value=0>
													</p>
													<p>
														<label for="green">Green</label>
														<input id="green" name="green" type="range" min=0 max=255 value=0>
													</p>
													<p>
														<label for="blue">Blue</label>
														<input id="blue" name="blue" type="range" min=0 max=255 value=0>
													</p>
												</div>
												<div>
													<button type="button" id="addNewColor">Add Color</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-12" style="text-align: left;" >
									<label for="data-file-uploaded-multi-1" hidden>upload image only data string</label>
									<input name="data-file-uploaded-multi-1" id="data-file-uploaded-multi-1" type = "text" hidden/>
									<div class = "row">
										<label>Upload Image</label>
										<div class = "file-field input-field">
											<div class = "btn">
												<span>Browse</span>
												<input name="file-uploaded-multi-1" type = "file" />
											</div>

											<div class = "file-path-wrapper">
												<input class = "file-path validate" type = "text"
													   placeholder = "Upload file" />
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>


					</div>

				</div>
				<div class="row" style="justify-content: space-between;">
					<button class=" btn blue"  type="submit" style="float: left;">Finish</button>

					<!-- Modal Trigger -->
					<a class="btn blue  next-inputs text-right waves-effect waves-light  modal-trigger" href="#modal-choice-inputs" style="float: right;" >Next</a>
					<!--					<button class=" btn blue  next-inputs text-right" >CONTINUE</button>-->
				</div>

				<!--<li class="step">
					<div class="step-title waves-effect waves-dark">Question 3</div>
					<div class="step-content">
						<div class="countdown" style="zoom:0.2;">
							<svg viewBox="-50 -50 100 100" stroke-width="10">
								<circle r="45"></circle>
								<circle r="45" stroke-dasharray="282.7433388230814" stroke-dashoffset="282.7433388230814px"></circle>
							</svg>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<label>Materialize Select</label>
								<select class="browser-default" style="margin-top:7%;">
									<option value=""  disabled selected>Choose the type of question</option>
									<option value="1">text</option>
									<option value="2">multiple choice</option>
									<option value="3">long text</option>
								</select>

							</div>
						</div>
						<div class="step-actions">
							<--								<button class="waves-effect waves-dark btn blue next-step" data-feedback="someFunction">CONTINUE</button>
							--
							<button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
							<button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
						</div>
					</div>
				</li>-->

			</form>

		</div><!--/container-->


		<!-- Modal Structure -->
		<div id="modal-choice-inputs" class="modal" style="height:44%;">
			<div class="modal-content">
				<h4>Choose type of input</h4>
				<div class="input-field col s12">
					<select class="browser-default" id="select-type-input" style="margin-top:7%;">
						<option value=""  disabled selected>Choose the type of question</option>
						<option value="2">Answer with one answer / Multiple choices</option>
						<option value="3">long text</option>
						<option value="4">Tawsil</option>
						<option value="5">Tartib</option>
						<option value="6">Words to place</option>
					</select>

				</div>
			</div>

			<div class="modal-footer">
				<a class="modal-action
                    modal-close waves-effect waves-green
                    btn green lighten-1">
					Close
				</a>
			</div>
		</div>
</div>
</section>

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
<script src="https://unpkg.com/materialize-stepper@3.1.0/dist/js/mstepper.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui-timepicker-addon.js"></script>
<script>
	$(document).ready(function(){
		/*
				var stepper = document.querySelector('.stepper');
				var stepperInstace = new MStepper(stepper, {
					// options
					firstActive: 0 // this is the default
				})*/
		/*$('.time-pick').timepicker({

			showSeconds: true,
			twelveHour: false,
			onOpenEnd:function(){
				$('.timepicker-span-hours').prepend( "<p>h:m</p>" );
			}
		});*/



		/*$('.time-pick').on('change', function() {
			let receivedVal = $(this).val();
			$(this).val(receivedVal + ":00");
		});*/
		$('.time-pick').timepicker({
			timeFormat: 'HH:mm:ss',
			showSecond: true
		});


		var countMultiQuest=1;
		var countLongQuest=0;
		var countTawsilQuest=0;
		var countTartibQuest=0;
		var countSpanQuest=0;
		$('.modal').modal({
			dismissible: false,
			onCloseEnd: function() { // Callback for Modal close
				idInput=$('#select-type-input').children(":selected").attr("value");

				var countSteps=$('.quest--list').length;
				var lastStep=countSteps-1;
				switch (idInput) {
					case "1": case "2":
						countMultiQuest++;
						$(".quest--list").last().after(`<div class="quest-${countSteps} quest--list">
			<input type="text" name="quest_mutliple-${countMultiQuest}" value="quest_mutliple" hidden>
			<input type="text" name="count-quest-mutli" value="${countMultiQuest}" hidden>
				<a class="btn-floating btn-large waves-effect waves-light red close-question" id="close-`+countSteps+`" style="float:right;"><i class="fa fa-times"></i></a>
 			<div data-step-label="" class="step-title waves-effect waves-dark">Question ${countSteps}</div>
			<div class="step-content">
				<div class="row">
					<div class="input-field col s12">
						<div class="col-md-12" >
							<div class="form-group">
								<label style="text-align:left">Title of your question</label>
								<input type="text" name="title-question-multi-${countMultiQuest}" class="form-control"  required="required">
							</div>
						</div>
						<div class="col-md-12" >
							<div class="form-group">
								<label style="text-align:left">Point of the question</label>
								<input type="number" class="form-control"  min="0" max="20"   name="points-multi-${countMultiQuest}" required>
							</div>
						</div>
						<div class="col-md-12" >
							<div class="form-group duration-each-input">
								<label style="text-align:left">Duration of the question</label>
								<p>
								<label>
								<input class="no-specific-time" name="no-specific-time-multi-${countMultiQuest}"  type="checkbox" />
								<span>no specific time</span>
								</label>
								</p>
								<input type="text" class="time-pick"  value="00:00:00"   name="usr_time-multi-${countMultiQuest}">
							</div>
						</div>
						<div class="col-md-12" >
							<p>
								<label>
									<input class="indeterminate-checkbox-single" value="single" name="indeterminate-checkbox-single-${countMultiQuest}" type="radio" />
									<span>Single Choice</span>
								</label>
							</p>
							<p>
								<label>
									<input class="indeterminate-checkbox-multiple" value="multiple" name="indeterminate-checkbox-single-${countMultiQuest}" type="radio" />
									<span>Multiple choices</span>
								</label>
							</p>
						</div>
						<div class="col-md-12" >
							<label style="text-align:left">Options (Max 6)  <a alt="${countSteps}"  title="Show all" class="btn-floating btn-small waves-effect waves-light red show-all-option-btn" > <i class="fa fa-eye"></i></a></label>
							<div class="form-group">
									<div class="col-md-6" >

										<a class="btn-floating btn-small waves-effect waves-light green correct-option-btn" > <i class="fa fa-check"></i></a>
								<input type="text" class="form-control options-list"  name="option-multi-1-${countMultiQuest}">
								<input type="text" style="display: none;" class="form-control correct-options-list"  name="correct-option-multi-1-${countMultiQuest}">

								</div>
									<div class="col-md-6" >
<a class="btn-floating btn-small waves-effect waves-light green correct-option-btn" > <i class="fa fa-check"></i></a>
								<input type="text" class="form-control options-list"  name="option-multi-2-${countMultiQuest}">
								<input type="text" style="display: none;" class="form-control correct-options-list"  name="correct-option-multi-2-${countMultiQuest}">

									</div>
									<div class="col-md-6" >
<a class="btn-floating btn-small waves-effect waves-light red remove-option-btn" > <i class="fa fa-minus"></i></a>
										<a class="btn-floating btn-small waves-effect waves-light green correct-option-btn" > <i class="fa fa-check"></i></a>
										<input type="text" class="form-control options-list"  name="option-multi-3-${countMultiQuest}">
										<input type="text" style="display: none;" class="form-control correct-options-list"  name="correct-option-multi-3-${countMultiQuest}">

									</div>
									<div class="col-md-6" >

										<a class="btn-floating btn-small waves-effect waves-light red remove-option-btn" > <i class="fa fa-minus"></i></a>
										<a class="btn-floating btn-small waves-effect waves-light green correct-option-btn" > <i class="fa fa-check"></i></a>
										<input type="text" class="form-control options-list"  name="option-multi-4-${countMultiQuest}">
										<input type="text" style="display: none;" class="form-control correct-options-list"  name="correct-option-multi-4-${countMultiQuest}">

									</div>
								<div class="col-md-6" >
									<a style="display: none;" class="btn-floating btn-small waves-effect waves-light red remove-option-btn" > <i class="fa fa-minus"></i></a>
									<a style="display: none;" class="btn-floating btn-small waves-effect waves-light green correct-option-btn" > <i class="fa fa-check"></i></a>
									<input type="text"  value="" style="display:none;" class="form-control options-list"  name="option-multi-5-${countMultiQuest}"><a class="btn-floating btn-small waves-effect waves-light red add-option-btn" > <i class="fa fa-plus"></i></a>
									<input type="text" style="display: none;" class="form-control correct-options-list"  name="correct-option-multi-5-${countMultiQuest}">
								</div>
								<div class="col-md-6" >
									<a style="display: none;" class="btn-floating btn-small waves-effect waves-light green correct-option-btn" > <i class="fa fa-check"></i></a>
									<a style="display: none;" class="btn-floating btn-small waves-effect waves-light red remove-option-btn" > <i class="fa fa-minus"></i></a>
									<input type="text"   value=""  style="display:none;" class="form-control options-list"  name="option-multi-6-${countMultiQuest}"><a class="btn-floating btn-small waves-effect waves-light red add-option-btn" > <i class="fa fa-plus"></i></a>
									<input type="text" style="display: none;" class="form-control correct-options-list"  name="correct-option-multi-6-${countMultiQuest}">
								</div>
							</div>
						</div>
						<div class="col-md-12" style="text-align: left;" >
							<div class = "row">
								<label>Upload Image</label>
								<div class = "file-field input-field">
									<div class = "btn">
										<span>Browse</span>
										<input   type = "file" />
									</div>

									<div class = "file-path-wrapper">
										<input name="file-uploaded-multi-${countSteps}" class = "file-path validate" type = "text"
											   placeholder = "Upload file" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>`);
						if($('#select-time-option option:selected').attr('id')=='each-question-time'){

							$('#whole-duration-pick').hide();
							$('#whole-duration-pick .time-pick').val('00:00:00');
							$('.duration-each-input').show();
						}else{

							$('.duration-each-input').hide();
							$('.duration-each-input .time-pick').each(function (){
								$(this).val('00:00:00');
							});
							$('#whole-duration-pick').show();
						}
						/*$('.time-pick').timepicker({

							showSeconds: true,
							twelveHour: false,
							onOpenEnd:function(){
								$('.timepicker-span-hours').prepend( "<p>h:m</p>" );
							}
						});*/

						/*
						$('.time-pick').on('change', function() {
							let receivedVal = $(this).val();
							$(this).val(receivedVal + ":00");
						});*/

						$('.time-pick').timepicker({
							timeFormat: 'HH:mm:ss',
							showSecond: true
						});
						break;
					case "3":
						countLongQuest++;
						$(".quest--list").last().after(`<div class="quest-${countSteps} quest--list">
			<input type="text" name="quest_long_text-${countLongQuest}" value="quest_long_text" hidden>
			<input type="text" name="count-quest-long-text" value="${countLongQuest}" hidden>
			<a class="btn-floating btn-large waves-effect waves-light red close-question" id="close-`+countSteps+`" style="float:right;"><i class="fa fa-times"></i></a>
 			<div data-step-label="" class="step-title waves-effect waves-dark">Question ${countSteps}</div>
			<div class="step-content">
				<div class="row">
					<div class="input-field col s12">
						<div class="col-md-12" >
							<div class="form-group">
								<label style="text-align:left">Title of your question</label>
								<input type="text" name="title-question-long-${countLongQuest}" class="form-control"  required="required">
							</div>
						</div>
						<div class="col-md-12" >
							<div class="form-group">
								<label style="text-align:left">Point of the question</label>
								<input type="number" class="form-control"  min="0" max="20"   name="points-long-${countLongQuest}" required>
							</div>
						</div>
						<div class="col-md-12" >
							<div class="form-group duration-each-input">
								<label style="text-align:left">Duration of the question</label>
								<p>
								<label>
								<input class="no-specific-time" name="no-specific-time-long-${countLongQuest}"  type="checkbox" />
								<span>no specific time</span>
								</label>
								</p>
								<input type="text" class="time-pick" value="00:00:00" name="usr_time-long-${countLongQuest}">
							</div>
						</div>
						<div class="col-md-12" >
							<div class="form-group">
								<label style="text-align:left">Correct answer of the question</label>
								<input type="text" name="correct-question-long-${countLongQuest}" class="form-control"  required="required">
							</div>
						</div>
						<div class="col-md-12" style="text-align: left;" >
							<div class = "row">
								<label>Upload Image</label>
								<div class = "file-field input-field">
									<div class = "btn">
										<span>Browse</span>
										<input type = "file" />
									</div>

									<div class = "file-path-wrapper">
										<input  name="file-uploaded-long-${countLongQuest}" class = "file-path validate" type = "text"
											   placeholder = "Upload file" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>`);

						if($('#select-time-option option:selected').attr('id')=='each-question-time'){

							$('#whole-duration-pick').hide();
							$('#whole-duration-pick .time-pick').val('00:00:00');
							$('.duration-each-input').show();
						}else{

							$('.duration-each-input').hide();
							$('.duration-each-input .time-pick').val('00:00:00');
							$('#whole-duration-pick').show();
						}
						/*$('.time-pick').timepicker({

							showSeconds: true,
							twelveHour: false,
							onOpenEnd:function(){
								$('.timepicker-span-hours').prepend( "<p>h:m</p>" );
							}
						});



						$('.time-pick').on('change', function() {
							let receivedVal = $(this).val();
							$(this).val(receivedVal + ":00");
						});*/
						$('.time-pick').timepicker({
							timeFormat: 'HH:mm:ss',
							showSecond: true
						});
						break;
					case "4":
						countTawsilQuest++;
						$(".quest--list").last().after(`<div class="quest-${countSteps} quest--list">
			<input type="text" name="quest_tawsil-${countTawsilQuest}" value="quest_tawsil" hidden>
			<input type="text" name="count-quest-tawsil" value="${countTawsilQuest}" hidden>
			<a class="btn-floating btn-large waves-effect waves-light red close-question" id="close-`+countSteps+`" style="float:right;"><i class="fa fa-times"></i></a>
 			<div data-step-label="" class="step-title waves-effect waves-dark">Question ${countSteps}</div>
			<div class="step-content">
				<div class="row">
					<div class="input-field col s12">
						<div class="col-md-12" >
							<div class="form-group">
								<label style="text-align:left">Title of your question</label>
								<input type="text" name="title-question-tawsil-${countTawsilQuest}" class="form-control"  required="required">
							</div>
						</div>
						<div class="col-md-12" >
							<div class="form-group">
								<label style="text-align:left">Point of the question</label>
								<input type="number" class="form-control"  min="0" max="20"   name="points-tawsil-${countTawsilQuest}" required>
							</div>
						</div>
						<div class="col-md-12" >
							<div class="form-group duration-each-input">
								<label style="text-align:left">Duration of the question</label>
								<p>
								<label>
								<input class="no-specific-time" name="no-specific-time-tawsil-${countTawsilQuest}"  type="checkbox" />
								<span>no specific time</span>
								</label>
								</p>
								<input type="text" class="time-pick" value="00:00:00"   name="usr_time-tawsil-${countTawsilQuest}">
							</div>
						</div>
						<div class="col-md-12" >
							<label style="text-align:left">Options Linked (Max 6)</label>
							<div class="form-group">
									<div class="col-md-5" >
								<input type="text" class="form-control options-list"  name="option-tawsil-1-${countTawsilQuest}">
								</div>
								<div class="col-md-2" >
								<img src="<?php echo base_url(); ?>assets/images/links-icon.png" style="width:30px;    margin-left: 40%;"/>
								</div>
									<div class="col-md-5" >
								<input type="text" class="form-control options-list"  name="link-option-tawsil-1-${countTawsilQuest}">
									</div>
									<div class="col-md-5" >
								<input type="text" class="form-control options-list"  name="option-tawsil-2-${countTawsilQuest}">
									</div>
									<div class="col-md-2" >
								<img src="<?php echo base_url(); ?>assets/images/links-icon.png" style="width:30px;    margin-left: 40%;"/>
								</div>
									<div class="col-md-5" >
								<input type="text" class="form-control options-list"  name="link-option-tawsil-2-${countTawsilQuest}">
									</div>
								<div class="col-md-5" >
								<input type="text" class="form-control options-list"  name="option-tawsil-3-${countTawsilQuest}">
								</div>
								<div class="col-md-2" >
								<img src="<?php echo base_url(); ?>assets/images/links-icon.png" style="width:30px;    margin-left: 40%;"/>
								</div>
									<div class="col-md-5" >
								<input type="text" class="form-control options-list"  name="link-option-tawsil-3-${countTawsilQuest}">
									</div>
									<div class="col-md-5" >
								<input type="text" class="form-control options-list"  name="option-tawsil-4-${countTawsilQuest}">
									</div>
									<div class="col-md-2" >
								<img src="<?php echo base_url(); ?>assets/images/links-icon.png" style="width:30px;    margin-left: 40%;"/>
								</div>
									<div class="col-md-5" >
								<input type="text" class="form-control options-list"  name="link-option-tawsil-4-${countTawsilQuest}">
									</div>
								<div>
									<div class="col-md-5" >
								<input type="text" class="form-control options-list tawsil-grised"  name="option-tawsil-5-${countTawsilQuest}">
								</div>
								<div class="col-md-2" >
								<img src="<?php echo base_url(); ?>assets/images/links-icon.png" style="width:30px;    margin-left: 40%;"/>
								</div>
									<div class="col-md-5" >
								<input type="text" class="form-control options-list tawsil-grised"  name="link-option-tawsil-5-${countTawsilQuest}">
									</div>
								</div>
								<div>
									<div class="col-md-5" >
								<input type="text" class="form-control options-list tawsil-grised"  name="option-tawsil-6-${countTawsilQuest}">
								</div>
								<div class="col-md-2" >
								<img src="<?php echo base_url(); ?>assets/images/links-icon.png" style="width:30px;    margin-left: 40%;"/>
								</div>
									<div class="col-md-5" >
								<input type="text" class="form-control options-list tawsil-grised"  name="link-option-tawsil-6-${countTawsilQuest}">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-12" style="text-align: left;" >
							<div class = "row">
								<label>Upload Image</label>
								<div class = "file-field input-field">
									<div class = "btn">
										<span>Browse</span>
										<input  type = "file" />
									</div>

									<div class = "file-path-wrapper">
										<input name="file-uploaded-tawsil-${countTawsilQuest}" class = "file-path validate" type = "text"
											   placeholder = "Upload file" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>`);
						if($('#select-time-option option:selected').attr('id')=='each-question-time'){

							$('#whole-duration-pick').hide();
							$('#whole-duration-pick .time-pick').val('00:00:00');
							$('.duration-each-input').show();
						}else{

							$('.duration-each-input').hide();
							$('.duration-each-input .time-pick').val('00:00:00');
							$('#whole-duration-pick').show();
						}
						/*$('.time-pick').timepicker({

							showSeconds: true,
							twelveHour: false,
							onOpenEnd:function(){
								$('.timepicker-span-hours').prepend( "<p>h:m</p>" );
							}
						});

						$('.time-pick').timepicker({

							showSeconds: true,
							twelveHour: false,
							onOpenEnd:function(){
								$('.timepicker-span-hours').prepend( "<p>h:m</p>" );
							}
						});



						$('.time-pick').on('change', function() {
							let receivedVal = $(this).val();
							$(this).val(receivedVal + ":00");
						});*/

						$('.time-pick').timepicker({
							timeFormat: 'HH:mm:ss',
							showSecond: true
						});
						break;
					case "5":
						countTartibQuest++;
						$(".quest--list").last().after(`<div class="quest-${countSteps} quest--list">
			<input type="text" name="quest_tartib-${countTartibQuest}" value="quest_tartib" hidden>
			<input type="text" name="count-quest-tartib" value="${countTartibQuest}" hidden>
			<a class="btn-floating btn-large waves-effect waves-light red close-question" id="close-`+countSteps+`" style="float:right;"><i class="fa fa-times"></i></a>
 			<div data-step-label="" class="step-title waves-effect waves-dark">Question ${countSteps}</div>
			<div class="step-content">
				<div class="row">
					<div class="input-field col s12">
						<div class="col-md-12" >
							<div class="form-group">
								<label style="text-align:left">Title of your question</label>
								<input type="text" name="title-question-tartib-${countTartibQuest}" class="form-control"  required="required">
							</div>
						</div>
						<div class="col-md-12" >
							<div class="form-group">
								<label style="text-align:left">Point of the question</label>
								<input type="number" class="form-control"  min="0" max="20"   name="points-tartib-${countTartibQuest}" required>
							</div>
						</div>
						<div class="col-md-12" >
							<div class="form-group duration-each-input">
								<label style="text-align:left">Duration of the question</label>
								<p>
								<label>
								<input class="no-specific-time" name="no-specific-time-tartib-${countTartibQuest}"  type="checkbox" />
								<span>no specific time</span>
								</label>
								</p>
								<input type="text" class="time-pick" value="00:00:00"  onfocus="this.showPicker()" name="usr_time-tartib-${countTartibQuest}">
							</div>
						</div>
						<div class="col-md-12" >
							<label style="text-align:left">Options in order (Max 4)</label>
							<div class="form-group">
									<div class="col-md-6" >1.
								<input type="text" class="form-control options-to-order-list"  name="option-to-order-1-${countTartibQuest}">
								</div>
									<div class="col-md-6" >2.
								<input type="text" class="form-control options-to-order-list"  name="option-to-order-2-${countTartibQuest}">
									</div>
								<div class="col-md-6" >3.
								<input type="text" class="form-control options-to-order-list"  name="option-to-order-3-${countTartibQuest}">
								</div>
									<div class="col-md-6" >4.
								<input type="text" class="form-control options-to-order-list"  name="option-to-order-4-${countTartibQuest}">
									</div>

								<div class="col-md-6" >5. optional
								<input type="text" class="form-control options-to-order-list tawsil-grised"  name="option-to-order-5-${countTartibQuest}">
									</div>
								<div class="col-md-6" >6. optional
								<input type="text" class="form-control options-to-order-list tawsil-grised"  name="option-to-order-6-${countTartibQuest}">
									</div>
							</div>
						</div>
						<div class="col-md-12" style="text-align: left;" >
							<div class = "row">
								<label>Upload Image</label>
								<div class = "file-field input-field">
									<div class = "btn">
										<span>Browse</span>
										<input type = "file" />
									</div>

									<div class = "file-path-wrapper">
										<input name="file-uploaded-tartib-${countTartibQuest}" class = "file-path validate" type = "text"
											   placeholder = "Upload file" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>`);
						if($('#select-time-option option:selected').attr('id')=='each-question-time'){

							$('#whole-duration-pick').hide();
							$('#whole-duration-pick .time-pick').val('00:00:00');
							$('.duration-each-input').show();
						}else{

							$('.duration-each-input').hide();
							$('.duration-each-input .time-pick').val('00:00:00');
							$('#whole-duration-pick').show();
						}
						/*$('.time-pick').timepicker({

							showSeconds: true,
							twelveHour: false,
							onOpenEnd:function(){
								$('.timepicker-span-hours').prepend( "<p>h:m</p>" );
							}
						});



						$('.time-pick').on('change', function() {
							let receivedVal = $(this).val();
							$(this).val(receivedVal + ":00");
						});*/

						$('.time-pick').timepicker({
							timeFormat: 'HH:mm:ss',
							showSecond: true
						});

						break;

					case "6":
						countSpanQuest++;
						$(".quest--list").last().after(`<div class="quest-${countSteps} quest--list">
			<input type="text" name="quest_span-${countSpanQuest}" value="quest_span" hidden>
			<input type="text" name="count-quest-span" value="${countSpanQuest}" hidden>
			<a class="btn-floating btn-large waves-effect waves-light red close-question" id="close-`+countSteps+`" style="float:right;"><i class="fa fa-times"></i></a>
 			<div data-step-label="" class="step-title waves-effect waves-dark">Question ${countSteps}</div>
			<div class="step-content">
				<div class="row">
					<div class="input-field col s12">
						<div class="col-md-12" >
							<div class="form-group">
								<label style="text-align:left">Title of your question</label>
								<input type="text" name="title-question-span-${countSpanQuest}" class="form-control"  required="required">
							</div>
						</div>
						<div class="col-md-12" >
							<div class="form-group">
								<label style="text-align:left">Point of the question</label>
								<input type="number" class="form-control"  min="0" max="20"   name="points-span-${countSpanQuest}" required>
							</div>
						</div>
						<div class="col-md-12" >
							<div class="form-group duration-each-input">
								<label style="text-align:left">Duration of the question</label>
								<p>
								<label>
								<input class="no-specific-time" name="no-specific-time-span-${countSpanQuest}"  type="checkbox" />
								<span>no specific time</span>
								</label>
								</p>
								<input type="text" class="time-pick" value="00:00:00" name="usr_time-span-${countSpanQuest}">
							</div>
						</div>
						<div class="col-md-12" >
							<div class="form-group">
								<label for="textarea1" style="text-align:left">Text </label>
								<textarea  class="materialize-textarea text-span" style="height: 90px;" name="text-span-${countSpanQuest}" required></textarea>
							</div>
						</div>
						<div class="col-md-12" >
							<div class="form-group">
								<label style="text-align:left;float:left;">Words to fit  </label> &nbsp;&nbsp;<a class="btn-floating btn-small waves-effect waves-light red add-words" id="add-words-${countSpanQuest}" style="float:left;"><i class="fa fa-plus"></i></a>
								<input type="text" class="form-control word-to-be-added"     name="words-span-${countSpanQuest}" >
								<input type="text" value="" class="form-control word-list-span"     name="words-list-span-${countSpanQuest}" hidden>

							</div>
						</div>

						<div class="col-md-12" >
							<div class="row">
							  <p class="given text-to-fill-span"    contenteditable="true" readonly="readonly"></p>
								<input type="text" value="" class="form-control input-text-with-words-span"     name="input-text-with-words-span-${countSpanQuest}" hidden>

							</div>

							<div class="divider"></div>
							<div class="section">
							  <section>
                                Place the words in red above here  <a alt="1" title="Erase"  class="btn-floating btn-small waves-effect waves-light red erase-last-word" > <i class="fa fa-eraser"></i></a>
								<div class="card blue-grey ">
								  <div class="card-content white-text">
									<div class="row">
									  <div class="col s12 section-to-add-word">
										<span class="given btn-flat white-text red lighten-1" rel="1" style="display:none;">the Santee, thDakota</span>
									  </div>
									</div>
								  </div>
								</div>
							  </section>
						</div>
						</div>
						<div class="col-md-12" style="text-align: left;" >
							<div class = "row">
								<label>Upload Image</label>
								<div class = "file-field input-field">
									<div class = "btn">
										<span>Browse</span>
										<input type = "file" />
									</div>

									<div class = "file-path-wrapper">
										<input  name="file-uploaded-span-${countSpanQuest}" class = "file-path validate" type = "text"
											   placeholder = "Upload file" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>`);

						if($('#select-time-option option:selected').attr('id')=='each-question-time'){

							$('#whole-duration-pick').hide();
							$('#whole-duration-pick .time-pick').val('00:00:00');
							$('.duration-each-input').show();
						}else{

							$('.duration-each-input').hide();
							$('.duration-each-input .time-pick').val('00:00:00');
							$('#whole-duration-pick').show();
						}
						/*$('.time-pick').timepicker({

							showSeconds: true,
							twelveHour: false,
							onOpenEnd:function(){
								$('.timepicker-span-hours').prepend( "<p>h:m</p>" );
							}
						});



						$('.time-pick').on('change', function() {
							let receivedVal = $(this).val();
							$(this).val(receivedVal + ":00");
						});*/

						$('.time-pick').timepicker({
							timeFormat: 'HH:mm:ss',
							showSecond: true
						});
						/*section drag and drop*/
						$('.w .ui-icon-close').each(function (){
							$(this.parent().attr('color','green'))
						})
						$("p.given").html(chunkWords($("p.given").text()));

						$("span.given").draggable({
							helper: "clone",
							revert: "invalid"
						});

						makeDropText($("p.given span.w"));



					function textWrapper(str, sp) {
						if (sp == undefined) {
							sp = [0, 0];
						}
						var txt = "<span class='w'>" + str + "</span>";

						if (sp[0]) {
							txt = "&nbsp;" + txt;
						}

						if (sp[1]) {
							txt = txt + "&nbsp;";
						}

						return txt;
					}

					function chunkWords(p) {
						var words = p.split(" ");
						words[0] = textWrapper(words[0], [0, 1]);
						var i;
						for (i = 1; i < words.length; i++) {
							if (words[0].indexOf(".")) {
								words[i] = textWrapper(words[i], [1, 0]);
							} else {
								words[i] = textWrapper(words[i], [1, 1]);
							}
						}
						return words.join("");
					}

					function makeBtn(tObj) {
						var btn = $("<span>", {
							class: "ui-icon ui-icon-close"
						}).appendTo(tObj);
						btn.click(function(e) {
							$(this).parent().remove();
						});
					}

					function makeDropText(obj) {
						return obj.droppable({
							drop: function(e, ui) {
								var txt = ui.draggable.text();
								var newSpan = textWrapper(txt, [1, 0]);
								$(this).after(newSpan);
								makeBtn($(this).next("span.w"));
								makeDropText($(this).next("span.w"));
								$("span.w.ui-state-highlight").removeClass("ui-state-highlight");
							},
							over: function(e, ui) {
								$(this).add($(this).next("span.w")).addClass("ui-state-highlight");
							},
							out: function() {
								$(this).add($(this).next("span.w")).removeClass("ui-state-highlight");
							}
						});
					}
						break;
				}
			}
		});
		$( ".time-pick" ).focus(function() {
			this.showPicker();
		});
		$('.duration-each-input').hide();
		$('.duration-each-input .time-pick').val('00:00:00');
		$('#select-time-option').change(function (){
			if($('#select-time-option option:selected').attr('id')=='each-question-time'){
				$('#whole-duration-pick').hide();
				$('#whole-duration-pick .time-pick').val('00:00:00');
				$('.duration-each-input').show();
			}else{
				$('.duration-each-input').hide();
				$('.duration-each-input .time-pick').val('00:00:00');
				$('#whole-duration-pick').show();
			}
		});


		/*$('.correct-option-btn').click(function (){

			var correctInput=$(this).parent().find('.correct-options-list');
			var input=$(this).parent().find('.options-list');
			correctInput.val('correct')
		});
		$('.add-option-btn').click(function (){

			var input=$(this).parent().find('.options-list');
			var minus=$(this).parent().find('.remove-option-btn');
			input.show();
			input.val('');
			$(this).hide();
			minus.show();
		});
		$('.remove-option-btn').click(function (){

			var inputs=$(this).parent().hide();
			inputs.find('.options-list').val('')
		});*/

	})

	$(document).on('click', '.close-question', function() {
		attrId=$(this).attr('id');
		id=attrId.replace('close-','');
		$('.quest-'+id).remove();
	}) ;
	$(document).on('click', '.correct-option-btn', function() {

		var correctInput=$(this).parent().find('.correct-options-list');
		var input=$(this).parent().find('.options-list');
		var isSingleChoice=$(this).parent().parent().parent().parent().find('.indeterminate-checkbox-single').is(':checked');
		if(isSingleChoice==true){
			var countCorrect=0;
			$(this).parent().parent().find('.correct-options-list').each(function(){
				var val=$(this).val();
				if(val=="correct"){
					countCorrect++;
				}
			})
			if(countCorrect<1){
				correctInput.parent().find('.correct-option-btn').hide();
				correctInput.val('correct');
				input.addClass('correct-input');
			}else{
				alert('you choosed one single correct answer !')
			}
		}else{
			correctInput.parent().find('.correct-option-btn').hide();
			correctInput.val('correct');
			input.addClass('correct-input');
		}

	}) ;

	$(document).on('click', '.add-option-btn', function() {
		var input=$(this).parent().find('.options-list');
		var minus=$(this).parent().find('.remove-option-btn');
		var check=$(this).parent().find('.correct-option-btn');
		input.show();
		check.show();
		input.val('');
		$(this).hide();
		minus.show();
	}) ;
	$(document).on('click', '.remove-option-btn', function() {
		var inputs=$(this).parent().hide();
		inputs.find('.options-list').val('')
		inputs.find('.options-list').removeClass('correct-input');

	}) ;
	$(document).on('click', '.show-all-option-btn', function() {
		var idQuest=$(this).attr('alt');
		$('.quest-'+idQuest+' .options-list').parent().show();
		$('.quest-'+idQuest+' .remove-option-btn').show();
		$('.quest-'+idQuest+' .correct-option-btn').show();

		$('.quest-'+idQuest+' .correct-options-list').each(function(){
			$(this).val('');
			$(this).parent().find('.options-list').removeClass('correct-input');
		});

	}) ;
	$(document).on('keyup', '.tawsil-grised', function() {
		$(this).removeClass("tawsil-grised");
	}) ;
	$(document).on('click', '.erase-last-word', function() {
		var spans = $(this).parent().find('.section-to-add-word span');
		spans.last().remove();
	}) ;

	$(document).on('change', '.no-specific-time', function() {
		if($(this).is(':checked')){
			$(this).parent().parent().parent().find('.time-pick').val('00:00:00');
		}
	}) ;
	$(document).on('keyup', '.text-span', function() {
		var textToPut=$(this).val();
		//$(this).parent().parent().parent().find('.text-to-fill-span').text();
		$(this).parent().parent().parent().find('.text-to-fill-span').html(chunkWords(textToPut));
		var arabic = /[\u0600-\u06FF]/;
		if(arabic.test(textToPut)){
			$(this).parent().parent().parent().find('p.given').css('direction','rtl')
			console.log('in in ');
		}

		$("span.given").draggable({
			helper: "clone",
			revert: "invalid"
		});

		makeDropText($("p.given span.w"));

		function textWrapper(str, sp) {
			if (sp == undefined) {
				sp = [0, 0];
			}
			var txt = "<span class='w'>" + str + "</span>";

			if (sp[0]) {
				txt = "&nbsp;" + txt;
			}

			if (sp[1]) {
				txt = txt + "&nbsp;";
			}

			return txt;
		}

		function chunkWords(p) {
			var words = p.split(" ");
			words[0] = textWrapper(words[0], [0, 1]);
			var i;
			for (i = 1; i < words.length; i++) {
				if (words[0].indexOf(".")) {
					words[i] = textWrapper(words[i], [1, 0]);
				} else {
					words[i] = textWrapper(words[i], [1, 1]);
				}
			}


			return words.join("");
		}

		function makeBtn(tObj) {
			var btn = $("<span>", {
				class: "ui-icon ui-icon-close"
			}).appendTo(tObj);
			btn.click(function(e) {
				$(this).parent().remove();
			});
		}

		function makeDropText(obj) {
			return obj.droppable({
				drop: function(e, ui) {
					var txt = ui.draggable.text();
					var newSpan = textWrapper(txt, [1, 0]);
					$(this).after(newSpan);
					makeBtn($(this).next("span.w"));
					makeDropText($(this).next("span.w"));
					$("span.w.ui-state-highlight").removeClass("ui-state-highlight");
				},
				over: function(e, ui) {
					$(this).add($(this).next("span.w")).addClass("ui-state-highlight");
				},
				out: function() {
					$(this).add($(this).next("span.w")).removeClass("ui-state-highlight");
				}
			});
		}

		/*		$(document).on('click', '.add-words', function() {
					var word='-'+$(this).parent().find('.word-to-be-added').val()+'-';
					$(this).parent().parent().parent().find('.section-to-add-word > span').last().after('<span class="given btn-flat white-text red lighten-1" rel="5">'+word+'</span>')
					$("span.given").draggable({
						helper: "clone",
						revert: "invalid"
					});

					makeDropText($("p.given span.w"));
				}) ;*/
	}) ;
	function textWrapper(str, sp) {
		if (sp == undefined) {
			sp = [0, 0];
		}
		var txt = "<span class='w'>" + str + "</span>";

		if (sp[0]) {
			txt = "&nbsp;" + txt;
		}

		if (sp[1]) {
			txt = txt + "&nbsp;";
		}

		return txt;
	}

	function chunkWords(p) {
		var words = p.split(" ");
		words[0] = textWrapper(words[0], [0, 1]);
		var i;
		for (i = 1; i < words.length; i++) {
			if (words[0].indexOf(".")) {
				words[i] = textWrapper(words[i], [1, 0]);
			} else {
				words[i] = textWrapper(words[i], [1, 1]);
			}
		}
		return words.join("");
	}

	function makeBtn(tObj) {
		var btn = $("<span>", {
			class: "ui-icon ui-icon-close"
		}).appendTo(tObj);
		btn.click(function(e) {
			$(this).parent().remove();
		});
	}
	function makeDropText(obj) {
		return obj.droppable({
			drop: function(e, ui) {
				var txt = ui.draggable.text();
				var newSpan = textWrapper(txt, [1, 0]);
				$(this).after(newSpan);
				makeBtn($(this).next("span.w"));
				makeDropText($(this).next("span.w"));
				$("span.w.ui-state-highlight").removeClass("ui-state-highlight");
			},
			over: function(e, ui) {
				$(this).add($(this).next("span.w")).addClass("ui-state-highlight");
			},
			out: function() {
				$(this).add($(this).next("span.w")).removeClass("ui-state-highlight");
			}
		});
	}
	$(document).on('click', '.add-words', function() {
		var word=$(this).parent().find('.word-to-be-added').val();
		$(this).parent().parent().parent().find('.section-to-add-word > span').last().after('<span class="given btn-flat white-text red lighten-1" rel="5"><a style="opacity:0;">¤</a>'+word+'<a style="opacity:0;">¤</a></span>')
		$(this).parent().find('.word-list-span').val($(this).parent().find('.word-list-span').val()+';'+word);

		$("span.given").draggable({
			helper: "clone",
			revert: "invalid"
		});

		makeDropText($("p.given span.w"));

		$('.word-to-be-added').val('');
	}) ;


	setInterval(putPtoInput, 1000);
	function putPtoInput() {
		textToPut=$('.text-to-fill-span');
		$('.text-to-fill-span').each(function (){

			$(this).parent().find('.input-text-with-words-span').val($(this).text())
		})
		//console.log($('.text-to-fill-span').parent().find('input-text-with-words-span'));


	}


	/* script canva draw */
	var color = $(".selected").css("background-color");
	var context = $("canvas")[0].getContext("2d");
	var $canvas = $("canvas");
	var lastEvent;
	var mouseDown = false;
	let canvas = document.getElementById("output");
	let ctx = canvas.getContext("2d");
	//when clicking on control list items
	$(".controls").on("click", "li", function() {
		//deselect sibling elements
		$(this).siblings().removeClass("selected");
		//select clicked element
		$(this).addClass("selected");
		//cache current color
		color = $(this).css("background-color");
	});

	//when add color is pressed
	$("#revealColorSelect").click(function() {
		//show or hide color select
		changeColor();
		$("#colorSelect").toggle();
	});

	//update newcolor span
	function changeColor() {
		var r = $("#red").val();
		var g = $("#green").val();
		var b = $("#blue").val();
		$("#newColor").css("background-color", "rgb(" + r + "," + g + "," + b + ")");
	}
	//when color sliders changed
	$("input[type=range]").change(changeColor);

	//when add color is pressed
	$("#addNewColor").click(function() {
		//append color to the controls ul
		var $newColor = $("<li></li>");
		$newColor.css("background-color", $("#newColor").css("background-color"));
		$(".controls ul").append($newColor);
		$newColor.click();
	});

	//on mouse events on canvas
	$canvas.mousedown(function(e) {
		lastEvent = e;
		mouseDown = true;
	}).mousemove(function(e) {
		//Draw lines
		if (mouseDown) {
			context.beginPath();
			context.moveTo(lastEvent.offsetX, lastEvent.offsetY);
			context.lineTo(e.offsetX, e.offsetY);
			context.strokeStyle = color;
			context.stroke();
			lastEvent = e;
		}
	}).mouseup(function() {
		mouseDown = false;
	}).mouseleave(function() {
		$canvas.mouseup();
		saveCanvas();
	});
	 function saveCanvas() {
		const imageURI = $("canvas")[0].toDataURL("image/png");
		$('#data-file-uploaded-multi-1').val(imageURI)

		/* var img = new Image();
		 img.src = "";
		 var ctx = $("canvas")[1].getContext('2d');
		 img.onload = function() {
			 ctx.drawImage(img, 0, 0);
		 };
*/

		//el.href = imageURI;
		//$("body").append(image);
		/*var file = dataURLtoFile(image.src, 'canvas.png');
		console.log(file);
		$('#file-uploaded-multi-1').attr('src', image.src);
		$('#file-uploaded-multi-1').prop('files', file);*/
		// Convert the data URL to a Blob object
		/*var blob = dataURLToBlob(imageURI);
		console.log(blob)/!*
		// Create a file object from the Blob
		var file = new File([blob], "myimage.png", { type: "image/png" });
		 console.log(file)
		// Set the value of the file input field to the file object*!/



			 // create a new blob URL from the blob
			 var blobUrl = URL.createObjectURL(blob);

			 // create a new image element and set its source to the blob URL
			 var img = new Image();
			 img.src = blobUrl;

			 // append the image element to the file input label
			 var label = $("label[for='file-uploaded-multi-1']");
			 label.append(img);

			 // add an event listener to the file input
			 var fileInput = document.getElementById("file-uploaded-multi-1");
			 fileInput.addEventListener("change", function(event) {
				 var file = event.target.files[0];
				 console.log("Selected file: " + file.name);
			 });*/


	};
	// Function to convert data URL to Blob
	function dataURLToBlob(dataURL) {
		var parts = dataURL.split(';base64,');
		var contentType = parts[0].split(':')[1];
		var raw = window.atob(parts[1]);
		var rawLength = raw.length;
		var uInt8Array = new Uint8Array(rawLength);

		for (var i = 0; i < rawLength; ++i) {
			uInt8Array[i] = raw.charCodeAt(i);
		}

		return new Blob([uInt8Array], { type: contentType });
	}
	function dataURLtoFile(dataURL, filename) {
		var arr = dataURL.split(',');
		var mime = arr[0].match(/:(.*?);/)[1];
		var bstr = atob(arr[1]);
		var n = bstr.length;
		var u8arr = new Uint8Array(n);
		while (n--) {
			u8arr[n] = bstr.charCodeAt(n);
		}
		return new File([u8arr], filename, {type:mime});
	}

</script>
<script>
	tinymce.init({
		selector: '#editor',
		plugins: 'powerpaste casechange searchreplace autolink directionality advcode visualblocks visualchars image link media mediaembed codesample table charmap pagebreak nonbreaking anchor tableofcontents insertdatetime advlist lists checklist wordcount tinymcespellchecker editimage help formatpainter permanentpen charmap linkchecker emoticons advtable export autosave',
		toolbar: 'undo redo print spellcheckdialog formatpainter | blocks fontfamily fontsize | bold italic underline forecolor backcolor | link image | alignleft aligncenter alignright alignjustify lineheight | checklist bullist numlist indent outdent | removeformat',
		height: '700px',
		menu: {
			file: { title: 'File', items: 'newdocument restoredraft | preview | export print | deleteallconversations' },
			edit: { title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall | searchreplace' },
			view: { title: 'View', items: '' },
			insert: { title: 'Insert', items: ' link   pageembed template codesample  | charmap emoticons hr |     | insertdatetime' },
			format: { title: 'Format', items: 'bold italic underline strikethrough superscript subscript codeformat | styles blocks fontfamily fontsize align lineheight | forecolor backcolor | language | removeformat' },
			tools: { title: 'Tools', items: '' },
			table: { title: 'Table', items: '' },
			help: { title: 'Help', items: '' }
		}
	});
</script>
</html>
