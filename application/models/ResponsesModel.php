<?php
class ResponsesModel extends CI_Model
{

	function insert_options_choices($userID,$teacherID,$studentID, $questID,$examID,$responseOption1,$responseOption2,$responseOption3,$responseOption4,$responseOption5,$responseOption6)
	{

		$data['user_id']=$userID;
		$data['teacher_id']=$teacherID;
		$data['student_id']=$studentID;
		$data['question_multi_id']=$questID;
		$data['exam_id']=$examID;
		$data['response_option_1']=$responseOption1;
		$data['response_option_2']=$responseOption2;
		$data['response_option_3']=$responseOption3;
		$data['response_option_4']=$responseOption4;
		$data['response_option_5']=$responseOption5;
		$data['response_option_6']=$responseOption6;

		$this->db->insert('response_question_multi_choice', $data);
		return $this->db->insert_id();
	}

	function insert_long_text($userID,$teacherID,$studentID, $questID,$examID,$correctText,$responseText)
	{

		$data['user_id']=$userID;
		$data['teacher_id']=$teacherID;
		$data['student_id']=$studentID;
		$data['question_long_id']=$questID;
		$data['exam_id']=$examID;
		$data['reponse_long_text']=$responseText;
		$data['correct_long_text']=$correctText;

		$this->db->insert('response_question_long_text', $data);
		return $this->db->insert_id();
	}
	function insert_tawsil($userID,$teacherID,$studentID, $questID,$examID,$option1,$responseOption1,$option2,$responseOption2,$option3,$responseOption3,$option4,$responseOption4,$option5,$responseOption5,$option6,$responseOption6)
	{

		$data['user_id']=$userID;
		$data['teacher_id']=$teacherID;
		$data['student_id']=$studentID;
		$data['question_tawsil_id']=$questID;
		$data['exam_id']=$examID;
		$data['response_option_1']=$responseOption1;
		$data['correct_option_1']=$option1;
		$data['response_option_2']=$responseOption2;
		$data['correct_option_2']=$option2;
		$data['response_option_3']=$responseOption3;
		$data['correct_option_3']=$option3;
		$data['response_option_4']=$responseOption4;
		$data['correct_option_4']=$option4;
		$data['response_option_5']=$responseOption5;
		$data['correct_option_5']=$option5;
		$data['response_option_6']=$responseOption6;
		$data['correct_option_6']=$option6;

		$this->db->insert('response_question_tawsil', $data);
		return $this->db->insert_id();
	}

	function insert_tartib($userID,$teacherID,$studentID, $questID,$examID,$option1,$responseOption1,$option2,$responseOption2,$option3,$responseOption3,$option4,$responseOption4,$option5,$responseOption5,$option6,$responseOption6)
	{

		$data['user_id']=$userID;
		$data['teacher_id']=$teacherID;
		$data['student_id']=$studentID;
		$data['question_tartib_id']=$questID;
		$data['exam_id']=$examID;
		$data['reponse_option_to_order_1']=$responseOption1;
		$data['correct_order_1']=$option1;
		$data['reponse_option_to_order_2']=$responseOption2;
		$data['correct_order_2']=$option2;
		$data['reponse_option_to_order_3']=$responseOption3;
		$data['correct_order_3']=$option3;
		$data['reponse_option_to_order_4']=$responseOption4;
		$data['correct_order_4']=$option4;
		$data['reponse_option_to_order_5']=$responseOption5;
		$data['correct_order_5']=$option5;
		$data['reponse_option_to_order_6']=$responseOption6;
		$data['correct_order_6']=$option6;

		$this->db->insert('response_question_tartib', $data);
		return $this->db->insert_id();
	}

	function mark_exam_as_passed($teacherID,$studentID,$examID,$fileScreen,$fileVideo)
	{

		$data['teacher_id']=$teacherID;
		$data['student_id']=$studentID;
		$data['exam_id']=$examID;
		$data['file_screen']=$fileScreen;
		$data['file_video']=$fileVideo;

		$this->db->insert('response_exam', $data);
		return $this->db->insert_id();
	}

	function insert_span($userID,$teacherID,$studentID, $questID,$examID,$correctText,$responseText)
	{

		$data['user_id']=$userID;
		$data['teacher_id']=$teacherID;
		$data['student_id']=$studentID;
		$data['question_span_id']=$questID;
		$data['exam_id']=$examID;
		$data['reponse_span']=$responseText;
		$data['correct_span']=$correctText;

		$this->db->insert('response_question_span', $data);
		return $this->db->insert_id();
	}
}

?>
