<?php
class Cart extends Database
{
    public function getFoodsInCartByIdUser($id)
    {

        $query = "SELECT b.id, b.id_food, a.name, a.price, a.img, b.quantity, b.size FROM foods a,cart b WHERE a.id=b.id_food AND b.id_user='$id' AND b.status=0";
        $result =  mysqli_query($this->conn, $query);

        $resultArray = array("food_arr" => array(), "count" => 0);
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray["food_arr"][] = $item;
            $resultArray["count"] += $item["quantity"];
        }

        return $resultArray;
    }

    public function getCartByIdUser($id)
    {
        $query = "SELECT a.name, a.price, b.quantity, a.price*b.quantity as total_price_item, b.size, a.img FROM foods a,cart b WHERE a.id=b.id_food AND b.id_user='$id' AND b.status=0";
        $result =  mysqli_query($this->conn, $query);
        $resultArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }



        return $resultArray;
    }

    public function getCountInCartByIdUser($id)
    {
        $query = "SELECT * FROM cart  WHERE  id_user='$id' AND status=0";
        $result =  mysqli_query($this->conn, $query);
        $count = 0;
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $count += $item["quantity"];
        }

        return $count;
    }

    public function getFoodtByIdUserAndIdCart($idUser, $idCart)
    {

        $query = "SELECT b.id, b.id_food, a.name, a.price, a.img, b.quantity, b.size FROM foods a,cart b WHERE a.id=b.id_food AND b.id_user='$idUser'AND b.id ='$idCart' AND b.status=0";
        $result =  mysqli_query($this->conn, $query);

        $resultItem = null;
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultItem = $item;
            break;
        }

        return $resultItem;
    }

    public function addToCart($idUser, $idFood, $quantity, $size)
    {
        $query1 = "SELECT * FROM cart WHERE id_user='$idUser' AND id_food ='$idFood' AND size='$size' AND status = 0";
        $result1 =  mysqli_query($this->conn, $query1);

        $cart_item = null;
        while ($item = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
            $cart_item = $item;
            break;
        }

        if ($cart_item == null) {
            $query2 = "INSERT INTO cart(id_user,id_food,quantity,size,status) VALUES('$idUser','$idFood','$quantity','$size',0)";
            $result2 =  mysqli_query($this->conn, $query2);
            if ($result2) {
                return true;
            } else {
                return false;
            }
        } else {
            $cart_id = $cart_item["id"];
            $quantity_update = $cart_item["quantity"] + $quantity;
            $query3 = "UPDATE cart SET quantity='$quantity_update' WHERE id='$cart_id'";
            $result3 =  mysqli_query($this->conn, $query3);

            if ($result3) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function addOneQtyByIdCart($id)
    {
        $query = "UPDATE cart SET quantity=quantity+1 WHERE id='$id'";
        $result =  mysqli_query($this->conn, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function removeOneQtyIdCart($id)
    {
        $query = "UPDATE cart SET quantity=quantity-1 WHERE id='$id'";
        $result =  mysqli_query($this->conn, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCartById($id)
    {
        $query = "DELETE FROM cart WHERE id='$id'";
        $result =  mysqli_query($this->conn, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getTotalInCart($id)
    {
        $getData = $this->getFoodsInCartByIdUser($id);
        $listFoodInCart = $getData["food_arr"];
        $total = 0;

        foreach ($listFoodInCart as $item) {
            $total += $item["quantity"] * $item["price"];
        }

        return $total;
    }

    public function getCountInCart($id)
    {
        $getData = $this->getFoodsInCartByIdUser($id);
        $countInCart = $getData["count"];

        return $countInCart;
    }

    public function setStatus_1_CartByIdUser($id)
    {
        $query = "UPDATE cart SET status=1 WHERE id_user='$id'";
        $result = mysqli_query($this->conn, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

$cartCore = new Cart;
