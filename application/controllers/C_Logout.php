<?php
	class C_Logout extends CI_Controller
	{

		function index(){
			$this->session->sess_destroy();
			redirect('C_LandingPage');
		}
	}
?>