<?php

require_once 'MySql.php';
class Product extends MySql{
    //get all products
    public function getAll(){
        $query = "SELECT * FROM PRODUCTS";
        $result =$this->connect()->query($query);
        $products =[];
        if($result->num_rows >0)
        {
            while($row = $result->fetch_assoc())
            {
                array_push($products,$row);
            }
        }
        return $products;
    }
    //get one product
    public function getOne($id){
        $query = "SELECT * FROM PRODUCTS WHERE id='$id'";
        $result =$this->connect()->query($query);
        $prodcut=null;
        if($result->num_rows ==1)
        {
            $prodcut = $result->fetch_assoc();
        }
        return $prodcut;
    }


    //create new
    public function store(array $data){ 
        $data['name'] = mysqli_real_escape_string($this->connect(), $data['name']);
        $data['desc'] = mysqli_real_escape_string($this->connect(), $data['desc']);

        $query ="INSERT INTO Products (`name` , `desc` , price , img , created_at)
            VALUES ('{$data['name']}' ,  '{$data['desc']}' , '{$data['price']}' , '{$data['img']}' ,CURRENT_TIME())";
        $result =$this->connect()->query($query);
        if($result == true) 
        {
            return "true";
        }
        return "false";
    }


    //Edit
    public function update($id ,array $data){

        $data['name'] = mysqli_real_escape_string($this->connect(), $data['name']);
        $data['desc'] = mysqli_real_escape_string($this->connect(), $data['desc']);

        $query = "UPDATE Products SET 
        `name`='{$data['name']}',
        `desc`= '{$data['desc']}',
        `price`='{$data['price']}'
        WHERE id ='$id' ";
        $result =$this->connect()->query($query);
        if($result == true) 
        {
            return true;
        }
        return false;
    }

    //Delete
    public function delete($id){
        $query="DELETE FROM products 
        WHERE id ='$id'";
        $result =$this->connect()->query($query);
        if($result==true) 
        {
            echo "delete is done";
            return true;
        }
        return false;
    }
}
