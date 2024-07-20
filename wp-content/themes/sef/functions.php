<?php

require_once get_template_directory().'/ContactForm.php';

add_filter('use_block_editor_for_post', '__return_false');

register_nav_menu('main', 'Navigation principale, en-tête du site');
register_nav_menu('footer', 'Navigation de pied de page');
register_nav_menu('socials', 'Navigation de réseaux sociaux');
register_nav_menu('asbl_partners', 'Navigation des ASBL soeurs');

function dw_asset(string $file): string
{
    return get_template_directory_uri() . '/public/' . $file;
}

function dw_get_navigation_links(string $location): array
{
    // Pour $location, retrouver le menu.
    $locations = get_nav_menu_locations();
    $menuId = $locations[$location] ?? null;

    // Au cas où il n'y a pas de menu assignés à $location, renvoyer un tableau de liens vide.
    if (is_null($menuId)) {
        return [];
    }

    // Pour ce menu, récupérer les liens
    $items = wp_get_nav_menu_items($menuId);

    // Formater les liens en objets pour ne garder que "URL" et "label" comme propriétés
    foreach ($items as $key => $item) {
        $items[$key] = new stdClass();
        $items[$key]->url = $item->url;
        $items[$key]->label = $item->title;
    }

    // Retourner le tableau de liens formatés
    return $items;
}

function dw_component(string $component, array $arguments = []): void
{
    $path = get_template_directory() . '/resources/components/' . $component . '.php';

    if (!file_exists($path)) {
        echo 'Component "' . $component . '" is not defined.';
        return;
    }

    extract($arguments);

    include($path);
}

function dw_contact_form_controller(): void
{
    new \DW\ContactForm($_POST);
}

add_action('admin_post_custom_contact_form', 'dw_contact_form_controller');
add_action('admin_post_nopriv_custom_contact_form', 'dw_contact_form_controller');


function add_contact_form_menu(): void
{
    add_menu_page(
        'Entrées du Formulaire de Contact',
        'Formulaires de Contact',
        'manage_options',
        'contact_form_entries',
        'display_contact_form_entries',
        'dashicons-email',
        2
    );
}
add_action('admin_menu', 'add_contact_form_menu');

function display_contact_form_entries(): void
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'contact_form_entries';

    $entries = $wpdb->get_results("SELECT * FROM $table_name ORDER BY `created_at` DESC");

    echo '<div class="wrap">';
    echo '<h1>Entrées du Formulaire de Contact</h1>';
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead><tr><th>ID</th><th>Prénom</th><th>Nom</th><th>Email</th><th>Message</th></tr></thead>';
    echo '<tbody>';

    foreach ($entries as $entry) {
        echo '<tr>';
        echo '<td>' . esc_html($entry->id) . '</td>';
        echo '<td>' . esc_html($entry->firstname) . '</td>';
        echo '<td>' . esc_html($entry->lastname) . '</td>';
        echo '<td>' . esc_html($entry->email) . '</td>';
        echo '<td>' . esc_html($entry->message) . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
}