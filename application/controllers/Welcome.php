<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		if(!$this->session->userdata('id'))
		{
			$data['title'] = 'Yahia MAS';
			redirect('login',$data);
		}
		$this->load->library('session');
	}
	public function index()
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


		//get images and title
		$this->db->select();
		$this->db->from('home_page');
		$this->db->limit(1);
		$query = $this->db->get();
		$homeResult=$query->result();
		$data['homePage']=$homeResult[0];


		if(!empty($userResult) ){
			$userLevel=$userResult[0]->user_level;
			if(isset($userLevel) and $userLevel=='ROLE_TEACHER'){
				$userType='Teacher';

				//get id student
				$this->db->select("teachers.id,teachers.approved_by_admin");
				$this->db->from('teachers');
				$this->db->where('teachers.user_id',$idUser);
				$query = $this->db->get();
				$teacherResult= $query->result();
				$idTeacher='';
				if(!empty($teacherResult)){
					$idTeacher=$teacherResult[0]->id;
				}
				// dont allow index unless approved
				$isApproved=$teacherResult[0]->approved_by_admin;
				if($isApproved!=true){
					$data['title'] = 'Yahia MAS';
					$user_data = $this->session->all_userdata();
					foreach ($user_data as $key => $value) {
						if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
							$this->session->unset_userdata($key);
						}
					}
					$this->session->sess_destroy();
					$this->session->set_flashdata('error','You are not approved by the admin !');

					$this->load->view('security/login',$data);
				}

				$data['idTeacher'] = $idTeacher;
				$this->session->set_userdata('idTeacher',  $idTeacher);
				$this->db->distinct();
				$this->db->select("students.id,students.name");
				$this->db->from('students');
				$this->db->join('student_teacher_junction','student_teacher_junction.student_id = students.id');
				$this->db->join('teachers', 'teachers.id = student_teacher_junction.teacher_id');
				$this->db->where('teachers.id',$idTeacher);
				$query = $this->db->get();
				$studentResult= $query->result();
				$data['students_by_teacher'] = $studentResult;
				//list of exams
				/*foreach ($studentResult as $student) {
					$this->db->select();
					$this->db->from('exams');
					$this->db->where('exams.teacher_id',$teach->id);
					$query = $this->db->get();
					$examsResult= $query->result();
					$data['exams_by_student'] = $examsResult;
				}*/

				$this->db->distinct();
				$this->db->select();
				$this->db->from('exams');
				$this->db->join('exams_teachers_junction','exams_teachers_junction.exam_id = exams.id');
				$this->db->join('teachers', 'teachers.id = exams_teachers_junction.teacher_id');
				$this->db->where('teachers.id',$idTeacher);
				$this->db->order_by("exams.date_created", "desc");
				$this->db->limit(4);
				$query = $this->db->get();
				$examsResult= $query->result();
				$data['exams_by_student'] = $examsResult;
			}
			if(isset($userLevel) and $userLevel=='ROLE_STUDENT'){
				$userType='Student';
				//get id student
				$this->db->select("students.id");
				$this->db->from('students');
				$this->db->join('users','students.user_id = users.id');
				$this->db->where('users.id',$idUser);
				$query = $this->db->get();
				$studentResult= $query->result();
				$idStudent='';
				if(!empty($studentResult)){
					$idStudent=$studentResult[0]->id;
				}
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
				$this->db->join('student_exam_junction', 'student_exam_junction.exam_id = exams.id');
				$this->db->where('student_exam_junction.student_id', $idStudent);
				$this->db->where_in('exams.teacher_id',$arrayTeachers);
				$this->db->limit(4);
				$this->db->order_by("exams.date_created", "desc");
				$query = $this->db->get();
				$examsResult= $query->result();
				$data['exams_by_student'] = $examsResult;

				$this->db->select('exams.id,exams.title_exam,response_exam.note_by_teacher');
				$this->db->from('exams');
				$this->db->join('student_exam_junction', 'student_exam_junction.exam_id = exams.id');
				$this->db->join('response_exam', 'response_exam.exam_id = exams.id');
				$this->db->where('student_exam_junction.student_id', $idStudent);
				$this->db->where_in('exams.teacher_id',$arrayTeachers);
				$this->db->limit(6);
				$this->db->order_by("exams.date_created", "desc");
				$query = $this->db->get();
				$examsResult= $query->result();
				$data['results_exam'] = $examsResult;


			}
			if(isset($userLevel) and $userLevel=='ROLE_ADMIN'){
				$userType='administrateur';
				redirect('admin/administration');
			}
			$data['user_type'] = $userType;
			$data['user_name'] = $userResult[0]->name;
			$data['user_email'] = $userResult[0]->email;
			$this->session->set_userdata('user_name',  $userResult[0]->name);
			$this->session->set_userdata('user_email',  $userResult[0]->email);
			$this->session->set_userdata('user_type_role',  $userType);
		}

		// get category
		$this->db->select();
		$this->db->from('categories');
		$this->db->limit(6);
		$query = $this->db->get();
		$allCategories= $query->result();
		$data['allCategories'] = $allCategories;

		// get category
		$this->db->select();
		$this->db->from('categories');
		$query = $this->db->get();
		$allCategories= $query->result();
		$data['allCategoriesList'] = $allCategories;

		$this->load->view('index',$data);
	}
	function logout()
	{
		$user_data = $this->session->all_userdata();
		foreach ($user_data as $key => $value) {
			if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
				$this->session->unset_userdata($key);
			}
		}
		$this->session->sess_destroy();
		redirect('login');
	}
	/*
		public function switchLang($language = "") {
			$this->session->set_userdata('site_lang', $language);
			header('Location: http://localhost/ci_multilingual_app/');
		}*/
}
