<?php

/*
 * This file is part of Cachet.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Tests\Cachet\Api;

use CachetHQ\Tests\Cachet\AbstractTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ComponentTest extends AbstractTestCase
{
    use DatabaseMigrations;

    public function testGetComponents()
    {
        $this->get('/api/v1/components')->seeJson(['data' => []]);
    }

    public function testGetInvalidComponent()
    {
        $this->setExpectedException('Illuminate\Database\Eloquent\ModelNotFoundException');
        $this->get('/api/v1/components/1');
    }

    /*public function testPostComponentUnauthorized()
    {
        $this->post('/api/v1/components')->seeJson(['data']);
    }*/
}
