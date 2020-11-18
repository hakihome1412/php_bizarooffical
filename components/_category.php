<?php
$listFood = $foodsCore->getAllFood();
$listDrink = $foodsCore->getAllDrink();
$listYogurt = $foodsCore->getAllYogurt();
shuffle($listFood);
shuffle($listDrink);
shuffle($listYogurt);
?>

<div class="container color-white-bg mt-3 mb-3">
    <div class="food">
        <h1 class="font-sans font-size-20 text-center">Food</h1>
        <div class="row px-2">
            <?php foreach ($listFood as $item) { ?>
                <div class="col-sm-4 py-2 border my-1">
                    <a href="detail.php?id=<?php echo $item["id"]; ?>"><img src="<?php echo $item["img"]; ?>" class="img-fluid" style="width: 400px;height: 250px;"></a>
                    <div class="text-center">
                        <h4><?php echo $item["name"]; ?></h4>
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                            <span><?php echo number_format($item['price'], 0, '.', ','); ?> đ</span>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>

    <div class="drink my-5">
        <h1 class="font-sans font-size-20 text-center">Drink</h1>
        <div class="row px-2">
            <?php foreach ($listDrink as $item) { ?>
                <div class="col-sm-4 py-2 border my-1">
                    <a href="detail.php?id=<?php echo $item["id"]; ?>"><img src="<?php echo $item["img"]; ?>" class="img-fluid" style="width: 400px;height: 250px;"></a>
                    <div class="text-center">
                        <h4><?php echo $item["name"]; ?></h4>
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                            <span><?php echo number_format($item['price'], 0, '.', ','); ?> đ</span>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>

    <div class="yogurt my-5">
        <h1 class="font-sans font-size-20 text-center">Yogurt</h1>
        <div class="row px-2">
            <?php foreach ($listYogurt as $item) { ?>
                <div class="col-sm-4 py-2 border my-1">
                    <a href="detail.php?id=<?php echo $item["id"]; ?>"><img src="<?php echo $item["img"]; ?>" class="img-fluid" style="width: 400px;height: 250px;"></a>
                    <div class="text-center">
                        <h4><?php echo $item["name"]; ?></h4>
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                            <span><?php echo number_format($item['price'], 0, '.', ','); ?> đ</span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>