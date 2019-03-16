<?php
namespace App;

/**
 * Модель работы с конфигурациями
 *
 */
class Config
{
	/**
	 * @var array $data Массив настроек
	 */
	public $data;

	/**
	 * @var object $instance Объект класса Config
	 */
	protected static $instance = null;


	protected function __construct()
	{
		$this->data = require __DIR__ . '/settings/config.php';
	}

	/**
	 * Метод реализует singleton класса Config
	 *
	 * @return object объект класса Config
	 *
	 */
	public static function instance()
	{
		if (null === self::$instance) {
			self::$instance = new self();
			return self::$instance;
		}
		return self::$instance;
	}
}
