<?php

return [
    // Components
    'components' => [
        'status' => [
            1 => 'Operacional',
            2 => 'Problemas de rendimiento',
            3 => 'Interrupción parcial',
            4 => 'Interrupción mayor',
        ],
    ],

    // Incidents
    'incidents' => [
        'none'          => 'No hay ninguna incidencia reportada.',
        'past'          => 'Incidentes anteriores',
        'previous_week' => 'Semana anterior',
        'next_week'     => 'Siguiente semana',
        'none'          => 'No hay ninguna incidencia reportada.',
        'status'        => [
            1 => 'Investigando',
            2 => 'Identificado',
            3 => 'Observando',
            4 => 'Corregido',
        ],
    ],

    // Service Status
    'service' => [
        'good' => 'Todos los sistemas funcionando.',
        'bad'  => 'Algunos sistemas están experimentando problemas.',
    ],

    'api' => [
        'regenerate' => 'Regenerar API Key',
        'revoke'     => 'Revocar API Key',
    ],

    // Other
    'powered_by'      => ':app La página de estado es alimentada por <a href="https://cachethq.github.io">Cachet</a>.',
    'about_this_site' => 'Acerca de este sitio',
    'rss-feed'        => 'Feed RSS',
    'atom-feed'       => 'Atom Feed',
    'feed'            => 'Estado del Feed',

];
