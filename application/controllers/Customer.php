<?php

class Customer extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if($this->login_model->check_login())
		{
			$this->data['Login']['Name'] = $this->session_library->get_session_data('Name');
			$this->data['Login']['Login_as'] = $this->session_library->get_session_data('Login_as');
			$this->data['Login']['ID'] = $this->session_library->get_session_data('ID');
			$this->data['Login']['branch_ID'] = $this->session_library->get_session_data('branch_ID');
			$this->data['Date_format'] = $this->date_library->get_date_format();
			$this->load->model('customer_model');
			$this->data['my_config'] = $this->my_config = $this->config->item('skyq');
            $this->data['menu'] = $this->setting_model->get_menus($this->data,$this->my_config);
		}
		else
		{
			redirect($this->config->item('skyq')['default_login_page']);
		}
 	}
	
	function index()
	{
		$this->show();
		// $this->data['breadcrumb']['heading'] = 'Customer';  
		// $this->data['breadcrumb']['route'] = array(array('title'=>'Customer','path'=>'Customer'),'Show');
		// $this->data['lists']=$this->customer_model->lists();
		// $this->load->view('includes/header',$this->data);
		// $this->load->view('pages/Customer_view',$this->data);
		// $this->load->view('includes/footer',$this->data);
	}

	public function show($branch_ID = NULL)
	{
		$this->data['breadcrumb']['heading'] = 'Customers';  
		$this->data['breadcrumb']['route'] = array(array('title'=>'Customers','path'=>'Customer'),'Show');
		$this->data['lists'] = $this->customer_model->get_details($branch_ID);
		$this->data['branch_ID'] = $branch_ID;
		$this->load->view('includes/header',$this->data);
		$this->load->view('pages/cust_view',$this->data);
		$this->load->view('includes/footer',$this->data);
	}

	public function get_show_data2()
 	{
 		$res = $this->customer_model->get_show_data2();
		echo json_encode($res);
 	}

 	public function checkRecall()
	{
		$this->load->model('form_model');
		$currentTimestamp = time();
		$recall = $this->fetch_model->show(array('R' =>array('Status'=>'A','Added_by'=>$this->data['Login']['ID'])));
		if ($recall){
			$recall1 = array();
			foreach ($recall as $key => $value) {
				$recallTime = strtotime($value['alertTime']);
				if ($recallTime <= $currentTimestamp) {
					$d = $this->fetch_model->show(array('C' =>array('recall_ID'=>$value['ID'],'Added_by'=>$this->data['Login']['ID'])));
					if ($d)
					{
						$recall1[] = $d;
					}
					$Redit = $this->form_model->edit(array("table"=>"R","columns"=>array('Status'=>'P'),"where"=>array('ID'=>$value['ID'])));
				}
			}
			header('Content-Type:application/x-json; charset=utf-8');
			echo json_encode($recall1);
		}
		else
		{
			header('Content-Type:application/x-json; charset=utf-8');
			echo json_encode(0);
		}
	}

	public function lead_call_status()
 	{
		header('Content-Type:application/x-json; charset=utf-8');
 		$id = $_POST['id'];
 		$status = $_POST['status'];
 		$change = $this->customer_model->lead_call_status($id,$status);
 		if ($change)
 		{
 			echo json_encode($change);
 		}
 		else
 		{
 			echo json_encode("Something went Wrong");
 		}
 	}

 	public function recall()
 	{
 		header('Content-Type:application/x-json; charset=utf-8');
 		$change = $this->customer_model->recall();
 		if ($change)
 		{
 			echo json_encode($change);
 		}
 		else
 		{
 			echo json_encode($change);
 		}
 	}

}	
?>