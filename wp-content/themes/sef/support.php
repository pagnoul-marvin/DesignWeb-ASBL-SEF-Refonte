<?php
/* Template Name: Support */
get_header();


$support_financial = new WP_Query([
    'post_type' => 'support-financial',
    'post_status' => 'publish',
    'posts_per_page' => 1,
]);

$support_material = new WP_Query([
    'post_type' => 'support-material',
    'post_status' => 'publish',
    'posts_per_page' => 1,
]);

?>

<main>

    <section class="section">

        <h2 class="main_title">Nous <span class="red_text">soutenir</span></h2>

    </section>

    <section class="light_red_section section">

        <h2 class="secondary_title">Financi&egrave;rement</h2>

        <div class="financial_donation_container">

            <?php if ($support_financial->have_posts()) : while ($support_financial->have_posts()) :$support_financial->the_post() ?>

                <p><?= get_field('fd_first_text') ?></p>

                <ul>

                    <li><?= get_field('fd_first_account') ?></li>
                    <li><?= get_field('fd_second_account') ?></li>

                </ul>

                <p><?= get_field('fd_second_text') ?></p>

                <p><?= get_field('fd_third_text') ?></p>

            <?php endwhile; endif; ?>

        </div>

    </section>

    <section class="section dark_red_section">

        <h2 class="secondary_title">Dons mat&eacute;riels</h2>

        <div class="material_donation_container">

            <?php if ($support_material->have_posts()) : while ($support_material->have_posts()) :$support_material->the_post() ?>

                <p><?= get_field('md_first_text') ?></p>

                <ul>

                    <li><?= get_field('md_first_shop') ?></li>
                    <li><?= get_field('md_second_shop') ?></li>
                    <li><?= get_field('md_third_shop') ?></li>

                </ul>

                <p><?= get_field('md_second_text') ?></p>

                <a href="<?= get_field('md_link')['url'] ?>" title="Aller voir les horaires sur la page &Agrave; propos" class="cta_link dark_link"><?= get_field('md_link')['title'] ?></a>

            <?php endwhile; endif; ?>

        </div>

    </section>

    <?php dw_component('contact_and_support_us', [
        'contact' => 'yes',
        'support' => null
    ]) ?>

</main>

<?php get_footer() ?>
