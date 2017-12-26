<?php
	Class Upload extends CI_Controller
	{
		public function __construct()
		{
			parent:: __construct();
		}

		public function index()
		{
			if(!$this->session->userdata('logged_in'))
			 {
			 	redirect('users/login');
			 }
			$this->load->view('templates/header');
			$this->load->view('upload/index', array('error' => ' ' ));
			$this->load->view('templates/footer');
		}

		public function do_upload()
		{
			if(!$this->session->userdata('logged_in'))
			 {
			 	redirect('users/login');
			 }
			$config['upload_path'] = './assets/uploads/';
				$config['allowed_types'] = '*';
				$config['max_size'] = '50000';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload('userfile'))
				{	
					$this->session->set_flashdata('upload_fail',  'No File Selected, or file size SHOULD NOT exceeded 50MB!');
					redirect('upload');
				}
				else
				{
					$data = array('upload_data' => $this->upload->data());
					$userfileupload = $_FILES['userfile']['name'];
				}

				$userfileupload = str_replace(' ', '_', $userfileupload);
				$this->file_model->upload_file($userfileupload);

				$this->session->set_flashdata('post_created', 'Uploaded a file');
				redirect('dashboard');
		}


	}