<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/vendor/nathanaelmartel/Password.php');
use simplementWeb\Password;

$password = new Password();

?><!DOCTYPE html>
<html lang="fr">

  <head>
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/_head.php') ?>
    <title>Générateur de mots de passe</title>

  </head>
  <body>


    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/_header.php') ?>

        <section id="content">
			<h1>Générateur de mots de passe</h1>
            <h2>Passwords generator</h2>

            <form action="" method="POST">
                <fieldset>
                    <legend>Génerer un mot de passe</legend>
                    <p>
                        <label for="length">Longueur</label>
                        <input type="number" name="length" id="length" value="<?php echo (isset($_POST['length']))?$_POST['length']:15; ?>" min="4" max="255" required />
                    </p>
                    <p>
                        <label for="strength">Caracèteres</label>
                        <select name="strength" id="strength">
                            <option value="0" <?php if (isset($_POST['strength']) && ($_POST['strength'] == 0)): ?>selected="selected"<?php endif ?>>Lettres minuscules</option>
                            <option value="1" <?php if (isset($_POST['strength']) && ($_POST['strength'] == 1)): ?>selected="selected"<?php endif ?>>Lettres minuscules et majuscules</option>
                            <option value="2" selected="selected">Lettres et chiffres</option>
                            <option value="3" <?php if (isset($_POST['strength']) && ($_POST['strength'] == 3)): ?>selected="selected"<?php endif ?>>Lettres, chiffres et caractères spéciaux</option>
                        </select>
                    </p>
                        <input type="submit" value="Génerer" />
                        <h2><?php
                            if (isset($_POST['length']) && isset($_POST['strength'])) {
                                echo $password->generate($_POST['length'], $_POST['strength']);
                            }
                        ?></h2>
                </fieldset>
            </form>

            <div class="col-flex">
                <ul>
                    <li><?php echo $password->generate(8, 1) ?></li>
                    <li><?php echo $password->generate(8, 1) ?></li>
                    <li><?php echo $password->generate(8, 1) ?></li>
                    <li><?php echo $password->generate(8, 1) ?></li>
                </ul>

                <ul>
                    <li><?php echo $password->generate() ?></li>
                    <li><?php echo $password->generate() ?></li>
                    <li><?php echo $password->generate() ?></li>
                    <li><?php echo $password->generate() ?></li>
                </ul>

                <ul>
                    <li><?php echo $password->generate(18, 3) ?></li>
                    <li><?php echo $password->generate(18, 3) ?></li>
                    <li><?php echo $password->generate(18, 3) ?></li>
                    <li><?php echo $password->generate(18, 3) ?></li>
                </ul>
            </div>
	    </section>

    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/_footer.php') ?>



      </body>
    </html>
