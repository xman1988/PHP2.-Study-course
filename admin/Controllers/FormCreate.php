<?php

namespace admin\Controllers;

use admin\Controller;


class FormCreate extends Controller
{
	protected function handle()
	{
		echo $this->view->render(__DIR__ . '/../Views/formCreate.php');
	}
}