<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Handlers\Commands\Subscriber;

use CachetHQ\Cachet\Commands\Subscriber\UnsubscribeSubscriberCommand;
use CachetHQ\Cachet\Events\SubscriberHasUnsubscribedEvent;
use CachetHQ\Cachet\Models\Subscriber;

class UnsubscribeSubscriberCommandHandler
{
    /**
     * Handle the subscribe customer command.
     *
     * @param \CachetHQ\Cachet\Commands\Subscriber\UnsubscribeSubscriberCommand $command
     *
     * @return void
     */
    public function handle(UnsubscribeSubscriberCommand $command)
    {
        $subscriber = $command->subscriber;

        event(new SubscriberHasUnsubscribedEvent($subscriber));

        $subscriber->delete();
    }
}
