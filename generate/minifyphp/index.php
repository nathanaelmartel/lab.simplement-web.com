<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/nathanaelmartel/MinifyPhp.php';
use simplementWeb\MinifyPhp;

if (isset($_POST['minify'])) {
    $minify = new MinifyPhp();
    $transformed_code = $minify->minify($_POST['code']);
}

?><!DOCTYPE html>
<html lang="fr">

  <head>
    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/_head.php'; ?>
    <title>Minification de PHP</title>
    <link href="/vendor/prism/prism.css" rel="stylesheet" />

  </head>
  <body>


    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/_header.php'; ?>

        <section id="content">
			<h1>Minification de PHP</h1>
            <h2>MinifyPhp</h2>

            <form action="" method="POST">
                <fieldset>
                    <legend>Minifier votre code</legend>
                    <p>
                        <label for="code">Code</label>
                        <textarea name="code" id="code" rows="8" cols="80"><?php echo (isset($_POST['code'])) ? $_POST['code'] : ''; ?></textarea>
                    </p>
                        <input type="submit" name="minify" value="Minifier" />
                </fieldset>
            </form>

            <?php if (isset($_POST['code'])): ?>
                <pre class="code language-php"><code><?php echo $transformed_code; ?></code></pre>
            <?php endif; ?>

	    </section>

    <?php require_once $_SERVER['DOCUMENT_ROOT'].'/_footer.php'; ?>
    <script src="/vendor/prism/prism.js"></script>



      </body>
    </html>
