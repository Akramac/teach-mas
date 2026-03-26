<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		if($this->session->userdata('id'))
		{
			$this->db->where('id', $this->session->userdata('id'));
			$query = $this->db->get('users');
			$userType = $query->row()->user_level;
			if($userType!='ROLE_ADMIN'){
				$data['title'] = 'Administration';
				redirect('admin/administration',$data);
			}

		}else{
			$data['title'] = 'Yahia MAS';
			redirect('login',$data);
		}
		$this->load->library('session');
		$this->load->model('examModel');
		$this->load->library('form_validation');
		$this->load->library('email');
	}
	public function administration($idTeacher='')
	{
		$this->session->set_userdata('site_lang',  "english");
		$this->lang->load('ar','arabe');
		$idUser=$this->session->userdata('id');
		$this->db->select("users.user_level,users.name,users.email");
		$this->db->from('users');
		$this->db->where('users.id',$idUser);
		$query = $this->db->get();
		$userResult=$query->result();

		$userLevel=$userResult[0]->user_level;
		if(isset($userLevel) and $userLevel=='ROLE_ADMIN') {
			$userType = 'Administrateur';
		}
		$this->session->set_userdata('user_name',  $userResult[0]->name);
		$this->session->set_userdata('user_email',  $userResult[0]->email);
		$this->session->set_userdata('user_type_role',  $userType);

		//$this->lang->load('en','english');
		$data['title'] = 'Yahia MAS';
		$data['userId'] = $idUser;


		$this->db->select();
		$this->db->from('teachers');
		$query = $this->db->get();
		$teachersResult=$query->result();
		$data['listTeachersByAdmin']=$teachersResult;

		$query = $this->db->get('student_teacher_junction');
		$teacherStudentResult = $query->result();
		//$data['listTeachers']=$teacherStudentResult;
		$arrayTeachers=array('0');
		foreach ($teacherStudentResult as $teacher){
			$arrayTeachers[]=$teacher->teacher_id;
		}

		if($idTeacher!='' & $idTeacher!='all'){
			$this->db->select();
			$this->db->from('exams');
			$this->db->where('teacher_id', $idTeacher);
			$this->db->order_by("exams.date_created", "desc");
			$examByTeacherResult = $this->db->get()->result();
			$data['listExamsByAdmin']=$examByTeacherResult;


		}elseif($idTeacher=='all' or $idTeacher=='' or $idTeacher==null){
			$this->db->select();
			$this->db->from('exams');
			$this->db->where_in('teacher_id', $arrayTeachers);
			$this->db->order_by("exams.date_created", "desc");
			$examByTeacherResult = $this->db->get()->result();
			$data['listExamsByAdmin']=$examByTeacherResult;
		}

		//get number of students passed the exam by exam
		$arrayCountStudentsByExam=array();
		foreach ($examByTeacherResult as $exam){
			$id_Exam=$exam->id;
			$this->db->distinct();
			$this->db->select();
			$this->db->from('students');
			$this->db->join('student_exam_junction','student_exam_junction.student_id = students.id');
			$this->db->where('student_exam_junction.exam_id',$id_Exam);
			$query = $this->db->get();
			$studentsPassedByExam= $query->result();
			$arrayCountStudentsByExam[$id_Exam]=count($studentsPassedByExam);

		}
		$data['arrayCountStudentsByExam']=$arrayCountStudentsByExam;

		$this->db->select();
		$this->db->from('categories');
		$query = $this->db->get();
		$categoriesResult= $query->result();
		$data['categories'] = $categoriesResult;

		//approve teachers
		$this->db->select();
		$this->db->from('teachers');
		$this->db->where('approved_by_admin', null);
		$queryTeach = $this->db->get();
		$teachersToApproveResult=$queryTeach->result();
		$data['listTeachersToaApproveByAdmin']=$teachersToApproveResult;

		//data of teacher
		$this->db->select();
		$this->db->from('teachers');
		$this->db->where('id', $idTeacher);
		$query = $this->db->get();
		$teacherResult=$query->result();
		$data['teacherChoosen']=array();
		$data['countExamsByTeacher']=0;
		if(count($teacherResult)>0){
			$data['teacherChoosen']=$teacherResult;
			//count number of exams
			$this->db->select();
			$this->db->from('exams');
			$this->db->where('teacher_id', $idTeacher);
			$this->db->order_by("exams.date_created", "desc");
			$examByTeacherResult = $this->db->get()->result();
			$data['countExamsByTeacher']=count($examByTeacherResult);
		}

		$this->load->view('admin/administration',$data);
	}

	public function editExam($idExam='')
	{
		$this->session->set_userdata('site_lang',  "english");
		$this->lang->load('ar','arabe');
		$idUser=$this->session->userdata('id');
		$this->db->select("users.user_level,users.name,users.email");
		$this->db->from('users');
		$this->db->where('users.id',$idUser);
		$query = $this->db->get();
		$userResult=$query->result();

		//$this->lang->load('en','english');
		$data['title'] = 'Yahia MAS';
		$data['userId'] = $idUser;
		$data['examId'] = $idExam;


		// get teachers by exam

		$this->db->distinct();
		$this->db->select("teachers.id,teachers.name");
		$this->db->from('teachers');
		$this->db->join('exams_teachers_junction','teachers.id = exams_teachers_junction.teacher_id');
		$this->db->where('exams_teachers_junction.exam_id', $idExam);
		$query = $this->db->get();
			$teacherResultByExam= $query->result();
		$arrayTeachersByExam=array();
		foreach ($teacherResultByExam as $teacher){
			$arrayTeachersByExam[]=$teacher->id;
		}
		$this->db->select();
		$this->db->from('teachers');
		if(!empty($arrayTeachersByExam)){

			$this->db->where_not_in('teachers.id', $arrayTeachersByExam);
		}
		$query = $this->db->get();
		$teachersResult=$query->result();
		$data['listTeachersByAdmin']=$teachersResult;
		$data['listTeachersByExam']=$teacherResultByExam;

		/*
		$idTeacher='';
		if(!empty($teacherResult)){
			$idTeacher=$teacherResult[0]->id;
		}*/



		$this->load->view('admin/editExam',$data);
	}

	public function updateTeachersByExam()
	{
		$this->form_validation->set_rules('exam-id', 'Exam ID', 'required');
		if($this->form_validation->run())
		{
			$idExam=$this->input->post('exam-id');
			$arrayTeachersToExam=$this->input->post('teachers-select');
			//delete junction teachers exams
			//array to string convertion
			if(isset($arrayTeachersToExam)){
				$listTeachersToExam=implode(",", $arrayTeachersToExam);
			}
			if(!empty($listTeachersToExam)){
				$query='DELETE exams_teachers_junction.*
						FROM exams_teachers_junction 
						INNER JOIN teachers ON exams_teachers_junction.teacher_id=teachers.id
						WHERE exams_teachers_junction.exam_id = '.$idExam.'
						AND  teachers.id NOT IN ('.$listTeachersToExam.')';
				/*$query='DELETE FROM `exams_teachers_junction` WHERE `exams_teachers_junction`.`teacher_id`  =2
				and  `exams_teachers_junction`.`teacher_id` ='.$idExam;*/
				$this->db->query($query);
				foreach ($arrayTeachersToExam as $item){

					$data['teacher_id']=$item;
					$data['exam_id']=$idExam;

					$isDuplicated = $this->examModel->isDuplicateExamTeacherJunction($data);
					if(!($isDuplicated)){
						//Insert data into Review Table
						$this->db->insert('exams_teachers_junction', $data);
					}

				}

			}else{
				$query='DELETE exams_teachers_junction.*
						FROM exams_teachers_junction 
						INNER JOIN teachers ON exams_teachers_junction.teacher_id=teachers.id
						WHERE exams_teachers_junction.exam_id = '.$idExam;
				/*$query='DELETE FROM `exams_teachers_junction` WHERE `exams_teachers_junction`.`teacher_id`  =2
				and  `exams_teachers_junction`.`teacher_id` ='.$idExam;*/
				$this->db->query($query);
			}
			$data['title'] = 'Yahia MAs';
			$this->session->set_flashdata('success','Affectation successfully !');
			redirect('admin/administration',$data);

		}
	}

	public function addCategory()
	{
		$this->form_validation->set_rules('category', 'category', 'required');
		if($this->form_validation->run())
		{

			$categoryId = $this->examModel->add_category(
				$this->input->post('category')
			);

			if(isset($categoryId) & $categoryId!='' ){
				$data['title'] = 'Yahia MAS';
				$this->session->set_flashdata('success','Added CAtegory Succesfully !');
			}else
			{
				$data['title'] = 'Yahia MAs';
				$this->session->set_flashdata('error','Error Adding Category ');

			}
			redirect('admin/administration');

		}

	}


	public function approveTeacher($idTeacher='')
	{

			$approvedTeacher = $this->examModel->approve_teacher(
				$idTeacher
			);

			if(isset($approvedTeacher) & $approvedTeacher!='' ){
				$data['title'] = 'Yahia MAS';
				$this->session->set_flashdata('success','Added Teacher Succesfully !');
			}else
			{
				$data['title'] = 'Yahia MAs';
				$this->session->set_flashdata('error','Error Approving Teacher');

			}
			redirect('admin/administration');


	}
	public function noApproveTeacher($idTeacher='')
	{

		$approvedTeacher = $this->examModel->no_approve_teacher(
			$idTeacher
		);

		if(isset($approvedTeacher) & $approvedTeacher!='' ){
			$data['title'] = 'Yahia MAS';
			$this->session->set_flashdata('success','Teacher not approved !');
		}else
		{
			$data['title'] = 'Yahia MAs';
			$this->session->set_flashdata('error','Error Approving Teacher');

		}
		redirect('admin/administration');


	}

	public function editExamByTeacher($idExam='',$idTeacher='')
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';
		$data['idTeacher'] = $idTeacher;

		/* get question multi or single choice */
		$this->db->select();
		$this->db->from('question_multi_choice');
		$this->db->join('exam_quest_multi_junction', 'exam_quest_multi_junction.quest_multi_id  = question_multi_choice.id');
		$this->db->join('exams', 'exams.id = exam_quest_multi_junction.exam_id');
		$this->db->where('exams.id', $idExam);
		$query = $this->db->get();
		$listQuestionsSingleChoice= $query->result();
		$data['listQuestionsSingleChoice'] =$listQuestionsSingleChoice;

		/* get question long text */
		$this->db->select();
		$this->db->from('question_long_text');
		$this->db->join('exam_quest_long_text_junction', 'exam_quest_long_text_junction.quest_long_text_id   = question_long_text.id', 'left');
		$this->db->join('exams', 'exams.id = exam_quest_long_text_junction.exam_id', 'left');
		$this->db->where('exams.id', $idExam);
		$query = $this->db->get();
		$listQuestionsLongText= $query->result();
		$data['listQuestionsLongText'] =$listQuestionsLongText;

		/* get question tawsil */
		$this->db->select();
		$this->db->from('question_tawsil');
		$this->db->join('exam_quest_tawsil_junction', 'exam_quest_tawsil_junction.quest_tawsil_id   = question_tawsil.id', 'left');
		$this->db->join('exams', 'exams.id = exam_quest_tawsil_junction.exam_id', 'left');
		$this->db->where('exams.id', $idExam);
		$query = $this->db->get();
		$listQuestionsTawsil= $query->result();
		$data['listQuestionsTawsil'] =$listQuestionsTawsil;

		/* get question tartib */
		$this->db->select();
		$this->db->from('question_tartib');
		$this->db->join('exam_quest_tartib_junction', 'exam_quest_tartib_junction.quest_tartib_id   = question_tartib.id', 'left');
		$this->db->join('exams', 'exams.id = exam_quest_tartib_junction.exam_id', 'left');
		$this->db->where('exams.id', $idExam);
		$query = $this->db->get();
		$listQuestionsTartib= $query->result();
		$data['listQuestionsTartib'] =$listQuestionsTartib;

		/* get question span */

		$this->db->select();
		$this->db->from('question_span');
		$this->db->join('exam_quest_span_junction', 'exam_quest_span_junction.quest_span_id   = question_span.id', 'left');
		$this->db->join('exams', 'exams.id = exam_quest_span_junction.exam_id', 'left');
		$this->db->where('exams.id', $idExam);
		$query = $this->db->get();
		$listQuestionsLongText= $query->result();
		$data['listQuestionsSpan'] =$listQuestionsLongText;

		$data['idExam'] =$idExam;
		$data['idTeacher'] =$idTeacher;

		$this->db->select('exams.id,exams.title_exam,exams.categorie_id,exams.duration_exam,exams.allow_screen_record,exams.allow_camera_record,exams.random_questions,exams.no_remake_exam');
		$this->db->from('exams');
		$this->db->where('exams.id', $idExam);
		$this->db->limit(1);
		$query = $this->db->get();
		$durationExam= $query->result();
		$data['durationExam']='';
		if(!empty($durationExam)){
			$data['durationExam'] =$durationExam[0]->duration_exam;
			$data['title_exam'] =$durationExam[0]->title_exam;
			$data['categorie_id'] =$durationExam[0]->categorie_id;
			$data['id_exam'] =$durationExam[0]->id;
		}
		$data['allowScreenRecord']='';
		$data['allowCameraRecord']='';
		$data['randomQuestions']='';
		$data['noRetakeExam']='';
		if(!empty($durationExam)){
			$data['allowScreenRecord'] =$durationExam[0]->allow_screen_record;
			$data['allowCameraRecord'] =$durationExam[0]->allow_camera_record;
			$data['randomQuestions'] =$durationExam[0]->random_questions;
			$data['noRetakeExam'] =$durationExam[0]->no_remake_exam;
		}


		$this->db->select();
		$this->db->from('categories');
		$queryCat = $this->db->get();
		$categoriesResult= $queryCat->result();
		$data['categories'] = $categoriesResult;
		$this->load->view('admin/adminEditExam',$data);
	}
	public function addExamAfterEdit()
	{
		/*$this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email');*/
		$this->form_validation->set_rules('id_exam', 'id', 'required');
		$this->form_validation->set_rules('title_exam', 'Title', 'required');
		if($this->form_validation->run())
		{
			/* add to table exam  */

			// get teacher_id
			$idTeacher=$this->input->post('id_teacher');
			//id exam
			$idExam=$this->input->post('id_exam');
			$titleExam=$this->input->post('title_exam');
			$durationExam=$this->input->post('usr_time_exam');

			$allowScreenRecord=false;
			$allowCameraRecord=false;
			$randomQuestions=false;
			$noRemakeExam=false;
			if($this->input->post('record-screen') && $this->input->post('record-screen')=='on'){
				$allowScreenRecord=true;
			}
			if($this->input->post('record-camera') && $this->input->post('record-camera')=='on'){
				$allowCameraRecord=true;
			}
			if($this->input->post('check-random-questions') && $this->input->post('check-random-questions')=='on'){
				$randomQuestions=true;
			}
			if($this->input->post('check-no-retake-exam') && $this->input->post('check-no-retake-exam')=='on'){
				$noRemakeExam=true;
			}
			$examId = $this->examModel->edit_exam(
				$idExam,
				$titleExam,
				$durationExam,
				$idTeacher,
				$this->input->post('select-category'),
				$allowScreenRecord,
				$allowCameraRecord,
				$randomQuestions,
				$noRemakeExam



			);
			if(isset($examId) & $examId!='' ){
				$data['title'] = 'Yahia MAS';

			}else
			{
				$data['title'] = 'Yahia MAs';
				$this->session->set_flashdata('error','Error Adding Exam '.$examId);

			}
			$numQuestMulti=$this->input->post('count-quest-mutli');
			for($i=1;$i<=$numQuestMulti;$i++){
				if($this->input->post('quest_mutliple-'.$i)=='quest_mutliple'){

					$fileName=null;
					if(array_key_exists("file-uploaded-multi-".$i,$_FILES) &&  $_FILES["file-uploaded-multi-".$i]["name"]!=''){
						$rand = rand();
						$fileName = $rand.$_FILES["file-uploaded-multi-".$i]["name"];
						$uploadDirectory = "assets/uploads/$fileName";
						if (!move_uploaded_file($_FILES["file-uploaded-multi-".$i]["tmp_name"], $uploadDirectory)) {
							$this->session->set_flashdata('error','error uploading image ');

						}
					}
					$idQuestionChoices=$this->input->post('id-quest-multi-'.$i);
					if(!isset($idQuestionChoices) || $idQuestionChoices==''){


						// no specific time for question
						$isNoSpecificTime=$this->input->post('no-specific-time-multi-'.$i);
						$noSpecificTime=null;
						if($isNoSpecificTime=='on'){
							$noSpecificTime=true;
						}
						$result = $this->examModel->add_data_choices(
							$this->session->userdata('id'),
							$this->input->post('title-question-multi-'.$i),
							$this->input->post('usr_time-multi-'.$i),
							$this->input->post('indeterminate-checkbox-single-'.$i),
							$this->input->post('option-multi-1-'.$i),
							$this->input->post('correct-option-multi-1-'.$i),
							$this->input->post('option-multi-2-'.$i),
							$this->input->post('correct-option-multi-2-'.$i),
							$this->input->post('option-multi-3-'.$i),
							$this->input->post('correct-option-multi-3-'.$i),
							$this->input->post('option-multi-4-'.$i),
							$this->input->post('correct-option-multi-4-'.$i),
							$this->input->post('option-multi-5-'.$i),
							$this->input->post('correct-option-multi-5-'.$i),
							$this->input->post('option-multi-6-'.$i),
							$this->input->post('correct-option-multi-6-'.$i),
							$this->input->post('file-uploaded-multi-'.$i),
							$this->input->post('points-multi-'.$i),
							$fileName,
							$noSpecificTime
						);

						if(isset($result) & $result!='' ){
							$data['title'] = 'Yahia MAS';
							$resultJunction = $this->examModel->add_mutli_choice_junction(
								$result,
								$examId
							);
							if(isset($resultJunction) & $resultJunction=='ok' ) {
								$data['title'] = 'Yahia MAS';
							}else{
								$data['title'] = 'Yahia MAs';
								$this->session->set_flashdata('error','Error Adding Junction ');
							}
						}else
						{
							$data['title'] = 'Yahia MAs';
							$this->session->set_flashdata('error','Error Adding question with choices  '.$result);

						}

					}else{

						// no specific time for question
						$isNoSpecificTime=$this->input->post('no-specific-time-multi-'.$i);
						$noSpecificTime=null;
						if($isNoSpecificTime=='on'){
							$noSpecificTime=true;
						}
						$result = $this->examModel->update_data_choices(
							$idQuestionChoices,
							$this->session->userdata('id'),
							$this->input->post('title-question-multi-'.$i),
							$this->input->post('usr_time-multi-'.$i),
							$this->input->post('indeterminate-checkbox-single-'.$i),
							$this->input->post('option-multi-1-'.$i),
							$this->input->post('correct-option-multi-1-'.$i),
							$this->input->post('option-multi-2-'.$i),
							$this->input->post('correct-option-multi-2-'.$i),
							$this->input->post('option-multi-3-'.$i),
							$this->input->post('correct-option-multi-3-'.$i),
							$this->input->post('option-multi-4-'.$i),
							$this->input->post('correct-option-multi-4-'.$i),
							$this->input->post('option-multi-5-'.$i),
							$this->input->post('correct-option-multi-5-'.$i),
							$this->input->post('option-multi-6-'.$i),
							$this->input->post('correct-option-multi-6-'.$i),
							$this->input->post('file-uploaded-multi-'.$i),
							$this->input->post('points-multi-'.$i),
							$fileName,
							$noSpecificTime
						);
						if(isset($result) & $result!='' ) {
							$data['title'] = 'Yahia MAS';
							$this->session->set_flashdata('success','Updated correctly!');
						}else{
							$this->session->set_flashdata('error','Error Adding Junction ');
						}
					}

				}
			}

			$numQuestLong=$this->input->post('count-quest-long-text');
			for($i=1;$i<=$numQuestLong;$i++){

				if($this->input->post('quest_long_text-'.$i)=='quest_long_text'){

					$fileName=null;
					if(array_key_exists("file-uploaded-long-".$i,$_FILES) && $_FILES["file-uploaded-long-".$i]["name"]!=''){
						$rand = rand();
						$fileName = $rand.$_FILES["file-uploaded-long-".$i]["name"];
						$uploadDirectory = "assets/uploads/$fileName";
						if (!move_uploaded_file($_FILES["file-uploaded-long-".$i]["tmp_name"], $uploadDirectory)) {
							$this->session->set_flashdata('error','error uploading image ');

						}
					}

					$idQuestionLong=$this->input->post('id-quest-long-'.$i);
					if(!isset($idQuestionLong) || $idQuestionLong==''){


						// no specific time for question
						$isNoSpecificTime=$this->input->post('no-specific-time-long-'.$i);
						$noSpecificTime=null;
						if($isNoSpecificTime=='on'){
							$noSpecificTime=true;
						}
						$result = $this->examModel->add_data_long_text(
							$this->session->userdata('id'),
							$this->input->post('title-question-long-'.$i),
							$this->input->post('correct-question-long-'.$i),
							$this->input->post('usr_time-long-'.$i),
							$this->input->post('file-uploaded-long-'.$i),
							$this->input->post('points-long-'.$i),
							$fileName,
							$noSpecificTime

						);
						if(isset($result) & $result!='' ){
							$data['title'] = 'Yahia MAS';

							$resultJunction = $this->examModel->add_long_text_junction(
								$result,
								$examId
							);
							if(isset($resultJunction) & $resultJunction=='ok' ) {
								$data['title'] = 'Yahia MAS';
							}else{
								$data['title'] = 'Yahia MAs';
								$this->session->set_flashdata('error','Error Adding Junction ');
							}
						}else
						{

							$this->session->set_flashdata('error','Error Adding Exam '.$result);

						}
					}else{
						// no specific time for question
						$isNoSpecificTime=$this->input->post('no-specific-time-long-'.$i);
						$noSpecificTime=null;
						if($isNoSpecificTime=='on'){
							$noSpecificTime=true;
						}
						$result = $this->examModel->update_data_long_text(
							$idQuestionLong,
							$this->session->userdata('id'),
							$this->input->post('title-question-long-'.$i),
							$this->input->post('correct-question-long-'.$i),
							$this->input->post('usr_time-long-'.$i),
							$this->input->post('file-uploaded-long-'.$i),
							$this->input->post('points-long-'.$i),
							$fileName,
							$noSpecificTime

						);
						if(isset($result) & $result!='' ) {
							$data['title'] = 'Yahia MAS';
							$this->session->set_flashdata('success','Updated correctly!');
						}else{
							$this->session->set_flashdata('error','Error Adding Junction ');
						}
					}
				}
			}

			$numQuestTawsil=$this->input->post('count-quest-tawsil');
			for($i=1;$i<=$numQuestTawsil;$i++) {
				if ($this->input->post('quest_tawsil-'.$i) == 'quest_tawsil') {

					$fileName=null;
					if(array_key_exists("file-uploaded-tawsil-".$i,$_FILES) && $_FILES["file-uploaded-tawsil-".$i]["name"]!=''){
						$rand = rand();
						$fileName = $rand.$_FILES["file-uploaded-tawsil-".$i]["name"];
						$uploadDirectory = "assets/uploads/$fileName";
						if (!move_uploaded_file($_FILES["file-uploaded-tawsil-".$i]["tmp_name"], $uploadDirectory)) {
							$this->session->set_flashdata('error','error uploading image ');

						}
					}

					$idQuestionTawsil=$this->input->post('id-quest-tawsil-'.$i);
					if(!isset($idQuestionTawsil) || $idQuestionTawsil==''){

						// no specific time for question
						$isNoSpecificTime=$this->input->post('no-specific-time-tawsil-'.$i);
						$noSpecificTime=null;
						if($isNoSpecificTime=='on'){
							$noSpecificTime=true;
						}
						$result = $this->examModel->add_data_tawsil(
							$this->session->userdata('id'),
							$this->input->post('title-question-tawsil-'.$i),
							$this->input->post('usr_time-tawsil-'.$i),
							$this->input->post('option-tawsil-1-'.$i),
							$this->input->post('link-option-tawsil-1-'.$i),
							$this->input->post('option-tawsil-2-'.$i),
							$this->input->post('link-option-tawsil-2-'.$i),
							$this->input->post('option-tawsil-3-'.$i),
							$this->input->post('link-option-tawsil-3-'.$i),
							$this->input->post('option-tawsil-4-'.$i),
							$this->input->post('link-option-tawsil-4-'.$i),
							$this->input->post('option-tawsil-5-'.$i),
							$this->input->post('link-option-tawsil-5-'.$i),
							$this->input->post('option-tawsil-6-'.$i),
							$this->input->post('link-option-tawsil-6-'.$i),
							$this->input->post('file-uploaded-tawsil-'.$i),
							$this->input->post('points-tawsil-'.$i),
							$fileName,
							$noSpecificTime

						);
						if(isset($result) & $result!='' ){
							$data['title'] = 'Yahia MAS';

							$resultJunction = $this->examModel->add_tawsil_junction(
								$result,
								$examId
							);
							if(isset($resultJunction) & $resultJunction=='ok' ) {
								$data['title'] = 'Yahia MAS';
							}else{
								$data['title'] = 'Yahia MAs';
								$this->session->set_flashdata('error','Error Adding Junction ');
							}
						} else {
							$data['title'] = 'Yahia MAs';
							$this->session->set_flashdata('error', 'Error Adding Exam ' . $result);

						}
					}else{

						// no specific time for question
						$isNoSpecificTime=$this->input->post('no-specific-time-tawsil-'.$i);
						$noSpecificTime=null;
						if($isNoSpecificTime=='on'){
							$noSpecificTime=true;
						}
						$result = $this->examModel->update_data_tawsil(
							$idQuestionTawsil,
							$this->session->userdata('id'),
							$this->input->post('title-question-tawsil-'.$i),
							$this->input->post('usr_time-tawsil-'.$i),
							$this->input->post('option-tawsil-1-'.$i),
							$this->input->post('link-option-tawsil-1-'.$i),
							$this->input->post('option-tawsil-2-'.$i),
							$this->input->post('link-option-tawsil-2-'.$i),
							$this->input->post('option-tawsil-3-'.$i),
							$this->input->post('link-option-tawsil-3-'.$i),
							$this->input->post('option-tawsil-4-'.$i),
							$this->input->post('link-option-tawsil-4-'.$i),
							$this->input->post('option-tawsil-5-'.$i),
							$this->input->post('link-option-tawsil-5-'.$i),
							$this->input->post('option-tawsil-6-'.$i),
							$this->input->post('link-option-tawsil-6-'.$i),
							$this->input->post('file-uploaded-tawsil-'.$i),
							$this->input->post('points-tawsil-'.$i),
							$fileName,
							$noSpecificTime

						);
					}
				}
			}
			$numQuestTartib=$this->input->post('count-quest-tartib');
			for($i=1;$i<=$numQuestTartib;$i++) {
				if ($this->input->post('quest_tartib-'.$i) == 'quest_tartib') {

					$fileName=null;
					if(array_key_exists("file-uploaded-tartib-".$i,$_FILES) && $_FILES["file-uploaded-tartib-".$i]["name"]!=''){
						$rand = rand();
						$fileName = $rand.$_FILES["file-uploaded-tartib-".$i]["name"];
						$uploadDirectory = "assets/uploads/$fileName";
						if (!move_uploaded_file($_FILES["file-uploaded-tartib-".$i]["tmp_name"], $uploadDirectory)) {
							$this->session->set_flashdata('error','error uploading image ');

						}
					}
					$idQuestionTartib=$this->input->post('id-quest-tartib-'.$i);
					if(!isset($idQuestionTartib) || $idQuestionTartib==''){


						// no specific time for question
						$isNoSpecificTime=$this->input->post('no-specific-time-tartib-'.$i);
						$noSpecificTime=null;
						if($isNoSpecificTime=='on'){
							$noSpecificTime=true;
						}
						$result = $this->examModel->add_data_tartib(
							$this->session->userdata('id'),
							$this->input->post('title-question-tartib-'.$i),
							$this->input->post('usr_time-tartib-'.$i),
							$this->input->post('option-to-order-1-'.$i),
							$this->input->post('option-to-order-2-'.$i),
							$this->input->post('option-to-order-3-'.$i),
							$this->input->post('option-to-order-4-'.$i),
							$this->input->post('option-to-order-5-'.$i),
							$this->input->post('option-to-order-6-'.$i),
							$this->input->post('file-uploaded-tartib-'.$i),
							$this->input->post('points-tartib-'.$i),
							$fileName,
							$noSpecificTime

						);
						if(isset($result) & $result!='' ){
							$data['title'] = 'Yahia MAS';

							$resultJunction = $this->examModel->add_tartib_junction(
								$result,
								$examId
							);
							if(isset($resultJunction) & $resultJunction=='ok' ) {
								$data['title'] = 'Yahia MAS';
							}else{
								$data['title'] = 'Yahia MAs';
								$this->session->set_flashdata('error','Error Adding Junction ');
							}
						} else {
							$data['title'] = 'Yahia MAs';
							$this->session->set_flashdata('error', 'Error Adding Exam ' . $result);

						}

					}else{

						// no specific time for question
						$isNoSpecificTime=$this->input->post('no-specific-time-tartib-'.$i);
						$noSpecificTime=null;
						if($isNoSpecificTime=='on'){
							$noSpecificTime=true;
						}

						$result = $this->examModel->update_data_tartib(
							$idQuestionTartib,
							$this->session->userdata('id'),
							$this->input->post('title-question-tartib-'.$i),
							$this->input->post('usr_time-tartib-'.$i),
							$this->input->post('option-to-order-1-'.$i),
							$this->input->post('option-to-order-2-'.$i),
							$this->input->post('option-to-order-3-'.$i),
							$this->input->post('option-to-order-4-'.$i),
							$this->input->post('option-to-order-5-'.$i),
							$this->input->post('option-to-order-6-'.$i),
							$this->input->post('file-uploaded-tartib-'.$i),
							$this->input->post('points-tartib-'.$i),
							$fileName,
							$noSpecificTime

						);
						if(isset($result) & $result!='' ) {
							$data['title'] = 'Yahia MAS';
							$this->session->set_flashdata('success','Updated correctly!');
						}else{
							$this->session->set_flashdata('error','Error Adding Junction ');
						}
					}
				}
			}

			$numQuestSpan=$this->input->post('count-quest-span');
			for($i=1;$i<=$numQuestSpan;$i++){

				if($this->input->post('quest_span-'.$i)=='quest_span'){

					$fileName=null;
					if(array_key_exists("file-uploaded-span-".$i,$_FILES) && $_FILES["file-uploaded-span-".$i]["name"]!=''){
						$rand = rand();
						$fileName = $rand.$_FILES["file-uploaded-span-".$i]["name"];
						$uploadDirectory = "assets/uploads/$fileName";
						if (!move_uploaded_file($_FILES["file-uploaded-span-".$i]["tmp_name"], $uploadDirectory)) {
							$this->session->set_flashdata('error','error uploading image ');

						}
					}

					$wordsConcat=$this->input->post('words-list-span-'.$i);


					$idQuestionSpan=$this->input->post('id-quest-span-'.$i);
					if(!isset($idQuestionSpan) || $idQuestionSpan==''){


						// no specific time for question
						$isNoSpecificTime=$this->input->post('no-specific-time-span-'.$i);
						$noSpecificTime=null;
						if($isNoSpecificTime=='on'){
							$noSpecificTime=true;
						}
						$result = $this->examModel->add_data_span(
							$this->session->userdata('id'),
							$this->input->post('title-question-span-'.$i),
							$this->input->post('input-text-with-words-span-'.$i),
							$wordsConcat,
							$this->input->post('usr_time-span-'.$i),
							$this->input->post('file-uploaded-span-'.$i),
							$this->input->post('points-span-'.$i),
							$fileName,
							$noSpecificTime

						);
						if(isset($result) & $result!='' ){
							$data['title'] = 'Yahia MAS';

							$resultJunction = $this->examModel->add_span_junction(
								$result,
								$examId
							);
							if(isset($resultJunction) & $resultJunction=='ok' ) {
								$data['title'] = 'Yahia MAS';
							}else{
								$data['title'] = 'Yahia MAs';
								$this->session->set_flashdata('error','Error Adding Junction ');
							}
						}else
						{

							$this->session->set_flashdata('error','Error Adding Exam '.$result);

						}

					}else{

						// no specific time for question
						$isNoSpecificTime=$this->input->post('no-specific-time-span-'.$i);
						$noSpecificTime=null;
						if($isNoSpecificTime=='on'){
							$noSpecificTime=true;
						}
						$result = $this->examModel->update_data_span(
							$idQuestionSpan,
							$this->session->userdata('id'),
							$this->input->post('title-question-span-'.$i),
							$this->input->post('input-text-with-words-span-'.$i),
							$wordsConcat,
							$this->input->post('usr_time-span-'.$i),
							$this->input->post('file-uploaded-span-'.$i),
							$this->input->post('points-span-'.$i),
							$fileName,
							$noSpecificTime

						);
						if(isset($result) & $result!='' ) {
							$data['title'] = 'Yahia MAS';
							$this->session->set_flashdata('success','Updated correctly!');
						}else{
							$this->session->set_flashdata('error','Error Adding Junction ');
						}
					}
				}
			}



			$data['title'] = 'Yahia MAs';
			// generate url for student to show his exam
			$hash=rand();
			$url = base_url().'index.php/student/activate-exam/'.$examId.'/'.$idTeacher.'/'.$hash;
			$this->session->set_flashdata('showUrl', $url);
			$this->session->set_flashdata('success','Exam Edited succesfully ');

			$hashResult = $this->examModel->add_hash_url(
				null,
				$examId,
				$idTeacher,
				$hash
			);
			redirect('admin/administration',$data);

		}
		else
		{
			$this->session->set_flashdata('error','Form not correct ');
			redirect('admin/administration');
		}
	}


	public function listStudentByExam($idExam='')
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';


		$this->db->distinct();
		$this->db->select();
		$this->db->from('students');
		$this->db->join('student_exam_junction','student_exam_junction.student_id = students.id');
		$this->db->where('student_exam_junction.exam_id',$idExam);
		$query = $this->db->get();
		$studentsPassedExam= $query->result();
		$data['studentsPassedExam']=$studentsPassedExam;


		$this->db->select();
		$this->db->from('teachers');
		$query = $this->db->get();
		$teachersResult=$query->result();
		$data['listTeachersByAdmin']=$teachersResult;

		//get note by exam
		$arrayNotes=array();
		foreach ($studentsPassedExam as $key => $student){
			$this->db->select();
			$this->db->from('response_exam');
			$this->db->where('response_exam.exam_id',$idExam);
			$this->db->where('response_exam.student_id',$student->id);
			$this->db->order_by("response_exam.date_created", "desc");
			$this->db->limit(1);
			$query = $this->db->get();
			$responseResults=$query->result();
			if(array_key_exists(0,$responseResults)){
				$arrayNotes[$student->id]=$responseResults[0]->note_by_teacher;
			}

		}

		$data['arrayNotes']=$arrayNotes;

		$this->db->select();
		$this->db->from('categories');
		$queryCat = $this->db->get();
		$categoriesResult= $queryCat->result();
		$data['categories'] = $categoriesResult;
		$this->load->view('admin/listStudentsByExam',$data);
	}

	public function listCategories()
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';


		$this->db->select();
		$this->db->from('teachers');
		$query = $this->db->get();
		$teachersResult=$query->result();
		$data['listTeachersByAdmin']=$teachersResult;

		$this->db->select();
		$this->db->from('categories');
		$queryCat = $this->db->get();
		$categoriesResult= $queryCat->result();
		$data['categories'] = $categoriesResult;
		$this->load->view('admin/listCategories',$data);

	}
	public function editCategories($idCategory='')
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';


		$this->db->select();
		$this->db->from('categories');
		$this->db->where('categories.id',$idCategory);
		$query = $this->db->get();
		$categoryResult=$query->result();
		$data['category']=$categoryResult[0];

		$this->db->select();
		$this->db->from('teachers');
		$query = $this->db->get();
		$teachersResult=$query->result();
		$data['listTeachersByAdmin']=$teachersResult;

		$this->db->select();
		$this->db->from('categories');
		$queryCat = $this->db->get();
		$categoriesResult= $queryCat->result();
		$data['categories'] = $categoriesResult;
		$this->load->view('admin/editCategories',$data);

	}
	public function updateCategory()
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';
		$idCategory=$this->input->post('category_id');
		$nameCategory=$this->input->post('category');
		$this->form_validation->set_rules('category', 'Name', 'required');
		if($this->form_validation->run()) {
			$fileName = null;
			if (array_key_exists("file-image-category" , $_FILES) && $_FILES["file-image-category"]["name"] != '') {
				$rand = rand();
				$fileName = $rand . $_FILES["file-image-category"]["name"];
				$fileName = preg_replace("/\s+/", "", $fileName);
				$uploadDirectory = "assets/uploads/categories/$fileName";
				if (!move_uploaded_file($_FILES["file-image-category"]["tmp_name"], $uploadDirectory)) {
					$this->session->set_flashdata('error', 'error uploading image ');

				}
			}

			if($fileName!=null){
				$data = array(
					'name' => $nameCategory,
					'image' => $fileName
				);
			}else{
				$data = array(
					'name' => $nameCategory
				);
			}

			$this->db->where('id', $idCategory);
			$this->db->update('categories', $data);

		}
		$this->db->select();
		$this->db->from('teachers');
		$query = $this->db->get();
		$teachersResult=$query->result();
		$data['listTeachersByAdmin']=$teachersResult;

		$this->db->select();
		$this->db->from('categories');
		$queryCat = $this->db->get();
		$categoriesResult= $queryCat->result();
		$data['categories'] = $categoriesResult;
		redirect('admin/list-categories');

	}
	public function editHomePage()
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';

		//get images and title
		$this->db->select();
		$this->db->from('home_page');
		$this->db->limit(1);
		$query = $this->db->get();
		$homeResult=$query->result();
		$data['homePage']=$homeResult[0];

		$this->form_validation->set_rules('text-image', 'Title', 'required');
		if($this->form_validation->run()) {
			$title=$this->input->post('text-image');
			for($i=1;$i<=12;$i++){
				$fileName = null;
				if (array_key_exists("file-image-".$i , $_FILES) && $_FILES["file-image-".$i]["name"] != '') {
					$rand = rand();
					$fileName = $rand . $_FILES["file-image-".$i]["name"];
					$fileName = preg_replace("/\s+/", "", $fileName);
					$uploadDirectory = "assets/uploads/homePage/$fileName";
					if (!move_uploaded_file($_FILES["file-image-".$i]["tmp_name"], $uploadDirectory)) {
						$this->session->set_flashdata('error', 'error uploading image ');

					}
					if($fileName!=null){
						$data = array(
							'image_'.$i => $fileName,
							'title' => $title
						);
					}else{
						$data = array(
							'title' => $title
						);
					}

					$this->db->where('id', 1);
					$this->db->update('home_page', $data);
				}
			}

			redirect('admin/editHomePage');
		}

		$this->load->view('admin/editHomePage',$data);
	}
	public function editWhatsapp()
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';

		//get number
		$this->db->select();
		$this->db->from('whatsapp');
		$this->db->limit(1);
		$query = $this->db->get();
		$whatsappResult=$query->result();
		$data['whatsapp']=$whatsappResult[0];


		$this->form_validation->set_rules('whatsapp_number', 'Number', 'required');
		if($this->form_validation->run()) {
			$number=$this->input->post('whatsapp_number');
			$data = array(
				'number' => $number
			);

		$this->db->where('id', 1);
		$this->db->update('whatsapp', $data);

		//get number to session
		$this->db->select();
		$this->db->from('whatsapp');
		$this->db->limit(1);
		$query = $this->db->get();
		$whatsappResult=$query->result();
		$this->session->set_userdata('whatsapp',  $whatsappResult[0]);
		$this->session->set_flashdata('success','Whatsapp modified successfully !');
		redirect('admin/editWhatsapp');
		}
		$this->load->view('admin/editWhatsapp',$data);

	}
	public function editFooter()
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';

		//get images and title
		$this->db->select();
		$this->db->from('footer');
		$this->db->limit(1);
		$query = $this->db->get();
		$homeResult = $query->result();
		$data['homePage'] = $homeResult[0];


		$this->form_validation->set_rules('title_1', 'Title', 'required');
		$this->form_validation->set_rules('title_2', 'Title', 'required');
		$this->form_validation->set_rules('title_3', 'Title', 'required');
		$this->form_validation->set_rules('title_4', 'Title', 'required');
		if($this->form_validation->run()) {
			$title1 = $this->input->post('title_1');
			$title2 = $this->input->post('title_2');
			$title3 = $this->input->post('title_3');
			$title4 = $this->input->post('title_4');

			$sub_1_title_1 = $this->input->post('sub_1_title_1');
			$sub_1_title_2 = $this->input->post('sub_1_title_2');
			$sub_1_title_3 = $this->input->post('sub_1_title_3');

			$sub_2_title_1 = $this->input->post('sub_2_title_1');
			$sub_2_title_2 = $this->input->post('sub_2_title_2');
			$sub_2_title_3 = $this->input->post('sub_2_title_3');

			$sub_3_title_1= $this->input->post('sub_3_title_1');
			$sub_3_title_2 = $this->input->post('sub_3_title_2');
			$sub_3_title_3 = $this->input->post('sub_3_title_3');

			$sub_4_title_1= $this->input->post('sub_4_title_1');
			$sub_4_title_2= $this->input->post('sub_4_title_2');
			$sub_4_title_3 = $this->input->post('sub_4_title_3');

			//urls
			$url_1_title_1 = $this->input->post('url_1_title_1');
			$url_1_title_2 = $this->input->post('url_1_title_2');
			$url_1_title_3 = $this->input->post('url_1_title_3');

			$url_2_title_1 = $this->input->post('url_2_title_1');
			$url_2_title_2 = $this->input->post('url_2_title_2');
			$url_2_title_3 = $this->input->post('url_2_title_3');

			$url_3_title_1= $this->input->post('url_3_title_1');
			$url_3_title_2 = $this->input->post('url_3_title_2');
			$url_3_title_3 = $this->input->post('url_3_title_3');

			$url_4_title_1= $this->input->post('url_4_title_1');
			$url_4_title_2= $this->input->post('url_4_title_2');
			$url_4_title_3 = $this->input->post('url_4_title_3');

				$data = array(
					'title_1' => $title1,
					'title_2' => $title2,
					'title_3' => $title3,
					'title_4' => $title4,
					'sub_1_title_1' => $sub_1_title_1,
					'sub_1_title_2' => $sub_1_title_2,
					'sub_1_title_3' => $sub_1_title_3,
					'sub_2_title_1' => $sub_2_title_1,
					'sub_2_title_2' => $sub_2_title_2,
					'sub_2_title_3' => $sub_2_title_3,
					'sub_3_title_1' => $sub_3_title_1,
					'sub_3_title_2' => $sub_3_title_2,
					'sub_3_title_3' => $sub_3_title_3,
					'sub_4_title_1' => $sub_4_title_1,
					'sub_4_title_2' => $sub_4_title_2,
					'sub_4_title_3' => $sub_4_title_3,

					'url_1_title_1' => $url_1_title_1,
					'url_1_title_2' => $url_1_title_2,
					'url_1_title_3' => $url_1_title_3,
					'url_2_title_1' => $url_2_title_1,
					'url_2_title_2' => $url_2_title_2,
					'url_2_title_3' => $url_2_title_3,
					'url_3_title_1' => $url_3_title_1,
					'url_3_title_2' => $url_3_title_2,
					'url_3_title_3' => $url_3_title_3,
					'url_4_title_1' => $url_4_title_1,
					'url_4_title_2' => $url_4_title_2,
					'url_4_title_3' => $url_4_title_3
				);

			$this->db->where('id', 1);
			$this->db->update('footer', $data);

			//get images and title
			$this->db->select();
			$this->db->from('footer');
			$this->db->limit(1);
			$query = $this->db->get();
			$footerResult=$query->result();
			$data['footer']=$footerResult[0];
			$this->session->set_userdata('footer',  $footerResult[0]);
			redirect('admin/editFooter');
		}

		$this->load->view('admin/editFooter',$data);

	}

	public function sendNewsletter()
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';


		$this->db->select();
		$this->db->from('teachers');
		$query = $this->db->get();
		$teachersResult=$query->result();
		$data['listTeachersByAdmin']=$teachersResult;

		$this->db->select();
		$this->db->from('categories');
		$queryCat = $this->db->get();
		$categoriesResult= $queryCat->result();
		$data['categories'] = $categoriesResult;
		$this->load->view('admin/sendNewsletter',$data);

	}
	public function sendEmail()
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';

		$news=$this->input->post('news');

		// Set up the email config
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = $this->config->item('smtp_host');
		$config['smtp_port'] = $this->config->item('smtp_port');
		$config['smtp_user'] = $this->config->item('smtp_user');
		$config['smtp_pass'] = $this->config->item('smtp_pass');
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$config['newline'] = "\r\n";


		$this->email->initialize($config);

		// Set up the email message
		$to = 'kanber.akram@gmail.com';
		$subject = 'Newsletter';
		$message = 'Hello,!  \n '.$news;
		$this->email->to($to);
		$this->email->from('your@example.com', 'Your Name');
		$this->email->subject($subject);
		$this->email->message($message);

		// Send the email
		 $this->email->send();

		redirect('admin/administration');
	}
	public function deleteQuestion()
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';
		$idQuestion=$this->input->post('question_id');
		$typeQuestion=$this->input->post('question_type');
		$idExam=$this->input->post('exam_id');

		switch ($typeQuestion) {
			case 'quest_mutliple':

				$this -> db -> where('exam_id', $idExam);
				$this -> db -> where('quest_multi_id', $idQuestion);
				$this -> db -> delete('exam_quest_multi_junction');

				break;
			case 'quest_long_text':

				$this -> db -> where('exam_id', $idExam);
				$this -> db -> where('quest_long_text_id', $idQuestion);
				$this -> db -> delete('exam_quest_long_text_junction');
				break;
			case 'quest_tawsil':

				$this -> db -> where('exam_id', $idExam);
				$this -> db -> where('quest_tawsil_id', $idQuestion);
				$this -> db -> delete('exam_quest_tawsil_junction');
				break;
			case 'quest_tartib':

				$this -> db -> where('exam_id', $idExam);
				$this -> db -> where('quest_tartib_id', $idQuestion);
				$this -> db -> delete('exam_quest_tartib_junction');
				break;
			case 'quest_span':

				$this -> db -> where('exam_id', $idExam);
				$this -> db -> where('quest_span_id', $idQuestion);
				$this -> db -> delete('exam_quest_span_junction');

				break;


		}

	}
}
