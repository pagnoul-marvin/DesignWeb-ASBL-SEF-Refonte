<?php
/** Template Name: Error */
get_header();

$error_page = new WP_Query([
    'post_type' => 'error-page',
    'post_status' => 'publish',
    'posts_per_page' => 1,
]);

?>

    <main>

        <?php var_dump(home_url()) ?>

        <?php if ($error_page->have_posts()) : while ($error_page->have_posts()) :$error_page->the_post() ?>

            <section class="section first_section">

                <h2 class="main_title">Une <span class="red_text">erreur</span> est survenue</h2>

                <p class="error_text"><?= get_field('error_text') ?></p>

                <a class="cta_link white_link" href="<?= get_field('error_link')['url'] ?>" title="<?= get_field('error_link')['title'] ?>"><?= get_field('error_link')['title'] ?></a>

            </section>

        <?php endwhile; endif; ?>

    </main>

<?= get_footer(); ?>