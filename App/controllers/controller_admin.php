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
		$this->view->generate('view_admin_auth.php', 'view_template.php');
	}

	function action_auth()
	{
		if ($_POST["nick"]=="admin" && $_POST["password"]=="123"){
			$data = $this->model->get_data();	
			$this->view->generate('view_admin.php', 'view_template.php', $data);
		}
		else
			$this->view->generate('view_accsess_denied.php', 'view_template.php');
	}
	function action_confirm()
	{
		$this->model->confirm();
	}

	function action_edit()
	{
		$this->model->edit();
	}
}