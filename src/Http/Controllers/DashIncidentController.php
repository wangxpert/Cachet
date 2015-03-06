<?php

namespace CachetHQ\Cachet\Http\Controllers;

use CachetHQ\Cachet\Models\Component;
use CachetHQ\Cachet\Models\Incident;
use CachetHQ\Cachet\Models\IncidentTemplate;
use GrahamCampbell\Binput\Facades\Binput;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class DashIncidentController extends Controller
{
    /**
     * Stores the sub-sidebar tree list.
     *
     * @var array
     */
    protected $subMenu = [];

    /**
     * Creates a new DashIncidentController instance.
     *
     * @return \CachetHQ\Cachet\Http\Controllers\DashScheduleController
     */
    public function __construct()
    {
        $this->subMenu = [
            'incidents' => [
                'title'  => trans('dashboard.incidents.incidents'),
                'url'    => route('dashboard.incidents'),
                'icon'   => 'ion-android-checkmark-circle',
                'active' => true,
            ],
            'schedule'  => [
                'title'  => trans('dashboard.schedule.schedule'),
                'url'    => route('dashboard.schedule'),
                'icon'   => 'ion-android-calendar',
                'active' => false,
            ],
        ];

        View::share('subMenu', $this->subMenu);
        View::share('subTitle', trans('dashboard.incidents.title'));
    }

    /**
     * Shows the incidents view.
     *
     * @return \Illuminate\View\View
     */
    public function showIncidents()
    {
        $incidents = Incident::notScheduled()->orderBy('created_at', 'desc')->get();

        return View::make('dashboard.incidents.index')->with([
            'pageTitle' => trans('dashboard.incidents.incidents').' - '.trans('dashboard.dashboard'),
            'incidents' => $incidents,
        ]);
    }

    /**
     * Shows the add incident view.
     *
     * @return \Illuminate\View\View
     */
    public function showAddIncident()
    {
        return View::make('dashboard.incidents.add')->with([
            'pageTitle'         => trans('dashboard.incidents.add.title').' - '.trans('dashboard.dashboard'),
            'components'        => Component::all(),
            'incidentTemplates' => IncidentTemplate::all(),
        ]);
    }

    /**
     * Shows the incident templates.
     *
     * @return \Illuminate\View\View
     */
    public function showTemplates()
    {
        return View::make('dashboard.incidents.templates.index')->with([
            'pageTitle'         => trans('dashboard.incidents.templates.title').' - '.trans('dashboard.dashboard'),
            'incidentTemplates' => IncidentTemplate::all(),
        ]);
    }

    /**
     * Creates a new incident.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createIncidentAction()
    {
        $incidentData = Binput::get('incident');
        $incidentData['user_id'] = Auth::user()->id;
        $componentStatus = array_pull($incidentData, 'component_status');

        $incident = Incident::create($incidentData);

        if (! $incident->isValid()) {
            segment_track('Dashboard', [
                'event'   => 'Created Incident',
                'success' => false,
            ]);

            return Redirect::back()->withInput(Binput::all())
                ->with('title', sprintf(
                    '<strong>%s</strong> %s',
                    trans('dashboard.notifications.whoops'),
                    trans('dashboard.incidents.add.failure')
                ))
                ->with('errors', $incident->getErrors());
        }

        // Update the component.
        if (isset($incidentData['component_id']) && (int) $incidentData['component_id'] > 0) {
            Component::find($incidentData['component_id'])->update([
                'status' => $componentStatus,
            ]);
        }

        segment_track('Dashboard', [
            'event'   => 'Created Incident',
            'success' => true,
        ]);

        $successMsg = sprintf(
            '<strong>%s</strong> %s',
            trans('dashboard.notifications.awesome'),
            trans('dashboard.incidents.add.success')
        );

        return Redirect::back()->with('success', $successMsg);
    }

    /**
     * Shows the add incident template view.
     *
     * @return \Illuminate\View\View
     */
    public function showAddIncidentTemplate()
    {
        return View::make('dashboard.incidents.templates.add')->with([
            'pageTitle' => trans('dashboard.incidents.templates.add.title').' - '.trans('dashboard.dashboard'),
        ]);
    }

    /**
     * Shows the edit incident template view.
     *
     * @param \CachetHQ\Cachet\Models\IncidentTemplate $template
     *
     * @return \Illuminate\View\View
     */
    public function showEditTemplateAction(IncidentTemplate $template)
    {
        return View::make('dashboard.incidents.templates.edit')->with([
            'pageTitle' => trans('dashboard.incidents.templates.edit.title').' - '.trans('dashboard.dashboard'),
            'template'  => $template,
        ]);
    }

    /**
     * Deletes an incident template.
     *
     * @param \CachetHQ\Cachet\Models\IncidentTemplate $template
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteTemplateAction(IncidentTemplate $template)
    {
        segment_track('Dashboard', [
            'event' => 'Deleted Incident Template',
        ]);

        $template->delete();

        return Redirect::back();
    }

    /**
     * Creates a new incident template.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createIncidentTemplateAction()
    {
        $_template = Binput::get('template');
        $template = IncidentTemplate::create($_template);

        if (! $template->isValid()) {
            segment_track('Dashboard', [
                'event'   => 'Created Incident Template',
                'success' => false,
            ]);

            return Redirect::back()->withInput(Binput::all())
                ->with('title', sprintf(
                    '<strong>%s</strong> %s',
                    trans('dashboard.notifications.awesome'),
                    trans('dashboard.incidents.templates.add.failure')
                ))
                ->with('errors', $template->getErrors());
        }

        segment_track('Dashboard', [
            'event'   => 'Created Incident Template',
            'success' => true,
        ]);

        $successMsg = sprintf(
            '<strong>%s</strong> %s',
            trans('dashboard.notifications.awesome'),
            trans('dashboard.incidents.templates.add.success')
        );

        return Redirect::back()->with('success', $successMsg);
    }

    /**
     * Deletes a given incident.
     *
     * @param \CachetHQ\Cachet\Models\Incident $incident
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteIncidentAction(Incident $incident)
    {
        segment_track('Dashboard', [
            'event' => 'Deleted Incident',
        ]);

        $incident->delete();

        return Redirect::back();
    }

    /**
     * Shows the edit incident view.
     *
     * @param \CachetHQ\Cachet\Models\Incident $incident
     *
     * @return \Illuminate\View\View
     */
    public function showEditIncidentAction(Incident $incident)
    {
        return View::make('dashboard.incidents.edit')->with([
            'pageTitle'  => trans('dashboard.incidents.edit.title').' - '.trans('dashboard.dashboard'),
            'incident'   => $incident,
            'components' => Component::all(),
        ]);
    }

    /**
     * Edit an incident.
     *
     * @param \CachetHQ\Cachet\Models\Incident $incident
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editIncidentAction(Incident $incident)
    {
        $incidentData = Binput::get('incident');
        $incidentData['user_id'] = Auth::user()->id;
        $incident->update($incidentData);

        if (! $incident->isValid()) {
            segment_track('Dashboard', [
                'event'   => 'Edited Incident',
                'success' => false,
            ]);

            return Redirect::back()->withInput(Binput::all())
                ->with('title', sprintf(
                    '<strong>%s</strong> %s',
                    trans('dashboard.notifications.awesome'),
                    trans('dashboard.incidents.templates.edit.failure')
                ))
                ->with('errors', $incident->getErrors());
        }

        segment_track('Dashboard', [
            'event'   => 'Edited Incident',
            'success' => true,
        ]);

        $successMsg = sprintf(
            '<strong>%s</strong> %s',
            trans('dashboard.notifications.awesome'),
            trans('dashboard.incidents.edit.success')
        );

        return Redirect::to('dashboard/incidents')->with('success', $successMsg);
    }

    /**
     * Edit an incident template.
     *
     * @param \CachetHQ\Cachet\Models\IncidentTemplate $template
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editTemplateAction(IncidentTemplate $template)
    {
        segment_track('Dashboard', [
            'event' => 'Edited Incident Template',
        ]);

        $template->update(Binput::get('template'));

        return Redirect::back()->with('updatedTemplate', $template);
    }
}
