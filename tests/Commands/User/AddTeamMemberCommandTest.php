<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Tests\Cachet\Commands\User;

use CachetHQ\Cachet\Commands\User\AddTeamMemberCommand;
use CachetHQ\Cachet\Handlers\Commands\User\AddTeamMemberCommandHandler;
use CachetHQ\Tests\Cachet\Commands\AbstractCommandTestCase;

/**
 * This is the add team member command test class.
 *
 * @author James Brooks <james@alt-three.com>
 */
class AddTeamMemberCommandTest extends AbstractCommandTestCase
{
    protected function getObjectAndParams()
    {
        $params = [
            'username' => 'Test',
            'password' => 'fooey',
            'email'    => 'test@test.com',
            'level'    => 1,
        ];
        $object = new AddTeamMemberCommand(
            $params['username'],
            $params['password'],
            $params['email'],
            $params['level']
        );

        return compact('params', 'object');
    }

    protected function objectHasRules()
    {
        return true;
    }

    protected function getHandlerClass()
    {
        return AddTeamMemberCommandHandler::class;
    }
}
