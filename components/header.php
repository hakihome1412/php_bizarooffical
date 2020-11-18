<?php
session_start();
require_once('Bridge.php');
if (isset($_SESSION["userid"])) {
    $res = $cartCore->getFoodsInCartByIdUser($_SESSION["userid"]);
    $countCart = $res["count"];
}


$id = 1;
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}

$item = $foodsCore->getItemById($id);
$size = $sizeCore->getSizeByIdFood($id);
$errorSize = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bizaro Coffee</title>

    <!--Bootstrap CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous" />

    <!--OwlCarousel CDN-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    <!--Font Awesome Icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />

    <!--Custom CSS File-->
    <link rel="stylesheet" type="text/css" href="./public/css/styles.css" />
</head>

<body>
    <!--Header-->
    <header>
        <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
            <p class="font-sans font-size-20 text-black-50 m-0">
                Web này là của Huỳnh Phúc Huy (4 đường Số 2 p.10 quận Tân Bình TP.HCM)
            </p>

            <?php if (isset($_SESSION["userid"])) { ?>
                <?php
                $user = $userCore->getUserById($_SESSION["userid"]);
                ?>
                <?php if ($user["role"] == 0) { ?>
                    <div class="font-sans font-size-14">
                        <p class="px-3 border-right text-dark">Hello, <a href="admin.php" class="px-3 text-dark" id="a_logout"><?php echo $user["username"]; ?></a></p>
                        <a href="index.php?logout=true" class="px-3 text-dark" id="a_logout">Logout</a>
                    </div>
                <?php } else { ?>
                    <div class="font-sans font-size-14">
                        <p class="px-3 border-right text-dark">Hello, <a href="account.php" class="px-3 text-dark" id="a_logout"><?php echo $user["username"]; ?></a></p>
                        <a href="index.php?logout=true" class="px-3 text-dark" id="a_logout">Logout</a>
                    </div>
                <?php  } ?>
            <?php } else { ?>
                <div class="font-sans font-size-14">
                    <a href="login.php" class="px-3 border-right border-left text-dark">Login</a>
                    <a href="register.php" class="px-3 border-right text-dark">Register</a>
                </div>
            <?php }  ?>


        </div>

        <!--Start Primary Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark color-violet-bg">
            <a class="navbar-brand" href="index.php">Bizaro Coffee</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav m-auto font-rubik">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="category.php">Category</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="blog.php">Blog</a>
                    </li>
                </ul>


                <a href="cart.php" class="py-2 rounded-pill color-black-bg" style="text-decoration: none;">
                    <span class="fon-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                    <span class="px-3 py-2 rounded-pill text-dark bg-light" id="countCart"><?php echo (isset($countCart)) ? $countCart : 0; ?></span>
                </a>

            </div>
        </nav>
    </header>

    <!--Main-->
    <div class="container-fluid color-violet-bg">