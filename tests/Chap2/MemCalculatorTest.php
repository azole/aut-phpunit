<?php
/**
 * Created by PhpStorm.
 * User: azole
 * Date: 2018/5/28
 * Time: 07:04
 */

namespace Tests\Chap2;

use PHPUnit\Framework\TestCase;

class MemCalculatorTest extends TestCase
{
    /**
     * @test
     */
    public function sum_ByDefault_ReturnsZero()
    {
        $calc = $this->makeCalc();

        $lastSum = $calc->sum();

        $this->assertEquals(0, $lastSum);
    }

    /**
     * @test
     */
    public function add_WhenCalled_ChangesSum()
    {
        $calc = $this->makeCalc();

        $calc->add(1);

        $sum = $calc->sum();

        $this->assertEquals(1, $sum);
    }

    private function makeCalc()
    {
        return new \Aut\Chap2\MemCalculator();
    }
}