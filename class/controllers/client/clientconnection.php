<?php
require_once(dirname(dirname(dirname(__DIR__))) . '/config.php');
require_once(CONTROLLERS_PATH . '/abstract/connection.php');
require_once(CLASS_PATH . '/dbconnection.php');
require_once(MODELS_PATH . '/client.php');

class ClientConnection extends Connection
{
	public function __construct(string $login, string $password)
	{
		parent::__construct($login, $password);
		if (!empty($this->login) && !empty($this->password)) {
			$client = Client::verifConnect($this->login, $this->password);
			if ($client !== false) {
				$client = $client->fetch();
				Client::connect($client['num_cni']);
			} else {
				App::error('Login et/ou mot de passe incorrect');
			}
		} else {
			App::error('Veuillez saisir votre login et votre mot de passe');
		}
	}
}
