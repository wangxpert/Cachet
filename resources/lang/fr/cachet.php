
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
    // Components
    'components' => [
        'status' => [
            1 => 'Opérationnel',
            2 => 'Problèmes de performances',
            3 => 'Panne partielle',
            4 => 'Panne majeure',
        ],
    ],

    // Incidents
    'incidents' => [
        'none'          => 'Aucun incident signalé.',
        'past'          => 'Incidents antérieurs',
        'previous_week' => 'Semaine précédente',
        'next_week'     => 'Semaine suivante',
        'none'          => 'Aucun incident signalé.',
        'scheduled'     => 'Maintenance Planifiée',
        'scheduled_at'  => ', planifiée :timestamp',
        'status'        => [
            0 => 'Planifié', // TODO: Hopefully remove this.
            1 => 'Enquête en cours',
            2 => 'Identifié',
            3 => 'Analyse en cours',
            4 => 'Corrigé',
        ],
    ],

    // Service Status
    'service' => [
        'good'  => '[0,1] System operational|[2,Inf] All systems are operational',
        'bad'   => '[0,1] The system is currently experiencing issues|[2,Inf] Some systems are experiencing issues',
        'major' => '[0,1] The service experiencing a major outage|[2,Inf] Some systems are experiencing a major outage',
    ],

    'api' => [
        'regenerate' => 'Régénérer la clé API',
        'revoke'     => 'Révoquer la clé API',
    ],

    // Metrics
    'metrics' => [
        'filter' => [
            'last_hour' => 'Last Hour',
            'hourly'    => 'Last 12 Hours',
            'weekly'    => 'Week',
            'monthly'   => 'Month',
        ],
    ],

    // Subscriber
    'subscriber' => [
        'subscribe' => 'Abonnez-vous pour obtenir les dernières mises à jour.',
        'button'    => 'S\'abonner',
        'email'     => [
            'subscribe'          => 'S\'abonner aux mises à jour par courriel.',
            'subscribed'         => 'Vous êtes abonné aux notifications par courriel, veuillez vérifier votre messagerie pour confirmer votre abonnement.',
            'verified'           => 'Votre abonnement par courriel a été confirmé. Merci !',
            'unsubscribe'        => 'Désinscription des mises à jour par courriel.',
            'unsubscribed'       => 'Votre abonnement par courriel a été annulé.',
            'failure'            => 'Quelque chose s\'est mal passé avec l\'abonnement.',
            'already-subscribed' => 'Cannot subscribe :email because they\'re already subscribed.',
            'verify'             => [
                'text'           => "Veuillez confirmer votre abonnement par courriel aux mises à jour d'état de :app_name.\\n:link\\nMerci, :app_name",
                'html-preheader' => 'Veuillez confirmer votre abonnement par courriel aux mises à jour de :app_name.',
                'html'           => '',
            ],
            'maintenance' => [
                'text'           => 'Une nouvelle maintenance a été planifiée pour :app_name.\\nMerci, :app_name',
                'html-preheader' => 'Une nouvelle maintenance a été planifiée pour :app_name.',
                'html'           => '',
            ],
            'incident' => [
                'text'           => 'Un nouvel incident a été signalé sur : app_name.\\nMerci, :app_name',
                'html-preheader' => 'Un nouvel incident a été signalé sur : app_name.',
                'html'           => '<p>Un nouvel incident a été signalé sur : app_name. </p><p>Merci, : app_name</p>',
            ],
        ],
    ],

    // Other
    'powered_by'      => ':app Status Page est propulsé par <a href="https://cachethq.io">Cachet</a>.',
    'about_this_site' => 'À propos du site',
    'rss-feed'        => 'RSS',
    'atom-feed'       => 'Atom',
    'feed'            => 'Flux des statuts',

];
