
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
	</style>
<div class="page-loader"></div>

<div class="wrapper">

	<!-- ======================== Navigation ======================== -->
	<?php $this->view('partials/menu')?>

	<!-- ========================  Tabsy wrapper ======================== -->

	<!-- ========================  Icons slider ======================== -->

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

					</div> <!--/filters-->
				</div>

				<!-- === product items === -->

				<div class="col-md-9 col-xs-12">

					<div class="sort-bar clearfix">
						<div class="sort-options pull-right">
							<span class="hidden-xs">List of Exams by student</span>
							<!--Grid-list view-->
							<span class="grid-list" hidden>
                                <a href="products-grid.html" > <i class="fa fa-th-large"></i></a>
                            </span>
						</div>
					</div>

					<div class="row row-clean pagination-container">
						<div class="col-md-12 col-xs-12">
							<div class="filters">
								<!--Teachers-->
								<div class="filter-box active">
									<div class="title">
										Exam Informations
									</div>
									<div class="filter-content">
										<h5>Exam N° : <?php echo $exam->id; ?></h5>
										<p>Title : <?php echo $exam->title_exam; ?></p>
										<p>Date : <?php echo $exam->date_created; ?></p>
									</div>
								</div> <!--/filter-box-->

							</div> <!--/filters-->
							<div class="filters">
								<!--Teachers-->
								<div class="filter-box active">
									<div class="title">
										Edit this exam
									</div>
								</div> <!--/filter-box-->
								<!--close filters on mobile / update filters class removed .toggle-filters-close-->
								<a target="_blank" href="<?php echo base_url(); ?>index.php/teacher/edit/exam-by-teacher/<?php echo $exam->id; ?>/<?php echo $_SESSION['idTeacher']?>"><div type="button" class=" btn btn-main" id="edit-exam">
										Edit this exam
									</div></a>

							</div> <!--/filters-->
							<div class="filters">
								<!--Teachers-->
								<div class="filter-box active">
									<div class="title">
										Students List who passed the exam
									</div>
									<div class="filter-content">
										<?php foreach($studentsPassedExamResult as $student) { ?>
											<span class="checkbox">
										<input type="checkbox" class="check-student" name="student<?php echo $student->id; ?>" id="student<?php echo $student->id; ?>">
										<label for="student<?php echo $student->id; ?>"><?php echo $student->name; ?> <i></i></label>
                                	</span>
										<?php } ?>

									</div>
								</div> <!--/filter-box-->
								<!--close filters on mobile / update filters class removed .toggle-filters-close-->
								<div type="button" class=" btn btn-main" id="submit-correction-by-student">
									Correct The answers
								</div>

							</div> <!--/filters-->

							<div class="filters">
								<!--Teachers-->
								<div class="filter-box active">
									<div class="title">
										Show results for all students
									</div>
									<div class="filter-content">
											<span class="checkbox">
										<input type="radio" class="check-show-student-result" name="student-show-result<?php echo $exam->id; ?>" id="student-show-result<?php echo $exam->id; ?>">
										<label for="student-show-result<?php echo $exam->id; ?>">Show results for all Students<i></i></label>
                                	</span>

									</div>
								</div> <!--/filter-box-->
								<!--close filters on mobile / update filters class removed .toggle-filters-close-->
								<div type="button" class=" btn btn-main" id="show-correction">
									Show results
								</div>

							</div> <!--/filters-->



						</div>

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

<script>
	var paginationHandler = function(){
/*
		$('.check-teacher').change(function(){
			if(this.checked) {
				$('.check-teacher').prop('checked',false);
				$(this).prop('checked',true);
			}

		});*/
		$('#allTeachers').change(function(){
			if(this.checked) {
				$('.check-teacher').prop('checked',true);
			}else{
				$('.check-teacher').prop('checked',false);
			}

		});
		$('.check-student-result').change(function(){
			if(this.checked) {
				$('.check-student-result').prop('checked',false);
				$(this).prop('checked',true);
			}

		});
		/*$('#see-correction').click(function(){

			idStudent=$(this).parent().find(".check-student-result:checked").attr('id').replace('student-result','');
			window.location.href='<?php echo base_url(); ?>index.php/teacher/result/exam-by-teacher/'+idStudent+'/<?php echo $exam->id; ?>';



		});*/

		$('input:checkbox').click(function() {
			$('input:checkbox').not(this).prop('checked', false);
		});

		$('#show-correction').click(function(){

			idStudent=$(this).parent().find(".check-show-student-result:checked").attr('id').replace('student-show-result','');
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>index.php/teacher/show-correction",
				data: {
					'exam_id':<?php echo $exam->id; ?>},
				error: function(error){
					console.log(error);
				},
				success: function(data){
					console.log(data);
				},
			})

			const myTimeout = setTimeout(showCorrection, 1000);

			function showCorrection() {
				alert('Result shown with success !');
				location.reload();
			}

		});


		$('#submit-affectation-by-student').click(function(){
			var arrayStudentToAffect= [];
			$(".check-teacher:checkbox").each(function(){
				var $this = $(this);
				if($this.is(":checked")){
					    idTeacher=$this.attr('id').replace('teacher','');
					arrayStudentToAffect.push(idTeacher);

				}
			});

			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>index.php/teacher/affectation",
				data: {
					'array_students' : arrayStudentToAffect ,
					'id_teacher' : <?php echo $_SESSION['idTeacher']?> ,
				    'exam_id':<?php echo $exam->id; ?>},
				error: function(error){
					console.log(error);
				},
				success: function(data){
					console.log(data);
				},
			})
			const myTimeout = setTimeout(affectation, 1000);

			function affectation() {
				alert('Affectation with success !');
				location.reload();
			}


		});

		$('#submit-correction-by-student').click(function(){
			var arrayStudentToAffect= [];

			$(".check-student:checkbox").each(function(){
				var $this = $(this);
				if($this.is(":checked")){
					idStudent=$this.attr('id').replace('student','');
					arrayStudentToAffect.push(idStudent);

				}
			});

			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>index.php/teacher/correction",
				data: {
					'array_students' : arrayStudentToAffect ,
					'exam_id':<?php echo $exam->id; ?>},
				error: function(error){
					console.log(error);
				},
				success: function(data){
					console.log(data);
					window.location.href='<?php echo base_url(); ?>index.php/teacher/result/exam-by-teacher/<?php echo $_SESSION['idTeacher']; ?>/<?php echo $exam->id; ?>';

				},
			})
			/*const myTimeout = setTimeout(affectation, 1000);

			function affectation() {
				alert('Affectation with success !');
				location.reload();
			}*/


		});


	};
	$( document ).ready( paginationHandler );

</script>

</html>
