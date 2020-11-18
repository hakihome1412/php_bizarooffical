<?php
class OrderDetail extends Database
{
    public function addDetailByIdOrder($idOrder, $arrCart = [])
    {
        $temp = 0;
        foreach ($arrCart as $item) {
            $name = $item["name"];
            $price = $item["price"];
            $quantity = $item["quantity"];
            $total_price_item = $item["total_price_item"];
            $size = $item["size"];
            $img = $item["img"];
            $query = "INSERT INTO order_detail(id_order,name,price,quantity,total_price_item,size,img) VALUES('$idOrder','$name','$price','$quantity','$total_price_item','$size','$img')";
            $result = mysqli_query($this->conn, $query);

            if ($result) {
                $temp++;
            }
        }

        if ($temp == count($arrCart)) {
            return true;
        } else {
            return false;
        }
    }

    public function getAllDetailByIdOrder($id)
    {
        $query = "SELECT * FROM order_detail WHERE id_order='$id'";
        $result = mysqli_query($this->conn, $query);
        $orderDetailArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $orderDetailArray[] = $item;
        }

        return $orderDetailArray;
    }
}

$orderDetailCore = new OrderDetail;
