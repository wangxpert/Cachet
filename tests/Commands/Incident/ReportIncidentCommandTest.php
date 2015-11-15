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

use CachetHQ\Cachet\Commands\Incident\ReportIncidentCommand;
use CachetHQ\Cachet\Handlers\Commands\Incident\ReportIncidentCommandHandler;
use CachetHQ\Tests\Cachet\Commands\AbstractCommandTestCase;

/**
 * This is the add incident command test class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class ReportIncidentCommandTest extends AbstractCommandTestCase
{
    protected function getObjectAndParams()
    {
        $params = [
            'name'             => 'Test',
            'status'           => 1,
            'message'          => 'Foo bar baz',
            'visible'          => 1,
            'component_id'     => 1,
            'component_status' => 1,
            'notify'           => false,
            'incident_date'    => null,
            'template'         => null,
            'template_vars'    => null,
        ];
        $object = new ReportIncidentCommand(
            $params['name'],
            $params['status'],
            $params['message'],
            $params['visible'],
            $params['component_id'],
            $params['component_status'],
            $params['notify'],
            $params['incident_date'],
            $params['template'],
            $params['template_vars']
        );

        return compact('params', 'object');
    }

    protected function objectHasRules()
    {
        return true;
    }

    protected function getHandlerClass()
    {
        return ReportIncidentCommandHandler::class;
    }
}
