<?php

class Reservation extends Booking
{
    private $start;
    private $end;
    private $productname;
    private $requirement;
    private $quantity;
    private $requests;
    private $timestamp;
    private $hash;

    public function __construct()
    {
        parent::__construct();
    }

    public function getStart()
    {
        return $this->start;
    }

    public function setStart($start)
    {
        $this->start = $start;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function setEnd($end)
    {
        $this->end = $end;
    }

    public function getProductName()
    {
        return $this->productname;
    }

    public function setProductName($productname)
    {
        $this->productname = $productname;
    }

    public function getRequirement()
    {
        return $this->requirement;
    }

    public function setRequirement($requirement)
    {
        $this->requirement = $requirement;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getRequests()
    {
        return $this->requests;
    }

    public function setRequests($requests)
    {
        $this->requests = $requests;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public function getHash()
    {
        return $this->hash;
    }

    public function setHash($hash)
    {
        $this->hash = $hash;
    }

    public function requirement()
    {
        return array("No damage", "Non-stain", "Returning");
    }
}
