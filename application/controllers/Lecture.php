<?php
	class Lecture extends CI_Controller {
		
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
			$this->load->model('lecture_model');
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
		$this->data['breadcrumb']['heading'] = 'Lecture';  
		$this->data['breadcrumb']['route'] = array(array('title'=>'Dashboard','path'=>'dashboard'),array('title'=>'Settings','path'=>'settings'),'lecture');
		$this->load->view('includes/header',$this->data);
		$this->load->view('pages/lecture_view',$this->data);
		$this->load->view('includes/footer',$this->data);
	}

	public function get_show_data($item_id = NULL)
	{
		$user_type = $this->session_library->get_session_data('Login_as');
        if($user_type === 'DSSK10000001')
        {
        	$res = $this->lecture_model->get_show_data('BT',array('name','description','>>branch:>fr>BR>name:ID=^branch_ID^','ID'));
        }
        else
        {
        	$branch = $this->session_library->get_session_data('branch_ID');
        	$res = $this->lecture_model->get_show_data(array('BT'=>array('branch_ID'=>$branch)),array('name','description','ID'));
        }
		echo json_encode($res);
 	}

 	public function add($id=NULL)
 	{
 		$this->data['breadcrumb']['heading'] = 'Add Lecture';
		$this->data['breadcrumb']['route'] = array(array('title'=>'Dashboard','path'=>'dashboard'),array('title'=>'Settings','path'=>'settings'),array('title'=>'lecture','path'=>'lecture'),'Add');
		$check = $this->lecture_model->check($id,$this->data['Login']['Login_as']);
		define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
        if(IS_AJAX)
		{
			$this->lecture_model->add_or_edit();
		}
		else
		{
			if($check)
			{
				if(!is_null($id))
				{
					$this->data['breadcrumb']['heading'] = 'Edit Lecture';  
					$this->data['breadcrumb']['route'] = array(array('title'=>'Dashboard','path'=>'dashboard'),array('title'=>'Settings','path'=>'settings'),array('title'=>'lecture','path'=>'lecture'),'Edit');  
					$this->data['What'] = 'Edit';
					$item = $this->fetch_model->show(array('BT'=>array('ID'=>$id))); 
					$this->data['View'] = $item[0];
				}
				$this->data['branch'] = $this->fetch_model->show('BR');
				$this->load->view('includes/header',$this->data);
				$this->load->view('pages/lecture_add_edit_view',$this->data);
				$this->load->view('includes/footer',$this->data);			
			}
			else
			{
	 			return FALSE;
			}
		}
	}

 	public function delete($item_id=NULL)
 	{
 		$this->load->model('form_model');
 		$delete_data = $this->form_model->delete(array('BT' => array('ID' => $item_id)));
 		define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
		if($delete_data)
 		{
		    if(IS_AJAX)
			{
				echo json_encode($delete_data);	
			}
			else
			{
	 			redirect('lecture');
	 		}
		}
 	}

 	public function view()
 	{
 		$this->load->view('includes/header',$this->data);
		$this->load->view('pages/lecture_view',$this->data);
		$this->load->view('includes/footer',$this->data);		
 	}

 	public function show($id)
 	{
 		if (!empty($id))
 		{
 			$this->data['ID'] = $id;
 			$this->data['breadcrumb']['heading'] = 'Class';
 			$this->data['breadcrumb']['route'] = array(array('title'=>'Class','path'=>'lecture/show/'.$id),'Show');
	 		$this->load->view('includes/header',$this->data);
			$this->load->view('pages/lecture_show',$this->data);
			$this->load->view('includes/footer',$this->data);
 		}
 		else
 		{
 			redirect('dashboard');
 		}		
 	}

 	public function addClass()
 	{
 		echo json_encode($this->lecture_model->addClass());
 	}

 	public function classes($branch_ID = NULL)
 	{
 		echo json_encode($this->lecture_model->classes($branch_ID));
 	}

 	public function get_all_students($branch_ID = NULL)
 	{
 		echo json_encode($this->lecture_model->get_all_students($branch_ID));
 	}
 	// public function getPersons()
 	// {
 	// 	echo json_encode($this->lecture_model->getPersons());
 	// }

 	// public function getMeet()
 	// {
 	// 	echo json_encode($this->fetch_model->show('LMT'));
 	// }

 	// public function addTimeline()
 	// {
 	// 	echo json_encode($this->lecture_model->addTimeline());
 	// }
}
?>