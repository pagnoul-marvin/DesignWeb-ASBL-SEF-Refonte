<footer>

    <div class="footer_container">

        <nav class="secondary_nav flex_container">

            <h2 class="hidden">Navigation secondaire</h2>

            <div>

                <h3><span class="red_text">Navigation</span></h3>

                <ul class="flex_container">

                    <?php foreach (dw_get_navigation_links('footer') as $link): ?>
                        <li class="footer_nav_item">
                            <a class="footer_nav_item_link normal_link" href="<?= $link->url ?>"
                               title="Aller vers la page <?= $link->label ?>"><?= $link->label ?></a>
                        </li>
                    <?php endforeach; ?>

                </ul>

            </div>

            <div>

                <h3>Nos <span class="red_text">r&eacute;seaux sociaux</span></h3>

                <ul class="flex_container">

                    <?php foreach (dw_get_navigation_links('socials') as $link): ?>
                        <li class="socials_nav_item" itemprop="sameAs" itemscope itemtype="https://schema.org/URL">
                            <a itemprop="url" class="socials_nav_item_link logo_link" href="<?= $link->url ?>"
                               title="Aller vers la page <?= $link->label ?>"><?= $link->label ?></a>
                        </li>
                    <?php endforeach; ?>

                </ul>

            </div>

            <div>

                <h3>Nos <span class="red_text">ASBL sœurs</span></h3>

                <ul class="flex_container">

                    <?php foreach (dw_get_navigation_links('asbl_partners') as $link): ?>
                        <li class="partners_nav_item">
                            <a class="partners_nav_item_link normal_link" hreflang="fr" href="<?= $link->url ?>"
                               title="Aller vers le site de <?= $link->label ?>"><?= $link->label ?></a>
                        </li>
                    <?php endforeach; ?>

                </ul>

            </div>

            <div>

                <h3><span class="red_text">Contact</span></h3>

                <ul class="flex_container">

                    <?php

                    $contact_navigation = new WP_Query([
                        'post_type' => 'contact-navigation',
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                        'orderby' => 'date',
                        'order' => 'ASC'
                    ]);

                    if ($contact_navigation->have_posts()) : while ($contact_navigation->have_posts()) :$contact_navigation->the_post() ?>

                        <?php if (get_field('contact_navigation_title')): ?>

                            <li><p><?= get_field('contact_navigation_title') ?></p></li>

                        <?php endif; ?>

                        <?php if (get_field('contact_navigation_link')): ?>

                            <li class="contact_nav_item" itemprop="contactPoint" itemscope itemtype="https://schema.org/ContactPoint">
                                <a class="contact_nav_item_link normal_link" title="Contacter"
                                   href="<?= get_field('contact_navigation_link')['url'] ?>">
                                    <?= get_field('contact_navigation_link')['title'] ?>
                                </a>
                            </li>

                        <?php endif; ?>

                    <?php endwhile; endif; ?>

                </ul>

            </div>

        </nav>

        <div class="legal_notice_container">

            <p>&copy; 2024 ASBL SEF. Tous droits r&eacute;serv&eacute;s.</p>

            <p>Cr&eacute;&eacute; par
                <a title="Aller vers le portfolio de Marvin Pagnoul" class="normal_link"
                                             hreflang="fr" href="https://portfolio.marvinpagnoul.be">Marvin Pagnoul</a>
            </p>

            <a title="Aller vers la page Mentions légales" class="normal_link" href="<?= home_url() . '/mentions-legales/' ?>">Mentions l&eacute;gales</a>

        </div>

    </div>

</footer>

<div id="progress_bar" class="progress_bar"></div>

</body>

</html>
