<?php

class productsHandler extends productsDAO
{
    public function __construct()
    {
    }

    protected function getAll()
    {
        $sql = 'SELECT * FROM `products`';
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, "products");
    }

    public function getAllproducts()
    {
        if ($this->getAll()) {
            return $this->getAll();
        } else {
            return Util::DB_SERVER_ERROR;
        }
    }

}