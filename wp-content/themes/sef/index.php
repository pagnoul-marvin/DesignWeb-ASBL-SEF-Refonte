<?php
/* Template Name: Home */
get_header();

$home_hero_section = new WP_Query([
    'post_type' => 'home-hero-section',
    'posts_per_page' => 1,
    'post_status' => 'publish',
]);

$home_last_projects = new WP_Query([
    'post_type' => 'project',
    'posts_per_page' => 3,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'ASC',
]);

$home_stats = new WP_Query([
    'post_type' => 'home-statistic',
    'posts_per_page' => 1,
    'post_status' => 'publish',
]);

$home_testimonials = new WP_Query([
   'post_type' => 'home-testimonial',
   'posts_per_page' => -1,
   'post_status' => 'publish',
   'orderby' => 'date',
   'order' => 'DESC',
]);

?>

    <main>

        <?php dw_component('no_js_banner'); ?>

        <section class="first_section">

            <?php if ($home_hero_section->have_posts()) : while ($home_hero_section->have_posts()) :$home_hero_section->the_post() ?>

                <div class="home_hero_container centered">

                    <h2 class="main_title">

                        <?= get_field('home_hero_section_title') ?>

                        <span class="red_text">

                        <?= get_field('home_hero_section_title_red') ?>

                    </span>

                    </h2>

                    <p class="catchphrase" itemprop="slogan">

                        <?= get_field('home_hero_section_catchphrase_started') ?>

                        <span class="red_text">

                        <?= get_field('home_hero_section_catchphrase_red') ?>

                    </span>

                        <?= get_field('home_hero_section_catchphrase_finish') ?>

                    </p>

                    <div class="link_container flex_container">

                        <a title="Aller vers la page <?= get_field('home_hero_section_first_link')['title'] ?>"
                           class="cta_link white_link"
                           href="<?= get_field('home_hero_section_first_link')['url'] ?>"><?= get_field('home_hero_section_first_link')['title'] ?>
                        </a>

                        <a title="Aller vers la page <?= get_field('home_hero_section_second_link')['title'] ?>"
                           class="cta_link light_link"
                           href="<?= get_field('home_hero_section_second_link')['url'] ?>"><?= get_field('home_hero_section_second_link')['title'] ?>
                        </a>

                    </div>

                    <div class="scroll_down">

                        <p>Scrollez vers le bas</p>

                    </div>

                </div>

            <?php endwhile; endif; ?>

        </section>

        <section class="section light_red_section">

            <h2 class="secondary_title">Nos derniers projets</h2>

            <div class="last_project_container flex_container">

                <?php if ($home_last_projects->have_posts()) : while ($home_last_projects->have_posts()) :$home_last_projects->the_post() ?>

                    <article class="last_project flex_container" itemprop="event" itemscope itemtype="https://schema.org/Event">

                        <div class="image_container">

                            <img src="<?= get_field('project_first_image')['url'] ?>"
                                 alt="<?= get_field('project_first_image')['alt'] ?>"
                                 width="<?= get_field('project_first_image')['width'] ?>"
                                 height="<?= get_field('project_first_image')['height'] ?>">

                        </div>

                        <div class="last_project_content_container">

                            <h3 itemprop="about"><?= get_field('project_title') ?></h3>

                            <time datetime="<?= get_the_modified_time('c'); ?>"><?= get_the_modified_time('d F Y') ?></time>

                        </div>

                        <a class="card_link" title="Aller voir le projet"
                           href="<?= get_field('project_link')['url'] ?>"></a>

                    </article>

                <?php endwhile; endif; ?>

                <a class="cta_link light_link logo_link" title="Aller voir tous nos projets"
                   href="<?= home_url() . '/nos-projets/' ?>">Tous nos projets</a>

            </div>

        </section>

        <section class="centered section dark_red_section">

            <h2 class="secondary_title">Quelques statistiques</h2>

            <?php if ($home_stats->have_posts()) : while ($home_stats->have_posts()) :$home_stats->the_post() ?>


                <div class="stat_container">

                    <ul class="flex_container">

                        <li class="flex_container">

                            <h3><?= get_field('first_stat_pourcentage') ?></h3>

                            <p><?= get_field('first_stat_description') ?></p>

                        </li>

                        <li class="flex_container">

                            <h3><?= get_field('second_stat_pourcentage') ?></h3>

                            <p><?= get_field('second_stat_description') ?></p>

                        </li>

                        <li class="flex_container">

                            <h3><?= get_field('third_stat_pourcentage') ?></h3>

                            <p><?= get_field('third_stat_description') ?></p>

                        </li>

                    </ul>

                </div>

            <?php endwhile; endif; ?>

        </section>

        <section class="section light_red_section" itemprop="review" itemscope itemtype="https://schema.org/Review">

            <h2 class="secondary_title">Quelques t&eacute;moignages</h2>

            <div class="testimonial_container">

                <ul id="slider" class="flex_container">

                    <?php if ($home_testimonials->have_posts()) : while ($home_testimonials->have_posts()) :$home_testimonials->the_post() ?>

                        <li class="slider_element" itemprop="reviewBody">

                            <h3><?= get_field('home_testimonial_person') ?></h3>

                            <p><?= get_field('home_testimonial_message') ?></p>

                        </li>

                    <?php endwhile; endif; ?>

                </ul>

                <div class="after_and_before_links flex_container">

                    <button class="slider_button cta_link light_link logo_link" id="before" title="Témoignage précédent">Pr&eacute;c&eacute;dent</button>
                    <button class="slider_button cta_link light_link logo_link" id="after" title="Témoignage suivant">Suivant</button>

                </div>

            </div>

        </section>

    </main>

<?php get_footer() ?>