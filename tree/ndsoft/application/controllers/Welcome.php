<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Common_model');
	}
	public function index()
	{
		$record = $this->Menus(0);
		$this->load->view('index',compact('record'));

	}
	protected function Menus($parentId)
	{
		$record = $this->db->select('*')->from('Members')->where('ParentId='.$parentId)->get()->result_array();
		$count=count($record);
		if($count>0)
		{
			$data = '<ul>';
			foreach($record as $Member)
			{
				$data.='<li>'.$Member['Name'].$this->Menus($Member['Id']).'</li>';
			}			
			return $data.='</ul>';
		}
	}
	public function AddMemeber()
	{
		//print_r($_POST);exit;
		$Name = $this->input->post('Name');
		$ParentId = $this->input->post('Parent');
		$data = [
			"Name" => $Name,			
			"ParentId" => $ParentId,
		];
		$this->Common_model->SaveData('Members',$data);
		$id = $this->db->insert_id();
		$last=$this->Menus(0);
		echo json_encode($last);
	}
}
