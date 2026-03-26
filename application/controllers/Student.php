<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

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
			if($userType!='ROLE_STUDENT'){
				$data['title'] = 'Yahia MAS';
				redirect('index',$data);
			}

		}else{
			$data['title'] = 'Yahia MAS';
			redirect('login',$data);
		}
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->model('responsesModel');
		$this->load->model('examModel');
	}
	public function studentExam($idExam='')
	{
		$this->session->set_userdata('site_lang',  "english");
		$this->lang->load('ar','arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page';

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
		$this->db->select('exams.teacher_id');
		$this->db->from('exams');
		$this->db->where('exams.id', $idExam);
		$query = $this->db->get();
		$idTeacher= $query->result();
		$data['idTeacher']='';
		if(!empty($idTeacher)){
			$idTeacher=$idTeacher[0]->teacher_id;
			$data['idTeacher'] =$idTeacher;
		}


		$this->db->select('exams.duration_exam,exams.allow_screen_record,exams.allow_camera_record,exams.random_questions');
		$this->db->from('exams');
		$this->db->where('exams.id', $idExam);
		$query = $this->db->get();
		$this->db->limit(1);
		$durationExam= $query->result();
		$data['durationExam']='';
		if(!empty($durationExam)){
			$data['durationExam'] =$durationExam[0]->duration_exam;
		}
		$data['allowScreenRecord']='';
		$data['allowCameraRecord']='';
		$data['randomQuestions']='';
		if(!empty($durationExam)){
			$data['allowScreenRecord'] =$durationExam[0]->allow_screen_record;
			$data['allowCameraRecord'] =$durationExam[0]->allow_camera_record;
			$data['randomQuestions'] =$durationExam[0]->random_questions;
		}


		$this->load->view('student/studentExam',$data);
	}

	public function studentListExam($idTeacher='')
	{
		$this->session->set_userdata('site_lang',  "english");
		$this->lang->load('ar','arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page';

		//list of categories
		$this->db->select();
		$this->db->from('categories');
		$this->db->limit(6);
		$query = $this->db->get();
		$allCategories= $query->result();
		$data['allCategories'] = $allCategories;
		// list of teachers by student

		$this->db->select("students.id");
		$this->db->from('students');
		$this->db->join('users','students.user_id = users.id');
		$this->db->where('users.id', $this->session->userdata('id'));
		$query = $this->db->get();
		$studentResult= $query->result();
		$idStudent='';
		if(!empty($studentResult)){
			$idStudent=$studentResult[0]->id;
			$data['idStudent'] = $idStudent;
		}
		$this->db->where('student_id', $idStudent);
		$query = $this->db->get('student_teacher_junction');
		$teacherStudentResult = $query->result();
		//$data['listTeachers']=$teacherStudentResult;
		$arrayTeachers=array('0');
		foreach ($teacherStudentResult as $teacher){
			$arrayTeachers[]=$teacher->teacher_id;
		}

		/*$this->db->select('e.name');
		$this->db->from('teachers e');
		$this->db->join('student_teacher_junction ue', 'ue.teacher_id = e.id');
		$this->db->where('ue.teacher_id', 2);
		$query = $this->db->get();*/
		if(!empty($arrayTeachers)){
			$this->db->select('teachers.name,teachers.id');
			$this->db->from('teachers');
			$this->db->join('student_teacher_junction', 'student_teacher_junction.teacher_id = teachers.id');
			$this->db->where_in('student_teacher_junction.teacher_id', $arrayTeachers);
			$this->db->distinct();
			$queryTeachersByStudent = $this->db->get()->result();
			$data['listTeachers']=$queryTeachersByStudent;
		}else{
			$data['listTeachers']=array();
		}

		//list of reponse exam by student
		$this->db->select();
		$this->db->distinct();
		$this->db->from('response_exam');
		$this->db->where('student_id', $idStudent);
		//$this->db->group_by('exam_id,student_id,teacher_id');
		$this->db->order_by("response_exam.date_created", "desc");
		$listreponsesExam = $this->db->get()->result();
		$data['listreponsesExam']=$listreponsesExam;

		if($idTeacher!='' & $idTeacher!='all'){
			$this->db->select();
			$this->db->from('exams');
			$this->db->join('student_exam_junction', 'student_exam_junction.exam_id = exams.id');
			$this->db->where('student_exam_junction.student_id', $idStudent);
			$this->db->where('teacher_id', $idTeacher);
			$this->db->order_by("exams.date_created", "desc");
			$examByTeacherResult = $this->db->get()->result();
			$data['listExams']=$examByTeacherResult;
		}elseif($idTeacher=='all' or $idTeacher=='' ){
			if(!empty($arrayTeachers)){
				$this->db->select();
				$this->db->from('exams');
				$this->db->join('student_exam_junction', 'student_exam_junction.exam_id = exams.id');
				$this->db->where('student_exam_junction.student_id', $idStudent);
				$this->db->where_in('teacher_id', $arrayTeachers);
				$this->db->order_by("exams.date_created", "desc");
				$examByTeacherResult = $this->db->get()->result();
				$data['listExams']=$examByTeacherResult;
			}else{
				$data['listExams']=array();
			}

		}
		$this->load->view('student/studentListExam',$data);
	}
	public function studentListExamByCategory($idCategory='')
	{
		$this->session->set_userdata('site_lang',  "english");
		$this->lang->load('ar','arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page';

		//list of categories
		$this->db->select();
		$this->db->from('categories');
		$this->db->limit(6);
		$query = $this->db->get();
		$allCategories= $query->result();
		$data['allCategories'] = $allCategories;
		// list of teachers by student

		$this->db->select("students.id");
		$this->db->from('students');
		$this->db->join('users','students.user_id = users.id');
		$this->db->where('users.id', $this->session->userdata('id'));
		$query = $this->db->get();
		$studentResult= $query->result();
		$idStudent='';
		if(!empty($studentResult)){
			$idStudent=$studentResult[0]->id;
			$data['idStudent'] = $idStudent;
		}
		$this->db->where('student_id', $idStudent);
		$query = $this->db->get('student_teacher_junction');
		$teacherStudentResult = $query->result();
		//$data['listTeachers']=$teacherStudentResult;
		$arrayTeachers=array('0');
		foreach ($teacherStudentResult as $teacher){
			$arrayTeachers[]=$teacher->teacher_id;
		}

		/*$this->db->select('e.name');
		$this->db->from('teachers e');
		$this->db->join('student_teacher_junction ue', 'ue.teacher_id = e.id');
		$this->db->where('ue.teacher_id', 2);
		$query = $this->db->get();*/
		if(!empty($arrayTeachers)){
			$this->db->select('teachers.name,teachers.id');
			$this->db->from('teachers');
			$this->db->join('student_teacher_junction', 'student_teacher_junction.teacher_id = teachers.id');
			$this->db->where_in('student_teacher_junction.teacher_id', $arrayTeachers);
			$this->db->distinct();
			$queryTeachersByStudent = $this->db->get()->result();
			$data['listTeachers']=$queryTeachersByStudent;
		}else{
			$data['listTeachers']=array();
		}


		if($idCategory!='' & $idCategory!='all'){

			if(!empty($arrayTeachers)){
				$this->db->select();
				$this->db->from('exams');
				$this->db->join('student_exam_junction', 'student_exam_junction.exam_id = exams.id');
				$this->db->where('student_exam_junction.student_id', $idStudent);
				$this->db->where_in('teacher_id', $arrayTeachers);
				$this->db->where('categorie_id ', $idCategory);
				$this->db->order_by("exams.date_created", "desc");

				$examByTeacherResult = $this->db->get()->result();
				$data['listExams']=$examByTeacherResult;
			}else{
				$data['listExams']=array();
			}

		}elseif($idCategory=='all' or $idCategory=='' ){
			if(!empty($arrayTeachers)){
				$this->db->select();
				$this->db->from('exams');
				$this->db->join('student_exam_junction', 'student_exam_junction.exam_id = exams.id');
				$this->db->where('student_exam_junction.student_id', $idStudent);
				$this->db->where_in('teacher_id', $arrayTeachers);
				$this->db->order_by("exams.date_created", "desc");

				$examByTeacherResult = $this->db->get()->result();
				$data['listExams']=$examByTeacherResult;
			}else{
				$data['listExams']=array();
			}

		}

		//get exams never taken
		$arrayneverTakenExam=array();
		foreach ($examByTeacherResult as $exam){
			$id_Exam=$exam->id;
			$this->db->distinct();
			$this->db->select();
			$this->db->from('response_exam');
			$this->db->where('response_exam.exam_id',$id_Exam);
			$this->db->where('response_exam.student_id',$idStudent);
			$this->db->where_in('response_exam.teacher_id', $arrayTeachers);
			$query = $this->db->get();
			$examsResponseResults= $query->result();
			$arrayneverTakenExam[$id_Exam]=count($examsResponseResults);

		}
		$data['arrayneverTakenExam']=$arrayneverTakenExam;


		//list of reponse exam by student
		$this->db->select();
		$this->db->distinct();
		$this->db->from('response_exam');
		$this->db->where('student_id', $idStudent);
		$this->db->group_by('exam_id');
		$this->db->order_by("response_exam.date_created", "desc");
		$listreponsesExam = $this->db->get()->result();
		$data['listreponsesExam']=$listreponsesExam;

		$this->load->view('student/studentListExam',$data);
	}

	public function studentaddExamToDB()
	{
		$this->session->set_userdata('site_lang', "english");
		$this->lang->load('ar', 'arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Student Page';

		$idUser=$this->session->userdata('id');
		// get id student
		$this->db->select("students.id");
		$this->db->from('students');
		$this->db->join('users','students.user_id = users.id');
		$this->db->where('users.id', $idUser);
		$query = $this->db->get();
		$studentResult= $query->result();
		$idStudent='';
		if(!empty($studentResult)){
			$idStudent=$studentResult[0]->id;
		}


		/*foreach ($_POST as $key => $value) {
			echo "<tr>";
			echo "<td>";
			echo $key;
			echo "</td>";
			echo "<td>";
			echo $value;
			echo "</td>";
			echo "</tr>";
		}*/
		$this->form_validation->set_rules('idExam', 'Exam Id', 'required');
		$this->form_validation->set_rules('idTeacher', 'Teacher Id', 'required');
		if($this->form_validation->run()) {
		foreach ($_POST as $key => $value) {
			$numbers = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
			$result = str_replace($numbers, "", $key);


			// get id teacher
			$this->db->select("exams.teacher_id");
			$this->db->from('exams');
			$this->db->where('exams.id', $this->input->post('idExam'));
			$query = $this->db->get();
			$teacherResult= $query->result();
			$idTeacher='';
			if(!empty($teacherResult)){
				$idTeacher=$teacherResult[0]->teacher_id;
			}
			switch ($result) {
				case 'select-options-cards-':
					if(!is_array($this->input->post($key))){
						$pieces = explode("-", $key);
						$idQuest=$pieces[3];
						$id = $this->responsesModel->insert_options_choices(
							$this->session->userdata('id'),
							$idTeacher,
							$idStudent,
							$idQuest,
							$this->input->post('idExam'),
							$this->input->post($key),
							$this->input->post($key),
							$this->input->post($key),
							$this->input->post($key),
							$this->input->post($key),
							$this->input->post($key));
					}else{
						$pieces = explode("-", $key);
						$idQuest=$pieces[3];
						$reponse1='';
						$reponse2='';
						$reponse3='';
						$reponse4='';
						$reponse4='';
						$reponse6='';
						$reponse1=$this->input->post($key)[0];
						if(count($this->input->post($key))>1){
							$reponse2=$this->input->post($key)[1];
						}
						if(count($this->input->post($key))>2){
							$reponse3=$this->input->post($key)[2];
						}
						if(count($this->input->post($key))>3){
							$reponse4=$this->input->post($key)[3];
						}
						if(count($this->input->post($key))>4){
							$reponse5=$this->input->post($key)[4];
						}
						if(count($this->input->post($key))>5){
							$reponse6=$this->input->post($key)[5];
						}


						$id = $this->responsesModel->insert_options_choices(
							$this->session->userdata('id'),
							$idTeacher,
							$idStudent,
							$idQuest,
							$this->input->post('idExam'),
							$reponse1,
							$reponse2,
							$reponse3,
							$reponse4,
							$reponse5,
							$reponse6);
					}

					break;
				case 'long-text-':
					$pieces = explode("-", $key);
					$idQuest=$pieces[2];

					// get id teacher
					$this->db->select();
					$this->db->from('question_long_text');
					$this->db->where('question_long_text.id', $idQuest);
					$query = $this->db->get();
					$questLongTextResult= $query->result();
					if(!empty($questLongTextResult)){
						$correctOption1=$questLongTextResult[0]->correct_long_text;


						$id = $this->responsesModel->insert_long_text(
							$this->session->userdata('id'),
							$idTeacher,
							$idStudent,
							$idQuest,
							$this->input->post('idExam'),
							$correctOption1,
							$this->input->post($key));

					}

					break;
				case 'tawsil-input-':
					$pieces = explode("-", $key);
					$idQuest=$pieces[2];

					// get id teacher
					$this->db->select();
					$this->db->from('question_tawsil');
					$this->db->where('question_tawsil.id', $idQuest);
					$query = $this->db->get();
					$questTawsilResult= $query->result();
					if(!empty($questTawsilResult)){
						$correctOption1=$questTawsilResult[0]->option_1;
						$correctOption2=$questTawsilResult[0]->option_2;
						$correctOption3=$questTawsilResult[0]->option_3;
						$correctOption4=$questTawsilResult[0]->option_4;
						$correctOption5=$questTawsilResult[0]->option_5;
						$correctOption6=$questTawsilResult[0]->option_6;
						// get order of choices
					$pieces = explode(";", $this->input->post($key));
						$option1=$pieces[1];
						$option2=$pieces[2];
						$option3=$pieces[3];
						$option4=$pieces[4];
						$option5=$pieces[5];
						$option6='';
						if(array_key_exists('6',$pieces)){
							$option6=$pieces[6];
						}


					$id = $this->responsesModel->insert_tawsil(
						$this->session->userdata('id'),
						$idTeacher,
						$idStudent,
						$idQuest,
						$this->input->post('idExam'),
						$correctOption1,
						$option1,
						$correctOption2,
						$option2,
						$correctOption3,
						$option3,
						$correctOption4,
						$option4,
						$correctOption5,
						$option5,
						$correctOption6,
						$option6);

					}

					break;
				case 'tartib-input-':

					$pieces = explode("-", $key);
					$idQuest=$pieces[2];

					// get id teacher
					$this->db->select();
					$this->db->from('question_tartib');
					$this->db->where('question_tartib.id', $idQuest);
					$query = $this->db->get();
					$questTartibResult= $query->result();
					if(!empty($questTartibResult)){
						$correctOption1=$questTartibResult[0]->option_to_order_1;
						$correctOption2=$questTartibResult[0]->option_to_order_2;
						$correctOption3=$questTartibResult[0]->option_to_order_3;
						$correctOption4=$questTartibResult[0]->option_to_order_4;
						$correctOption5=$questTartibResult[0]->option_to_order_5;
						$correctOption6=$questTartibResult[0]->option_to_order_6;
						// get order of choices
						$pieces = explode(";", $this->input->post($key));
						$option1=$pieces[1];
						$option2=$pieces[2];
						$option3=$pieces[3];
						$option4=$pieces[4];
						$option5=$pieces[5];
						$option6='';
						if(array_key_exists('6',$pieces)){
							$option6=$pieces[6];
						}


						$id = $this->responsesModel->insert_tartib(
							$this->session->userdata('id'),
							$idTeacher,
							$idStudent,
							$idQuest,
							$this->input->post('idExam'),
							$correctOption1,
							$option1,
							$correctOption2,
							$option2,
							$correctOption3,
							$option3,
							$correctOption4,
							$option4,
							$correctOption5,
							$option5,
							$correctOption6,
							$option6);

					}

					break;

				case 'input-text-with-words-span-':
					$pieces = explode("-", $key);
					$idQuest=$pieces[5];

					// get id teacher
					$this->db->select();
					$this->db->from('question_span');
					$this->db->where('question_span.id', $idQuest);
					$query = $this->db->get();
					$questSpanResult= $query->result();
					if(!empty($questSpanResult)){
						$correctOption1=$questSpanResult[0]->span_text;


						$id = $this->responsesModel->insert_span(
							$this->session->userdata('id'),
							$idTeacher,
							$idStudent,
							$idQuest,
							$this->input->post('idExam'),
							$correctOption1,
							$this->input->post($key));

					}

					break;

			}
		}
		// mark exam as passed
			$idPassedExam = $this->responsesModel->mark_exam_as_passed(
				$idTeacher,
				$idStudent,
				$this->input->post('idExam'),
				$this->input->post('screen-url-input'),
				$this->input->post('video-url-input')
			);
		}else
		{
			$this->session->set_flashdata('error', 'Error Form');
			$data['title'] = 'Registration';
			redirect('index');
			//$this->load->view('security/register',$data);
		}

		$this->session->set_flashdata('success', 'You have  registered your exam succesfully !');
		redirect('index');


	}

	public function studentResultExam($idExam='',$idStudent='')
	{

		$data['student_id']=$idStudent;
		$data['exam_id']=$idExam;
		$data['title'] = 'Student Page Result';


		// get data student and exam in one table

		$listQuestMulti=array();
		$this->db->select();
		$this->db->from('exam_quest_multi_junction');
		$this->db->where('exam_quest_multi_junction.exam_id',$idExam);
		$query = $this->db->get();
		$listQuestMulti= $query->result();
		$data['respones_multi_quest']=array();
		$data['quets_multi_quest']=array();

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
		}

		$this->load->view('student/studentResultExam.php',$data);


	}

	public function studentNotesExam($idExam='',$idStudent='')
	{

		$data['student_id']=$idStudent;
		$data['exam_id']=$idExam;
		$data['title'] = 'Student Page Result';


		// get data student and exam in one table

		$listQuestMulti=array();
		$this->db->select();
		$this->db->from('exam_quest_multi_junction');
		$this->db->where('exam_quest_multi_junction.exam_id',$idExam);
		$query = $this->db->get();
		$listQuestMulti= $query->result();
		$data['respones_multi_quest']=array();
		$data['quets_multi_quest']=array();

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
		}

		$this->load->view('student/studentNotesExam.php',$data);


	}
	public function activateExamUrl($idExam='',$idTeacher='',$hash='')
	{

		$idUser=$this->session->userdata('id');

		$this->db->select("students.id");
		$this->db->from('students');
		$this->db->join('users','students.user_id = users.id');
		$this->db->where('users.id', $idUser);
		$query = $this->db->get();
		$studentResult= $query->result();
		$idStudent='';
		if(!empty($studentResult)){
			$idStudent=$studentResult[0]->id;
		}
		$data['student_id']=$idStudent;
		$data['exam_id']=$idExam;
		$data['id_teacher']=$idTeacher;

		//check hash url
		$dataHash['hash']=$hash;
		$dataHash['student_id']=$idStudent;
		$dataHash['exam_id']=$idExam;
		$dataHash['id_teacher']=$idTeacher;
		$isAllowed = $this->examModel->isAllowed($dataHash);
		if(($isAllowed)){

				$this->db->select();
				$this->db->from('hash_url_exam');
				$this->db->where('hash_url_exam.teacher_id', $idTeacher);
				$this->db->where('hash_url_exam.exam_id', $idExam);
				$this->db->where('hash_url_exam.hash', $hash);
				$this->db->limit(1);
				$queryHash = $this->db->get();
				$hashResult= $queryHash->result();
				$idHash='';
				if(!empty($hashResult)){
					$idHash=$hashResult[0]->id;
					$concatStudents=$hashResult[0]->student_id;
				}
				if($concatStudents!=''){
					$dataHaash = array(
						'student_id'  => $concatStudents.';'.$idStudent,
						'used_once_by_student'  => true
					);
				}else{
					$dataHaash = array(
						'student_id'  => $idStudent,
						'used_once_by_student'  => true
					);
				}

				$this->db->where('id', $idHash);
				$this->db->update('hash_url_exam', $dataHaash);
				$this->session->set_flashdata('success', 'Exam added to your list !');
		}else{
			$this->session->set_flashdata('error', 'You are not allowed !');
			redirect('index');
		}

		//check duplicate
		$isDuplicated = $this->examModel->isDuplicateAffectationStudentExam($data);
		if(!($isDuplicated)){
			//Insert data into Review Table
			$resultAffectation = $this->examModel->add_affectation_student_exam(
				$idStudent,
				$idExam
			);
		}else{
			$this->session->set_flashdata('error', 'Exam already affected !');
			redirect('index');
		}
		$isDuplicated2 = $this->examModel->isDuplicateAffectationStudentTeacher($data);
		if(!($isDuplicated2)){
			//Insert data into Review Table
			$resultAffectation = $this->examModel->add_affectation_student_teacher(
				$idStudent,
				$idTeacher
			);
		}

		$this->session->set_flashdata('success', 'Exam  affected  succesfully!');
		redirect('student/list/exam-by-category');

	}
	public function saveVideo()
	{
		$fileName = $_POST["video-filename"];
		$uploadDirectory = "assets/uploads/$fileName";

		if (!move_uploaded_file($_FILES["video-blob"]["tmp_name"], $uploadDirectory)) {
			echo("problem moving uploaded file");
		}

		echo($uploadDirectory);
		$arrayStudents = $this->input->post('array_students');

	}

	public function saveScreenVideo()
	{
		$fileName = $_POST["video-filename"];
		$uploadDirectory = "assets/uploads/$fileName.webm";

		if (!move_uploaded_file($_FILES["video-blob"]["tmp_name"], $uploadDirectory)) {
			echo("problem moving uploaded file");
		}

		echo($uploadDirectory);
		$arrayStudents = $this->input->post('array_students');

	}
}
