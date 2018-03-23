<?php

namespace App\Models;

class LinkedList
{
    public $head;
    public function __construct()
    {
        $this->head = null;
    }

    function insertFirst($data) {
        $this->head = new Node($data, $this->head);
    }

    function size() {
    $counter = 0;
    $node = $this->head;

        while ($node) {
            $counter++;
            $node = $node->next;
        }

    return $counter;
    }
}

