<?php

namespace App\Models;

class Node
{
    public $data;
    public $next;

    public function __construct($data, $next = null)
    {
        if (empty($data)){
            throw new \ArgumentCountError;
        }

        $this->data = $data;
        $this->next = $next;
    }
}