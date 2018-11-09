<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
require_once($_SERVER['DOCUMENT_ROOT'].'/vendor/nathanaelmartel/WhoIsClient.php');
use simplementWeb\WhoIsClient;

if (isset($_POST['url'])) {
    $domain = str_replace('https', '', $_POST['url']);
    $domain = str_replace('http', '', $domain);
    $domain = trim($domain, ' :/');
    $client = new WhoIsClient($domain);
    $dns_records = dns_get_record($domain);
}

$dns_types = array(
    'MX' => 'Mail (MX)',
    'A' => 'A',
    'AAAA' => 'AAAA',
);

?><!DOCTYPE html>
<html lang="fr">

  <head>
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/_head.php') ?>
    <title>Générateur de mots de passe</title>

  </head>
  <body>


    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/_header.php') ?>

        <section id="content">
			<h1>Website info</h1>
            <h2>Registrar, DNS…</h2>

            <form action="" method="POST">
                <fieldset>
                    <legend>Trouver les informations pour le site</legend>
                    <p>
                        <label for="url">Site</label>
                        <input type="url" name="url" id="url" value="<?php echo (isset($_POST['url']))?$_POST['url']:''; ?>" required />
                    </p>
                        <input type="submit" value="Chercher" />
                </fieldset>
            </form>

            <?php if (isset($client)): ?>
                <h2><?php echo $domain ?></h2>
                <ul>
                    <li>Registrar&nbsp;: <a href="<?php echo $client->getRegistrarUrl() ?>"><?php echo $client->getRegistrarName() ?></a></li>
                    <li>Date de création&nbsp;: <?php echo $client->getCreationDate()->format('d/m/Y') ?></li>
                    <li>Date d'expiration&nbsp;: <?php echo $client->getExpirationDate()->format('d/m/Y') ?></li>
                    <li>IP serveur&nbsp;: <?php echo gethostbyname($domain) ?></li>
                    <?php foreach ($dns_records as $dns_record): ?>
                        <?php if (isset($dns_types[$dns_record['type']])): ?>
                            <li><?php echo $dns_types[$dns_record['type']] ?>&nbsp;: <?php echo (isset($dns_record['target']))?$dns_record['target']:$dns_record['ip']; ?></li>
                        <?php endif ?>
                    <?php endforeach ?>
                </ul>
            <?php endif ?>
	    </section>

    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/_footer.php') ?>



      </body>
    </html>
