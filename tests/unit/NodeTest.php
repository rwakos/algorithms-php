<?php
use PHPUnit\Framework\TestCase;
use App\Models\Node;

class NodeTest extends TestCase
{
    public function testNodeIsClass(){
        $a = New Node('a');
        $this->assertInstanceOf(Node::class, $a);
    }

    public function testCreateFirstNodeData(){
        $a = New Node('a');
        $this->assertEquals('a',$a->data);
    }

    public function testCreateFirstNodeNext(){
        $a = New Node('a');
        $this->assertEquals(null,$a->next);
    }


    /**
     * @expectedException ArgumentCountError
     */
    public function testThrowsExceptionIfEmptyIsPassed()
    {
        new Node();
    }


}