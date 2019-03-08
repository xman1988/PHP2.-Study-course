<?php
/**
 * Created by PhpStorm.
 * User: Andrei
 * Date: 06.03.2019
 * Time: 19:58
 */

namespace App\Models;

use app\Model;


class User extends Model
{
	protected static $table = 'users';
	public $email;
	public $password;
}
