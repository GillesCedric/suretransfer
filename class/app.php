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

	static function msg(string $msg)
	{
		self::error($msg);
	}

	static function error(string $msg)
	{
		echo ("<script type='text/javascript'>
		alert('" . $msg . "');</script>");
		// 	echo ('
		// 	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		//   <div class="modal-dialog" role="document">
		//     <div class="modal-content">
		//       <div class="modal-header">
		//         <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
		//         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
		//           <span aria-hidden="true">×</span>
		//         </button>
		//       </div>
		//       <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
		//       <div class="modal-footer">
		//         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
		//         <a class="btn btn-primary" href="login.html">Logout</a>
		//       </div>
		//     </div>
		//   </div>
		// </div>
		// 	');
	}
}
