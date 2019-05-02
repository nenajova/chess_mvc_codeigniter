<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * 
	 */
	
	public function index()
	{
	
		
		$this->load->library('form_validation');
		//$this->form_validation->set_rules('korisnik', 'Korisnik', 'required||min_length[5]');
		//$this->form_validation->set_rules('lozinka', 'Lozinka', 'required|min_length[5]');
		$this->form_validation->set_rules('form_username', '', 'required|min_length[5]');
		$this->form_validation->set_rules('form_password', '', 'required|min_length[5]');

		if ($this->form_validation->run() !== false) {
			$this->load->model('m_user');
			//echo "<pre>print_r('nenad1');</pre>";
			$res = $this
				-> m_user
				-> validate();
				/*-> check_user(
					$this->input->post('form_username'), 
					$this->input->post('form_password')
				);*/
			
			if ($res !== false) {
				// person has an acconut
				//$_SESSION['username'] = $this->input->post('form_username');
				$session_data = array (
					'username' => $this->input->post('form_username'),
					'is_logged_in' => true
				);
				$this->session->set_userdata($session_data);
				
				
				// add to login_time
				$this->m_user->set_login_time();
				
				redirect(site_url());
			} 
			else 
			{
				redirect(site_url('login'));
			}
		}
	
		$d['page'] = 'login';
		$this->load->view('pages/form/template', $d);	
	}

	public function logoff()
	{
		
	}
	
	public function forgot_password() 
	{
		$d['page'] = 'forgot_password';
		$this->load->view('pages/form/template', $d);
	}
	
	public function register_user()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('form_username', '', 'trim|required');
		$this->form_validation->set_rules('form_email', '', 'trim|required');
		if($this->form_validation->run() == FALSE) // nije prosla validacija
		{
			//$this->load->view('pages/register');
			$d['page'] = 'register';
			$this->load->view('pages/form/template', $d);
		} 
		else 
		{
			$this->load->model('m_user');
			if($query = $this->m_user->add_new())
			{
				$d['account_created'] = 'Your account has been created.<br/><br/>You may now login.';
				//$this->load->view('pages/login', $d);
				$d['page'] = 'login';
				$this->load->view('pages/form/template', $d);
			} 
			else
			{
				//$this->load->view('pages/register');
				$d['page'] = 'register';
				$this->load->view('pages/form/template', $d);
			}
		}
		
		
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */