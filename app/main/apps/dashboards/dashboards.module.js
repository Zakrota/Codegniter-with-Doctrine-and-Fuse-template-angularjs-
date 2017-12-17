(function ()
{
    'use strict';

    angular
        .module('app.dashboards',
            [
                'app.dashboards.project',
                // 'app.dashboards.server',
                // 'app.dashboards.analytics',
               'app.dashboards.profile'
            ]
        )
        .config(config);

    /** @ngInject */
    function config(msNavigationServiceProvider)
    {
        // Navigation
        msNavigationServiceProvider.saveItem('apps', {
            title : 'APPS',
            group : true,
            weight: 1
        });

        msNavigationServiceProvider.saveItem('apps.dashboards', {
            title : 'Blog',
            icon  : 'icon-tile-four',
            weight: 1
        });

        msNavigationServiceProvider.saveItem('apps.dashboards.project', {
            title: 'project',
            state: 'app.dashboards_project'
        });
        msNavigationServiceProvider.saveItem('apps.dashboards.profile', {
            title: 'posts',
            state: 'app.dashboards_profile'
        });
        //
        // msNavigationServiceProvider.saveItem('apps.dashboards.server', {
        //     title: 'server',
        //     state: 'app.dashboards_server'
        // });
        //
        // msNavigationServiceProvider.saveItem('apps.dashboards.analytics', {
        //     title: 'analytics',
        //     state: 'app.dashboards_analytics'
        // });

    }

})();