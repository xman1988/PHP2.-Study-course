<?php

namespace admin;

use app\View;


abstract class Controller
{
	protected $view;

	public function __construct()
	{
		$this->view = new View();
	}

	protected function access()
	{
		return true;
	}

	public function action()
	{
		if ($this->access()) {
			return $this->handle();
		}
		die('Нет доступа');

	}

	abstract protected function handle();
}