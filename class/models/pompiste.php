<?php
require_once('utilisateur.php');
require_once(dirname(dirname(__DIR__)) . '/config.php');
require_once(CLASS_PATH . '/dbconnection.php');
require_once(CLASS_PATH . '/mail.php');
class Pompiste extends Utilisateur
{
	private string $prenom;
	private int $isActivated;
	private int $idAnnexe;

	public function __construct(string $mail, string $numCni, string $nom, string $prenom, string $tel, string $idAnnexe)
	{
		$login = $this->generateLogin($nom);
		$password = $this->generatePassword($nom);
		Mail::sendMailLoginPassword($nom, $mail, $login, $password);
		parent::__construct($mail, $login, $password, $nom, $tel, $numCni);
		$this->isActivated = 1;
		$this->idAnnexe = intval($idAnnexe);
		$this->prenom = $prenom;
	}



	public static function verifConnect(string $value, string $password)
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$verif = $connection->prepare('SELECT * FROM pompiste WHERE login=? AND password=? AND is_activated=1');
		$verif->execute(array($value, $password));
		if ($verif->rowcount() == 1) {
			return $verif;
		}
		return false;
	}

	public static function connect(string $numCni): void
	{
		App::addSession(array('pompiste' => $numCni));
		App::redirect('dashboardpompiste/index.php');
	}

	public static function update(string ...$values)
	{
	}

	public static function updateStatut(string $val, int $statut)
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$update = $connection->prepare('UPDATE pompiste SET is_activated=? WHERE num_cni=?');
		$update->execute(array($statut, $val));
	}

	public static function delete(string $numCni)
	{
	}

	public static function get(string $numCni)
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$verif = $connection->prepare('SELECT * FROM pompiste WHERE num_cni=?');
		$verif->execute(array($numCni));
		if ($verif->rowcount() == 1) {
			return $verif;
		}
		return false;
	}

	public function insert()
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$insert = $connection->prepare('INSERT INTO pompiste(num_cni,nom,prenom,tel,login,mail,password,is_activated,created_at,updated_at,id_annexe) VALUES (?,?,?,?,?,?,?,?,?,?,?)');
		$date = date('Y-m-d H:i:s');
		$insert->execute(array($this->numCni, $this->nom, $this->prenom, $this->tel, $this->login, $this->mail, md5($this->password), $this->isActivated, $date, $date, $this->idAnnexe));
	}

	public static function getAllAnnexe(string $id)
	{
		$connection = new DBConnection(HOST, PORT, DBNAME, DBUSERNAME, DBPASSWORD);
		$connection = $connection->setConnection();
		$verif = $connection->prepare('SELECT * FROM pompiste WHERE id_annexe=?');
		$verif->execute(array($id));
		return $verif;
	}

	public function getNumBox(): int
	{
		return $this->numBox;
	}

	public function setNumBox(int $numBox): void
	{
		$this->numBox = $numBox;
	}

	public function getIsActivated(): bool
	{
		return $this->isActivated;
	}

	public function setIsActivated(int $isActivated): void
	{
		$this->isActivated = $isActivated;
	}
}
