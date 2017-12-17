var ANGULARVIEW = angular.module('ANGULARVIEW', [
    'ngRoute'
]);
ANGULARVIEW.config(['$routeProvider', function ($routeProvider) {
    $routeProvider
        .when('/', {
            'templateUrl': '/home/listview',
            'controller': 'HomeCtrl'

        })


}]);