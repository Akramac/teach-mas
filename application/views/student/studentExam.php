
<?php $this->view('partials/header')?>
<!-- Compiled and minified CSS -->
<link rel="stylesheet" media="all" href="https://unpkg.com/materialize-stepper@3.1.0/dist/css/mstepper.min.css" />
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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

			.sortlistOrder{
				margin-left: 20% !important;
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

		/*   style timer */
		ul#global {
			list-style: none;
			margin: 50px 0;
			padding: 0;
			display: block;
			text-align: center;
		}
		ul#global li {
			display: inline-block;
		}
		ul#global li span {
			font-size: 80px;
			font-weight: 300;
			line-height: 80px;
		}
		ul#global li.seperator {
			font-size: 80px;
			line-height: 70px;
			vertical-align: top;
		}
		ul#global li p {
			color: #a7abb1;
			font-size: 25px;
		}

		/* timer  */
		.countdown::after{
			display:none !important;
		}

		.step-title {
			pointer-events: none;
		}
		highlited{
			border-bottom:  5px solid  yellow !important;
			height: 9px;
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
		/* end canva */
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
		<?php
		if($durationExam!='00:00:00'){
		?>
		<ul id="global" >
			<li><span class="days">00</span><p class="days_text">Days</p></li>
			<li class="seperator">:</li>
			<li><span class="hours">00</span><p class="hours_text">Hours</p></li>
			<li class="seperator">:</li>
			<li><span class="minutes">00</span><p class="minutes_text">Minutes</p></li>
			<li class="seperator">:</li>
			<li><span class="seconds">00</span><p class="seconds_text">Seconds</p></li>
		</ul>

		<?php } ?>
		<!--
				<div class="clearfix">

					<div class="owl-icons owl-icons-rounded ">

						<-- === icon item ===

						<a href="#">
							<figure>
								<img  src="<?php /*echo base_url(); */?>assets/images/avatars/teacher1.jpg" alt="Alternate Text"/>
								<figcaption>Teacher 1</figcaption>
							</figure>
						</a>


						<a href="#">
							<figure>
								<img class="teachers-avatar" src="<?php /*echo base_url(); */?>assets/images/avatars/teacher2.jpg" alt="Alternate Text" />
								<figcaption>Teacher 2</figcaption>
							</figure>
						</a>


						<a href="#">
							<figure>
								<img src="<?php /*echo base_url(); */?>assets/images/avatars/teacher3.jpg" alt="Alternate Text" />
								<figcaption>Teacher 3</figcaption>
							</figure>
						</a>


						<a href="#">
							<figure>
								<img src="<?php /*echo base_url(); */?>assets/images/avatars/teacher4.jpg" alt="Alternate Text" />
								<figcaption>Teacher 4</figcaption>
							</figure>
						</a>


						<a href="#">
							<figure>
								<img src="<?php /*echo base_url(); */?>assets/images/avatars/teacher3.jpg" alt="Alternate Text" />
								<figcaption>Teacher 5</figcaption>
							</figure>
						</a>


						<a href="#">
							<figure>
								<img src="<?php /*echo base_url(); */?>assets/images/avatars/teacher4.jpg" alt="Alternate Text" />
								<figcaption>Teacher 6</figcaption>
							</figure>
						</a>


						<a href="#">
							<figure>
								<img src="<?php /*echo base_url(); */?>assets/images/avatars/teacher1.jpg" alt="Alternate Text" />
								<figcaption>Teacher 7</figcaption>
							</figure>
						</a>


						<a href="#">
							<figure>
								<img src="<?php /*echo base_url(); */?>assets/images/avatars/teacher1.jpg" alt="Alternate Text" />
								<figcaption>Teacher 8</figcaption>
							</figure>
						</a>


						<a href="#">
							<figure>
								<img src="<?php /*echo base_url(); */?>assets/images/avatars/teacher2.jpg" alt="Alternate Text" />
								<figcaption>Teacher 9</figcaption>
							</figure>
						</a>




					</div>
				</div>-->
	</section>

	<!-- ========================  Block banner category ======================== -->

	<!-- ========================  Best seller ======================== -->

	<section class="contact section-questions">

		<!-- === Goolge map === -->

		<div id="map" style="background-image:url(<?php echo base_url(); ?>assets/images/backgrounds/wall.jpg)"></div>

		<div class="container">

			<!--<div class="row">

				<div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">

					<div class="contact-block">


						<div class="contact-info">
							<div class="row">
								<div class="col-md-offset-1 col-md-10 text-center">
									<h2 class="title">Exam</h2>
									<p>
										Answer  question 1
									</p>
									<div class="countdown" style="zoom:0.5;">
										<svg viewBox="-50 -50 100 100" stroke-width="10">
											<circle r="45"></circle>
											<circle r="45" stroke-dasharray="282.7433388230814" stroke-dashoffset="282.7433388230814px"></circle>
										</svg>
									</div>
									<div class="contact-form-wrapper">
										<div class="row">
											<div class="col-md-12" hidden>
												<div class="form-group">
													<label style="text-align:left">Question about polynomes :what are 1</label>
													<input type="text" value="" class="form-control" placeholder="Your answer" required="required">
												</div>
											</div>


											<div class="col-md-12" hidden>

												<div class="form-group">
													<label style="text-align:left">Question about polynomes :what are 2</label>
													<input type="text" value="" class="form-control" placeholder="Your answer" required="required">
												</div>
											</div>

											<div class="col-md-12" hidden>
												<div class="form-group">
													<label style="text-align:left">Explain what are odd numbers :</label>
													<textarea class="form-control" placeholder="Your message" rows="10"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="input-field col s12">

													<label>Who has discovered Pi ?</label>
													<p>
														<label>
															<input id="indeterminate-checkbox" type="checkbox" />
															<span>Person 1</span>
														</label>
													</p>
													<p>
														<label>
															<input id="indeterminate-checkbox" type="checkbox" />
															<span>Person 2</span>
														</label>
													</p>
													<p>
														<label>
															<input id="indeterminate-checkbox" type="checkbox" />
															<span>Person 3</span>
														</label>
													</p>
												</div>
											</div>
											<div class="col-md-12">
												<form id="file-upload-form" class="uploader">
													<input id="file-upload" type="file" name="fileUpload" accept="image/*" />

													<label for="file-upload" id="file-drag">
														<img id="file-image" src="#" alt="Preview" class="hidden">
														<div id="start">
															<i class="fa fa-download" aria-hidden="true"></i>
															<div>Select a file or drag here</div>
															<div id="notimage" class="hidden">Please select an image</div>
															<span id="file-upload-btn" class="btn btn-primary">Select a file</span>
														</div>
														<div id="response" class="hidden">
															<div id="messages"></div>
															<progress class="progress" id="file-progress" value="0">
																<span>0</span>%
															</progress>
														</div>
													</label>
												</form>
											</div>
											<div class="col-md-12 mt-5">
												<div class="col-md-3"><a class="btn-floating btn-large waves-effect waves-light red"><i class="fa fa-arrow-left"></i></i></a></div>
												<div class="col-md-3"></div>
												<div class="col-md-3"></div>
												<div class="col-md-3"><a class="btn-floating btn-large waves-effect waves-light red"><i class="fa fa-arrow-right"></i></i></a></div>
											</div>
											<div class="col-md-12 text-center">
												<button class="btn waves-effect waves-light" type="submit" name="action" disabled>Submit
													<i class="fa fa-paper-plane"></i>
												</button>
											</div>
										</div>

										<div class="contact-form clearfix" hidden>
											<form action="#" method="post">
												<div class="row">


													<div class="col-md-12">
														<div class="input-field col s12">
															<select>
																<option value=""  disabled selected>Choose the type of question</option>
																<option value="1">text</option>
																<option value="2">multiple choice</option>
																<option value="3">long text</option>
															</select>
															<label>Materialize Select</label>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<input type="text" value="" class="form-control" placeholder="Your title of the question" required="required">
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<p class="range-field">
																<label>Duration</label>
																<input type="range" id="test5" min="0" max="100" />
															</p>
														</div>
													</div>
													<div class="col-md-12">
														<div class="form-group">
															<textarea class="form-control" placeholder="Your question" rows="10"></textarea>
														</div>
													</div>

													<div class="col-md-12 text-center">
														<button class="btn waves-effect waves-light" type="submit" name="action">Submit
															<i class="fa fa-paper-plane"></i>
														</button>
													</div>
												</div>
											</form>
										</div>
									</div>

								</div>

							</div>
						</div>

					</div> <--/contact-block->
				</div>--col-sm-8->
			</div> -/row->-->
<!--
			<div class="row">
				<div class="col s12">
					<form id="example-form">
						<div>
							<h3>Account</h3>
							<section>
								<div class="row">
									<div class="col-md-6">
										<div class="input-field col s12">
											<label for="select-quest">Materialize Select</label>
											<select name="select-quest" id="select-quest">
												<option value=""  disabled selected>Choose the type of question</option>
												<option value="1">text</option>
												<option value="2">multiple choice</option>
												<option value="3">long text</option>
											</select>

										</div>
									</div>
									<div class="input-field col s6">
										<select multiple>
											<option value="" disabled selected>Choose style(s)</option>
											<option value="1">Option 1</option>
											<option value="2">Option 2</option>
											<option value="3">Option 3</option>
										</select>
										<label>Styles</label>
									</div>
								</div>
							</section>
							<h3>Profile</h3>
							<section>
								<div class="row">
									<div class="input-field col s6">
										<label>Begin date</label>
										<input id="beginDate" type="date" class="datepicker">

									</div>
									<div class="input-field col s6">
										<label>End date</label>
										<input id="endDate" type="date" class="datepicker">

									</div>
								</div>
								<div class="row">
									<div class="input-field col s12">
										<input placeholder="Who is organizing the event?" id="organizer" type="text" class="validate">
										<label for="organizer">Organizer</label>
									</div>
								</div>
								<div class="row">
									<div class="input-field col s6">
										<label for="select-quest">Materialize Select</label>
										<select name="select-quest" id="select-quest">
											<option value=""  disabled selected>Choose the type of question</option>
											<option value="1">text</option>
											<option value="2">multiple choice</option>
											<option value="3">long text</option>
										</select>
									</div>
									<div class="input-field col s6">
										<input placeholder="contact@myweb.com" id="email" type="text" class="validate">
										<label for="email">Contact email</label>
									</div>
								</div>

								<div class="row">
									<div class="input-field col s12">
										<textarea id="description" class="materialize-textarea" length="140"></textarea>
										<label for="description">Describe the event in a tweet!</label>
									</div>
								</div>
							</section>
						</div>
					</form>
				</div>
			</div>-->

<!--			REcord Video Student CAmera -->

			<br>

			<button id="btn-start-recording" hidden>Start Recording</button>
			<button id="btn-stop-recording" hidden disabled>Stop Recording</button>

			<hr>
			<video controls autoplay playsinline hidden></video>

			<!--start section record screen-->
			<video class="video" width="600px" controls hidden></video>
			<button class="record-btn" id="btn-record-screen" hidden>record</button>

			<!--end screen-->
			<form id="msform" method="post" action="<?php echo base_url(); ?>index.php/student/add-exam	">
				<input type="text" value="<?php echo $idExam; ?>" name="idExam" class="form-control"  hidden>
				<input type="text" value="<?php echo $idTeacher; ?>" name="idTeacher" class="form-control"  hidden>

				<input type="text" value="" name="video-url-input"  id="video-url-input" class="form-control video-url-input"  hidden>
				<input type="text" value="" name="screen-url-input"  id="screen-url-input" class="form-control screen-url-input"  hidden>

				<ul class="stepper horizontal " id="horizontal">

					<?php foreach($listQuestionsSingleChoice as $question) { ?>
						<li class="step step-to-shuffle step-<?php echo $question->quest_multi_id; ?> draw">
							<div class="step-title waves-effect waves-dark"></div>
							<div class="step-content">
								<div class="countdown" style="zoom:0.2;">
									<svg viewBox="-50 -50 100 100" stroke-width="10">
										<circle r="45"></circle>
										<circle r="45" stroke-dasharray="282.7433388230814" stroke-dashoffset="282.7433388230814px"></circle>
									</svg>
								</div>
								<?php if($durationExam=='00:00:00'){ ?>
								<div class="countdown2" alt="<?php if($question->no_specific_time==true ){echo '10:00:00';}else{echo $question->duration;} ?>" style="text-align: center"></div>
								<?php } ?>
								<?php if($question->image !=null) {?>
								<div style="margin-left:35%;">
									<img alt="no image" src="<?php echo base_url().'assets/uploads/'.$question->image ; ?>"  style="width:240px;"/>
								</div>
								<?php } ?>
								<h5><?php echo $question->title; ?></h5>
								<label>Select the correct answer</label>
								<div class="row">

									<div class="col-md-6 com-xs-12">
										<div class="card red lighten-2  <?php if($question->is_single_choice==false) :?>card-options-multiple<?php else : ?>card-options <?php endif ;?>" id="step-<?php echo $question->quest_multi_id; ?>" alt="<?php echo $question->option_1; ?>" style="height: 90px;">
											<div class="card-content white-text card-4-options">
												<p><img src="<?php echo base_url(); ?>assets/images/square.png" alt="Alternate Text" style="width:25px;margin-right:5%;" /> <?php echo $question->option_1; ?></p>
											</div>
										</div>
									</div>
									<div class="col-md-6 com-xs-12">
										<div class="card blue-grey darken-1 <?php if($question->is_single_choice==false) :?>card-options-multiple<?php else : ?>card-options <?php endif ;?>" id="step-<?php echo $question->quest_multi_id; ?>" alt="<?php echo $question->option_2; ?>" style="height: 90px;">
											<div class="card-content white-text card-4-options">
												<p><img src="<?php echo base_url(); ?>assets/images/traingle.png" alt="Alternate Text" style="width:25px;margin-right:5%;" />  <?php echo $question->option_2; ?></p>
											</div>
										</div>
									</div>
									<div class="col-md-6 com-xs-12">
										<div class="card brown lighten-2  <?php if($question->is_single_choice==false) :?>card-options-multiple<?php else : ?>card-options <?php endif ;?>" id="step-<?php echo $question->quest_multi_id; ?>" alt="<?php echo $question->option_3; ?>" style="height: 90px;">
											<div class="card-content white-text card-4-options">
												<p><img src="<?php echo base_url(); ?>assets/images/cercle.png" alt="Alternate Text" style="width:25px;margin-right:5%;" /> <?php echo $question->option_3; ?></p>
											</div>
										</div>
									</div>
									<div class="col-md-6 com-xs-12">
										<div class="card  blue lighten-2 <?php if($question->is_single_choice==false) :?>card-options-multiple<?php else : ?>card-options <?php endif ;?>" id="step-<?php echo $question->quest_multi_id; ?>" alt="<?php echo $question->option_4; ?>" style="height: 90px;">
											<div class="card-content white-text card-4-options">
												<p><img src="<?php echo base_url(); ?>assets/images/xbox.png" alt="Alternate Text" style="width:25px;margin-right:5%;" /> <?php echo $question->option_4; ?></p>
											</div>
										</div>
									</div>
									<?php if($question->option_5) :?>
									<div class="col-md-6 com-xs-12">
										<div class="card teal accent-2 <?php if($question->is_single_choice==false) :?>card-options-multiple<?php else : ?>card-options <?php endif ;?>" id="step-<?php echo $question->quest_multi_id; ?>" alt="<?php echo $question->option_5; ?>" style="height: 90px;">
											<div class="card-content white-text card-4-options">
												<p><img src="<?php echo base_url(); ?>assets/images/xbox.png" alt="Alternate Text" style="width:25px;margin-right:5%;" /> <?php echo $question->option_5; ?></p>
											</div>
										</div>
									</div>
									<?php endif ?>
									<?php if($question->option_6) : ?>
									<div class="col-md-6 com-xs-12">
										<div class="card  blue-grey lighten-5 <?php if($question->is_single_choice==false) :?>card-options-multiple<?php else : ?>card-options <?php endif ;?>" id="step-<?php echo $question->quest_multi_id; ?>" alt="<?php echo $question->option_6; ?>" style="height: 90px;">
											<div class="card-content white-text card-4-options">
												<p><img src="<?php echo base_url(); ?>assets/images/xbox.png" alt="Alternate Text" style="width:25px;margin-right:5%;" /> <?php echo $question->option_6; ?></p>
											</div>
										</div>
									</div>
									<?php endif ?>


									<div class="input-field col s12" >

										<select class="browser-default " name="select-options-cards-<?php echo $question->quest_multi_id; ?><?php if($question->is_single_choice==false) :?>[]<?php endif ?>" id="select-options-cards"  alt="<?php echo $question->quest_multi_id; ?>" style="margin-top:7%;opacity:0;" <?php if($question->is_single_choice==false) :?>multiple<?php endif ?>>
											<option value=""  disabled selected>Choose the type of question</option>
											<option value="<?php echo $question->option_1; ?>"><?php echo $question->option_1; ?></option>
											<option value="<?php echo $question->option_2; ?>"><?php echo $question->option_2; ?></option>
											<option value="<?php echo $question->option_3; ?>"><?php echo $question->option_3; ?></option>
											<option value="<?php echo $question->option_4; ?>"><?php echo $question->option_4; ?></option>
											<option value="<?php echo $question->option_5; ?>"><?php echo $question->option_5; ?></option>
											<option value="<?php echo $question->option_6; ?>"><?php echo $question->option_6; ?></option>
										</select>

									</div>
								</div>

								<p id="src-draw-me" hidden><?php echo $question->data_file; ?></p>
								<canvas width="600" height="400" id="draw-me"></canvas>
								<canvas width="600" height="400" id="draw-new"></canvas>
								<div class="controls">
									<ul>
										<li class="red selected"></li>
										<li class="blue"></li>
										<li class="yellow"></li>
									</ul>

									<!--<button type="button" download="example.jpg" href=""  id="saveImage"  onclick="downloadCanvas(this);" hidden>Save Image</button>-->
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
								<div class="step-actions">
									<!--								<button class="waves-effect waves-dark btn blue next-step" data-feedback="someFunction">CONTINUE</button>
									-->
									<button class="waves-effect waves-dark btn blue next-step" >CONTINUE</button>
									<button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
								</div>
							</div>
						</li>
					<?php } ?>
					<?php foreach($listQuestionsLongText as $question) { ?>
						<li class="step step-to-shuffle">
							<div data-step-label="" class="step-title waves-effect waves-dark"></div>
							<div class="step-content">
								<div class="countdown" style="zoom:0.2;">
									<svg viewBox="-50 -50 100 100" stroke-width="10">
										<circle r="45"></circle>
										<circle r="45" stroke-dasharray="282.7433388230814" stroke-dashoffset="282.7433388230814px"></circle>
									</svg>
								</div>
								<?php if($durationExam=='00:00:00'){ ?>
								<div class="countdown2" alt="<?php if($question->no_specific_time==true ){echo '10:00:00';}else{echo $question->duration;} ?>" style="text-align: center"></div>
								<?php } ?>
								<?php if($question->image !=null) {?>
								<div style="margin-left:35%;">
									<img alt="no image" src="<?php echo base_url().'assets/uploads/'.$question->image ; ?>"  style="width:240px;"/>
								</div>
								<?php } ?>
								<div class="row">
									<div class="input-field col s12">
										<div class="col-md-12" >
											<div class="form-group">
												<label style="text-align:left"><?php echo $question->title; ?></label>
												<input type="text" name="long-text-<?php echo $question->quest_long_text_id; ?>" class="form-control" placeholder="Your answer" >
											</div>
										</div>
									</div>
								</div>

								<div class="step-actions">
									<button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
								</div>
							</div>
						</li>
					<?php } ?>

					<?php foreach($listQuestionsTawsil as $question) { ?>
						<li class="step step-to-shuffle">
							<div class="step-title waves-effect waves-dark"></div>
							<div class="step-content">
								<div class="countdown" style="zoom:0.2;">
									<svg viewBox="-50 -50 100 100" stroke-width="10">
										<circle r="45"></circle>
										<circle r="45" stroke-dasharray="282.7433388230814" stroke-dashoffset="282.7433388230814px"></circle>
									</svg>
								</div><?php if($durationExam=='00:00:00'){ ?>
								<div class="countdown2" alt="<?php if($question->no_specific_time==true ){echo '10:00:00';}else{echo $question->duration;} ?>" style="text-align: center"></div>
								<?php } ?>
								<?php if($question->image !=null) {?>
								<div style="margin-left:35%;">
									<img alt="no image" src="<?php echo base_url().'assets/uploads/'.$question->image ; ?>"  style="width:240px;"/>
								</div>
								<?php } ?>
								<div class="row" >
									<div class="input-field col s12">
										<label >Link the correct options</label>


										<div style="margin-top: 7%;">
											<div class="row">
												<img src="<?php echo base_url(); ?>assets/images/dragg.png" alt="Alternate Text" style="width:35px;" />
												<img src="<?php echo base_url(); ?>assets/images/link.png" alt="Alternate Text" style="width:25px;float:right;"/>
												<ul id="sortlist<?php echo $question->quest_tawsil_id; ?>" class="col-md-6 col-xs-6 sortlist" style="margin-top:30px;">
													<li alt="<?php echo $question->option_1; ?>">

														<?php echo $question->option_1; ?>
													</li>
													<li alt="<?php echo $question->option_2; ?>">
														<?php echo $question->option_2; ?>
													</li>
													<li alt="<?php echo $question->option_3; ?>">
														<?php echo $question->option_3; ?>
													</li>
													<li alt="<?php echo $question->option_4; ?>">
														<?php echo $question->option_4; ?>
													</li>
													<?php if(!empty($question->option_5)) :?>
													<li alt="<?php echo $question->option_5; ?>">
														<?php echo $question->option_5; ?>

													</li>
													<?php endif;?>
													<?php if(!empty($question->option_6)) :?>
													<li alt="<?php echo $question->option_6; ?>">
														<?php echo $question->option_6; ?>
													</li>
													<?php endif;?>
												</ul>

												<ul id="correspList"  class="correspList col-md-6 col-xs-6">
													<li>
														<?php echo $question->link_option_1; ?>
													</li>
													<li><?php echo $question->link_option_2; ?></li>
													<li><?php echo $question->link_option_3; ?></li>
													<li><?php echo $question->link_option_4; ?></li>
													<?php if(!empty($question->link_option_5)) :?>
													<li><?php echo $question->link_option_5; ?></li>
													<?php endif;?>
													<?php if(!empty($question->link_option_6)) :?>
													<li><?php echo $question->link_option_6; ?></li>
													<?php endif;?>
												</ul>

												<input type="text" value="1;2;3;4;5;6" name="tawsil-input-<?php echo $question->quest_tawsil_id	; ?>" class="form-control tawsil-input"  style="opacity:0;">

											</div>



										</div>

									</div>

								</div>

								<div class="step-actions">
									<!--								<button class="waves-effect waves-dark btn blue next-step" data-feedback="someFunction">CONTINUE</button>
									-->								<button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
									<button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
								</div>
							</div>

						</li>
					<?php } ?>
					<?php foreach($listQuestionsTartib as $question) { ?>
						<li class="step step-to-shuffle step-5">
							<div class="step-title waves-effect waves-dark"></div>
							<div class="step-content">
								<div class="countdown" style="zoom:0.2;">
									<svg viewBox="-50 -50 100 100" stroke-width="10">
										<circle r="45"></circle>
										<circle r="45" stroke-dasharray="282.7433388230814" stroke-dashoffset="282.7433388230814px"></circle>
									</svg>
								</div>
								<?php if($durationExam=='00:00:00'){ ?>
								<div class="countdown2" alt="<?php if($question->no_specific_time==true ){echo '10:00:00';}else{echo $question->duration;} ?>" style="text-align: center"></div>
								<?php } ?>
								<h5><?php echo $question->title; ?></h5>
								<?php if($question->image !=null) {?>
								<div style="margin-left:35%;">
									<img alt="no image" src="<?php echo base_url().'assets/uploads/'.$question->image ; ?>"  style="width:240px;"/>
								</div>
								<?php } ?>
								<label>Order this cards correctly :</label>
								<div class="row justify-content-center"><img src="<?php echo base_url(); ?>assets/images/dragg.png" alt="Alternate Text" style="width:45px;float:right;"/>
									<ul id="sortlistOrder<?php echo $question->quest_tartib_id; ?>" class="col-md-6 col-xs-12 sortlistOrder" >
										<!--<img src="<?php /*echo base_url(); */?>assets/images/dragg.png" alt="Alternate Text" style="width:25px;float:right;"/>-->
										<li alt="<?php echo $question->option_to_order_1; ?>">
											<?php echo $question->option_to_order_1; ?>
										</li>
										<li alt="<?php echo $question->option_to_order_2; ?>">
											<?php echo $question->option_to_order_2; ?>

										</li>
										<li alt="<?php echo $question->option_to_order_3; ?>">
											<?php echo $question->option_to_order_3; ?>

										</li>
										<li alt="<?php echo $question->option_to_order_4; ?>">
											<?php echo $question->option_to_order_4; ?>

										</li>
										<?php if(!empty($question->option_to_order_5)) :?>
										<li alt="<?php echo $question->option_to_order_5; ?>">
											<?php echo $question->option_to_order_5; ?>

										</li>
										<?php endif ;?>
										<?php if(!empty($question->option_to_order_6)) :?>
										<li alt="<?php echo $question->option_to_order_6; ?>">
											<?php echo $question->option_to_order_6; ?>

										</li>
										<?php endif ;?>
									</ul>
									<input type="text" value="1;2;3;4;5;6" name="tartib-input-<?php echo $question->quest_tartib_id; ?>" class="form-control tartib-input"  style="opacity:0;">

								</div>

								<div class="step-actions">
									<!--								<button class="waves-effect waves-dark btn blue next-step" data-feedback="someFunction">CONTINUE</button>
									-->
									<button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
									<button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
								</div>
							</div>
						</li>
					<?php } ?>

					<?php foreach($listQuestionsSpan as $question) { ?>
						<li class="step step-to-shuffle">
							<div data-step-label="" class="step-title waves-effect waves-dark"></div>
							<div class="step-content">
								<div class="countdown" style="zoom:0.2;">
									<svg viewBox="-50 -50 100 100" stroke-width="10">
										<circle r="45"></circle>
										<circle r="45" stroke-dasharray="282.7433388230814" stroke-dashoffset="282.7433388230814px"></circle>
									</svg>
								</div>
								<?php if($durationExam=='00:00:00'){ ?>
									<div class="countdown2" alt="<?php if($question->no_specific_time==true ){echo '10:00:00';}else{echo $question->duration;} ?>" style="text-align: center"></div>
								<?php } ?>
								<?php if($question->image !=null) {?>
								<div style="margin-left:35%;">
									<img alt="no image" src="<?php echo base_url().'assets/uploads/'.$question->image ; ?>"  style="width:240px;"/>
								</div>
								<?php } ?>
								<div class="row">
									<div class="input-field col s12">
										<div class="col-md-12" >
											<div class="form-group">
												<label style="text-align:left"><?php echo $question->title; ?></label>
												<div class="row">
													<p class="given text-to-fill-span" contenteditable="true">
														<?php
														$fullstring =$question->span_text;
														//var_dump($fullstring);
														$string=$fullstring;
														$parts=array();
														$wordsConcat=$question->words;
														$num=substr_count($wordsConcat,";");
														$piecesWords=explode(';',$wordsConcat);
														$counter=0;
														$arrayPositions=array();
														for($i=0;$i<$num;$i++) {
															$word = $piecesWords[$i + 1];
															$arrayPositions[strpos($string, $word)]=$word;

														}

														foreach($arrayPositions as $key => $data) {
															ksort($arrayPositions);
															$arrayPositions[$key] = $data;
														}
														$i=0;

														foreach($arrayPositions as $k =>$pos){
																$word=$arrayPositions[$k];
																$counter++;
																$pieces=explode('¤'.$word.'¤',$string);
																
																	$parts[]=$pieces[0];
																	if(array_key_exists((1),$pieces)){
																		$string=$pieces[1];
																	}
															$i++;

															?>
														<?php
														}
														$parts[]=$string;
														for($i=0;$i<=$counter;$i++){
															if($parts[$i]!=$fullstring){

														?>
														<span class="w ui-droppable"> <?php echo $parts[$i] ;?> </span>&nbsp;
														<?php }} ?>
													</p>

													<input type="text" value="" class="form-control input-text-with-words-span"     name="input-text-with-words-span-<?php echo $question->quest_span_id; ?>" hidden>

												</div>

												<div class="divider"></div>
												<div class="section">
													<section>
														<div class="card blue-grey ">
															<div class="card-content white-text">
																<div class="row">
																	<div id="walkinDiv" class="col s12">
																		<?php $wordsConcat=$question->words;
																		$num=substr_count($wordsConcat,";");
																		$pieces=explode(';',$wordsConcat);
																		for($i=0;$i<$num;$i++){
																		?>
																		<span class="given btn-flat white-text red lighten-1" rel="<?php  echo $i+1;?>>"><?php echo $pieces[$i+1]  ?></span>
																		<?php } ?>
																	</div>
																</div>
															</div>
														</div>
													</section>
												</div>

											</div>
										</div>
									</div>
								</div>

								<div class="step-actions">
									<button class="waves-effect waves-dark btn blue next-step">CONTINUE</button>
								</div>
							</div>
						</li>
					<?php } ?>
					<li class="step finish-step">
						<div class="step-title waves-effect waves-dark">Finish</div>
						<div class="step-content">
							Finish!
							<div class="step-actions">
								<a class="waves-effect waves-dark btn blue" type="button" id="submit-form-shown" >SUBMIT</a>
								<button class="waves-effect waves-dark btn blue" id="submit-form" type="submit" style="opacity: 0;">SUBMIT Reeel</button>
							</div>
						</div>
					</li>
				</ul>
			</form>


			<div class="col-md-12" >
				<h5> Copy paste equations from this editor</h5>
				<textarea id="editor"></textarea>
			</div>

		</div><!--/container-->

	</section>
	<div id="dialog" title="Need permission" hidden>
		<p>Allow Camera record to continue the exam !</p>
		<img src="<?php echo base_url(); ?>assets/images/camera.png" alt="Placeholder Image" style="width:260px;" />

	</div>
	<!-- ========================  Stretcher widget ======================== -->

	<!-- ========================  Cards ======================== -->

	<!-- ========================  Banner ======================== -->


	<!-- ========================  Blog Block ======================== -->

	<!-- ========================  Instagram ======================== -->




	<?php $this->view('partials/footer'); ?>

</div> <!--/wrapper-->
<!-- Compiled and minified JavaScript -->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.0.0/jquery.steps.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://unpkg.com/materialize-stepper@3.1.0/dist/js/mstepper.min.js"></script>
<!-- recommended -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/RecordRTC/5.6.2/RecordRTC.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	$(document).ready(function(){
		<?php
		if($randomQuestions==true){  ?>
		var grd = $('#horizontal');
		var imgs = grd.children()
		var finish = imgs.last()
		// Page Refresh to run script below
		imgs.sort(function(){
			return (Math.round(Math.random()) - 0.5);
		});
		grd.remove('.step-to-shuffle');
		for(var i=0; i < imgs.length; i++)grd.append(imgs[i]);
		grd.find('.finish-step').remove();
		grd.append(finish[0]);
		<?php } ?>

		// draw test canva
		var img = new Image();
		img.src = $('#src-draw-me').text();
		var ctx = $("canvas")[0].getContext('2d');
		img.onload = function() {
			ctx.drawImage(img, 0, 0);
		};
		var stepper = document.querySelector('.stepper');
		var stepperInstace = new MStepper(stepper, {
			// options
			firstActive: 0, // this is the default
		})
		var currentSteps = stepperInstace.getSteps();
		timerArray=[];


		<?php
		if($durationExam=='00:00:00'){  ?>
		var timer0 = $('.step').first().find('.countdown2').attr('alt');
		timerArray.push(timer0);
		console.log('index= ,'+currentSteps['active']['index'])
		var interval = setInterval(function() {


			var timer = timer0.split(':');
			//by parsing integer, I avoid all extra string processing
			var minutes = parseInt(timer[1], 10);
			var seconds = parseInt(timer[2], 10);
			--seconds;
			minutes = (seconds < 0) ? --minutes : minutes;
			if (minutes < 0) clearInterval(interval);
			seconds = (seconds < 0) ? 59 : seconds;
			seconds = (seconds < 10) ? '0' + seconds : seconds;
			//minutes = (minutes < 10) ?  minutes : minutes;
			if(timer0=='10:00:00'){
				$('.active .countdown2').hide();
			}else{
				$('.active .countdown2').html(minutes + ':' + seconds);
			}
			timer0 = '00:'+minutes + ':' + seconds;
			if(timer0=='00:0:00'){
				clearInterval(interval);
				var currentSteps = stepperInstace.getSteps();
				var nextStep=currentSteps['active']['index'];
				stepperInstace.nextStep(nextStep+1);

			}
		}, 1000);

		stepper.addEventListener('stepopen', myFunction, true);
		stepper.addEventListener('stepclose', myFunctionClear, true);

		intervalArray=[];
		function myFunction() {
			console.log('inside stepopen')
			var currentSteps = stepperInstace.getSteps();
			console.log('index= ,'+currentSteps['active']['index'])
			if(currentSteps['active']['index']>-2){
				timerArray.push(currentSteps['active']['step'].querySelector('.countdown2').getAttribute('alt'));



				if(currentSteps['active']['step'].querySelector('.countdown2')){
					//clearInterval(interval);


					orderTimer=currentSteps['active']['index'];
					console.log('order: ',orderTimer)
					console.log('timerArray=',timerArray)
					timer2=timerArray[orderTimer]
					console.log('timer2'+timer2)
					for (var i = 1; i < 99999; i++){
						window.clearInterval(i);
					}
					var interval2 = setInterval(function() {
						console.log('io',timer2)
						var timer = timer2.split(':');
						//by parsing integer, I avoid all extra string processing
						var minutes = parseInt(timer[1], 10);
						var seconds = parseInt(timer[2], 10);
						--seconds;
						minutes = (seconds < 0) ? --minutes : minutes;
						if (minutes < 0) clearInterval(interval2);
						seconds = (seconds < 0) ? 59 : seconds;
						seconds = (seconds < 10) ? '0' + seconds : seconds;
						//minutes = (minutes < 10) ?  minutes : minutes;
						if(timer2=='10:00:00'){
							$('.active .countdown2').hide();
						}else{
							$('.active .countdown2').show();
							$('.active .countdown2').html(minutes + ':' + seconds);
						}

						timer2 = '00:'+minutes + ':' + seconds;
						if(timer2=='00:0:00'){
							clearInterval(interval2);
							var currentSteps = stepperInstace.getSteps();
							var nextStep=currentSteps['active']['index'];
							stepperInstace.nextStep(nextStep+1);
						}
					}, 1000);

					intervalArray.push(interval2);
					console.log('push int',intervalArray)

				}

			}
		}

		<?php } ?>

		function myFunctionClear() {

		}

		//video recorder lanch on start


		// screen recorder of the user
		let btn = document.querySelector(".record-btn");



		const myTimeout = setTimeout(recordStart, 2000);
		const myTimeout2 = setTimeout(recordVideoStart, 5000);
		function recordStart(){
			<?php
			if($allowScreenRecord==true){  ?>
			btn.click();
			<?php } ?>
		}
		function recordVideoStart(){
			<?php if($allowCameraRecord==true) {  ?>
			$('#btn-start-recording').click();
			<?php } ?>
		}

		btn.addEventListener("click", async function () {
			try {
				stream = await navigator.mediaDevices.getDisplayMedia({
					video: true
				});
			} catch (error) {
				alert('Please Allow Screen Record !');
				window.location.reload();
				// Expected output: ReferenceError: nonExistentFunction is not defined
				// (Note: the exact output may be browser-dependent)
			}

			//needed for better browser support
			const mime = MediaRecorder.isTypeSupported("video/webm; codecs=vp9")
				? "video/webm; codecs=vp9"
				: "video/webm"
			mediaRecorder = new MediaRecorder(stream, {
				mimeType: mime
			})
			mediaRecorder.addEventListener("error", (event) => {
				console.error(`error recording stream: ${event.error.name}`);
			});
			let chunks = []
			mediaRecorder.addEventListener('dataavailable', function(e) {
				chunks.push(e.data)
			})



			mediaRecorder.addEventListener('stop', function(){
				let blob = new Blob(chunks, {
					type: chunks[0].type
				})
				let url = URL.createObjectURL(blob)

				let video = document.querySelector("video")
				video.src = url


				uploadScreenToServer(blob)
				console.log(url);


				//let a = document.createElement('a')
				//a.href = url
				//a.download = 'video.webm'
				//a.click()
			})
			//we have to start the recorder manually
			try {
				mediaRecorder.start()
			} catch (error) {
				console.error(error);
				// Expected output: ReferenceError: nonExistentFunction is not defined
				// (Note: the exact output may be browser-dependent)
			}


		});

		// Add a validation function to the stepper

		$('.sortlist > li').mouseleave(function() {
			var inputTawsil=$(this).parent().parent().find('.tawsil-input');
			var listTawsil=$(this).parent().find('li');
			var concatTawsilOrder=';'
			listTawsil.each(function(){
				concatTawsilOrder=concatTawsilOrder+$(this).attr('alt')+';';

			});
			inputTawsil.val(concatTawsilOrder);
		});

		$('.sortlistOrder > li').mouseleave(function() {
			var inputTartib=$(this).parent().parent().find('.tartib-input');
			var listTawsil=$(this).parent().find('li');
			var concatTartibOrder=';'
			listTawsil.each(function(){
				concatTartibOrder=concatTartibOrder+$(this).attr('alt')+';';

			});
			inputTartib.val(concatTartibOrder);
		});
		$('.sortlistOrder').each(function (){
			id=$(this).attr('id');
			slist(document.getElementById(id));
		});
		$('.sortlist').each(function (){
			idSort=$(this).attr('id');
			console.log(idSort)
			slist(document.getElementById(idSort));
		});


		$('.sortlistOrder').each(function (){
			id=$(this).attr('id');
			htmlShuffle('#'+id);
		});
		$('.sortlist').each(function (){
			idSort=$(this).attr('id');
			htmlShuffle('#'+idSort);
		});


		/* treatement card select */
		$('.card-options-multiple').click(function (){
			var id=$(this).attr('id');
			var orderValue=$(this).attr('alt');
			//$('.'+id+' .card-options').removeClass('activated-card');

			//$('.'+id+' #select-options-cards option').removeAttr("selected");
			if($('.'+id+' #select-options-cards option[value='+orderValue+']').is(':selected')){
				$(this).removeClass('activated-card');
				$('.'+id+' #select-options-cards option[value='+orderValue+']').removeAttr("selected");
			}else{
				$(this).addClass('activated-card');
				$('.'+id+' #select-options-cards option[value='+orderValue+']').attr('selected','selected');
			}

		});
		$('.card-options').click(function (){
			var id=$(this).attr('id');
			var orderValue=$(this).attr('alt');
			$('.'+id+' .card-options').removeClass('activated-card');
			$(this).addClass('activated-card');
			$('.'+id+' #select-options-cards option').removeAttr("selected");
			$('.'+id+' #select-options-cards option[value='+orderValue+']').attr('selected','selected');
		});


		//duration submit form
		$('#submit-form-shown').click(function (){
			<?php if($allowCameraRecord==true) {  ?>
			$('#btn-stop-recording').click();
			<?php } ?>
			if(typeof mediaRecorder != "undefined" ){
				mediaRecorder.stop()
			}

			const myTimeout = setTimeout(waitME, 2000);
			function waitME (){
				$('#submit-form').click();
			}
		})
		/*$('.sortlistOrder').each(function (){
			id=$(this).attr('id');
			console.log(id);
			htmlShuffle(id);
		});

		htmlShuffle('.sortlist');*/
		//convert date exam to seconds

		<?php
		if($durationExam!='00:00:00'){


		$pieces = explode(":", $durationExam);
		$durationSeconds= $pieces[0]*3600+$pieces[1]*60+$pieces[2];
		//$durationSeconds= '10';
		$date = date("m/d/Y H:i:s");
		$newDate = date('m/d/Y H:i:s', strtotime($date. ' +'.$durationSeconds.' seconds'));
		?>
		$('#global').countdown({
			date: '<?php echo $newDate;?>',
			offset: +1,
			day: 'Day',
			days: 'Days',
			hideOnComplete: true
		}, function (container) {
			$('#submit-form').click();
		});
		<?php } ?>


		/*section drag and drop*/
		$('.w .ui-icon-close').each(function (){
			console.log('span')
			$(this.parent().attr('color','green'))
		})
		$("p.given").html(chunkWords($("p.given").text()));

		var arabic = /[\u0600-\u06FF]/;
		if(arabic.test($("p.given").html())){
			$("p.given").css('direction','rtl')
		}
		$("span.given").draggable({
			helper: "clone",
			revert: "invalid"
		});
		console.log($("p.given span.w"))
		makeDropText($("p.given span.w"));

		$('.text-to-fill-span').find('.icon-hand').last().remove();

		function textWrapper(str, sp,classification) {
			if (sp == undefined) {
				sp = [0, 0];
			}

			if($.trim(str)==''){
				var txt = "";
			}else{
				if(classification=='0'){
					var txt = "<span class='w'>" + str + "</span>";

				}else{
					if(classification=='2') {
						var txt = "<span class='w' style='border-bottom: 3px solid green;'>" + str + "</span>";
					}else {
						var txt = "<span class='w'>" + str + "</span><i class='icon icon-hand'></i>";
					}
				}
			}


			/*if (sp[0]) {
				txt = "&nbsp;" + txt;
			}

			if (sp[1]) {
				txt = txt + "&nbsp;";
			}*/

			return txt;
		}

		function chunkWords(p) {
			var words = p.split(" ");
			words[0] = textWrapper(words[0], [0, 1],'0');

			var i;
			var num=[];
			var word=[];
			console.log('lenght',words.length)
			for (i = 1; i < words.length; i++) {
				if($.trim(words[i])!=''){
					num.push(i);
					word.push(words[i]);
					console.log('ww',words[i])
					if (words[0].indexOf(".")) {

						words[i] = textWrapper(words[i], [1, 0],'1');
					} else {
						words[i] = textWrapper(words[i], [1, 1],'1');
					}
				}

			}
			num.forEach( treatWord);
			function treatWord(item, index) {
				textWrapper(words[item], [1, 0],'1');
			}

			console.log('last=',words[words.length-1])
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
					console.log("makedrop",txt)
					var newSpan = textWrapper(txt, [1, 0],'2');
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

	});
	function onDragStart(event) {
		event
			.dataTransfer
			.setData('text/plain', event.target.id);

		event
			.currentTarget
			.style
			.backgroundColor = 'yellow';
	}
	function onDragOver(event) {
		event.preventDefault();
	}

	function onDrop(event) {
		const id = event
			.dataTransfer
			.getData('text');

		const draggableElement = document.getElementById(id);
		const dropzone = event.target;
		dropzone.appendChild(draggableElement);
		event
			.dataTransfer
			.clearData();
	}

	/* drag js func */
	function slist (target) {
		// (A) SET CSS + GET ALL LIST ITEMS
		if(target){
			target.classList.add("slist");
			let items = target.getElementsByTagName("li"), current = null;

			// (B) MAKE ITEMS DRAGGABLE + SORTABLE
			for (let i of items) {
				// (B1) ATTACH DRAGGABLE
				i.draggable = true;

				// (B2) DRAG START - YELLOW HIGHLIGHT DROPZONES
				i.ondragstart = e => {
					current = i;
					for (let it of items) {
						if (it != current) { it.classList.add("hint"); }
					}
				};

				// (B3) DRAG ENTER - RED HIGHLIGHT DROPZONE
				i.ondragenter = e => {
					if (i != current) { i.classList.add("active"); }
				};

				// (B4) DRAG LEAVE - REMOVE RED HIGHLIGHT
				i.ondragleave = () => i.classList.remove("active");

				// (B5) DRAG END - REMOVE ALL HIGHLIGHTS
				i.ondragend = () => { for (let it of items) {
					it.classList.remove("hint");
					it.classList.remove("active");
				}};

				// (B6) DRAG OVER - PREVENT THE DEFAULT "DROP", SO WE CAN DO OUR OWN
				i.ondragover = e => e.preventDefault();

				// (B7) ON DROP - DO SOMETHING
				i.ondrop = e => {
					e.preventDefault();
					if (i != current) {
						let currentpos = 0, droppedpos = 0;
						for (let it=0; it<items.length; it++) {
							if (current == items[it]) { currentpos = it; }
							if (i == items[it]) { droppedpos = it; }
						}
						if (currentpos < droppedpos) {
							i.parentNode.insertBefore(current, i.nextSibling);
						} else {
							i.parentNode.insertBefore(current, i);
						}
					}
				};
			}
		}

	}
	/* shuffle ul liste  */
	function htmlShuffle(elem) {
		function shuffle(arr) {
			var len = arr.length;
			var d = len;
			var array = [];
			var k, i;
			for (i = 0; i < d; i++) {
				k = Math.floor(Math.random() * len);
				array.push(arr[k]);
				arr.splice(k, 1);
				len = arr.length;
			}
			for (i = 0; i < d; i++) {
				arr[i] = array[i];
			}
			return arr;
		}
		var el = document.querySelectorAll(elem + " *");
		document.querySelector(elem).innerHTML = "";

		let pos = [];
		for (let i = 0; i < el.length; i++) {
			pos.push(i);
		}

		pos = shuffle(pos);
		for (let i = 0; i < pos.length; i++) {
			document.querySelector(elem).appendChild(el[pos[i]]);
		}
	}


	var video = document.querySelector('video');

	function captureCamera(callback) {
		navigator.mediaDevices.getUserMedia({ audio: true, video: true }).then(function(camera) {
			callback(camera);
		}).catch(function(error) {
			$('#dialog').show();
			$( "#dialog" ).dialog({
				close: function(event, ui) { window.location.reload(); },
			});

		});
	}

	function stopRecordingCallback() {
		video.src = video.srcObject = null;
		video.muted = false;
		video.volume = 1;
		video.src = URL.createObjectURL(recorder.getBlob());



		recorder.camera.stop();
		uploadToServer(recorder.getBlob())
		recorder.destroy();
		recorder = null;



	}
	function uploadToServer(recordRTC) {
		var blob = recordRTC instanceof Blob ? recordRTC : recordRTC.blob;
		var fileType = blob.type.split('/')[0] || 'audio';
		var fileName = (Math.random() * 1000).toString().replace('.', '');

		if (fileType === 'audio') {
			fileName += '.' + (!!navigator.mozGetUserMedia ? 'ogg' : 'wav');
		} else {
			fileName += '.webm';
		}
		$('#video-url-input').val(fileName);
		// create FormData
		var formData = new FormData();
		formData.append(fileType + '-filename', fileName);
		formData.append(fileType + '-blob', blob);

		//callback('Uploading ' + fileType + ' recording to server.');

		// var upload_url = 'https://your-domain.com/files-uploader/';
		var upload_url = '<?php echo base_url(); ?>index.php/student/save-video';

		// var upload_directory = upload_url;
		var upload_directory = 'uploads/';

		makeXMLHttpRequest(upload_url, formData, function(progress) {
			if (progress !== 'upload-ended') {
				//callback(progress);
				return;
			}

			//callback('ended', upload_directory + fileName);

			// to make sure we can delete as soon as visitor leaves
			listOfFilesUploaded.push(upload_directory + fileName);
		});
	}

	function uploadScreenToServer(recordRTC) {
		var blob = recordRTC
		var fileType = 'video';
		var fileName = (Math.random() * 1000).toString().replace('.', '');

		$('#screen-url-input').val(fileName+'.webm');
		// create FormData
		var formData = new FormData();
		formData.append(fileType + '-filename', fileName);
		formData.append(fileType + '-blob', blob);

		//callback('Uploading ' + fileType + ' recording to server.');

		// var upload_url = 'https://your-domain.com/files-uploader/';
		var upload_url = '<?php echo base_url(); ?>index.php/student/save-screen-video';

		// var upload_directory = upload_url;
		var upload_directory = 'uploads/';

		makeXMLHttpRequest(upload_url, formData, function(progress) {
			if (progress !== 'upload-ended') {
				//callback(progress);
				return;
			}

			//callback('ended', upload_directory + fileName);

			// to make sure we can delete as soon as visitor leaves
			listOfFilesUploaded.push(upload_directory + fileName);
		});
	}
	function makeXMLHttpRequest(url, data, callback) {
		var request = new XMLHttpRequest();
		request.onreadystatechange = function() {
			if (request.readyState == 4 && request.status == 200) {
				//callback('upload-ended');
			}
		};



		request.open('POST', url);
		request.send(data);
	}
	var recorder; // globally accessible

	document.getElementById('btn-start-recording').onclick = function() {
		this.disabled = true;
		captureCamera(function(camera) {
			video.muted = true;
			video.volume = 0;
			video.srcObject = camera;

			try {
				recorder = RecordRTC(camera, {
					type: 'video'
				});
			} catch (error) {
				console.error('err',error)
				// Expected output: ReferenceError: nonExistentFunction is not defined
				// (Note: the exact output may be browser-dependent)
			}


			recorder.startRecording();

			// release camera on stopRecording
			recorder.camera = camera;

			document.getElementById('btn-stop-recording').disabled = false;
		});
	};

	document.getElementById('btn-stop-recording').onclick = function() {
		this.disabled = true;
		<?php if($allowCameraRecord==true) {  ?>
		recorder.stopRecording(stopRecordingCallback);
		<?php } ?>
	};

	setInterval(putPtoInput, 1000);
	function putPtoInput() {
		textToPut=$('.text-to-fill-span');
		$('.text-to-fill-span').each(function (){

			$(this).parent().find('.input-text-with-words-span').val($(this).text().replace(/\s\s+/g, ' '))
		})
		//console.log($('.text-to-fill-span').parent().find('input-text-with-words-span'));

	}

	/* script canva draw */
	var color = $(".selected").css("background-color");
	var context = $("canvas")[1].getContext("2d");
	var $canvas = $("canvas");
	var lastEvent;
	var mouseDown = false;
	let canvas = document.getElementById("draw-new");
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
