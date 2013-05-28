<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	 session_start();

class Home extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	 }


	public function index()
	{

			//loads the styles
			$head['styles'] = array('all', 'responsive','font-awesome.min', 'font-awesome-ie7.min',
			'fancybox/jquery.fancybox','fancybox/jquery.fancybox-buttons','fancybox/jquery.fancybox-thumbs',
			'scrollorama/style',
			'hoverdirection/noJS','hoverdirection/stylehover');
			
			//loads the scripts
			$footer['scripts'] = array('jquery-1.9.1.min','all',
			'fancybox/jquery.fancybox.pack','fancybox/jquery.fancybox-buttons','fancybox/jquery.fancybox-media','fancybox/jquery.fancybox-thumbs','fancybox/jquery.mousewheel-3.0.6.pack',
			'quicksand-1.3','jquery.smooth-scroll',
			'scrollorama/jquery.superscrollorama','scrollorama/TimelineLite.min','scrollorama/TweenMax.min',
			'hoverdirection/jquery.hoverdir', 'hoverdirection/modernizr.custom.97074');

			//Header
			$this->load->view('templates/head', $head);

			//Homepage
			$this->load->view('home');

			//Footer
			$this->load->view('templates/footer', $footer);

	}

	public function verify(){

	$this->form_validation->set_rules('fullname','Username','trim|required|exact_length[4]|xss_clean');
    $this->form_validation->set_rules('email','E-mail','trim|required|valid_email|xss_clean');
    $this->form_validation->set_rules('message','Message','trim|required|xss_clean');

    if($this->form_validation->run() == false)
    {
    }
    else
    {

        $fullname = $this->input->post('fullname');
        $email = $this->input->post('email');
        $message = $this->input->post('message');

        $value = $this->m_login->login($fullname,$email,$message);

        if(!$value)
        {
            $this->form_validation->set_message('login', 'password salah');
            return false;
        }
    }

	}

}
