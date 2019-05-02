<?php

class M_user extends CI_Model {
	
	public function add_new() {
		$new_user_insert_data = array(
			'username' => $this->input->post('form_username'),
			'password' => md5($this->input->post('form_password')),
			'join_time' => date('Y-m-d H:i:s'),
			'email' => $this->input->post('form_email')
		);
		$insert = $this->db->insert('user', $new_user_insert_data);
		return $insert;
	}

	public function inc_matches ($user_id) {
		$this->db->where('id', $user_id);
		$this->db->set('start_match', 'start_match+1', FALSE);
		$this->db->update('user'); 	
	}
	
	public function inc_moves ($username) {
		$this->db->where('username', $username);
		$this->db->set('move', 'move+1', FALSE);
		$this->db->update('user'); 	
	}
	
	public function inc_eat_figure ($eat) {
		$this->db->where('username', $this->session->userdata('username'));
		$find=''; $rep='';
		switch ($eat) {
			case 1 : $find = 'pawn_eat'; $rep = 'pawn_eat+1'; break;
			case 2 : $find = 'rook_eat'; $rep = 'rook_eat+1'; break;
			case 3 : $find = 'knight_eat'; $rep = 'knight_eat+1'; break;
			case 4 : $find = 'bishop_eat'; $rep = 'bishop_eat+1'; break;
			case 5 : $find = 'queen_eat'; $rep = 'queen_eat+1'; break;
			case 6 : $find = 'king_eat'; $rep = 'king_eat+1'; break;
		}
		
		$this->db->set('piece_eat', 'piece_eat+1', FALSE);
		
		$this->db->set($find, $rep, FALSE);
		$this->db->update('user'); 	
	}
	
	
	public function inc_lost_figure ($eat, $opponent_id) {
		$this->db->where('id', $opponent_id);
		$find=''; $rep='';
		switch ($eat) {
			case 1 : $find = 'pawn_lost'; $rep = 'pawn_lost+1'; break;
			case 2 : $find = 'rook_lost'; $rep = 'rook_lost+1'; break;
			case 3 : $find = 'knight_lost'; $rep = 'knight_lost+1'; break;
			case 4 : $find = 'bishop_lost'; $rep = 'bishop_lost+1'; break;
			case 5 : $find = 'queen_lost'; $rep = 'queen_lost+1'; break;
			case 6 : $find = 'king_lost'; $rep = 'king_lost+1'; break;
		}
		
		$this->db->set('piece_lost', 'piece_lost+1', FALSE);
		
		$this->db->set($find, $rep, FALSE);
		$this->db->update('user'); 	
	}
	
	
	public function check_user($username, $password) {
		$q = $this
			-> db
			-> where('username', $username)
			-> where('password', $password)
			-> limit(1)
			-> get ('user');	
		if ($q->num_rows > 0) 
			return $q->row();
		return false;
	}
	
	function validate() {
		$query = $this
			-> db
			-> where('username', $this->input->post('form_username'))
			-> where('password', md5($this->input->post('form_password')))
			//-> where('password', $this->input->post('form_password'))
			-> get('user');
		if ($query->num_rows == 1) return true; else return false;
	}
	
	function get_user_info($username) {
		$q = $this	
			-> db
			-> where ('username', $username)
			-> get ('user');
		if ($q->num_rows > 0) 
			return $q->row();
		return false;
	}
	
	function get_id_by_name($username) {
		$q = $this	
			-> db
			-> where ('username', $username)
			-> get ('user');
		if ($q->num_rows > 0) 
			return $q->row('id');
		return false;
	}
	
	function get_all_other_users($username) {
		$q = $this	
			-> db
			-> where ('username !=', $username)
			-> get ('user');
		foreach($q->result_array() as $row) {
				$result[] = $row;
		}
		$q->free_result();
		return $result;		
	}
	
	function get_all() {
		$q = $this	
			-> db
			-> get ('user');
		foreach($q->result_array() as $row) {
				$result[] = $row;
		}
		$q->free_result();
		return $result;		
	}	
	
	function set_login_time() 
	{
		$q = $this
			-> db
			-> where('username', $this->session->userdata('username'))
			-> set('login_time', '"'.date('Y-m-d H:i:s').'"', FALSE)
			-> update('user');	
	}
	function set_move_time() 
	{
		$q = $this
			-> db
			-> where('username', $this->session->userdata('username'))
			-> set('move_time', '"'.date('Y-m-d H:i:s').'"', FALSE)
			-> update('user');	
	}
	
}

