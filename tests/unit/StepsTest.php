<?php
use PHPUnit\Framework\TestCase;
use App\Models\Steps;

class StepsTest extends TestCase
{
    public function testBuildMatrix(){
        $strObj = new Steps(2);
        $matrix = $strObj->setSteps();
        $this->assertEquals(['# ','##'], $matrix);
    }

    public function testBuildMatrix2(){
        $strObj = new Steps(2);
        $matrix = $strObj->getMatrixRecursive();
        $this->assertEquals(['# ','##'], $matrix);
    }

    /**
     * @expectedException ArgumentCountError
     */
    public function testThrowsExceptionIfEmptyIsPassed()
    {
        $strObj = new Steps();
        $strObj->setSteps();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowsExceptionIfStringIsPassed()
    {
        $strObj = new Steps('a');
        $strObj->setSteps();
    }
}