<?php

/*
 * This file is part of Cachet.
 *
 * (c) James Brooks <james@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [
    'not-found' => [
        'code'    => '404',
        'title'   => 'Die pagina is vermist geraakt!',
        'message' => 'Sorry, maar de pagina die je zoekt is niet gevonden. Controleer de URL op fouten en probeer het nogmaals.',
        'link'    => 'Terug naar homepagina',
    ],
    'unauthorized' => [
        'code'    => '401',
        'title'   => 'Ongeautoriseerd',
        'message' => 'Sorry, maar je moet beheerdersrechten hebben om deze pagina te bekijken.',
        'link'    => 'Terug naar homepagina',
    ],
];
