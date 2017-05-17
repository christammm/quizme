<?php session_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class quizmodel extends CI_Model {

	public function getQuestions(){
	
        /*
		$this->db->select("id, set_id, question, choice1, choice2, choice3, choice4");
		$this->db->from("questions");
        $query = $this->db->get();
        */
        $set_id = $_SESSION['set_id'];
        $query = $this->db->query("SELECT * FROM questions WHERE set_id = " . $set_id);
		
		
		return $query->result();
		
		$num_data_returned = $query->num_rows;
		
		if ($num_data_returned < 1) {
		  echo "There is no data in the database";
		  exit();	
		}
	}
}

