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

	function action_confirm()
	{
		$this->model->confirm();
	}

	function action_edit()
	{
		$this->view->generate('view_edit.php', 'view_template.php', $data);
	}
}