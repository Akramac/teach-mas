
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library("session");
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->library('upload');
		$this->load->helper('url');
		$this->load->model('loginModel');
		$this->load->model('FormModel');
	}

	function pageEditProfile(){
		$this->session->set_userdata('site_lang',  "english");
		$this->lang->load('ar','arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Edit Profile';
		$this->load->view('security/editProfile',$data);
	}
	function editProfile()
	{
		$this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email');
		$this->form_validation->set_rules('user_name', 'USer name', 'required');
		if($this->form_validation->run())
		{
			/*$config = array(
				'upload_path' => base_url().'assets/uploads',
				'allowed_types' => "gif|jpg|png|jpeg",
				'overwrite' => TRUE,
				'max_size' => "2048000" // Can be set to particular file size , here it is 2 MB(2048 Kb)
			);
			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('user_image'))
			{
				$error = array('error' => $this->upload->display_errors());
				var_dump($error);
				$this->load->view('index', $error);
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				var_dump('ok');
				$this->load->view('index', $data);
			}*/
			$session_id = $this->input->post('user_id');
			if($_FILES["user_image"]["name"]!=''){
				$rand = rand();
				$fileName = $rand.$_FILES["user_image"]["name"];
				$fileName = preg_replace("/\s+/", "", $fileName);
				$uploadDirectory = "assets/uploads/$fileName";
				if (!move_uploaded_file($_FILES["user_image"]["tmp_name"], $uploadDirectory)) {
					$this->session->set_flashdata('error','error uploading image ');

				}else{
					$this->FormModel->change_image($session_id,$fileName);
				}
				$this->db->where('id', $session_id);
				$query = $this->db->get('users');
				$image = $query->row()->image;
				$this->session->set_userdata('user_image',  $image);

			}


				$email = $this->input->post('user_email');
				$userName = $this->input->post('user_name');
				$session_id = $this->input->post('user_id');

				$this->FormModel->change_email_username($session_id,$email,$userName);
				$this->session->set_flashdata('success','Profile edited correctly !');

				$data['title'] = 'Yahia MAS';
				redirect('index');
		}
		else
		{
			$data['title'] = 'Yahia MAS';
			$this->session->set_flashdata('error','error Form');
			redirect('index',$data);
		}
	}


}

?>
