<?php
/* Template Name: About */
get_header();

$goal_and_who = new WP_Query([
    'post_type' => 'about-goal-and-who',
    'posts_per_page' => 2,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'ASC'
]);

?>

<main>

    <section class="section">

        <h2 class="main_title">&Agrave; <span class="red_text">propos</span></h2>

        <div class="goal_and_who_container">

            <?php if ($goal_and_who->have_posts()) : while ($goal_and_who->have_posts()) :$goal_and_who->the_post() ?>

                <article>

                    <?php if (get_field('about_who_and_goal_title_first')): ?>

                        <h3><span class="red_text"><?= get_field('about_who_and_goal_title_first_red') ?></span> <?= get_field('about_who_and_goal_title_first') ?></h3>

                    <?php else: ?>

                        <h3><?= get_field('about_who_and_goal_title_second') ?> <span class="red_text"><?= get_field('about_who_and_goal_title_second_red') ?></span></h3>

                    <?php endif; ?>

                    <p><?= get_field('about_who_and_goal_text_started') ?> <span class="red_text"><?= get_field('about_who_and_goal_text_red_1') ?></span> <?= get_field('about_who_and_goal_text_continued') ?> <span class="red_text"><?= get_field('about_who_and_goal_text_red_2') ?></span> <?= get_field('about_who_and_goal_text_finished') ?></p>

                </article>

            <?php endwhile; endif; ?>

        </div>

    </section>

</main>

<?php get_footer() ?>
