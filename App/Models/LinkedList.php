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

    function getFirst() {
        return $this->head;
    }

    function getLast() {
        $node = $this->head;

        if ($node===null){
            return null;
        }

        while ($node) {
            if ($node->next===null){
                return $node;
            }
            $node = $node->next;
        }
        return $node;
    }

    function clear()
    {
        $this->head = null;
    }

    function removeFirst(){
        if ($this->head===null){
            return;
        }

        $this->head = $this->head->next;
    }

    function RemoveLast()
    {
        $previous = $this->head;

        if ($previous === null) {
            return;
        }

        if ($previous->next === null) {
            $this->head = null;
            return;
        }

        $node = $previous->next;
        while ($node !== null) {
            $previous = $node;
            $node = $node->next;
        }

        $previous->next = null;
    }

    function InsertLast($data){
        $node = new Node($data);
        $lnode = $this->getLast();

        if ($lnode===null){
            $this->head = $node;
        } else {
            $lnode->next = $node;
        }
    }

    /*
     * Returns a node at index
     * */
    function getAt($index){
        if (!is_numeric($index)){
            throw new \InvalidArgumentException;
        }

        if (!is_integer($index)){
            throw new \InvalidArgumentException;
        }

        if ($index < 0){
            throw new \InvalidArgumentException;   //Or you could swapp $index to cero...
        }

        if ($this->head===null){
            return null;
        }
        $node = $this->head;

        $i = -1;
        while ($node) {
            $i++;
            if ($i===$index){
                return $node;
            }
            $node = $node->next;
        }

        return null;
    }

    /*
     * Remove a node at index
     * */
    function removeAt($index){
        if (!is_numeric($index)){
            throw new \InvalidArgumentException;
        }

        if (!is_integer($index)){
            throw new \InvalidArgumentException;
        }

        if ($index < 0){
            throw new \InvalidArgumentException;   //Or you could swapp $index to cero...
        }

        if ($this->head===null){
            return;
        }

        //Validate when index = 0
        if (($index===0)&&($this->head !== null)){
            $this->head = $this->head->next;

        } elseif (($index===0)&&($this->head === null)){
            $this->head = null;
        } else {
            $node = $this->getAt($index-1);
            $toRemove = $node->next;
            $node->next = $toRemove->next;
        }
    }

    /*
     * Remove a node at index
     * */
    function insertAt($index, $data){
        if (!is_numeric($index)){
            throw new \InvalidArgumentException;
        }

        if (!is_integer($index)){
            throw new \InvalidArgumentException;
        }

        if ($index < 0){
            throw new \InvalidArgumentException;   //Or you could swapp $index to cero...
        }

        //Validate when index = 0
        if ($index===0){
            $this->insertFirst($data);
        } else {
            $new = new Node($data);
            $previous = $this->getAt($index-1);
            $current = $previous->next;
            $previous->next = $new;
            $new->next = $current;
        }
    }
}

