<?php
class LoginModel extends CI_Model
{
	function can_login($email, $password)
	{
		$this->db->where('email', $email);
		$query = $this->db->get('users');
		if($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				/*if($row->is_email_verified == true)
				{
					$store_password = $this->encryption->decrypt($row->password);
					if($password == $store_password)
					{
						$this->session->set_userdata('id', $row->id);
					}
					else
					{
						return 'Wrong Password';
					}
				}
				else
				{
					return 'First verified your email address';
				}*/
				$store_password = $this->encryption->decrypt($row->password);
				if($password == $store_password)
				{
					$this->session->set_userdata('id', $row->id);
				}
				else
				{
					return 'Wrong Password';
				}
			}
		}
		else
		{
			return 'Wrong Email Address';
		}
	}

	function getUserId() {
		$idUser=$this->session->userdata('id');
		$this->db->where( 'id', $idUser );
		$query = $this->db->get('users');
		return $query->row();
	}
}

?>
