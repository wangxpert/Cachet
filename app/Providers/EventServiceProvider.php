<?php

/*
 * This file is part of Cachet.
 *
 * (c) Alt Three Services Limited
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'CachetHQ\Cachet\Events\Incident\IncidentWasReportedEvent' => [
            'CachetHQ\Cachet\Handlers\Events\Incident\SendIncidentEmailNotificationHandler',
        ],
        'CachetHQ\Cachet\Events\Incident\MaintenanceWasScheduledEvent' => [
            'CachetHQ\Cachet\Handlers\Events\Incident\SendMaintenanceEmailNotificationHandler',
        ],
        'CachetHQ\Cachet\Events\Subscriber\SubscriberHasSubscribedEvent' => [
            'CachetHQ\Cachet\Handlers\Events\Subscriber\SendSubscriberVerificationEmailHandler',
        ],
        'CachetHQ\Cachet\Events\User\UserWasAddedEvent' => [
            //
        ],
        'CachetHQ\Cachet\Events\User\UserWasInvitedEvent' => [
            'CachetHQ\Cachet\Handlers\Events\User\SendInviteUserEmailHandler',
        ],
    ];
}
