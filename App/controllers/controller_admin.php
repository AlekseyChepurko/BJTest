<?
class Controller_Admin extends Controller
{

	function __construct()
	{
		$this->model = new Model_Admin();
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();		
		$this->view->generate('view_admin.php', 'view_template.php', $data);
	}

	// function action_push(){		
	// 	$this->model->set_datas($_POST);
	// 	$this->view->generate('view_feedback_push.php', 'view_template.php');
	// }
	function action_confirm()
	{
		
	}

	function action_edit()
	{
		
	}
}