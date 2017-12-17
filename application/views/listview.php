
<div class="container"   ng-init="displayData()">
    <div class="col-md-8 col-md-offset-2">

        <input type="hidden" ng-model="id">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New Item</button>
        <!-- Table -->


        <table class="table" >
            <thead>
            <td>Title</td>
            <td>Description</td>
            <td>Actions</td>

            </thead>


                <tr ng-repeat="x in names">

                    <td>{{x.title }}</td>
                    <td>{{x.description }}</td>
                    <td>
                        <a href="#view" class="btn btn-info">view</a>
                        <button  data-ng-click="updateData(x)" data-toggle="modal" data-target="#myeditModal" class="btn btn-success">update</button>
                        <button  data-ng-click="delete_item(x.id)" data-toggle="modal" data-target="#deleteModel" class="btn btn-danger">delete</button>
                    </td>
                </tr>



        </table>

    </div>

    <?php include('list-crud/modal.php') ?>
    <?php include('list-crud/deleteModel.php') ?>
    <?php include('list-crud/editModal.php') ?>


