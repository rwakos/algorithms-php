<?php
use PHPUnit\Framework\TestCase;
use App\Models\LinkedList;

class LinkedListTest extends TestCase
{
    public function testLinkedListIsClass(){
        $l = New LinkedList();
        $this->assertInstanceOf(LinkedList::class, $l);
    }

    public function testCreateLinkedList(){
        $a = New LinkedList();
        $this->assertEquals(null,$a->head);
    }



}