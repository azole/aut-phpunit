<?php
/**
 * Created by PhpStorm.
 * User: azole
 * Date: 2018/5/28
 * Time: 07:02
 */

namespace Aut\Chap2;


class MemCalculator
{
    private $sum = 0;

    public function add(int $number)
    {
        $this->sum += $number;
    }

    public function sum()
    {
        $temp = $this->sum;
        $this->sum = 0;
        return $temp;
    }
}