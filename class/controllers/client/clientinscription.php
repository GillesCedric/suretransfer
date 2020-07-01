<?php
require_once(dirname(dirname(dirname(__DIR__))) . '\config.php');
require_once(CONTROLLERS_PATH . '/abstract/inscription.php');
require_once(CLASS_PATH . '/dbconnection.php');
require_once(MODELS_PATH . '/client.php');

class ClientInscription extends Inscription
{
	public function __construct(string $numCni, string $nom, string $prenom, string $tel, string $mail, string $login, string $password, string $confirmpassword, string $statut)
	{
		parent::__construct($numCni, $nom, $prenom, $tel, $mail, $login, $password, $confirmpassword, $statut);
		if (!empty($this->numCni) && !empty($this->nom) && !empty($this->prenom) && !empty($this->tel) && !empty($this->mail) && !empty($this->login) && !empty($this->password) && !empty($this->confirmpassword) && !empty($this->statut)) {
			if ($this->password == $this->confirmpassword) {
				if (Client::verifLogin($login)) {
					if (Client::verifMail($mail)) {
						$client = new Client($this->prenom, $this->mail, $this->login, $this->password, $this->numCni, $this->nom, $this->tel, $this->statut);
						$client->insert();
						App::msg('Inscription effectué');
						App::redirect('connection.php');
					} else {
						App::error('Cette addresse mail est déjà utilisé');
					}
				} else {
					App::error('Ce login est déjà utilisé');
				}
			} else {
				App::error('Le mot de passe et la confirmation ne correspondent pas');
			}
		}
	}
}
