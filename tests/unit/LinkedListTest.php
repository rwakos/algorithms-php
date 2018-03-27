<?php
use PHPUnit\Framework\TestCase;
use App\Models\LinkedList;
use App\Models\Node;

class LinkedListTest extends TestCase
{
    public function testLinkedListIsClass(){
        $l = New LinkedList();
        $this->assertInstanceOf(LinkedList::class, $l);
    }

    public function testCreateLinkedList(){
        $l = New LinkedList();
        $this->assertEquals($l->head, null);
    }

    public function testInsertFirst(){
        $a = 'a';
        $l = New LinkedList();
        $l->insertFirst($a);
        $this->assertEquals($a, $l->head->data);
    }

    public function testGetFirst(){
        $a = 'a';
        $l = New LinkedList();
        $l->insertFirst($a);
        $node = $l->getFirst();
        $this->assertEquals($a,$node->data);
    }

    public function testGetLastWhenEmptyList(){
        $l = New LinkedList();
        $node = $l->getLast();
        $this->assertEquals(null, $node);
    }

    public function testGetLast(){
        $l = New LinkedList();
        $a = 'a';
        $b = 'b';
        $c = 'c';
        $l->insertFirst($b);
        $l->insertFirst($c);
        $l->insertFirst($a);

        $node = $l->getLast();
        $this->assertEquals($b, $node->data);
    }

    public function testClearList(){
        $l = New LinkedList();
        $a = 'a';
        $b = 'b';
        $c = 'c';
        $l->insertFirst($b);
        $l->insertFirst($c);
        $l->insertFirst($a);

        $l->clear();
        $this->assertEquals(null,$l->head);
    }

    public function testRemoveFirst(){
        $l = New LinkedList();
        $a = 'a';
        $b = 'b';
        $c = 'c';
        $l->insertFirst($b);
        $l->insertFirst($c);
        $l->insertFirst($a);
        $l->removeFirst();
        $this->assertEquals($c, $l->head->data);
    }

    public function testRemoveLast(){
        $l = New LinkedList();
        $a = 'a';
        $b = 'b';
        $c = 'c';
        $l->insertFirst($b);
        $l->insertFirst($c);
        $l->insertFirst($a);
        $l->removeLast();
        $node = $l->getLast();
        $this->assertEquals($b, $node->data);
    }

    public function testInsertLast(){
        $l = New LinkedList();
        $a = 'a';
        $b = 'b';
        $c = 'c';
        $l->insertFirst($c);
        $l->insertFirst($b);
        $l->insertLast($a);
        $node = $l->getLast();
        $this->assertEquals($a, $node->data);
    }

    public function testInsertLastOnEmpty(){
        $l = New LinkedList();
        $a = 'a';
        $l->insertLast($a);
        $node = $l->getLast();
        $this->assertEquals($a, $node->data);
    }

    public function testGetAt(){
        $l = New LinkedList();
        $a = 'a';
        $b = 'b';
        $c = 'c';
        $l->insertFirst($c);
        $l->insertFirst($b);
        $l->insertLast($a);
        $node = $l->getAt(2);
        $this->assertEquals($a, $node->data);
        $node = $l->getAt(1);
        $this->assertEquals($c, $node->data);
        $node = $l->getAt(0);
        $this->assertEquals($b, $node->data);
    }

    public function testRemoveAt(){
        $l = New LinkedList();
        $a = 'a';
        $b = 'b';
        $c = 'c';
        $l->insertFirst($c);
        $l->insertFirst($b);
        $l->insertLast($a);
        $l->removeAt(2);
        $node = $l->getAt(2);
        $this->assertEquals(null, $node);
        $l->insertLast($a);
        $l->removeAt(1);
        $node = $l->getAt(1);
        $this->assertEquals($a, $node->data);
    }

    public function testInsertAt(){
        $l = New LinkedList();
        $a = 'a';
        $b = 'b';
        $c = 'c';
        $d = 'd';

        $l->insertFirst($c);
        $l->insertFirst($a);

        $l->insertAt(1,$b);
        $node = $l->getAt(1);
        $this->assertEquals($b, $node->data);

        $node = $l->getAt(2); //Validate that the list wasnt broken...
        $this->assertEquals($c, $node->data);

        $l->insertAt(2,$d);
        $node = $l->getAt(2);
        $this->assertEquals($d, $node->data);


    }

}