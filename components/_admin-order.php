<?php
$listOrders = $orderCore->getAllOrder();
$showOrderDetail = false;
$listOrderDetail = array();
if (isset($_GET["id"])) {
    $showOrderDetail = true;
    $listOrderDetail = $orderDetailCore->getAllDetailByIdOrder($_GET["id"]);
}
$num = 0;
?>
<div class="color-white-bg">
    <?php if ($showOrderDetail == false) { ?>
        <h4>Management Order</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Date Start</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listOrders as $item) { ?>
                    <tr>
                        <th><a href="account.php?option=order&id=<?php echo $item["id"]; ?>"><?php echo $item["id"]; ?></a></th>
                        <td><?php echo $item["total_qty"]; ?></td>
                        <td><?php echo number_format($item["total_price"], 0, '.', ','); ?> đ</td>
                        <td><?php echo $item["date_start"]; ?></td>
                        <?php if ($item["status"] == 0) { ?>
                            <td style="color: red;"><?php echo "Processing"; ?></td>
                        <?php } elseif ($item["status"] == 1) { ?>
                            <td style="color: blue;"><?php echo "Shipped"; ?></td>
                        <?php } else { ?>
                            <td style="color: green;"><?php echo "Done"; ?></td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <h4>Order Detail</h4>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Size</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listOrderDetail as $item2) { ?>
                    <?php $num++; ?>
                    <tr>
                        <td><?php echo $num; ?></td>
                        <td><?php echo $item2["name"]; ?></td>
                        <td><?php echo $item2["size"]; ?></td>
                        <td><?php echo number_format($item2["price"], 0, '.', ','); ?> đ</td>
                        <td><?php echo $item2["quantity"]; ?></td>
                        <td><?php echo number_format($item2["total_price_item"], 0, '.', ','); ?> đ</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } ?>


</div>