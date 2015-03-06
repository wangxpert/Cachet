<?php

namespace CachetHQ\Cachet\Http\Controllers;

use CachetHQ\Cachet\Models\Component;
use CachetHQ\Cachet\Models\ComponentGroup;
use CachetHQ\Cachet\Models\Tag;
use GrahamCampbell\Binput\Facades\Binput;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class DashComponentController extends Controller
{
    protected $subMenu = [];

    public function __construct()
    {
        $this->subMenu = [
            'components' => [
                'title'  => trans('dashboard.components.components'),
                'url'    => route('dashboard.components'),
                'icon'   => 'ion-outlet',
                'active' => false,
            ],
            'groups' => [
                'title'  => trans_choice('dashboard.components.groups.groups', 2),
                'url'    => route('dashboard.components.groups'),
                'icon'   => 'ion-folder',
                'active' => false,
            ],
        ];

        View::share('subMenu', $this->subMenu);

        View::share('subTitle', trans_choice('dashboard.components.components', 2));
    }

    /**
     * Shows the components view.
     *
     * @return \Illuminate\View\View
     */
    public function showComponents()
    {
        $components = Component::orderBy('order')->orderBy('created_at')->get();

        $this->subMenu['components']['active'] = true;

        return View::make('dashboard.components.index')->with([
            'pageTitle'  => trans_choice('dashboard.components.components', 2).' - '.trans('dashboard.dashboard'),
            'components' => $components,
            'subMenu'    => $this->subMenu,
        ]);
    }

    /**
     * Shows the component groups view.
     *
     * @return \Illuminate\View\View
     */
    public function showComponentGroups()
    {
        $this->subMenu['groups']['active'] = true;

        return View::make('dashboard.components.groups.index')->with([
            'pageTitle' => trans_choice('dashboard.components.groups.groups', 2).' - '.trans('dashboard.dashboard'),
            'groups'    => ComponentGroup::all(),
            'subMenu'   => $this->subMenu,
        ]);
    }

    /**
     * Shows the edit component view.
     *
     * @param \CachetHQ\Cachet\Models\Component $component
     *
     * @return \Illuminate\View\View
     */
    public function showEditComponent(Component $component)
    {
        $groups = ComponentGroup::all();

        $pageTitle = sprintf(
            '"%s" - %s - %s',
            $component->name,
            trans('dashboard.components.edit.title'),
            trans('dashboard.dashboard')
        );

        return View::make('dashboard.components.edit')->with([
            'pageTitle' => $pageTitle,
            'component' => $component,
            'groups'    => $groups,
        ]);
    }

    /**
     * Updates a component.
     *
     * @param \CachetHQ\Cachet\Models\Component $component
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateComponentAction(Component $component)
    {
        $_component = Binput::get('component');
        $_component['user_id'] = Auth::user()->id;
        $tags = array_pull($_component, 'tags');

        $component->update($_component);

        if (! $component->isValid()) {
            segment_track('Dashboard', [
                'event'   => 'Edit Component',
                'success' => false,
            ]);

            return Redirect::back()->withInput(Binput::all())
                ->with('title', sprintf(
                    '<strong>%s</strong> %s',
                    trans('dashboard.notifications.whoops'),
                    trans('dashboard.components.edit.failure')
                ))
                ->with('errors', $component->getErrors());
        }

        segment_track('Dashboard', [
            'event'   => 'Edit Component',
            'success' => true,
        ]);

        // The component was added successfully, so now let's deal with the tags.
        $tags = preg_split('/ ?, ?/', $tags);

        // For every tag, do we need to create it?
        $componentTags = array_map(function ($taggable) use ($component) {
            return Tag::firstOrCreate([
                'name' => $taggable,
            ])->id;
        }, $tags);

        $component->tags()->sync($componentTags);

        $successMsg = sprintf(
            '<strong>%s</strong> %s',
            trans('dashboard.notifications.awesome'),
            trans('dashboard.components.edit.success')
        );

        return Redirect::back()->with('success', $successMsg);
    }

    /**
     * Shows the add component view.
     *
     * @return \Illuminate\View\View
     */
    public function showAddComponent()
    {
        $groups = ComponentGroup::all();

        return View::make('dashboard.components.add')->with([
            'pageTitle' => trans('dashboard.components.add.title').' - '.trans('dashboard.dashboard'),
            'groups'    => $groups,
        ]);
    }

    /**
     * Creates a new component.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createComponentAction()
    {
        $_component = Binput::get('component');
        $_component['user_id'] = Auth::user()->id;
        // We deal with tags separately.
        $tags = array_pull($_component, 'tags');

        $component = Component::create($_component);

        if (! $component->isValid()) {
            segment_track('Dashboard', [
                'event'   => 'Created Component',
                'success' => false,
            ]);

            return Redirect::back()->withInput(Binput::all())
                ->with('title', sprintf(
                    '<strong>%s</strong> %s',
                    trans('dashboard.notifications.whoops'),
                    trans('dashboard.components.add.failure')
                ))
                ->with('errors', $component->getErrors());
        }

        segment_track('Dashboard', [
            'event'   => 'Created Component',
            'success' => true,
        ]);

        // The component was added successfully, so now let's deal with the tags.
        $tags = preg_split('/ ?, ?/', $tags);

        // For every tag, do we need to create it?
        $componentTags = array_map(function ($taggable) use ($component) {
            return Tag::firstOrCreate([
                'name' => $taggable,
            ])->id;
        }, $tags);

        $component->tags()->sync($componentTags);

        $successMsg = sprintf(
            '<strong>%s</strong> %s',
            trans('dashboard.notifications.awesome'),
            trans('dashboard.components.add.success')
        );

        return Redirect::back()->with('success', $successMsg);
    }

    /**
     * Deletes a given component.
     *
     * @param \CachetHQ\Cachet\Models\Component $component
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteComponentAction(Component $component)
    {
        segment_track('Dashboard', [
            'event' => 'Deleted Component',
        ]);

        $component->delete();

        return Redirect::back();
    }

    /**
     * Deletes a given component group.
     *
     * @param \CachetHQ\Cachet\Models\ComponentGroup $group
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteComponentGroupAction(ComponentGroup $group)
    {
        segment_track('Dashboard', [
            'event' => 'Deleted Component Group',
        ]);

        $group->delete();

        return Redirect::back();
    }

    /**
     * Shows the add component group view.
     *
     * @return \Illuminate\View\View
     */
    public function showAddComponentGroup()
    {
        return View::make('dashboard.components.groups.add')->with([
            'pageTitle' => trans('dashboard.components.groups.add.title').' - '.trans('dashboard.dashboard'),
        ]);
    }

    /**
     * Shows the edit component group view.
     *
     * @param \CachetHQ\Cachet\Models\ComponentGroup $group
     *
     * @return \Illuminate\View\View
     */
    public function showEditComponentGroup(ComponentGroup $group)
    {
        return View::make('dashboard.components.groups.edit')->with([
            'pageTitle' => trans('dashboard.components.groups.edit.title').' - '.trans('dashboard.dashboard'),
            'group'     => $group,
        ]);
    }

    /**
     * Creates a new component.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postAddComponentGroup()
    {
        $group = ComponentGroup::create(Binput::get('group'));

        if (! $group->isValid()) {
            segment_track('Dashboard', [
                'event'   => 'Created Component Group',
                'success' => false,
            ]);

            return Redirect::back()->withInput(Binput::all())
                ->with('title', sprintf(
                    '<strong>%s</strong> %s',
                    trans('dashboard.notifications.whoops'),
                    trans('dashboard.components.groups.add.failure')
                ))
                ->with('errors', $group->getErrors());
        }

        segment_track('Dashboard', [
            'event'   => 'Created Component Group',
            'success' => true,
        ]);

        $successMsg = sprintf(
            '<strong>%s</strong> %s',
            trans('dashboard.notifications.awesome'),
            trans('dashboard.components.groups.add.success')
        );

        return Redirect::back()->with('success', $successMsg);
    }

    /**
     * Updates a component group.
     *
     * @param \CachetHQ\Cachet\Models\ComponentGroup $group
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateComponentGroupAction(ComponentGroup $group)
    {
        $groupData = Binput::get('group');
        $group->update($groupData);

        if (! $group->isValid()) {
            segment_track('Dashboard', [
                'event'   => 'Edit Component Group',
                'success' => false,
            ]);

            return Redirect::back()->withInput(Binput::all())
                ->with('title', sprintf(
                    '<strong>%s</strong> %s',
                    trans('dashboard.notifications.whoops'),
                    trans('dashboard.components.groups.edit.failure')
                ))
                ->with('errors', $group->getErrors());
        }

        segment_track('Dashboard', [
            'event'   => 'Edit Component Group',
            'success' => true,
        ]);

        $successMsg = sprintf(
            '<strong>%s</strong> %s',
            trans('dashboard.notifications.awesome'),
            trans('dashboard.components.groups.edit.success')
        );

        return Redirect::back()->with('success', $successMsg);
    }
}
