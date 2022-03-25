<?php

class Dbh
{
    public $server;
    public $user;
    public $pass;
    public $dbname;
    public $conn;
    public $table;
    public $dbSql;

    public function connect()
    {
        $this->server = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->dbname = 'Desh_Charity';

        $this->conn = mysqli_connect($this->server,$this->user,$this->pass,$this->dbname);

        if(!$this->conn)
        {
            die("Connection Failed: ".mysqli_connect_error());
        }else{
            return $this->conn;
        }
    }

    public function createTable($table){

        $this->table = $table;
        $sql = "CREATE DATABASE IF NOT EXISTS $this->dbname";

        if(mysqli_query($this->conn,$sql))
        {
            $sql = "CREATE TABLE IF NOT EXISTS $this->table
                    ( id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    product_name VARCHAR(30) NOT NULL,
                    product_price FLOAT,
                    product_image VARCHAR(100)
                    );";

            if(!mysqli_query($this->conn,$sql))
            {
                echo "Error in creating Table! ".mysqli_error($this->conn);
            }
        }else
        {
            return false;
        }
    }

    public function getDemoProduct($demoProduct){
        $sql = "SELECT * FROM $demoProduct";
        $result = mysqli_query($this->conn,$sql);

        if(mysqli_num_rows($result) > 0)
        {
            return $result;
        }
    }
    public function getBabyCare($babyCare){
        $sql = "SELECT * FROM $babyCare";
        $result = mysqli_query($this->conn,$sql);

        if(mysqli_num_rows($result) > 0)
        {
            return $result;
        }
    }

    public function getToys($toys){
        $sql = "SELECT * FROM $toys";
        $result = mysqli_query($this->conn,$sql);

        if(mysqli_num_rows($result) > 0)
        {
            return $result;
        }
    }
}