<?php
$listFoodInCart = array();
$totalInCart = 0;

if (isset($_SESSION["userid"])) {
    $totalInCart = $cartCore->getTotalInCart($_SESSION["userid"]);
    $res = $cartCore->getFoodsInCartByIdUser($_SESSION["userid"]);
    $listFoodInCart = $res["food_arr"];
}
?>

<div class="container-fluid w-75 color-white-bg mt-3 mb-3">
    <h5 class="font-size-baloo font-size-20">Shopping Cart</h5>
    <div class="row">
        <div class="col-sm-9">

            <?php foreach ($listFoodInCart as $item) { ?>

                <div class="row border-top py-3 mt-3">

                    <div class="col-sm-2">
                        <img src="<?php echo $item['img'] ?>" alt="product" style="height: 150px; width: 150px;">
                    </div>

                    <div class="col-sm-8">
                        <h5 class="font-sans font-size-20"><?php echo $item['name'] ?> <?php echo $item['size'] != "" ? "- " . $item['size'] : ""; ?></h5>
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-sans w-25">
                                <form method="POST" class="formCartPost" data-id="<?php echo $item['id']; ?>">
                                    <button class="qty-up border bg-light" data-id="<?php echo $item['id']; ?>" type="submit" name="btnQtyUp"><i class="fas fa-angle-up"></i></button>
                                    <input type="text" hidden value="<?php echo $item['id']; ?>" name="idCart_CartPage">
                                    <input type="text" class="qty-input border px-2 w-50 bg-light" data-id="<?php echo $item['id']; ?>" disabled value="<?php echo $item["quantity"]; ?>">
                                    <button class="qty-down border bg-light" data-id="<?php echo $item['id']; ?>" type="submit" name="btnQtyDown"><i class="fas fa-angle-down"></i></button>
                                </form>
                            </div>

                            <form method="POST">
                                <input type="hidden" value="<?php echo $item['id']; ?>" name="idCart">
                                <button type="submit" name="btnDeleteToCart" class="btn font-sans text-danger px-3" data-id="<?php echo $item['id']; ?>">Delete</button>
                            </form>
                        </div>
                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-sans">
                            <span class="product-price-text" data-id="<?php echo $item['id']; ?>"><?php echo number_format($item['price'] * $item["quantity"], 0, '.', ','); ?>đ</span>
                        </div>
                    </div>

                </div>

            <?php } ?>

        </div>
        <!--Subtotal-->
        <div class="col-sm-3">
            <div class="sub-total text-center mt-2 border">
                <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i>Đơn đặt hàng của bạn sẽ được MIỄN PHÍ tiền ship</h6>
                <div class="border-top py-4">
                    <h5 class="font-baloo font-size-20">Subtotal (<?php echo sizeof($listFoodInCart) ?> item):&nbsp;<span class="text-danger" id="deal-price"><?php echo number_format($totalInCart, 0, '.', ','); ?>đ</span></h5>
                    <a href="shipment.php"><button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button></a>
                </div>
            </div>
        </div>
    </div>
</div>