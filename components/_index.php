<?php
$listFood = $foodsCore->getAll();

if (isset($_GET["logout"])) {
    $userCore->logout();
}
?>

<div class="container color-white-bg mt-3 mb-3">
    <div id="banner-area">
        <div class="owl-carousel owl-theme">
            <div class="item">
                <img src="https://images.foody.vn/res/g76/750850/prof/s576x330/foody-upload-api-foody-mobile-hhh-jpg-180614154620.jpg" alt="banner1" height="500">
            </div>
            <div class="item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTH9qplsFmgIIfYgGn1SviVKJ_1gD7BPfPIkg&usqp=CAU" alt="banner2" height="500">
            </div>
        </div>
    </div>


    <div id="foods">
        <h4 class="font-sans font-size-20">Food and Drink</h4>
        <div class="button-group text-right font-baloo font-size-16" id="filters">
            <button class="btn is-checked" data-filter="*">All</button>
            <button class="btn" data-filter=".0">Food</button>
            <button class="btn" data-filter=".1">Drink</button>
            <button class="btn" data-filter=".2">Yogurt</button>
        </div>

        <div class="grid w-100">
            <?php foreach ($listFood as $item) { ?>
                <div class="grid-item border <?php echo $item["type"]; ?>">
                    <div class="item py-2">
                        <div class="product font-sans">
                            <a href="detail.php?id=<?php echo $item["id"]; ?>"> <img src="<?php echo $item["img"]; ?>" alt="food" class="img-fluid" style="width: 200px;height: 200px;"></a>
                            <div class="text-center">
                                <h6><?php echo $item["name"]; ?></h6>
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
                    </div>
                </div>
            <?php } ?>
        </div>

        <!--Latest Blog-->
        <div id="blogs">
            <div class="container py-4">
                <h4 class="font-rubik font-size-20">Lastest Blogs</h4>
                <hr>
                <div class="owl-carousel owl-theme justify-between-space">
                    <div class="item py-2 px-2">
                        <div class="card border-0 font-rale mr-5 py-2 px-2" style="width: 18rem;">
                            <h5 class="card-title font-size-16">Upcoming Mobiles</h5>
                            <img src="https://cmay.vn/wp-content/uploads/2018/10/blog.jpg" alt="blog1" class="card-img-top">
                            <p class="cart-text font-size-14 text-black-50 py-1">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Quia nemo consectetur esse laudantium accusamus eveniet sunt vero debitis molestiae ut.</p>
                            <a href="#" class="color-second text-left">Go somewhere</a>
                        </div>
                    </div>
                    <div class="item py-2 px-2">
                        <div class="card border-0 font-rale mr-5 py-2 px-2" style="width: 18rem;">
                            <h5 class="card-title font-size-16">Upcoming Mobiles</h5>
                            <img src="https://cmay.vn/wp-content/uploads/2018/10/blog.jpg" alt="blog2" class="card-img-top">
                            <p class="cart-text font-size-14 text-black-50 py-1">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Quia nemo consectetur esse laudantium accusamus eveniet sunt vero debitis molestiae ut.</p>
                            <a href="#" class="color-second text-left">Go somewhere</a>
                        </div>
                    </div>
                    <div class="item py-2 px-2">
                        <div class="card border-0 font-rale mr-5 py-2 px-2" style="width: 18rem;">
                            <h5 class="card-title font-size-16">Upcoming Mobiles</h5>
                            <img src="https://cmay.vn/wp-content/uploads/2018/10/blog.jpg" alt="blog3" class="card-img-top">
                            <p class="cart-text font-size-14 text-black-50 py-1">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Quia nemo consectetur esse laudantium accusamus eveniet sunt vero debitis molestiae ut.</p>
                            <a href="#" class="color-second text-left">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>