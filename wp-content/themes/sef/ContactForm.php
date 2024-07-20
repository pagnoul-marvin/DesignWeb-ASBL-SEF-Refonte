<?php

namespace DW;

use JetBrains\PhpStorm\NoReturn;
use Validator\Validator;

require_once get_template_directory() . '/Validator.php';

class ContactForm
{
    private array $data;
    private array $errors = [];

    public function __construct($data)
    {
        $this->data = $this->sanitize_data($data);
        $this->handle_form_submission();
    }

    private function sanitize_data($data): array
    {
        return [
            'firstname' => sanitize_text_field($data['firstname']),
            'lastname' => sanitize_text_field($data['lastname']),
            'email' => sanitize_email($data['email']),
            'message' => sanitize_textarea_field($data['message']),
        ];
    }

    #[NoReturn] private function handle_form_submission(): void
    {
        if (empty($this->validator())) {
            $this->sendInDatabase();
            wp_redirect(add_query_arg('status', 'success', home_url('/nous-contacter/')));
        } else {
            session_start();
            $_SESSION['form_errors'] = $this->errors;
            wp_redirect(add_query_arg('status', 'error', home_url('/nous-contacter/')));
        }
    }

    private function validator(): array
    {
        foreach ($this->data as $key => $value) {
            if (!Validator::required($key)) {
                $this->errors[$key] = 'Le champ ' . ucfirst($key) . ' est requis.';
            }
        }

        if (!Validator::validateEmail($this->data['email'])) {
            $this->errors['email'] = 'L\'email doit être valide.';
        }

        if (!Validator::max('firstname', 255)) {
            $this->errors['firstname'] = 'Le prénom ne peut pas dépasser les 255 caractères.';
        }

        if (!Validator::max('lastname', 255)) {
            $this->errors['lastname'] = 'Le nom ne peut pas dépasser les 255 caractères.';
        }

        if (!Validator::max('email', 255)) {
            $this->errors['email'] = 'L\'email ne peut pas dépasser les 255 caractères.';
        }

        if (!Validator::no_numbers('firstname')) {
            $this->errors['firstname'] = 'Le prénom ne peut pas contenir de chiffres.';
        }

        if (!Validator::no_numbers('lastname')) {
            $this->errors['lastname'] = 'Le nom ne peut pas contenir de chiffres.';
        }

        return $this->errors;
    }

    private function sendInDatabase(): void
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'contact_form_entries';

        $sql = $wpdb->prepare(
            "INSERT INTO $table_name (firstname, lastname, email, message) VALUES (%s, %s, %s, %s)",
            $this->data['firstname'],
            $this->data['lastname'],
            $this->data['email'],
            $this->data['message']
        );

        $result = $wpdb->query($sql);

        if ($result === false) {
            wp_redirect(home_url() . 'une-erreur-est-survenue');
            die();
        }
    }
}