<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Tests\Cachet\Commands\Incident;

use CachetHQ\Cachet\Commands\Incident\RemoveIncidentCommand;
use CachetHQ\Cachet\Handlers\Commands\Incident\RemoveIncidentCommandHandler;
use CachetHQ\Cachet\Models\Incident;
use CachetHQ\Tests\Cachet\Commands\AbstractCommandTestCase;

/**
 * This is the remove incident command test class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class RemoveIncidentCommandTest extends AbstractCommandTestCase
{
    protected function getObjectAndParams()
    {
        $params = ['incident' => new Incident()];
        $object = new RemoveIncidentCommand($params['incident']);

        return compact('params', 'object');
    }

    protected function objectHasRules()
    {
        return false;
    }

    protected function getHandlerClass()
    {
        return RemoveIncidentCommandHandler::class;
    }
}
