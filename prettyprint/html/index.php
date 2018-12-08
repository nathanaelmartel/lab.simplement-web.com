<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);


if (isset($_POST['html'])) {
    $tidy = new Tidy;
    $tidy->parseString(
        $_POST['html'],
        array(
           'indent'         => true,
           'output-xhtml'   => true,
           'wrap'           => 200),
        'utf8'
    );
    $tidy->cleanRepair();
}

?><!DOCTYPE html>
<html lang="fr">

  <head>
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/_head.php') ?>
    <title>Tidy HTML</title>

  </head>
  <body>


    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/_header.php') ?>

        <section id="content">
			<h1>Tidy HTML</h1>
            <h2>new tidy</h2>

            <form action="" method="POST">
                <fieldset>
                    <legend>HTML</legend>
                    <p><textarea name="html" id="html" cols="30" rows="10" required ></textarea></p>
                    <input type="submit" value="Tidy HTML" />
                </fieldset>
            </form>

            <?php if (isset($_POST['html'])): ?>
                <pre><?php echo htmlentities($tidy); ?></pre>
            <?php endif ?>
	    </section>

    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/_footer.php') ?>



      </body>
    </html>
