<?php

abstract class Repository
{
    private $list = array();

    public function __construct()
    {
    }

    /**
     * @return array
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * @param $element
     */
    public function add($element): void
    {
        ;
        array_push($this->list, $element);
    }

    public function remove($element): void
    {

        $this->list = array_diff($this->list, array($element));
    }

}
