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
            1 => 'Toiminnassa',
            2 => 'Suorituskykyyn liittyviä ongelmia',
            3 => 'Osittainen sähkökatkos',
            4 => 'Merkittävä katkos',
        ],
    ],

    // Incidents
    'incidents' => [
        'none'          => 'Ei raportoitavia tapauksia',
        'past'          => 'Aikaisemmat tapahtumat',
        'previous_week' => 'Edellinen viikko',
        'next_week'     => 'Seuraava viikko',
        'scheduled'     => 'Määräaikaishuolto',
        'scheduled_at'  => ', ajoitettu: aikaleima',
        'status'        => [
            0 => 'Ajoitettu', // TODO: Hopefully remove this.
            1 => 'Tutkitaan',
            2 => 'Tunnistettu',
            3 => 'Valvotaan',
            4 => 'Korjattu',
        ],
    ],

    // Service Status
    'service' => [
        'good'  => '[0,1] järjestelmät ovat toiminnassa| [2, Inf] Kaikki järjestelmät ovat toiminnassa',
        'bad'   => '[0,1] järjestelmä on tällä hetkellä ongelmia| [2, Inf] Joissakin järjestelmissä on ongelmia',
        'major' => '[0,1] Palveluissa on katkoksia| [2, Inf] Joissakin järjestelmissä on merkittävä katkoksia',
    ],

    'api' => [
        'regenerate' => 'Luo API-avain',
        'revoke'     => 'Peruuttaa API avain',
    ],

    // Metrics
    'metrics' => [
        'filter' => [
            'last_hour' => 'Viimeisen tunnin',
            'hourly'    => 'Viimeisen 12 tunnin',
            'weekly'    => 'Viikko',
            'monthly'   => 'Kuukausi',
        ],
    ],

    // Subscriber
    'subscriber' => [
        'subscribe' => 'Tilaa uusimmat päivitykset',
        'button'    => 'Tilaa',
        'email'     => [
            'subscribe'          => 'Tilaa email päivitykset.',
            'subscribed'         => 'Olet tilannut sähköposti-ilmoitukset, tarkista sähköpostisi vahvistaaksesi tilauksen.',
            'verified'           => 'Sinun sähköposti tilaus on vahvistettu. Kiitos!',
            'unsubscribe'        => 'Poista sähköposti tilauksesi.',
            'unsubscribed'       => 'Sähköpostitilauksesi on peruuttu.',
            'failure'            => 'Jokin meni vikaan sähköpostitilauksen käsittelyssä.',
            'already-subscribed' => 'Cannot subscribe :email because they\'re already subscribed.',
            'verify'             => [
                'text'           => "Ole hyvä ja vahvista :app_name tilasivun sähköpostitilauksille.\n:link\nKiittäen, :app_name",
                'html-preheader' => 'Please confirm your email subscription to :app_name status updates.',
                'html'           => '<p>Please confirm your email subscription to :app_name status updates.</p><p><a href=":link">:link</a></p><p>Thank you, :app_name</p>',
            ],
            'maintenance' => [
                'text'           => "New maintenance has been scheduled on :app_name.\nThank you, :app_name",
                'html-preheader' => 'New maintenance has been scheduled on :app_name.',
                'html'           => '<p>New maintenance has been scheduled on :app_name.</p>',
            ],
            'incident' => [
                'text'           => "New incident has been reported on :app_name.\nThank you, :app_name",
                'html-preheader' => 'New incident has been reported on :app_name.',
                'html'           => '<p>New incident has been reported on :app_name.</p><p>Thank you, :app_name</p>',
            ],
            'component' => [
                'subject'        => 'Component Status Update',
                'text'           => 'The component :component_name has seen a status change. The component is now at :component_human_status.\nThank you, :app_name',
                'html-preheader' => 'Component Update from :app_name',
                'html'           => '<p>The component :component_name has seen a status change. The component is now at :component_human_status.</p><p>Thank you, :app_name</p>',
                'tooltip-title'  => 'Subscribe to notifications for :component_name.',
            ],
        ],
    ],

    'users' => [
        'email' => [
            'invite' => [
                'text'           => "You have been invited to the team :app_name status page, to sign up follow the next link.\n:link\nThank you, :app_name",
                'html-preheader' => 'You have been invited to the team :app_name.',
                'html'           => '<p>You have been invited to the team :app_name status page, to sign up follow the next link.</p><p><a href=":link">:link</a></p><p>Thank you, :app_name</p>',
            ],
        ],
    ],

    'signup' => [
        'title'    => 'Sign Up',
        'username' => 'Käyttäjätunnus',
        'email'    => 'Sähköposti',
        'password' => 'Salasana',
        'success'  => 'Tilisi on luotu.',
        'failure'  => 'Something went wrong with the signup.',
    ],

    'system' => [
        'update' => 'There is a newer version of Cachet available. You can learn how to update <a href="https://docs.cachethq.io/docs/updating-cachet">here</a>!',
    ],

    // Modal
    'modal' => [
        'close'     => 'Sulje',
        'subscribe' => [
            'title'  => 'Subscribe to component updates',
            'body'   => 'Enter your email address to subscribe to updates for this component. If you\'re already subscribed, you\'ll already receive emails for this component.',
            'button' => 'Tilaa',
        ],
    ],

    // Other
    'powered_by'      => ':app Status Page is powered by <a href="https://cachethq.io" class="links">Cachet</a>.',
    'about_this_site' => 'Tietoa sivustosta',
    'rss-feed'        => 'RSS',
    'atom-feed'       => 'Atom',
    'feed'            => 'Status Feed',

];
