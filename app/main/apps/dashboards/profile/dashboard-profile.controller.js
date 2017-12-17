(function () {
    'use strict';

    angular
        .module('app.dashboards.profile')
        .controller('DashboardProfileController', DashboardProfileController);

    /** @ngInject */
    function DashboardProfileController($scope, $document, $mdDialog, $http, DashboardData) {
        var vm = this;

        // Data

        vm.openTaskDialog = openTaskDialog;
        vm.openEditTaskDialog = openEditTaskDialog;
        vm.delete_item=delete_item;
        vm.displayData=displayData;

        vm.dashboardData = DashboardData;
        vm.widget2 = vm.dashboardData.widget2;
        $scope.insertData = function () {

            $http.post('/home/add', {

                'title': $scope.title,
                'description': $scope.description,
                'category': $scope.category

            }).then(function (data) {

                $scope.title = null;
                $scope.description = null;
                $scope.category = null;

                $('#myModal').modal('hide');


                $scope.displayData();
            })
        };

        //// select all post data
         function displayData() {
            $http.get('/home/view')
                .then(function (response) {

                    console.log(response.data);
                    vm.names = response.data;

                });
        }

        function delete_item  (data) {

            console.log(data.id);

                var confirm = $mdDialog.confirm()
                    .title('Are you sure?')
                    .content('The Task will be deleted.')
                    .ariaLabel('Delete Task')
                    .ok('Delete')
                    .cancel('Cancel')
                    .targetEvent(event);

                $mdDialog.show(confirm).then(function ()
                {

                    $http.get("/home/delete/" + data.id);
                    vm.displayData();

                }, function ()
                {



                    // Cancel Action
                });

        }
        /**
         * Open new task dialog
         *
         * @param ev
         * @param task
         */
        function openTaskDialog(ev, task) {

            console.log('hello');
            $mdDialog.show({

                controller: 'PostDialogController',
                controllerAs: 'vm',
                templateUrl: 'app/main/apps/dashboards/profile/dialogs/task/task-dialog.html',
                parent: angular.element($document.body),
                targetEvent: ev,
                clickOutsideToClose: true,
                locals: {
                    Task: task,
                    Tasks: vm.tasks,
                    event: ev,
                    Data:vm.displayData()
                }
            });
        }

        function openEditTaskDialog( task) {

            console.log(task);
            $mdDialog.show({

                controller: 'PostEditDialogController',
                controllerAs: 'vm',
                templateUrl: 'app/main/apps/dashboards/profile/dialogs/edit-task/edit-task-dialog.html',
                parent: angular.element($document.body),

                clickOutsideToClose: true,
                locals: {
                    Task: task,
                    Data:vm.displayData()


                }
            });
        }

    }


})();