(function () {
    'use strict';

    angular
        .module('app.dashboards.profile')
        .controller('PostDialogController', PostDialogController);

    /** @ngInject */
    function PostDialogController($mdDialog,$http,$scope, Task, Tasks,Data) {
        var vm = this;


        // Data
        vm.title = 'Edit Task';
        vm.task = angular.copy(Task);
        vm.tasks = Tasks;
        vm.displayData=Data;
        vm.newTask = false;

        vm.displayData=displayData;
        if (!vm.task) {
            vm.task = {
                'id': '',
                'title': '',
                'description': '',
                'category': '',

            };
            vm.title = 'New Post';

            vm.newTask = true;

        }

        // Methods
        vm.addNewTask = addNewTask;

        vm.closeDialog = closeDialog;

        //////////

        /**
         * Add new task
         */
        function addNewTask() {
           console.log(vm.task);

            $http.post('/home/add', {

                'title': vm.task.title,
                'description': vm.task.description,
                'category': vm.task.category

            }).then(function (data) {

                vm.task.title = null;
                vm.task.description = null;
                vm.task.category = null;

                vm.displayData.reload();

            });

             closeDialog();
        }




        /**
         * Close dialog
         */

        function closeDialog() {
            $mdDialog.hide();
        }
    }
})();