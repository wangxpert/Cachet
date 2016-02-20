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

    'dashboard' => 'Panel de Control',

    // Incidents
    'incidents' => [
        'title'                    => 'Ereignisse &amp; Termine',
        'incidents'                => 'Vorfälle',
        'logged'                   => '{0} Es gibt keine Vorfälle, gute Arbeit.|Du hast einen Vorfall gemeldet.|Du hast <strong>:count</strong> Vorfälle gemeldet.',
        'incident-create-template' => 'Vorlage erstellen',
        'incident-templates'       => 'Vorfall Vorlagen',
        'add'                      => [
            'title'   => 'Vorfall hinzufügen',
            'success' => 'Vorfall hinzugefügt.',
            'failure' => 'Etwas ist mit dem Vorfall schiefgelaufen.',
        ],
        'edit' => [
            'title'   => 'Vorfall bearbeiten',
            'success' => 'Vorfall aktualisiert.',
            'failure' => 'Algo salió mal con el incidente.',
        ],
        'delete' => [
            'success' => 'El incidente se ha eliminado y no se mostrará en tu página de estado.',
            'failure' => 'El incidente no se pudo eliminar. Por favor, inténtalo de nuevo.',
        ],

        // Incident templates
        'templates' => [
            'title' => 'Plantillas de incidente',
            'add'   => [
                'title'   => 'Vorfallvorlage erstellen',
                'message' => 'Deberías añadir una plantilla de incidente.',
                'success' => 'Vorlage erstellt.',
                'failure' => 'Etwas ist mit der Vorfallvorlage schiefgelaufen.',
            ],
            'edit' => [
                'title'   => 'Vorlage bearbeiten',
                'success' => 'Vorlage aktualisiert!',
                'failure' => 'Etwas ist mit dem Updaten der Vorfallvorlage schiefgelaufen',
            ],
            'delete' => [
                'success' => 'La plantilla de incidente se ha eliminado.',
                'failure' => 'La plantilla de incidente no se pudo eliminar. Por favor, inténtalo de nuevo.',
            ],
        ],
    ],

    // Incident Maintenance
    'schedule' => [
        'schedule'     => 'Geplante Wartungen',
        'logged'       => '{0} No hay planificaciones, buen trabajo.|Has registrado una planificación.|Has registrado <strong>:count</strong> planificaciones.',
        'scheduled_at' => 'Geplant am :timestamp',
        'add'          => [
            'title'   => 'Planmäßige Wartung hinzufügen',
            'success' => 'Zeitplan hinzugefügt.',
            'failure' => 'Etwas ist mit dem hinzufügen des Zeitplanes schiefgelaufen.',
        ],
        'edit' => [
            'title'   => 'Planmäßige Wartung bearbeiten',
            'success' => 'Zeitplan wurde aktualisiert!',
            'failure' => 'Etwas ist mit dem Bearbeiten des Zeitplanes schiefgelaufen.',
        ],
        'delete' => [
            'success' => 'Der Zeitplan wurde gelöscht und wird nicht auf Ihrer Statusseite angezeigt.',
            'failure' => 'Der Zeitplan konnte nicht gelöscht werden. Bitte versuchen Sie es erneut.',
        ],
    ],

    // Components
    'components' => [
        'components'         => 'Komponenten',
        'component_statuses' => 'Komponentenstatus',
        'listed_group'       => 'Gruppiert unter :name',
        'add'                => [
            'title'   => 'Komponente hinzufügen',
            'message' => 'Sie sollten eine Komponente erstellen.',
            'success' => 'Komponente erstellt.',
            'failure' => 'Beim Erstellen der Komponente ist etwas schiefgegangen.',
        ],
        'edit' => [
            'title'   => 'Komponente bearbeiten',
            'success' => 'Komponente aktualisiert.',
            'failure' => 'Algo salió mal con el componente.',
        ],
        'delete' => [
            'success' => 'El componente se ha eliminado!',
            'failure' => 'El componente no se pudo eliminar. Por favor, inténtalo de nuevo.',
        ],

        // Component groups
        'groups' => [
            'groups'        => 'Komponentgruppe|Komponentgruppen',
            'no_components' => 'Sie sollten eine Komponentengruppe hinzufügen.',
            'add'           => [
                'title'   => 'Eine Komponentengruppe hinzufügen',
                'success' => 'Komponentengruppe hinzugefügt.',
                'failure' => 'Mit der Komponentengruppe ist etwas schiefgegangen.',
            ],
            'edit' => [
                'title'   => 'Komponentengruppe bearbeiten',
                'success' => 'Komponentengruppe aktualisiert.',
                'failure' => 'Mit der Komponentengruppe ist etwas schiefgegangen.',
            ],
            'delete' => [
                'success' => 'El grupo de componentes se ha eliminado!',
                'failure' => 'El grupo de componentes no se pudo eliminar. Por favor, inténtalo de nuevo.',
            ],
        ],
    ],

    // Metrics
    'metrics' => [
        'metrics' => 'Metriken',
        'add'     => [
            'title'   => 'Metrik erstellen',
            'message' => 'Deberías añadir una métrica.',
            'success' => 'Metrik erstellt.',
            'failure' => 'Mit der Metrik ist etwas schiefgegangen.',
        ],
        'edit' => [
            'title'   => 'Metrik bearbeiten',
            'success' => 'Metrik aktualisiert.',
            'failure' => 'Mit der Metrik ist etwas schiefgegangen.',
        ],
        'delete' => [
            'success' => 'La métrica se ha eliminado y no se mostrará más en tu página de estado.',
            'failure' => 'La métrica no se pudo eliminar. Por favor, inténtalo de nuevo.',
        ],
    ],
    // Subscribers
    'subscribers' => [
        'subscribers'  => 'Abonnenten',
        'description'  => 'Abonnenten erhalten E-Mail Updates wenn Vorfälle erstellt werden.',
        'verified'     => 'Verifiziert',
        'not_verified' => 'Nicht verifiziert',
        'add'          => [
            'title'   => 'Einen neuen Abonnenten hinzufügen',
            'success' => 'Abonnent hinzugefügt.',
            'failure' => 'Beim Erstellen der Komponente ist etwas schiefgegangen.',
        ],
        'edit' => [
            'title'   => 'Abonnent aktualisieren',
            'success' => 'Abonnent aktualisiert.',
            'failure' => 'Bei der Aktualisierung ging etwas schief.',
        ],
    ],

    // Team
    'team' => [
        'team'        => 'Team',
        'member'      => 'Mitglied',
        'profile'     => 'Profil',
        'description' => 'Teammitglieder werden die M&ouml;glichkeit haben, Komponente sowie Vorf&auml;lle hinzuzuf&uuml;gen und zu ver&auml;ndern.',
        'add'         => [
            'title'   => 'Neues Teammitglied hinzufügen',
            'success' => 'Teammitglied hinzugefügt.',
            'failure' => 'Mit der Komponente ist etwas schiefgegangen.',
        ],
        'edit' => [
            'title'   => 'Profil aktualisieren',
            'success' => 'Profil aktualisiert.',
            'failure' => 'Bei der Aktualisierung ging etwas schief.',
        ],
        'delete' => [
            'success' => 'Benutzer aktualisiert.',
            'failure' => 'Bei dem Löschen dieses Benutzers ging etwas schief.',
        ],
        'invite' => [
            'title'   => 'Invitar a un nuevo miembro al equipo',
            'success' => 'Se ha enviado una invitación',
            'failure' => 'Algo salió mal en la invitación.',
        ],
    ],

    // Settings
    'settings' => [
        'settings'  => 'Einstellungen',
        'app-setup' => [
            'app-setup'   => 'Anwendungsinstallation',
            'images-only' => 'Es können nur Bilder hochgeladen werden.',
            'too-big'     => 'Die von Ihnen hochgeladene Datei ist zu groß. Laden Sie ein Bild welches kleiner als :size ist hoch',
        ],
        'analytics' => [
            'analytics' => 'Analytics',
        ],
        'localization' => [
            'localization' => 'Localization',
        ],
        'security' => [
            'security'   => 'Sicherheit',
            'two-factor' => 'Nutzer ohne Zwei-Faktor-Authentifizierung',
        ],
        'stylesheet' => [
            'stylesheet' => 'Stylesheet',
        ],
        'theme' => [
            'theme' => 'Theme',
        ],
        'edit' => [
            'success' => 'Einstellungen gespeichert.',
            'failure' => 'Einstellungen konnten nicht gespeichert werden.',
        ],
    ],

    // Login
    'login' => [
        'login'      => 'Anmelden',
        'logged_in'  => 'Sie sind angemeldet.',
        'welcome'    => 'Willkommen zurück!',
        'two-factor' => 'Bitte geben Sie Ihren Token ein.',
    ],

    // Sidebar footer
    'help'        => 'Hilfe',
    'status_page' => 'Statusseite',
    'logout'      => 'Abmelden',

    // Notifications
    'notifications' => [
        'notifications' => 'Benachrichtigungen',
        'awesome'       => 'Großartig.',
        'whoops'        => 'Hoppla.',
    ],

    // Welcome modal
    'welcome' => [
        'welcome' => 'Bienvenido a tu página de estado!',
        'message' => 'Ihre Statusseite ist fast fertig! Vielleicht möchten Sie diese zusätzlichen Einstellungen konfigurieren',
        'close'   => 'Gehe einfach direkt zu meinem Dashboard',
        'steps'   => [
            'component'  => 'Komponenten erstellen',
            'incident'   => 'Vorfälle erstellen',
            'customize'  => 'Personalisieren',
            'team'       => 'Benutzer hinzufügen',
            'api'        => 'API Token generieren',
            'two-factor' => 'Zwei-Faktor-Authentifizierung',
        ],
    ],

];
