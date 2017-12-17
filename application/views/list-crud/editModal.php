<div class="modal fade" id="myeditModal" role="dialog"    >
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Post </h4>
            </div>
            <div class="modal-body"   >

                <label>Title</label>
                <input type="hidden" name="id" ng-model="data.id">
                <input type="text" class="form-control"  name="title" ng-model="data.title"  >
                <label>Description </label>
                <input type="text" class="form-control" name="description" ng-model="data.description" >
                <label  >Category</label>
                <input type="text" class="form-control" name="category" ng-model="data.category_id.name">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn  btn-success" name="btnInset" ng-click="insertEditData(data)"  value="Update ">

            </div>
        </div>

    </div>
</div>