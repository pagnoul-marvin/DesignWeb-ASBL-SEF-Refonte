<?php
/* Template Name: About */
get_header();

$about_goal_and_who = new WP_Query([
    'post_type' => 'about-goal-and-who',
    'posts_per_page' => 2,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'ASC'
]);

$about_houses = new WP_Query([
    'post_type' => 'about-house',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'ASC'
]);

$about_shops = new WP_Query([
    'post_type' => 'about-shop',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'ASC'
]);

?>

<main>

    <section class="section">

        <h2 class="main_title">&Agrave; <span class="red_text">propos</span></h2>

        <div class="goal_and_who_container">

            <?php if ($about_goal_and_who->have_posts()) : while ($about_goal_and_who->have_posts()) :$about_goal_and_who->the_post() ?>

                <article>

                    <?php if (get_field('about_who_and_goal_title_first')): ?>

                        <h3>
                            <span class="red_text"><?= get_field('about_who_and_goal_title_first_red') ?></span> <?= get_field('about_who_and_goal_title_first') ?>
                        </h3>

                    <?php else: ?>

                        <h3><?= get_field('about_who_and_goal_title_second') ?> <span
                                    class="red_text"><?= get_field('about_who_and_goal_title_second_red') ?></span></h3>

                    <?php endif; ?>

                    <p><?= get_field('about_who_and_goal_text_started') ?> <span
                                class="red_text"><?= get_field('about_who_and_goal_text_red_1') ?></span> <?= get_field('about_who_and_goal_text_continued') ?>
                        <span class="red_text"><?= get_field('about_who_and_goal_text_red_2') ?></span> <?= get_field('about_who_and_goal_text_finished') ?>
                    </p>

                </article>

            <?php endwhile; endif; ?>

        </div>

    </section>

    <section class="section light_red_section">

        <h2 class="secondary_title">Nos maisons</h2>

        <div class="houses_container">

            <?php if ($about_houses->have_posts()) : while ($about_houses->have_posts()) :$about_houses->the_post() ?>

                <?php if (get_field('house_first_text') && get_field('house_second_text')): ?>

                    <p><?= get_field('house_first_text') ?></p>

                    <p><?= get_field('house_second_text') ?></p>

                <?php endif; ?>

                <article class="house">

                    <h3 class="hidden"><?= get_field('house_title') ?></h3>

                    <div class="image_container">

                        <img src="<?= get_field('house_image')['url'] ?>"
                             alt="<?= get_field('house_image')['alt'] ?>"
                             width="<?= get_field('house_image')['width'] ?>"
                             height="<?= get_field('house_image')['height'] ?>">

                    </div>

                    <ul>

                        <li><?= get_field('house_first_feature') ?></li>

                        <li><?= get_field('house_second_feature') ?></li>

                        <?php if (get_field('house_third_feature')): ?>

                            <li><?= get_field('house_third_feature') ?></li>

                        <?php endif; ?>

                    </ul>

                </article>

            <?php endwhile; endif; ?>

        </div>

    </section>

    <section class="section dark_red_section">

        <h2 class="secondary_title">Nos magasins</h2>

        <div class="shops_container flex_container">

            <?php if ($about_shops->have_posts()) : while ($about_shops->have_posts()) :$about_shops->the_post() ?>

                <article class="shop">

                    <div class="image_container">

                        <img src="<?= get_field('shop_image')['url'] ?>"
                             alt="<?= get_field('shop_image')['alt'] ?>"
                             width="<?= get_field('shop_image')['width'] ?>"
                             height="<?= get_field('shop_image')['height'] ?>">

                    </div>

                    <h3><?= get_field('shop_title') ?></h3>

                    <div class="address_and_schedule_container flex_container">

                        <div class="address_container flex_container">

                            <h4><?= get_field('shop_address_title') ?></h4>

                            <ul>

                                <li><?= get_field('shop_address') ?></li>
                                <li><?= get_field('shop_telephone') ?></li>

                            </ul>

                            <a class="cta_link dark_link logo_link" href="<?= get_field('shop_gm')['url'] ?>"
                               title="Aller voir sur Google Maps" hreflang="fr">
                                <?= get_field('shop_gm')['title'] ?>
                            </a>

                        </div>

                        <div class="schedule_container flex_container">

                            <h4><?= get_field('shop_schedule_title') ?></h4>

                            <ul>

                                <li><?= get_field('shop_first_schedule') ?></li>
                                <li><?= get_field('shop_second_schedule') ?></li>
                                <li><?= get_field('shop_third_schedule') ?></li>
                                <li><?= get_field('shop_fourth_schedule') ?></li>

                                <?php if (get_field('shop_fifth_schedule')): ?>

                                    <li><?= get_field('shop_fifth_schedule') ?></li>

                                <?php endif; ?>

                            </ul>

                        </div>

                    </div>

                </article>

            <?php endwhile; endif; ?>

        </div>

    </section>

    <?php dw_component('contact_and_support_us', [
        'contact' => 'yes',
        'support' => 'yes',
    ]) ?>

</main>

<?php get_footer() ?>
