<?php
	
	set_time_limit(0);
	
	require 'db.php';
	
	function update_table_status($table, $id)
	{
		$query = "UPDATE $table SET status=1 WHERE id = " . $id;
		mysql_query($query);
	}
	
	function insert_in_questions($id, $chapter_id, $question)
	{
		$sql = "INSERT IGNORE INTO
					questions 
				SET 
					id='$id',
					chapter_id='$chapter_id', 
					added_by = 1,
					description='$question', 
					qtype='objective', 
					marks='1'";
		mysql_query($sql);
	}
	
	function insert_in_option($question_id, $option, $correct_answer)
	{
		$sql = "INSERT 
					question_options 
				SET 
					question_id='$question_id', 
					description='$option', 
					correct_answer='$correct_answer', 
					marks='1'";
		mysql_query($sql);
		
		$last_id = mysql_insert_id();
	}
	
	function move_question()
	{
		$dataset = array();
		$sql = "SELECT * FROM question  WHERE status = 0 limit 5000";
		$obj = mysql_query($sql);
		while ($res = mysql_fetch_assoc($obj)) {
			$id = $res['id'];
			$chapter_id = $res['chapter_id'];
			$description = mysql_real_escape_string($res['question']);
			$option1 = mysql_real_escape_string($res['option1']);
			$option2 = mysql_real_escape_string($res['option2']);
			$option3 = mysql_real_escape_string($res['option3']);
			$option4 = mysql_real_escape_string($res['option4']);
			$answer = $res['answer'];
			
			insert_in_questions($id, $chapter_id, $description);
			
			$correct_answer = 'n';
			if ($answer == 1) {
				$correct_answer = 'y';
			}
			insert_in_option($id, $option1, $correct_answer);
			
			$correct_answer = 'n';
			if ($answer == 2) {
				$correct_answer = 'y';
			}
			insert_in_option($id, $option2, $correct_answer);
			
			$correct_answer = 'n';
			if ($answer == 3) {
				$correct_answer = 'y';
			}
			insert_in_option($id, $option3, $correct_answer);
			
			$correct_answer = 'n';
			if ($answer == 4) {
				$correct_answer = 'y';
			}
			insert_in_option($id, $option4, $correct_answer);
			
			update_table_status('question', $id);			
		}
	}
	
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
	
	move_question();
	
	echo "Execution Successfull.";
	
	
?>