

    <a href="#content" class="sr-only sr-only-focusable">Accédez au contenu</a>

	<header>
        <div class="header-top">
            <a href="/" class="logo"><img src="/assets/images/logo.svg" alt=""></a>

            <div class="contact">
                <div itemscope itemtype="http://schema.org/Organization">
                	<a itemprop="url" href="https://www.simplement-web.com/" class="brand" ><strong itemprop="name">simplement Web</strong></a>
                	<div itemprop="founder" itemscope itemtype="http://schema.org/Person">
        		        <a href="https://nathanaelmartel.net/" itemprop="url" ><span itemprop="name">Nathanaël Martel</span></a> <br />
                        Votre <a href="https://certificates.opquast.com/certificate/QY5WTB/" target="_blank" title="Certification Expert Opquast : Maîtrise de la qualité en projet Web">expert qualité web</a> <br />
        		        <span class="sr-only">Tel :</span> <a class="tel" itemprop="telephone" href="tel:+33781948086">07 81 94 80 86</a><br />
        		        <span class="sr-only">mail :</span> <a href="mailto:nathanael@simplement-web.com" class="mail"><span itemprop="email">nathanael@simplement-web.com</span></a><br /><br />
        	        </div>
                </div>
            </div>
        </div>

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
            </ul>
        </nav>

	</header>
