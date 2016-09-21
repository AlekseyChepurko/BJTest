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
		// var_dump($_FILES);
		$this->model->set_data($_POST, $_FILES);
		$this->view->generate('view_feedback_push.php', 'view_template.php');
	}
}