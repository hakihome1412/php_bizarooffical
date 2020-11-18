<?php
class Foods extends Database
{
    public function getAll()
    {
        $query = "SELECT * FROM foods WHERE isDelete=0";
        $result =  mysqli_query($this->conn, $query);

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getAllFoods()
    {
        $query = "SELECT * FROM foods  WHERE isDelete=0 ORDER BY id DESC";
        $result =  mysqli_query($this->conn, $query);

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getAllFood()
    {
        $query = "SELECT * FROM foods  WHERE isDelete=0 AND type=0";
        $result =  mysqli_query($this->conn, $query);

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getAllDrink()
    {
        $query = "SELECT * FROM foods WHERE isDelete=0 AND type=1";
        $result =  mysqli_query($this->conn, $query);

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getAllYogurt()
    {
        $query = "SELECT * FROM foods WHERE isDelete=0 AND type=2";
        $result =  mysqli_query($this->conn, $query);

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getItemById($id)
    {
        $query = "SELECT * FROM foods WHERE id=$id";
        $result =  mysqli_query($this->conn, $query);
        $resultItem = null;

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultItem = $item;
            break;
        }

        return $resultItem;
    }

    public function deleteFoodById($id)
    {
        $query = "UPDATE foods SET isDelete=1 WHERE id='$id'";
        $result = mysqli_query($this->conn, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function updateFoodById($id, $name, $price)
    {
        $query = "UPDATE foods SET name='$name', price='$price' WHERE id='$id'";
        $result = mysqli_query($this->conn, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function addNewFood($name, $img, $price, $type)
    {
        $query = "INSERT INTO foods(name,img,price,type,isDelete) VALUES('$name','$img','$price','$type',0)";
        $result = mysqli_query($this->conn, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getLast()
    {
        $query = "SELECT * FROM foods ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($this->conn, $query);
        $resultItem = null;

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultItem = $item;
            break;
        }

        return $resultItem;;
    }
}

$foodsCore = new Foods;
