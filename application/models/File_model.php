<?php
	class File_model extends CI_Model{
		public function __construct()
		{
			$this->load->database();
		}

		public function get_uploadfile()
		{
			$query = $this->db->get_where('fileuploaded', array('user_id' => $this->session->userdata('userid')));
			return $query->result_array();
		}
		
		public function upload_file($userfileupload)
		{

			$data =array(
				'user_id' => $this->session->userdata('userid'),
				'userfile' => $userfileupload,
			);

			return $this->db->insert('fileuploaded', $data);
		}

		public function delete_file($id)
		{
			$file_name = $this->db->select('userfile')->get_where('fileuploaded', array('id' => $id))->row()->userfile;
			$cwd = getcwd(); //save the current working directory
			$file_path = $cwd."\\assets\\uploads\\";
			chdir($file_path);
			unlink($file_name);
			chdir($cwd);

			$this->db->where('id', $id);
			$this->db->delete('fileuploaded');
			return true;
		}

	/* Testing for getting user id 
		public function get_download($getdata)
		{
			$this->db->order_by('users.id', 'DESC');
			$this->db->join('fileuploaded', 'users.id = fileuploaded.user_id');
				$query = $this->db->get_where('fileuploaded', array('userfile' => $fileName));
				return $query->result_array();

		}
		*/

	}