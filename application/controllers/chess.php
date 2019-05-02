<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chess extends CI_Controller {

	/**
	 * 
	 */
	
	
	var $figure_positions = '';
	
	function __construct() 
	{
		parent:: __construct();
		session_start();
		
		$var = $this->session->userdata('username');
		if (empty($var)) {
			redirect('login');
		}
	}
	
	public function index()
	{
		$d['page'] = 'home';
		$this->load->view('pages/template', $d);
	}
	
	/*public function get_move_number($match_id)
	{
		$this->load->model('m_match');
		echo $this->m_match->get_move_number($match_id);
	}*/
	public function get_move_number()
	{
		$this->load->model('m_match');
		echo $this->m_match->get_move_number($this->input->post('id'));
	}
	
	
	public function play()
	{
		$this->load->model('m_match');
		$this->load->model('m_user');
		$user_id = $this->m_user->get_id_by_name($this->session->userdata('username'));
		$d['matches'] = $this
			-> m_match
			-> get_all_for($user_id);
		$d['page'] = 'play';
		$this->load->view('pages/template', $d);	
	}
	public function challenge()
	{
		$this->load->model('m_user');
		$this->load->model('m_challenge');
		
		$d['players'] = $this->m_user->get_all_other_users($this->session->userdata('username'));

		$challenge_to_id = $this->m_user->get_id_by_name($this->session->userdata('username'));
		$d['challengs_to_you'] = $this->m_challenge->get_all_to($challenge_to_id);
		$d['challengs_from_you'] = $this->m_challenge->get_all_from($challenge_to_id);
		$d['page'] = 'challenge';
		$this->load->view('pages/template', $d);	
	}
	public function rating()
	{
		$this->load->model('m_user');
		$d['players'] = $this->m_user->get_all();
		$d['page'] = 'rating';
		$this->load->view('pages/template', $d);	
	}
	public function profile($id='')
	{
		$this->load->model('m_user');
		if ($id == '')
			$d['user'] = $this->m_user->get_user_info($this->session->userdata('username'));
		else {
			$d['user'] = $this->m_user->get_user_info($id);
			if($d['user']==false) // ako ne postoji trazeni korisnik
				redirect('profile');
				//$d['user'] = $this->m_user->get_user_info($this->session->userdata('username'));
		}
		$d['page'] = 'profile';
		//$d['server_time'] = date("d.m.Y. H:i:s");
		//$date = new DateTime('02/31/2013');
		//date_format(date_create($d['user']->{'move_time'}),"Y.m.d H:i:s");
		//$d['server_time'] = $this->time_elapsed_string(date_format(date_create($d['user']->{'move_time'}),"Y.m.d H:i:s"));
		//$d['server_time'] = $this->time_elapsed_string(date_format($date, 'Y-m-d H:i:s'));
		//$d['server_time'] = $this->time_elapsed_string(date_format($d['user']->{'move_time'},"Y.m.d H:i:s"));
		
		
		
		//$d['server_time'] = 'aaa';//$this->time_elapsed_string($d['user']->{'login_time'});
		/*$a = $this->time_elapsed_string($d['user']->{'login_time'});
		$d['user']->{'login_time'} = $a;*/
		
		$d['time_ago'] = array (
			'join' => $this->time_elapsed_string($d['user']->{'join_time'}),
			'login' => $this->time_elapsed_string($d['user']->{'login_time'}),
			'move' => $this->time_elapsed_string($d['user']->{'move_time'})
		);
		
		
		
		$this->load->model('m_match');
		$user_id = $this->m_user->get_id_by_name($this->session->userdata('username'));
		$d['matches'] = $this
			-> m_match
			-> get_all_for($user_id);
		
		$this->load->view('pages/template', $d);	
	}
	public function matches()
	{
		$this->load->model('m_match');
		$d['matches'] = $this->m_match->get_all();
		$d['page'] = 'matches';
		$this->load->view('pages/template', $d);	
	}
	
	public function move($matchid, $move) 
	{
		
/* 		echo '<script>';
		echo 'console.log("'.substr($move,2,2).'")';
		//echo 'console.log("'.$move.'")';
		echo '</script>'; */
		
		$eat = 0;
		$figure_num=0;
		
		$this->load->model('m_match');
		$this->load->model('m_user');
		
		// ovo vec imam u $GLOBALS['figure_positions']
		//$possitions = $this->m_match->get_possitions($matchid);
		$possitions = $this->m_match->get_possitions($matchid);
		
		
		$pos = strpos($possitions, substr($move,0,2));
		if($pos !== false) // naso figuru koja igra
		{
			//$figure = substr($possitions, $pos-1, 1);
			switch (substr($possitions, $pos-1, 1)) {
				case 'p' : $figure_num = 1;  break;
				case 'r' : $figure_num = 2;  break;
				case 's' : $figure_num = 3;  break;
				case 'b' : $figure_num = 4;  break;
				case 'q' : $figure_num = 5;  break;
				case 'k' : $figure_num = 6;  break;
			}
		}
		
		
	
		//ako je jeo figuru
		$pos = strpos($possitions, substr($move,2,2));
		
		
		if($pos !== false) // jede figuru
		{
		
		
		
		
	/* 	echo '<script>';
		//echo 'console.log("'.substr($move,2,2).'")';
		//echo 'console.log("'.$move.'")';
		echo 'alert("jeo")';
		echo '</script>'; */
		
		
		
		
			$figure = substr($possitions, $pos-2, 5);
			
			$possitions = str_replace($figure, '', $possitions);
			
			
			$eat=0;
			switch (substr($figure,1,1)) {
				case 'p' : $eat = 1;  break;
				case 'r' : $eat = 2;  break;
				case 's' : $eat = 3;  break;
				case 'b' : $eat = 4;  break;
				case 'q' : $eat = 5;  break;
				case 'k' : $eat = 6;  break;
			}
			

			
			$this->m_user->inc_eat_figure($eat);		
			
			$player_id = $this->m_user->get_id_by_name($this->session->userdata('username'));
			$opponent_id = $this->m_match->get_opponent_id($matchid, $player_id);
			$this->m_user->inc_lost_figure($eat, $opponent_id);		
			
		}
	
		//inc match moves
		$this->m_match->inc_moves($matchid);
		
		//inc user moves
		$this->m_user->inc_moves($this->session->userdata('username'));		
		
		//inc update positions
		
		$new_possitions = str_replace(
			substr($move,0,2), 
			substr($move,2,2),
			$possitions
		); 
		$this->m_match->update_possitions($matchid, $new_possitions);
		
		
		
		

		
		
		//add new move
		$this->load->model('m_move');
		$data = array (
			'match_id' => $matchid,
			'start_field' => substr($move,0,2),
			'end_field' => substr($move,2,2),
			'eat' => $eat,
			'figure' => $figure_num,
			'time' => date('Y-m-d H:i:s'),
			'user_id' => $this->m_user->get_id_by_name($this->session->userdata('username'))
		);
		$this->m_move->add_new($data);
		
		// UPDATE USER MOVE TIME
		$this->m_user->set_move_time();
		
		redirect('match/'.$matchid);
	}
	
	public function match($id)
	{
		$d['page'] = 'match';
		$this->load->model('m_match');
		$d['match_info'] = $this->m_match->get_match_info($id);
		//$temp = $d['match_info']->{'positions'};
		
		$this->load->model('m_user');
		$user_id = $this->m_user->get_id_by_name($this->session->userdata('username'));
		
		$user_color = $this->m_match->get_color_by_user_id($user_id, $id);
		$d['user_color'] = $user_color;
		
		 
		$play = 'b';
		if($d['match_info']->{'moves'}%2 == 0) $play = 'w';
		$d['onmove_color'] = $play;
		//$user_color = 'w';
		
		//$t = 'wpa2';
		
		$GLOBALS['figure_positions'] = $d['match_info']->{'positions'};
		
		
		//$d['possible_moves'] = $this->get_possible_moves('wpa2_wpb2', 0);
		//$d['possible_moves'] = $this->get_possible_moves(substr($temp, 0, 4), 0);
		if ($user_color == 'w')
			$opponent_color = 'b';
		else $opponent_color = 'w'; 
		
		$d['opponent_possible_moves'] =  
			$this->get_all_possible_moves(
				$d['match_info']->{'positions'}, 
				$d['match_info']->{'moves'}+1,
				$opponent_color
				);
		
		
		$d['possible_moves'] = 
			$this->get_all_possible_moves(
				$d['match_info']->{'positions'}, 
				$d['match_info']->{'moves'},
				$user_color
				);
		
		//$d['temp'] = $d['match_info']->{'positions'};
		//$d['possible_moves'] = $this->get_possible_moves('wpa2_wpb2', 0);
		//$d['possible_moves'] = $this->get_all_possible_moves('wpa2_wpb2_wpc2_wsb1', 0);
		/*$d['possible_moves'] = array(
			'w_pawn1' => '["a3","a4"]',
			'w_pawn2' => '["b3","b4"]'
		);*/
		
		$this->load->model('m_move');
		$d['moves'] = $this->m_move->get_by_match_id($id);
		
		
		$this->load->view('pages/template', $d);			
	}
	public function logoff()
	{
		$this->session->sess_destroy();	
		redirect(site_url());
		//$d['page'] = 'logoff';
		//$this->load->view('pages/template', $d);	
	}
	
	private function get_all_possible_moves($positions, $move_num, $color)
	{
		/*$pos_moves = array(
			'w_pawn1' => '["a3","a4"]',
			'w_pawn2' => '["b3","b4"]'
		);*/
		$play = 'b';
		if($move_num%2 == 0) $play = 'w';
		
		$pos = explode("_", $positions);
		
		
		
		$pos_moves = array();
		//$pos_moves['wpa2'] = '["a3","a4"]';
		//$pos_moves['wpb2'] = '["b3","b4"]';
		//$pos_moves['wph2'] = '["h3","h4"]';
		//array_push($pos_moves['a'], '["a3","a4"]');
		
		
		
		foreach ($pos as $fig) {
			//if ($play == substr($fig, 0, 1))
			//if ($color == $play && $color == substr($fig, 0, 1))
			if ($color == $play && $color == substr($fig, 0, 1))
				$pos_moves[$fig] = $this->get_possible_moves($fig);//'["a3","a4"]';
		}
		
		
		
		
		return $pos_moves;
	}
	
	private function get_possible_moves($fig) 
	{
		$figure = substr($fig, 1, 1);
		$moves = '';
		switch($figure) {
			//case 'p': $moves = $this->pawn_possible_moves('a2', substr($fig, 0, 1)); break;
			case 'p': $moves = $this->pawn_possible_moves(substr($fig, 2, 2), substr($fig, 0, 1)); break;
			case 's': $moves = $this->knight_possible_moves(substr($fig, 2, 2), substr($fig, 0, 1)); break;
			case 'r': $moves = $this->rook_possible_moves(substr($fig, 2, 2), substr($fig, 0, 1)); break;
			case 'b': $moves = $this->baptist_possible_moves(substr($fig, 2, 2), substr($fig, 0, 1)); break;
			case 'q': $moves = $this->queen_possible_moves(substr($fig, 2, 2), substr($fig, 0, 1)); break;
			case 'k': $moves = $this->king_possible_moves(substr($fig, 2, 2), substr($fig, 0, 1)); break;
		}
		return $moves;
	}
	
	
	//private function check_field($field, $color) {
	private function check_field($field, $color)
	{
		$pos = strpos($GLOBALS['figure_positions'], $field);
		//return $pos;
		if($pos === false) {
			return 1;
		} 
		else if (substr($GLOBALS['figure_positions'],$pos-2,1) == $color)
		{
			return 0;
		} 
		else return 2;
	}
	
	private function check_king_move($field)
	{
		return 1;
	}
	
	private function pawn_possible_moves($field, $color) 
	{
		$moves = array();
		$num = (int)substr($field, 1, 1);
		$letter = substr($field, 0, 1);
		$go = false;
		
		if($color == 'w' && $num<8) 
		{
			$num ++;
			$go = $this->check_field($letter.$num, $color);
		} 
		else if($color == 'b' && $num>1) 
		{
			$num--;
			$go = $this->check_field($letter.$num, $color);
		}
		
		// dali moze da jede
		$letters = array('a','b','c','d','e','f','g','h');
		$index = array_search($letter, $letters);
		if ($index > 0) {
			if ($this->check_field($letters[$index-1].$num, $color) == 2)
				array_push($moves, $letters[$index-1].(string)$num);
		}
		if ($index < 7) {
			if ($this->check_field($letters[$index+1].$num, $color) == 2)
				array_push($moves, $letters[$index+1].(string)$num);
		}
		
		if ($go == 1) 
		{
			array_push($moves, $letter.(string)$num);
			
			if ($num == 3 && $color == 'w' && $this->check_field($letter.(string)++$num, $color))
				array_push($moves, $letter.(string)$num);
			if ($num == 6 && $color == 'b' && $this->check_field($letter.(string)--$num, $color))
				array_push($moves, $letter.(string)$num);
		}
		//array_push($moves, $letter.(string)$num);
		
		return $this->moves_to_string($moves);
	}
	
	private function rook_possible_moves($field, $color) 
	{
		$moves = array();
		
		$num = (int)substr($field, 1, 1);
		$letter = substr($field, 0, 1);
		//$go = false;
		$letters = array('a','b','c','d','e','f','g','h');
		$f=0;
		
		$i = $num;
		while($i<8) {
			$f = $this->check_field($letter.(string)++$i, $color);
			if($f) array_push($moves, $letter.(string)$i);
			if($f!=1) break;
		} 
		$i = $num;
		while($i>1) {
			$f = $this->check_field($letter.(string)--$i, $color);
			if($f) array_push($moves, $letter.(string)$i);
			if($f!=1) break;
		} 
		
		$i = array_search($letter, $letters);
		while($i>0) {
			$f = $this->check_field($letters[--$i].(string)$num, $color);
			if($f) array_push($moves, $letters[$i].(string)$num);
			if($f!=1) break;
		}
		$i = array_search($letter, $letters);
		while($i<7) {
			$f = $this->check_field($letters[++$i].(string)$num, $color);
			if($f) array_push($moves, $letters[$i].(string)$num);
			if($f!=1) break;
		}
		
		
		//array_push($moves, "d4");	
		return $this->moves_to_string($moves);
	}
	
	private function knight_possible_moves($field, $color) 
	{
		$moves = array();
		
		$num = (int)substr($field, 1, 1);
		$letter = substr($field, 0, 1);
		$letters = array('a','b','c','d','e','f','g','h');
		
		$i = $num;
		$j = array_search($letter, $letters);
		
		if($i<7) // GORE 
		{
			if ($j>0 && $this->check_field($letters[$j-1].(string)($i+2), $color)) 
					array_push($moves, $letters[$j-1].(string)($i+2)); // gore levo
			if ($j<7 && $this->check_field($letters[$j+1].(string)($i+2), $color)) 
				array_push($moves, $letters[$j+1].(string)($i+2)); // gore desno
		}
		if($i>2) // DOLE 
		{
			if ($j>0 && $this->check_field($letters[$j-1].(string)($i-2), $color)) 
				array_push($moves, $letters[$j-1].(string)($i-2)); // dole levo
			if ($j<7 && $this->check_field($letters[$j+1].(string)($i-2), $color)) 
				array_push($moves, $letters[$j+1].(string)($i-2)); // dole desno
		}
		if($j>1) // LEVO 
		{
			if ($i>1 && $this->check_field($letters[$j-2].(string)($i-1), $color)) 
				array_push($moves, $letters[$j-2].(string)($i-1)); // levo dole
			if ($i<8 && $this->check_field($letters[$j-2].(string)($i+1), $color)) 
				array_push($moves, $letters[$j-2].(string)($i+1)); // levo gore 
		}
		if($j<6) // DESNO 
		{
			if ($i>1 && $this->check_field($letters[$j+2].(string)($i-1), $color)) 
				array_push($moves, $letters[$j+2].(string)($i-1)); // desno dole
			if ($i<8 && $this->check_field($letters[$j+2].(string)($i+1), $color)) 
				array_push($moves, $letters[$j+2].(string)($i+1)); // desno gore 
		}			
		return $this->moves_to_string($moves);
	}

	private function baptist_possible_moves($field, $color) 
	{
		$moves = array();

		$num = (int)substr($field, 1, 1);
		$letter = substr($field, 0, 1);
		$letters = array('a','b','c','d','e','f','g','h');

		$f=0;		
		// GORE LEVO		
		$i = $num;
		$j = array_search($letter, $letters);
		while ($i<8 && $j>0) {
			$i++; $j--;
			$f = $this->check_field($letters[$j].(string)($i), $color);
			if ($f != 1) {
				if ($f == 2) array_push($moves, $letters[$j].(string)$i);
				break;
			}
			array_push($moves, $letters[$j].(string)$i);
		}
		// GORE DESNO
		$i = $num;
		$j = array_search($letter, $letters);
		while ($i<8 && $j<7) {
			$i++; $j++;
			$f = $this->check_field($letters[$j].(string)($i), $color);
			if ($f != 1) {
				if ($f == 2) array_push($moves, $letters[$j].(string)$i);
				break;
			}
			array_push($moves, $letters[$j].(string)$i);
		}
		// DOLE LEVO		
		$i = $num;
		$j = array_search($letter, $letters);
		while ($i>1 && $j>0) {
			$i--; $j--;
			$f = $this->check_field($letters[$j].(string)($i), $color);
			if ($f != 1) {
				if ($f == 2) array_push($moves, $letters[$j].(string)$i);
				break;
			}
			array_push($moves, $letters[$j].(string)$i);
		}
		// DOLE DESNO
		$i = $num;
		$j = array_search($letter, $letters);
		while ($i>1 && $j<7) {
			$i--; $j++;
			$f = $this->check_field($letters[$j].(string)($i), $color);
			if ($f != 1) {
				if ($f == 2) array_push($moves, $letters[$j].(string)$i);
				break;
			}
			array_push($moves, $letters[$j].(string)$i);
		}		

		return $this->moves_to_string($moves);
	}
	
	private function queen_possible_moves($field, $color) 
	{
		$moves = array();


		// ROOK MOVES!!!
		$num = (int)substr($field, 1, 1);
		$letter = substr($field, 0, 1);
		$letters = array('a','b','c','d','e','f','g','h');
		$f=0;
		
		$i = $num;
		while($i<8) {
			$f = $this->check_field($letter.(string)++$i, $color);
			if($f) array_push($moves, $letter.(string)$i);
			if($f!=1) break;
		} 
		$i = $num;
		while($i>1) {
			$f = $this->check_field($letter.(string)--$i, $color);
			if($f) array_push($moves, $letter.(string)$i);
			if($f!=1) break;
		} 
		
		$i = array_search($letter, $letters);
		while($i>0) {
			$f = $this->check_field($letters[--$i].(string)$num, $color);
			if($f) array_push($moves, $letters[$i].(string)$num);
			if($f!=1) break;
		}
		$i = array_search($letter, $letters);
		while($i<7) {
			$f = $this->check_field($letters[++$i].(string)$num, $color);
			if($f) array_push($moves, $letters[$i].(string)$num);
			if($f!=1) break;
		}
		
		// BABTIST MOVES !!!
		$f=0;		
		// GORE LEVO		
		$i = $num;
		$j = array_search($letter, $letters);
		while ($i<8 && $j>0) {
			$i++; $j--;
			$f = $this->check_field($letters[$j].(string)($i), $color);
			if ($f != 1) {
				if ($f == 2) array_push($moves, $letters[$j].(string)$i);
				break;
			}
			array_push($moves, $letters[$j].(string)$i);
		}
		// GORE DESNO
		$i = $num;
		$j = array_search($letter, $letters);
		while ($i<8 && $j<7) {
			$i++; $j++;
			$f = $this->check_field($letters[$j].(string)($i), $color);
			if ($f != 1) {
				if ($f == 2) array_push($moves, $letters[$j].(string)$i);
				break;
			}
			array_push($moves, $letters[$j].(string)$i);
		}
		// DOLE LEVO		
		$i = $num;
		$j = array_search($letter, $letters);
		while ($i>1 && $j>0) {
			$i--; $j--;
			$f = $this->check_field($letters[$j].(string)($i), $color);
			if ($f != 1) {
				if ($f == 2) array_push($moves, $letters[$j].(string)$i);
				break;
			}
			array_push($moves, $letters[$j].(string)$i);
		}
		// DOLE DESNO
		$i = $num;
		$j = array_search($letter, $letters);
		while ($i>1 && $j<7) {
			$i--; $j++;
			$f = $this->check_field($letters[$j].(string)($i), $color);
			if ($f != 1) {
				if ($f == 2) array_push($moves, $letters[$j].(string)$i);
				break;
			}
			array_push($moves, $letters[$j].(string)$i);
		}		
		
		return $this->moves_to_string($moves);
	}
	private function king_possible_moves($field, $color) // ???DAJE NEKA POLJA DUPLO????!!!!!! mozda je i reseno, tj 99%
	{
		$moves = array();
		
		$num = (int)substr($field, 1, 1);
		$letter = substr($field, 0, 1);
		$letters = array('a','b','c','d','e','f','g','h');
		
		$i = $num;
		$j = array_search($letter, $letters);
		if($i<8) // gore
		{
			if (
				$this->check_field($letter.(string)++$i, $color) &&
				$this->check_king_move($letter.(string)$i)
			) array_push($moves, $letter.(string)$i);
			if (
				$j > 0 
				&& $this->check_field($letters[$j-1].(string)$i, $color)
				&& $this->check_king_move($letters[$j-1].(string)$i)
			) array_push($moves, $letters[$j-1].(string)$i);
			if (
				$j < 7 
				&& $this->check_field($letters[$j+1].(string)$i, $color)
				&& $this->check_king_move($letters[$j+1].(string)$i)
			) array_push($moves, $letters[$j+1].(string)$i);
		}
		
		$i = $num;
		$j = array_search($letter, $letters);
		if($i>1) // dole
		{
			if (
				$this->check_field($letter.(string)--$i, $color)
				&& $this->check_king_move($letter.(string)$i)
			) array_push($moves, $letter.(string)$i);
			if (
				$j > 0 
				&& $this->check_field($letters[$j-1].(string)$i, $color)
				&& $this->check_king_move($letters[$j-1].(string)$i)
			) array_push($moves, $letters[$j-1].(string)$i);
			if (
				$j < 7 
				&& $this->check_field($letters[$j+1].(string)$i, $color)
				&& $this->check_king_move($letters[$j+1].(string)$i)
			) array_push($moves, $letters[$j+1].(string)$i);
		}
		
		$i = $num;
		$j = array_search($letter, $letters);
		if($j<7) // desno
		{
			if (
				$this->check_field($letters[++$j].(string)$i, $color)
				&& $this->check_king_move($letters[$j].(string)$i)
			) array_push($moves, $letters[$j].(string)$i);
			/*if ($i > 1 && $this->check_field($letters[$j].(string)($i-1), $color)) // dole desno
				array_push($moves, $letters[$j].(string)($i-1));
			//$i = $num;
			if ($i < 8 && $this->check_field($letters[$j].(string)($i+1), $color)) // gore desno
				//array_push($moves, $letters[$j].(string)$j);
				array_push($moves, $letters[$j].(string)($i+1));*/
		}
		
		$i = $num;
		$j = array_search($letter, $letters);
		if($j>0) // levo
		{
			if (
				$this->check_field($letters[--$j].(string)$i, $color)
				&& $this->check_king_move($letters[$j].(string)$i)
			) array_push($moves, $letters[$j].(string)$i);
			/*if ($i > 1 && $this->check_field($letters[$j].(string)($i-1), $color))
				array_push($moves, $letters[$j].(string)($i-1));
			if ($i < 8 && $this->check_field($letters[$j].(string)($i+1), $color))
				array_push($moves, $letters[$j].(string)($i+1));*/
		}	
		
			
		//array_push($moves, "d4");	
		return $this->moves_to_string($moves);
	}
	
	private function moves_to_string($moves) 
	{
		$str = null;
		foreach($moves as $m) $str .= '"' . $m . '",'; 
		$str = '[' . substr($str, 0, strlen($str)-1) . ']';
		return $str; 
	}
	
	
	

	private function time_elapsed_string($ptime)
	{
		//$ptime1 = strtotime($ptime);
		$etime = time() - strtotime($ptime);
		//$etime = new DateTime('02/31/2013') - $ptime;

		if ($etime < 1)
		{
			return '0 seconds';
		}

		$a = array( 365 * 24 * 60 * 60  =>  'year',
					 30 * 24 * 60 * 60  =>  'month',
						  24 * 60 * 60  =>  'day',
							   60 * 60  =>  'hour',
									60  =>  'minute',
									 1  =>  'second'
					);
		$a_plural = array( 'year'   => 'years',
						   'month'  => 'months',
						   'day'    => 'days',
						   'hour'   => 'hours',
						   'minute' => 'minutes',
						   'second' => 'seconds'
					);

		foreach ($a as $secs => $str)
		{
			$d = $etime / $secs;
			if ($d >= 1)
			{
				$r = round($d);
				return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
				//return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
			}
		}
	}


}

/* End of file chess.php */
/* Location: ./application/controllers/chess.php */