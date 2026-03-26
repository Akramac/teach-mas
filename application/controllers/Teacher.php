<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

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
		$this->load->library("session");
		if($this->session->userdata('id'))
		{

			$this->db->where('id', $this->session->userdata('id'));
			$query = $this->db->get('users');
			$userType = $query->row()->user_level;
			$isApproved = $query->row()->user_level;
			if($userType!='ROLE_TEACHER'){
				$data['title'] = 'Yahia MAS';
				redirect('index',$data);
			}else{
				$this->db->select("teachers.approved_by_admin");
				$this->db->from('teachers');
				$this->db->join('users','teachers.user_id = users.id');
				$this->db->where('users.id', $this->session->userdata('id'));
				$query = $this->db->get();
				$teacherResult= $query->result();
				$isApproved='';
				if(!empty($teacherResult)){
					$isApproved=$teacherResult[0]->approved_by_admin;
					if($isApproved!=true){
						$data['title'] = 'Yahia MAS';
						//$this->session->set_flashdata('error','You are not approved by the admin !');
						redirect('login',$data);
					}
				}

			}

		}else{
			$data['title'] = 'Yahia MAS';
			redirect('login',$data);
		}

		$this->load->library('form_validation');
		$this->load->model('examModel');
	}
	public function teacherExam()
	{
		$this->session->set_userdata('site_lang',  "english");
		$this->lang->load('ar','arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Teacher\'s page';
		$this->db->select();
		$this->db->from('categories');
		$query = $this->db->get();
		$categoriesResult= $query->result();
		$data['categories'] = $categoriesResult;
		$this->load->view('teacher/teacherExam',$data);
	}

	public function addExam()
	{
		/*$this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email');*/
		$this->form_validation->set_rules('title_exam', 'Title', 'required');
		if($this->form_validation->run())
		{
			/* add to table exam  */
			// get teacher_id
			$this->db->select("teachers.id");
			$this->db->from('teachers');
			$this->db->join('users','teachers.user_id = users.id');
			$this->db->where('users.id', $this->session->userdata('id'));
			$query = $this->db->get();
			$teacherResult= $query->result();
			$idTeacher='';
			if(!empty($teacherResult)){
				$idTeacher=$teacherResult[0]->id;
			}
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
			$examId = $this->examModel->add_exam(
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


					//add image
					$fileName=null;
					if(array_key_exists("file-uploaded-multi-".$i,$_FILES) && $_FILES["file-uploaded-multi-".$i]["name"]!=''){
					$rand = rand();
					$fileName = $rand.$_FILES["file-uploaded-multi-".$i]["name"];
					$fileName = preg_replace("/\s+/", "", $fileName);
					$uploadDirectory = "assets/uploads/$fileName";
					if (!move_uploaded_file($_FILES["file-uploaded-multi-".$i]["tmp_name"], $uploadDirectory)) {
						$this->session->set_flashdata('error','error uploading image ');

						}
					}
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
						$this->input->post('data-file-uploaded-multi-'.$i),
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


				}
			}

			$numQuestLong=$this->input->post('count-quest-long-text');
			for($i=1;$i<=$numQuestLong;$i++){

				if($this->input->post('quest_long_text-'.$i)=='quest_long_text'){


					$fileName=null;
					if(array_key_exists("file-uploaded-long-".$i,$_FILES) && $_FILES["file-uploaded-long-".$i]["name"]!=''){
						$rand = rand();
						$fileName = $rand.$_FILES["file-uploaded-long-".$i]["name"];
						$fileName = preg_replace("/\s+/", "", $fileName);
						$uploadDirectory = "assets/uploads/$fileName";
						if (!move_uploaded_file($_FILES["file-uploaded-long-".$i]["tmp_name"], $uploadDirectory)) {
							$this->session->set_flashdata('error','error uploading image ');

						}
					}
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
				}
			}

			$numQuestTawsil=$this->input->post('count-quest-tawsil');
			for($i=1;$i<=$numQuestTawsil;$i++) {
				if ($this->input->post('quest_tawsil-'.$i) == 'quest_tawsil') {


					$fileName=null;
					if(array_key_exists("file-uploaded-tawsil-".$i,$_FILES) &&  $_FILES["file-uploaded-tawsil-".$i]["name"]!=''){
						$rand = rand();
						$fileName = $rand.$_FILES["file-uploaded-tawsil-".$i]["name"];
						$fileName = preg_replace("/\s+/", "", $fileName);
						$uploadDirectory = "assets/uploads/$fileName";
						if (!move_uploaded_file($_FILES["file-uploaded-tawsil-".$i]["tmp_name"], $uploadDirectory)) {
							$this->session->set_flashdata('error','error uploading image ');

						}
					}
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
				}
			}
			$numQuestTartib=$this->input->post('count-quest-tartib');
			for($i=1;$i<=$numQuestTartib;$i++) {
				if ($this->input->post('quest_tartib-'.$i) == 'quest_tartib') {


					$fileName=null;
					if(array_key_exists("file-uploaded-tartib-".$i,$_FILES) &&  $_FILES["file-uploaded-tartib-".$i]["name"]!=''){
						$rand = rand();
						$fileName = $rand.$_FILES["file-uploaded-tartib-".$i]["name"];
						$fileName = preg_replace("/\s+/", "", $fileName);
						$uploadDirectory = "assets/uploads/$fileName";
						if (!move_uploaded_file($_FILES["file-uploaded-tartib-".$i]["tmp_name"], $uploadDirectory)) {
							$this->session->set_flashdata('error','error uploading image ');

						}
					}
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
				}
			}

			$numQuestSpan=$this->input->post('count-quest-span');
			for($i=1;$i<=$numQuestSpan;$i++){

				if($this->input->post('quest_span-'.$i)=='quest_span'){

					$wordsConcat=$this->input->post('words-list-span-'.$i);

					$fileName=null;
					if(array_key_exists("file-uploaded-span-".$i,$_FILES) &&  $_FILES["file-uploaded-span-".$i]["name"]!=''){
						$rand = rand();
						$fileName = $rand.$_FILES["file-uploaded-span-".$i]["name"];
						$fileName = preg_replace("/\s+/", "", $fileName);
						$uploadDirectory = "assets/uploads/$fileName";
						if (!move_uploaded_file($_FILES["file-uploaded-span-".$i]["tmp_name"], $uploadDirectory)) {
							$this->session->set_flashdata('error','error uploading image ');

						}
					}
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
				}
			}



			$data['title'] = 'Yahia MAs';
			// generate url for student to show his exam
			$hash=rand();
			$url = base_url().'index.php/student/activate-exam/'.$examId.'/'.$idTeacher.'/'.$hash;
			$this->session->set_flashdata('showUrl', $url);
			$this->session->set_flashdata('success','Exam added succesfully ');

			$hashResult = $this->examModel->add_hash_url(
				null,
				$examId,
				$idTeacher,
				$hash
			);
			redirect('index',$data);

		}
		else
		{
			$this->session->set_flashdata('error','Form not correct ');
			redirect('teacher/teacher-exam');
		}
	}
	public function studentListExamByTeacher($idTeacher='')
	{
		$this->session->set_userdata('site_lang',  "english");
		$this->lang->load('ar','arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';

		// id teachers
		// list of exams by teacher



		$this->db->select();
		$this->db->from('exams');
		$this->db->where('exams.teacher_id',$idTeacher);
		$this->db->order_by("exams.date_created", "desc");
		$query = $this->db->get();
		$examsResult= $query->result();
		$data['exams_by_student'] = $examsResult;


		//get number of students passed the exam by exam
		$arrayLinksByExam=array();
		foreach ($examsResult as $exam){
			$id_Exam=$exam->id;
			$this->db->distinct();
			$this->db->select();
			$this->db->from('hash_url_exam');
			$this->db->where('teacher_id',$idTeacher);
			$this->db->where('exam_id',$id_Exam);
			$this->db->order_by("hash_url_exam.date_created", "desc");
			$this->db->limit(1);
			$query = $this->db->get();
			$resultLinksByExam= $query->result();
			if(array_key_exists('0',$resultLinksByExam)){
				$arrayLinksByExam[$id_Exam]=$resultLinksByExam[0];
			}
		}
		$data['arrayLinksByExam']=$arrayLinksByExam;

		$this->load->view('teacher/studentListExamByTeacher',$data);
	}

public function studentListExamByStudent($idStudent='')
	{
		$this->session->set_userdata('site_lang',  "english");
		$this->lang->load('ar','arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';

		// id teacher
		// get teacher_id
		$this->db->select("teachers.id");
		$this->db->from('teachers');
		$this->db->join('users','teachers.user_id = users.id');
		$this->db->where('users.id', $this->session->userdata('id'));
		$query = $this->db->get();
		$teacherResult= $query->result();
		$idTeacher='';
		if(!empty($teacherResult)){
			$idTeacher=$teacherResult[0]->id;
		}
		// list of exams by student



		$this->db->select("teachers.id,teachers.name");
		$this->db->from('teachers');
		$this->db->join('student_teacher_junction','student_teacher_junction.teacher_id = teachers.id');
		$this->db->join('students', 'students.id = student_teacher_junction.student_id');
		$this->db->where('students.id',$idStudent);
		$query = $this->db->get();
		$teacherResult= $query->result();
		$data['teachers_by_student'] = $teacherResult;

		//list of exams
		$data['exams_by_student']=array();
		$arrayTeachers=array('0');
		foreach ($teacherResult as $teach) {
			$arrayTeachers[]=$teach->id;
		}
		$this->db->select();
		$this->db->from('exams');
		$this->db->where_in('exams.teacher_id',$arrayTeachers);
		$query = $this->db->get();
		$examsResult= $query->result();
		$data['exams_by_student'] = $examsResult;
		$this->load->view('teacher/studentListExamByTeacher',$data);
	}

	public function studentResultExamByTeacher($idStudent='',$idExam='')
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';
		// get id teacher
		$this->db->select("teachers.id");
		$this->db->from('teachers');
		$this->db->join('users','teachers.user_id = users.id');
		$this->db->where('users.id', $this->session->userdata('id'));
		$query = $this->db->get();
		$teacherResult= $query->result();
		$idTeacher='';
		if(!empty($teacherResult)){
			$idTeacher=$teacherResult[0]->id;
		}
		// get all students by teacher connected
		$this->db->distinct();
		$this->db->select();
		$this->db->from('students');
		$this->db->join('student_teacher_junction','student_teacher_junction.student_id = students.id');
		$this->db->join('teachers', 'teachers.id = student_teacher_junction.teacher_id');
		$this->db->where('teachers.id',$idTeacher);
		$query = $this->db->get();
		$studentResult= $query->result();
		$data['students_by_teacher'] = $studentResult;

		// get data student and exam in one table

		$listQuestMulti=array();
		$this->db->select();
		$this->db->from('exam_quest_multi_junction');
		$this->db->where('exam_quest_multi_junction.exam_id',$idExam);
		$query = $this->db->get();
		$listQuestMulti= $query->result();
		$data['respones_multi_quest']=array();
		$data['quets_multi_quest']=array();

		$data['idExam']=$idExam;
		$data['idStudent']=$idStudent;
		foreach ($listQuestMulti as $multiQuest){
			$reponseMutliQuest=array();
			$this->db->select();
			$this->db->from('response_question_multi_choice');
			$this->db->where('response_question_multi_choice.exam_id',$idExam);
			$this->db->where('response_question_multi_choice.question_multi_id',$multiQuest->quest_multi_id);
			$this->db->where('response_question_multi_choice.student_id',$idStudent);
			$this->db->order_by("response_question_multi_choice.id", "desc");
			$this->db->limit(1);
			$query = $this->db->get();
			$reponseMutliQuest= $query->result();
			if(!empty($reponseMutliQuest)){
				$data['respones_multi_quest'][]=$reponseMutliQuest[0];
			}

			$this->db->distinct();
			$this->db->select();
			$this->db->from('question_multi_choice');
			$this->db->where('question_multi_choice.id',$multiQuest->quest_multi_id);
			$query = $this->db->get();
			$examssResult= $query->result();
			if(!empty($examssResult)){
				$data['quets_multi_quest'][]=$examssResult[0];
			}
		}

		//show note Long text
		$listQuesLongL=array();
		$this->db->select();
		$this->db->from('exam_quest_long_text_junction');
		$this->db->where('exam_quest_long_text_junction.exam_id',$idExam);
		$query = $this->db->get();
		$listQuesLongL= $query->result();
		$data['respones_longL_quest']=array();
		foreach ($listQuesLongL as $key => $longLQuest) {
			$reponseTartibQuest = array();
			$this->db->select();
			$this->db->from('response_question_long_text');
			$this->db->where('response_question_long_text.exam_id', $idExam);
			$this->db->where('response_question_long_text.question_long_id', $longLQuest->quest_long_text_id);
			$this->db->where('response_question_long_text.student_id',$idStudent);
			$this->db->order_by("response_question_long_text.id", "desc");
			$this->db->limit(1);
			$query = $this->db->get();
			$reponseLongLQuest = $query->result();
			if(!empty($reponseLongLQuest)){
				$data['respones_longL_quest'][]=$reponseLongLQuest[0];
			}
		}

		$listQuestTawsil=array();
		$this->db->select();
		$this->db->from('exam_quest_tawsil_junction');
		$this->db->where('exam_quest_tawsil_junction.exam_id',$idExam);
		$query = $this->db->get();
		$listQuestTawsil= $query->result();
		$data['respones_tawsil_quest']=array();
		$data['quets_tawsil_quest']=array();
		foreach ($listQuestTawsil as $tawsilQuest){
			$reponseTawsilQuest=array();
			$this->db->select();
			$this->db->from('response_question_tawsil');
			$this->db->where('response_question_tawsil.exam_id',$idExam);
			$this->db->where('response_question_tawsil.question_tawsil_id',$tawsilQuest->quest_tawsil_id);
			$this->db->order_by("response_question_tawsil.id", "desc");
			$this->db->limit(1);
			$query = $this->db->get();
			$reponseTawsilQuest= $query->result();
			if(!empty($reponseTawsilQuest)){
				$data['respones_tawsil_quest'][]=$reponseTawsilQuest[0];
			}

			$this->db->distinct();
			$this->db->select();
			$this->db->from('question_tawsil');
			$this->db->where('question_tawsil.id',$tawsilQuest->quest_tawsil_id);
			$query = $this->db->get();
			$examssTawsilResult= $query->result();
			if(!empty($examssTawsilResult)){
				$data['quets_tawsil_quest'][]=$examssTawsilResult[0];
			}
		}


		$listQuestTartib=array();
		$this->db->select();
		$this->db->from('exam_quest_tartib_junction');
		$this->db->where('exam_quest_tartib_junction.exam_id',$idExam);
		$query = $this->db->get();
		$listQuestTartib= $query->result();
		$data['respones_tartib_quest']=array();
		foreach ($listQuestTartib as $key => $tartibQuest) {
			$reponseTartibQuest = array();
			$this->db->select();
			$this->db->from('response_question_tartib');
			$this->db->where('response_question_tartib.exam_id', $idExam);
			$this->db->where('response_question_tartib.question_tartib_id', $tartibQuest->quest_tartib_id);
			$this->db->where('response_question_tartib.student_id',$idStudent);
			$this->db->order_by("response_question_tartib.id", "desc");
			$this->db->limit(1);
			$query = $this->db->get();
			$reponseTartibQuest = $query->result();
			if(!empty($reponseTartibQuest)){
				$data['respones_tartib_quest'][]=$reponseTartibQuest[0];
			}
		}

		// makal long text
		$listQuestLong=array();
		$this->db->select();
		$this->db->from('exam_quest_long_text_junction');
		$this->db->where('exam_quest_long_text_junction.exam_id',$idExam);
		$query = $this->db->get();
		$listQuestLong= $query->result();
		$data['respones_long_quest']=array();
		$data['quets_long_quest']=array();
		foreach ($listQuestLong as $longQuest){
			$reponseLongQuest=array();
			$this->db->select();
			$this->db->from('response_question_long_text');
			$this->db->where('response_question_long_text.exam_id',$idExam);
			$this->db->where('response_question_long_text.question_long_id',$longQuest->quest_long_text_id);
			$this->db->order_by("response_question_long_text.id", "desc");
			$this->db->limit(1);
			$query = $this->db->get();
			$reponseLongQuest= $query->result();
			if(!empty($reponseLongQuest)){
				$data['respones_long_quest'][]=$reponseLongQuest[0];
			}

			$this->db->distinct();
			$this->db->select();
			$this->db->from('question_long_text');
			$this->db->where('question_long_text.id',$longQuest->quest_long_text_id);
			$query = $this->db->get();
			$examssLongResult= $query->result();
			if(!empty($examssLongResult)){
				$data['quets_long_quest'][]=$examssLongResult[0];
			}
		}

		// span words drag and drop correction
		$listQuestSpan=array();
		$this->db->select();
		$this->db->from('exam_quest_span_junction');
		$this->db->where('exam_quest_span_junction.exam_id',$idExam);
		$query = $this->db->get();
		$listQuestSpan= $query->result();
		$data['respones_span_quest']=array();
		$data['quets_span_quest']=array();
		foreach ($listQuestSpan as $spanQuest){
			$reponseSpanQuest=array();
			$this->db->select();
			$this->db->from('response_question_span');
			$this->db->where('response_question_span.exam_id',$idExam);
			$this->db->where('response_question_span.question_span_id',$spanQuest->quest_span_id);
			$this->db->order_by("response_question_span.id", "desc");
			$this->db->limit(1);
			$query = $this->db->get();
			$reponseSpanQuest= $query->result();
			if(!empty($reponseSpanQuest)){
				$data['respones_span_quest'][]=$reponseSpanQuest[0];
			}

			$this->db->distinct();
			$this->db->select();
			$this->db->from('question_span');
			$this->db->where('question_span.id',$spanQuest->quest_span_id);
			$query = $this->db->get();
			$examssSpanResult= $query->result();
			if(!empty($examssSpanResult)){
				$data['quets_span_quest'][]=$examssSpanResult[0];
			}
		}


		//get videos
		$data['idExam']=$idExam;
		$this->db->distinct();
		$this->db->select();
		$this->db->from('response_exam');
		$this->db->where('response_exam.exam_id',$idExam);
		$this->db->where('response_exam.student_id',$idStudent);
		$this->db->order_by("response_exam.date_created", "desc");
		$this->db->limit(1);
		$query = $this->db->get();
		$examVideos= $query->result();
		$data['linkScreenVideo']='';
		$data['linkCameraVideo']='';
		$data['linkScreenVideo']='';
		$data['linkCameraVideo']='';
		if(array_key_exists('0',$examVideos)){
			$data['linkScreenVideo']=$examVideos[0]->file_screen;
			$data['linkCameraVideo']=$examVideos[0]->file_video;
			$data['idResponsesExam']=$examVideos[0]->id;
		}

		$this->load->view('teacher/studentResultExamByTeacher.php',$data);

	}
	public function giveNoteLongQuestion()
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';

		$idResponseLong=$this->input->post('response_long_id');
		$note=$this->input->post('note');
		$idExam=$this->input->post('idExam');
		$idStudent=$this->input->post('idStudent');
		$this->db->distinct();
		$this->db->select();
		$this->db->from('response_question_long_text');
		$this->db->where('response_question_long_text.id',$idResponseLong);
		$this->db->limit(1);
		$query = $this->db->get();
		$responseExamOne= $query->result();
		$diff=$note-($responseExamOne[0]->note_by_teacher);
		$data = array(
			'note_by_teacher'  => $note
		);
		$this->db->where('id', $idResponseLong);
		$this->db->update('response_question_long_text', $data);


		$this->db->distinct();
		$this->db->select();
		$this->db->from('response_exam');
		$this->db->where('response_exam.exam_id',$idExam);
		$this->db->where('response_exam.student_id',$idStudent);
		$this->db->order_by("response_exam.date_created", "desc");
		$this->db->limit(1);
		$query = $this->db->get();
		$responseExam= $query->result();
		$noteFinale=$responseExam[0]->note_by_teacher;
		$data = array(
			'note_by_teacher'  => $noteFinale+$diff
		);
		$this->db->where('id', $responseExam[0]->id);
		$this->db->update('response_exam', $data);

	}

	public function showNotesToStudent()
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';
		$idResponseLong=$this->input->post('idResponseExam');

		$data = array(
			'show_notes' => true
		);
		$this->db->where('id', $idResponseLong);
		$this->db->update('response_exam', $data);
	}

	public function affectExamByTeacher($idExam='')
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';
		// get id teacher
		$this->db->select("teachers.id");
		$this->db->from('teachers');
		$this->db->join('users','teachers.user_id = users.id');
		$this->db->where('users.id', $this->session->userdata('id'));
		$query = $this->db->get();
		$teacherResult= $query->result();
		$idTeacher='';
		if(!empty($teacherResult)){
			$idTeacher=$teacherResult[0]->id;
		}
		// get all students by teacher connected
		/*$this->db->distinct();
		$this->db->select("students.id,students.name");
		$this->db->from('students');
		$this->db->join('student_teacher_junction','student_teacher_junction.student_id = students.id');
		$this->db->join('teachers', 'teachers.id = student_teacher_junction.teacher_id');
		$this->db->where('teachers.id',$idTeacher);
		$query = $this->db->get();
		$studentResult= $query->result();*/
		$this->db->select("students.id,students.name");
		$this->db->from('students');
		$query = $this->db->get();
		$studentResult= $query->result();
		$data['students_by_teacher'] = $studentResult;


		// get all students by teacher who passed exam
		$this->db->distinct();
		$this->db->select();
		$this->db->from('students');
		$this->db->join('student_exam_junction','student_exam_junction.student_id = students.id');
		$this->db->where('student_exam_junction.exam_id',$idExam);
		$query = $this->db->get();
		$studentsPassedExamResult= $query->result();
		$data['studentsPassedExamResult']=array();

		$arrayStudents=array('0');
		foreach ($studentsPassedExamResult as $stud) {
			$arrayStudents[]=$stud->id;
		}
		$this->db->distinct();
		$this->db->select('students.id,students.name,students.email');
		$this->db->from('students');
		$this->db->join('response_exam','response_exam.student_id = students.id');
		$this->db->where_in('students.id',$arrayStudents);
		$query = $this->db->get();
		$studResult= $query->result();

		$data['studentsPassedExamResult'] = $studResult;

		//$data['studentsPassedExamResult'] = $studentsPassedExamResult;
		// get data student and exam in one table
		/*$this->db->distinct();
		$this->db->select("students.id,students.name");
		$this->db->from('students');
		$this->db->join('student_teacher_junction','student_teacher_junction.teacher_id = students.id');
		$this->db->join('teachers', 'teachers.id = student_teacher_junction.teacher_id');
		$this->db->where('teachers.id',$idTeacher);
		$query = $this->db->get();
		$studentResult= $query->result();
		foreach ($studentResult as $student){

		}
		$data['students_by_teacher'] = $studentResult;*/

		// get Exam
		$this->db->select();
		$this->db->limit(1);
		$this->db->from('exams');
		$this->db->where('exams.id', $idExam);
		$query = $this->db->get();
		$examResult= $query->result();
		$data['exam']=array();
		if(!empty($examResult)){
			$data['exam'] = $examResult[0];
		}

		$this->load->view('teacher/affectationExam.php',$data);

	}

	public function administrateExamByTeacher($idExam='')
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';
		// get id teacher
		$this->db->select("teachers.id");
		$this->db->from('teachers');
		$this->db->join('users','teachers.user_id = users.id');
		$this->db->where('users.id', $this->session->userdata('id'));
		$query = $this->db->get();
		$teacherResult= $query->result();
		$idTeacher='';
		if(!empty($teacherResult)){
			$idTeacher=$teacherResult[0]->id;
		}
		// get all students by teacher connected
		/*$this->db->distinct();
		$this->db->select("students.id,students.name");
		$this->db->from('students');
		$this->db->join('student_teacher_junction','student_teacher_junction.student_id = students.id');
		$this->db->join('teachers', 'teachers.id = student_teacher_junction.teacher_id');
		$this->db->where('teachers.id',$idTeacher);
		$query = $this->db->get();
		$studentResult= $query->result();*/
		$this->db->select("students.id,students.name");
		$this->db->from('students');
		$query = $this->db->get();
		$studentResult= $query->result();
		$data['students_by_teacher'] = $studentResult;


		// get all students by teacher who passed exam
		$this->db->distinct();
		$this->db->select();
		$this->db->from('students');
		$this->db->join('student_exam_junction','student_exam_junction.student_id = students.id');
		$this->db->where('student_exam_junction.exam_id',$idExam);
		$query = $this->db->get();
		$studentsPassedExamResult= $query->result();
		$data['studentsPassedExamResult']=array();

		$arrayStudents=array('0');
		foreach ($studentsPassedExamResult as $stud) {
			$arrayStudents[]=$stud->id;
		}
		$this->db->distinct();
		$this->db->select('students.id,students.name,students.email');
		$this->db->from('students');
		$this->db->join('response_exam','response_exam.student_id = students.id');
		$this->db->where_in('students.id',$arrayStudents);
		$query = $this->db->get();
		$studResult= $query->result();

		$data['studentsPassedExamResult'] = $studResult;

		//$data['studentsPassedExamResult'] = $studentsPassedExamResult;
		// get data student and exam in one table
		/*$this->db->distinct();
		$this->db->select("students.id,students.name");
		$this->db->from('students');
		$this->db->join('student_teacher_junction','student_teacher_junction.teacher_id = students.id');
		$this->db->join('teachers', 'teachers.id = student_teacher_junction.teacher_id');
		$this->db->where('teachers.id',$idTeacher);
		$query = $this->db->get();
		$studentResult= $query->result();
		foreach ($studentResult as $student){

		}
		$data['students_by_teacher'] = $studentResult;*/

		// get Exam
		$this->db->select();
		$this->db->limit(1);
		$this->db->from('exams');
		$this->db->where('exams.id', $idExam);
		$query = $this->db->get();
		$examResult= $query->result();
		$data['exam']=array();
		if(!empty($examResult)){
			$data['exam'] = $examResult[0];
		}

		$this->load->view('teacher/administrateExam.php',$data);

	}

	public function affectation()
	{
		$arrayStudents=$this->input->post('array_students');
		$idExam=$this->input->post('exam_id');
		$idTeacher=$this->input->post('id_teacher');


		foreach ($arrayStudents as $idStudent){
			$data['student_id']=$idStudent;
			$data['exam_id']=$idExam;
			$data['id_teacher']=$idTeacher;
			//check duplicate
			$isDuplicated = $this->examModel->isDuplicateAffectationStudentExam($data);
			if(!($isDuplicated)){
				//Insert data into Review Table
				$resultAffectation = $this->examModel->add_affectation_student_exam(
					$idStudent,
					$idExam
				);
			}
			$isDuplicated2 = $this->examModel->isDuplicateAffectationStudentTeacher($data);
			if(!($isDuplicated2)){
				//Insert data into Review Table
				$resultAffectation = $this->examModel->add_affectation_student_teacher(
					$idStudent,
					$idTeacher
				);
			}

		}

	}

	public function editExamByTeacher($idExam='',$idTeacher='')
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page By Teacher';

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
		$this->load->view('teacher/teacherEditExam',$data);
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
			$this->db->select("teachers.id");
			$this->db->from('teachers');
			$this->db->join('users','teachers.user_id = users.id');
			$this->db->where('users.id', $this->session->userdata('id'));
			$query = $this->db->get();
			$teacherResult= $query->result();
			$idTeacher='';
			if(!empty($teacherResult)){
				$idTeacher=$teacherResult[0]->id;
			}
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
						$fileName = preg_replace("/\s+/", "", $fileName);
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
						$fileName = preg_replace("/\s+/", "", $fileName);
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
						$fileName = preg_replace("/\s+/", "", $fileName);
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
						$fileName = preg_replace("/\s+/", "", $fileName);
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
						$fileName = preg_replace("/\s+/", "", $fileName);
						$uploadDirectory = "assets/uploads/$fileName";
						if (!move_uploaded_file($_FILES["file-uploaded-span-".$i]["tmp_name"], $uploadDirectory)) {
							$this->session->set_flashdata('error','error uploading image ');

						}
					}

					$wordsConcat=$this->input->post('words-list-span-'.$i);
					$inputTextWithWords=preg_replace("/\s+/", "", $this->input->post('input-text-with-words-span-'.$i));

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
						$inputTextWithWords,
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
						//concat words
						$this->db->select();
						$this->db->from('question_span');
						$this->db->where('question_span.id', $idQuestionSpan);
						$query = $this->db->get();
						$questSpan = $query->result();
						$wordsConcat=$questSpan[0]->words.$wordsConcat;

						$inputTextWithWords=str_replace("<spanclass='w'> </span>","",$inputTextWithWords);
						$inputTextWithWords=str_replace("</span> ","",$inputTextWithWords);
						$inputTextWithWords=str_replace("<spanclass='w'>","",$inputTextWithWords);
						$inputTextWithWords=str_replace("</span>&nbsp;","",$inputTextWithWords);
						$inputTextWithWords=str_replace("</span>","",$inputTextWithWords);

						$result = $this->examModel->update_data_span(
							$idQuestionSpan,
							$this->session->userdata('id'),
							$this->input->post('title-question-span-'.$i),
							$inputTextWithWords,
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
			redirect('index',$data);

		}
		else
		{
			$this->session->set_flashdata('error','Form not correct ');
			redirect('teacher/teacher-exam');
		}
	}
	public function correction()
	{
		$arrayStudents=$this->input->post('array_students');
		$idExam=$this->input->post('exam_id');

		foreach ($arrayStudents as $idStudent) {
			$data['student_id'] = $idStudent;
			$data['exam_id'] = $idExam;
			$noteFinale = 0;
			/*//check duplicate
			$isDuplicated = $this->examModel->isDuplicateAffectation($data);
			if(!($isDuplicated)){
				//Insert data into Review Table
				$resultAffectation = $this->examModel->add_affectation(
					$idStudent,
					$idExam
				);
			}*/

			// correct multi choice by new response
			$listQuestMulti = array();
			$this->db->select();
			$this->db->from('exam_quest_multi_junction');
			$this->db->where('exam_quest_multi_junction.exam_id', $idExam);
			$query = $this->db->get();
			$listQuestMulti = $query->result();
			foreach ($listQuestMulti as $multiQuest) {

				$reponseMutliQuest = array();
				$this->db->select();
				$this->db->from('response_question_multi_choice');
				$this->db->where('response_question_multi_choice.exam_id', $idExam);
				$this->db->where('response_question_multi_choice.question_multi_id', $multiQuest->quest_multi_id);
				$this->db->order_by("response_question_multi_choice.id", "desc");
				$this->db->limit(1);
				$query = $this->db->get();
				$reponseMutliQuest = $query->result();

				//get Question
				$this->db->select();
				$this->db->from('question_multi_choice');
				$this->db->where('question_multi_choice.id', $multiQuest->quest_multi_id);
				$this->db->limit(1);
				$query = $this->db->get();
				$questMutliQuest = $query->result();

				//make correction
				if (!empty($questMutliQuest) & !empty($reponseMutliQuest)) {
					if ($questMutliQuest[0]->is_single_choice == false) {

						//make array of answers
						$arrayAnswers = array();
						if ($reponseMutliQuest[0]->response_option_1 != null) {
							$arrayAnswers[] = $reponseMutliQuest[0]->response_option_1;

						}
						if ($reponseMutliQuest[0]->response_option_2 != null) {
							$arrayAnswers[] = $reponseMutliQuest[0]->response_option_2;

						}
						if ($reponseMutliQuest[0]->response_option_3 != null) {
							$arrayAnswers[] = $reponseMutliQuest[0]->response_option_3;

						}
						if ($reponseMutliQuest[0]->response_option_4 != null) {
							$arrayAnswers[] = $reponseMutliQuest[0]->response_option_4;

						}
						if ($reponseMutliQuest[0]->response_option_5 != null) {
							$arrayAnswers[] = $reponseMutliQuest[0]->response_option_5;

						}
						if ($reponseMutliQuest[0]->response_option_6 != null) {
							$arrayAnswers[] = $reponseMutliQuest[0]->response_option_6;

						}
						// get array correction
						$arrayCorrectAnswers = array();
						if ($questMutliQuest[0]->correct_option_1 == 'correct') {
							$arrayCorrectAnswers[] = $questMutliQuest[0]->option_1;

						}
						if ($questMutliQuest[0]->correct_option_2 == 'correct') {
							$arrayCorrectAnswers[] = $questMutliQuest[0]->option_2;

						}
						if ($questMutliQuest[0]->correct_option_3 == 'correct') {
							$arrayCorrectAnswers[] = $questMutliQuest[0]->option_3;

						}
						if ($questMutliQuest[0]->correct_option_4 == 'correct') {
							$arrayCorrectAnswers[] = $questMutliQuest[0]->option_4;

						}
						//add note
						$diffArrays = array_diff($arrayAnswers, $arrayCorrectAnswers);
						if (empty($diffArrays)) {
							$noteFinale += $questMutliQuest[0]->points;
							$data = array(
								'note_by_teacher' => $questMutliQuest[0]->points
							);
							$this->db->where('id', $reponseMutliQuest[0]->id);
							$this->db->update('response_question_multi_choice', $data);

						} else {
							$data = array(
								'note_by_teacher' => "0"
							);
							$this->db->where('id', $reponseMutliQuest[0]->id);
							$this->db->update('response_question_multi_choice', $data);
						}
					} else {


						//make array of answers
						$arrayAnswers = array();
						if ($reponseMutliQuest[0]->response_option_1 != null) {
							$arrayAnswers[] = $reponseMutliQuest[0]->response_option_1;

						}
						if ($reponseMutliQuest[0]->response_option_2 != null) {
							$arrayAnswers[] = $reponseMutliQuest[0]->response_option_2;

						}
						if ($reponseMutliQuest[0]->response_option_3 != null) {
							$arrayAnswers[] = $reponseMutliQuest[0]->response_option_3;

						}
						if ($reponseMutliQuest[0]->response_option_4 != null) {
							$arrayAnswers[] = $reponseMutliQuest[0]->response_option_4;

						}
						if ($reponseMutliQuest[0]->response_option_5 != null) {
							$arrayAnswers[] = $reponseMutliQuest[0]->response_option_5;

						}
						if ($reponseMutliQuest[0]->response_option_6 != null) {
							$arrayAnswers[] = $reponseMutliQuest[0]->response_option_6;

						}
						// get array correction
						$arrayCorrectAnswers = array();
						if ($questMutliQuest[0]->correct_option_1 == 'correct') {
							$arrayCorrectAnswers[] = $questMutliQuest[0]->option_1;

						}
						if ($questMutliQuest[0]->correct_option_2 == 'correct') {
							$arrayCorrectAnswers[] = $questMutliQuest[0]->option_2;

						}
						if ($questMutliQuest[0]->correct_option_3 == 'correct') {
							$arrayCorrectAnswers[] = $questMutliQuest[0]->option_3;

						}
						if ($questMutliQuest[0]->correct_option_4 == 'correct') {
							$arrayCorrectAnswers[] = $questMutliQuest[0]->option_4;

						}
						//add note
						$diffArrays = array_diff($arrayAnswers, $arrayCorrectAnswers);
						if (empty($diffArrays)) {
							$noteFinale += $questMutliQuest[0]->points;
							$data = array(
								'note_by_teacher' => $questMutliQuest[0]->points
							);
							$this->db->where('id', $reponseMutliQuest[0]->id);
							$this->db->update('response_question_multi_choice', $data);

						} else {
							$data = array(
								'note_by_teacher' => "0"
							);
							$this->db->where('id', $reponseMutliQuest[0]->id);
							$this->db->update('response_question_multi_choice', $data);
						}
					}
				}

			}
			// correct long text

			// correct tawsil
			$listQuestLongText = array();
			$this->db->select();
			$this->db->from('exam_quest_long_text_junction');
			$this->db->where('exam_quest_long_text_junction.exam_id', $idExam);
			$query = $this->db->get();
			$listQuestLongText = $query->result();

			foreach ($listQuestLongText as $longQuest) {

				$reponseLongQuest=array();
				$this->db->select();
				$this->db->from('response_question_long_text');
				$this->db->where('response_question_long_text.exam_id',$idExam);
				$this->db->where('response_question_long_text.question_long_id',$longQuest->quest_long_text_id);
				$this->db->order_by("response_question_long_text.id", "desc");
				$this->db->limit(1);
				$query = $this->db->get();
				$reponseLongQuest= $query->result();

				$noteFinale+=$reponseLongQuest[0]->note_by_teacher;

			}
				// correct tawsil
			$listQuestTawsil=array();
			$this->db->select();
			$this->db->from('exam_quest_tawsil_junction');
			$this->db->where('exam_quest_tawsil_junction.exam_id',$idExam);
			$query = $this->db->get();
			$listQuestTawsil= $query->result();

			foreach ($listQuestTawsil as $tawsilQuest){
				$reponseTawsilQuest=array();
				$this->db->select();
				$this->db->from('response_question_tawsil');
				$this->db->where('response_question_tawsil.exam_id',$idExam);
				$this->db->where('response_question_tawsil.question_tawsil_id',$tawsilQuest->quest_tawsil_id);
				$this->db->order_by("response_question_tawsil.id", "desc");
				$this->db->limit(1);
				$query = $this->db->get();
				$reponseTawsilQuest= $query->result();

				//get Question
				$this->db->select();
				$this->db->from('question_tawsil');
				$this->db->where('question_tawsil.id',$tawsilQuest->quest_tawsil_id);
				$this->db->limit(1);
				$query = $this->db->get();
				$questTawsilQuest= $query->result();

				//make correction
				if(!empty($questTawsilQuest) & !empty($reponseTawsilQuest)){

						//make array of answers
						$isAnsweredWrong=true;
						if($reponseTawsilQuest[0]->response_option_1!=$reponseTawsilQuest[0]->correct_option_1){
							$isAnsweredWrong=false;

						}
						if($reponseTawsilQuest[0]->response_option_2!=$reponseTawsilQuest[0]->correct_option_2){
							$isAnsweredWrong=false;

						}
						if($reponseTawsilQuest[0]->response_option_3!=$reponseTawsilQuest[0]->correct_option_3){
							$isAnsweredWrong=false;

						}
						if($reponseTawsilQuest[0]->response_option_4!=$reponseTawsilQuest[0]->correct_option_4){
							$isAnsweredWrong=false;

						}
						if($reponseTawsilQuest[0]->response_option_5!=$reponseTawsilQuest[0]->correct_option_5){
							$isAnsweredWrong=false;

						}
						if($reponseTawsilQuest[0]->response_option_6!=$reponseTawsilQuest[0]->correct_option_6){
							$isAnsweredWrong=false;

						}
						if($isAnsweredWrong==true){
							$noteFinale+=$questTawsilQuest[0]->points;
							$data = array(
								'note_by_teacher'  => $questTawsilQuest[0]->points
							);
							$this->db->where('id', $reponseTawsilQuest[0]->id);
							$this->db->update('response_question_tawsil', $data);

						}else{
							$data = array(
								'note_by_teacher'  => "0"
							);
							$this->db->where('id', $reponseTawsilQuest[0]->id);
							$this->db->update('response_question_tawsil', $data);
						}
				}

			}

			// correct TARTIB
			$listQuestTartib=array();
			$this->db->select();
			$this->db->from('exam_quest_tartib_junction');
			$this->db->where('exam_quest_tartib_junction.exam_id',$idExam);
			$query = $this->db->get();
			$listQuestTartib= $query->result();

			foreach ($listQuestTartib as $tartibQuest){
				$reponseTartibQuest=array();
				$this->db->select();
				$this->db->from('response_question_tartib');
				$this->db->where('response_question_tartib.exam_id',$idExam);
				$this->db->where('response_question_tartib.question_tartib_id',$tartibQuest->quest_tartib_id);
				$this->db->order_by("response_question_tartib.id", "desc");
				$this->db->limit(1);
				$query = $this->db->get();
				$reponseTartibQuest= $query->result();

				//get Question
				$this->db->select();
				$this->db->from('question_tartib');
				$this->db->where('question_tartib.id',$tartibQuest->quest_tartib_id);
				$this->db->limit(1);
				$query = $this->db->get();
				$questTartibQuest= $query->result();

				//make correction
				if(!empty($questTartibQuest) & !empty($reponseTartibQuest)){

					//make array of answers
					$isAnsweredWrong=true;
					if($reponseTartibQuest[0]->reponse_option_to_order_1!=$reponseTartibQuest[0]->correct_order_1){
						$isAnsweredWrong=false;

					}
					if($reponseTartibQuest[0]->reponse_option_to_order_2!=$reponseTartibQuest[0]->correct_order_2){
						$isAnsweredWrong=false;

					}
					if($reponseTartibQuest[0]->reponse_option_to_order_3!=$reponseTartibQuest[0]->correct_order_3){
						$isAnsweredWrong=false;

					}
					if($reponseTartibQuest[0]->reponse_option_to_order_4!=$reponseTartibQuest[0]->correct_order_4){
						$isAnsweredWrong=false;

					}
					if($reponseTartibQuest[0]->reponse_option_to_order_5!=$reponseTartibQuest[0]->correct_order_5){
						$isAnsweredWrong=false;

					}
					if($reponseTartibQuest[0]->reponse_option_to_order_6!=$reponseTartibQuest[0]->correct_order_6){
						$isAnsweredWrong=false;

					}

					if($isAnsweredWrong==true){
						$noteFinale+=$questTartibQuest[0]->points;
						$data = array(
							'note_by_teacher'  => $questTartibQuest[0]->points
						);
						$this->db->where('id', $reponseTartibQuest[0]->id);
						$this->db->update('response_question_tartib', $data);

					}else{
						$data = array(
							'note_by_teacher'  => "0"
						);
						$this->db->where('id', $reponseTartibQuest[0]->id);
						$this->db->update('response_question_tartib', $data);
					}
				}

			}




			// correct Span words
			$listQuestSpan=array();
			$this->db->select();
			$this->db->from('exam_quest_span_junction');
			$this->db->where('exam_quest_span_junction.exam_id',$idExam);
			$query = $this->db->get();
			$listQuestSpan= $query->result();

			foreach ($listQuestSpan as $spanQuest){
				$reponseSpanQuest=array();
				$this->db->select();
				$this->db->from('response_question_span');
				$this->db->where('response_question_span.exam_id',$idExam);
				$this->db->where('response_question_span.question_span_id',$spanQuest->quest_span_id);
				$this->db->order_by("response_question_span.id", "desc");
				$this->db->limit(1);
				$query = $this->db->get();
				$reponseSpanQuest= $query->result();

				//get Question
				$this->db->select();
				$this->db->from('question_span');
				$this->db->where('question_span.id',$spanQuest->quest_span_id);
				$this->db->limit(1);
				$query = $this->db->get();
				$questSpanQuest= $query->result();
				//make correction
				if(!empty($questSpanQuest) & !empty($reponseSpanQuest)){
					//make array of answers
					$isAnsweredWrong=true;
					$trimedAndReplaced=str_replace("¤","",$reponseSpanQuest[0]->correct_span);
					$trimedAndReplaced=preg_replace("/\s+/", "", $trimedAndReplaced);
					$trimedAndReplaced=str_replace("&nbsp;","",$trimedAndReplaced);
					$trimedAndReplacedCorrection=str_replace(" ","",$trimedAndReplaced);

					$trimedAndReplacedReponse=preg_replace("/\s+/", "", $reponseSpanQuest[0]->reponse_span);
					$trimedAndReplacedReponse=str_replace("&nbsp;","",$trimedAndReplacedReponse);
					$trimedAndReplacedReponse=str_replace(" ","",$trimedAndReplacedReponse);
					if($trimedAndReplacedReponse!=$trimedAndReplacedCorrection){
						$isAnsweredWrong=false;

					}

					if($isAnsweredWrong==true){
						$noteFinale+=$questSpanQuest[0]->points;
						$data = array(
							'note_by_teacher'  => $questSpanQuest[0]->points
						);
						$this->db->where('id', $reponseSpanQuest[0]->id);
						$this->db->update('response_question_span', $data);

					}else{
						$data = array(
							'note_by_teacher'  => "0"
						);
						$this->db->where('id', $reponseSpanQuest[0]->id);
						$this->db->update('response_question_span', $data);
					}
				}

			}


			//$noteFinale+=$questSpanQuest[0]->points;

			$this->db->distinct();
			$this->db->select();
			$this->db->from('response_exam');
			$this->db->where('response_exam.exam_id',$idExam);
			$this->db->where('response_exam.student_id',$idStudent);
			$this->db->order_by("response_exam.date_created", "desc");
			$this->db->limit(1);
			$query = $this->db->get();
			$responseExam= $query->result();
			$data = array(
				'note_by_teacher'  => $noteFinale
			);
			$this->db->where('id', $responseExam[0]->id);
			$this->db->update('response_exam', $data);

		}

	}

	public function showCorrectionTostudents()
	{
		$idExam=$this->input->post('exam_id');


			$data['exam_id']=$idExam;
				//check show all results
			$data = array(
				'show_results'  => true
			);
			$this->db->where('id', $idExam);
			$this->db->update('exams', $data);


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
