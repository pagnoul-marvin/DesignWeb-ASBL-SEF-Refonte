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

        <?php dw_component('no_js_banner'); ?>

        <section class="section">

            <h2 class="main_title">Nous <span class="red_text">contacter</span></h2>

        </section>

        <section class="section light_red_section">

            <h2 class="secondary_title">Par t&eacute;l&eacute;phone</h2>

            <?php if ($contact_phone->have_posts()) : while ($contact_phone->have_posts()) :$contact_phone->the_post() ?>

                <div class="phone_container flex_container">

                    <p><?= get_field('phone_text') ?></p>

                    <a itemprop="telephone" class="cta_link light_link" href="<?= get_field('phone_link')['url'] ?>"
                       title="Téléphoner"><?= get_field('phone_link')['title'] ?></a>

                </div>

            <?php endwhile; endif; ?>

        </section>

        <section class="section dark_red_section">

            <h2 class="secondary_title">Par mail</h2>

            <div class="mail_container">

                <p>Les champs dot&eacute;s d&rsquo;une &laquo;&ast;&raquo; sont requis.</p>

                <form action="<?= esc_url(admin_url('admin-post.php')) ?>" method="post" class="flex_container">

                    <div>

                        <label for="firstname">Votre pr&eacute;nom&ast;&nbsp;: <small>255 caract&egrave;res
                                maximum</small></label>
                        <input placeholder="Ex: Jean" id="firstname" name="firstname" required type="text">

                    </div>

                    <div>

                        <label for="lastname">Votre nom&ast;&nbsp;: <small>255 caract&egrave;res maximum</small></label>
                        <input placeholder="Ex: Dupont" id="lastname" name="lastname" required type="text">

                    </div>

                    <div>

                        <label for="email">Votre adresse mail&ast;&nbsp;: <small>Doit &ecirc;tre valide</small></label>
                        <input placeholder="Ex: jean@dupont.com" id="email" name="email" required type="text">

                    </div>


                    <div>

                        <label for="message">Votre message&ast;&nbsp;:</label>
                        <textarea placeholder="Ex: Je souhaite vous contacter pour ..." name="message" id="message" cols="30" rows="10" required></textarea>

                    </div>

                    <input type="submit" value="Soumettre" class="cta_link dark_link">

                </form>

            </div>

        </section>

        <?php dw_component('contact_and_support_us', [
            'contact' => null,
            'support' => 'yes'
        ]) ?>

    </main>


<?php get_footer() ?>