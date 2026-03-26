<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

public function __construct()
{
parent::__construct();
if($this->session->userdata('id'))
{
	$data['title'] = 'Yahia MAS';
	redirect('index',$data);
}
$this->load->library('form_validation');
$this->load->library('encryption');
$this->load->model('registerModel');
}

function index()
	{
		$data['title'] = 'Registration';
		$this->load->view('security/register',$data);
	}

function validation()
	{
	$this->form_validation->set_rules('user_name', 'Name', 'required|trim');
	$this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email|is_unique[users.email]');
	$this->form_validation->set_rules('user_password', 'Password', 'required');
	$this->form_validation->set_rules('user_type', 'User Type', 'required');
	$userType=$this->input->post('user_type');
	$userLevel='';
	if(isset($userType) and $userType=='teacher'){
		$userLevel='ROLE_TEACHER';
	}
	if(isset($userType) and $userType=='student'){
		$userLevel='ROLE_STUDENT';
	}
	if(isset($userType) and $userType=='admin'){
		$userLevel='ROLE_ADMIN';
	}

	if($this->form_validation->run())
	{
		try {

			$verification_key = md5(rand());
			$encrypted_password = $this->encryption->encrypt($this->input->post('user_password'));
			$data = array(
				'user_level'  => $userLevel,
				'name'  => $this->input->post('user_name'),
				'email'  => $this->input->post('user_email'),
				'password' => $encrypted_password,
				'verification_key' => $verification_key
			);
			$id = $this->registerModel->insert($data);
		} catch (Exception $e) {
			$this->session->set_flashdata('error', 'Problem registering :'.$e->getMessage());
			$data['title'] = 'Registration';
			$this->load->view('security/register',$data);
		}

			if($id > 0)
			{
				$data = array(
					'user_id'  => $id,
					'name'  => $this->input->post('user_name'),
					'email'  => $this->input->post('user_email'),
				);
				if($userLevel=='ROLE_STUDENT'){

					$idStudent = $this->registerModel->insertStudent($data);
					if($idStudent > 0)
					{
						$this->session->set_flashdata('success', 'You have been registered succesfully !');
						redirect('login');
					}else{
						$this->session->set_flashdata('error', 'Problem registering student');
					}
				}elseif ($userLevel=='ROLE_TEACHER'){
					$idTeacher = $this->registerModel->insertTeacher($data);
					if($idTeacher > 0)
					{
						$this->session->set_flashdata('success', 'You have been registered succesfully !');
						redirect('login');
					}else{
						$this->session->set_flashdata('error', 'Problem registering student');
					}
				}


			}
	}
	else
	{
		$this->session->set_flashdata('error', 'Error Form');
		$data['title'] = 'Registration';
		$data['title'] = 'Registration';
		$this->load->view('security/register',$data);
		//redirect('login');
		//$this->load->view('security/register',$data);
	}
	}

function verify_email()
	{
	if($this->uri->segment(3))
	{
	$verification_key = $this->uri->segment(3);
	if($this->register_model->verify_email($verification_key))
		{
		$data['message'] = '<h1 align="center">Your Email has been successfully verified, now you can login from <a href="'.base_url().'login">here</a></h1>';
		}
	else
		{
		$data['message'] = '<h1 align="center">Invalid Link</h1>';
		}
	$this->load->view('email_verification', $data);
	}
	}

	}

?>
