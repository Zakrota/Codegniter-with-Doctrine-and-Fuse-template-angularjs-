angular.module('ANGULARVIEW')
    .controller('HomeCtrl', ['$scope', '$http', function ($scope, $http) {


        //// insert all post data

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
        $scope.displayData = function () {
            $http.get('/home/view')
                .then(function (response) {

                    console.log(response);
                    $scope.names = response.data;

                });
        }

        $scope.updateData = function (data) {

            console.log(data);
            $scope.data = data;
        }
        $scope.insertEditData = function (data) {

            console.log(data);
            $http.put('/home/update', {
                'id': data.id,
                'title': data.title,
                'description': data.description,
                'category': data.category
            })
                .then(function (data) {
                    $('#myeditModal').modal('hide');


                    $scope.displayData();
                });
        }

        $scope.delete_item = function (data) {


            console.log(data);

            var vm=this;
            $('#delete').click(function () {
                $http.get("/home/delete/" + data)
                    .then(function (data) {


                        console.log(data);
                        $('#deleteModel').modal('hide');
                        $scope.displayData();

                    });


            });


        }


    }]);