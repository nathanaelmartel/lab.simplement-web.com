<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);


if (isset($_POST['json'])) {

}

?><!DOCTYPE html>
<html lang="fr">

  <head>
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/_head.php') ?>
    <title>Json Pretty Print</title>

  </head>
  <body>


    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/_header.php') ?>

        <section id="content">
			<h1>Json Pretty Print</h1>
            <h2>json_encode($json, JSON_PRETTY_PRINT)</h2>

            <form action="" method="POST">
                <fieldset>
                    <legend>Json</legend>
                    <p><textarea name="json" id="json" cols="30" rows="10" required ></textarea></p>
                    <input type="submit" value="Pretty Print" />
                </fieldset>
            </form>

            <?php if (isset($_POST['json'])): ?>
                <pre><?php echo json_encode(json_decode($_POST['json']), JSON_PRETTY_PRINT) ?></pre>
            <?php endif ?>
	    </section>

    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/_footer.php') ?>



      </body>
    </html>
