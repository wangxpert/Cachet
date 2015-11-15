<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    // Setup form fields
    'setup' => [
        'email'            => 'Email',
        'username'         => 'Użytkownik',
        'password'         => 'Hasło',
        'site_name'        => 'Nazwa strony',
        'site_domain'      => 'Domena strony',
        'site_timezone'    => 'Wybierz swoją strefę czasową',
        'site_locale'      => 'Wybierz swól język',
        'enable_google2fa' => 'Włącz dwuetapową autentykację Google',
    ],

    // Login form fields
    'login' => [
        'email'         => 'Email',
        'password'      => 'Hasło',
        '2fauth'        => 'Kod autentykacji',
        'invalid'       => 'Nieprawidłowy email lub hasło',
        'invalid-token' => 'Nieprawidłowy kod',
        'cookies'       => 'You must enable cookies to login.',
    ],

    // Incidents form fields
    'incidents' => [
        'name'         => 'Nazwa',
        'status'       => 'Status',
        'component'    => 'Komponent',
        'message'      => 'Wiadomość',
        'message-help' => 'Możesz skorzystać z Markdown.',
        'scheduled_at' => 'Na kiedy zaplanować przerwę?',

        'templates' => [
            'name'     => 'Nazwa',
            'template' => 'Szablon',
            'twig'     => 'Incident Templates can make use of the <a href="http://twig.sensiolabs.org/" target="_blank">Twig</a> templating language.',
        ],
    ],

    // Components form fields
    'components' => [
        'name'        => 'Nazwa',
        'status'      => 'Status',
        'group'       => 'Grupa',
        'description' => 'Opis',
        'link'        => 'Link',
        'tags'        => 'Tagi',
        'tags-help'   => 'Rozdzielone przecinkiem.',
        'enabled'     => 'Component enabled?',

        'groups' => [
            'name' => 'Nazwa',
        ],
    ],

    // Metric form fields
    'metrics' => [
        'name'             => 'Nazwa',
        'suffix'           => 'Jednostka',
        'description'      => 'Opis',
        'description-help' => 'Możesz skorzystać z Markdown.',
        'display-chart'    => 'Wyświetlać wykres na panelu głównym?',
        'default-value'    => 'Domyślna wartość',
        'calc_type'        => 'Sposób kalkulacji metryki',
        'type_sum'         => 'Suma',
        'type_avg'         => 'Średnia',

        'points' => [
            'value' => 'Wartość',
        ],
    ],

    // Settings
    'settings' => [
        /// Application setup
        'app-setup' => [
            'site-name'              => 'Nazwa strony',
            'site-url'               => 'Adres URL strony',
            'display-graphs'         => 'Wyświetlać wykresy na panelu głównym?',
            'about-this-page'        => 'O tej stronie',
            'days-of-incidents'      => 'Ile dni incydentów pokazywać?',
            'banner'                 => 'Obrazek z logo',
            'banner-help'            => 'Zaleca się wrzuać pliki nie szersze niż 930px.',
        ],
        'analytics' => [
            'analytics_google'       => 'Google Analytics code',
            'analytics_gosquared'    => 'GoSquared Analytics code',
            'analytics_piwik_url'    => 'URL of your Piwik instance (without http(s)://)',
            'analytics_piwik_siteid' => 'Piwik\'s site id',
        ],
        'localization' => [
            'site-timezone'          => 'Strefa czasowa',
            'site-locale'            => 'Język',
            'date-format'            => 'Format daty',
            'incident-date-format'   => 'Incident Timestamp Format',
        ],
        'security' => [
            'allowed-domains'      => 'Dozwolone domenyw',
            'allowed-domains-help' => 'Oddzielone przecinkiem. Domena ustawiona powyżej jest dozwolona domyślnie.',
        ],
        'stylesheet' => [
            'custom-css' => 'Własny Stylesheet',
        ],
        'theme' => [
            'background-color'        => 'Kolor tła',
            'text-color'              => 'Kolor tekstu',
            'dashboard-login'         => 'Show dashboard button in the footer?',
            'banner-background-color' => 'Banner Background Color',
            'banner-padding'          => 'Banner Padding',
            'fullwidth-banner'        => 'Enable fullwidth banner?',
        ],
    ],

    'user' => [
        'username'       => 'Nazwa użytkownika',
        'email'          => 'Email',
        'password'       => 'Hasło',
        'api-token'      => 'Klucz API',
        'api-token-help' => 'Zregenerowanie twojego klucza API uniemożliwi dostęp istniejących aplikacji do Cachet.',
        'gravatar'       => 'Change your profile picture at Gravatar.',
        '2fa'            => [
            'help' => 'Aktywacja dwuetapowej autentykacji zwiększą bezpieczeństwo twojego konta. Musisz ściągnąć <a href="https://support.google.com/accounts/answer/1066447?hl=en">Google Authenticator</a> lub podobną aplikację na swój telefon. Przy logowaniu będziesz proszony o podanie kodu wygenerowanego przez tą aplikację.',
        ],
        'team' => [
            'description' => 'Invite your team members by entering their email addresses here.',
            'email'       => 'Email #:id',
        ],
    ],

    // Buttons
    'add'    => 'Dodaj',
    'save'   => 'Zapisz',
    'update' => 'Aktualizuj',
    'create' => 'Swtórz',
    'edit'   => 'Edytuj',
    'delete' => 'Skasuj',
    'submit' => 'Wyślij',
    'cancel' => 'Anuluj',
    'remove' => 'Usuń',

    // Other
    'optional' => '* Opcjonalny',
];
