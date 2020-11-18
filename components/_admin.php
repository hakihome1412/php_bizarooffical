<?php
if (!isset($_SESSION["userid"])) {
    header("Location:index.php");
}

$option = "order";
if (isset($_GET["option"])) {
    $option = $_GET["option"];
}

?>

<div class="container color-white-bg mt-3 mb-3 font-sans">
    <div class="row">
        <div class="col-sm-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link <?php echo $option == "order" ? "active" : ""; ?>" id="v-pills-order-tab" href="admin.php?option=order" role="tab">Management Order</a>
                <a class="nav-link <?php echo $option == "foods" ? "active" : ""; ?>" id="v-pills-foods-tab" href="admin.php?option=foods" role="tab">Management Foods</a>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade <?php echo $option == "order" ? "show active" : ""; ?>">
                    <?php
                    require_once("_admin-order.php");
                    ?>
                </div>

                <div class="tab-pane fade <?php echo $option == "foods" ? "show active" : ""; ?>">
                    <?php
                    require_once("_admin-foods.php");
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>