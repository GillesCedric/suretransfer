<?php
require_once(dirname(dirname(dirname(dirname(__DIR__)))) . '/config.php');
require_once(CLASS_PATH . '/dbconnection.php');
require_once(CONTROLLERS_PATH . '/abstract/connection.php');
require_once(MODELS_PATH . '/station.php');

class StationAdminConnection extends Connection
{
	public function __construct(string $login, string $password)
	{
		parent::__construct($login, $password);
		if (!empty($this->login) && !empty($this->password)) {
			$client = Station::verifConnect($this->login, $this->password);
			if ($client !== false) {
				$client = $client->fetch();
				Station::connect($client['id']);
			} else {
				App::error('Login et/ou mot de passe incorrect');
			}
		} else {
			App::error('Veuillez saisir votre login et votre mot de passe');
		}
	}
}
