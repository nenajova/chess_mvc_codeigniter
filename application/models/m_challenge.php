<?php

class M_challenge extends CI_Model {
	
	public function add_new($new_challenge_data) {
		$insert = $this->db->insert('challenge', $new_challenge_data);
		return $insert;
	}
	
	public function cancel($cancel) {
		$delete = $this
			-> db
			-> where ('challenge_from_id', $cancel['challenge_from_id'])
			-> where ('challenge_to_id', $cancel['challenge_to_id'])
			-> delete ('challenge');
		return $delete;
	}
	public function accept($accept) {
		
		$q = $this
			-> db
			-> select('challenge_time')
			-> where ('challenge_from_id', $accept['challenge_from_id'])
			-> where ('challenge_to_id', $accept['challenge_to_id'])
			-> get ('challenge');
		$challenge_time = $q->result();
		
		//var_dump($challenge_time[0]['challenge_time']);
		//var_dump($challenge_time->{'challenge_time'});
		//var_dump($challenge_time);
		//var_dump($challenge_time[0]->{'challenge_time'});
		
		$delete = $this
			-> db
			-> where ('challenge_from_id', $accept['challenge_from_id'])
			-> where ('challenge_to_id', $accept['challenge_to_id'])
			-> delete ('challenge');
		if ($delete) {
			$match = array ( // dodavanje i meca
				'white_id' => $accept['challenge_to_id'],
				'black_id' => $accept['challenge_from_id'],
				'start_time' => date('Y-m-d H:i:s'),
				'challenge_time' => $challenge_time[0]->{'challenge_time'}
				//'challenge_time' => $challenge_time[0]['challenge_time']
			);
			$insert = $this->db->insert('chess_match', $match);
			
			// inc zapocetih borbi
			$this->load->model('m_user');
			$this->m_user->inc_matches($match['white_id']);
			$this->m_user->inc_matches($match['black_id']);
			
			return true;//return $insert;
		} return false;
	}	

	function get_all_to($challenge_to_id) {
		$result = null;
		$q = $this	
			-> db
			-> where ('challenge_to_id', $challenge_to_id)
			-> join ('user', 'user.id = challenge.challenge_from_id')
			-> get ('challenge');
		foreach($q->result_array() as $row) {
				$result[] = $row;
		}
		$q->free_result();
		return $result; 
	}	
	function get_all_from($challenge_from_id) {
		$result = null;
		$q = $this	
			-> db
			-> where ('challenge_from_id', $challenge_from_id)
			-> join ('user', 'user.id = challenge.challenge_to_id')
			-> get ('challenge');
		foreach($q->result_array() as $row) {
				$result[] = $row;
		}
		$q->free_result();
		return $result; 
	}	
	
}

