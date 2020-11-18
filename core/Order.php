<?php
class Order extends Database
{
    public function getAllOrder()
    {
        $query = "SELECT * FROM orders ORDER BY id DESC";
        $result = mysqli_query($this->conn, $query);

        $orderArray = array();
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $orderArray[] = $item;
        }

        return $orderArray;
    }

    public function addNewOneOrder($idShip, $idUser, $totalQty, $totalPrice, $dateStart)
    {
        $query = "INSERT INTO orders(id_ship,id_user,total_qty,total_price,date_start,status) VALUES('$idShip','$idUser','$totalQty','$totalPrice','$dateStart',0)";
        $result =  mysqli_query($this->conn, $query);
        $idOrder = mysqli_insert_id($this->conn);
        if ($result) {
            return $idOrder;
        } else {
            return 0;
        }
    }

    public function getOrderByIdUser($id)
    {
        $query = "SELECT * FROM orders WHERE id_user='$id'";
        $result = mysqli_query($this->conn, $query);

        $orderArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $orderArray[] = $item;
        }

        return $orderArray;
    }
}

$orderCore = new Order;
