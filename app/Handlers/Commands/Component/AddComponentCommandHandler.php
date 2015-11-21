<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Handlers\Commands\Component;

use CachetHQ\Cachet\Commands\Component\AddComponentCommand;
use CachetHQ\Cachet\Events\Component\ComponentWasAddedEvent;
use CachetHQ\Cachet\Models\Component;

class AddComponentCommandHandler
{
    /**
     * Handle the add component command.
     *
     * @param \CachetHQ\Cachet\Commands\Component\AddComponentCommand $command
     *
     * @return \CachetHQ\Cachet\Models\Component
     */
    public function handle(AddComponentCommand $command)
    {
        $component = Component::create($this->filter($command));

        event(new ComponentWasAddedEvent($component));

        return $component;
    }

    /**
     * Filter the command data.
     *
     * @param \CachetHQ\Cachet\Commands\Incident\AddComponentCommand $command
     *
     * @return array
     */
    protected function filter(AddComponentCommand $command)
    {
        return array_filter([
            'name'        => $command->name,
            'description' => $command->description,
            'link'        => $command->link,
            'status'      => $command->status,
            'enabled'     => $command->enabled,
            'order'       => $command->order,
            'group_id'    => $command->group_id,
        ], 'is_null');
    }
}
