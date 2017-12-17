(function () {
    'use strict';

    angular
        .module('app.dashboards.profile',
            [
                // 3rd Party Dependencies
                'nvd3'
            ]
        )
        .config(config);

    /** @ngInject */
    function config($stateProvider,$translatePartialLoaderProvider , msApiProvider) {
        // State
        $stateProvider.state('app.dashboards_profile', {
            url: '/dashboard-profile',
            views: {
                'content@app': {
                    templateUrl: 'app/main/apps/dashboards/profile/dashboard-profile.html',
                    controller: 'DashboardProfileController as vm'
                }
            },
            resolve  : {
                DashboardData: function (msApi)
                {
                    return msApi.resolve('dashboard.profile@get');
                }
            },
            bodyClass: 'dashboard-profile'
        });
        // Translation
        $translatePartialLoaderProvider.addPart('app/main/apps/dashboards/profile');
        // Api
        msApiProvider.register('dashboard.profile', ['app/data/dashboard/profile/data.json']);

    }
})();