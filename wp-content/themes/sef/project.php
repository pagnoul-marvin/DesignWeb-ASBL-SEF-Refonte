<?php
/* Template Name: Project */
get_header();

$current_page_id = get_the_ID();

$linked_project_id = 0;

$all_project = new WP_Query([
    'post_type' => 'project',
    'post_status' => 'publish',
    'posts_per_page' => -1,
]);

if ($all_project->have_posts()) : while ($all_project->have_posts()) :
    $all_project->the_post();

    $linked_field = get_field('linked_page');

    $page_url = get_the_permalink($current_page_id);

    if ($linked_field === $page_url) {
        $linked_project_id = get_the_ID();
    }

endwhile; endif;

$project = new WP_Query([
    'post_type' => 'project',
    'post_status' => 'publish',
    'p' => $linked_project_id,
    'posts_per_page' => 1,
]);

$other_projects = new WP_Query([
    'post_type' => 'project',
    'post_status' => 'publish',
    'post__not_in' => [$linked_project_id],
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC',
]);

?>

<main>

    <?php dw_component('no_js_banner'); ?>

    <article class="section" itemprop="event" itemscope itemtype="https://schema.org/Event">

        <div class="project_container">

            <?php if ($project->have_posts()) : while ($project->have_posts()) :$project->the_post() ?>

                <h2 class="main_title" itemprop="about"><?= get_field('project_title') ?></h2>

                <p><?= get_field('project_description') ?></p>

                <div class="images_container">

                    <ul class="grid_container">

                        <li class="flex_container">

                            <div class="image_container">

                                <img src="<?= get_field('project_first_image')['url'] ?>"
                                     alt="<?= get_field('project_first_image')['alt'] ?>"
                                     width="<?= get_field('project_first_image')['width'] ?>"
                                     height="<?= get_field('project_first_image')['height'] ?>">

                            </div>

                        </li>

                        <li class="flex_container">

                            <div class="image_container">

                                <img src="<?= get_field('project_second_image')['url'] ?>"
                                     alt="<?= get_field('project_second_image')['alt'] ?>"
                                     width="<?= get_field('project_second_image')['width'] ?>"
                                     height="<?= get_field('project_second_image')['height'] ?>">

                            </div>

                        </li>

                        <li class="flex_container">

                            <div class="image_container">

                                <img src="<?= get_field('project_third_image')['url'] ?>"
                                     alt="<?= get_field('project_third_image')['alt'] ?>"
                                     width="<?= get_field('project_third_image')['width'] ?>"
                                     height="<?= get_field('project_third_image')['height'] ?>">

                            </div>

                        </li>

                    </ul>

                </div>

            <?php endwhile; endif; ?>

        </div>

    </article>

    <section class="section light_red_section">

        <h2 class="secondary_title">D&rsquo;autres projets</h2>

        <div class="other_projects_container flex_container">

            <?php if ($other_projects->have_posts()) : while ($other_projects->have_posts()) :$other_projects->the_post() ?>

                <article class="other_project flex_container" itemprop="event" itemscope itemtype="https://schema.org/Event">

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

        </div>

    </section>

    <?php dw_component('contact_and_support_us', [
        'contact' => 'yes',
        'support' => 'yes',
    ]); ?>

</main>

<?php get_footer() ?>
