<?php

/* @var mixed $contact */
/* @var mixed $support */

$contact_and_support = new WP_Query([
    'post_type' => 'contact-and-support',
    'post_status' => 'publish',
    'posts_per_page' => 1,
]);

?>

<section class="section centered">

    <?php if ($contact_and_support->have_posts()) : while ($contact_and_support->have_posts()) :$contact_and_support->the_post() ?>

        <div class="contact_and_support_us_container">

            <h2 class="secondary_title"><?= get_field('contact_and_support_title') ?></h2>

            <div class="link_container flex_container">

                <?php if ($contact === 'yes' && $support === null): ?>

                    <a class="cta_link light_link logo_link" href="<?= get_field('contact_link')['url'] ?>"
                       title="Aller vers la page <?= get_field('contact_link')['title'] ?>"><?= get_field('contact_link')['title'] ?></a>

                <?php elseif ($contact === null && $support === 'yes'): ?>

                    <a class="cta_link light_link logo_link" href="<?= get_field('support_link')['url'] ?>"
                       title="Aller vers la page <?= get_field('support_link')['title'] ?>"><?= get_field('support_link')['title'] ?></a>

                <?php else: ?>

                    <a class="cta_link white_link logo_link" href="<?= get_field('contact_link')['url'] ?>"
                       title="Aller vers la page <?= get_field('contact_link')['title'] ?>"><?= get_field('contact_link')['title'] ?></a>
                    <a class="cta_link light_link logo_link" href="<?= get_field('support_link')['url'] ?>"
                       title="Aller vers la page <?= get_field('support_link')['title'] ?>"><?= get_field('support_link')['title'] ?></a>

                <?php endif; ?>

            </div>

        </div>

    <?php endwhile; endif; ?>

</section>
