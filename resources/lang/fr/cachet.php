<?php

return [
    // Components
    'components' => [
        'status' => [
            1 => 'Opérationnel',
            2 => 'Problème de performances',
            3 => 'Panne partielle',
            4 => 'Panne majeure',
        ],
    ],

    // Incidents
    'incidents' => [
        'none'          => 'Aucun incident reporté.',
        'past'          => 'Incidents précédents',
        'previous_week' => 'Semaine précédente',
        'next_week'     => 'Semaine suivante',
        'none'          => 'Rien à reporter',
        'status'        => [
            1 => 'Enquête en cours',
            2 => 'Identifié',
            3 => 'Analyse en cours',
            4 => 'Corrigé',
        ],
    ],

    // Service Status
    'service' => [
        'good' => 'Tous les services sont fonctionnels.',
        'bad'  => 'Certains services rencontrent des problèmes.',
    ],

    'api' => [
        'regenerate' => 'Regénérer une clé d\'API',
        'revoke'     => 'Révoquer cette clé d\'API',
    ],

    // Other
    'powered_by'      => ':app Status Page est propulsé par <a href="https://cachethq.github.io">Cachet</a>.',
    'about_this_site' => 'À propos de ce site',
    'rss-feed'        => 'Flux RSS',
    'atom-feed'       => 'Flux Atom',
    'feed'            => 'Flux des services',

];
