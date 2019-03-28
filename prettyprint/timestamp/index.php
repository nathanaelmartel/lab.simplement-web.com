<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

if (isset($_POST['timestamp']) && isset($_POST['decode'])) {
    $timestamp = date('c', $_POST['timestamp']);
}
if (isset($_POST['timestamp']) && isset($_POST['encode'])) {
    $timestamp = strtotime($_POST['timestamp']);
}

?><!DOCTYPE html>
<html lang="fr">

  <head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/_head.php'; ?>
    <title>Timestamp</title>

  </head>
  <body>


    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/_header.php'; ?>

        <section id="content">
			<h1>Timestamp</h1>
            <h2>strtotime(), date()</h2>

            <form action="" method="POST">
                <fieldset>
                    <legend>Text</legend>
                    <p><input type="text" name="timestamp" value="<?php echo isset($_POST['timestamp']) ? $_POST['timestamp'] : ''; ?>"></p>
                    <input type="submit" name="decode" value="Get the date" />
                    <input type="submit" name="encode" value="Get the timestamp" />
                </fieldset>
            </form>

            <?php if (isset($_POST['timestamp'])): ?>
                <h2><?php echo $timestamp; ?></h2>
            <?php endif; ?>
	    </section>

    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/_footer.php'; ?>



      </body>
    </html>
