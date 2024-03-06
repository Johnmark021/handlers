<?php

class productsDAO
{

    public function __construct()
    {
    }

    protected function getByProductName($productname)
    {
        $sql = 'SELECT * FROM `products` WHERE product_name=?';
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute([$productname]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, "products");
    }
}