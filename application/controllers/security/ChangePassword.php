
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ChangePassword extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library("session");
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->helper('url');
		$this->load->model('loginModel');
		$this->load->model('FormModel');
	}

	function pageChangePassword(){
		$this->session->set_userdata('site_lang',  "english");
		$this->lang->load('ar','arabe');
		//$this->lang->load('en','english');
		$data['title'] = 'Change Password';
		$this->load->view('security/changePassword',$data);
	}
	function changePassword()
	{
		$this->form_validation->set_rules('user_email', 'Email Address', 'required|trim|valid_email');
		$this->form_validation->set_rules('user_old_password', 'Password', 'required');
		$this->form_validation->set_rules('user_new_password', 'Password', 'required');
		if($this->form_validation->run())
		{
			$result = $this->loginModel->can_login($this->input->post('user_email'), $this->input->post('user_old_password'));
			if($result == '')
			{
				$email = $this->input->post('user_email');
				$old_pass = $this->input->post('user_old_password');
				$new_pass = $this->input->post('user_new_password');
				$this->db->where('email', $email);
				$query = $this->db->get('users');
				$session_id = $query->row()->id;
				//change password
					$verification_key = md5(rand());
					$encrypted_password = $this->encryption->encrypt($new_pass);
					$this->FormModel->change_pass($session_id,$new_pass,$verification_key,$encrypted_password);
					$this->session->set_flashdata('success','Password change correctly !');


				$data['title'] = 'Yahia MAS';
				return $this->load->view('index',$data);
			}
			else
			{
				$data['title'] = 'Yahia MAS';
				$this->session->set_flashdata('error','error login '.$result);
				redirect('index',$data);
			}
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
