(function () {
    'use strict';

    angular
        .module('app.dashboards.profile')
        .controller('PostEditDialogController', PostEditDialogController);

    /** @ngInject */
    function PostEditDialogController($mdDialog,$http, Task,Data) {
        var vm = this;


        // Data
        vm.title = 'Edit Task';
        vm.task = angular.copy(Task);
        vm.displayData=Data;


        console.log(vm.task);
        vm.newTask = false;

        if (vm.task) {
            vm.task = {
                'id':vm.task.id,
                'title': vm.task.title,
                'description': vm.task.description,
                'category': vm.task.category_id.name,

            };
            vm.title = 'Edit Post';


            vm.newTask = true;

        }



        // // Methods
        vm.insertEditData=insertEditData;
        // vm.EditNewTask = EditNewTask;
        //
        // // vm.insertEditData=insertEditData;
        //

        vm.closeDialog = closeDialog;

        //

        function insertEditData() {

            console.log(vm.task);
            $http.put('/home/update', {
                'id': vm.task.id,
                'title': vm.task.title,
                'description': vm.task.description,
                'category': vm.task.category,
            })
                .then(function () {

                    vm.displayData;

                    closeDialog();
                });





        }



        function closeDialog() {
            $mdDialog.hide();
        }
    }
})();