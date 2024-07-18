<?php
/* Template Name: Legal notices */
get_header();

$legal_notices = new WP_Query([
    'post_type' => 'legal-notice',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'ASC',
]);

$recently_modified_notice = new WP_Query([
    'post_type' => 'legal-notice',
    'post_status' => 'publish',
    'orderby' => 'modified',
    'order' => 'DESC',
    'posts_per_page' => 1
]);

?>

    <main>

        <?php dw_component('no_js_banner'); ?>

        <section class="section">

            <h2 class="main_title">Mentions <span class="red_text">l&eacute;gales</span></h2>

        </section>

        <div class="ln_container flex_container">

            <?php if ($recently_modified_notice->have_posts()) : ?>
                <?php $recently_modified_notice->the_post(); ?>
                <div class="last_time_modified section">

                    <p class="text">Derni&egrave;re modification des mentions l&eacute;gales&nbsp;: <?= get_the_modified_time('d F Y') ?></p>

                </div>

            <?php endif; ?>

            <?php if ($legal_notices->have_posts()) : while ($legal_notices->have_posts()) :$legal_notices->the_post() ?>

                <?php if (get_field('owner_name')): ?>

                    <section class="section">

                        <h2 class="secondary_title"><?= get_field('owner_title') ?></h2>

                        <p><?= get_field('owner_name') ?></p>
                        <p><?= get_field('owner_address') ?></p>
                        <p><?= get_field('owner_mail') ?></p>
                        <p><?= get_field('owner_tel') ?></p>

                    </section>

                <?php else: ?>

                    <section class="section">

                        <h2 class="secondary_title"><?= get_field('ln_title') ?></h2>

                        <p><?= get_field('ln_description') ?></p>

                    </section>

                <?php endif; ?>

            <?php endwhile; endif; ?>

        </div>

    </main>


<?php get_footer() ?>