<?php

class MyKadHelper
{
    protected $myKad = null;
    public function __construct($myKad)
    {
        $this->myKad = $myKad;
    }

    public function getAge(): int
    {
        return 0;
    }

    public function getBirthDate(): string
    {
        return '';
    }
}
