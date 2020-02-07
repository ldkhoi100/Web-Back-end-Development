<?php

class Node
{
    /* Node data, Thuộc tính data */
    public $data;

    /* Link to next node, Thuộc tính node đằng sau */
    public $next;

    function __construct($data)
    {
        $this->data = $data;
        $this->next = NULL;
    }
    // Phương thức đọc dữ liệu của node
    function readNode()
    {
        return $this->data;
    }
}