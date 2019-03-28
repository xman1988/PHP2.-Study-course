<?php

namespace app;

use App\Traits\SetGetTrait;

/**
 * Класс представления
 */
class View implements \Countable, \Iterator
{
	/**
	 * Трейт доступа к защищенным свойствам объекта
	 */
	use SetGetTrait;

	/**
	 * Метод возвращает шаблон представления $template для вывода на экран клиента
	 *
	 * @param string $template путь к шаблону представления
	 *
	 * @return string $content HTML представление из буфера
	 */

	public function render($template)
	{
		/**
		 * Записываем свойство $key(например, 'name') текущего объекта в переменную $$key(т.е. $name)
		 * и присваемаем ей соответствующее значение $value
		 * для удобства пользования ей в шаблоне представления.
		 * Т.е. в представлении вместо foreach( $this->news as ...), будет foreach( $news as ...)
		 */
		foreach ($this as $key => $value) {
			$$key = $value;
		}

		// записываем в буфер шаблон представления
		ob_start();
		include $template;
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}

	/**
	 * Метод возвращает количество свойств у текущего объекта,
	 * метод интерфейса Countable
	 *
	 *
	 * @return int количество свойств у текущего объекта
	 */
	public function count()
	{
		return count($this->data);
	}

	/**
	 * Возвращает позицию текущего элемента массива $this->data,
	 * метод интерфейса Iterator
	 */
	public function current()
	{
		return current($this->data);
	}

	/**
	 *  Переход к следующему элементу,
	 *  метод интерфейса Iterator
	 */
	public function next()
	{
		return next($this->data);
	}

	/**
	 * Возвращает текущий ключ,
	 * метод интерфейса Iterator
	 */
	public function key()
	{
		return key($this->data);
	}

	/**
	 * Проверяет наступил ли конец массива со свойствами объекта,
	 * метод интерфейса Iterator
	 */
	public function valid()
	{
		$isEnd = key($this->data);
		if (NULL !== $isEnd) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Перемотать итератор на первый элемент,
	 * метод интерфейса Iterator
	 */
	public function rewind()
	{
		reset($this->data);
	}
}
