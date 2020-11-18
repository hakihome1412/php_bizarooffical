<?php
class User extends Database
{
    public function checkLogIn($username, $password)
    {
        if (empty($username) || empty($password)) {
            header("Location: login.php?error=emptyfields");
        } else {
            $query = "SELECT * FROM user WHERE username='$username'";
            $result =  mysqli_query($this->conn, $query);
            $resultItem = null;

            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultItem = $item;
                break;
            }

            if ($resultItem == null) {
                header("Location: login.php?error=usernotfound");
            } else if (password_verify($password, $resultItem["pass"])) {
                $_SESSION["userid"] = $resultItem["id"];
                $_SESSION["username"] = $username;
                if ($resultItem["role"] == 1) {
                    header("Location: index.php");
                } else {
                    header("Location: admin.php");
                }
            } else {
                header("Location: login.php?error=passnotcorrect");
            }
        }
    }

    public function checkRegister($username, $password, $confirm)
    {
        if (empty($username) || empty($password) || empty($confirm)) {
            header("Location: register.php?error=emptyfields");
        } else {
            $query1 = "SELECT * FROM user WHERE username='$username'";
            $result =  mysqli_query($this->conn, $query1);
            $resultItem = null;

            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $resultItem = $item;
                break;
            }

            if ($resultItem == null) {
                if ($password == $confirm) {
                    $pass_hash = password_hash($password, PASSWORD_DEFAULT);
                    $query2 = "INSERT INTO user(username,pass,role) VALUES('$username','$pass_hash',1)";
                    $result =  mysqli_query($this->conn, $query2);
                    if ($result) {
                        $this->checkLogIn($username, $password);
                    } else {
                        header("Location: register.php?error=insertfail");
                    }
                } else {
                    header("Location: register.php?error=passnotmatch");
                }
            } else {
                header("Location: register.php?error=usernameexist");
            }
        }
    }

    public function getUserById($id)
    {
        $query = "SELECT * FROM user WHERE id='$id'";
        $result =  mysqli_query($this->conn, $query);
        $resultItem = null;

        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $resultItem = $item;
            break;
        }

        return $resultItem;
    }

    public function logOut()
    {
        unset($_SESSION['userid']);
        header("Location: index.php");
    }

    public function changePassword($id, $newpass)
    {
        $pass_hash = password_hash($newpass, PASSWORD_DEFAULT);
        $query = "UPDATE user SET pass='$pass_hash' WHERE id='$id'";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}

$userCore = new User;
