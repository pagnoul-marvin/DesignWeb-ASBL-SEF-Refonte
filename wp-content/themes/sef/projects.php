<?php
/* Template Name: Projects */
get_header();

$projects = new WP_Query([
   'post_type' => 'project',
   'post_status' => 'publish',
   'posts_per_page' => -1,
   'orderby' => 'date',
   'order' => 'ASC',
]);

?>

    <main>

        <?php dw_component('no_js_banner'); ?>

        <section class="section">

            <h2 class="main_title">Nos <span class="red_text">projets</span></h2>

            <div class="projects_container grid_container">

                <?php if ($projects->have_posts()) : while ($projects->have_posts()) :$projects->the_post() ?>

                    <article class="project flex_container" itemprop="event" itemscope itemtype="https://schema.org/Event">

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
            'support' => 'yes'
        ]) ?>

    </main>

<?php get_footer() ?>