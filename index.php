<!DOCTYPE html>
<html lang="fr">

  <head>
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/_head.php') ?>
    <title>simplement Web</title>

  </head>
  <body>


    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/_header.php') ?>

<section id="content">
    <ul class="competences">
        <?php foreach ($nav as $category): ?>
            <?php if (count($category['childs']) > 0): ?>
                <?php foreach ($category['childs'] as $url => $name): ?>
                    <li>
                        <a href="<?php echo $url ?>/">
                            <strong><?php echo $name ?></strong>
                        </a>
                    </li>
                <?php endforeach ?>
            <?php else: ?>
                <li>
                    <a href="<?php echo $category['url'] ?>/">
                        <strong><?php echo $category['name'] ?></strong>
                    </a>
                </li>
            <?php endif ?>
        <?php endforeach ?>
    </ul>
</section>

    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/_footer.php') ?>


  </body>
</html>
