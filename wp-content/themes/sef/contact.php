<?php
/* Template Name: Contact */
get_header();

$contact_phone = new WP_Query([
   'post_type' => 'contact-phone',
   'post_status' => 'publish',
   'posts_per_page' => 1,
]);

?>

<main>

    <section class="section">

        <h2 class="main_title">Nous <span class="red_text">contacter</span></h2>

    </section>

    <section class="section light_red_section">

        <h2 class="secondary_title">Par t&eacute;l&eacute;phone</h2>

        <?php if ($contact_phone->have_posts()) : while ($contact_phone->have_posts()) :$contact_phone->the_post() ?>

            <div class="phone_container flex_container">

            <p><?= get_field('phone_text') ?></p>

            <a class="cta_link light_link" href="<?= get_field('phone_link')['url'] ?>" title="Téléphoner"><?= get_field('phone_link')['title'] ?></a>

        </div>

        <?php endwhile; endif; ?>

    </section>

</main>


<?php get_footer() ?>