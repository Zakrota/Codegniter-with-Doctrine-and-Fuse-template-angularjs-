<div class="modal fade" id="deleteModel" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirmation  Process </h4>
            </div>
            <div class="modal-body">
                <p >The process will be done if you press confirm, <b style="color: red">Are you sure ? <b> </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" id="delete" class="btn  btn-danger" name="btnInset"
                      ng-click="delete_item(x.id)" value="confirm">

            </div>
        </div>

    </div>
</div>