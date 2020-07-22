<div class="modal modal-danger" tabindex="-1" role="dialog" id="modal-confirm-delete" >
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h3>Are you sure?</h3>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="idToBeDeleted">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="deleteItem()">I'm sure</button>
            </div>
        </div>
    </div>
</div>
