<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Challenge extends CI_Controller {

	/**
	 * 
	 */
	
	function __construct() 
	{
		parent:: __construct();
		session_start();
		
		$var = $this->session->userdata('username');
		if (empty($var)) {
			redirect('login');
		}
	}
	
	public function index($challenge_to)
	{
		$this->load->model('m_user');
		$this->load->model('m_challenge');
		//$d = date('d.m.Y. H:i:s'); //GETDATE()
		$challenge_data = array(
			'challenge_time' => date('Y-m-d H:i:s'),
			'challenge_from_id' => $this->m_user->get_id_by_name($this->session->userdata('username')),
			'challenge_to_id' => $this->m_user->get_id_by_name($challenge_to)
			
		);
		if ($query = $this->m_challenge->add_new($challenge_data)) {
			redirect('challenge');
		}
	}
	
	public function cancel($challenge_to)
	{
		$this->load->model('m_user');
		$this->load->model('m_challenge');
		$cancel_data = array(
			'challenge_from_id' => $this->m_user->get_id_by_name($this->session->userdata('username')),
			'challenge_to_id' => $this->m_user->get_id_by_name($challenge_to)
		);
		if ($query = $this->m_challenge->cancel($cancel_data)) {
			redirect('challenge');
		}
	}
	
	public function accept($challenge_from)
	{
		$this->load->model('m_user');
		$this->load->model('m_challenge');
		$accept_data = array(
			'challenge_to_id' => $this->m_user->get_id_by_name($this->session->userdata('username')),
			'challenge_from_id' => $this->m_user->get_id_by_name($challenge_from)
		);
		if ($query = $this->m_challenge->accept($accept_data)) {
			redirect('play');
		}
	}

}

/* End of file challenge.php */
/* Location: ./application/controllers/challenge.php */