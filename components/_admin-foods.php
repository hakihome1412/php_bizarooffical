<?php
$listFoods = $foodsCore->getAllFoods();
?>

<div class="color-white-bg">
    <div class="d-flex my-2">
        <h4>Management Foods</h4>
        <button class="btn btn-primary btnCreateNewFood" style="margin-left: 40%;" data-toggle="modal" data-target="#createModalFood">Create New Food</button>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listFoods as $item3) { ?>
                <tr>
                    <th><?php echo $item3["id"]; ?></th>
                    <td><a href="detail.php?id=<?php echo $item3["id"]; ?>"><?php echo $item3["name"]; ?></a></td>
                    <td><?php echo number_format($item3['price'], 0, '.', ','); ?> đ</td>
                    <td class="text-center">
                        <form method="POST" class="formFoodAdmin">
                            <button type="submit" class="btn btn-success btnEditFood" style="width: 100px;" data-toggle="modal" data-target="#editModalFood">Edit</button>
                            <input type="text" hidden value="<?php echo $item3["id"]; ?>" name="idFood_AdminPage">
                            <button type="submit" class="btn btn-danger btnDeleteFood" style="width: 100px;">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
    require_once("modal_editFood.php");
    ?>
    <!-- Modal Create -->
    <div class="modal fade" id="createModalFood" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title modalEditTitle">Create New Food</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" class="formCreateFood">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control createModalName" name="nameFoodCreate_AdminPage">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control createModalPrice" name="priceFoodCreate">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control selectTypeFood" name="typeFoodCreate">
                                <option value="0">Food</option>
                                <option value="1">Drink</option>
                                <option value="2">Yogurt</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Image</label> <br>
                            <input type="file" accept="image/*" name="fileImgFoodCreate">
                        </div>
                        <div class="form-group">
                            <label for="price">Size</label><br>
                            <input type="checkbox" id="checkSizeS" value="0">
                            <label class="form-check-label">S</label>
                            <input class="ml-5" type="checkbox" id="checkSizeM" value="0">
                            <label class="form-check-label">M</label>
                            <input class="ml-5" type="checkbox" id="checkSizeL" value="0">
                            <label class="form-check-label">L</label>
                        </div>
                        <div class="form-group">
                            <h6 class="showError_CreateFood" style="color: red;"></h6>
                        </div>
                        <input type="text" hidden class="inputIdFoodUpdate" name="idFoodUpdate_AdminPage">
                        <button type="submit" class="btn btn-success w-25 mb-3">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>