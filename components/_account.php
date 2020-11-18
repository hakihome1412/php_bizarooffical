<?php
if (!isset($_SESSION["userid"])) {
    header("Location:index.php");
}

$option = "info";
if (isset($_GET["option"])) {
    $option = $_GET["option"];
}

?>

<div class="container color-white-bg mt-3 mb-3 font-sans">
    <div class="row">
        <div class="col-sm-3">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link <?php echo $option == "info" ? "active" : ""; ?>" id="v-pills-info-tab" href="account.php?option=info" role="tab">Account Information</a>
                <a class="nav-link <?php echo $option == "order" ? "active" : ""; ?>" id="v-pills-order-tab" href="account.php?option=order" role="tab">Management Order</a>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade <?php echo $option == "info" ? "show active" : ""; ?>">
                    <?php
                    require_once("_account-info.php");
                    ?>
                </div>
                <div class="tab-pane fade <?php echo $option == "order" ? "show active" : ""; ?>">
                    <?php
                    require_once("_account-order.php");
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>