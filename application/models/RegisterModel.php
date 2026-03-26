<?php
class RegisterModel extends CI_Model
{
	function insert($data)
	{
		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}
	function insertStudent($data)
	{
		$this->db->insert('students', $data);
		return $this->db->insert_id();
	}
	function insertTeacher($data)
	{
		$this->db->insert('teachers', $data);
		return $this->db->insert_id();
	}

	function verify_email($key)
	{
		$this->db->where('verification_key', $key);
		$this->db->where('is_email_verified', 'no');
		$query = $this->db->get('codeigniter_register');
		if($query->num_rows() > 0)
		{
			$data = array(
				'is_email_verified'  => 'yes'
			);
			$this->db->where('verification_key', $key);
			$this->db->update('codeigniter_register', $data);
			return true;
		}
		else
		{
			return false;
		}
	}
}

?>
