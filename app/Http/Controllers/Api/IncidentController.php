<?php

/*
 * This file is part of Cachet.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CachetHQ\Cachet\Http\Controllers\Api;

use CachetHQ\Cachet\Events\IncidentHasReportedEvent;
use CachetHQ\Cachet\Facades\Setting;
use CachetHQ\Cachet\Models\Incident;
use Exception;
use GrahamCampbell\Binput\Facades\Binput;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class IncidentController extends AbstractApiController
{
    /**
     * Get all incidents.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Illuminate\Contracts\Auth\Guard          $auth
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getIncidents(Request $request, Guard $auth)
    {
        $incidentVisiblity = $auth->check() ? 0 : 1;

        $incidents = Incident::where('visible', '>=', $incidentVisiblity)
            ->paginate(Binput::get('per_page', 20));

        return $this->paginator($incidents, $request);
    }

    /**
     * Get a single incident.
     *
     * @param \CachetHQ\Cachet\Models\Incident $incident
     *
     * @return \CachetHQ\Cachet\Models\Incident
     */
    public function getIncident(Incident $incident)
    {
        return $this->item($incident);
    }

    /**
     * Create a new incident.
     *
     * @param \Illuminate\Contracts\Auth\Guard $auth
     *
     * @return \CachetHQ\Cachet\Models\Incident
     */
    public function postIncidents(Guard $auth)
    {
        $incidentData = Binput::all();

        if (!array_has($incidentData, 'visible')) {
            $incidentData['visible'] = 1;
        }

        try {
            $incident = Incident::create($incidentData);
        } catch (Exception $e) {
            throw new BadRequestHttpException();
        }

        $isEnabled = (bool) Setting::get('enable_subscribers', false);
        $mailAddress = env('MAIL_ADDRESS', false);
        $mailFrom = env('MAIL_NAME', false);
        $subscribersEnabled = $isEnabled && $mailAddress && $mailFrom;

        if (array_get($incidentData, 'notify') && $subscribersEnabled) {
            event(new IncidentHasReportedEvent($incident));
        }

        if ($incident->isValid()) {
            return $this->item($incident);
        }

        throw new BadRequestHttpException();
    }

    /**
     * Update an existing incident.
     *
     * @param \CachetHQ\Cachet\Models\Inicdent $incident
     *
     * @return \CachetHQ\Cachet\Models\Incident
     */
    public function putIncident(Incident $incident)
    {
        $incident->update(Binput::all());

        if ($incident->isValid('updating')) {
            return $this->item($incident);
        }

        throw new BadRequestHttpException();
    }

    /**
     * Delete an existing incident.
     *
     * @param \CachetHQ\Cachet\Models\Inicdent $incident
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteIncident(Incident $incident)
    {
        $incident->delete();

        return $this->noContent();
    }
}
