<?php
namespace admin\Controllers;

use admin\Controller;
use App\Models\Article;
use App\Models\Author;

class FormEdit extends Controller
{
	public function handle()
	{
		/**
		 * Компонент выводит в форму данные статьи для редактирования.
		 */
		$id = $_GET['id'];

		// Выбираем статью из БД по переданному первичному ключу
		$this->view->article = Article::findById($id);

		// Если поле author_id  БД(таблица article) содержит NULL, то присваиваем $authorName значение 'Без автора'
		if (null === $this->view->article->author_id) {
			$this->view->article->authorName = 'Без автора';
		} else {
			// находим поле с именем автора по author_id
			$author = Author::findById($this->view->article->author_id);
			$this->view->article->authorName = $author->name;
		}
		// выводим свойства загруженного из БД объекта статьи в поля формы  
		echo $this->view->render(__DIR__ . '/../Views/formEdit.php');
	}
}
