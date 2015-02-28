<?php

Route::group([
    'before'    => 'auth',
    'prefix'    => 'dashboard',
    'namespace' => 'CachetHQ\Cachet\Http\Controllers',
], function () {
    // Dashboard
    Route::get('/', [
        'as'   => 'dashboard',
        'uses' => 'DashboardController@showDashboard',
    ]);

    // Components
    Route::group(['prefix' => 'components'], function () {
        Route::get('/', [
            'as'   => 'dashboard.components',
            'uses' => 'DashComponentController@showComponents',
        ]);
        Route::get('add', [
            'as'   => 'dashboard.components.add',
            'uses' => 'DashComponentController@showAddComponent',
        ]);
        Route::post('add', 'DashComponentController@createComponentAction');
        Route::get('groups', [
            'as'   => 'dashboard.components.groups',
            'uses' => 'DashComponentController@showComponentGroups',
        ]);
        Route::get('groups/add', [
            'as'   => 'dashboard.components.groups.add',
            'uses' => 'DashComponentController@showAddComponentGroup',
        ]);
        Route::get('groups/edit/{component_group}', [
            'as'   => 'dashboard.components.groups.edit',
            'uses' => 'DashComponentController@showEditComponentGroup',
        ]);
        Route::post('groups/edit/{component_group}', 'DashComponentController@updateComponentGroupAction');

        Route::delete('groups/{component_group}/delete', 'DashComponentController@deleteComponentGroupAction');
        Route::post('groups/add', 'DashComponentController@postAddComponentGroup');
        Route::delete('{component}/delete', 'DashComponentController@deleteComponentAction');
        Route::get('{component}/edit', 'DashComponentController@showEditComponent');
        Route::post('{component}/edit', 'DashComponentController@updateComponentAction');
    });

    // Incidents
    Route::group(['prefix' => 'incidents'], function () {
        Route::get('/', [
            'as'   => 'dashboard.incidents',
            'uses' => 'DashIncidentController@showIncidents',
        ]);
        Route::get('add', [
            'as'   => 'dashboard.incidents.add',
            'uses' => 'DashIncidentController@showAddIncident',
        ]);
        Route::post('add', 'DashIncidentController@createIncidentAction');
        Route::delete('{incident}/delete', 'DashIncidentController@deleteIncidentAction');
        Route::get('{incident}/edit', 'DashIncidentController@showEditIncidentAction');
        Route::post('{incident}/edit', 'DashIncidentController@editIncidentAction');
    });

    // Scheduled Maintenance
    Route::group(['prefix' => 'schedule'], function () {
        Route::get('/', ['as' => 'dashboard.schedule', 'uses' => 'DashScheduleController@showIndex']);

        Route::get('add', [
            'as'   => 'dashboard.schedule.add',
            'uses' => 'DashScheduleController@showAddSchedule',
        ]);
        Route::post('add', 'DashScheduleController@addScheduleAction');

        Route::get('{incident}/edit', [
            'as'   => 'dashboard.schedule.edit',
            'uses' => 'DashScheduleController@showEditSchedule',
        ]);
        Route::post('{incident}/edit', 'DashScheduleController@editScheduleAction');

        Route::delete('{incident}/delete', [
            'as'   => 'dashboard.schedule.delete',
            'uses' => 'DashScheduleController@deleteScheduleAction',
        ]);
    });

    // Incident Templates
    Route::group(['prefix' => 'templates'], function () {
        Route::get('/', [
            'as'   => 'dashboard.templates',
            'uses' => 'DashIncidentController@showTemplates',
        ]);

        Route::get('add', [
            'as'   => 'dashboard.templates.add',
            'uses' => 'DashIncidentController@showAddIncidentTemplate',
        ]);
        Route::post('add', 'DashIncidentController@createIncidentTemplateAction');

        Route::get('{incident_template}/edit', 'DashIncidentController@showEditTemplateAction');
        Route::post('{incident_template}/edit', 'DashIncidentController@editTemplateAction');
        Route::delete('{incident_template}/delete', 'DashIncidentController@deleteTemplateAction');
    });

    // Metrics
    Route::group(['prefix' => 'metrics'], function () {
        Route::get('/', [
            'as'   => 'dashboard.metrics',
            'uses' => 'DashMetricController@showMetrics',
        ]);

        Route::get('add', [
            'as'   => 'dashboard.metrics.add',
            'uses' => 'DashMetricController@showAddMetric',
        ]);
        Route::post('add', 'DashMetricController@createMetricAction');
        Route::delete('{metric}/delete', 'DashMetricController@deleteMetricAction');
        Route::get('{metric}/edit', 'DashMetricController@showEditMetricAction');
        Route::post('{metric}/edit', 'DashMetricController@editMetricAction');
    });

    // Notifications
    Route::group(['prefix' => 'notifications'], function () {
        Route::get('/', [
            'as'   => 'dashboard.notifications',
            'uses' => 'DashboardController@showNotifications',
        ]);
    });

    // Team Members
    Route::group(['prefix' => 'team'], function () {
        Route::get('/', [
            'as'   => 'dashboard.team',
            'uses' => 'DashTeamController@showTeamView',
        ]);

        Route::group(['before' => 'admin'], function () {
            Route::get('add', [
                'as'   => 'dashboard.team.add',
                'uses' => 'DashTeamController@showAddTeamMemberView',
            ]);
            Route::get('{user}', 'DashTeamController@showTeamMemberView');
            Route::post('add', 'DashTeamController@postAddUser');
            Route::post('{user}', 'DashTeamController@postUpdateUser');
        });
    });

    // Settings
    Route::group(['prefix' => 'settings'], function () {
        Route::get('setup', [
            'as'   => 'dashboard.settings.setup',
            'uses' => 'DashSettingsController@showSetupView',
        ]);
        Route::get('security', [
            'as'   => 'dashboard.settings.security',
            'uses' => 'DashSettingsController@showSecurityView',
        ]);
        Route::get('theme', [
            'as'   => 'dashboard.settings.theme',
            'uses' => 'DashSettingsController@showThemeView',
        ]);
        Route::get('stylesheet', [
            'as'   => 'dashboard.settings.stylesheet',
            'uses' => 'DashSettingsController@showStylesheetView',
        ]);
        Route::post('/', 'DashSettingsController@postSettings');
    });

    // User Settings
    Route::group(['prefix' => 'user'], function () {
        Route::get('/', [
            'as'   => 'dashboard.user',
            'uses' => 'DashUserController@showUser',
        ]);
        Route::post('/', 'DashUserController@postUser');
        Route::get('{user}/api/regen', 'DashUserController@regenerateApiKey');
    });

    // Internal API.
    // This should only be used for making requests within the dashboard.
    Route::group(['prefix' => 'api'], function () {
        Route::get('incidents/templates', 'DashAPIController@getIncidentTemplate');
        Route::post('components/order', 'DashAPIController@postUpdateComponentOrder');
        Route::post('components/{component}', 'DashAPIController@postUpdateComponent');
    });
});
