<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Tests\Cachet\Commands\Subscriber;

use CachetHQ\Cachet\Commands\Subscriber\SubscribeSubscriberCommand;
use CachetHQ\Cachet\Handlers\Commands\Subscriber\SubscribeSubscriberCommandHandler;
use CachetHQ\Tests\Cachet\Commands\AbstractCommandTestCase;

/**
 * This is the subscribe subscriber command test class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class SubscribeSubscriberCommandTest extends AbstractCommandTestCase
{
    protected function getObjectAndParams()
    {
        $params = [
            'email'    => 'support@cachethq.io',
            'verified' => true,
        ];
        $object = new SubscribeSubscriberCommand(
            $params['email'],
            $params['verified']
        );

        return compact('params', 'object');
    }

    protected function objectHasRules()
    {
        return true;
    }

    protected function getHandlerClass()
    {
        return SubscribeSubscriberCommandHandler::class;
    }
}
