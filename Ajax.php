<?php
session_start();
require_once('Bridge.php');

if (isset($_POST)) {
    if (isset($_POST["idCart_CartPage"])) {
        if ($_POST["status"] == 1) {
            $result = $cartCore->addOneQtyByIdCart($_POST["idCart_CartPage"]);
            if ($result) {
                $total = $cartCore->getTotalInCart($_SESSION["userid"]);
                $cartline = $cartCore->getFoodtByIdUserAndIdCart($_SESSION["userid"], $_POST["idCart_CartPage"]);
                echo $total . "-" . $cartline["quantity"] * $cartline["price"];
            } else {
                echo "fail add";
            }
        } else {
            $result = $cartCore->removeOneQtyIdCart($_POST["idCart_CartPage"]);
            if ($result) {
                $total = $cartCore->getTotalInCart($_SESSION["userid"]);
                $cartline = $cartCore->getFoodtByIdUserAndIdCart($_SESSION["userid"], $_POST["idCart_CartPage"]);
                echo $total . "-" . $cartline["quantity"] * $cartline["price"];
            } else {
                echo "fail remove";
            }
        }
    }

    if (isset($_POST["idFood_DetailPage"])) {
        $result =  $cartCore->addToCart($_SESSION["userid"], $_POST["idFood_DetailPage"], $_POST["quantity"], $_POST["size"]);
        if ($result) {
            $count = $cartCore->getCountInCartByIdUser($_SESSION["userid"]);
            echo $count;
        } else {
            echo "fail get count";
        }
    }

    if (isset($_POST["name_ShipmentPage"])) {
        if (empty($_POST["name_ShipmentPage"]) || empty($_POST["address"]) || empty($_POST["phone"])) {
            echo "Empty fields";
        } else {
            if (!preg_match('/(84|0[3|5|7|8|9])+([0-9]{8})\b/', $_POST["phone"])) {
                echo "Phone number invalid";
            } else {
                $idShip = $inforShipCore->addNewOneInforShip($_POST["name_ShipmentPage"], $_POST["address"], $_POST["phone"]);
                $totalQty = $cartCore->getCountInCart($_SESSION["userid"]);
                $totalPrice = $cartCore->getTotalInCart($_SESSION["userid"]);
                $dateStart =  date('Y-m-d');

                $idOrder = $orderCore->addNewOneOrder($idShip, $_SESSION["userid"], $totalQty, $totalPrice, $dateStart);

                if ($idOrder != 0) {
                    $arrCart = $cartCore->getCartByIdUser($_SESSION["userid"]);
                    $result = $orderDetailCore->addDetailByIdOrder($idOrder, $arrCart);
                    if ($result) {
                        $resultt = $cartCore->setStatus_1_CartByIdUser($_SESSION["userid"]);
                        if ($resultt) {
                            $_SESSION["idorderaddnow"] = $idOrder;
                            echo "success";
                        } else {
                            echo "Fail to set status cart";
                        }
                    } else {
                        echo "Fail create new order detail";
                    }
                } else {
                    echo "Fail create new order";
                }
            }
        }
    }

    if (isset($_POST["inputPasswordOld"])) {
        if (empty($_POST["inputPasswordOld"]) || empty($_POST["inputPasswordNew"]) || empty($_POST["inputPasswordConfirm"])) {
            echo "Empty fields";
        } else {
            $user = $userCore->getUserById($_SESSION["userid"]);
            if (password_verify($_POST["inputPasswordOld"], $user["pass"])) {
                if ($_POST["inputPasswordNew"] == $_POST["inputPasswordConfirm"]) {
                    $result = $userCore->changePassword($_SESSION["userid"], $_POST["inputPasswordNew"]);
                    if ($result) {
                        echo "success";
                    } else {
                        echo "Fail to update password";
                    }
                }
            } else {
                echo "Old password invalid";
            }
        }
    }

    if (isset($_POST["idFood_AdminPage"])) {
        if ($_POST["status"] == 2) {
            $result = $foodsCore->deleteFoodById($_POST["idFood_AdminPage"]);
            if ($result) {
                echo "delete success";
            } else {
                echo "Fail delete";
            }
        } else {
            $result = $foodsCore->getItemById($_POST["idFood_AdminPage"]);
            echo $_POST["idFood_AdminPage"] . "^^^" . $result["name"] . "^^^" . $result["price"] . "^^^" . $result["img"];
        }
    }

    if (isset($_POST["nameFood_AdminPage"])) {
        if (empty($_POST["nameFood_AdminPage"]) || empty($_POST["priceFood"])) {
            echo "Empty fields";
        } else {
            if (!preg_match('/^[0-9]*$/', $_POST["priceFood"])) {
                echo "Price invalid";
            } else {
                if ((int)$_POST["priceFood"] < 1000) {
                    echo "Price must be greater than 1000";
                } else {
                    $result = $foodsCore->updateFoodById($_POST["idFoodUpdate_AdminPage"], $_POST["nameFood_AdminPage"], $_POST["priceFood"]);
                    if ($result) {
                        echo "update success";
                    } else {
                        echo "Fail update";
                    }
                }
            }
        }
    }

    if (isset($_POST["nameFoodCreate_AdminPage"])) {

        $file = $_FILES["fileImgFoodCreate"]; // lấy file từ POST
        $fileName = $_FILES["fileImgFoodCreate"]["name"];
        $fileTmpName = $_FILES["fileImgFoodCreate"]["tmp_name"];
        $fileSize = $_FILES["fileImgFoodCreate"]["size"];
        $fileError = $_FILES["fileImgFoodCreate"]["error"];
        $fileType = $_FILES["fileImgFoodCreate"]["type"];

        if (empty($_POST["nameFoodCreate_AdminPage"]) || empty($_POST["priceFoodCreate"]) || empty($fileName)) {
            echo "Empty fields";
        } else {
            if (!preg_match('/^[0-9]*$/', $_POST["priceFoodCreate"])) {
                echo "Price invalid";
            } else {
                if ((int)$_POST["priceFoodCreate"] < 1000) {
                    echo "Price must be greater than 1000";
                } else {
                    $fileExt = explode('.', $fileName);
                    $fileActualExt = strtolower(end($fileExt)); // lấy đuôi file

                    $allowed = array("jpg", "jpeg", "png", "pdf");

                    if (in_array($fileActualExt, $allowed)) {
                        if ($fileError == 0) {
                            if ($fileSize < 2000000) {
                                $foodLast = $foodsCore->getLast();
                                $idAdd = $foodLast["id"] + 1;
                                $fileNameNew = $idAdd . "." . $fileActualExt;
                                $fileDestination = 'uploads/' . $fileNameNew;
                                move_uploaded_file($fileTmpName, $fileDestination);
                                $arrSize = array($_POST["sizeSCreate"], $_POST["sizeMCreate"], $_POST["sizeLCreate"]);
                                $result = $foodsCore->addNewFood($_POST["nameFoodCreate_AdminPage"], $fileDestination, $_POST["priceFoodCreate"], $_POST["typeFoodCreate"]);
                                $result2 = $sizeCore->createSizeByIdFood($idAdd, $arrSize);
                                if ($result && $result2) {
                                    echo "success";
                                } else {
                                    if ($result) {
                                        echo "Fail create new size of food";
                                    } else {
                                        echo "Fail create new food";
                                    }
                                }
                            } else {
                                echo "This file is too big";
                            }
                        } else {
                            echo "Error to upload file";
                        }
                    } else {
                        echo "Cannot upload files of this type";
                    }
                }
            }
        }
    }
} else {
    echo "Fail fetch";
}
