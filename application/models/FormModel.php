<?php
class FormModel extends CI_Model
{

	function change_pass($session_id,$new_pass,$verificationKey,$encryptedPass)
	{
		$curren_time=new DateTime("now", new DateTimeZone("Asia/Riyadh"));
		$curren_time=$curren_time->format("Y-m-d");



		$update_pass=$this->db->query("UPDATE users set password='$encryptedPass' , verification_key ='$verificationKey' , date_updated ='$curren_time'  where id='$session_id'");

	}

	function change_email_username($session_id,$email,$userName)
	{

		$data['email']=$email;
		$data['name']=$userName;
		$this->db->where('id', $session_id);
		$this->db->update('users', $data);
		return $session_id;
	}
	function change_image($session_id,$fileName)
	{

		$data['image']=$fileName;
		$this->db->where('id', $session_id);
		$this->db->update('users', $data);
		return $session_id;
	}
}

?>
