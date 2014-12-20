<?php

Route::group(['before' => 'auth', 'prefix' => 'dashboard'], function() {
    Route::get('/', ['as' => 'dashboard', 'uses' => 'DashboardController@showDashboard']);

    // TODO: Switch for Route::controller?
    Route::get('components', ['as' => 'dashboard.components', 'uses' => 'DashboardController@showComponents']);
    Route::get('components/add', ['as' => 'dashboard.components.add', 'uses' => 'DashboardController@showAddComponent']);
    Route::post('components/add', 'DashboardController@createComponentAction');
    Route::get('components/{component}/delete', 'DashboardController@deleteComponentAction');

    Route::get('incidents', ['as' => 'dashboard.incidents', 'uses' => 'DashboardController@showIncidents']);
    Route::get('incidents/add', ['as' => 'dashboard.incidents.add', 'uses' => 'DashboardController@showAddIncident']);
    Route::post('incidents/add', 'DashboardController@createIncidentAction');

    Route::get('metrics', ['as' => 'dashboard.metrics', 'uses' => 'DashboardController@showMetrics']);
    Route::get('notifications', ['as' => 'dashboard.notifications', 'uses' => 'DashboardController@showNotifications']);
    Route::get('status-page', ['as' => 'dashboard.status-page', 'uses' => 'DashboardController@showStatusPage']);
    Route::get('settings', ['as' => 'dashboard.settings', 'uses' => 'DashboardController@showSettings']);
    Route::post('settings', 'DashboardController@postSettings');
});
