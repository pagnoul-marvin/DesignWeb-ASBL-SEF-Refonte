<?php
/* Template Name: Home */
get_header();

$home_hero_section = new WP_Query([
    'post_type' => 'home-hero-section',
    'posts_per_page' => 1,
    'post_status' => 'publish',
]);

?>

    <main>

        <section class="first_section">

            <?php if ($home_hero_section->have_posts()) : while ($home_hero_section->have_posts()) :$home_hero_section->the_post() ?>

                <div class="home_hero_container centered">

                    <h2 class="main_title">

                        <?= get_field('home_hero_section_title') ?>

                        <span class="red_text">

                        <?= get_field('home_hero_section_title_red') ?>

                    </span>

                    </h2>

                    <p class="catchphrase">

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

    </main>

<?php get_footer() ?>