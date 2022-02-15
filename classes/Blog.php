<?php

require_once 'MySql.php';
class Blog extends MySql{
    //get all Blogs
    public function getAll(){
        $query = "SELECT * FROM blogs";
        $result =$this->connect()->query($query);
        $blogs =[];
        if($result->num_rows >0)
        {
            while($row = $result->fetch_assoc())
            {
                array_push($blogs,$row);
            }
        }
        return $blogs;
    }
    //get one product
    public function getOne($blog_id){
        $query = "SELECT * FROM blogs WHERE blog_id='$blog_id'";
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
        $data['blog_desc'] = mysqli_real_escape_string($this->connect(), $data['blog_desc']);
        $data['author'] = mysqli_real_escape_string($this->connect(), $data['author']);
        var_dump($data);
        $query2 ="INSERT INTO blogs (`name` , `blog_desc` , author , cover_img , img , created_at)
            VALUES ('{$data['name']}','{$data['blog_desc']}' ,'{$data['author']}' , '{$data['cover_img']}' , '{$data['img']}' ,CURRENT_TIME())";
        $result =$this->connect()->query($query2);
        echo "<br>.$query2.<br>";
        var_dump($result);
        echo "<br>";
        if($result == true) 
        {
            return "true";
        }
        return "false";
    }


    //Edit
    public function update($blog_id ,array $data){

        $data['name'] = mysqli_real_escape_string($this->connect(), $data['name']);
        $data['blog_desc'] = mysqli_real_escape_string($this->connect(), $data['blog_desc']);
        $data['author'] = mysqli_real_escape_string($this->connect(), $data['author']);
        $query = "UPDATE blogs SET 
        `name`='{$data['name']}',
        `blog_desc`= '{$data['blog_desc']}',
        `author`='{$data['author']}'
        WHERE blog_id ='$blog_id' ";
        $result =$this->connect()->query($query);
        if($result == true) 
        {
            return true;
        }
        return false;
    }

    //Delete
    public function delete($blog_id){
        $query="DELETE FROM blogs 
        WHERE blog_id ='$blog_id'";
        $result =$this->connect()->query($query);
        if($result==true) 
        {
            return true;
        }
        return false;
    }
}
