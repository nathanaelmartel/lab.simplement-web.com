

    <a href="#content" class="sr-only sr-only-focusable">Accédez au contenu</a>

	<header>
        <nav>
            <label for="toggle-menu" title="menu" role="navigation"><i class="fal fa-bars"></i></label><input type="checkbox" id="toggle-menu">
            <ul>
                <?php foreach ($nav as $category):
                    $current = ($current_page == $category['url']);
                    if (isset($category['childs']) && is_array($category['childs']) && (count($category['childs']) > 0)) {
                        if (isset($category['childs'][$current_page])) {
                            $current = true;
                        }
                    }
                ?>
                    <li>
                        <a href="<?php echo $category['url'] ?>/" <?php if ($current):?>class="current"<?php endif ?>>
                            <?php echo $category['name'] ?>
                        </a>
                        <?php if (isset($category['childs']) && is_array($category['childs']) && (count($category['childs']) > 0)): ?>
                            <ul>
                                <?php foreach ($category['childs'] as $url => $name): ?>
                                    <li>
                                        <a href="<?php echo $url ?>/" <?php if ($current_page == $url):?>class="current"<?php endif ?>>
                                            <?php echo $name ?>
                                        </a>
                                    </li>
                                <?php endforeach ?>
                            </ul>
                        <?php endif ?>
                    </li>
                <?php endforeach ?>
                <li><a href="https://www.simplement-web.com/" title="simplement Web"><img src="/favicon.png" alt="simplement Web"></a></li>
            </ul>
        </nav>

	</header>
