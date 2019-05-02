<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	/**
	 * 
	 */
	
	public function index($t='test')
	{	
	
		
	
		$this->load->view('pages/test/'.$t);	
	}
	
	public function test1()
	{
		$this->load->model('m_match');
		$this->load->model('m_user');
		
		$d['opponent'] = $this->m_match->get_opponent_id(14,9);
		//$d['opponent'] = "nenad";
		
		$eat = 3;
		$opponent_id = 11;
		$this->m_user->inc_lost_figure($eat, $opponent_id);		
		
		$this->load->view('pages/test/test1', $d);	
	}


}

/* End of file test.php */
/* Location: ./application/controllers/test.php */