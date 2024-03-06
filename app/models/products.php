<?php

class products
{
    private $id;
    private $product_name;
    private $size;
    private $category;
    private $is_available;
    private $quantity;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getproduct_name()
    {
        return $this->product_name;
    }

    public function setproduct_name($product_name)
    {
        $this->product_name = $product_name;
    } 
    
    public function getsize()
    {
        return $this->size;
    }

    public function setsize($size)
    {
        $this->size = $size;
    }

    public function getcategory()
    {
        return $this->category;
    }

    public function setcategory($category)
    {
        $this->category = $category;
    }

    public function getis_available()
    {
        return $this->is_availble;
    }

    public function setis_availble($is_availbe)
    {
        $this->is_availble = $is_availble;
    }

    public function getquantity()
    {
        return $this->quantity;
    }

    public function setquantity($quantity)
    {
        $this->quantity = $quantity;
    }

}