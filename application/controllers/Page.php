<?php
	class Page extends CI_Controller{
		public function view($Dashb = 'index'){
			if(!file_exists(APPPATH.'views/page/'.$Dashb.'.php')){
				show_404();
			}
			$data['title'] = ucfirst($Dashb);
			$this->load->view('templates/header');
			$this->load->view('page/'.$Dashb);
			$this->load->view('templates/footer');
		}
	}
?>