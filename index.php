<?php
use App\Models\Article;

require_once __DIR__ . '/autoload.php';

/**
 * Единая точка входа для сайта
 * @var integer $articleCount Число выводимых на страницу статей из БД
 */
$articleCount = 3;
/**
 * @var mixed $data Возвращает массив объектов со статьями, либо false в случае ошибки
 */
$data = Article::findLast($articleCount);

include __DIR__ . '/App/Views/index/index.php';
