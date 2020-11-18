<?php
class Size extends Database
{
    public function getAll()
    {
        $query = "SELECT * FROM size";
        $result =  mysqli_query($this->conn, $query);

        $resultArray = array();

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultArray[] = $item;
        }

        return $resultArray;
    }


    public function getSizeByIdFood($id)
    {
        $query = "SELECT * FROM size WHERE id_food=$id";
        $result =  mysqli_query($this->conn, $query);
        $resultItem = null;

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultItem = $item;
            break;
        }

        return $resultItem;
    }

    public function createSizeByIdFood($id, $arrSize = [])
    {
        $query = "INSERT INTO size(id_food,size_s,size_m,size_l) VALUES('$id','$arrSize[0]','$arrSize[1]','$arrSize[2]')";
        $result = $result =  mysqli_query($this->conn, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

$sizeCore = new Size;
