<?php
class InforShip extends Database
{
    public function addNewOneInforShip($name, $address, $phone)
    {
        $query = "INSERT INTO infor_ship(name,address,phone) VALUES('$name','$address','$phone')";
        $result = mysqli_query($this->conn, $query);
        $idShip = mysqli_insert_id($this->conn);
        return $idShip;
    }
}

$inforShipCore = new InforShip;
