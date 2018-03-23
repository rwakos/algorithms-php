<?php
use PHPUnit\Framework\TestCase;
use App\Models\RotateMatrix;

class RotateMatrixTest extends TestCase{

    public $matrix_1 = [[1,2,3],[4,5,6],[7,8,9]];
    public $matrix_err = [[1,3],[5,6],[7,8,9]];
    public $rotate_90 = [[7,4,1],[8,5,2],[9,6,3]];
    public $rotate_180 = [[9,8,7],[6,5,4],[3,2,1]];
    public $rotate_270 = [[3,6,9],[2,5,8],[1,4,7]];

    function testRotateMatrix90(){
        $obj = new RotateMatrix($this->matrix_1,3,90);
        $result = $obj->rotateMatrix();
        $this->assertEquals($this->rotate_90, $result);
    }

    function testRotateMatrix180(){
        $obj = new RotateMatrix($this->matrix_1,3,180);
        $result = $obj->rotateMatrix();
        $this->assertEquals($this->rotate_180, $result);
    }

    function testRotateMatrix270(){
        $obj = new RotateMatrix($this->matrix_1,3,270);
        $result = $obj->rotateMatrix();
        $this->assertEquals($this->rotate_270, $result);
    }

    /**
     * @expectedException ArgumentCountError
     */
    public function testThrowsExceptionIfNoDataIsPassed()
    {
        new RotateMatrix();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testThrowsExceptionIfNonTypeExpectedPassed()
    {
        new RotateMatrix($this->matrix_err,3,90);
        new RotateMatrix($this->matrix_1,'a',90);
        new RotateMatrix($this->matrix_1,3,95);
    }
}