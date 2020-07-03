<?php
class Mail
{
	private string $numCommande;

	public function __construct(string $numCommande)
	{
		$this->numCommande = $numCommande;
	}

	public function sendMailConfirmation()
	{
		$client = Commande::get($this->numCommande);
		$clients = $client->fetch();
		$message = '
        <html>
          <head>
            <title>Confirmation de commande
            </title>
            <meta charset="utf-8">
          </head>
          <body>
            <font color="#303030";>
              <div align="center">
                <table width="600px">
                  <tr>
                    <td background="https://parainage-3iac.neway-agency.com/img/favicon.ico">
                  </tr>
                  <tr>
                    <td>
                      <br>
                      <div align="center">
                        Bonjour Mr/Mme <b>' . $clients['nomclient'] . ' ' . $clients['prenomclient'] . '</b>,
                      </div><br>
                      Votre commande N° ' . $clients['num_commande'] . ' a été confirmé et est maintenant en cours.<br>Merci d\'avoir utilisé le service <b>SURETRANSFER</b><br><br>
                      A bientôt sur <a href="https://suretransfer.com/">suretransfer.com</a> !<br><br><br><br><br>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <hr>
                    </td>
                  </tr>
                  <tr>
                    <td align="center">
                      <font size="2">
                        Ceci est un email automatique, merci de ne pas y répondre.<br>Si vous avez un soucis? contactez nous à l\'adresse <b>cedric.nguefack@tapmeppe.com</b>
                      </font>
                    </td>
                  </tr>
                </table>
              </div>
            </font>
          </body>
        </html>';
		$header = "MIME-version: 1.0\r\n";
		$header .= 'From:"suretransfer.com"<cedric.nguefack@tapmeppe.com>' . "\n";
		$header .= 'content-Type:text/html;charset="utf-8"' . "\n";
		$header .= 'content-Transfer-Encoding: 8bit';
		mail($this->mailc, 'Confirmation de commande', $message, $header);
	}

	public function sendMailEnregistrement()
	{
		$client = Commande::get($this->numCommande);
		$clients = $client->fetch();
		$message = '
        <html>
          <head>
            <title>Commande Enregistrée
            </title>
            <meta charset="utf-8">
          </head>
          <body>
            <font color="#303030";>
              <div align="center">
                <table width="600px">
                  <tr>
                    <td background="https://parainage-3iac.neway-agency.com/img/favicon.ico">
                  </tr>
                  <tr>
                    <td>
                      <br>
                      <div align="center">
                        Bonjour Mr/Mme <b>' . $clients['nomclient'] . ' ' . $clients['prenomclient'] . '</b>,
                      </div><br>
                      Votre commande N° ' . $clients['num_commande'] . ' a été enregistrée et est maintenant en attente de confirmation.<br>Merci d\'avoir utilisé le service <b>SURETRANSFER</b><br><br>
                      A bientôt sur <a href="https://suretransfer.com/">suretransfer.com</a> !<br><br><br><br><br>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <hr>
                    </td>
                  </tr>
                  <tr>
                    <td align="center">
                      <font size="2">
                        Ceci est un email automatique, merci de ne pas y répondre.<br>Si vous avez un soucis? contactez nous à l\'adresse <b>cedric.nguefack@tapmeppe.com</b>
                      </font>
                    </td>
                  </tr>
                </table>
              </div>
            </font>
          </body>
        </html>';
		$header = "MIME-version: 1.0\r\n";
		$header .= 'From:"suretransfer.com"<cedric.nguefack@tapmeppe.com>' . "\n";
		$header .= 'content-Type:text/html;charset="utf-8"' . "\n";
		$header .= 'content-Transfer-Encoding: 8bit';
		mail($this->mailc, 'Commande enregistrée', $message, $header);
	}

	public function sendMailEffectue()
	{
		$client = Commande::get($this->numCommande);
		$clients = $client->fetch();
		$message = '
        <html>
          <head>
            <title>Commande terminée
            </title>
            <meta charset="utf-8">
          </head>
          <body>
            <font color="#303030";>
              <div align="center">
                <table width="600px">
                  <tr>
                    <td background="https://parainage-3iac.neway-agency.com/img/favicon.ico">
                  </tr>
                  <tr>
                    <td>
                      <br>
                      <div align="center">
                        Bonjour Mr/Mme <b>' . $clients['nomclient'] . ' ' . $clients['prenomclient'] . '</b>,
                      </div><br>
                      Votre commande N° ' . $clients['num_commande'] . ' a été effectutée et est maintenant terminé.<br>Merci d\'avoir utilisé le service <b>SURETRANSFER</b><br><br>
                      A bientôt sur <a href="https://suretransfer.com/">suretransfer.com</a> !<br><br><br><br><br>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <hr>
                    </td>
                  </tr>
                  <tr>
                    <td align="center">
                      <font size="2">
                        Ceci est un email automatique, merci de ne pas y répondre.<br>Si vous avez un soucis? contactez nous à l\'adresse <b>cedric.nguefack@tapmeppe.com</b>
                      </font>
                    </td>
                  </tr>
                </table>
              </div>
            </font>
          </body>
        </html>';
		$header = "MIME-version: 1.0\r\n";
		$header .= 'From:"suretransfer.com"<cedric.nguefack@tapmeppe.com>' . "\n";
		$header .= 'content-Type:text/html;charset="utf-8"' . "\n";
		$header .= 'content-Transfer-Encoding: 8bit';
		mail($this->mailc, 'Commande terminé', $message, $header);
	}

	public function sendMailAnnulation()
	{
		$client = Commande::get($this->numCommande);
		$clients = $client->fetch();
		$message = '
        <html>
          <head>
            <title>Commande annulée
            </title>
            <meta charset="utf-8">
          </head>
          <body>
            <font color="#303030";>
              <div align="center">
                <table width="600px">
                  <tr>
                    <td background="https://parainage-3iac.neway-agency.com/img/favicon.ico">
                  </tr>
                  <tr>
                    <td>
                      <br>
                      <div align="center">
                        Bonjour Mr/Mme <b>' . $clients['nomclient'] . ' ' . $clients['prenomclient'] . '</b>,
                      </div><br>
                      Votre commande N° ' . $clients['num_commande'] . ' a été annulée.<br>Merci d\'avoir utilisé le service <b>SURETRANSFER</b><br><br>
                      A bientôt sur <a href="https://suretransfer.com/">suretransfer.com</a> !<br><br><br><br><br>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <hr>
                    </td>
                  </tr>
                  <tr>
                    <td align="center">
                      <font size="2">
                        Ceci est un email automatique, merci de ne pas y répondre.<br>Si vous avez un soucis? contactez nous à l\'adresse <b>cedric.nguefack@tapmeppe.com</b>
                      </font>
                    </td>
                  </tr>
                </table>
              </div>
            </font>
          </body>
        </html>';
		$header = "MIME-version: 1.0\r\n";
		$header .= 'From:"suretransfer.com"<cedric.nguefack@tapmeppe.com>' . "\n";
		$header .= 'content-Type:text/html;charset="utf-8"' . "\n";
		$header .= 'content-Transfer-Encoding: 8bit';
		mail($this->mailc, 'Commande annulé', $message, $header);
	}
}
