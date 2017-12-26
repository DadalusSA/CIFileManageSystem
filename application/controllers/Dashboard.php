<?php
	class Dashboard extends CI_Controller
	{
		public function __construct()
		{
			parent:: __construct();
			$this->load->helper('download');
		}

		public function index()
		{
			if(!$this->session->userdata('logged_in'))
			 {
			 	redirect('users/login');
			 }
			$data['title'] = 'File Uploaded';

			$data['files'] = $this->file_model->get_uploadfile();
			$this->load->view('templates/header');
			$this->load->view('dashboard/index', $data);
			$this->load->view('templates/footer');
		}

		public function download($getdata)
		{
			if(!$this->session->userdata('logged_in'))
			 {
			 	redirect('users/login');
			 }
			$get = urldecode($getdata);
			$file = realpath ("assets/uploads") . "\\" .$get;

			if (file_exists($file))
					{
					$data = file_get_contents(base_url()."assets/uploads/". $get);
					force_download ($get, $data);
					}
					else
					{
						redirect('dashboard');
					}
			}

			public function delete($id)
		{
			//Check login
			 if(!$this->session->userdata('logged_in'))
			 {
			 	redirect('users/login');
			 }
			$this->file_model->delete_file($id);

			$this->session->set_flashdata('post_deleted', 'Deleted File');
			
			redirect('dashboard');

		}
		}
?>