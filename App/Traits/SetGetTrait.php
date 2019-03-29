<?php

namespace App\Traits;

/**
 * Трейт доступа к защищенным свойствам объекта
 * записывает свойства объекта, созданные 'на лету' с помощью __set в защищенное свойство $data
 * и дает доступ к $data с помощью __get.
 * метод __isset используем, чтобы пользоваться проверкой isset(some object property) при необходимости
 * 
 */
trait SetGetTrait
{
// защищенный массив со свойствами объекта
	protected $data = [];

	/**
	 * записывает свойства объекта, созданные 'на лету' в защищенное свойство с массивом $data
	 *
	 * @return void
	 */
	public function __set($name, $value)
	{
		$this->data[$name] = $value;
	}

	/**
	 * Предоставляет доступ к $data
	 *
	 * @return mixed Возвращает значение записанного ранее свойства, либо NUll, если свойства с таким именем нет
	 */
	public function __get($name)
	{
		return $this->data[$name] ?? null;
	}

	/**
	 * метод для возможности проверки свойств в $data на существование, т.е isset($data-> some object property)
	 *
	 * @return boolean
	 */
	public function __isset($name)
	{
		return isset($this->data[$name]);
	}

}