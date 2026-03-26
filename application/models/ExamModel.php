<?php
class ExamModel extends CI_Model
{

	function add_exam($titleExam,$durationExam,$teacherID, $categoryId,$allowScreenRecord,$allowCameraRecord,$randomQuestions,$remakeExam)
	{

		$data['title_exam']=$titleExam;
		$data['duration_exam']=$durationExam;
		$data['teacher_id']=$teacherID;
		$data['categorie_id']=$categoryId;
		$data['allow_screen_record']=$allowScreenRecord;
		$data['allow_camera_record']=$allowCameraRecord;
		$data['random_questions']=$randomQuestions;
		$data['no_remake_exam']=$remakeExam;
		$this->db->insert('exams', $data);
		$idExam=$this->db->insert_id();

		$dataJunction['teacher_id']=$teacherID;
		$dataJunction['exam_id']=$this->db->insert_id();
		$this->db->insert('exams_teachers_junction', $dataJunction);

		return $idExam;
	}

	function add_data_choices($userID, $title,$timepick,$CheckUnique,$option1,$correctOption1,$option2,$correctOption2,$option3,$correctOption3,$option4,$correctOption4,$option5,$correctOption5,$option6,$correctOption6,$fileUrl,$points,$image,$dataFile,$noSpecificTime)
	{

		$data['user_id']=$userID;
		$data['title']=$title;
		$data['duration']=$timepick;
		if(isset($CheckUnique) & $CheckUnique=='single'){
			$data['is_single_choice']=1;
		}else{
			$data['is_single_choice']=0;
		}

		$data['option_1']=$option1;
		$data['correct_option_1']=$correctOption1;
		$data['option_2']=$option2;
		$data['correct_option_2']=$correctOption2;
		$data['option_3']=$option3;
		$data['correct_option_3']=$correctOption3;
		$data['option_4']=$option4;
		$data['correct_option_4']=$correctOption4;
		$data['option_5']=$option5;
		$data['correct_option_5']=$correctOption5;
		$data['option_6']=$option6;
		$data['correct_option_6']=$correctOption6;
		$data['file_url']=$fileUrl;
		$data['points']=$points;
		if($image!=null){
			$data['image']=$image;
		}
		$data['data_file']=$dataFile;
		$data['no_specific_time']=$noSpecificTime;
		$this->db->insert('question_multi_choice', $data);
		return $this->db->insert_id();
	}

	function add_mutli_choice_junction($questId, $examId)
	{

		$data['quest_multi_id']=$questId;
		$data['exam_id']=$examId;
		$this->db->insert('exam_quest_multi_junction', $data);
		return 'ok';
	}

	function add_data_long_text($userID, $title,$correct,$timepick,$fileUrl,$points,$image,$noSpecificTime)
	{

		$data['user_id']=$userID;
		$data['title']=$title;
		$data['correct_long_text']=$correct;
		$data['duration']=$timepick;
		$data['file_url']=$fileUrl;
		$data['points']=$points;
		if($image!=null){
			$data['image']=$image;
		}
		$data['no_specific_time']=$noSpecificTime;
		$this->db->insert('question_long_text', $data);
		return $this->db->insert_id();
	}

	function add_long_text_junction($questId, $examId)
	{

		$data['quest_long_text_id']=$questId;
		$data['exam_id']=$examId;
		$this->db->insert('exam_quest_long_text_junction', $data);
		return 'ok';
	}
	function add_data_tawsil($userID, $title,$timepick,$option1,$linkOption1,$option2,$linkOption2,$option3,$linkOption3,$option4,$linkOption4,$option5,$linkOption5,$option6,$linkOption6,$fileUrl,$points,$image,$noSpecificTime)
	{

		$data['user_id']=$userID;
		$data['title']=$title;
		$data['duration']=$timepick;

		$data['option_1']=$option1;
		$data['link_option_1']=$linkOption1;
		$data['option_2']=$option2;
		$data['link_option_2']=$linkOption2;
		$data['option_3']=$option3;
		$data['link_option_3']=$linkOption3;
		$data['option_4']=$option4;
		$data['link_option_4']=$linkOption4;
		$data['option_5']=$option5;
		$data['link_option_5']=$linkOption5;
		$data['option_6']=$option6;
		$data['link_option_6']=$linkOption6;
		$data['file_url']=$fileUrl;
		$data['points']=$points;
		if($image!=null){
			$data['image']=$image;
		}
		$data['no_specific_time']=$noSpecificTime;
		$this->db->insert('question_tawsil', $data);
		return $this->db->insert_id();
	}

	function add_tawsil_junction($questId, $examId)
	{

		$data['quest_tawsil_id']=$questId;
		$data['exam_id']=$examId;
		$this->db->insert('exam_quest_tawsil_junction', $data);
		return 'ok';
	}
	function add_data_tartib($userID, $title,$timepick,$option1,$option2,$option3,$option4,$option5,$option6,$fileUrl,$points,$image,$noSpecificTime)
	{

		$data['user_id']=$userID;
		$data['title']=$title;
		$data['duration']=$timepick;

		$data['option_to_order_1']=$option1;
		$data['option_to_order_2']=$option2;
		$data['option_to_order_3']=$option3;
		$data['option_to_order_4']=$option4;
		$data['option_to_order_5']=$option5;
		$data['option_to_order_6']=$option6;
		$data['file_url']=$fileUrl;
		$data['points']=$points;
		if($image!=null){
			$data['image']=$image;
		}
		$data['no_specific_time']=$noSpecificTime;
		$this->db->insert('question_tartib', $data);
		return $this->db->insert_id();
	}
	function add_tartib_junction($questId, $examId)
	{

		$data['quest_tartib_id']=$questId;
		$data['exam_id']=$examId;
		$this->db->insert('exam_quest_tartib_junction', $data);
		return 'ok';
	}


	function add_data_span($userID, $title,$textSpan,$words,$timepick,$fileUrl,$points,$image,$noSpecificTime)
	{

		$data['user_id']=$userID;
		$data['title']=$title;
		$data['span_text']=$textSpan;
		$data['words']=$words;
		$data['duration']=$timepick;
		$data['file_url']=$fileUrl;
		$data['points']=$points;
		if($image!=null){
			$data['image']=$image;
		}
		$data['no_specific_time']=$noSpecificTime;

		$this->db->insert('question_span', $data);
		return $this->db->insert_id();
	}

	function add_span_junction($questId, $examId)
	{

		$data['quest_span_id']=$questId;
		$data['exam_id']=$examId;
		$this->db->insert('exam_quest_span_junction', $data);
		return 'ok';
	}
	public function isDuplicateExamTeacherJunction($data)
	{
		$sql = "SELECT teacher_id, exam_id
    FROM exams_teachers_junction
    WHERE teacher_id = ? AND exam_id = ? 
    ";
		$query = $this->db->query($sql, array($data['teacher_id'], $data['exam_id']));
		//$query->result();

		//If there are rows, means this review is duplicated
		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function add_category($categoryName)
	{

		$data['name']=$categoryName;
		$this->db->insert('categories', $data);
		$idCategory=$this->db->insert_id();
		return $idCategory;
	}
	function approve_teacher($idTeacher)
	{

		$data['approved_by_admin']=true;
		$this->db->where('id', $idTeacher);
		$this->db->update('teachers', $data);
		return $idTeacher;
	}
	function no_approve_teacher($idTeacher)
	{

		$data['approved_by_admin']=false;
		$this->db->where('id', $idTeacher);
		$this->db->update('teachers', $data);
		return $idTeacher;
	}

	function add_affectation_student_exam($idStudent,$idExam)
	{


		$dataJunction['student_id']=$idStudent;
		$dataJunction['exam_id']=$idExam;
		$this->db->insert('student_exam_junction', $dataJunction);


		return $idExam;
	}

	function add_affectation_student_teacher($idStudent,$idTeacher)
	{

		$dataJunction2['student_id']=$idStudent;
		$dataJunction2['teacher_id']=$idTeacher;
		$this->db->insert('student_teacher_junction', $dataJunction2);
		return $idTeacher;
	}
	function add_hash_url($idStudent,$idExam,$idTeacher,$hash)
	{


		$dataHash['student_id']=$idStudent;
		$dataHash['exam_id']=$idExam;
		$dataHash['teacher_id']=$idTeacher;
		$dataHash['hash']=$hash;
		$this->db->insert('hash_url_exam', $dataHash);


		return $this->db->insert_id();
	}


	function edit_exam($idExam,$titleExam,$durationExam,$teacherID, $categoryId,$allowScreenRecord,$allowCameraRecord,$randomQuestions,$remakeExam)
	{

		$data['title_exam']=$titleExam;
		$data['duration_exam']=$durationExam;
		$data['teacher_id']=$teacherID;
		$data['categorie_id']=$categoryId;
		$data['allow_screen_record']=$allowScreenRecord;
		$data['allow_camera_record']=$allowCameraRecord;
		$data['random_questions']=$randomQuestions;
		$data['no_remake_exam']=$remakeExam;
		/*$this->db->insert('exams', $data);
		$idExam=$this->db->insert_id();*/
/*
		$dataJunction['teacher_id']=$teacherID;
		$dataJunction['exam_id']=$this->db->insert_id();
		$this->db->insert('exams_teachers_junction', $dataJunction);*/

		$this->db->where('id', $idExam);
		$this->db->update('exams', $data);
		return $idExam;
	}

	function update_data_choices($idQuestionChoices,$userID, $title,$timepick,$CheckUnique,$option1,$correctOption1,$option2,$correctOption2,$option3,$correctOption3,$option4,$correctOption4,$option5,$correctOption5,$option6,$correctOption6,$fileUrl,$points,$image,$noSpecificTime)
	{

		$data['user_id']=$userID;
		$data['title']=$title;
		$data['duration']=$timepick;
		if(isset($CheckUnique) & $CheckUnique=='single'){
			$data['is_single_choice']=1;
		}else{
			$data['is_single_choice']=0;
		}

		$data['option_1']=$option1;
		$data['correct_option_1']=$correctOption1;
		$data['option_2']=$option2;
		$data['correct_option_2']=$correctOption2;
		$data['option_3']=$option3;
		$data['correct_option_3']=$correctOption3;
		$data['option_4']=$option4;
		$data['correct_option_4']=$correctOption4;
		$data['option_5']=$option5;
		$data['correct_option_5']=$correctOption5;
		$data['option_6']=$option6;
		$data['correct_option_6']=$correctOption6;
		$data['file_url']=$fileUrl;
		$data['points']=$points;
		if($image!=null){
			$data['image']=$image;
		}
		$data['no_specific_time']=$noSpecificTime;
		/*$this->db->insert('question_multi_choice', $data);
		return $this->db->insert_id();*/

		$this->db->where('id', $idQuestionChoices);
		$this->db->update('question_multi_choice', $data);
		return $idQuestionChoices;
	}

	function update_data_long_text($idQuestionLong,$userID, $title,$correct,$timepick,$fileUrl,$points,$image,$noSpecificTime)
	{

	$data['user_id']=$userID;
	$data['title']=$title;
	$data['correct_long_text']=$correct;
	$data['duration']=$timepick;
	$data['file_url']=$fileUrl;
	$data['points']=$points;
	if($image!=null){
		$data['image']=$image;
	}
		$data['no_specific_time']=$noSpecificTime;
	/*$this->db->insert('question_long_text', $data);
	return $this->db->insert_id();*/
		$this->db->where('id', $idQuestionLong);
		$this->db->update('question_long_text', $data);
		return $idQuestionLong;
	}

	function update_data_tawsil($idQuestionTawsil,$userID, $title,$timepick,$option1,$linkOption1,$option2,$linkOption2,$option3,$linkOption3,$option4,$linkOption4,$option5,$linkOption5,$option6,$linkOption6,$fileUrl,$points,$image,$noSpecificTime)
	{

		$data['user_id']=$userID;
		$data['title']=$title;
		$data['duration']=$timepick;

		$data['option_1']=$option1;
		$data['link_option_1']=$linkOption1;
		$data['option_2']=$option2;
		$data['link_option_2']=$linkOption2;
		$data['option_3']=$option3;
		$data['link_option_3']=$linkOption3;
		$data['option_4']=$option4;
		$data['link_option_4']=$linkOption4;
		$data['option_5']=$option5;
		$data['link_option_5']=$linkOption5;
		$data['option_6']=$option6;
		$data['link_option_6']=$linkOption6;
		$data['file_url']=$fileUrl;
		$data['points']=$points;
		if($image!=null){
			$data['image']=$image;
		}
		$data['no_specific_time']=$noSpecificTime;
		/*$this->db->insert('question_tawsil', $data);
		return $this->db->insert_id();*/
		$this->db->where('id', $idQuestionTawsil);
		$this->db->update('question_tawsil', $data);
		return $idQuestionTawsil;
	}

	function update_data_tartib($idQuestionTartib,$userID, $title,$timepick,$option1,$option2,$option3,$option4,$option5,$option6,$fileUrl,$points,$image,$noSpecificTime)
	{

		$data['user_id']=$userID;
		$data['title']=$title;
		$data['duration']=$timepick;

		$data['option_to_order_1']=$option1;
		$data['option_to_order_2']=$option2;
		$data['option_to_order_3']=$option3;
		$data['option_to_order_4']=$option4;
		$data['option_to_order_5']=$option5;
		$data['option_to_order_6']=$option6;
		$data['file_url']=$fileUrl;
		$data['points']=$points;
		if($image!=null){
			$data['image']=$image;
		}
		$data['no_specific_time']=$noSpecificTime;
		/*$this->db->insert('question_tartib', $data);
		return $this->db->insert_id();*/
		$this->db->where('id', $idQuestionTartib);
		$this->db->update('question_tartib', $data);
		return $idQuestionTartib;
	}

	function update_data_span($idQuestionSpan,$userID, $title,$textSpan,$words,$timepick,$fileUrl,$points,$image,$noSpecificTime)
	{

		$data['user_id']=$userID;
		$data['title']=$title;
		$data['span_text']=$textSpan;
		$data['words']=$words;
		$data['duration']=$timepick;
		$data['file_url']=$fileUrl;
		$data['points']=$points;
		if($image!=null){
			$data['image']=$image;
		}
		$data['no_specific_time']=$noSpecificTime;
		/*$this->db->insert('question_span', $data);
		return $this->db->insert_id();*/
		$this->db->where('id', $idQuestionSpan);
		$this->db->update('question_span', $data);
		return $idQuestionSpan;
	}
	public function isAllowed($data)
	{
		$sql = "SELECT id
				FROM hash_url_exam
				WHERE exam_id = ? and teacher_id= ? and hash= ?
				";
		$query = $this->db->query($sql, array( $data['exam_id'],$data['id_teacher'], $data['hash']));
		//$query->result();

		//If there are rows, means this review is duplicated
		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	public function isHashedOnce($data)
	{
		$sql = "SELECT id
    FROM hash_url_exam
    WHERE student_id = ? AND exam_id = ? and teacher_id= ? and hash= ?
    ";
		$query = $this->db->query($sql, array($data['student_id'], $data['exam_id'],$data['id_teacher'], $data['hash']));
		//$query->result();

		//If there are rows, means this review is duplicated
		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function isDuplicateAffectationStudentExam($data)
	{
		$sql = "SELECT student_id, exam_id
    FROM student_exam_junction
    WHERE student_id = ? AND exam_id = ? 
    ";
		$query = $this->db->query($sql, array($data['student_id'], $data['exam_id']));
		//$query->result();

		//If there are rows, means this review is duplicated
		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function isDuplicateAffectationStudentTeacher($data)
	{
		$sql = "SELECT student_id, teacher_id
    FROM student_teacher_junction
    WHERE student_id = ? AND teacher_id = ? 
    ";
		$query = $this->db->query($sql, array($data['student_id'], $data['id_teacher']));
		//$query->result();

		//If there are rows, means this review is duplicated
		if($query->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}

?>
