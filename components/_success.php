<?php
$idOrderAddNow = 0;
if (isset($_SESSION["idorderaddnow"])) {
    $idOrderAddNow = $_SESSION["idorderaddnow"];
}
?>

<div class="container color-white-bg mt-3 mb-3">
    <center>
        <img src="https://www.nettop.vn/wp-content/uploads/2019/07/alcc-tips-entrepreneurial-success.jpg" style="width: 600px;height: 300px;">
        <h3>You have successfully placed an order.</h3>
        <h3> You can start tracking the order with ID: <span style="color: red;"><?php echo $idOrderAddNow; ?></span>.</h3>
        <button class="btn btn-primary w-25 my-5 btnToHome py-3">Back to Home</button>
    </center>


</div>