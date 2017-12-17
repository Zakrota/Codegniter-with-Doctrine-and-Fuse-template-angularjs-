<div class="modal fade" id="myModal" role="dialog"  >
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <div class="modal-body"   >



                <h1> Add Post </h1>

                <label>Title</label>
                <input type="text" class="form-control" placeholder="Title" name="title" ng-model="title">
                <label>Description </label>
                <input type="text" class="form-control" name="description" ng-model="description" placeholder="What is your Description ? " >
                <label  >Category</label>
                <input type="text" class="form-control" name="category" ng-model="category" placeholder="Category">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn  btn-success" name="btnInset" data-ng-click="insertData()"  value="Add Post">

            </div>
        </div>

    </div>
</div>