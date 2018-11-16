<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
use simplementWeb\WhoIsClient;
use simplementWeb\FetchFavicons;


if (isset($_POST['url'])) {
    require_once($_SERVER['DOCUMENT_ROOT'].'/vendor/nathanaelmartel/WhoIsClient.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/vendor/nathanaelmartel/FetchFavicons.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');

    $whois = new WhoIsClient($_POST['url']);
    $domain = $whois->getDomain();
    $dns_records = dns_get_record($domain);

    $fetchFavicon = new FetchFavicons($_POST['url']);
    $favicons = $fetchFavicon->getFavicons();
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

            <?php if (isset($whois)): ?>
                <h2>
                    <?php echo $domain ?>
                </h2>
                <ul>
                    <li>Registrar&nbsp;: <a href="<?php echo $whois->getRegistrarUrl() ?>"><?php echo $whois->getRegistrarName() ?></a></li>
                    <li>Date de création&nbsp;: <?php echo $whois->getCreationDate()->format('d/m/Y') ?></li>
                    <li>Date d'expiration&nbsp;: <?php echo $whois->getExpirationDate()->format('d/m/Y') ?></li>
                    <li>IP serveur&nbsp;: <?php echo gethostbyname($domain) ?></li>
                    <?php foreach ($dns_records as $dns_record): ?>
                        <?php if (isset($dns_types[$dns_record['type']])): ?>
                            <li><?php echo $dns_types[$dns_record['type']] ?>&nbsp;: <?php echo (isset($dns_record['target']))?$dns_record['target']:$dns_record['ip']; ?></li>
                        <?php endif ?>
                    <?php endforeach ?>
                </ul>
                <?php foreach ($favicons as $favicon): ?>
                    <img src="<?php echo 'data: '.$favicon['mime'].';base64,'.base64_encode($favicon['content']) ?>" alt="<?php echo $domain ?>" />
                <?php endforeach ?>
            <?php endif ?>
	    </section>

    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/_footer.php') ?>



      </body>
    </html>
