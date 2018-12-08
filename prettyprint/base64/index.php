<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);


if (isset($_POST['base64']) && isset($_POST['decode'])) {
    $base64 = base64_decode($_POST['base64']);
}
if (isset($_POST['base64']) && isset($_POST['encode'])) {
    $base64 = base64_encode($_POST['base64']);
}

?><!DOCTYPE html>
<html lang="fr">

  <head>
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/_head.php') ?>
    <title>Base64</title>

  </head>
  <body>


    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/_header.php') ?>

        <section id="content">
			<h1>Base64</h1>
            <h2>base64_encode(), base64_decode()</h2>

            <form action="" method="POST">
                <fieldset>
                    <legend>Text</legend>
                    <p><input type="text" name="base64" value="<?php echo (isset($_POST['base64'])?$_POST['base64']:'') ?>"></p>
                    <input type="submit" name="decode" value="Decode" />
                    <input type="submit" name="encode" value="Encode" />
                </fieldset>
            </form>

            <?php if (isset($_POST['base64'])): ?>
                <h2><?php echo $base64 ?></h2>
            <?php endif ?>
	    </section>

    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/_footer.php') ?>



      </body>
    </html>
