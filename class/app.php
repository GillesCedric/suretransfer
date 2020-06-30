<?php

final class App
{

	static function redirect(string $location): void
	{
		header('location:' . $location);
	}

	static function addSession(array $values): void
	{
		foreach ($values as $key => $data) {
			$_SESSION[$key] = $data;
		}
	}

	static function verifSession(array $values): bool
	{
		foreach ($values as $key => $data) {
			if (isset($_SESSION[$key]) && !empty($_SESSION[$key])) return true;
		}
		return false;
	}

	static function deleteSession(array $values): void
	{
		foreach ($values as $key => $data) {
			$_SESSION[$key] = '';
		}
	}

	static function deleteAllSession(array $values): void
	{
		foreach ($values as $key => $data) {
			$_SESSION = array();
			session_destroy();
		}
	}

	static function error(string $msg)
	{
		// echo ("<script type='text/javascript'>
		// alert('" . $msg . "');</script>");
		echo ("
		
		");
	}
}
