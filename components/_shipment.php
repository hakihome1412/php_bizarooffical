<?php
if (!isset($_SESSION["userid"])) {
    header("Location:login.php");
}
?>

<div class="container color-white-bg mt-3 mb-3">
    <center>
        <h3>Shipment</h3>
    </center>
    <form method="post" class="formPostShipment">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name_ShipmentPage">
        </div>
        <div class="form-group">
            <label for="password">Address</label>
            <input type="text" class="form-control" name="address">
        </div>
        <div class="form-group">
            <label for="password">Phone Number</label>
            <input type="text" class="form-control" name="phone">
        </div>
        <div class="form-group">
            <h5 class="text-center showErrorShipPage" style="color: red;"></h5>
        </div>
        <button type="submit" class="btn btn-primary w-100 mb-3">Get the Order</button>
    </form>
</div>