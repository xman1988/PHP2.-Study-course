<?php

namespace app;


class Db
{
	protected $dbh;

	public function __construct()
	{
		$user = 'root';
		$pass = '';
		$this->dbh = new \PDO('mysql:host=localhost;dbname=php2', $user, $pass);
	}

	public function query($sql, $params = [], $class = null)
	{
		$this->dbh->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
		$sth = $this->dbh->prepare($sql);

		if (false === $sth->execute($params)) {
			return false;
		}
		if (null === $class) {
			return $sth->fetchAll(\PDO::FETCH_ASSOC);
		}
		$ret = [];
		while ($row = $sth->fetchObject($class)) {
			$ret[] = $row;
		}
		if (empty($ret)) {
			return false;
		}
		return $ret;
	}

	public function execute($query, $params = [])
	{
		if (isset($params[':email'])) {
			$filterResult = filter_var($params[':email'], FILTER_VALIDATE_EMAIL);
			if ($filterResult == false) {
				$result['Error'] = 'E-mail не прошел валидацию';
				return $result;
			}
		}
		$result = $this->dbh->prepare($query)->execute($params);
		if (!$result) {
			return $this->dbh->errorInfo();
		}
		return $result;
	}

	public function lastInsertString()
	{
		return $this->dbh->lastInsertId();
	}
}
