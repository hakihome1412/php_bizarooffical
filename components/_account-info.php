<div class="color-white-bg">
    <h4>Account Information</h4>
    <hr>
    <form method="POST" class="formAccountInfo">
        <div class="form-group row">
            <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" disabled name="inputPassword" value="<?php echo $_SESSION["username"]; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <input type="checkbox" class="checkedChangePassword">
                <label class="form-check-label">
                    Change password
                </label>
            </div>
        </div>

        <div class="divChangePassword" style="display: none;">
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Old Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control inputPasswordOld" name="inputPasswordOld">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control inputPasswordNew" name="inputPasswordNew">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Confirm</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control inputPasswordConfirm" name="inputPasswordConfirm">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <h5 class="showError_AccountInfo" style="color: red;"></h5>
                    <button type="submit" class="btn btn-warning w-25 py-2 btnUpdateAccount">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>