<?php

class DashIncidentController extends Controller
{
    /**
     * Shows the incidents view.
     * @return \Illuminate\View\View
     */
    public function showIncidents()
    {
        $incidents = Incident::all();

        return View::make('dashboard.incidents')->with([
            'pageTitle' => 'Incidents - Dashboard',
            'incidents' => $incidents,
        ]);
    }

    /**
     * Shows the add incident view.
     * @return \Illuminate\View\View
     */
    public function showAddIncident()
    {
        return View::make('dashboard.incident-add')->with([
            'pageTitle' => 'Add Incident - Dashboard',
        ]);
    }

    /**
     * Shows the add incident template view.
     * @return \Illuminate\View\View
     */
    public function showAddIncidentTemplate()
    {
        return View::make('dashboard.incident-template')->with([
            'pageTitle' => 'Add Incident Template - Dashboard',
        ]);
    }

    /**
     * Creates a new incident template.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createIncidentTemplateAction()
    {
        $_template = Input::get('template');
        $template = IncidentTemplate::create($_template);

        return Redirect::back()->with('template', $template);
    }

    /**
     * Creates a new incident.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createIncidentAction()
    {
        $_incident = Input::get('incident');
        $incident = Incident::create($_incident);

        return Redirect::back()->with('incident', $incident);
    }
}
