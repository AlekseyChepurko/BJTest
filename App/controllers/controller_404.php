<?
class Controller_404 extends Controller
{

	function __construct()
	{
		$this->model = new Model_404();
		$this->view = new View();
	}
	
	function action_index()
	{
		$data = $this->model->get_data();		
		$this->view->generate('view_404.php', 'view_template.php', $data);
	}
}