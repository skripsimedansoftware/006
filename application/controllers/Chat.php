<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index($option = 'view', $id = NULL)
	{
		if (!empty($id))
		{

		}
	}

	public function message($room_id)
	{
		
	}

	public function messages($room_id = NULL, $limit = 10, $offset = 0)
	{

	}
}

/* End of file Chat.php */
/* Location: ./application/controllers/Chat.php */