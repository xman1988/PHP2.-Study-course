<?php

function __autoload($class){
	$file = str_replace('\\', '/', $class) . '.php';
	require_once __DIR__ . '/' . $file;
}
