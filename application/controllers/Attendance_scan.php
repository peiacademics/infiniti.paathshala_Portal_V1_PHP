<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_scan extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if($this->login_model->check_login())
		{
			$this->lang->load('custom',$this->session_library->get_session_data('Language'));
			$this->data['Login']['Login_as'] = $this->session_library->get_session_data('Login_as');
			$this->data['Login']['Name'] = $this->session_library->get_session_data('Name');
			$this->data['Login']['Email'] = $this->session_library->get_session_data('Email');
			$this->data['Login']['ID'] = $this->session_library->get_session_data('ID');
			$this->data['Date_format'] = $this->date_library->get_date_format();
			$this->data['my_config'] = $this->my_config = $this->config->item('skyq');
            $this->data['menu'] = $this->setting_model->get_menus($this->data,$this->my_config);
		}
		else 
		{
			redirect($this->config->item('skyq')['default_login_page']);
		}
 	}

	public function index()
	{
		$this->load->view('pages/attendance_scan_view');
	}

	public function set_attendence()
	{
		$this->load->model('form_model');
		echo json_encode($_POST);
		$get = $this->fetch_model->show(array('ST'=>array('attendance_key'=>$_POST['attendance_key'])),'ID');
		if(!empty($get))
		{
			$data = array('user_ID'=>$get[0]['ID'],'type'=>'student','action'=>$_POST['action'],'date'=>date('Y-m-d'),'time'=>date('h:i:s'));
			echo $this->form_model->add(array('table'=>'AT','columns'=>$data));
		}
		else{
			$data = array('user_ID'=>$_POST['attendance_key'],'type'=>'student','action'=>'INVALID','date'=>date('Y-m-d'),'time'=>date('h:i:s'));
			echo $this->form_model->add(array('table'=>'AT','columns'=>$data));
		}
	}
}
