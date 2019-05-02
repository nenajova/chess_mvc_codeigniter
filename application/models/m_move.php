<?php

class M_move extends CI_Model {
	
	public function add_new($data) {
		/*$new_user_insert_data = array(
			'username' => $this->input->post('form_username'),
			'password' => md5($this->input->post('form_password')),
			//'password' => $this->input->post('form_password'),
			'email' => $this->input->post('form_email')
		);*/
		$insert = $this->db->insert('move', $data);
		return $insert;
	}

	public function get_by_match_id($matchid)
	{
		$result = false;
		$q = $this
			-> db
			-> where ('match_id', $matchid)
			-> order_by ('id', 'desc')
			-> get ('move');
		foreach($q->result_array() as $row) {
				$result[] = $row;
		}
		$q->free_result();
		return $result;
	}

	
}

