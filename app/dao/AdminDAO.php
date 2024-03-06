<?php

class AdminDAO
{
    public function __construct()
    {
    }

    protected function fetchByEmail($email)
    {
        $sql = 'SELECT * FROM `users` WHERE email=?';
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Admin");
    }

    protected function fetchByAdminId($cid)
    {
        $sql = 'SELECT * FROM `users` WHERE `adminId`=?';
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute([$cid]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Admin");
    }

    protected function fetchAll()
    {
        $sql = 'SELECT * FROM `users`';
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Admin");
    }

    protected function create(Admin $admin)
    {
        $sql = 'INSERT INTO `users`(`fullname`, `password`, `email`, `phone`) VALUES (?,?,?,?)';
        $stmt = DB::getInstance()->prepare($sql);
        $exec = $stmt->execute([
            $admin->getFullName(),
            $admin->getPassword(),
            $admin->getEmail(),
            $admin->getPhone()
        ]);
        return $exec;
    }

}