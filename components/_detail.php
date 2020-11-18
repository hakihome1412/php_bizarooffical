<?php
$id = 1;
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$item = $foodsCore->getItemById($id);
$size = $sizeCore->getSizeByIdFood($id);
?>

<div class="container color-white-bg mt-3 mb-3">
    <div class="row">

        <div class="col-sm-6">
            <img src="<?php echo $item["img"] ?>" alt="img" class="img-fluid">
            <div class="form-row pt-4 font-size-16 font-sans">
                <div class="col">
                    <form method="POST" class="formDetailPost">
                        <button class="btn btn-warning form-control" type="submit">Add to Cart</button>
                        <input type="text" hidden class="inputIdUserPost" value="<?php echo (isset($_SESSION["userid"])) ? $_SESSION["userid"] : 0; ?>" name="idUser">
                        <input type="text" hidden class="inputQtyPost" value="1" name="quantity">
                        <input type="text" hidden class="inputSizePost" name="size">
                        <input type="text" hidden class="inputIdUserPost" name="idFood_DetailPage" value="<?php echo $id; ?>">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-6 py-5">
            <h3 class="font-sans font-size-20"><?php echo $item["name"] ?></h3>
            <div class="d-flex">
                <div class="rating text-warning font-size-12">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="far fa-star"></i></span>
                </div>
            </div>
            <hr class="m-0">

            <!--Product Price-->
            <table class="my-3">

                <tr class="font-sans font-size-14">
                    <td>Price</td>
                    <td class="font-size-20 text-danger"><span><?php echo number_format($item['price'], 0, '.', ',') ?> đ</span></td>
                </tr>
            </table>
            <hr>

            <!--Details-->
            <div class="row">
                <!--Qty-->
                <div class="col-6">
                    <div class="qty d-flex">
                        <h6 class="font-sans">Qty:</h6>
                        <div class="px-4 d-flex font-sans">
                            <button class="btnQtyUp border bg-light"><i class="fas fa-angle-up"></i></button>
                            <input type="text" class="inputQty border px-2 w-50 bg-light" disabled value="1">
                            <button class="btnQtyDown border bg-light"><i class="fas fa-angle-down"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ($size["size_s"] != 0 || $size["size_m"] != 0 || $size["size_l"] != 0) { ?>
                <!--Size-->
                <div class="size my-3">
                    <h6 class="font-sans">Size :</h6>
                    <div class="d-flex justify-content-between w-25">
                        <?php
                        if ($size["size_s"] == 1) { ?>
                            <div class="font-sans border p-2 divSizeS">
                                <button class="btn p-0 font-size 14 btnSizeS">S</button>
                            </div>
                        <?php  } ?>

                        <?php
                        if ($size["size_m"] == 1) { ?>
                            <div class="font-sans border p-2 divSizeM">
                                <button class="btn p-0 font-size 14 btnSizeM">M</button>
                            </div>
                        <?php  } ?>

                        <?php
                        if ($size["size_l"] == 1) { ?>
                            <div class="font-sans border p-2 divSizeL">
                                <button class="btn p-0 font-size 14 btnSizeL">L</button>
                            </div>
                        <?php  } ?>
                    </div>
                    <h5 style="color: red;" class="py-3 font-sans showError"></h5>
                </div>
            <?php } ?>


        </div>

        <!--Product Descriptions-->
        <div class="col-12 my-5">
            <h5 class="font-sans">Product Decriptions</h5>
            <hr>
            <p class="font-sans font-size-14">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati fuga
                repellendus cupiditate tenetur nihil saepe mollitia a minima eius voluptates nesciunt quaerat dicta
                tempore omnis beatae, nam esse libero facilis.</p>
            <p class="font-sans font-size-14">Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati fuga
                repellendus cupiditate tenetur nihil saepe mollitia a minima eius voluptates nesciunt quaerat dicta
                tempore omnis beatae, nam esse libero facilis.</p>
        </div>
    </div>
</div>