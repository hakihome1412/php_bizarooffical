<div class="modal fade" id="editModalFood" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modalEditTitle">Edit <?php echo $item3["name"]; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" class="formEditFood">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control editModalName" name="nameFood_AdminPage">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control editModalPrice" name="priceFood">
                    </div>
                    <div class="form-group">
                        <h6 class="showError_EditFood" style="color: red;"></h6>
                    </div>
                    <input type="text" hidden class="inputIdFoodUpdate" name="idFoodUpdate_AdminPage">
                    <button type="submit" class="btn btn-success w-25 mb-3">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>