<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Events\ComponentGroup;

use CachetHQ\Cachet\Models\ComponentGroup;

class ComponentGroupWasUpdatedEvent
{
    /**
     * The component group that was updated.
     *
     * @var \CachetHQ\Cachet\Models\ComponentGroup
     */
    public $group;

    /**
     * Create a new component group was updated event instance.
     *
     * @return void
     */
    public function __construct(ComponentGroup $group)
    {
        $this->group = $group;
    }
}
