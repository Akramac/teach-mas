
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
			<form id="msform-teacher" method="POST" action="<?php echo base_url(); ?>index.php/teacher/edit-exam" enctype='multipart/form-data'>
				<div class="form-group">
					<label style="text-align:left">Title of the exam</label>
					<input type="text"  name="title_exam" value="<?php echo $title_exam; ?>" required>
					<input type="text"  name="id_exam" value="<?php echo $id_exam; ?>" required hidden>
				</div>

				<div class="input-field col s12">
					<select class="browser-default" name="select-category" style="margin-top:7%;" required>
						<option value=""  disabled>Choose the category</option>

						<?php foreach($categories as $categorie) { ?>
							<option value="<?php echo $categorie->id; ?>" <?php if($categorie->id==$categorie_id) { ?> selected <?php } ?>><?php echo $categorie->name; ?></option>
						<?php } ?>
					</select>

				</div>
				<div class="input-field col s12">
					<label style="text-align:left;margin-top: -6%;">Choose the time option</label>
					<select class="browser-default" name="select-time-option" id="select-time-option" style="margin-top:7%;" required>
						<option value=""  disabled selected>Choose the time option</option>
						<option value="whole-time"  id="whole-time" <?php if($durationExam!='00:00:00') { ?> selected <?php } ?>>Time for Whole exam</option>
						<option value="each-question-time" id="each-question-time" <?php if($durationExam=='00:00:00') { ?> selected <?php } ?>>Time for each question</option>

					</select>

				</div>
				<div class="form-group" id="whole-duration-pick">
					<label style="text-align:left">Duration of the whole exam <a style="color:black;">(h:m:s)</a></label>
					<input type="text" class="time-pick" id="timepicker" value="<?php echo $durationExam; ?>"  name="usr_time_exam">
				</div>
				<div class="input-field col s12">
					<label style="text-align:left;margin-top: -6%;">Choose to record screen/camera of the student</label>
					<span class="checkbox" style="margin-top:7%;">
						<input type="checkbox" class="check-record" name="record-screen" id="record-screen" <?php if($allowScreenRecord==true) { ?> checked <?php } ?>>
						<label for="record-screen"> <i></i>Record screen</label>
					</span>
					<span class="checkbox">
						<input type="checkbox" class="check-record" name="record-camera" id="record-camera" <?php if($allowCameraRecord==true) { ?> checked <?php } ?>>
						<label for="record-camera"><i></i>Record Camera</label>
					</span>

				</div>
				<div class="input-field col s12">
					<label style="text-align:left;margin-top: -6%;">Choose to make random order of questions</label>
					<span class="checkbox" style="margin-top:7%;">
						<input type="checkbox" class="check-random-questions" name="check-random-questions" id="check-random-questions" <?php if($randomQuestions==true) { ?> checked <?php } ?>>
						<label for="check-random-questions"> <i></i>Random Questions</label>
					</span>

				</div>
				<div class="input-field col s12">
					<label style="text-align:left;margin-top: -6%;">Choose to not retake the exam by students</label>
					<span class="checkbox" style="margin-top:7%;">
						<input type="checkbox" class="check-no-retake-exam" name="check-no-retake-exam" id="check-no-retake-exam" <?php if($noRetakeExam==true) { ?> checked <?php } ?>>
						<label for="check-no-retake-exam"> <i></i>Do not Retake the exam</label>
					</span>
				</div>
				<div class="col-md-12" >
					<h5> Copy paste equations from this editor</h5>
					<textarea id="editor"></textarea>
				</div>
				<div class="quest-0 quest--list">
				</div>
				<?php $countMultiQuest=0;$countSteps=1;?>
				<?php foreach($listQuestionsSingleChoice as $question) {
					$countMultiQuest++;
					?>
				<div class="quest-<?php echo $countSteps; ?> quest--list">
					<input type="text" name="quest_mutliple-<?php echo $countMultiQuest; ?>" value="quest_mutliple" hidden>
					<input type="text" name="count-quest-mutli" value="<?php echo $countMultiQuest; ?>" hidden>
					<input type="text" name="id-quest-multi-<?php echo $countMultiQuest; ?>" value="<?php echo $question->quest_multi_id; ?>" hidden>
					<a class="btn-floating btn-large waves-effect waves-light red close-question" name="<?php echo $question->quest_multi_id; ?>" alt="quest_mutliple"  id="close-<?php echo $countSteps; ?>" style="float:right;"><i class="fa fa-times"></i></a>
					<div data-step-label="" class="step-title waves-effect waves-dark">Question <?php echo $countSteps; ?></div>
					<div class="step-content">
						<div class="row">
							<div class="input-field col s12">
								<div class="col-md-12" >
									<div class="form-group">
										<label style="text-align:left">Title of your question</label>
										<input type="text" name="title-question-multi-<?php echo $countMultiQuest; ?>" class="form-control" value="<?php echo $question->title ; ?>" required="required">
									</div>
								</div>
								<div class="col-md-12" >
									<div class="form-group">
										<label style="text-align:left">Point of the question</label>
										<input type="number" class="form-control"  min="0" max="20"   name="points-multi-<?php echo $countMultiQuest; ?>" value="<?php echo $question->points ; ?>" required>
									</div>
								</div>
								<div class="col-md-12" >
									<div class="form-group duration-each-input">
										<label style="text-align:left">Duration of the question</label>
										<p>
											<label>
												<input class="no-specific-time" name="no-specific-time-multi-<?php echo $countMultiQuest; ?>"  type="checkbox" <?php if($question->no_specific_time==true) { ?> checked <?php } ?>/>
												<span>no specific time</span>
											</label>
										</p>
										<input type="text" class="time-pick" value="<?php echo $question->duration ; ?>"   name="usr_time-multi-<?php echo $countMultiQuest; ?>">
									</div>
								</div>
								<div class="col-md-12" >
									<p>
										<label>
											<input class="indeterminate-checkbox-single" name="indeterminate-checkbox-single-1" value="single" type="radio" <?php if($question->is_single_choice==true) { ?> checked <?php } ?>/>
											<span>Single Choice</span>
										</label>
									</p>
									<p>
										<label>
											<input class="indeterminate-checkbox-multiple" name="indeterminate-checkbox-single-1" value="multiple" type="radio" <?php if($question->is_single_choice==false) { ?> checked <?php } ?> />
											<span>Multiple choices</span>
										</label>
									</p>
								</div>

								<div class="col-md-12" >
									<label style="text-align:left">Options (Max 6) <a alt="1" title="Show all"  class="btn-floating btn-small waves-effect waves-light red show-all-option-btn" > <i class="fa fa-eye"></i></a></label>
									<div class="form-group">
										<div class="col-md-6" >
											<a class="btn-floating btn-small waves-effect waves-light green correct-option-btn" > <i class="fa fa-check"></i></a>
											<input type="text" class="form-control options-list" value="<?php echo $question->option_1 ; ?>"  name="option-multi-1-<?php echo $countMultiQuest; ?>">
											<input type="text" style="display: none;" class="form-control correct-options-list" value="<?php echo $question->correct_option_1 ; ?>"  name="correct-option-multi-1-<?php echo $countMultiQuest; ?>">
										</div>
										<div class="col-md-6" >
											<a class="btn-floating btn-small waves-effect waves-light green correct-option-btn" > <i class="fa fa-check"></i></a>
											<input type="text" class="form-control options-list"  value="<?php echo $question->option_2 ; ?>" name="option-multi-2-<?php echo $countMultiQuest; ?>">
											<input type="text" style="display: none;" class="form-control correct-options-list" value="<?php echo $question->correct_option_2 ; ?>"  name="correct-option-multi-2-<?php echo $countMultiQuest; ?>">
										</div>
										<div class="col-md-6" >
											<a class="btn-floating btn-small waves-effect waves-light red remove-option-btn" > <i class="fa fa-minus"></i></a>
											<a class="btn-floating btn-small waves-effect waves-light green correct-option-btn" > <i class="fa fa-check"></i></a>
											<input type="text" class="form-control options-list" value="<?php echo $question->option_3 ; ?>"  name="option-multi-3-<?php echo $countMultiQuest; ?>">
											<input type="text" style="display: none;" class="form-control correct-options-list"  value="<?php echo $question->correct_option_3 ; ?>" name="correct-option-multi-3-<?php echo $countMultiQuest; ?>">
										</div>
										<div class="col-md-6" >
											<a class="btn-floating btn-small waves-effect waves-light red remove-option-btn" > <i class="fa fa-minus"></i></a>
											<a class="btn-floating btn-small waves-effect waves-light green correct-option-btn" > <i class="fa fa-check"></i></a>
											<input type="text" class="form-control options-list"  value="<?php echo $question->option_4 ; ?>" name="option-multi-4-<?php echo $countMultiQuest; ?>">
											<input type="text" style="display: none;" class="form-control correct-options-list" value="<?php echo $question->correct_option_4 ; ?>"  name="correct-option-multi-4-<?php echo $countMultiQuest; ?>">
										</div>
										<div class="col-md-6" >
											<a <?php if($question->option_5==''){ ?> style="display: none;" <?php } ?> class="btn-floating btn-small waves-effect waves-light red remove-option-btn" > <i class="fa fa-minus"></i></a>
											<a class="btn-floating btn-small waves-effect waves-light green correct-option-btn" > <i class="fa fa-check"></i></a>
											<?php if($question->option_5==''){ ?>
												<a class="btn-floating btn-small waves-effect waves-light red add-option-btn" > <i class="fa fa-plus"></i></a>
											 <?php } ?>
											<input type="text"  value="<?php echo $question->option_5 ; ?>" <?php if($question->option_5==''){ ?> style="display: none;" <?php } ?> class="form-control options-list"  value="<?php echo $question->option_5 ; ?>" name="option-multi-5-<?php echo $countMultiQuest; ?>">
											<input type="text" style="display: none;" class="form-control correct-options-list" value="<?php echo $question->correct_option_5 ; ?>"  name="correct-option-multi-5-<?php echo $countMultiQuest; ?>">
										</div>
										<div class="col-md-6" >
											<a <?php if($question->option_5==''){ ?> style="display: none;" <?php } ?> class="btn-floating btn-small waves-effect waves-light red remove-option-btn" > <i class="fa fa-minus"></i></a>
											<a class="btn-floating btn-small waves-effect waves-light green correct-option-btn" > <i class="fa fa-check"></i></a>
											<?php if($question->option_6==''){ ?>
												<a class="btn-floating btn-small waves-effect waves-light red add-option-btn" > <i class="fa fa-plus"></i></a>
											<?php } ?>
											<input type="text"   value="<?php echo $question->option_6 ; ?>"  <?php if($question->option_5==''){ ?> style="display: none;" <?php } ?> class="form-control options-list"  value="<?php echo $question->option_6 ; ?>" name="option-multi-6-<?php echo $countMultiQuest; ?>">
											<input type="text" style="display: none;" class="form-control correct-options-list" value="<?php echo $question->correct_option_6 ; ?>"  name="correct-option-multi-6-<?php echo $countMultiQuest; ?>">
										</div>
									</div>
								</div>
								<div class="col-md-12" style="text-align: left;" >
									<div class = "row">
										<label>Upload Image</label>
										<div class = "file-field input-field">
											<div class = "btn">
												<span>Browse</span>
												<input name="file-uploaded-multi-<?php echo $countMultiQuest; ?>" type = "file" />
											</div>

											<div class = "file-path-wrapper">
												<input class = "file-path validate" type = "text"
													   placeholder = "Upload file" />
											</div>
										</div>
										<div>
											<img alt="no image" src="<?php echo base_url().'assets/uploads/'.$question->image ; ?>"  style="width:90px;"/>
										</div>
									</div>
								</div>
							</div>
						</div>


					</div>

				</div>

				<?php $countSteps++; } ?>
				<?php
				$countLongQuest=0;
				foreach($listQuestionsLongText as $question) {
				$countLongQuest++;
				?>
				<div class="quest-<?php echo $countSteps; ?> quest--list">
					<input type="text" name="quest_long_text-<?php echo $countLongQuest; ?>" value="quest_long_text" hidden>
					<input type="text" name="count-quest-long-text" value="<?php echo $countLongQuest; ?>" hidden>
					<input type="text" name="id-quest-long-<?php echo $countLongQuest; ?>" value="<?php echo $question->quest_long_text_id; ?>" hidden>
					<a class="btn-floating btn-large waves-effect waves-light red close-question" name="<?php echo $question->quest_long_text_id; ?>" alt="quest_long_text" id="close-<?php echo $countSteps; ?>" style="float:right;"><i class="fa fa-times"></i></a>
					<div data-step-label="" class="step-title waves-effect waves-dark">Question <?php echo $countSteps; ?></div>
					<div class="step-content">
						<div class="row">
							<div class="input-field col s12">
								<div class="col-md-12" >
									<div class="form-group">
										<label style="text-align:left">Title of your question</label>
										<input type="text" name="title-question-long-<?php echo $countLongQuest; ?>" class="form-control" value="<?php echo $question->title ; ?>" required="required">
									</div>
								</div>
								<div class="col-md-12" >
									<div class="form-group">
										<label style="text-align:left">Point of the question</label>
										<input type="number" class="form-control"  min="0" max="20" value="<?php echo $question->points ; ?>"  name="points-long-<?php echo $countLongQuest; ?>" required>
									</div>
								</div>
								<div class="col-md-12" >
									<div class="form-group duration-each-input">
										<label style="text-align:left">Duration of the question</label>
										<p>
											<label>
												<input class="no-specific-time" name="no-specific-time-long-<?php echo $countLongQuest; ?>"  type="checkbox" <?php if($question->no_specific_time==true) { ?> checked <?php } ?>/>
												<span>no specific time</span>
											</label>
										</p>
										<input type="text" class="time-pick" value="<?php echo $question->duration ; ?>" name="usr_time-long-<?php echo $countLongQuest; ?>">
									</div>
								</div>
								<div class="col-md-12" >
									<div class="form-group">
										<label style="text-align:left">Correct answer of the question</label>
										<input type="text" name="correct-question-long-<?php echo $countLongQuest; ?>" class="form-control" value="<?php echo $question->correct_long_text ; ?>" required="required">
									</div>
								</div>
								<div class="col-md-12" style="text-align: left;" >
									<div class = "row">
										<label>Upload Image</label>
										<div class = "file-field input-field">
											<div class = "btn">
												<span>Browse</span>
												<input type = "file" name="file-uploaded-long-<?php echo $countLongQuest; ?>"/>
											</div>

											<div class = "file-path-wrapper">
												<input   class = "file-path validate" type = "text"
														placeholder = "Upload file" />
											</div>
										</div>
										<div>
											<img alt="no image" src="<?php echo base_url().'assets/uploads/'.$question->image ; ?>"  style="width:90px;"/>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php $countSteps++;  } ?>
				<?php $countTawsilQuest=0;
				foreach($listQuestionsTawsil as $question) {
				$countTawsilQuest++;
				?>
					<div class="quest-<?php echo $countSteps; ?> quest--list">
						<input type="text" name="quest_tawsil-<?php echo $countTawsilQuest; ?>" value="quest_tawsil" hidden>
						<input type="text" name="count-quest-tawsil" value="<?php echo $countTawsilQuest; ?>" hidden>
						<input type="text" name="id-quest-tawsil-<?php echo $countTawsilQuest; ?>" value="<?php echo $question->quest_tawsil_id; ?>" hidden>
						<a class="btn-floating btn-large waves-effect waves-light red close-question"  name="<?php echo $question->quest_tawsil_id; ?>" alt="quest_tawsil" id="close-<?php echo $countSteps; ?>" style="float:right;"><i class="fa fa-times"></i></a>
						<div data-step-label="" class="step-title waves-effect waves-dark">Question <?php echo $countSteps; ?></div>
						<div class="step-content">
							<div class="row">
								<div class="input-field col s12">
									<div class="col-md-12" >
										<div class="form-group">
											<label style="text-align:left">Title of your question</label>
											<input type="text" name="title-question-tawsil-<?php echo $countTawsilQuest; ?>" class="form-control" value="<?php echo $question->title ; ?>"   required="required">
										</div>
									</div>
									<div class="col-md-12" >
										<div class="form-group">
											<label style="text-align:left">Point of the question</label>
											<input type="number" class="form-control"  min="0" max="20"   value="<?php echo $question->points ; ?>" name="points-tawsil-<?php echo $countTawsilQuest; ?>" required>
										</div>
									</div>
									<div class="col-md-12" >
										<div class="form-group duration-each-input">
											<label style="text-align:left">Duration of the question</label>
											<p>
												<label>
													<input class="no-specific-time" name="no-specific-time-tawsil-<?php echo $countTawsilQuest; ?>"  type="checkbox" <?php if($question->no_specific_time==true) { ?> checked <?php } ?> />
													<span>no specific time</span>
												</label>
											</p>
											<input type="text" class="time-pick" value="<?php echo $question->duration ; ?>"  name="usr_time-tawsil-<?php echo $countTawsilQuest; ?>">
										</div>
									</div>
									<div class="col-md-12" >
										<label style="text-align:left">Options Linked (Max 6)</label>
										<div class="form-group">
											<div class="col-md-5" >
												<input type="text" class="form-control options-list"  value="<?php echo $question->option_1 ; ?>" name="option-tawsil-1-<?php echo $countTawsilQuest; ?>">
											</div>
											<div class="col-md-2" >
												<img src="<?php echo base_url(); ?>assets/images/links-icon.png" style="width:30px;    margin-left: 40%;"/>
											</div>
											<div class="col-md-5" >
												<input type="text" class="form-control options-list"  value="<?php echo $question->link_option_1 ; ?>" name="link-option-tawsil-1-<?php echo $countTawsilQuest; ?>">
											</div>
											<div class="col-md-5" >
												<input type="text" class="form-control options-list" value="<?php echo $question->option_2 ; ?>"  name="option-tawsil-2-<?php echo $countTawsilQuest; ?>">
											</div>
											<div class="col-md-2" >
												<img src="<?php echo base_url(); ?>assets/images/links-icon.png" style="width:30px;    margin-left: 40%;"/>
											</div>
											<div class="col-md-5" >
												<input type="text" class="form-control options-list"  value="<?php echo $question->link_option_2 ; ?>" name="link-option-tawsil-2-<?php echo $countTawsilQuest; ?>">
											</div>
											<div class="col-md-5" >
												<input type="text" class="form-control options-list" value="<?php echo $question->option_3 ; ?>"  name="option-tawsil-3-<?php echo $countTawsilQuest; ?>">
											</div>
											<div class="col-md-2" >
												<img src="<?php echo base_url(); ?>assets/images/links-icon.png" style="width:30px;    margin-left: 40%;"/>
											</div>
											<div class="col-md-5" >
												<input type="text" class="form-control options-list" value="<?php echo $question->link_option_3 ; ?>"   name="link-option-tawsil-3-<?php echo $countTawsilQuest; ?>">
											</div>
											<div class="col-md-5" >
												<input type="text" class="form-control options-list" value="<?php echo $question->option_4 ; ?>"  name="option-tawsil-4-<?php echo $countTawsilQuest; ?>">
											</div>
											<div class="col-md-2" >
												<img src="<?php echo base_url(); ?>assets/images/links-icon.png" style="width:30px;    margin-left: 40%;"/>
											</div>
											<div class="col-md-5" >
												<input type="text" class="form-control options-list" value="<?php echo $question->link_option_4 ; ?>"  name="link-option-tawsil-4-<?php echo $countTawsilQuest; ?>">
											</div>
											<div>
												<div class="col-md-5" >
													<input type="text" class="form-control options-list tawsil-grised" value="<?php echo $question->option_5 ; ?>"  name="option-tawsil-5<?php echo $countTawsilQuest; ?>">
												</div>
												<div class="col-md-2" >
													<img src="<?php echo base_url(); ?>assets/images/links-icon.png" style="width:30px;    margin-left: 40%;"/>
												</div>
												<div class="col-md-5" >
													<input type="text" class="form-control options-list tawsil-grised" value="<?php echo $question->link_option_5 ; ?>"  name="link-option-tawsil-5-<?php echo $countTawsilQuest; ?>">
												</div>
											</div>
											<div>
												<div class="col-md-5" >
													<input type="text" class="form-control options-list tawsil-grised"  value="<?php echo $question->option_6 ; ?>" name="option-tawsil-6-<?php echo $countTawsilQuest; ?>">
												</div>
												<div class="col-md-2" >
													<img src="<?php echo base_url(); ?>assets/images/links-icon.png" style="width:30px;    margin-left: 40%;"/>
												</div>
												<div class="col-md-5" >
													<input type="text" class="form-control options-list tawsil-grised" value="<?php echo $question->link_option_6 ; ?>"  name="link-option-tawsil-6-<?php echo $countTawsilQuest; ?>">
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
													<input  type = "file" name="file-uploaded-tawsil-<?php echo $countTawsilQuest; ?>" />
												</div>

												<div class = "file-path-wrapper">
													<input  class = "file-path validate" type = "text"
														   placeholder = "Upload file" />
												</div>
											</div>
											<div>
												<img alt="no image" src="<?php echo base_url().'assets/uploads/'.$question->image ; ?>"  style="width:90px;"/>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php $countSteps++; } ?>
				<?php $countTartibQuest=0;
				foreach($listQuestionsTartib as $question) {
				$countTartibQuest++;
				?>
						<div class="quest-<?php echo $countSteps; ?> quest--list">
							<input type="text" name="quest_tartib-<?php echo $countTartibQuest; ?>" value="quest_tartib" hidden>
							<input type="text" name="count-quest-tartib" value="<?php echo $countTartibQuest; ?>" hidden>
							<input type="text" name="id-quest-tartib-<?php echo $countTartibQuest; ?>" value="<?php echo $question->quest_tartib_id; ?>" hidden>
							<a class="btn-floating btn-large waves-effect waves-light red close-question"  name="<?php echo $question->quest_tartib_id; ?>"  alt="quest_tartib" id="close-<?php echo $countSteps; ?>" style="float:right;"><i class="fa fa-times"></i></a>
							<div data-step-label="" class="step-title waves-effect waves-dark">Question <?php echo $countSteps; ?></div>
							<div class="step-content">
								<div class="row">
									<div class="input-field col s12">
										<div class="col-md-12" >
											<div class="form-group">
												<label style="text-align:left">Title of your question</label>
												<input type="text" name="title-question-tartib-<?php echo $countTartibQuest; ?>" value="<?php echo $question->title ; ?>" class="form-control"  required="required">
											</div>
										</div>
										<div class="col-md-12" >
											<div class="form-group">
												<label style="text-align:left">Point of the question</label>
												<input type="number" class="form-control"  min="0" max="20"  value="<?php echo $question->points ; ?>"  name="points-tartib-<?php echo $countTartibQuest; ?>" required>
											</div>
										</div>
										<div class="col-md-12" >
											<div class="form-group duration-each-input">
												<label style="text-align:left">Duration of the question</label>
												<p>
													<label>
														<input class="no-specific-time" name="no-specific-time-tartib-<?php echo $countTartibQuest; ?>"  type="checkbox" <?php if($question->no_specific_time==true) { ?> checked <?php } ?>  />
														<span>no specific time</span>
													</label>
												</p>
												<input type="text" class="time-pick" value="<?php echo $question->duration ; ?>"  onfocus="this.showPicker()" name="usr_time-tartib-<?php echo $countTartibQuest; ?>">
											</div>
										</div>
										<div class="col-md-12" >
											<label style="text-align:left">Options in order (Max 4)</label>
											<div class="form-group">
												<div class="col-md-6" >1.
													<input type="text" class="form-control options-to-order-list" value="<?php echo $question->option_to_order_1 ; ?>" name="option-to-order-1-<?php echo $countTartibQuest; ?>">
												</div>
												<div class="col-md-6" >2.
													<input type="text" class="form-control options-to-order-list" value="<?php echo $question->option_to_order_2 ; ?>"  name="option-to-order-2-<?php echo $countTartibQuest; ?>">
												</div>
												<div class="col-md-6" >3.
													<input type="text" class="form-control options-to-order-list"  value="<?php echo $question->option_to_order_3 ; ?>" name="option-to-order-3-<?php echo $countTartibQuest; ?>">
												</div>
												<div class="col-md-6" >4.
													<input type="text" class="form-control options-to-order-list" value="<?php echo $question->option_to_order_4 ; ?>"  name="option-to-order-4-<?php echo $countTartibQuest; ?>">
												</div>

												<div class="col-md-6" >5. optional
													<input type="text" class="form-control options-to-order-list tawsil-grised" value="<?php echo $question->option_to_order_5 ; ?>"  name="option-to-order-5-<?php echo $countTartibQuest; ?>">
												</div>
												<div class="col-md-6" >6. optional
													<input type="text" class="form-control options-to-order-list tawsil-grised" value="<?php echo $question->option_to_order_6 ; ?>"  name="option-to-order-6-<?php echo $countTartibQuest; ?>">
												</div>
											</div>
										</div>
										<div class="col-md-12" style="text-align: left;" >
											<div class = "row">
												<label>Upload Image</label>
												<div class = "file-field input-field">
													<div class = "btn">
														<span>Browse</span>
														<input type = "file" name="file-uploaded-tartib-<?php echo $countTartibQuest; ?>" />
													</div>

													<div class = "file-path-wrapper">
														<input  class = "file-path validate" type = "text"
															   placeholder = "Upload file" />
													</div>
												</div>
												<div>
													<img alt="no image" src="<?php echo base_url().'assets/uploads/'.$question->image ; ?>"  style="width:90px;"/>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php $countSteps++; } ?>

						<?php $countSpanQuest=0;
						foreach($listQuestionsSpan as $question) {
						$countSpanQuest++;?>
							<div class="quest-<?php echo $countSteps; ?> quest--list">
								<input type="text" name="quest_span-<?php echo $countSpanQuest; ?>" value="quest_span" hidden>
								<input type="text" name="count-quest-span" value="<?php echo $countSpanQuest; ?>" hidden>
								<input type="text" name="id-quest-span-<?php echo $countSpanQuest; ?>" value="<?php echo $question->quest_span_id; ?>" hidden>
								<a class="btn-floating btn-large waves-effect waves-light red close-question"  name="<?php echo $question->quest_span_id; ?>" alt="quest_span" id="close-<?php echo $countSteps; ?>" style="float:right;"><i class="fa fa-times"></i></a>
								<div data-step-label="" class="step-title waves-effect waves-dark">Question <?php echo $countSteps; ?></div>
								<div class="step-content">
									<div class="row">
										<div class="input-field col s12">
											<div class="col-md-12" >
												<div class="form-group">
													<label style="text-align:left">Title of your question</label>
													<input type="text" name="title-question-span-<?php echo $countSpanQuest; ?>" value="<?php echo $question->title ; ?>" class="form-control"  required="required">
												</div>
											</div>
											<div class="col-md-12" >
												<div class="form-group">
													<label style="text-align:left">Point of the question</label>
													<input type="number" class="form-control"  min="0" max="20"  value="<?php echo $question->points ; ?>"  name="points-span-<?php echo $countSpanQuest; ?>" required>
												</div>
											</div>
											<div class="col-md-12" >
												<div class="form-group duration-each-input">
													<label style="text-align:left">Duration of the question</label>
													<p>
														<label>
															<input class="no-specific-time" name="no-specific-time-span-<?php echo $countSpanQuest; ?>"  type="checkbox" <?php if($question->no_specific_time==true) { ?> checked <?php } ?> />
															<span>no specific time</span>
														</label>
													</p>
													<input type="text" class="time-pick" value="<?php echo $question->duration ; ?>" name="usr_time-span-<?php echo $countSpanQuest; ?>">
												</div>
											</div>
											<div class="col-md-12" >
												<div class="form-group">
													<label for="textarea1" style="text-align:left">Text </label>
													<textarea  class="materialize-textarea text-span" style="height: 90px;" name="text-span-<?php echo $countSpanQuest; ?>" required><?php echo $question->span_text ; ?></textarea>
												</div>
											</div>
											<div class="col-md-12" >
												<div class="form-group">
													<label style="text-align:left;float:left;">Words to fit</label> &nbsp;&nbsp;<a class="btn-floating btn-small waves-effect waves-light red add-words" id="add-words-<?php echo $countSpanQuest; ?>" style="float:left;"><i class="fa fa-plus"></i></a>
													<input type="text" class="form-control word-to-be-added"     name="words-span-<?php echo $countSpanQuest; ?>" >
													<input type="text" value="" class="form-control word-list-span"     name="words-list-span-<?php echo $countSpanQuest; ?>" hidden>

												</div>
											</div>

											<div class="col-md-12" >
												<div class="row">
													<p class="given text-to-fill-span" contenteditable="true">
														<?php
															$fullstring =$question->span_text;
															$fullstring=str_replace("  "," ",$fullstring);
															$parts=explode(' ',$fullstring);
															if($parts[0]==$fullstring)	{
																$parts=explode(' ',$fullstring);
															}
															foreach ($parts as $i => $p){
															?>
															<span class="w ui-droppable"> <?php echo $p ;?> </span>&nbsp;
														<?php } ?>
													</p>
													<!--<p class="given text-to-fill-span"    contenteditable="true" readonly="readonly"></p>-->
													<input type="text" value="" class="form-control input-text-with-words-span"     name="input-text-with-words-span-<?php echo $countSpanQuest; ?>" hidden>

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
															<input type = "file" name="file-uploaded-span-<?php echo $countSpanQuest; ?>" />
														</div>

														<div class = "file-path-wrapper">
															<input   class = "file-path validate" type = "text"
																	placeholder = "Upload file" />
														</div>
													</div>
													<div>
														<img alt="no image" src="<?php echo base_url().'assets/uploads/'.$question->image ; ?>"  style="width:90px;"/>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php $countSteps++; } ?>
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
				<a  class="modal-action
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
		});



		$('.time-pick').on('change', function() {
			let receivedVal = $(this).val();
			$(this).val(receivedVal + ":00");
		});*/

/*		$('.text-span').each(function(){
			var textToPut=$(this).val();
			console.log('tetxttxtx:',$(this).parent().parent().parent().find('.text-to-fill-span'));
			//$(this).parent().parent().parent().find('.text-to-fill-span').text();
			$(this).parent().parent().parent().find('.text-to-fill-span').html(chunkWords(textToPut));
			$(this).parent().parent().parent().find('.text-to-fill-span').html(chunkWords(textToPut));
		})*/
		$('.time-pick').timepicker({
			timeFormat: 'HH:mm:ss',
			showSecond: true
		});
		var countMultiQuest='<?php echo $countMultiQuest; ?>';
		var countLongQuest='<?php echo $countLongQuest; ?>';
		var countTawsilQuest='<?php echo $countTawsilQuest; ?>';
		var countTartibQuest='<?php echo $countTartibQuest; ?>';
		var countSpanQuest='<?php echo $countSpanQuest; ?>' ;
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
									<a class="btn-floating btn-small waves-effect waves-light green correct-option-btn" > <i class="fa fa-check"></i></a>
								    <a class="btn-floating btn-small waves-effect waves-light red add-option-btn" > <i class="fa fa-plus"></i></a>
									<input type="text"  value="" style="display:none;" class="form-control options-list"  name="option-multi-5-${countMultiQuest}">
									<input type="text" style="display: none;" class="form-control correct-options-list"  name="correct-option-multi-5-${countMultiQuest}">
								</div>
								<div class="col-md-6" >
									<a class="btn-floating btn-small waves-effect waves-light red add-option-btn" > <i class="fa fa-plus"></i></a>
									<a style="display: none;" class="btn-floating btn-small waves-effect waves-light red remove-option-btn" > <i class="fa fa-minus"></i></a>
									<a class="btn-floating btn-small waves-effect waves-light green correct-option-btn" > <i class="fa fa-check"></i></a>
									<input type="text"   value=""  style="display:none;" class="form-control options-list"  name="option-multi-6-${countMultiQuest}">
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
										<input   type = "file" name="file-uploaded-multi-${countMultiQuest}" />
									</div>

									<div class = "file-path-wrapper">
										<input  class = "file-path validate" type = "text"
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
										<input type = "file" name="file-uploaded-long-${countLongQuest}"/>
									</div>

									<div class = "file-path-wrapper">
										<input   class = "file-path validate" type = "text"
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
										<input  type = "file" name="file-uploaded-tawsil-${countTawsilQuest}" />
									</div>

									<div class = "file-path-wrapper">
										<input  class = "file-path validate" type = "text"
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
										<input type = "file" name="file-uploaded-tartib-${countTartibQuest}" />
									</div>

									<div class = "file-path-wrapper">
										<input  class = "file-path validate" type = "text"
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
								<label style="text-align:left;float:left;">Words to fit</label> &nbsp;&nbsp;<a class="btn-floating btn-small waves-effect waves-light red add-words" id="add-words-${countSpanQuest}" style="float:left;"><i class="fa fa-plus"></i></a>
								<input type="text" class="form-control word-to-be-added"     name="words-span-${countSpanQuest}" >
								<input type="text" value="" class="form-control word-list-span"     name="words-list-span-${countSpanQuest}" hidden>

							</div>
						</div>

						<div class="col-md-12" >
							<div class="row">
							  <p class="given text-to-fill-span"    contenteditable="true" readonly="readonly"></p>
								<input type="text" value="" class="form-control input-text-with-words-span"     name="input-text-with-words-span-${countSpanQuest}" >

							</div>

							<div class="divider"></div>
							<div class="section">
							  <section>
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
										<input type = "file" name="file-uploaded-span-${countSpanQuest}" />
									</div>

									<div class = "file-path-wrapper">
										<input   class = "file-path validate" type = "text"
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
						$(document).on('keyup', '.text-span', function() {
							var textToPut=$(this).val();
							//$(this).parent().parent().parent().find('.text-to-fill-span').text();
							$(this).parent().parent().parent().find('.text-to-fill-span').html(chunkWords(textToPut));
							var arabic = /[\u0600-\u06FF]/;
							if(arabic.test(textToPut)){
								$(this).parent().parent().parent().find('p.given').css('direction','rtl')
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

							function chunkWordsAdded(p) {
								var words = p.split(" ");
								console.log('words==',words)
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
						break;
				}
			}
		});


		$( ".time-pick" ).focus(function() {
			this.showPicker();
		});
		<?php if($durationExam!='00:00:00') { ?>
		$('.duration-each-input').hide();
		$('.duration-each-input .time-pick').val('00:00:00');
		<?php } ?>
		<?php if($durationExam=='00:00:00') { ?>
		$('#whole-duration-pick').hide();
		$('#whole-duration-pick #timepicker').val('00:00:00');
		<?php } ?>

		$('.correct-options-list').each(function(){
				if(($(this).val())=='correct'){
					$(this).parent().find('.options-list').addClass('correct-input');
				}
		});
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
		$('.text-to-fill-span').each(function (){
			//$(this).parent().find('.input-text-with-words-span').val($(this).text())
			$(this).parent().find('.input-text-with-words-span').val(chunkStartingWords($(this).text()))
		})
		function chunkStartingWords(p) {
			var words = p.split(" ");
			console.log('words==',words)
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
		idQuest=$(this).attr('name');
		attrId=$(this).attr('id');
		id=attrId.replace('close-','');
		$('.quest-'+id).remove();
		typeQuestion= $(this).attr('alt');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url(); ?>index.php/teacher/delete-question",
			data: {
				'question_id':idQuest,
				'question_type':typeQuestion,
				'exam_id':<?php echo $id_exam ;?>
					},
			error: function(error){
				console.log(error);
			},
			success: function(data){
				console.log(data);
			},
		})

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
		input.show();
		input.val('');
		$(this).hide();
		minus.show();
	}) ;
	$(document).on('click', '.remove-option-btn', function() {
		var inputs=$(this).parent().hide();
		inputs.find('.options-list').val('')
		inputs.find('.correct-options-list').val('')
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
		// .replace(" ", " ") need to replace spaces with nbsp in new written

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
		function chunkWordsAdded(p) {
			//var words = p.split(" ");
			var words = p.split(" ");
			console.log('words====',words)
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
		function chunkWords(p) {
			//var words = p.split(" ");
			var words = p.split(" ");
			console.log('words====',words)
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
		p=(p.trim()).replace(/ +(?= )/g,'');
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
		//console.log("joined",words.join(""));
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
			//$(this).parent().find('.input-text-with-words-span').val($(this).text())
			$(this).parent().find('.input-text-with-words-span').val(chunkWords($(this).text()))
		})

		$('.text-span').each(function(){
			$(this).val($(this).val().replace('¤',''))
		});
		//console.log($('.text-to-fill-span').parent().find('input-text-with-words-span'));


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
