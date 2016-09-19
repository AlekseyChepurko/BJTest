<?
class Controller_Feedback extends Controller
{

	function __construct()
	{
		$this->model = new Model_Feedback();
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();		
		$this->view->generate('view_feedback.php', 'view_template.php', $data);
	}

	function action_push(){		
		$this->model->set_datas($_POST);
		$this->view->generate('view_feedback_push.php', 'view_template.php');
	}
}