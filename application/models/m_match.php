<?php

class M_match extends CI_Model {
	
	public function get_opponent_id($match_id, $player_id)
	{
		$q = $this
			-> db
			-> where ('id', $match_id)
			-> get('chess_match');
		$q->result();
		
		$id = null;
		
		if ($q->num_rows > 0) {
			if($q->row('white_id') == $player_id) 
				$id = $q->row('black_id');
			else $id = $q->row('white_id');
		}
	
		return $id;	
	}
		
	public function get_move_number($match_id)
	{
		$q = $this
			-> db
			-> where ('id', $match_id)
			-> get('chess_match');
			
		if ($q->num_rows > 0) 
			return $q->row('moves');
		//return false;
	}
	
	public function get_color_by_user_id($user_id, $match_id) 
	{
		$q = $this
			-> db
			-> where ('id', $match_id)
			-> get('chess_match');
		$result[] = $q->result();
		
		$color = 'g';
		
		if ($q->num_rows > 0) {
			if($q->row('white_id') == $user_id) $color = 'w';
			else if($q->row('black_id') == $user_id) $color = 'b';
		}

		
		return $color;
	}
	
	public function get_all_for($uid) 
	{
		$result = null;
		$q = $this
			-> db
			-> select ("(IF(chess_match.white_id=$uid, 'white', 'black')) as color, 
				moves, chess_match.id AS id, user.username as opponent
				FROM chess_match INNER JOIN user ON (IF(chess_match.white_id=$uid, 
				chess_match.black_id, chess_match.white_id)) = user.id 
				WHERE chess_match.white_id='$uid' OR chess_match.black_id='$uid'", false) 
			-> get ();
		foreach($q->result() as $row) {
				$result[] = $row;
		}
		$q->free_result();
		return $result;	
	}
	
	public function get_all() 
	{
		$result = null;
		$q = $this
			-> db
			-> select ('
				u1.username AS white,
				u2.username AS black,
				chess_match.id AS id,
				moves, start_time
			')
			-> join ('user AS u1', 'u1.id = chess_match.white_id')
			-> join ('user AS u2', 'u2.id = chess_match.black_id')		
			-> get ('chess_match');
		foreach($q->result() as $row) {
				$result[] = $row;
		}
		$q->free_result();
		return $result;			
	}
	
	public function get_match_info($mid) 
	{
		$q = $this	
			-> db
			-> select ('
				u1.username AS white,
				u2.username AS black,
				chess_match.id AS id,
				moves, positions, start_time
			')
			-> join ('user AS u1', 'u1.id = chess_match.white_id')
			-> join ('user AS u2', 'u2.id = chess_match.black_id')
			-> where ('chess_match.id', $mid)
			-> get ('chess_match');
		if ($q->num_rows > 0) {
			$result = $q->row();
			if ($result->{'black'} == $this->session->userdata('username'))
				$result->{'table_color'} = 'black';
			else $result->{'table_color'} = 'white';
			return $result;
		}
		return false;
	}
	
	public function get_possitions($mid) 
	{
		$q = $this	
			-> db
			-> select ('id, positions')
			-> where ('id', $mid)
			-> get ('chess_match');
		if ($q->num_rows > 0) {
			$result = $q->row('positions');
			return $result;
		}
		return false;
	}
	
	public function update_possitions ($match_id, $possitions) 
	{
		$this->db->where('id', $match_id);
		$data = array(
               'positions' => $possitions
        );
		//$this->db->set('positions', positions, FALSE);
		$this->db->update('chess_match', $data); 	
	}
	
	
	public function inc_moves ($match_id) 
	{
		$this->db->where('id', $match_id);
		$this->db->set('moves', 'moves+1', FALSE);
		$this->db->update('chess_match'); 	
	}
	
	
}

