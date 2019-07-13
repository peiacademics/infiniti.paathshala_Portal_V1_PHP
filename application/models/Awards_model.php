<?php
	class Awards_model extends CI_Model
	{
		public function check($id=NULL,$login_as="Client")
		{
			$user = count($this->fetch_model->show(array('AW' =>array('ID'=>$id))));
			if(is_null($id))
			{
				return TRUE;
			}
			elseif($user > 0)
			{
				return TRUE;
			}
			else
			{
				$this->errorlog_library->entry('Awards_model > check > argument ID is invalid.');
				redirect('awards/add/');
			}
		}

		public function add_or_edit()
		{
			$this->load->model('form_model');
			if(empty($_POST['ID']))
			{
				unset($_POST['ID']);
				$result = $this->form_model->add(array("table"=>"AW","columns"=>$_POST));
			}
			else
			{
				$result = $this->form_model->edit(array("table"=>"AW","columns"=>$_POST,"where"=>array('ID'=>$_POST['ID'])));
			}				
				echo json_encode($result);
			
		}

		public function get_show_data($input,$output)
		{
		 	$this->load->library('datatable_library');
	 		return $this->datatable_library->get_data($input,$output);
		}

	}
?>